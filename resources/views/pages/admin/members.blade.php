@extends('layouts.app')

@section('meta-content')
	<title> Members | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-users"></i>
            All Members
		</div>
	</div><!--sub_top end-->
			
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
			<div class="history_table">
				<table>
					<tbody>
						<tr>
                            <th> Member ID </th>
							<th> Email </th>
							<th> Available Balance (PTS) </th>
							<th> Earnings (SPOINT) </th>
                            <th> Date Joined </th>
                            <th> Action </th>
							<th>Status</th>
						</tr>						

						@if($members->count() > 0)
							@foreach ($members as $member)
								<tr>
									<td>{{strtoupper($member->memberId)}}</td>
									<td> {{$member->email}}</td>
									<td> {{$member->available_points}} </td>
									<td> {{$member->earnings}}</td>
									<td> {{$member->created_at}} </td>
									<td> 
										<button type="button" class="btn btn-sm btn-light-blue-bg"
											onclick="showMemberModal(
												`{{strtoupper($member->memberId)}}`, 
												`{{$member->available_points}}`, 
												`{{$member->reward !== null ? $member->reward->spoints : 0}}`
											)">
											Update Balance
										</button>
									</td>
									<td>
										@if ($member->status)
										<a href="{{route('admin.togglestatus', ['id' => $member->id])}}" class="btn btn-light-blue-bg btn-sm">Active</a>
										@else
										<a href="{{route('admin.togglestatus', ['id' => $member->id])}}" class="btn btn-light-blue-bg btn-sm">Suspended</a>
										@endif
									</td>
								</tr>
							@endforeach
						@else
							<tr>
								<td colspan="5"> No deposit has been made yet. </td>
							</tr>
						@endif
					</tbody>
				</table>
			</div>
			@if($members->count() > 0)
				<div class="mt-2">
					<hr/>
					{{$members->links("pagination::bootstrap-4")}}
				</div>
			@endif
		</div>
	</div><!--section_right_inner end-->
	<!-- Modal to display all the details of a deposit request -->
	<div class="modal fade" id="modal-request-deposit" tabindex="-1" role="dialog" aria-labelledby="request-deposit-label">
		<div class="modal-dialog modal-md modal-dialog-scrollable modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="text-blue modal-title" id="request-deposit-label">
						Update User Balance
					</h4>
					<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<div class="modal-body">
					<form id="form-update-balance" method="POST" action="/admin/update-user-balance">
						@csrf
						<div class="form-group">
							<span> 
								Member ID
							</span>
							<input type="text" 
								disabled
								class="form-control" 
								id='member_id'
							/>
						</div>
						
						<div class="form-group">
							<span> 
								Available Points (PTS)
							</span>
							<input type="number" 
								class="form-control" 
								id='available_points'
								name="available_points"
							/>
						</div>

						<div class="form-group">
							<span> 
								Shopping Points (SPOINTS)
							</span>
							<input type="text"
								class="form-control" 
								id='spoints'
								disabled
							/>
						</div>

						<input type="hidden" id="form_member_id" name="member_id"/>
						<button type="button" class="btn btn-purple-bg" onclick="updateUserBalance()">
							Update balance	
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<script>
		function showMemberModal(member_id, available_points, spoints){
			document.getElementById('member_id').value = member_id;
			document.getElementById('available_points').value = available_points;
			document.getElementById('spoints').value = spoints;
			document.getElementById('form_member_id').value = member_id;
			
			var $modal;
			$modal = $('#modal-request-deposit');
			$modal.modal('show');
		}	

		function updateUserBalance(){
			var confirmVal = confirm("Are you sure that you want to update this user's balance?");
			if(confirmVal){
				document.getElementById('form-update-balance').submit();
			}
		}
	</script>
@endsection