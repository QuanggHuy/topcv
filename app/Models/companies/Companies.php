<?php
namespace App\Models\companies;

use Illuminate\Database\Eloquent\Model;
use App\Models\jobs\Jobs;
use App\Models\jobs\Jobs_companies;

class Companies extends Model
{
    protected $table = 'companies';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'photo_main',
        'photo_background',
        'description',
        'api',
        'location',
        'deactivated',
        'country_id'
    ];

    public function jobs()
    {
        return $this->belongsToMany(Jobs::class, 'jobs_companies', 'company_id', 'job_id');
    }
}



?>