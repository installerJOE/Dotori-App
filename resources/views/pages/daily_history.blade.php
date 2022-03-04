@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Withdrawal')}} | {{ __('Dotori')}} </title>
@endsection

@section('content')
			<div class="sub_top"><!--sub_top-->
				<div class="sub_title">
					<i class="fas fa-fw fa-history"></i>
					{{ __('Daily History')}}
				</div>
			</div><!--sub_top end-->
			<div class="section_right_inner"><!--section_right_inner-->
				<div class="bonus_history_box">
					<p class="title">
						<i class="fas fa-gift"></i>
						{{ __('Attracted Bonus')}}
					</p>
					<div class="history_table">
						<table>
							<tbody>
								<tr>
									<th> {{ __('Bonus')}} </th>
									<th> {{ __('Amount')}} (PTS) </th>
									<th> {{ __('Date')}} </th>
									<th> {{ __('Status')}} </th>
								</tr>
								<tr>
									<td> Inducement </td>
									<td> 120,000 </td>
									<td>2022-02-07</td>
									<td> Paid </td>
								</tr>
								<tr>
									<td> Accumulate </td>
									<td> 240,000 </td>
									<td>2022-02-07</td>
									<td> Pending </td>
								</tr>
								<tr>
									<td> Rank </td>
									<td> 45,000,000 </td>
									<td>2022-02-07</td>
									<td> Paid </td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!--section_right_inner end-->
@endsection