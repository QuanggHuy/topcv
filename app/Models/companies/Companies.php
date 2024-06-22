<?php
namespace App\Models\companies;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model{
protected $table='companies';
protected $primarykey='id';

public $timestamps=false;

protected $fillable=[
    'name',
    'photo_main',
    'photo_background',
    'description',
    'api',
    'location',
    'deactivated',
    'country_id' 
    ];

}


?>