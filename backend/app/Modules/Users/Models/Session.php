<?php

namespace App\Modules\Users\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sessions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'token', 'ip_address', 'expire_at'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['pivot'];

    /**
     * Returns user
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class)->with('groups');
    }
}
