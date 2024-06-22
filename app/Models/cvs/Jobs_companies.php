<?php
namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Model;

class Jobs_companies extends Model{
protected $table='jobs_companies';
protected $primaryKey = ['job_id','company_id' ];

public $timestamps=false;
public $incrementing = false;
protected $fillable=[
    'job_id',
    'company_id' 
    ];

}


?>