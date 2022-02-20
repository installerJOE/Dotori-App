@extends('layouts.auth_app')

@section('meta-content')
    <title> Confirm Password | Dotori </title>
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
            <div class="login_div">
                <div>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="logo">
                            <h1> Dotori </h1>
                        </div>

                        <h3 class="subheader text-purple text-center">
                            Please confirm your password before continuing.
                        </h3>

                        <div class="index_input">
                            <label for="password">
                                Password
                            </label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                              name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="index_input">
                            <button type="submit" class="btn btn-purple-bg">
                                Reset Password
                            </button>
                        </div>
    
                        <div class="index_input">
                            <a class="text-purple" href="/dashboard">
                                Back to Dashboard
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Confirm Password') }}</div>

                <div class="card-body">
                    {{ __('Please confirm your password before continuing.') }}

                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf

                        <div class="row mb-3">
                            
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Confirm Password') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
