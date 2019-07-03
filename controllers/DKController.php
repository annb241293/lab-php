<?php 
namespace Controllers;
use Models\User;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class DKController extends BaseController
{
	public function getSearchDK(){
		return $this->render('dangky');
		// echo 'string';
	}
	public function postSearchDK(){
		$email = $_POST['email'];
		$password = $_POST['password'];
		$check = User::where('email','=',$email)->exists();
		$pattern ='/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
		if(!preg_match($pattern,$email)){
			header('location: '.getUrl('dang-ky?msg=email khong dung dinh dang'));
			die();
		}
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		// dd(date('d-m-Y H:i:s',time()+24*60*60));
		// dd(uniqid());
		
		if(!$check){
			$user = new User;
			$user->email = $email;
			$user->password = md5($password);
			$user->email_verified_at = date('Y/m/d H:i:s',time()+24*60*60);
			$user->role = 1;
			$user->status = 'waiting';
			$user->remember_token = md5($email).uniqid();
			$user->save();
			
			$mail = new PHPMailer(true); 
			try {
    //Server settings
			    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
			    $mail->isSMTP();                                            // Set mailer to use SMTP
			    $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
			    $mail->Username   = 'annb241293@gmail.com';                     // SMTP username
			    $mail->Password   = 'binhan12';                               // SMTP password
			    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
			    $mail->Port       = 587;                                    // TCP port to connect to

			    //Recipients
			    $mail->setFrom('annb241293@gmail.com', 'NguyenBinhAn');
			    $mail->addAddress($email, 'Joe User');     // Add a recipient
			    // $mail->addAddress('ellen@example.com');               // Name is optional
			    $mail->addReplyTo('annb241293@gmail.com', 'NguyenBinhAn');
			    // $mail->addCC('cc@example.com');
			    // $mail->addBCC('bcc@example.com');

			    // Attachments
			    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

			    // Content
			    $mail->isHTML(true);                                  // Set email format to HTML
			    $mail->Subject = 'Here is the subject';
			    $mail->Body    = 'This is the HTML message body <b>in bold!</b>'.'http://localhost:8080/php-training/lab/password/'.
			    $user->remember_token;
			    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			    $mail->send();
			    echo 'Message has been sent';
			} catch (Exception $e) {
			    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}

		}else {
			echo 'email da ton tai';
		}

	}
	public function VerifyEmail($token){
		$user = User::where('remember_token','=',$token)->get();
		if(count($user)===1){
			// dd($user[0]->email);
			$user[0]->status = 'active';
			$user[0]->email_verified_at = date('Y/m/d H:i:s');
			$user[0]->save();
			return $this->render('verifyEmail',['user'=>$user[0]]);
		}else{
			echo 'link sai';
		}
		}
		
	}
 ?>