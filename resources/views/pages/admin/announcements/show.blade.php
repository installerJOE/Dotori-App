@extends('layouts.app')

@section('meta-content')
	<title> {{$announcement->title}} | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			{{$announcement->title}}
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12">
            <p>
                {!!$announcement->body!!}
            </p>
		</div>
		<!--withdrawal_left end-->	
	</div><!--section_right_inner end-->
	@include('includes.productImageUpload')
@endsection