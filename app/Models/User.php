<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Models\hasPermissionTo;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;


     protected $guarded= [];
   // public $guard_name = 'api';

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function get_permission_group(){
        $permission_group = DB::table('permissions')->select('group_name')->groupBy('group_name')->get();
        return $permission_group;
    }

    public static function get_permission_by_group_name($group_name){
        $permission = DB::table('permissions')->select('id','name')->where('group_name',$group_name)->get();
        return $permission;
    }

    public static  function roleHasPermissions($role,$permissions){
        $hasPermission= true;
        foreach ($permissions as $permission){
            if(!$role->hasPermissionTo($permission->name)){
                $hasPermission= false;
            }
            return $hasPermission;
        }
    }
}
