<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Packages;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function searchProduct(Request $request){
        
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $results = Product::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->get();

        return view('pages.searches.results', [
            'results' => $results
        ]);
    }
}
