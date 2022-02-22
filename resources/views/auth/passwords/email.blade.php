@extends('layouts.auth_app')

@section('meta-content')
    <title> Forgot Password | Dotori </title>
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
                </div>
                <div class="login_v_text">
                    <p class="text1"> Global Investment Solution</p>
                    <P class="text2"> We always provide the best services</P>
                </div>
                <div class="login_div">
                    <div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="logo">
                                <img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.75)"/> 
                            </div>

                            <h3 class="subheader text-purple text-center">
                                Forgot Password
                            </h3>

                            <div class="index_input">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="index_input">
                                Email Address
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
        
                            <div class="index_input">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-purple-bg">
                                        Send Password Reset Link
                                    </button>
                                </div>
                            </div>
                            <div class="index_input">
                                Already have an account? <a href="/login" class="text-light-blue"> Login here </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
