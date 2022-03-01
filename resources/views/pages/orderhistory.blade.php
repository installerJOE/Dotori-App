@extends('layouts.app')

@section('meta-content')
	<title> Order History | Dotori </title>
	<style>
		
	</style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			Order History
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
                <a href="/products/shop"> 
                    <button class="btn btn-purple-bd"> Back to shop </button>
                </a>
            </div><br/>
		</div>

		<!--Package_right-->
		<div class="deposit_right col-md-12 col-sm-12 col-12">
			<p class="title">
				<i class="fas fa-fw fa-history"></i>
				My Orders 
			</p>
			<div class="history_table">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th> Purchase ID </th>
							<th> Product </th>
							<th> Price </th>
							<th> Quantity </th>
                            <th> Amount </th>
							<th> Status </th>
							<th> Date </th>
						</tr>

						@if(count($orders) > 0)
							@foreach($orders as $order)
							<tr>
								<td> {{$order->unique_id}} </td>
								<td> {{$order->product->name}}</td>
								<td> {{number_format($order->price)}}</td>
								<td> {{number_format($order->quantity)}} </td>
                                <td> {{number_format($order->quantity * $order->price)}} </td>
                                <td> {{$order->status}}</td>
								<td> {{$order->created_at}} </td>
								{{-- <td> 
									<input 
										type="button" 
										class="btn btn-light-blue-bg" 
										onclick="showPackage(
											`{{$subscribed->id}}`, 
											`{{$subscribed->package->name}}`, 
											`{{(($subscribed->percent_paid + (200*$subscribed->repurchase))/100) * $subscribed->quantity * $subscribed->package->staking_amount}}`,
											`{{$subscribed->status}}`, 
											`{{$subscribed->quantity}}`, 
											`{{$subscribed->percent_paid}}`,
											`{{$subscribed->quantity * $subscribed->package->staking_amount}}`,
											`{{$subscribed->created_at}}`, 
										)"
										value="view"
									/>
								</td> --}}
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="7"> No Package has been subscribed to yet. </td>
							</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal to display all the details of a subscribed package -->
	{{-- <div class="modal fade" id="modal-package-show" tabindex="-1" role="dialog" aria-labelledby="request-withdrawal-label">
		<div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-blue modal-title" id="request-withdrawal-label">
						View Package
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form-validate-withdrawal" method="POST" action="/package/repurchase">
						@csrf
						<div>
							<p class="modal-package-header light-blue-bg"> Package </p>
							<h3 id="package_name"></h3>
						</div>
						<div>
							<p class="modal-package-header grey-bg"> Quantity </p>
							<h3 id="quantity"></h3>
						</div>
						<div>
							<p class="modal-package-header orange-bg"> Accumulated Profit (PTS) </p>
							<h3 id="profit"></h3>
						</div>
						<div>
							<p class="modal-package-header light-blue-bg"> Package Status </p>
							<h3 id="status"></h3>
						</div>
						<div>
							<p class="modal-package-header grey-bg"> Percent Paid (%) </p>
							<h3 id="percent_paid"></h3>
						</div>
						<div>
							<p class="modal-package-header orange-bg"> Staking Amount (KRW) </p>
							<h3 id="total_paid"></h3>
						</div>
						<div>
							<p class="modal-package-header light-blue-bg"> Subscription Date </p>
							<h3 id="date_created"></h3>
						</div><br/>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="repurchase-btn" class="btn btn-purple-bg">
						Repurchase
					</button> 
					<button type="button" class="btn btn-purple-bd" onclick="cancelSub()">
						Stop earning and withdraw
					</button>
				</div>
			</div>
		</div>
	</div> --}}
@endsection