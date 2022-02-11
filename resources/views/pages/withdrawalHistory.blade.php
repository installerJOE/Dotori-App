@extends('layouts.app')

@section('meta-content')
	<title> Withdrawal History | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	Withdrawal History
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/withdrawal"> 
                <button class="btn btn-purple-bd"> Create withdrawal request </button>
            </a>
        </div><br/>

		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Amount (KRW) </th>
							<th> Date </th>
							<th> Status </th>
						</tr>						
						@if($withdrawals->count() > 0)
							@foreach($withdrawals as $withdrawal)
							<tr>
								<td> {{$withdrawal->amount}} </td>
								<td> {{$withdrawal->updated_at}}</td>
								<td> {{$withdrawal->status}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3"> No withdrawal request has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div><!--section_right_inner end-->
@endsection