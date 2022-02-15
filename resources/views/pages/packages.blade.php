@extends('layouts.app')

@section('meta-content')
	<title> Purchase Package | Dotori </title>
	<style>
		.modal-package-header{
			padding: 10px;
		}
		.modal-package-header ~ h3{
			margin-bottom: 0.5em;
			margin-top:10px;
			margin-left:10px
		}
	</style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			My Subscribed Packages
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
                <a href="/packages/subscribe"> 
                    <button class="btn btn-purple-bd"> Purchase package </button>
                </a>
            </div><br/>
		</div>

		<!--Withdrawal_right-->
		<div class="deposit_right col-md-12 col-sm-12 col-12">
			<p class="title">
				<i class="fas fa-fw fa-history"></i>
				My Subscribed Packages 
			</p>
			<div class="history_table">
				<table class="table table-striped">
					<tbody>
						<tr>
							<th> Package </th>
							<th> Quantity </th>
							<th> Total Amount </th>
							<th> Status </th>
							<th> Total Profits </th>
							<th> Earning Cycle </th>
							<th> Date </th>
							<th> Action </th>
						</tr>

						@if($subscribed_packages->count() > 0)
							@foreach($subscribed_packages as $subscribed)
							<tr>
								<td> {{$subscribed->package->name}} </td>
								<td> {{$subscribed->quantity}}</td>
								<td> {{$subscribed->quantity * $subscribed->package->staking_amount}}</td>
								<td> {{$subscribed->status}}</td>
								<td> {{($subscribed->percent_paid/100) * $subscribed->quantity * $subscribed->package->staking_amount}}</td>
								<td> {{$subscribed->percent_paid < 200 ? "progress" : "completed"}} </td>
								<td> {{$subscribed->created_at}} </td>
								<td> 
									<input 
										type="button" 
										class="btn btn-light-blue-bg" 
										onclick="showPackage(
											`{{$subscribed->package->id}}`, 
											`{{$subscribed->package->name}}`, 
											`{{($subscribed->percent_paid/100) * $subscribed->quantity * $subscribed->package->staking_amount}}`,
											`{{$subscribed->status}}`, 
											`{{$subscribed->quantity}}`, 
											`{{$subscribed->percent_paid}}`,
											`{{$subscribed->quantity * $subscribed->package->staking_amount}}`,
											`{{$subscribed->created_at}}`, 
										)"
										value="view"
									/>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3"> No Package has been subscribed to yet. </td>
							</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal to display all the details of a withdrawal request -->
	<div class="modal fade" id="modal-package-show" tabindex="-1" role="dialog" aria-labelledby="request-withdrawal-label">
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
							<p class="modal-package-header orange-bg"> Accumulated Profit </p>
							<h3 id="profit"></h3>
						</div>
						<div>
							<p class="modal-package-header light-blue-bg"> Package Status </p>
							<h3 id="status"></h3>
						</div>
						<div>
							<p class="modal-package-header grey-bg"> Percent Paid </p>
							<h3 id="percent_paid"></h3>
						</div>
						<div>
							<p class="modal-package-header orange-bg"> Total Amount Paid </p>
							<h3 id="total_paid"></h3>
						</div>
						<div>
							<p class="modal-package-header light-blue-bg"> Subscription Date </p>
							<h3 id="date_created"></h3>
						</div><br/>

						<input type="hidden" id="package_id" name="package_id"/>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" id="repurchase-btn" class="btn btn-purple-bg" onclick="validateWithdraw()">
						Repurchase
					</button> 
					<button type="button" class="btn btn-purple-bg" onclick="cancelSub()">
						Cancel Subscription
					</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		function showPackage(package_id, package_name, profit, status, quantity, percent_paid, total_amount, date_created)
		{
			document.getElementById('package_id').value = package_id;
			document.getElementById('package_name').innerHTML = package_name;
			document.getElementById('profit').innerHTML= profit;
			document.getElementById('status').innerHTML = status;
			document.getElementById('quantity').innerHTML = quantity;
			document.getElementById('percent_paid').innerHTML = percent_paid;
			document.getElementById('total_paid').innerHTML = total_amount;
			document.getElementById('date_created').innerHTML = date_created;
			var $modal;
			$modal = $('#modal-package-show');
			$modal.modal('show');
			if(percent_paid < 200){
				document.getElementById('repurchase-btn').style.display = "none"
			}
		}
	</script>
@endsection