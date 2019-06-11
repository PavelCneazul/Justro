<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Model;

class ClaimJudgementTerm extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claim_judgement_terms';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['term_date', 'claim_id'];


    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }


}