
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

    <div class="box row">
      <div class="col-md-6">
        <form action="{{getUrl('post/edit')}}/{{$post->id}}" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Title</label>
            <input id="name" type="text" name="name" placeholder="Nhập tên danh mục" class="form-control" value="{{$post->title}}">
            @if(isset($_SESSION['nameErr']))
            <div class="alert alert-danger">
                   <strong>Error! </strong>{{$_SESSION['nameErr']}}
                  </div>
              @unset($_SESSION['nameErr'])
            @endif
          </div> 
          <div class="form-group">
            <label for="category">Category</label>
            <div>
             <select class="form-control" name="category" id="category">
              @foreach($category as $cate)

              <option value="{{$cate['id']}}" {{$post->cate_id==$cate->id?'selected':''}}>{{$cate->cate_name}}</option>
              @endforeach
            </select>
          </div>
          </div>     
        <div class="form-group">
        <label for="image">Image</label>
        <input name="feature_image" type="file" id="image" class="form-control">
         @if(isset($_SESSION['imageErr']))
            <div class="alert alert-danger">
                   <strong>Error! </strong>{{$_SESSION['imageErr']}}
                  </div>
              @unset($_SESSION['imageErr'])
            @endif           
      </div>
      <div class="form-group">
        <label for="short_detail">Description</label>
        <div>
          <textarea class="form-control" id="short_detail" name="desc">{{$post->description}}</textarea>
        </div>
            @if(isset($_SESSION['descErr']))
            <div class="alert alert-danger">
                   <strong>Error! </strong>{{$_SESSION['descErr']}}
                  </div>
              @unset($_SESSION['descErr'])
            @endif       
      </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="detail">Content</label>
        <div>
          <textarea rows="5" class="form-control ckeditor" id="detail" name="content">{{$post->content}}</textarea>
        </div>
            @if(isset($_SESSION['contentErr']))
            <div class="alert alert-danger">
                   <strong>Error! </strong>{{$_SESSION['contentErr']}}
                  </div>
              @unset($_SESSION['contentErr'])
            @endif
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
  @include('admin.layouts.footer')
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
</div>
<!-- ./wrapper -->

@include('admin.layouts.script')
</body>
</html>

