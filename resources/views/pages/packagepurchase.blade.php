@extends('layouts.app')

@section('meta-content')
	<title> Purchase Package | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			Purchase Product
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12">
			<h3 class="subheader text-grey"> Choose a product to purchase </h3>
			@foreach($packages as $package)
				<div class="buy_package col-lg-3 col-md-4 col-sm-6 col-12 {{'buy_package0' . $package->id}}" 
					onclick="select_package('{{$package->id}}', '{{$package->staking_amount}}')">
					<img src="{{URL::asset('/img/package0' . $package->id . '.png')}}" class="package_img"/>
					<p class="text-white subheader mt-3">{{$package->name}}</p>
					<h6 class="text-white">Reward - {{$package->reward}} PTS</h6>
					<div class="total_sum {{'total_sum0' . $package->id}}">
						{{$package->staking_amount}} KRW
					</div>
				</div>		
			@endforeach
		</div>

		<div class="package_left">
			<!--form01-->
			<div class="form01">
				<form action="/package/purchase" method='POST' id="purchase-package-form">
					@csrf
					<input type="hidden" id="selected-package-id" name="package_id"/>
					<p class="title"> Package Selection </p> 		
					<!--withdrawal_input_box-->
					<div style="margin-top: 15px;">
						<span class="text-red" id="insufficientErrorMessage"></span>
					</div>
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
								<tr>
									<td> Available Amount </td>
									<td>
										<input type="text" 
											class="withdrawal_input01" 
											disabled 
											value="{{Auth::user()->available_points}}"
										/>
										<input type="hidden" id="available_amount" value="{{Auth::user()->available_points}}"/>
									</td>
								</tr>
								<tr>
									<td>Package Price</td>
									<td>
										<input type="text" 
											class="withdrawal_input01" 
											disabled 
											value="{{old('package_price')}}" 
											placeholder="" 
											id="package-price-input"
										/>
										<input type="hidden" name='package_price' id="form-package-price" value="{{old('package_price')}}" />
									</td>
								</tr>
								<tr>
									<td> Quantity (PTS) </td>
									<td>
										<input type="number" 
											class="withdrawal_input01" 
											name='quantity' 
											id="package_qty"
											value="{{old('quantity')}}"
											oninput="calculateAmount(this.value)"
										/>
									</td>
								</tr>
								<tr>
									<td> Purchase Amount </td>
									<td>
										<input type="text" 
											class="withdrawal_input01" 
											name='total' 
											id="total_amount"
											disabled
											value="{{old('total_amount')}}"
										/>
										<input type="hidden" name='total_amount' id="form-package-amount" value="{{old('total_amount')}}"/>

									</td>
								</tr>
								<tr>
									<td> PIN </td>
									<td>
										<input type="password" 
											id="pin" 
											class="withdrawal_input01" 
											name="pin" required 
											maxlength="6"
										/>
									</td>
								</tr>
							</tbody>
						</table>
						<p class="text-red" id="pin-error"></p>
					</div><br/>
					<!--withdrawal_input_box end-->
					<input type="button" class="btn btn-light-blue-bg" value="Purchase" onclick="validatePurchase()">
				</form>
			</div>
		</div>		

		<div class="col-md-6 col-sm-12 col-12 note-pad">
			<div>
				<h2>Note:</h2>
				<p>
					Package purchase is only available from Monday to Friday, from 10:00am to 6:00pm.
				</p>
			</div>
		</div>
	</div>

	<script>	
		function select_package(id, price){
			document.getElementById('package-price-input').value = price;
			document.getElementById('form-package-price').value = price;
			document.getElementById('selected-package-id').value = id;
			//give package quanitity of one(1)
			document.getElementById('package_qty').value = 1;
			//get total purchase amount
			calculateAmount(1);
			balanceStatus();			
		}

		function balanceStatus(){
			var balance_ok = checkBalance();
			if(!balance_ok){
				document.getElementById('insufficientErrorMessage').innerHTML = "*Oops! Insufficient Balance. Deposit more KRW to purchase a package"
			}
			else{
				document.getElementById('insufficientErrorMessage').innerHTML = ""
			}
		}

		function checkBalance(){
			var available_amount = document.getElementById('available_amount').value;
			var amount_to_withdraw = document.getElementById('form-package-amount').value;
			if(Number(available_amount) < Number(amount_to_withdraw)){
				return false;
			}
			return true;
		}

		function calculateAmount(qty){
			var price = document.getElementById('form-package-price').value 
			var total = Number(price) * qty;
			document.getElementById('total_amount').value = total;
			document.getElementById('form-package-amount').value = total;
			balanceStatus();
		}

		function validatePurchase(){	
			var pin = document.getElementById('pin').value;
			var pinerr = document.getElementById('pin-error');
			var balance_ok = checkBalance();
			if(balance_ok){
				if(pin.length > 0){
					pinerr.innerHTML = "";
					document.getElementById("purchase-package-form").submit();
				}
				else{
					pinerr.innerHTML = "*Sorry. Your pin is required to proceed."
				}
			}
			else{
				alert("Insufficient Balance!")
			}
		}
	</script>
@endsection