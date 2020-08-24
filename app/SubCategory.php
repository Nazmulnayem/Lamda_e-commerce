<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class SubCategory extends Model
{
    protected $fillable =['category_id','sub_category_name','sub_category_description','publication_status',];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
