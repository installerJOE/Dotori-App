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
	<div style="clear:left;" class="col-md-6 col-sm-12 col-12 note-pad jumbotron jumbotron-info">
		@if($referrals < 1)
			<div class="col-md-12 col-12 col-sm-12">
				<div class="col-md-12 col-12 col-sm-12">
					<h2>Delete Your Account:</h2>
					<ul class="note-ul">
						<li>
							Please note that Deleting your account means removing all your
							data including your assets from our database.
						</li>
					</ul>
				</div>
				<div class="col-md-6 col-12 col-sm-6 ctrl-btn mt-3">
					<button class="btn btn-purple-bd" type="button" data-bs-toggle="modal" data-bs-target="#delete-account-modal">
						Delete account
					</button>
				</div>

				{{-- Modal to confirm account delete --}}
				<div class="modal fade" id="delete-account-modal" tabindex="-1" role="dialog" aria-labelledby="delete-account-label">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="text-blue modal-title" id="delete-account-label">
									Delete Account?
								</h4>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body products">
								<div class="col-md-12 col-sm-12 col-12">
									Are you really sure you want to delete your account? 
									Delete action is irreversible
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" style="padding-left: 30px; padding-right: 30px"
								data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#form-delete-account-modal">
									Yes, delete
								</button>
								<button type="button" class="btn btn-light-blue-bg" data-bs-dismiss="modal" aria-label="Close">
									No, exit
								</button>
							</div>
						</div>
					</div>
				</div>

				{{-- Modal to confirm account delete --}}
				<div class="modal fade" id="form-delete-account-modal" tabindex="-1" role="dialog" aria-labelledby="form-delete-account-label">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
						<form action="{{route('user.account.delete')}}" method="POST">
							@csrf
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="text-blue modal-title" id="form-delete-account-label">
										Authenticate Delete Action
									</h4>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body products">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<span> Enter PIN </span>
											<input type="password" class="form-control" name="pin" maxlength="6" required> 
										</div>
										<div class="form-group">
											<span> Enter Password </span>
											<input type="password" name="password" class="form-control" required/>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-danger" style="padding-left: 30px; padding-right: 30px">
										Delete account
									</button>
									<button type="button" class="btn btn-light-blue-bg" data-bs-dismiss="modal" aria-label="Close">
										Exit
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		@else
			<div class="col-md-12 col-12 col-sm-12">
				<h2>Delete Your Account</h2>
				<p class="referral-link" id="linkBar">
					You cannot carry out this action because you have referrals.
				</p>
			</div>
		@endif
	</div>
@endsection