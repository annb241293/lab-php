<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<fieldset>
		<legend>Bộ lọc</legend>
		<form action="" method="get" >
			<select name="cate_id">
				<option value="">--- Tất cả ---</option>
				<?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
				<option 
					value="<?php echo e($ca->id); ?>"
					<?php if($cate_id == $ca->id): ?>
						selected
					<?php endif; ?>
				><?php echo e($ca->name); ?></option>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
			<input type="text" name="keyword" placeholder="tên sách" value="<?php echo e($keyword); ?>">
			<button type="submit">Search</button>
		</form>
	</fieldset>
	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Cate name</th>
				<th>Image</th>
				<th>Price</th>
				<th>
					<a href="<?php echo e(getUrl('book/add')); ?>" title="">Tạo mới</a>
				</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($el->id); ?></td>
				<td>
					<a href="<?php echo e(getUrl('detail/' . $el->id)); ?>" title=""><?php echo e($el->name); ?></a>
				</td>
				<td><?php echo e($el->category->name); ?></td>
				<td>
					<img src="<?php echo e($el->feature_image); ?>" width="80">
				</td>
				<td><?php echo e($el->price); ?></td>
				<td>
					<a href="<?php echo e(getUrl('book/edit/' . $el->id )); ?>" title="">Sửa</a>
					<a href="<?php echo e(getUrl('book/remove/' . $el->id )); ?>" title="">Xóa</a>
				</td>

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	
</body>
</html><?php /**PATH /Library/WebServer/Documents/pt14112/demo/views/homepage.blade.php ENDPATH**/ ?>