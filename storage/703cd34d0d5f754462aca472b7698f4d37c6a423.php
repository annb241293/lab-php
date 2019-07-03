<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Chi tiết sách <?php echo e($book->name); ?></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<h2><?php echo e($book->name); ?></h2>
	<img src="<?php echo e(getUrl($book->feature_image)); ?>" width="200">
	<br>
	<p><b>Danh mục: <a href="<?php echo e(getUrl('/?cate_id=' . $book->category->id)); ?>" title=""><?php echo e($book->category->name); ?></a></b></p>
	<p><b>Giá: $<?php echo e($book->price); ?></b></p>
	<p><b>Đánh giá: <?php echo e($book->star); ?> sao</b></p>
	<p>Mô tả: <?php echo e($book->description); ?></p>
	<a href="<?php echo e(getUrl('book/edit/' . $book->id)); ?>" title="">Sửa</a>
	<a href="<?php echo e(getUrl('book/remove/' . $book->id)); ?>" title="">Xóa</a>
	
</body>
</html><?php /**PATH /Library/WebServer/Documents/pt14112/demo/views/book/detail.blade.php ENDPATH**/ ?>