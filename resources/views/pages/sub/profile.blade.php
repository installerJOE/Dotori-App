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
	<div id="wrap">
		@include('includes.sidebar')	
		<div class="section_right"><!--section_right-->
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
					<div class="form01">
						<p class="title">Profile</p> 
						<!--total_box-->

						<form>
							@csrf
							<!--withdrawal_input_box-->
							<div class="withdrawal_input_box">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td> User ID </td>
											<td><input type="text" class="withdrawal_input01" name='userid' value="test2" readonly></td>
										</tr>
										<tr>
											<td> Full Name </td>
											<td><input type="text"class="withdrawal_input01" readonly name='name' value="Joe Mike"> </td>
										</tr>
										<tr>
											<td> Email Address </td>
											<td><input type="text" class="withdrawal_input01" name='email' value="joemike@gmail.com"></td>
										</tr>

										<tr>
											<td> Bank Name </td>
											<td><input type="text" class="withdrawal_input01" name='b_name' placeholder="Enter bank name"></td>
										</tr>
											
										<tr>
											<td> Account Number </td>
											<td><input type="text" class="withdrawal_input01" name='b_code' placeholder="Enter your account number"></td>
										</tr>

										<tr>
											<td> Account Name </td>
											<td><input type="text" class="withdrawal_input01"  name='b_holder' placeholder="Enter account name"></td>
										</tr>
										<tr>
											<td> Billing Address </td>
											<td><input type="text" class="withdrawal_input01"  name='addr' placeholder="Enter billing address"></td>
										</tr>
									</tbody>
								</table>
							</div><br/>
							<!--withdrawal_input_box end-->
							<input type="submit" class="btn btn-light-blue-bg" value="Update">
						</form>
					</div>
				</div>
				<!--withdrawal_left end-->
			</div>
		</div><!--section_right end-->
	</div><!-- / wrap end -->
@endsection