<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductOpinions;
use App\Image;
use App\Category;

class Product extends Model {

	protected $table = 'products';
    protected $fillable = ['name', 'price', 'description', 'category_id'];
    protected $hidden = ['category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function opinions(){
        return $this->hasMany('ProductOpinions');
    }
}
