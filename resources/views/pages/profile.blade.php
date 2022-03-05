@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Profile')}} | {{ __('Dotori')}} </title>
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
			{{ __('Profile Settings')}}
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left">
			<!--form01-->
			<form action="/settings/profile" method="POST">
				@csrf
				<div class="form01">
					<p class="title">{{ __('Profile')}}</p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								{{-- <tr>
									<td> User ID </td>
									<td><input type="text" class="withdrawal_input01" name='member_id' value="test2" disabled></td>
								</tr> --}}
								<tr>
									<td> {{ __('Full Name')}} </td>
									<td><input type="text" class="withdrawal_input01" name='name' value="{{Auth::user()->name}}"> </td>
								</tr>
								<tr>
									<td> {{ __('Email Address')}} </td>
									<td><input type="text" class="withdrawal_input01" name='email' value="{{Auth::user()->email}}" disabled></td>
								</tr>
								<tr>
									<td> {{ __('Phone Number')}} </td>
									<td><input disabled type="text" class="withdrawal_input01" value="{{Auth::user()->phone}}"></td>
									<input type="hidden" name='phone' value="{{Auth::user()->phone}}">
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/>

				<div class="form01">
					<p class="title"> {{ __('Bank Details')}} </p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> {{ __('Bank Name')}} </td>
									<td>
										<input type="text" class="withdrawal_input01" name='bank_name' 
											placeholder="{{ __('Enter bank name')}}" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->bank_name : ""}}"
										/>
									</td>
								</tr>
								
								<tr>
									<td> {{ __('Account Name')}} </td>
									<td>
										<input type="text" class="withdrawal_input01"  name='account_name' 
											placeholder="{{ __('Enter account name')}}" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_name : ""}}"
										/>
									</td>
								</tr>			
								
								<tr>
									<td> {{ __('Account Number')}} </td>
									<td>
										<input type="number" class="withdrawal_input01" name='account_number' 
											placeholder="{{ __('Enter your account number')}}" 
											value="{{Auth::user()->account !== null ? Auth::user()->account->account_number : ""}}"
										/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/><a name="billing_address"></a>

				<div class="form01">
					<p class="title"> {{ __('Billing Address')}} </p> 
					<!--withdrawal_input_box-->
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> {{ __('Address')}} </td>
									<td>
										<input type="text" name="address" class="withdrawal_input01" 
											placeholder="{{ __('Enter address')}}"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->address : ''}}"
											required
										>
									</td>
								</tr>
								<tr>
									<td> {{ __('Address Detail')}} </td>
									<td>
										<input type="text" name="address_detail" class="withdrawal_input01" 
											placeholder="{{ __('Enter your address detail')}}"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->address_detail : ''}}"
											required
										/>
									</td>
								</tr>
								<tr>
									<td> {{ __('Zip Code')}} </td>
									<td>
										<input type="text" name="zip_code" class="withdrawal_input01" 
											placeholder="{{ __('Enter zip code')}}"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->zip_code : ''}}"
											required
										/>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/>

				<!--withdrawal_input_box end-->
				<input type="submit" class="btn btn-light-blue-bg" value="{{ __('Update')}}">
			</form>					
		</div>
		<!--withdrawal_left end-->
	</div>
	<div style="clear:left;" class="col-md-6 col-sm-12 col-12 note-pad jumbotron jumbotron-info">
		@if($referrals < 1)
			<div class="col-md-12 col-12 col-sm-12">
				<div class="col-md-12 col-12 col-sm-12">
					<h2>{{ __('Delete Your Account')}}:</h2>
					<ul class="note-ul">
						<li>
							{{ __('Please note that Deleting your account means removing all your data including your assets from our database.')}}
						</li>
					</ul>
				</div>
				<div class="col-md-6 col-12 col-sm-6 ctrl-btn mt-3">
					<button class="btn btn-purple-bd" type="button" data-bs-toggle="modal" data-bs-target="#delete-account-modal">
						{{ __('Delete account')}}
					</button>
				</div>

				{{-- Modal to confirm account delete --}}
				<div class="modal fade" id="delete-account-modal" tabindex="-1" role="dialog" aria-labelledby="delete-account-label">
					<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="text-blue modal-title" id="delete-account-label">
									{{ __('Delete Account?')}}
								</h4>
								<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<div class="modal-body products">
								<div class="col-md-12 col-sm-12 col-12">
									{{ __('Are you really sure you want to delete your account? 
									Delete action is irreversible')}}
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger" style="padding-left: 30px; padding-right: 30px"
								data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#form-delete-account-modal">
									{{ __('Yes, delete')}}
								</button>
								<button type="button" class="btn btn-light-blue-bg" data-bs-dismiss="modal" aria-label="Close">
									{{ __('No, exit')}}
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
										{{ __('Authenticate Delete Action')}}
									</h4>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body products">
									<div class="col-md-12 col-sm-12 col-12">
										<div class="form-group">
											<span> {{ __('Enter PIN')}} </span>
											<input type="password" class="form-control" name="pin" maxlength="6" required> 
										</div>
										<div class="form-group">
											<span> {{ __('Enter Password')}} </span>
											<input type="password" name="password" class="form-control" required/>
										</div>
									</div>
								</div>

								<div class="modal-footer">
									<button type="submit" class="btn btn-danger" style="padding-left: 30px; padding-right: 30px">
										{{ __('Delete account')}}
									</button>
									<button type="button" class="btn btn-light-blue-bg" data-bs-dismiss="modal" aria-label="Close">
										{{ __('Exit')}}
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		@else
			<div class="col-md-12 col-12 col-sm-12">
				<h2>{{ __('Delete Your Account')}}</h2>
				<p class="referral-link" id="linkBar">
					{{ __('You cannot carry out this action because you have referrals.')}}
				</p>
			</div>
		@endif
	</div>
@endsection