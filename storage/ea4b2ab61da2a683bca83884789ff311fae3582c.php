
<!DOCTYPE html>
<html>
<head>
	<base href="<?php echo e(getUrl('/')); ?>">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  <?php echo $__env->make('admin.layouts.style', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Header -->
    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- Sidebar -->
  <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->

	    <section class="content">

    <div class="box row">
      <div class="col-md-6">
        <form action="<?php echo e(getUrl('post/add')); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Title</label>
            <input id="name" type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="">
            <?php if(isset($_SESSION['nameErr'])): ?>
            <div class="alert alert-danger">
                   <strong>Error! </strong><?php echo e($_SESSION['nameErr']); ?>

                  </div>
              <?php unset($_SESSION['nameErr']); ?>
            <?php endif; ?>
          </div>
            <div class="form-group">
            <label for="category">Category</label>
            <div>
             <select class="form-control" name="category" id="category">
              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

              <option value="<?php echo e($cate['id']); ?>"><?php echo e($cate['cate_name']); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
          </div>
          </div>
          
        <div class="form-group">
        <label for="image">Image</label>
        <input name="feature_image" type="file" id="image" class="form-control">
         <?php if(isset($_SESSION['imageErr'])): ?>
            <div class="alert alert-danger">
                   <strong>Error! </strong><?php echo e($_SESSION['imageErr']); ?>

                  </div>
              <?php unset($_SESSION['imageErr']); ?>
            <?php endif; ?>       
      </div>
      <div class="form-group">
        <label for="short_detail">Description</label>
        <div>
          <textarea class="form-control" id="short_detail" name="desc"></textarea>
        </div>
           <?php if(isset($_SESSION['descErr'])): ?>
            <div class="alert alert-danger">
                   <strong>Error! </strong><?php echo e($_SESSION['descErr']); ?>

                  </div>
              <?php unset($_SESSION['descErr']); ?>
            <?php endif; ?>       
      </div>
      </div>
      <div class="col-md-6">
          <div class="form-group">
        <label for="detail">Content</label>
        <div>
          <textarea rows="5" class="form-control ckeditor" id="detail" name="content"></textarea>
        </div>
           <?php if(isset($_SESSION['contentErr'])): ?>
            <div class="alert alert-danger">
                   <strong>Error! </strong><?php echo e($_SESSION['contentErr']); ?>

                  </div>
              <?php unset($_SESSION['contentErr']); ?>
            <?php endif; ?>
      </div>
      </div>
     
      <div class="text-center">
        <button type="submit" class="btn btn-sm btn-primary" name="submit">Lưu</button>
        <button type="reset" value="Reset" class="btn btn-sm btn-primary">Hủy</button>
      </div>
    </form>
  
</div>

</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  <?php echo $__env->make('admin.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

<?php echo $__env->make('admin.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>
</html>


<!-- <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tạo mới sách</title>
	<link rel="stylesheet" href="">
</head>
<body>

	<form action="<?php echo e(getUrl('post/add')); ?>" method="post" enctype="multipart/form-data">
		<div>
			<label>title</label>
			<input type="text" name="name" placeholder="Tên sản phẩm">
		</div>
		<div>
			<label>description</label>
			<input type="text" name="desc" placeholder="Tên sản phẩm">
		</div>
		
		<div>
			<label>image</label>
			<input type="file" name="feature_image" >
		</div>
		
		
		<div>
			<label>content</label>
			<textarea name="content" cols="50" rows="20"></textarea>
		</div>
		<div>
			<button type="submit">Lưu</button>
			<a href="<?php echo e(getUrl('/')); ?>" title="">Hủy</a>
		</div>
	</form>
	
</body>
</html> --><?php /**PATH E:\xampp\htdocs\php-training\lab\views/post/add-form.blade.php ENDPATH**/ ?>