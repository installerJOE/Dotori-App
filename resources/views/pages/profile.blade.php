@extends('layouts.app')

@section('meta-content')
	<title> Profile | Dotori </title>
	<style>
		.sub_title img {
			float: left;
			margin-top: 10px;
			margin-right: 5px;
		}
	</style>	
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-user-cog"></i>
			Profile Settings
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left">
			<!--form01-->
			<form action="/settings/profile" method="POST">
				@csrf
				<div class="form01">
					<p class="title">Profile</p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								{{-- <tr>
									<td> User ID </td>
									<td><input type="text" class="withdrawal_input01" name='member_id' value="test2" disabled></td>
								</tr> --}}
								<tr>
									<td> Full Name </td>
									<td><input type="text" class="withdrawal_input01" name='name' value="{{Auth::user()->name}}"> </td>
								</tr>
								<tr>
									<td> Email Address </td>
									<td><input type="text" class="withdrawal_input01" name='email' value="{{Auth::user()->email}}" disabled></td>
								</tr>
								<tr>
									<td> Phone Number </td>
									<td><input disabled type="text" class="withdrawal_input01" value="{{Auth::user()->phone}}"></td>
									<input type="hidden" name='phone' value="{{Auth::user()->phone}}">
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/>

				<div class="form01">
					<p class="title"> Bank Details </p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> Bank Name </td>
									<td>
										<input type="text" class="withdrawal_input01" name='bank_name' 
											placeholder="Enter bank name" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->bank_name : ""}}"
										/>
									</td>
								</tr>
								
								<tr>
									<td> Account Name </td>
									<td>
										<input type="text" class="withdrawal_input01"  name='account_name' 
											placeholder="Enter account name" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_name : ""}}"
										/>
									</td>
								</tr>			
								
								<tr>
									<td> Account Number </td>
									<td>
										<input type="number" class="withdrawal_input01" name='account_number' 
											placeholder="Enter your account number" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_number : ""}}"
										/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/><a name="billing_address"></a>

				<div class="form01">
					<p class="title"> Billing Address </p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> Street Address </td>
									<td>
										<input type="text" name="street" class="withdrawal_input01" 
											placeholder="Enter street address"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->street : ''}}"
										>
									</td>
								</tr>
								<tr>
									<td> City </td>
									<td>
										<input type="text" name="city" class="withdrawal_input01" 
											placeholder="Enter name of your city"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->city : ''}}"
										/>
									</td>
								</tr>
								<tr>
									<td> State/Province </td>
									<td>
										<input type="text" name="state" class="withdrawal_input01" 
											placeholder="Enter your state/province"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->state : ''}}"
										/>
									</td>
								</tr>
								<tr>
									<td> Country </td>
									<td>
										<input type="text" name="country" class="withdrawal_input01" 
											placeholder="Enter your country"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->country : ''}}"
										/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/>

				<!--withdrawal_input_box end-->
				<input type="submit" class="btn btn-light-blue-bg" value="Update">
			</form>
		</div>
		<!--withdrawal_left end-->
	</div>
@endsection