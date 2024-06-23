<?php
namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Model;
use App\Models\companies\Companies;

class Jobs extends Model
{
    protected $table = 'jobs';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'title',
        'salary',
        'experience',
        'description',
        'contact',
        'photo',
        'api',
        'deactivated'
    ];

    public function companies()
    {
        return $this->belongsToMany(Companies::class, 'jobs_companies', 'job_id', 'company_id');
    }
}



?>