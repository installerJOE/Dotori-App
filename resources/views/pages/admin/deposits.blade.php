@extends('layouts.app')

@section('meta-content')
	<title> Deposits | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
	    	Deposits History
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="my-3">
			<a href="{{route('deposit.history.export')}}" class="btn btn-sm btn-light-blue-bg pt-3">
				Export
			</a>
		</div>

        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/admin/deposits/requests"> 
                <button class="btn btn-purple-bd"> Deposit requests </button>
            </a>
        </div><br/>

		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
                            <th> Name of Member </th>
                            <th> Deposit Amount </th>
                            <th> Bank Name </th>
                            <th> Account Holder </th>
                            <th> Status </th>
							<th> Date </th>
						</tr>						
						@if($deposits->count() > 0)
							@foreach($deposits as $deposit)
							<tr>
                                <td> {{$deposit->user->name}} </td>
								<td> {{number_format($deposit->amount)}}</td>
								<td> {{$deposit->bank_name}} </td>
								<td> {{$deposit->account_name}} </td>
								<td> {{$deposit->status}} </td>
								<td> {{$deposit->updated_at}} </td>
							</tr>
							@endforeach
						@else
							<tr>
								<td colspan="7"> No completed deposits has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			@if($deposits->count() > 0)
				<div class="mt-2">
					<hr/>
					{{$deposits->links("pagination::bootstrap-4")}}
				</div>
			@endif
		</div>
	</div><!--section_right_inner end-->

@endsection