<?php

namespace App\Models;

use App\Mail\OptMail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    public static function getGenerate(Request $request){
        $opt=random_int(11111,99999);
        $userQuery=User::query()->where('email',$request->get('email'));
        if($userQuery->exists()){
            $user=User::query()->first();
            $user->update([
                'password'=>bcrypt($opt)
            ]);
        }
        else{
            $user=User::query()->create([
                'email'=>$request->get('email'),
                'password'=>bcrypt($opt),
                'role_id'=>Role::FindByTitle('user')->id
            ]);
        }

        Mail::to($request->get("email"))->send(new OptMail($opt));
        return $user;
    }

}
