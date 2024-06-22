<?php
namespace App\Models\location;

use Illuminate\Database\Eloquent\Model;

class Country_companies extends Model{
protected $table='country_companies';
protected $primaryKey = ['country_id','company_id' ];

public $timestamps=false;
public $incrementing = false;
protected $fillable=[
    'country_id',
    'company_id' 
    ];

}


?>