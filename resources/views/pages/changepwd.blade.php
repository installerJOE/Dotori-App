@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Password Settings')}} | {{ __('Dotori')}} </title>
    <style>
        .sub_title img {
            float: left;
            margin-top: 10px;
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    <div class="sub_top"><!--sub_top-->
        <div class="sub_title">
            <i class="fas fa-shield-alt"></i>
            {{ __('Password Settings')}}
        </div>
    </div><!--sub_top end-->
    <div class="section_right_inner"><!--section_right_inner-->
        <!--withdrawal_left-->
        <div class="withdrawal_left">
            <!--form01-->
            <div class="form01">
                <p class="title"> {{ __('Change Password')}} </p> 
                <form action="/settings/password" method="POST">
                    @csrf
                    <!--withdrawal_input_box-->
                    <div class="withdrawal_input_box">
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td> {{ __('New Password')}} </td>
                                    <td>
                                        <input
                                            type="password"
                                            name="password"
                                            placeholder="Enter new password" 
                                            class="withdrawal_input01" 
                                            required
                                        />
                                    </td>
                                </tr>
                                <tr>
                                    <td> {{ __('Confirm Password')}}</td>
                                    <td>
                                        <input 
                                            type="password" 
                                            placeholder="Retype new password" 
                                            class="withdrawal_input01" 
                                            name="password_confirmation"
                                            required
                                        /> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><br/>
                    <!--withdrawal_input_box end-->
                    <input type="submit" class="btn btn-light-blue-bg" value="Change Password">
                </form>
            </div>
            <!--form01 end-->
        </div>
    </div>
@endsection