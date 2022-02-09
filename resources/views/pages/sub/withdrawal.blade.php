@extends('layouts.app')

@section('meta-content')
	<title> Withdrawal | Dotori </title>
@endsection

@section('content')
	<div id="wrap"><!--wrap-->
		@include('includes.sidebar')
		<div class="section_right"><!--section_right-->	
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
					<!--form01-->
					<div class="form01">
						<p class="title"> Withdraw Funds </p> 
						<!--total_box-->
						<div class="total_box">
							<div class="total_box_inner">
								<div class="total_box_title">                 
									Available Amount
								</div>
								<div class="total_box_balance">
									<p class="allowed">0</p>
								</div>
							</div>
						</div>
						<!--total_box end-->

						<form action="" method="POST">
							<!--withdrawal_input_box-->
							<div class="withdrawal_input_box">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td> Withdraw Amount </td>
											<td>
												<input type="text" placeholder="Enter amount to withdraw" 
												class="withdrawal_input01 " name='total' onblur="calc_fee(this.value)">
											</td>
										</tr>
										
										<tr>
											<td> Fee (0% of Withdraw Amount) </td>
											<td>
												<input type="text" value="0.00" class="withdrawal_input01" name='fee' disabled/>
											</td>
										</tr>
										
										<tr>
											<td> Total Amount </td>
											<td>
												<input type="text" class="withdrawal_input01" disabled name='amount' value="200,000"/>
											</td>
										</tr>
												
										<tr>
											<td>Bank Name </td>
											<td>
												<input type="text" value="" class="withdrawal_input01" 
												name='b_name' placeholder="Enter the name of your Bank">
											</td>
										</tr>

										<tr>
											<td>Account Number </td>
											<td>
												<input type="text" value="" class="withdrawal_input01" 
												name='b_code' placeholder="Enter your account number">
											</td>
										</tr>

										<tr>
											<td> Account Name</td>
											<td>
												<input type="text" value="" class="withdrawal_input01" 
												name='b_holder' placeholder="Enter your account name">
											</td>
										</tr>

										<tr>
											<td> PIN </td>
											<td>
												<input type="password" class="withdrawal_input01" 
												name='pin' placeholder="Enter your PIN">
											</td>
										</tr>
									</tbody>
								</table>
							</div> <br/>
							<!--withdrawal_input_box end-->
							<input type="submit" class="btn btn-light-blue-bg" value="Withdraw">
						</form>
					</div>
					<!--form01 end-->
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

								<tr>
									<td> 120,000 </td>
									<td> 02 Feb 2022 10:22:01</td>
									<td> Issued </td>
								</tr>

								<tr>
									<td> 150,000 </td>
									<td> 08 Feb 2022 14:22:01</td>
									<td> Pending </td>
								</tr>

							</tbody>
						</table>
					</div>
				</div>
				<!--Withdrawal_right end-->
			</div>
			<!--section_right_inner end-->
			<div style="clear:left;" class="note-pad">
				<div>
					<h2>Note:</h2>
					<p>
						You can only withdraw once each day. Withdrawals are processed on Mondays, Wednesdays and Fridays.
					</p>
				</div>
			</div>
		</div>
	</div><!--section_right end-->

	<script>
		function calc_fee(values){		
			var frm		= document.withfrm;
			var pattern =/^[-]?\d+(?:[]\d+)?$/;	
			var wfee = Number(frm.wfee.value);		
				
			if( pattern.test(values)==false)
			{
				alert("숫자만 입력해주세요. ");
			}
			else
			{
			
				var fee = Number(values) * Number(wfee) / 100;
				frm.fee.value = fee;
				frm.amount.value = Number(values) - Number(fee);
			}
		}

		function with_ok(){
			var frm = document.withfrm;
			
			//alert(frm.emoney.value+frm.total.value);

			if (frm.amount.value == "" || frm.amount.value == "0" )
			{
				alert("출금금액을 입력하세요");
			}
			else if (frm.emoney.value <Number(frm.total.value))
			{
				alert("사용가능금액이 부족합니다. ");
			}
			else if (frm.b_name.value == "" || frm.b_code.value == "" || frm.b_holder.value == "")
			{
				alert("은행정보를 입력해주세요. ");
			}
			else if (frm.pin.value == "")
			{
				alert("핀번호를 입력하세요");
			}
			else
			{
				frm.submit();
			}
		}	

	</script>
@endsection