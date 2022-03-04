@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Withdrawal history')}} | {{ __('Dotori')}} </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	{{ __('Withdrawals History')}}
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="my-3">
			<a href="{{route('withdrawal.history.export')}}" class="btn btn-sm btn-light-blue-bg pt-3">
				{{ __('Export')}}
			</a>
		</div>
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/admin/withdrawals/requests"> 
                <button class="btn btn-purple-bd"> {{ __('Withdrawal requests')}} </button>
            </a>
        </div><br/>

		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> {{ __('Name of Member')}} </th>
                            <th> {{ __('Withdrawal Amount')}} </th>
                            <th> {{ __('Bank Name')}} </th>
                            <th> {{ __('Account Holder')}} </th>
                            <th> {{ __('Account Number')}} </th>
                            <th> {{ __('Status')}} </th>
							<th> {{ __('Date')}} </th>
						</tr>						
						@if($withdrawals->count() > 0)
							@foreach($withdrawals as $withdrawal)
							<tr>
								<td> {{$withdrawal->user->name}} </td>
								<td> {{number_format($withdrawal->amount)}}</td>
								<td> {{$withdrawal->bank_name}}</td>
								<td> {{$withdrawal->account_name}}</td>
								<td> {{$withdrawal->account_number}}</td>
								<td> {{$withdrawal->status}} </td>
								<td> {{$withdrawal->updated_at}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="7"> {{ __('There are no successful withdrawals yet.')}} </td>
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