@extends('layouts.app')

@section('meta-content')
	<title> Announcements | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Create Announcement
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12">
            <form action="/admin/announcement/store" method="POST">
				@csrf
				<label>Title</label><br>
                <input type="text" class="form-control" name="title" value="{{old('title')}}"><br>
				<label> Blog Summary</label><br>
                <textarea class="form-control" name="caption" required rows="3">{{old('caption')}}</textarea><br>

                <label>Body</label><br>
                <textarea class="form-control" name="body"required rows="10">{{old('body')}}</textarea><br>
              
				{{-- Image upload section --}}
				<div class="form-group">
					<div class="container" style="padding:0px">
						<div class="row" style="padding:0px">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2" id="image_container" style="padding:0px; display:none">
								<img id="output_img" width="100%" height="auto"/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 file-input">
								<input type="file" name="product_image" class="image" accept=".png, .jpg, .jpeg" required="required"/><br><br>
								<input type="hidden" id="base64image" name="base64image">
							</div>
						</div>
					</div>
				</div>
				<button type="submit" value="Post Announcement" class="btn btn-purple-bg">Post Blog</button> &nbsp;
				<a href="/admin/announcements"> 
					<button class="btn btn-purple-bd"> Back to announcement </button>
				</a>
			</form>
		</div>
		<!--withdrawal_left end-->	
	</div><!--section_right_inner end-->
	@include('includes.productImageUpload')
@endsection