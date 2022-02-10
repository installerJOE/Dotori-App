@extends('layouts.auth_app')

@section('meta-content')
    <title> Forgot Password | Dotori </title>
@endsection

@section('content')
    <div id="login_wrap">
        <div class="index_l_box">
            <div class="inner" style="position:relative;">
                <div class="login_v_text">
                    <p class="text1"> Global Investment Solution</p>
                    <P class="text2"> We always provide the best services</P>
                </div>
                <div class="login_div">
                    <div>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="logo">
                                <h1> Dotori </h1>
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
                                <div class="col-md-12">
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
