
<!DOCTYPE html>
<html>
<head>
	<base href="{{getUrl('/')}}">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Blank Page</title>
  @include('admin.layouts.style')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Header -->
    @include('admin.layouts.header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <!-- Sidebar -->
  @include('admin.layouts.sidebar')

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
                    <div class="col-md-4">
                        <form action="{{getUrl('search')}}" method="get">
                            <div class="form-group">
                                <div class="input-group input-group-sm">
                                    <input type="text" 
                                        value="{{isset($_GET['keyword'])==true?$_GET['keyword']:''}}"    
                                        name="keyword" class="form-control">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-info btn-flat">Search!</button>
                                    </span>
                                </div>
                            </div>
                        </form>
                        <p>Tìm thấy {{count($post)}} kết quả</p>
                    </div>
                </div>
            </div>
            
            <table class="table table-striped">
            	<thead>
					<tr>
						<th>Id</th>
						<th>title</th>
						<th>category</th>
						<th>images</th>
						<th>desc</th>
						<th>
							<a href="{{getUrl('post/add')}}" title="" class="btn btn-xs btn-primary">Tạo mới</a>
						</th>
					</tr>
				</thead>
                <tbody>
			@foreach ($post as $el)
			<tr>
				<td>{{$el->id}}</td>
				<td>{{$el->title}}</td>
				<td>{{$el->category->cate_name}}</td>
				<td>
					<img src="{{$el->images}}" width="80">
				</td>
				<td>{{$el->description}}</td>
				<td style="width: 100px">
					<a href="{{getUrl('post/edit/' . $el->id )}}" title="" class="btn btn-xs btn-info">Sửa</a>
					<a href="{{getUrl('post/remove/' . $el->id )}}" title="" onclick="return confirm('Are you sure?')" class="btn btn-remove btn-xs btn-danger">Xóa</a>
				</td>

			</tr>
			@endforeach
		</tbody>
            </table>
            

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('admin.layouts.footer')
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.script')
</body>
</html>
