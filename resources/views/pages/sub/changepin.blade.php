@extends('layouts.app')

@section('meta-content')
	<title> PIN Settings | Dotori </title>
    <style>
        .sub_title img {
            float: left;
            margin-top: 10px;
            margin-right: 5px;
        }
    </style>
@endsection

@section('content')
    <div id="wrap"><!--wrap-->
        @include('includes.sidebar')	
        <div class="section_right"><!--section_right-->
            <div class="sub_top"><!--sub_top-->
                <div class="sub_title">
                    <i class="fas fa-key"></i>
                    PIN Settings
                </div>
            </div><!--sub_top end-->
            <div class="section_right_inner"><!--section_right_inner-->
                <!--withdrawal_left-->
                <div class="withdrawal_left">
                    <!--form01-->
                    <div class="form01">
                        <p class="title"> Change PIN </p> 
                        <form>
                            @csrf
                            <!--withdrawal_input_box-->
                            <div class="withdrawal_input_box">
                                <table style="width:100%;">
                                    <tbody>
                                        <tr>
                                            <td> New PIN </td>
                                            <td><input type="password" placeholder="Enter new PIN" class="withdrawal_input01" name="pin"></td>
                                        </tr>
                                        <tr>
                                            <td> Confirm PIN </td>
                                            <td><input type="password" placeholder="Retype new PIN" class="withdrawal_input01" name="pin_confirm"> </td>
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
            </div><!--section_right_inner end-->
        </div><!--section_right end-->
        </form>
    </div><!-- / wrap end -->
@endsection