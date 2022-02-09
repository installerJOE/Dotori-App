@extends('layouts.app')

@section('meta-content')
	<title> Deposit | Dotori </title>
@endsection

@section('content')
	<div id="wrap">
		@include('includes.sidebar')	

		<div class="section_right"><!--section_right-->
			<div class="sub_top"><!--sub_top-->
				<div class="sub_title">
					<i class="fas fa-fw fa-money-check-alt"></i>
					Deposit (Purchase Request)
				</div>
			</div><!--sub_top end-->
			<div class="section_right_inner"><!--section_right_inner-->
				<!--withdrawal_left-->
				<div class="withdrawal_left">
					<!--form01-->
					<div class="form01">
						<p class="title"></p>
						<form method='POST' action='deposit_ok.php'>
							<!--withdrawal_input_box-->
							<div class="withdrawal_input_box">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td> Purchase Request Amount </td>
											<td><input type="text" placeholder="Please enter deposit amount" class="withdrawal_input01" name='amount'></td>
										</tr>
										<tr>
											<td> Depositor's Bank </td>
											<td><input type="text"placeholder="Enter your bank name" class="withdrawal_input01" name='b_name' value=""></td>
										</tr>
										<tr>
											<td> Depositor's Name </td>
											<td><input type="text"placeholder="Enter your account name" class="withdrawal_input01" name='b_holder' value=""></td>
										</tr>
									</tbody>
								</table>
							</div>
						</form><br/>

						<!--withdrawal_input_box end-->
						<input type="submit" class="btn btn-light-blue-bg" value="Deposit">
					</div>
					<!--form01 end-->
				</div>
				<!--withdrawal_left end-->

				<!--deposit_right-->
				<div class="deposit_right">
					<p class="title">
						<i class="fas fa-fw fa-history"></i>
						Deposit History
					</p>
					<div class="history_table">
						<table>
							<tbody>
								<tr>
									<th> Amount </th>
									<th> Date </th>
									<th> Status </th>
								</tr>						
								<tr>
									<td> 454,545 </td>
									<td> 2022-02-01 18:00:25</td>
									<td> Request </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
				<!--deposit_right end-->
			</div><!--section_right_inner end-->
		</div><!--section_right end-->
	</div><!-- / wrap end -->
@endsection