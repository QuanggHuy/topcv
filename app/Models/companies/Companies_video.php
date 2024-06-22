<?php
namespace App\Models\companies;

use Illuminate\Database\Eloquent\Model;

class Companies_video extends Model{
protected $table='companies_video';
protected $primaryKey = 'id';

public $timestamps=false;

protected $fillable=[
    'company_id' ,
    'name'
    ];

}


?>