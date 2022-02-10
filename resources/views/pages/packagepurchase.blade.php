@extends('layouts.app')

@section('meta-content')
	<title> Purchase Package | Dotori </title>
@endsection

@section('content')


	<script>

		function commas(str){
			var reg = /(^[+-]?\d+)(\d{3})/;
			str += '';
			while(reg.test(str))
			{
				str = str.replace(reg,'$1'+ ',' + '$2');
			}
				
			return str;
			
		}
			
		function purchase_ok()	{	
			var frm = document.sellfrm;
			
			if (Number(frm.balance.value) < Number(frm.total.value) )
			{
				alert("코인이 부족합니다.");
			}
			else if (frm.qty.value == "")
			{
				alert("구매수량을 입력해주세요. ");
			}
			else if (frm.pin.value == "")
			{
				alert("핀번호를 입력하세요");
			}
			else
			{	
				
				

				if (frm.sell_check.value == 'n')
				{
					alert("구매가 진행중 입니다. ");
				}
				else
				{	
					frm.sell_check.value = 'n';
					
					$.ajax({
						type: "POST",
						url: "./purchase_ok.php",
						data: $("#form").serialize(),
						dataType: "json",
						success: function (response) {
							if(response.result == "1"){
								frm.sell_check.value = 'y'
								alert(response.msg);
								location.reload();
								return false;
							}else{
								alert(response.msg);
								frm.sell_check.value = '';
								return false;
							}
						}
					});
					
				}


				//frm.submit();
			}
		}

		function calc_fee(values){
			
			var frm		= document.sellfrm;
			var pattern =/^[-]?\d+(?:[]\d+)?$/;			
				
			if( pattern.test(values)==false)
			{
				alert("숫자만 입력해주세요. ");
			}
			else
			{
			
				var total = Number(values) * frm.amount.value;
				frm.total.value = commas(total);
			}
		}

	</script>
	
				<div class="sub_top"><!--sub_top-->
					<div class="sub_title">
						<i class="fas fa-fw fa-cube"></i>
						Purchase Product
					</div>
				</div><!--sub_top end-->

			<form action method='POST'>
				@csrf
				<div class="section_right_inner"><!--section_right_inner-->
					<p> Choose a product to purchase </p>
					
					<div class="buy_package buy_package01" onclick='select_pr(1)'>
						<img src="../img/package01.png" class="package_img"/>
						<p class="title01">1,000,000</p>
						<div class="total_sum total_sum01">
							1,100,000
						</div>
					</div>		
					
					<div class="sp10"></div>
					<div class="package_left">
						<!--form01-->
						<div class="form01">
							<p class="title"> Package Selection </p> 
							
							<!--withdrawal_input_box-->
							<div class="withdrawal_input_box">
								<table style="width:100%;">
									<tbody>
										<tr>
											<td> Available Amount </td>
											<td>
												<input type="text" class="withdrawal_input01" readonly value="0"/>
											</td>
										</tr>
										<tr>
											<td>Package Price</td>
											<td>
												<input type="text" class="withdrawal_input01" readonly value="60,000" name='packages' >
											</td>
										</tr>
										<tr>
											<td> Quantity (PTS) </td>
											<td>
												<input type="text" class="withdrawal_input01" name='qty' onblur="calc_fee(this.value)">
											</td>
										</tr>
										<tr>
											<td> Purchase Amount </td>
											<td>
												<input type="text" class="withdrawal_input01" name='total' readonly>
											</td>
										</tr>
										<tr>
											<td> PIN </td>
											<td>
												<input type="password" class="withdrawal_input01" name="pin">
											</td>
										</tr>
									</tbody>
								</table>
							</div><br/>

							<!--withdrawal_input_box end-->
							<input type="button" class="btn btn-light-blue-bg" value="Purchase" onclick="purchase_ok()">
						</div>
						<!--form01 end-->
					</div>		
					<div style="clear:left; padding-top:2em !important">
						<h2>Note:</h2>
						<p>
							Package purchase is only available from Monday to Friday, from 10:00am to 6:00pm.
						</p>
					</div>
				</div><!--section_right_inner end-->
			</form>
@endsection