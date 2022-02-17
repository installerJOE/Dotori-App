<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Models\Rank;
use App\Models\Account;
use App\Models\SubscribedUser;
use App\Models\Transaction;
use App\Models\Referral;
use App\Models\Package;
use App\Models\Product;
use App\Models\Order;
use App\Mail\WithdrawalSuccessMail;
use App\Mail\DepositSuccessMail;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    // all functions of this class are restricted to only authenticated admin users
    public function __construct(){
        $this->middleware(['auth', 'verified', 'admin']);
    }

    public function dashboard(){
        return view('pages.admin.dashboard');
    }

    
    public function deposits(){
        $deposits = Transaction::where([
            'category' => 'deposit',
            'status' => 'completed'
        ])->get();
        return view('pages.admin.deposits')->with('deposits', $deposits);
    }

    public function depositRequests(){
        $deposits = Transaction::where([
            'category' => 'deposit',
            'status' => 'pending'
        ])->get();
        return view('pages.admin.depositRequests')->with('deposits', $deposits);
    }

    public function validateDepositRequest(Request $request){
        $deposit = Transaction::findOrFail($request->input('deposit_id'));
        $deposit->status = "completed";
        $deposit->user->available_points = $deposit->user->available_points + $deposit->amount;
        $deposit->save();
        $deposit->user->save();
        
        //send dotori user an email of deposit confirmation
        $notifyMail = new DepositSuccessMail();    
        Mail::to($deposit->user->email)->send($notifyMail);       

        return redirect('/admin/deposits/requests')->with('success', "Deposit request has been validated successfully");
    }

    public function withdrawals(){
        $withdrawals = Transaction::where([
            'category' => 'withdraw',
            'status' => 'completed'
        ])->get();
        return view('pages.admin.withdrawals')->with('withdrawals', $withdrawals);
    }

    public function withdrawalRequests(){
        $withdrawals = Transaction::where([
            'category' => 'withdraw',
            'status' => 'pending'
        ])->get();
        return view('pages.admin.withdrawalRequests')->with('withdrawals', $withdrawals);
    }

    public function validateWithdrawalRequest(Request $request){
        $withdrawal = Transaction::findOrFail($request->input('withdrawal_id'));
        $withdrawal->status = "completed";
        $withdrawal->user->available_points = $withdrawal->user->available_points - $withdrawal->amount;
        $withdrawal->save();
        
        //send dotori user an email of withdrawal confirmation
        $notifyMail = new WithdrawalSuccessMail();    
        Mail::to($withdrawal->user->email, $withdrawal->user->name)->send($notifyMail); 
        return redirect('/admin/withdrawals/requests')->with('success', "Withdrawal request has been approved successfully");
    }

    // display packages page showing all available packages
    public function packages(){
        $packages = Package::all();
        return view('pages.admin.packages')->with('packages', $packages);
    }

    // create a new instance of a package in the database
    public function storePackage(Request $request){
        $this->validate($request, [
            "package_name" => "required",
            "staking_amount" => "required",
            "reward_pts" => "required",
        ]);

        $package = Package::where('name', $request->input('package_name'))->first();
        if($package !== null){
            return back()->with("error", "Ooops! This package already exists.");
        }
        $package = new Package;
        $package->name = $request->input('package_name');
        $package->staking_amount = $request->input("staking_amount");
        $package->reward = $request->input("reward_pts");
        $package->save();
        return redirect("/admin/packages")->with("success", "Package has been created successfully.");
    }

    // Update information on a package in the database
    public function updatePackage(Request $request, $id){
        $this->validate($request, [
            "package_name" => "required",
            "staking_amount" => "required",
            "reward_pts" => "required",
        ]);

        $package = Package::findOrFail($id);
        $package->name = $request->input('package_name');
        $package->staking_amount = $request->input("staking_amount");
        $package->reward = $request->input("reward_pts");
        $package->save();

        return redirect("/admin/packages")->with("success", "Package has been updated successfully.");
    }

    // get all subscribed users and display page
    public function subscribers(){
        $subscribers = SubscribedUser::all();
        return view('pages.admin.subscribers')->with('subscribers', $subscribers);
    }


    public function shoppingProducts(){
        $products = Product::all();
        return view('pages.admin.products')->with('products', $products);
    }

    public function storeProduct(Request $request){
        $this->validate($request, [
            "product_price" => "required",
            "product_name" => "required",
        ]);
        
        $product = Product::where('name', $request->input('product_name'))->first();
        if($product !== null){
            return back()->with("error", "Ooops! This product already exists.");
        }

        $product = new Product;
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->price = $request->input("product_price");
                
        if($request->input('base64image') !== null && $request->input('base64image') != '0'){
            $folderPath = public_path('storage/images/products/');
            $image_parts = explode(';base64,', $request->input('base64image'));
            $image_types_aux = explode('image/', $image_parts[0]);
            $image_type = $image_types_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename = $this->slug_generator($request->input('product_name')) . "-" . time() . "." . $image_type;
            $file = $folderPath . $filename;
            $path = str_replace('\\', '/',  $file);
            // file_put_contents($path, $image_base64);
            Storage::put('products/'.$filename, $image_base64);
        }
        else{
            return back()->with('error', 'Please upload an image for the product');
        }
        
        $product->filename = $filename;
        $product->save();

        return redirect("/admin/shopping-products")->with("success", "Product has been created successfully.");
    }

    public function updateProduct(Request $request, $id){
        $this->validate($request, [
            "product_price" => "required",
            "product_name" => "required",
        ]);
        
        $product = Product::findOrFail($id);
        $product->name = $request->input('product_name');
        $product->description = $request->input('product_description');
        $product->price = $request->input("product_price");
                
        if($request->input('base64image') !== null && $request->input('base64image') != '0'){
            $folderPath = public_path('/storage/images/products/');
            $image_parts = explode(';base64,', $request->input('base64image'));
            $image_types_aux = explode('image/', $image_parts[0]);
            $image_type = $image_types_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $filename = $this->slug_generator($request->input('product_name')) . "-" . time() . "." . $image_type;
            $file = $folderPath . $filename;
            $path = str_replace('\\', '/',  $file);
            file_put_contents($path, $image_base64);
            // $product->filename = $filename;
            Storage::put('products/'.$filename, $image_base64);
        }
        
        $product->save();
        
        return redirect("/admin/shopping-products")->with("success", "Product has been updated successfully.");
    }

    public function updateProductStatus(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->is_active = $request->input('status-action') == "disable" ? false : true;
        $product->save();
        return redirect("/admin/shopping-products")->with("success", "Product status has been updated successfully.");
    }

    public function shoppingHistory(){
        $orders = Order::all();
        return view('pages.admin.shoppinghistory')->with('orders', $orders);
    }
}
