<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Models\Announcement;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function __construct(Announcement $announcement){
        $this->middleware(['auth', 'verified', 'admin']);
        $this->blog = $announcement;
    }

    public function index()
    {
        $announcements = Announcement::all();
        return view('pages.admin.announcements.index')->with('announcements', $announcements);
    }

    public function create(){
        return view('pages.admin.announcements.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'title' => 'required|min:10',
            'body' => 'required|min:20',
            'caption' => 'required|min:10',
        ]);
            
        // Create a new blog resource
        $this->blog = new Announcement;
        $this->blog->title = $request->input('title');
        $this->blog->slug = $this->slug_generator($this->blog->title);
        $this->blog->body = $request->input('body');
        $this->blog->caption = $request->input('caption');
        $this->blog->is_active = true;
        $this->blog->user_id = Auth::user()->id;       

        if($request->input('base64image') !== null){
            $folderPath = public_path('announcements/');
            $image_parts = explode(';base64,', $request->input('base64image'));
            $image_types_aux = explode('image/', $image_parts[0]);
            $image_type = $image_types_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename =  $this->slug_generator($request->input('title')) . '-' . time() . "." . $image_type;
            $file = $folderPath . $filename;
            $path = str_replace('\\', '/',  $file);

            //put image in the storage location 
            Storage::put('announcements/'.$filename, $image_base64);
            $this->blog->image_url = $filename;
        }
        else{
            return back()->with('error', 'Please upload a cover image for the announcement.');
        }     
        $this->blog->save();

        return redirect('/admin/announcements')->with('success', 'Announcement has been posted successfully.');
    }

    // Show a particular posted blog or draft
    public function show($slug){
        $announcement = Announcement::where('slug', $slug)->first();
        return view('pages.admin.announcements.show')->with('announcement', $announcement);
    }

    public function edit($slug){
        $announcement = Announcement::where('slug', $slug)->first();
        return view('pages.admin.announcements.edit')
            ->with('announcement', $announcement);
    }

    // Update posted blog
    public function update(Request $request, $id){
        $this->validate($request, [
            'title' => 'required|min:3',
            'caption' => 'required|min:10',
            'body' => 'required|min:10',
        ]);
        
        $this->blog = Announcement::findOrFail($id);
        $this->blog->title = $request->input('title');
        $this->blog->slug = $this->slug_generator($this->blog->title);
        $this->blog->body = $request->input('body');
        $this->blog->caption = $request->input('caption');
        $this->blog->is_active = true;
        $this->blog->user_id = Auth::user()->id;            

        if($request->input('base64image') !== null){
            $folderPath = public_path('announcements/');

            //delete the image with the present path
            $old_path = $folderPath . $this->blog->image_url;
            if(file_exists($old_path)){
                unlink($old_path);
            }
            $image_parts = explode(';base64,', $request->input('base64image'));
            $image_types_aux = explode('image/', $image_parts[0]);
            $image_type = $image_types_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename =  $this->slug_generator($request->input('title')) . '-' . time() . "." . $image_type;
            $file = $folderPath . $filename;
            
            $path = str_replace('\\', '/',  $file);
            
            //put image in the storage location 
            Storage::put('announcements/'. $filename, $image_base64);
            
            //save image name in database
            $this->blog->image_url = $filename;
        }                    

        $this->blog->save();
        return redirect('/admin/announcements')->with('success', 'Announcement has been updated successfully.');
    }

    public function destroy($id){
        $announcement = Announcement::findOrFail($id);
        //delete the image with the present path if it exists
        if($announcement->image_url !== null){
            $old_path = 'storage/images/blog_images/' . $announcement->image_url;
            if(file_exists($old_path)){
                unlink($old_path);
            }
        }
        $announcement->delete();
        return redirect('/admin/announcements')->with('success', 'Announcement has been deleted successfully.');
    
    }

}
