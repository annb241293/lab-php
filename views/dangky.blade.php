<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Dang ky</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<div style="color: red">
			@if(isset($_GET['msg']))
			{{$_GET['msg']}}
			@endif
		</div>
	<form action="{{getUrl('dang-ky')}}" method="post" accept-charset="utf-8">
		Email: <input name="email" id="email" type="text" />
 
  Password:
  <input name="password" id="password" type="password" />
 
  <input type="submit" value="Submit" />
	</form>
	<hr>
	<a href="{{getUrl('dang-nhap')}}" title="">Dang nhap</a>
</body>
</html>