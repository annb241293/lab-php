
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
        
        <div class="box">
            <div class="box-header">

                <h4>Danh sách danh mục</h4>
                <div class="row">
                  <?php if(isset($_GET['msg'])): ?>
                  <div class="alert alert-success">
                   <strong>Success!</strong><?php echo e($_GET['msg']); ?>

                  </div>
                  <?php endif; ?>
                    <div class="col-md-4">
                        <form action="<?php echo e(getUrl('search')); ?>" method="get">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" 
                                        value=""    
                                        name="keyword" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">Search!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <form action="<?php echo e(getUrl('search')); ?>" method="post" accept-charset="utf-8">
                          <div class="form-group">
                            <label for="category">Category</label>
                          <div>
                             <select class="form-control" name="category" id="category">
                              <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                              <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->cate_name); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">Loc!</button>
                                    </span>
                      </div>
                    </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped">
            	<thead>
					<tr>
						<th>Id</th>
						<th>title</th>
						<th>Category</th>
						<th>images</th>
						<th>desc</th>
						<th>
							<a href="<?php echo e(getUrl('post/add')); ?>" title="" class="btn btn-xs btn-primary">Tạo mới</a>
						</th>
					</tr>
				</thead>
                <tbody>
			<?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $el): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<tr>
				<td><?php echo e($el->id); ?></td>
				<td><?php echo e($el->title); ?></td>
				<td><?php echo e($el->category->cate_name); ?></td>
				<td>
					<img src="<?php echo e($el->images); ?>" width="80">
				</td>
				<td><?php echo e($el->description); ?></td>
				<td style="width: 100px">
					<a href="<?php echo e(getUrl('post/edit/' . $el->id )); ?>" title="" class="btn btn-xs btn-info">Sửa</a>
					<a href="<?php echo e(getUrl('post/remove/' . $el->id )); ?>" title="" onclick="return confirm('ban co muon xoa?')" class="btn btn-remove btn-xs btn-danger">Xóa</a>
				</td>

			</tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</tbody>
            </table>
            

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
<?php /**PATH /opt/lampp/htdocs/php-training/lab/views/homepage.blade.php ENDPATH**/ ?>