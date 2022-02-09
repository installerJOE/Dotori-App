@extends('layouts.app')

@section('content')
    <div id="login_wrap">
        <div class="index_l_box">
            <div class="inner" style="position:relative;">
                <div class="login_v_text">
                </div>
                <div class="login_div">
                    <div>
                        <div class="logo">
                            <h1> Dotori </h1>
                        </div>

                        <h3 class="subheader text-purple text-center">
                            Verify Your Email Address
                        </h3>

                        <div class="index_input">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('A fresh verification link has been sent to your email address.') }}
                                </div>
                            @endif
                        </div>
                            
                        <div class="index_input">
                            <p>
                                Before proceeding, please check your email for a verification link.
                            </p>
                        </div>

                        <div>
                            <p>
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
