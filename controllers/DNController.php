<?php 
namespace Controllers;
use Models\User;

class DNController extends BaseController
{
	public function dangNhap(){
		return $this->render('dangnhap');
	}
	public function postDangNhap(){
		$email = $_POST['email'];
		$pass = md5($_POST['password']);
		$check = User::where('email','=',$email)->exists();
		$user = User::where('email','=',$email)->first();
		// dd($user->password);

		// dd(count($user));
		if($check==true && $pass == $user->password){
			$_SESSION['auth'] = $user->email;
			// dd($_SESSION['auth']->);
			header('location: '.getUrl('/'));
		}
		else {
			header('location: '.getUrl('dang-nhap?msg=tai khoan hoac mat khau khong dung'));
		}
	}
	public function logOut(){
		unset($_SESSION['auth']);
		header('location: '.getUrl('dang-nhap'));
	}
}
