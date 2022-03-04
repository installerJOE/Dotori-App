@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Announcements | Dotori')}} </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			{{ __('Edit Announcement')}}
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12">
            <form action="/admin/announcements/{{$announcement->id}}/update" method="POST">
				@csrf
                <div class="form-group">
                    <label>{{__('Title')}}</label><br>
                    <input type="text" class="form-control" name="title" value="{{$announcement->title}}"><br>
                </div>
				
                <div class="form-group">
                    <label> {{ __('Caption')}} </label><br>
                    <textarea class="form-control" name="caption" required rows="3">{{$announcement->caption}}</textarea><br>
                </div>

                <div class="form-group">
                    <label>{{ __('Body')}}</label><br>
                    <textarea class="form-control" name="body"required rows="10">{{$announcement->body}}</textarea><br>
                </div>

				{{-- Image upload section --}}
				<div class="form-group">
					<div class="container" style="padding:0px">
						<div class="row" style="padding:0px">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2" id="image_container" style="padding:0px; margin-left:12px">
								<img id="output_img" width="100%" height="auto" src="{{asset('announcements/' . $announcement->image_url)}}"/>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 file-input">
								<input type="file" name="product_image" class="image" accept=".png, .jpg, .jpeg"/><br><br>
								<input type="hidden" id="base64image" name="base64image">
							</div>
						</div>
					</div>
				</div>
				<button type="submit" class="btn btn-purple-bg">{{ __('Update Announcement')}}</button> &nbsp;
				<a href="/admin/announcements"> 
					<button class="btn btn-purple-bd"> {{ __('Back to announcement')}} </button>
				</a>
			</form>
		</div>
		<!--withdrawal_left end-->	
	</div><!--section_right_inner end-->
	@include('includes.productImageUpload')
@endsection