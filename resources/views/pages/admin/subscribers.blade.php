@extends('layouts.app')

@section('meta-content')
	<title> Subscribers | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-users"></i>
            {{$status_type === "pending" ? "Pending Subscriptions" : "Active Subscriptions"}}
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
							@if($status_type === "pending")
								<th> Action </th>
							@endif
						</tr>						

						@if($subscribers->count() > 0)
							@foreach ($subscribers as $subscriber)
								<tr>
									<td>{{$subscriber->user->name}}</td>
									<td> {{$subscriber->package->name}}</td>
									<td> {{$subscriber->quantity}} </td>
									<td> {{$subscriber->status}} </td>
									<td> {{$subscriber->updated_at}} </td>
									@if($status_type === "pending")
										<td> 
											<button type="button" class="btn btn-light-blue-bg" onclick="activatePurchase()">
												activate
											</button>
										</td>
									@endif
								</tr>
								<form action="/admin/subscription/{{$subscriber->id}}/activate" method="POST" id="activate-package-sub-form">
									@csrf
								</form>
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

	<script>
		function activatePurchase(){
			var conf = confirm('Are you sure you want to activate package subscription?');
			if(conf){
				document.getElementById('activate-package-sub-form').submit();
			}
		}
	</script>
@endsection