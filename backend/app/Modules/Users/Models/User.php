<?php

namespace App\Modules\Users\Models;


use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\ChatUser;
use App\Models\City;
use App\Models\Claim;
use App\Models\Language;
use App\Models\Recipe;
use App\Models\Relative;
use App\Models\Tonometer;
use App\Models\Word;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{

    CONST ADMIN = 'ADMIN';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'status',
        'type', 'avatar'];


    /**
     * Custom attributes
     *
     * @var array
     */
    protected $appends = ['isAdmin'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function groups()
    {
        return $this->belongsToMany(Group::class, 'user_groups')
            ->withTimestamps()
            ->whereNull('user_groups.deleted_at');
    }

    public function claims(){
        return $this->hasMany(Claim::class);
    }


    public function getIsAdminAttribute()
    {
        return $this->type === self::ADMIN;
    }





    public function checkIfHasGroup($groupId)
    {
        $flag = false;
        foreach ($this->groups()->get() as $group) {
            if ($group->id == $groupId) {
                $flag = true;
            }
        }
        return $flag;
    }


    public static function validate(array $input)
    {
        $validator = Validator::make($input, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);
        return $validator;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        // TODO: Implement getJWTIdentifier() method.
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        // TODO: Implement getJWTCustomClaims() method.
    }
}