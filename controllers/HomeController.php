<?php 
namespace Controllers;
use Models\Post;
use Models\Category;

class HomeController extends BaseController
{
	
	function index()
	{	
		$category = Category::all();
		$post = Post::orderBy('id','desc')->take(10)->get();
		if(isset($_SESSION['auth'])){
			return $this->render('homepage', ['post' => $post,'category'=>$category]);
		}
		else {
			header('location:'.getUrl('dang-nhap'));
		}
		
		// dd($post);				
		
	
	}

	function detail($id)
	{
		$book = Book::find($id);
		return $this->render('book.detail', ['book' => $book]);
	}
	function contact()
	{
		echo "day la lien he";
	}
	function login()
	{
		include_once './views/login.php';
	}
	function postLogin()
	{
		echo $_POST['username'] . "-" . $_POST['password'];
	}
}
 ?>