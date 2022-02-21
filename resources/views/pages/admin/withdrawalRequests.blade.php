@extends('layouts.app')

@section('meta-content')
	<title> Deposit History | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	Withdrawal Requests
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/admin/withdrawals"> 
                <button class="btn btn-purple-bd"> Withdrawals history </button>
            </a>
        </div><br/>

		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Name of Member </th>
                            <th> Withdrawal Amount </th>
                            <th> Bank Name </th>
                            <th> Account Holder </th>
                            <th> Account Number </th>
                            <th> Status </th>
							<th> Date </th>
							<th> Action </th>
						</tr>						
						@if($withdrawals->count() > 0)
							@foreach($withdrawals as $withdrawal)
							<tr>
								<td> {{$withdrawal->user->name}} </td>
								<td> {{$withdrawal->amount}}</td>
								<td> {{$withdrawal->bank_name}}</td>
								<td> {{$withdrawal->account_name}}</td>
								<td> {{$withdrawal->account_number}}</td>
								<td> {{$withdrawal->status}} </td>
								<td> {{$withdrawal->updated_at}} </td>
								<td> 
									<input type="button" 
										class="btn btn-light-blue-bg" 
										onclick="showWithdrawalModal(
											`{{$withdrawal->id}}`, 
											`{{$withdrawal->user->name}}`, 
											`{{$withdrawal->amount}}`, 
											`{{$withdrawal->bank_name}}`, 
											`{{$withdrawal->account_name}}`, 
											`{{$withdrawal->account_number}}`,
											`{{$withdrawal->status}}`, 
											`{{$withdrawal->updated_at}}`
										)"
										value="View"
									/>
								</td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5"> There are no new withdrawal requests yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			<hr>
			@if($withdrawals->count() > 0)
				<div class="mt-2 mb-4">
					<hr/>
					{{$withdrawals->links("pagination::bootstrap-4")}}
				</div>
			@endif
		</div>
	</div><!--section_right_inner end-->

	<!-- Modal to display all the details of a withdrawal request -->
	<div class="modal fade" id="modal-request-withdrawal" tabindex="-1" role="dialog" aria-labelledby="request-withdrawal-label">
		<div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-blue modal-title" id="request-withdrawal-label">
						Withdrawal Request
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form-validate-withdrawal" method="POST" action="/admin/withdrawal/validate">
						@csrf

						<div class="form-group">
							<span> 
								Dotori Account Name
							</span>
							<input type="text" 
								disabled
								class="form-control" 
								id='dotori_name'
							/>
						</div>
						
						<div class="form-group">
							<span> 
								Withdrawal Amount (KRW)
							</span>
							<input type="number" 
								disabled
								class="form-control" 
								id='withdrawal_amount'
							/>
						</div>

						<div class="form-group">
							<span> 
								Bank Name
							</span>
							<input type="text"
								disabled
								class="form-control" 
								id='bank_name'
							/>
						</div>

						<div class="form-group">
							<span>
								Account Name
							</span>
							<input type="text" 
								disabled
								class="form-control" 
								id="account_name" 
							/>
						</div>

						<div class="form-group">
							<span> 
								Account Number
							</span>
							<input type="text"
								disabled
								class="form-control" 
								id='account_number'
							/>
						</div>

						<div class="form-group">
							<span>
								Withdrawal Status
							</span>
							<input type="text" 
								disabled
								class="form-control" 
								id="withdrawal_status" 
							/>
						</div>

						<div class="form-group">
							<span>
								Date of Request
							</span>
							<input type="text" 
								disabled
								class="form-control" 
								id="date" 
							/>
						</div>

						<input type="hidden" id="withdrawal_transaction_id" name="withdrawal_id"/>
						<button type="button" class="btn btn-purple-bg" onclick="validateWithdraw()">
							Make payment	
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>


	<script>
		function showWithdrawalModal(id, name, amount, bank, account, account_no, status, date){
			document.getElementById('dotori_name').value = name;
			document.getElementById('withdrawal_amount').value = amount;
			document.getElementById('bank_name').value = bank;
			document.getElementById('account_name').value = account;
			document.getElementById('account_number').value = account_no;
			document.getElementById('withdrawal_status').value = status;
			document.getElementById('date').value = date;
			document.getElementById('withdrawal_transaction_id').value = id;
			var $modal;
			$modal = $('#modal-request-withdrawal');
			$modal.modal('show');
		}	

		function validateWithdraw(){
			var confirmVal = confirm("Are you sure you have credited the bank account holder?");
			if(confirmVal){
				document.getElementById('form-validate-withdrawal').submit();
			}
		}
	</script>

@endsection