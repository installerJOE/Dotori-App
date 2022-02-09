@extends('layouts.app')

@section('meta-content')
	<title> Sales History | Dotori </title>
@endsection

@section('content')
	<div id="wrap"><!--wrap-->
		@include('includes.sidebar')	
		<div class="section_right"><!--section_right-->
			<div class="sub_top"><!--sub_top-->
				<div class="sub_title">
					<i class="fas fa-fw fa-history"></i>
					Referral History
				</div>
			</div><!--sub_top end-->
			
			<div class="section_right_inner"><!--section_right_inner-->
				<div class="bonus_history_box">
					<div class="history_table">
						<table>
							<tbody>
								<tr>
									<th> Phone number </th>
									<th> Membership rating </th>
									<th> Subscription Date</th>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div><!--section_right_inner end-->
		</div><!--section_right end-->
	</div><!-- / wrap end -->
@endsection