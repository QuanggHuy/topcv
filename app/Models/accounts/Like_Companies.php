<?php
namespace App\Models\accounts;

use Illuminate\Database\Eloquent\Model;

class Like_Companies extends Model{
protected $table='likes_companies';
protected $primarykey=['user_id','company_id' ];
public $incrementing = false;

public $timestamps=false;

protected $fillable=[
    'user_id' ,
    'company_id', 
    'created' 
    ];

}


?>