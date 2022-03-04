@extends('layouts.app')

@section('meta-content')
	<title> {{ __('PIN Settings')}} | {{ __('Dotori')}} </title>
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
            <i class="fas fa-key"></i>
            {{ __('PIN Settings')}}
        </div>
    </div><!--sub_top end-->
    <div class="section_right_inner"><!--section_right_inner-->
        <!--withdrawal_left-->
        <div class="withdrawal_left">
            <!--form01-->
            <div class="form01">
                <p class="title"> {{ __('Change PIN')}} </p> 
                <form action="/settings/pin" method="POST">
                    @csrf
                    <!--withdrawal_input_box-->
                    <div class="withdrawal_input_box">
                        <table style="width:100%;">
                            <tbody>
                                <tr>
                                    <td> {{ __('New PIN')}} ({{ __('6-digit Number')}}) </td>
                                    <td>
                                        <input type="password" placeholder="Enter new PIN" class="withdrawal_input01" 
                                        name="pin" maxlength="6" pattern="[0-9]{6}">
                                    </td>
                                </tr>
                                <tr>
                                    <td> {{ __('Confirm PIN')}} </td>
                                    <td>
                                        <input type="password" placeholder="Retype new PIN" class="withdrawal_input01"
                                        name="pin_confirmation" maxlength="6"> 
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div><br/>
                    <!--withdrawal_input_box end-->
                    <input type="submit" class="btn btn-light-blue-bg" value="Change PIN">
                </form>
            </div>
            <!--form01 end-->
        </div>
        <!--withdrawal_left end-->
    </div>
@endsection