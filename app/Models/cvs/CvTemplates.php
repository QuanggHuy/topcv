<?php
namespace App\Models\cvs;

use Illuminate\Database\Eloquent\Model;

class CvTemplates extends Model{
protected $table='cv_templates';
protected $primarykey='id';

public $timestamps=false;

protected $fillable=[
    'name',
    'template'
    ];

}


?>