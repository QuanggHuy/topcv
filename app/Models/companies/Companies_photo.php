<?php
namespace App\Models\companies;

use Illuminate\Database\Eloquent\Model;

class Companies_photo extends Model{
protected $table='companies_photo';
protected $primaryKey = 'id';

public $timestamps=false;

protected $fillable=[
    'name',
    'company_id' 
    ];

}


?>