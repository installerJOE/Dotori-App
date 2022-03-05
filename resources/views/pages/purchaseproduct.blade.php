@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Purchase Product')}} | {{ __('Dotori')}} </title>
	<style>
		.sub_title img {
			float: left;
			margin-top: 10px;
			margin-right: 5px;
		}
	</style>	
@endsection

@section('content')
	<div class="sub_top col-md-12 col-sm-12 col-12"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-user-cog"></i>
			{{ __('Purchase Product')}}
		</div>
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/products/shop"> 
                <button class="btn btn-purple-bd"> {{ __('Back to shop')}} </button>
            </a>
        </div><br/>
	</div><!--sub_top end-->
			
	<div class="section_right_inner col-md-12 col-sm-12 col-12"><!--section_right_inner-->
		<!--withdrawal_left-->
		<div class="withdrawal_left">
			<!--form01-->
			<form action="/products/purchase" method="POST" id="purchase-product-form">
                @csrf
                <input type="hidden" value="{{$product->id}}" name="product_id"/>
				<div class="form01">
					<p class="title"> {{ __('Product')}} </p> 
					<!--withdrawal_input_box-->
                    <div style="margin-top: 15px;">
                        <span class="text-red" id="insufficientErrorMessage"></span>
                    </div>
					<div class="withdrawal_input_box">
						<table style="width:100%;">
							<tbody>
                                <tr style="font-weight:bold">
                                    <td> {{ __('Available Balance')}} </td>
                                    <td>
                                        {{Auth::user()->earnings !== null ? number_format(Auth::user()->earnings) : 0}} SPOINTS
                                        <input type="hidden" 
											value="{{Auth::user()->earnings !== null ? Auth::user()->earnings : 0}}" 
											id="available_amount"
										/>
                                    </td>
                                </tr>
								<tr>
									<td> {{ __('Product Name')}} </td>
									<td><input type="text" class="withdrawal_input01" value="{{$product->name}}" disabled></td>
								</tr>
								<tr>
									<td> {{ __('Price')}} </td>
									<td>
                                        <input type="number" class="withdrawal_input01" value="{{$product->price}}" disabled> 
                                        <input type="hidden" id="product-price" name="product_price" value="{{$product->price}}">
                                    </td>
								</tr>
								<tr>
									<td> {{ __('Quantity')}} </td>
									<td>
                                        <input type="number" 
                                            class="withdrawal_input01" 
                                            name='quantity' 
                                            value="1"
                                            id="quantity"
                                            min="0"
                                            oninput="calculateAmount(this.value, '{{$product->price}}')"
                                        />
                                    </td>
								</tr>
								<tr>
									<td> {{ __('Amount')}} </td>
									<td>
                                        <input type="text" id="form-product-amount" value="{{$product->price}}" class="withdrawal_input01" disabled >
                                        <input type="hidden" id="product-amount" value="{{$product->price}}">
                                    </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div><br/>

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
											{{Auth::user()->delivery_address !== null ? 'disabled' : ''}}
										>
									</td>
								</tr>
								<tr>
									<td> {{ __('Address Detail')}} </td>
									<td>
										<input type="text" name="address_detail" class="withdrawal_input01" 
											placeholder="{{ __('Enter address detail')}}"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->address_detail : ''}}"
                                            {{Auth::user()->delivery_address !== null ? 'disabled' : ''}}
										/>
									</td>
								</tr>
								<tr>
									<td> {{ __('Zip Code')}} </td>
									<td>
										<input type="text" name="zip_code" class="withdrawal_input01" 
											placeholder="{{ __('Enter your zip code')}}"
											value="{{Auth::user()->delivery_address !== null ? Auth::user()->delivery_address->zip_code : ''}}"
                                            {{Auth::user()->delivery_address !== null ? 'disabled' : ''}}
										/>
									</td>
								</tr>
							</tbody>
						</table>
                        <a href="/settings/profile#billing_address">
                            <button type="button" class="btn btn-purple-bd mt-4">
                                {{ __('Change Billing Address')}}
                            </button>
                        </a>
					</div>
				</div><br/>

				<!--withdrawal_input_box end-->
				<input type="button" class="btn btn-purple-bg" value="Purchase Product" onclick="purchaseProduct()">
			</form>
		</div>
		<!--withdrawal_left end-->
	</div>

    <script>
        function calculateAmount(qty, price){
            // quantity = document.getElementById(qty).value;
			var total = Number(price) * qty;
			document.getElementById('product-price').value = price;
			document.getElementById('form-product-amount').value = total;
			document.getElementById('product-amount').value = total;
			balanceStatus();
		}

        function balanceStatus(){
            var balance_ok = checkBalance();
            if(!balance_ok){
                document.getElementById('insufficientErrorMessage').innerHTML = 
                "{{ __('Oops! Insufficient Balance. Purchase more packages to get more SPOINTS to buy your desired quantity')}}"
            }
            else{
                document.getElementById('insufficientErrorMessage').innerHTML = ""
            }
        }

        function checkBalance(){
            var available_amount = document.getElementById('available_amount').value;
            var purchase_amount = document.getElementById('product-amount').value;
            if(Number(available_amount) < Number(purchase_amount)){
                return false;
            }
            return true;
        }

        function purchaseProduct(){
            var balance_ok = checkBalance();
            if(!balance_ok){
                alert({{__('Oops! Insufficient Funds.')}})
            }
            else{
                document.getElementById('purchase-product-form').submit()
            }
        }

    </script>
@endsection