<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>

	<table>
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Image</th>
				<th>Price</th>
				<th>Add new</th>
			</tr>
		</thead>
		<tbody>
			<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($el->id); ?></td>
				<td><?php echo e($el->name); ?></td>
				<td>
					<img src="<?php echo e($el->image); ?>" width="80">
				</td>
				<td><?php echo e($el->price); ?></td>
				<td>
					<a href="" title="">Sửa</a>
					<a href="<?php echo e(getUrl('product/remove/' . $el->id )); ?>" title="">Xóa</a>
				</td>

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
	</table>
	
</body>
</html><?php /**PATH /Library/WebServer/Documents/pt14112/mvc/views/homepage.blade.php ENDPATH**/ ?>