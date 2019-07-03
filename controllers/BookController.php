<?php 
namespace Controllers;
use Models\Post;
use Models\Category;
class BookController extends BaseController
{
	public function getSearchDK(){
		return $this->render('dangky');
	}
	
	public function addForm(){
		$category = Category::all();
		return $this->render('post.add-form',['category'=>$category]);
	}
	public function saveAdd(){
			$model = new Post();

		 	 function checkInput($data) {
			  $data = trim($data);
			  return $data;
			}
				
			$name = checkInput($_POST['name']);
			$desc = checkInput($_POST['desc']);
			$content = checkInput($_POST['content']);
			$category = $_POST['category'];
			$feature_image = $_FILES['feature_image'];
			$flagErr = false;
			$allowed =  ['gif','png' ,'jpg', 'jpeg'];
			$ext = pathinfo($feature_image['name'], PATHINFO_EXTENSION);

			// dd($feature_image);
			if(isset($_POST['submit'])){
				if(strlen($name) <6){
					$flagErr = true;
					$_SESSION['nameErr'] = 'name phai tren 6 ky tu';
				}
				if(Post::where('title','=',$name)->exists()){
					$flagErr = true;
					$_SESSION['nameErr'] = 'name da ton tai';
				}
				if(strlen($desc)<20){
					$flagErr = true;
					$_SESSION['descErr'] = 'description phai tren 20 ky tu';
				}
				if(strlen($content)<20){
					$flagErr = true;
					$_SESSION['contentErr'] = 'content phai tren 20 ky tu';
				}
				if($feature_image['size']==0){
					$flagErr = true;
					$_SESSION['imageErr'] = 'moi ban chon anh';
				}
				if(!in_array($ext, $allowed)){
					$flagErr = true;
					$_SESSION['imageErr'] = 'vui long chon dung dinh dang file (gif,png,jpg,jpeg)';
				}
			}

			if($flagErr==true){
				header('location: ' . getUrl('post/add'));
			}else {
				$filename = 'public/images/' .uniqid() .'-'. $feature_image['name'];
				move_uploaded_file($feature_image['tmp_name'],  './'.$filename);
				$imgLink = getUrl($filename);
				$model->images = $imgLink;
				$model->title = $name;
				$model->description = $desc;
				$model->content = $content;
				$model->cate_id = $category;
				$model->save();
				header('location: ' . getUrl('?msg=them thanh cong'));
			}
	}

	public function remove($id){
		Post::destroy($id);
		header('location: ' . getUrl('?msg=xoa thanh cong'));
	}
	public function editForm($id){
		$post =Post::find($id);
		$category = Category::all();
		// dd($post);
		return $this->render('post.edit-form',['post'=>$post,'category'=>$category]);
	}
	public function saveEdit($id){
		$post = Post::find($id);
		$category = $_POST['category'];
		$name = $_POST['name'];
		$desc = $_POST['desc'];
		$content = $_POST['content'];
		$feature_image = $_FILES['feature_image'];

		$flagErr = false;
		$allowed =  ['gif','png' ,'jpg', 'jpeg'];
		$ext = pathinfo($feature_image['name'], PATHINFO_EXTENSION);

			if(isset($_POST['submit'])){
				if(strlen($name) <6){
					$flagErr = true;
					$_SESSION['nameErr'] = 'name phai tren 6 ky tu';
				}
				if(strlen($desc)<20){
					$flagErr = true;
					$_SESSION['descErr'] = 'description phai tren 20 ky tu';
				}
				if(strlen($content)<20){
					$flagErr = true;
					$_SESSION['contentErr'] = 'content phai tren 20 ky tu';
				}
				if($feature_image['size']>0 && !in_array($ext, $allowed)){
					$flagErr = true;
					$_SESSION['imageErr'] = 'vui long chon dung dinh dang file (gif,png,jpg,jpeg)';
				}
			}

			if($flagErr==true){
				header('location: ' . getUrl('post/edit/'.$id));
			}else {
				if($feature_image['size'] > 0){
					$filename = 'public/images/' .uniqid() .'-'. $feature_image['name'];
					move_uploaded_file($feature_image['tmp_name'],  './'.$filename);
					$imgLink = getUrl($filename);
					$post->images = $imgLink;
				}

				$post->title = $name;
				$post->description = $desc;
				$post->content = $content;
				$post->cate_id = $category;
				$post->save();
				header('location: ' . getUrl('?msg=sua thanh cong'));
			}
	}

	public function getSearch(){
		$key = isset($_GET['keyword']) ? $_GET['keyword'] : "";
		$key = trim($key);
		// echo $key;
		$post = Post::where('title','like','%'.$key.'%')->orWhere('content','like','%'.$key.'%')->get();
		return $this->render('post.search',['post'=>$post]);
	}
	public function postSearch(){
		$key = $_POST['category'];
		$post = Post::where('cate_id','=',$key)->get();
		return $this->render('post.search',['post'=>$post]);
	}
}
?>