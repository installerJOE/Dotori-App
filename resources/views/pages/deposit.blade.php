@extends('layouts.app')

@section('meta-content')
	<title> Deposit Request | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Deposit
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<a href="/deposits/history"> 
					<button class="btn btn-purple-bd"> Deposit history </button>
				</a>
			</div>
		</div>

		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12 mt-4">
			<!--form01-->
			<div class="form01">
				<p class="title">
					Deposit Request
				</p>
				<form method='POST' action='/transactions/deposit'>
					@csrf
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> Deposit Request Amount (KRW) </td>
									<td>
										<input type="number" 
											placeholder="Please enter deposit amount" 
											class="withdrawal_input01" 
											name='deposit_amount'
											required
											value="{{old('deposit_amount')}}"
										/>
									</td>
								</tr>
								<tr>
									<td> Depositor's Bank </td>
									<td>
										<input type="text"
											placeholder="Enter your bank name" 
											class="withdrawal_input01" 
											name='bank_name'
											required
											value="{{old('bank_name')}}"
										/>
									</td>
								</tr>
								<tr>
									<td> Depositor's Name </td>
									<td>
										<input type="text"
											placeholder="Enter your account name" 
											class="withdrawal_input01" 
											name='account_name' 
											value="{{old('account_name')}}"
											required
										/>
									</td>
								</tr>
							</tbody>
						</table>
					</div><br/>
					<!--withdrawal_input_box end-->
					<input type="submit" class="btn btn-light-blue-bg" value="Deposit">
				</form>
			</div>
			<!--form01 end-->
		</div>
		<!--withdrawal_left end-->	
	</div><!--section_right_inner end-->

	<!--section_right_inner end-->
	<div style="clear:left;" class="col-md-6 col-sm-12 col-12 note-pad">
		<div>
			<p style="font-weight:bold">
				Send requested deposit amount to the account below to credit your Dotori 
				account.
			</p>
			<div class="referral-link" style="margin:1em 0px; line-height:2em !important">
				<h3 class="subheader">
					Bank Name: Dotori Bank LTD
				</h3>
				<h3 class="subheader">
					Account Name:  Dotori
				</h3>
				<h3 class="subheader">
					Account Number: 5627891728
				</h3>
			</div>
			<p style="font-weight:bold" class="text-light-blue">
				Your account will be credited after your payment to the above account has 
				been verified and confirmed.
			</p>
		</div>
	</div>
@endsection