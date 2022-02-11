@extends('layouts.app')

@section('meta-content')
	<title> Purchase Package | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			My Subscribed Packages
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
                <a href="/packages/subscribe"> 
                    <button class="btn btn-purple-bd"> Purchase package </button>
                </a>
            </div><br/>
            <div class="mt-4 col-md-12 col-sm-12 col-12">
                @foreach($subscribed_packages as $subscribed)
                    <div class="buy_package col-lg-3 col-md-4 col-sm-6 col-12 {{'buy_package0' . $subscribed->package->id}}">
                        <img src="{{URL::asset('/img/package0' . $subscribed->package->id . '.png')}}" class="package_img"/>
                        <p class="text-white subheader mt-3">{{$subscribed->package->name}}</p>
                        {{-- <h6 class="text-white">Reward - {{$subscribed->package->reward * }} PTS</h6> --}}
                        <h6 class="text-white"> Quantity - {{$subscribed->quantity}} </h6>
                        <div class="total_sum {{'total_sum0' . $subscribed->package->id}}">
                            {{$subscribed->package->staking_amount}} KRW
                        </div>
                    </div>		
                @endforeach
            </div>
		</div>

		<!--Withdrawal_right-->
		<div class="deposit_right col-md-12 col-sm-12 col-12">
			<p class="title">
				<i class="fas fa-fw fa-history"></i>
				Purchase History 
			</p>
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Package </th>
							<th> Quantity </th>
							<th> Total Amount </th>
							<th> Date </th>
						</tr>

						@if($subscribed_packages->count() > 0)
							@foreach($subscribed_packages as $subscribed)
							<tr>
								<td> {{$subscribed->package->name}} </td>
								<td> {{$subscribed->quantity}}</td>
								<td> {{$subscribed->status}}</td>
								<td> {{$subscribed->created_at}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3"> No Package has been subscribed to yet. </td>
							</tr>
						@endif

					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection