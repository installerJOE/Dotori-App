@extends('layouts.app')

@section('meta-content')
	<title> Daily Rewards History | Dotori </title>
	<style>
		.amount-block{
			padding:15px;
			border-radius: 10px;
			text-align: right
		}
        .dashboard-hr{
            margin-top: 0.5em;
        }
	</style>
@endsection

@section('content')
    <div class="sub_top col-md-12 col-sm-12 col-12" style="padding-bottom:2em"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			Daily Rewards History
		</div>
        <div class="ctrl-btn col-md-3 col-sm-6 col-12" style=""> 
            <a href="/packages/subscribed"> 
                <button class="btn btn-light-blue-bg"> Back to packages </button>
            </a>
        </div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->
		{{-- <div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="col-md-3 col-sm-6 col-12" style="float:right"> 
                <div class="purple-bg text-white amount-block">
					<p style="font-size:12px" class="text-light-blue">
						Sub Total Rewards (RPOINT)
					</p> 
					<p style="font-size:21px"> {{number_format($total_reward)}} </p>
				</div>
            </div><br/>
		</div> --}}

        <!--Package_right-->
        <div class="deposit_right col-md-12 col-sm-12 col-12">
            <p class="title">
                <i class="fas fa-fw fa-history"></i>
                {{$subscription->package->name}}
            </p>
                    
            <div class="history_table">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <th> Amount (RPOINT)  </th>
                            <th> Percent Rewarded </th>
                            <th> Date/Time </th>
                        </tr>
                        @if($rewards->count() > 0)
                            @foreach($rewards as $reward)
                                <tr>
                                    <td> {{$reward->rpoint}}</td>
                                    <td> {{$reward->percent_reward}}</td>
                                    <td> {{$reward->created_at}} </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3"> There are no rewards yet </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            @if($rewards->count() > 0)
                <div class="mt-2">
                    <hr/>
                    {{$rewards->links("pagination::bootstrap-4")}}
                </div>
            @endif
	    </div>
    </div>
@endsection