@extends('layouts.app')

@section('meta-content')
	<title> Announcements | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Announcements
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<a href="/admin/announcement/create"> 
					<button class="btn btn-purple-bd"> {{ __('Compose announcement')}} </button>
				</a>
			</div>
		</div><br/>

		<div class="section_right_inner"><!--section_right_inner-->
			<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
				<div class="history_table">
					<table>
						<tbody>
							<tr>
								<th> {{ __('Title')}} </th>
								<th> {{ __('Caption')}} </th>
								<th> {{ __('Body')}} </th>
								<th> {{ __('Action')}} </th>
								<th> {{ __('Date')}} </th>
							</tr>						
	
							@if($announcements->count() > 0)
								@foreach ($announcements as $announcement)
									<tr>
										<td>{{$announcement->title}}</td>
										<td>{{$announcement->caption}}</td>
										<td>{{$announcement->body}}</td>
										<td>
											<a href="/admin/announcements/{{$announcement->slug}}">
												<button type="button" class="btn btn-light-blue-bg">
													{{ __('View')}}
												</button>
											</a>
										</td>
										<td>{{$announcement->created_at}}</td>
									</tr>
								@endforeach
							@else
								<tr>
									<td colspan="10" style="font-size:24px"> {{ __('No Announcement has been made yet.')}} </td>
								</tr>
							@endif
						</tbody>
					</table>
				</div>
			</div>
		</div><!--section_right_inner end-->
	</div><!--section_right_inner end-->
@endsection