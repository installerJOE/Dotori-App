@extends('layouts.auth_app')

@section('meta-content')
    <title> Verify Email | Dotori </title>
@endsection

@section('content')
    <div id="login_wrap">
        <div class="index_l_box">
            <div class="inner" style="position:relative;">
                <div class="login_v_text">
                </div>
                <div class="login_div">
                    <div>
                        <div class="logo">
                            <img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.75)"/> 
                        </div>

                        <h3 class="subheader text-purple text-center">
                            Verify Your Email Address
                        </h3>

                        <div class="login_v_text">
                            
                        </div>
                        <div class="index_input">
                            @if (session('resent'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                            
                        <div class="index_input">
                            <p>
                                Before proceeding, please check your email for a verification link. <div style="left: 100px; margin-top: 30px" id="google_translate_element"></div>
                            </p>
                        </div>

                        
        
                            <script type="text/javascript">
                             function googleTranslateElementInit() {
                        new google.translate.TranslateElement({pageLanguage: 'ko', includedLanguages: 'ko,en', }, 'google_translate_element');
                    }
                            </script>
                    
                            <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                        <div class="index_input">
                            <p style="margin-bottom:0.8em">
                                If you did not receive the email, request a new verification link.
                            </p>
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-purple-bd">
                                    Request new link
                                </button>
                            </form>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
