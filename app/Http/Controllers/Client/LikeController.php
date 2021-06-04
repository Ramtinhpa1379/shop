<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function index()
    {
        return view("client.like.index",[
            'products'=>auth()->user()->likes()
        ]);
    }
    public function store(Product $product,Request $request)
    {
        auth()->user()->like($product);
        dd('hi');
    }
}
