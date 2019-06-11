<?php

namespace App\Models;


use App\Modules\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Claim extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claims';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['claim_number','date','institution','claim_category','claim_object','claim_stage', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function judgement_terms()
    {
        return $this->hasMany(ClaimJudgementTerm::class)->orderBy('term_date','descending');
    }
    public function api_search_logs()
    {
        return $this->hasMany(ClaimApiSearchLog::class);
    }
    public function parts()
    {
        return $this->hasMany(ClaimPart::class);
    }
    public function hearings()
    {
        return $this->hasMany(ClaimHearing::class)->orderBy('date','descending');
    }
}
