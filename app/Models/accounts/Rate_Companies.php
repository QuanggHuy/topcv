<?php
namespace App\Models\accounts;

use Illuminate\Database\Eloquent\Model;

class Rate_Companies extends Model{
protected $table='rates_companies';
protected $primarykey=['user_id','company_id' ];
public $incrementing = false;

public $timestamps=false;

protected $fillable=[
    'user_id' ,
    'company_id',
    'rate_score', 
    'created' 
    ];

}


?>