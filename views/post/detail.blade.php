<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết sách {{$book->name}}</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2>{{$book->name}}</h2>
	<img src="{{$book->feature_image}}" width="200">
	<br>
	<p><b>Danh mục: <a href="{{getUrl('/?cate_id=' . $book->category->id)}}" title="">{{$book->category->name}}</a></b></p>
	<p><b>Giá: ${{$book->price}}</b></p>
	<p><b>Đánh giá: {{$book->star}} sao</b></p>
	<p>Mô tả: {{$book->description}}</p>
	<a href="{{getUrl('book/edit/' . $book->id)}}" title="">Sửa</a>
	<a href="{{getUrl('book/remove/' . $book->id)}}" title="">Xóa</a>
	
</body>
</html>