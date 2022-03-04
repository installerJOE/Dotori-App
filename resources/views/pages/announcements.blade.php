@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Announcements')}} | {{ __('Dotori')}} </title>
	<style>
		.post-section{
			margin-bottom: 2em;
			padding-bottom: 10px;
			border-bottom: 1px solid #d9d9d9;
		}
		.post-section > div{
			padding: 10px;
		}
	</style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			{{ __('Announcements')}}
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="section_right_inner"><!--section_right_inner-->
			<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
				@if($announcements->count() > 0)
					@foreach ($announcements as $announcement)
						<div class="post-section col-md-12 col-lg-11">
							<div class="col-md-4 col-sm-4 col-12">
								<img src="{{asset('announcements/' . $announcement->image_url)}}" alt="profile image" width="100%"/>
							</div>
							<div class="col-md-8 col-sm-8 col-12 blog-content">
								<h2>
									{{$announcement->title}}
								</h2>
								<p>
									{{Str::words($announcement->caption, 20, ' . . .')}}
								</p>
								<p style="margin-top:1.3em;" class="col-md-3 col-sm-4 col-6">
									<button class="btn btn-light-blue-bg" data-bs-toggle="modal" data-bs-target="#edit-package-modal-{{$announcement->id}}">
										{{ __('Read more')}}
									</button>
								</p>
							</div>
						</div>

						<!-- Modal containing a form to edit package -->
						<div class="modal fade" id="edit-package-modal-{{$announcement->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-package-label-{{$announcement->id}}">
							<div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="text-blue modal-title" id="create-package-label-{{$announcement->id}}">
											{{ __('Announcement')}}
										</h4>
										<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body">
										<div class="col-md-6 col-sm-6 col-9 mb-4">
											<img src="{{asset('announcements/' . $announcement->image_url)}}" width="100%" height="auto"/>
										</div>
										<div class="col-md-12 col-sm-12 col-12">
											<h1> {{$announcement->title}} </h1>
											<p style="font-size:21px">
												{!!$announcement->body!!}
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>

					@endforeach
				@else
					<h3 style="font-size:24px"> 
						{{ __('No Announcement has been made yet.')}} 
					</h3>
				@endif
			</div>
		</div><!--section_right_inner end-->
	</div><!--section_right_inner end-->
@endsection