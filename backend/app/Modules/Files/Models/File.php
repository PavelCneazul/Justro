<?php

namespace App\Modules\Files\Models;


use App\Models\Oj\OjClaim;
use App\Models\Oj\OjDamageClaim;
use App\Modules\Users\Models\User;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class File extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'extension', 'parent_id', 'barcode', 'reference', 'checksum', 'signed',
        'tags', 'user_id', 'uuid', 'external_file_id'
    ];

    protected $casts = [
        'tags' => 'array'
    ];

    protected $appends = ['fileSize'];


    public function GetFileSizeAttribute()
    {
        if ($this->path) {

            if (file_exists(storage_path('app/files/' . $this->path))) {
                $getSize = Storage::size('/files/' . $this->path);
                $size = number_format((float)$getSize * pow(10, -6), 2, '.', '');
                $size .= 'MB';
                return $size;
            } else {
                return 'UNKNOWN';

            }
        } else {
            return 'UNKNOWN';
        }
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class);
    }

}
