<?php
namespace App\Models\articles;

use Illuminate\Database\Eloquent\Model;

class Article_companies extends Model{
protected $table='article_companies';
protected $primaryKey = ['company_id','article_id' ];

public $timestamps=false;
public $incrementing = false;
protected $fillable=[
    'company_id','article_id'
    ];

}


?>