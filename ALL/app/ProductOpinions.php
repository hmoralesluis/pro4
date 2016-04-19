<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOpinions extends Model {

	protected $table = 'product_opinions';


    public function product(){
        return $this->belongsTo('Product');
    }

}
