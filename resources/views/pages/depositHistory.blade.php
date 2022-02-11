@extends('layouts.app')

@section('meta-content')
	<title> Deposit History | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	Deposit History
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/deposit"> 
                <button class="btn btn-purple-bd"> Create deposit request </button>
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
						@if($deposits->count() > 0)
							@foreach($deposits as $deposit)
							<tr>
								<td> {{$deposit->amount}} </td>
								<td> {{$deposit->updated_at}}</td>
								<td> {{$deposit->status}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="3"> No deposit has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
		</div>
	</div><!--section_right_inner end-->
@endsection