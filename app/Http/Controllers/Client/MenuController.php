<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class MenuController extends Controller
{
    public function index()
    {
        return view("client.home",[
            'categories'=>Category::query()->where("category_id",null)->get()
        ]);
    }
}
