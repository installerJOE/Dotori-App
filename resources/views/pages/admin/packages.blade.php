@extends('layouts.app')

@section('meta-content')
	<title> Deposit Request | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Subscription Packages
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<button class="btn btn-purple-bd"> Create package </button>
			</div>
		</div><br/>

		<div class="col-md-12 col-sm-12 col-12">
            <div class="mt-4 col-md-12 col-sm-12 col-12">
                @foreach($packages as $package)
                    <div class="buy_package col-lg-3 col-md-4 col-sm-6 col-12 {{'buy_package0' . $package->id}}">
                        {{-- onclick="select_package('{{$package->id}}', '{{$package->staking_amount}}')"> --}}
                        <img src="{{URL::asset('/img/package0' . $package->id . '.png')}}" class="package_img"/>
                        <p class="text-white subheader mt-3">{{$package->name}}</p>
                        <h6 class="text-white">Reward - {{$package->reward}} PTS</h6>
                        <div class="total_sum {{'total_sum0' . $package->id}}">
                            {{$package->staking_amount}} KRW
                        </div>
                    </div>		
                @endforeach
            </div>
		</div>
	</div><!--section_right_inner end-->
@endsection