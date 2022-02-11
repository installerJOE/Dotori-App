@extends('layouts.app')

@section('meta-content')
	<title> Withdrawal | Dotori </title>
@endsection

@section('content')
	<!--section_right_inner-->
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-share-square"></i>
			Withdrawal
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner">
		<!--withdrawal_left-->
		<div class="withdrawal_left">
			<div class="form01">
				<p class="title"> Withdraw Funds </p> 
				<!--total_box-->
				<div class="total_box">
					{{-- <div class="total_box_inner"> --}}
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td style="font-weight:bold"> Available Amount (KRW)</td>
									<td>
										{{Auth::user()->available_points}}
										<input type="hidden" value="290" id="available_amount"/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div style="margin-top: 15px;">
					<span class="text-red" id="insufficientErrorMessage"></span>
				</div>

				<form action="/transactions/withdraw" method="POST" id="withdraw-request-form">
					@csrf
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> Withdraw Amount (KRW) </td>
									<td>
										<input type="number" 
											placeholder="Enter amount to withdraw" 
											class="withdrawal_input01" 
											name='withdrawal_amount' 
											id="withdrawal_amount"
											placeholder="0.00"
											oninput="calc_fee(this.value)"
											required
											value="{{old('withdrawal_amount')}}"
										/>
									</td>
								</tr>
										
								<tr>
									<td> Fee (0.5% of Withdraw Amount) </td>
									<td>
										<input type="number" 
											class="withdrawal_input01" 
											id="withdrawal_fee" 
											disabled
											placeholder="0.00"
											value="{{old('fee')}}"
										/>
										<input type="hidden" name='fee' id="form_withdraw_fee" value="{{old('fee')}}">
									</td>
								</tr>
									
								<tr>
									<td> Total Amount (KRW) </td>
									<td>
										<input type="number" 
											id="total_amount" 
											class="withdrawal_input01" 
											disabled
											placeholder="0.00"
											value="{{old('total_amount')}}"
										/>
										<input type="hidden" id='form_total_amount' name="total_amount" value="{{old('total_amount')}}">
									</td>
								</tr>
										
								<tr>
									<td>Bank Name </td>
									<td>
										<input type="text" class="withdrawal_input01" 
											name='bank_name' placeholder="Enter the name of your Bank"
											value="{{Auth::user()->account !== null ? Auth::user()->account->bank_name : ""}}"
											required
										/>
									</td>
								</tr>
								
								<tr>
									<td> Account Name</td>
									<td>
										<input type="text" class="withdrawal_input01" 
											name='account_name' placeholder="Enter your account name"
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_name : ""}}"
											required
										/>
									</td>
								</tr>

								<tr>
									<td>Account Number </td>
									<td>
										<input type="text" class="withdrawal_input01" 
											name='account_number' placeholder="Enter your account number"
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_number : ""}}"
											required
										/>
									</td>
								</tr>

								<tr>
									<td> PIN (6-digit Number) </td>
									<td>
										<input type="password" placeholder="Enter PIN" class="withdrawal_input01" 
                                        name="pin" maxlength="6" pattern="[0-9]{6}" required>
									</td>
								</tr>
							</tbody>
						</table>
					</div> <br/>
					
					<!--withdrawal_input_box end-->
					<input type="button" class="btn btn-light-blue-bg" onclick="validateRequest()" value="Withdraw">
				</form>
			</div>
		</div>
		<!--withdrawal_left end-->

		<!--Withdrawal_right-->
		<div class="deposit_right">
			<p class="title">
				<i class="fas fa-fw fa-history"></i>
				Withdrawal History 
			</p>
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Amount (KRW) </th>
							<th> Date </th>
							<th> Status </th>
						</tr>

						@if($withdrawals->count() > 0)
							@foreach($withdrawals as $withdrawal)
							<tr>
								<td> {{$withdrawal->amount}} </td>
								<td> {{$withdrawal->updated_at}}</td>
								<td> {{$withdrawal->status}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3"> No withdrawal has been made yet. </td>
							</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
		<!--Withdrawal_right end-->
	</div>
	<!--section_right_inner end-->
	<div style="clear:left;" class="col-md-6 col-sm-12 col-12 note-pad">
		<div>
			<h2>Note:</h2>
			<p>
				You can only withdraw once each day. Withdrawals are processed on Mondays, Wednesdays and Fridays.
			</p>
		</div>
	</div>

	<script>
		function calc_fee(values){	
			// var amount_to_withdraw = document.getElementById('withdrawal_amount').value;
			var withdrawal_fee = document.getElementById('withdrawal_fee');
			var total_amount = document.getElementById('total_amount');	
			var balance_ok = checkBalance();
			if(balance_ok){
				document.getElementById('insufficientErrorMessage').innerHTML = ""
				var fee = Number(values) * Number(0.5) / 100;
				withdrawal_fee.value = fee;
				total_amount.value = Number(values) - Number(fee);
				document.getElementById('form_withdraw_fee').value = fee;
				document.getElementById('form_total_amount').value = total_amount.value;
			}
			else{
				withdrawal_fee.value = "";
				total_amount.value = "";
				document.getElementById('insufficientErrorMessage').innerHTML = "*Oops! Insufficient Balance."
			}
		}

		function checkBalance(){
			var available_amount = document.getElementById('available_amount').value;
			var amount_to_withdraw = document.getElementById('withdrawal_amount').value;
			if(Number(available_amount) < Number(amount_to_withdraw)){
				return false;
			}
			return true;
		}

		function validateRequest(){
			var balance_ok = checkBalance();
			if(balance_ok){
				document.getElementById("withdraw-request-form").submit();
			}
		}	

	</script>
@endsection