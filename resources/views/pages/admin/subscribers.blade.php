@extends('layouts.app')

@section('meta-content')
	<title> Subscribers | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-users"></i>
            Subscribers
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Name </th>
							<th> Packages </th>
							<th> Quantity </th>
                            <th> Status </th>
                            <th> Date </th>
						</tr>						

						@if($subscribers->count() > 0)
							@foreach ($subscribers as $subscriber)
								<tr>
									<td>{{$subscriber->user->name}}</td>
									<td> {{$subscriber->package->name}}</td>
									<td> {{$subscriber->quantity}} </td>
									<td> {{$subscriber->status}} </td>
									<td> {{$subscriber->updated_at}} </td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5"> No deposit has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div><!--section_right_inner end-->
@endsection