<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Product $product)
    {
        return view("admin.productComments.index",[
            'comments'=>$product->comments()
        ]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
    }
}
