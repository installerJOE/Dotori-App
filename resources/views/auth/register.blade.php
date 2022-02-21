@extends('layouts.auth_app')

@section('meta-content')
	<title> Create Account | Dotori </title>
    <style>
        .index_input {
            margin-top:8px;
            margin-bottom:5px;
        }
        .join_textsrea {
            width: 90%;
            margin-left: 5%;
        }
        .join_textsrea textarea{
            width:100%;
            height:80px;
            border-radius: 3px;
        }
        .account{
            font-size: 14px;
            color: #000000;
        }
        .index_input01 {
            height: 35px;
        }
    </style>    
@endsection

@section('content')
	<div id="login_wrap">
		<div class="index_l_box">
			<div class="inner" style="position:relative;">
				<div class="login_v_text">
					<div style="left: 100px; margin-top: 30px" id="google_translate_element"></div>

					<script type="text/javascript">
					function googleTranslateElementInit() {
					new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'ko,en'}}, 'google_translate_element');
					}
					</script>
			
					<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
					<p class="text1"> Global Investment Solution</p>
					<P class="text2"> We always provide the best services</P>
				</div>
				<div class="login_div">
					<div>
						<form method="POST" action="{{ route('register') }}">
							@csrf
							<div class="logo">
								<img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.75)"/> 
							</div>

							<h3 class="subheader text-purple text-center">
								Create Account
							</h3>
							
							<div class="index_input">
								@include('includes.messages')
							</div>

							<div class="index_input">
								<p class="input_title"> Full name </p>
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
								name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
							</div>
			
							<div class="index_input">
								<p class="input_title"> Email Address </p>
								<input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" 
								name="email" value="{{ old('email') }}" required autocomplete="email">
								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>

							{{-- <div class="index_input">
								<p class="input_title"> Phone (Country Code)</p>
								<select class="phone_select" name="country_code" required value="{{old('country_code')}}">
									<option value="82">Korea (+82)</option>
									<option value="1">USA (+1)</option>
									<option value="86">China (+86)</option>
									<option value="81">JAPAN (+81)</option>
									<option value="84">Vietnam (+84)</option>
									<option value="44">United Kingdom (+44)</option>
									<option value="7">Russia (+7)</option>
									<option value="32">Belgium (+32)</option>
									<option value="55">Brazil (+55)</option>
									<option value="61">Australia (+61)</option>
									<option value="64">New Zealand (+64)</option>
									<option value="33">France (+33)</option>
									<option value="358">Finland (+358)</option>
									<option value="852">Hong kong (+852)</option>
									<option value="30">Greece (+30)</option>
									<option value="49">Germany (+49)</option>
									<option value="886">Taiwan (+886)</option>
									<option value="62">Indonesia (+62)</option>
									<option value="63">Philippines (+63)</option>
									<option value="65">Singapore (+65)</option>
									<option value="98">Iran (+98)</option>
									<option value="855">Cambodia (+855)</option>
									<option value="56">Chile (+56)</option>
									<option value="53">Cuba (+53)</option>
									<option value="57">Colombia (+57)</option>
									<option value="420">Czech Republic (+420)</option>
									<option value="45">Denmark (+45)</option>
									<option value="20">Egypt (+20)</option>
									<option value="593">Ecuador (+593)</option>
									<option value="679">Fiji (+679)</option>
									<option value="233">Ghana (+233)</option>
									<option value="91">India  (+91)</option>
									<option value="964">Iraq  (+964)</option>
									<option value="218">Libya  (+218)</option>
									<option value="60">Malaysia  (+60)</option>
									<option value="377">Monaco  (+377)</option>
									<option value="212">Morocco (+212)</option>
									<option value="258">Mozambique (+258)</option>
									<option value="31">Netherlands (+31)</option>
									<option value="47">Norway (+47)</option>
									<option value="51">Peru (+51)</option>
									<option value="595">Paraguay (+595)</option>
									<option value="48">Poland (+48)</option>
									<option value="974">Qatar (+974)</option>
									<option value="40">Romania (+40)</option>
									<option value="221">Senegal (+221)</option>
									<option value="677">Solomon Islands (+677)</option>
									<option value="27">South Africa (+27)</option>
									<option value="34">South Spain (+34)</option>
									<option value="46">Sweden (+46)</option>
									<option value="268">Swaziland (+268)</option>
									<option value="255">Tanzania (+255)</option>
									<option value="66">Thailand (+66)</option>
									<option value="90">Turkey (+90)</option>
									<option value="380">Ukraine (+380)</option>
									<option value="598">Uruguay (+598)</option>
									<option value="998">Uzbekistan (+998)</option>
									<option value="967">Yemen (+967)</option>
									<option value="260">Zambia (+260)</option>
									<option value="263">Zimbabwe (+263)</option>
								</select>
							</div> --}}

							<div class="index_input">
								<p class="input_title">Phone Number</p>
								<input type="text" class="form-control" name="phone" value="{{old('phone')}}">
							</div>		

							<div class="index_input">
								<p class="input_title"> Password </p>
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
								name="password" required autocomplete="new-password">
								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
			
							<div class="index_input">
								<p class="input_title"> Confirm Password </p>
								<input type="password" class="form-control" name="password_confirmation">
							</div>
			
							<div class="index_input">
								{{-- <p class="input_title">PIN (6-digit Number) </p> --}}
								<input type="password" id="pin" class="form-control  @error('password') is-invalid @enderror"
								name="pin" required autocomplete="new-pin" maxlength="6" pattern="[0-9]{6}" value="000000" hidden>
							</div>
			
							<div class="index_input">
								{{-- <p class="input_title"> Retype PIN </p> --}}
								<input type="password" class="form-control numberic" maxlength="6" name="pin_confirmation" value="000000" hidden>
							</div>
			
							<div class="index_input ">
								<p class="input_title"> Referral ID </p>
								<input type="text" class="form-control" name="referral_id" value="{{request()->refer}}">
								{{-- <input type="hidden"  value="{{request()->refer}}"/> --}}
							</div>
		
							<div class="index_input">
								<div class="col-md-12">
									<button type="submit" class="btn btn-purple-bg">
										Create account
									</button>
								</div>
							</div>

							<div class="index_input">
								Already have an account?
							</div>
							<div class="index_input">
								<div class="col-md-12">
									<a href="/login">
										<button type="button" class="btn btn-purple-bd">
											Login 
										</button>
									</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
