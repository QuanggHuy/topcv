<?php
namespace App\Models\accounts;

use Illuminate\Database\Eloquent\Model;
use App\Models\accounts\Accounts;

class Rate_Jobs extends Model{
protected $table='rates_jobs';
protected $primarykey=['user_id','job_id' ];
public $incrementing = false;

public $timestamps=false;

protected $fillable=[
    'user_id' ,
    'job_id',
    'rate_score', 
    'created' 
    ];


    public function user()
{
    return $this->belongsTo(Accounts::class)->onDelete('cascade');
}

}




?>