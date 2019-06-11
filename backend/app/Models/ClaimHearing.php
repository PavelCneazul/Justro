<?php namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\Model;

class ClaimHearing extends Model
{
    use SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'claim_hearings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['case', 'date', 'hour', 'solution', 'solution_summary', 'sentencing_date',
        'hearing_document', 'document_number', 'document_date', 'claim_id'];


    public function claim()
    {
        return $this->belongsTo(Claim::class);
    }


}