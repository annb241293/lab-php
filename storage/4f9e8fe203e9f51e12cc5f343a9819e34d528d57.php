<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tạo mới sách</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="" method="post" enctype="multipart/form-data">
		<div>
			<label>Tên sản phẩm</label>
			<input type="text" name="name" placeholder="Tên sản phẩm">
		</div>
		<div>
			<label>Danh mục</label>
			<select name="cate_id" >
				<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<option value="<?php echo e($el->id); ?>"><?php echo e($el->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		<div>
			<label>Ảnh</label>
			<input type="file" name="feature_image" >
		</div>
		<div>
			<label>Giá</label>
			<input type="text" name="price" placeholder="Giá sản phẩm">
		</div>
		<div>
			<label>Đánh giá</label>
			<input type="number" name="star" min="0" max="5" step="0.1" >
		</div>
		<div>
			<label>Mô tả</label>
			<textarea name="description" cols="50" rows="20"></textarea>
		</div>
		<div>
			<button type="submit">Lưu</button>
			<a href="<?php echo e(getUrl('/')); ?>" title="">Hủy</a>
		</div>
	</form>
	
</body>
</html><?php /**PATH /Library/WebServer/Documents/pt14112/demo/views/book/add-form.blade.php ENDPATH**/ ?>