@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Shopping History')}} | {{ __('Dotori')}} </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
            {{ __('Shopping History')}}
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> {{ __('ID')}} </th>
                            <th> {{ __('Product Name')}} </th>
							<th> {{ __('Price (SPOINT)')}} </th>
                            <th> {{ __('Quantity')}} </th>
                            <th> {{ __('Amount')}} (SPOINT) </th>
							<th> {{ __('Address')}} </th>
                            <th> {{ __('Address Detail')}} </th>
                            <th> {{ __('Zip Code')}} </th>
                            <th> {{ __('Status')}} </th>
                            <th> {{ __("Date")}} </th>
						</tr>						

						@if($orders->count() > 0)
							@foreach ($orders as $order)
								<tr>
									<td>{{$order->unique_id}}</td>
									<td>{{$order->product->name}}</td>
									<td>{{$order->price}}</td>
                                    <td>{{$order->quantity}}</td>
                                    <td>{{$order->price * $order->quantity}}</td>
									<td>{{$order->delivery_address->address}}</td>
									<td>{{$order->delivery_address->address_detail}}</td>
									<td>{{$order->delivery_address->zip_code}}</td>
									<td>{{$order->status}}</td>
									<td>{{$order->created_at}}</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="10" style="font-size:24px"> {{ __('No deposit has been made yet.')}} </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			@if($orders->count() > 0)
				<div class="mt-2">
					<hr/>
					{{$orders->links("pagination::bootstrap-4")}}
				</div>
			@endif
		</div>
	</div><!--section_right_inner end-->
@endsection