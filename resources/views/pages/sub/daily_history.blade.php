@extends('layouts.app')

@section('meta-content')
	<title> Withdrawal | Dotori </title>
@endsection

@section('content')

	<div id="wrap"><!--wrap-->
		@include('includes.sidebar')	
		<div class="section_right"><!--section_right-->
			<div class="sub_top"><!--sub_top-->
				<div class="sub_title">
					<i class="fas fa-fw fa-history"></i>
					Daily History
				</div>
			</div><!--sub_top end-->
			<div class="section_right_inner"><!--section_right_inner-->
				<div class="bonus_history_box">
					<p class="title">
						<i class="fas fa-gift"></i>
						Attracted Bonus
					</p>
					<div class="history_table">
						<table>
							<tbody>
								<tr>
									<th> Bonus </th>
									<th> Amount (PTS) </th>
									<th> Date </th>
									<th> Status </th>
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

			
		</div><!--section_right end-->
	</div><!-- / wrap end -->
@endsection