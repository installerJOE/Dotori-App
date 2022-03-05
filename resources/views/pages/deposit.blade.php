@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Deposit Request')}} | {{ __('Dotori')}} </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			{{ __('Deposit')}}
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<a href="/deposits/history"> 
					<button class="btn btn-purple-bd"> {{ __('Deposit history')}} </button>
				</a>
			</div>
		</div>

		<!--withdrawal_left-->
		<div class="withdrawal_left col-md-12 col-sm-12 col-12 mt-4">
			<!--form01-->
			<div class="form01">
				<p class="title">
					{{ __('Deposit Request')}}
				</p>
				<form method='POST' action='/transactions/deposit'>
					@csrf
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> {{ __('Deposit Request Amount')}} ({{ __('KRW')}}) </td>
									<td>
										<input type="number" 
											placeholder="{{ __('Please enter deposit amount')}}" 
											class="withdrawal_input01" 
											name='deposit_amount'
											required
											value="{{old('deposit_amount')}}"
										/>
									</td>
								</tr>
								<tr>
									<td> {{ __('Depositor\'s Bank')}} </td>
									<td>
										<input type="text"
											placeholder="{{ __('Enter your bank name')}}" 
											class="withdrawal_input01" 
											name='bank_name'
											required
											value="{{old('bank_name')}}"
										/>
									</td>
								</tr>
								<tr>
									<td> {{ __('Depositor\'s Name')}} </td>
									<td>
										<input type="text"
											placeholder="{{ __('Enter your account name')}}" 
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
					<input type="submit" class="btn btn-light-blue-bg" value="{{ __('Deposit')}}">
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
				{{ __('Send requested deposit amount to the account below to credit your Dotori account.')}}
			</p>
			<div class="referral-link" style="margin:1em 0px; line-height:2em !important">
				<h3 class="subheader">
					{{ __('Bank Name')}}: 농협 
				</h3>
				<h3 class="subheader">
					{{ __('Account Name')}}:  김병철
				</h3>
				<h3 class="subheader">
					{{ __('Account Number')}}: 302-1363-7061-21
				</h3>
			</div>
			<p style="font-weight:bold" class="text-light-blue">
				{{ __('Your account will be credited after your payment to the above account has been verified and confirmed.')}}
			</p>
		</div>
	</div>
@endsection