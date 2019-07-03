<?php 

namespace Models;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
	
	protected $table = 'post';
	public $timestamps = false;

	public function category(){
		return $this->belongsTo('Models\Category', 'cate_id', 'id');
	}
	
}

 ?>