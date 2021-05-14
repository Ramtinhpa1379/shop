<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Nullable;

class MenuController extends Controller
{
    public function index()
    {
        return view("client.home");
    }
}
