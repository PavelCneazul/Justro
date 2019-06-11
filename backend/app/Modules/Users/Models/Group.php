<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Group extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'code', 'parent_id'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['pivot'];


    /**
     * Returns user groups
     *
     * @return mixed
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_groups')
            ->withTimestamps()
            ->whereNull('user_groups.deleted_at');
    }
}
