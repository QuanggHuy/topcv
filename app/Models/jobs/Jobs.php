<?php
namespace App\Models\jobs;

use Illuminate\Database\Eloquent\Model;

class Jobs extends Model{
protected $table='jobs';
protected $primarykey='id';

public $timestamps=false;

protected $fillable=[
    'name' ,
    'title',
    'salary',
    'experience',
    'description',
    'contact',
    'photo',
    'api',
    'deactivated'
    ];

}


?>