@extends('layouts.app')

@section('meta-content')
	<title> {{$announcement->title}} | Dotori </title>
    <style>
        .withdrawal_left{
            width:100%;
        }
    </style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			{{$announcement->title}}
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner" style="width:100%"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12">
            <div class="col-md-4 col-sm-6 col-9 mb-4">
                <img src="{{asset('announcements/' . $announcement->image_url)}}" width="100%" height="auto"/>
            </div>
            <div class="col-md-12 col-sm-12 col-12">
                <p style="font-size:21px">
                    {!!$announcement->body!!}
                </p>
            </div>
		</div>
        <div class="col-md-12 col-12 col-sm-12 mt-4">
            <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<a href="/admin/announcements/{{$announcement->slug}}/edit"> 
					<button class="btn btn-purple-bg"> Edit post </button>
				</a> &nbsp;
                
                <button class="btn btn-purple-bd" onclick="deletePost()"> Delete post </button>
				
                <form action="/admin/announcements/{{$announcement->id}}/delete" method="POST" id="delete-post-form">
                    @csrf
                </form>
			</div>
        </div>
		<!--withdrawal_left end-->	
	</div><!--section_right_inner end-->
	@include('includes.productImageUpload')

    <script>
        function deletePost(){
            var confirmDel = confirm('Are you sure you want to delete announcement? Delete action cannot be reversed.')
            if(confirmDel){
                document.getElementById('delete-post-form').submit()
            }
        }
    </script>
@endsection