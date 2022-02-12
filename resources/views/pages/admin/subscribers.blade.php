@extends('layouts.app')

@section('meta-content')
	<title> Subscribers | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-history"></i>
            Subscribers
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
							<th> Name </th>
							<th> Packages </th>
							<th> Quantity </th>
                            <th> Status </th>
                            <th> Date </th>
						</tr>						
					</tbody>
				</table>
			</div>
		</div>
	</div><!--section_right_inner end-->
@endsection