<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Model;

class ClaimApiSearchLog extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claim_api_search_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['data', 'last_modified', 'next_term', 'claim_id', 'link'];

    protected $casts = [
        'data' => 'array'
    ];

    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }


}