@extends('layouts.app')

@section('meta-content')
	<title> Shopping History | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
            Shopping History
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> ID </th>
                            <th> Product Name </th>
							<th> Price (SPOINT) </th>
                            <th> Quantity </th>
                            <th> Amount (SPOINT) </th>
							<th> Address </th>
                            <th> City </th>
                            <th> State/Province </th>
                            <th> Country </th>
                            <th> Status </th>
                            <th> Date </th>
						</tr>						

						@if($orders->count() > 0)
							@foreach ($orders as $order)
								<tr>
									<td>{{$order->unique_id}}</td>
									<td>{{$order->product->name}}</td>
									<td>{{$order->price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price * $order->quantity}}</td>
									<td>{{$order->delivery_address->street}}</td>
									<td>{{$order->delivery_address->city}}</td>
									<td>{{$order->delivery_address->state}}</td>
									<td>{{$order->delivery_address->country}}</td>
									<td>{{$order->status}}</td>
									<td>{{$order->created_at}}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="10" style="font-size:24px"> No deposit has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div><!--section_right_inner end-->
@endsection