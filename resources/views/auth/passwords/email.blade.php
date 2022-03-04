@extends('layouts.auth_app')

@section('meta-content')
    <title> Forgot Password | Dotori </title>
@endsection

@section('content')
    <div id="login_wrap">
        <div class="index_l_box">
            <div class="inner" style="position:relative;">
                <div class="login_v_text">
                    
                </div>
                <div class="login_v_text">
                    <p class="text1"> {{__('Global Investment Solution')}}</p>
                    <P class="text2"> {{__('We always provide the best services')}}</P>
                </div>
                <div class="login_div">
                    <div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="logo">
                                <img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.75)"/> 
                            </div>

                            <h3 class="subheader text-purple text-center">
                                {{__('Forgot Password') }}
                            </h3>

                            <div class="index_input">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            
                            <div class="index_input">
                                {{__('Email Address')}}
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
                                        {{__('Send Password Reset Link')}}
                                    </button>
                                </div>
                            </div>
                            <div class="index_input">
                                {{__('Already have an account?')}} <a href="/login" class="text-light-blue"> {{__('Login here')}} </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection
