<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\OptRequest;
use App\Mail\OptMail;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function create()
    {
        return view("client.register.create");
    }

    public function sendemail(Request $request)
    {
        $user=null;
        $this->validate($request,[
            'email'=>['required','email']
        ]);

        $user=User::getGenerate($request);
        return redirect(route("client.register.verify",$user));
    }

    public function verifyopt(User $user){
        return view("client.register.opt",[
            'user'=>$user
        ]);
    }

    public function opt(OptRequest $request,User $user)
    {
        if(Hash::check($request->get('opt'),$user->password)){
            auth()->login($user);
            return redirect(route('client.index'));

        }
        else{

            return back()->withErrors(['opt'=>'کد وارد شده صحیح نمیباشد']);
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(route('client.index'));
    }
}
