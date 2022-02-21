@extends('layouts.app')

@section('meta-content')
	<title> Deposit History | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	Withdrawals History
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/admin/withdrawals/requests"> 
                <button class="btn btn-purple-bd"> Withdrawal requests </button>
            </a>
        </div><br/>

		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Name of Member </th>
                            <th> Withdrawal Amount </th>
                            <th> Bank Name </th>
                            <th> Account Holder </th>
                            <th> Account Number </th>
                            <th> Status </th>
							<th> Date </th>
						</tr>						
						@if($withdrawals->count() > 0)
							@foreach($withdrawals as $withdrawal)
							<tr>
								<td> {{$withdrawal->user->name}} </td>
								<td> {{$withdrawal->amount}}</td>
								<td> {{$withdrawal->bank_name}}</td>
								<td> {{$withdrawal->account_name}}</td>
								<td> {{$withdrawal->account_number}}</td>
								<td> {{$withdrawal->status}} </td>
								<td> {{$withdrawal->updated_at}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="7"> There are no successful withdrawals yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			@if($withdrawals->count() > 0)
				<div class="mt-2">
					<hr/>
					{{$withdrawals->links("pagination::bootstrap-4")}}
				</div>
			@endif
		</div>
	</div><!--section_right_inner end-->
@endsection