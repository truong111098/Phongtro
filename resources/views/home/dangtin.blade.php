@extends('layouts.master')
@section('content')
<div class="gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-8">
			<h1 class="entry-title entry-prop">Đăng tin Phòng trọ</h1>
			<hr>
			<div class="panel panel-default">
				<div class="panel-heading">Thông tin bắt buộc*</div>
				<div class="panel-body">
					<div class="gap"></div>
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
					@if(session('warn'))
          <div class="alert bg-danger">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Error!</span>  {{session('warn')}}
          </div>
          @endif
          @if(session('success'))
					<div class="alert bg-success">
						<button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
						<span class="text-semibold">Done!</span>  {{session('success')}}
					</div>
					@endif
          @if(Auth::user()->tinhtrang != 0)
					<form action="{{ route ('user.dangtin') }}" method="POST" enctype="multipart/form-data" >
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="form-group">
							<label for="usr">Tiêu đề bài đăng:</label>
							<input type="text" class="form-control" name="txttitle">
						</div>
						<div class="form-group">
							<label>Địa chỉ phòng trọ:</label>
							<input type="text" id="location-text-box" name="txtaddress" class="form-control" value="" />
              <!-- <p><i class="far fa-bell"></i> Nếu địa chỉ hiển thị bên bản đồ không đúng bạn có thể điều chỉnh bằng cách kéo điểm màu xanh trên bản đồ tới vị trí chính xác.</p> -->
              <!-- <input type="hidden" id="txtaddress" name="txtaddress" value=""  class="form-control"  />
              <input type="hidden" id="txtlat" value="" name="txtlat"  class="form-control"  />
              <input type="hidden" id="txtlng"  value="" name="txtlng" class="form-control" /> -->
            </div>
            <!-- <div id="map-canvas" style="width: auto; height: 400px;"></div> -->
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">Giá phòng( vnđ ):</label>
                  <input type="number" name="txtprice" class="form-control" placeholder="750000" >
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="usr">Diện tích( m<sup>2</sup> ):</label>
                  <input type="number" name="txtarea" class="form-control" placeholder="16">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">Xã / Phường:</label>
                  <select class="selectpicker pull-right" data-live-search="true" name="iddistrict">
                    @foreach($district as $quan)
                    <option data-tokens="{{$quan->slug}}" value="{{ $quan->id }}">{{ $quan->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">Danh mục:</label>
                  <select class="selectpicker pull-right" data-live-search="true" class="form-control" name="idcategory"> 
                    @foreach($categories as $category)
                    <option data-tokens="{{$category->slug}}" value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="usr">SĐT Liên hệ:</label>
                  <input type="text" name="txtphone" class="form-control" placeholder="0915111234">
                </div>
              </div>
            </div> 
            <div class="form-group">
              <!-- ************** Max Items Demo ************** -->
              <label>Các tiện ích có trong phòng trọ:</label>
              <select id="select-state" name="tienich[]" multiple class="demo-default" placeholder="Chọn các tiện ích phòng trọ">
                <option value="Wifi miễn phí">Wifi miễn phí</option>
                <option value="Có gác lửng">Có gác lửng</option>
                <option value="Tủ + giường">Tủ + giường</option>
                <option value="Không chung chủ">Không chung chủ</option>
                <option value="Chung chủ" >Chung chủ</option>
                <option value="Giờ giấc tự do">Giờ giấc tự do</option>
                <option value="Vệ sinh riêng">Vệ sinh riêng</option>
                <option value="Vệ sinh chung">Vệ sinh chung</option>
              </select>
            </div>
            <div class="form-group">
              <label for="comment">Mô tả ngắn:</label>
              <textarea class="form-control" rows="5" name="txtdescription" style=" resize: none;"></textarea>
            </div>
            <div class="form-group">
              <label for="comment">Thêm hình ảnh:</label>
              <div class="file-loading">
                <input id="file-5" type="file" class="file" name="hinhanh[]" multiple data-preview-file-type="any" data-upload-url="#">
              </div>
            </div>
            
            <button class="btn btn-primary">Đăng Tin</button>
          </form>
          @else
          <div class="alert bg-danger">
            <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Error!</span>  Tài khoản của bạn đang bị khóa đăng tin.
          </div>
          @endif
        </div>
      </div>
    </div>
    <div class="col-md-4">
     <div class="contactpanel">
      <div class="row">
       <div class="col-md-4 text-center">
        <img src="assets/images/noavt.png" class="img-circle" alt="Cinque Terre" width="100" height="100"> 
      </div>
      <div class="col-md-8">
        <h4>Thông tin người đăng</h4>
        <strong> {{ Auth::user()->name }}</strong><br>
        <i class="far fa-clock"></i> Ngày tham gia: {{ Auth::user()->created_at }}	

      </div>
    </div>
  </div>
  
  <div class="gap"></div>
  <!-- <img src="images/banner-1.png" width="100%"> -->
</div>
</div>
</div>
<script type="text/javascript">
  $('#file-5').fileinput({
    theme: 'fa',
    language: 'vi',
    showUpload: false,
    allowedFileExtensions: ['jpg', 'png', 'gif']
  });
</script>

<script type="text/javascript" src="assets/js/selectize.js"></script>
<script>
  $(function() {
    $('select').selectize(options);
  });
  $('#select-state').selectize({
    maxItems: null
  });
</script>
@endsection