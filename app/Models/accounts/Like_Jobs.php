<?php
namespace App\Models\accounts;

use Illuminate\Database\Eloquent\Model;

class Like_Jobs extends Model{
protected $table='likes_jobs';
protected $primarykey=['user_id','job_id' ];
public $incrementing = false;

public $timestamps=false;

protected $fillable=[
    'user_id' ,
    'job_id', 
    'created' 
    ];

}


?>