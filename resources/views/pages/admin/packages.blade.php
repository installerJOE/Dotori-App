@extends('layouts.app')

@section('meta-content')
	<title> Deposit Request | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Subscription Packages
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<button type="button" class="btn btn-purple-bd" data-bs-toggle="modal" data-bs-target="#create-package-modal">
					Create package 
				</button>
			</div>

			<!-- Modal containing a form to add a new package -->
			<div class="modal right fade" id="create-package-modal" tabindex="-1" role="dialog" aria-labelledby="create-package-label">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="text-blue modal-title" id="create-package-label">
								Create New Package
							</h4>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form action="/admin/packages/store" method="POST">
								@csrf

								<div class="form-group">
									<span> 
										Package Name <span class="text-red">*</span> 
									</span>
									<input type="text" 
										class="form-control" 
										name="package_name" 
										value="{{old('package_name')}}" 
										required
									/>
								</div>

								<div class="form-group">
									<span> 
										Staking Amount (KRW) <span class="text-red">*</span> 
									</span>
									<input type="number" 
										class="form-control" 
										name="staking_amount" 
										value="{{old('staking_amount')}}" 
										required
									/>
								</div>

								<div class="form-group">
									<span>
										Reward (PTS) <span class="text-red">*</span> 
									</span>
									<input type="number" 
										class="form-control" 
										name="reward_pts" 
										value="{{old('reward_pts')}}" 
										required
									/>
								</div>
								<button type="submit" class="btn btn-purple-bg">
									Create package
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><br/>

		<div class="col-md-12 col-sm-12 col-12">
			<h4> Click on any package to view </h4>
            <div class="mt-4 col-md-12 col-sm-12 col-12">
                @foreach($packages as $package)
                    <div class="buy_package col-lg-3 col-md-4 col-sm-6 col-12 {{'buy_package0' . $package->id}}"
						data-bs-toggle="modal" data-bs-target="#edit-package-modal-{{$package->id}}">
                        <img src="{{URL::asset('/img/package0' . $package->id . '.png')}}" class="package_img"/>
                        <p class="text-white subheader mt-3">{{$package->name}}</p>
                        <h6 class="text-white">Reward - {{$package->reward}} PTS</h6>
                        <div class="total_sum {{'total_sum0' . $package->id}}">
                            {{$package->staking_amount}} KRW
                        </div>
                    </div>
					
					<!-- Modal containing a form to edit package -->
					<div class="modal right fade" id="edit-package-modal-{{$package->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-package-label-{{$package->id}}">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="text-blue modal-title" id="create-package-label">
										Edit Package
									</h4>
									<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>

								<div class="modal-body">
									<form action="/admin/packages/update/{{$package->id}}" method="POST">
										@csrf

										<div class="form-group">
											<span> 
												Package Name <span class="text-red">*</span> 
											</span>
											<input type="text" 
												class="form-control" 
												name="package_name" 
												value="{{$package->name}}" 
												required
											/>
										</div>

										<div class="form-group">
											<span> 
												Staking Amount (KRW) <span class="text-red">*</span> 
											</span>
											<input type="number" 
												class="form-control" 
												name="staking_amount" 
												value="{{$package->staking_amount}}" 
												required
											/>
										</div>

										<div class="form-group">
											<span>
												Reward (PTS) <span class="text-red">*</span> 
											</span>
											<input type="number" 
												class="form-control" 
												name="reward_pts" 
												value="{{$package->reward}}" 
												required
											/>
										</div>
										<button type="submit" class="btn btn-purple-bg">
											Update package
										</button>
									</form>
								</div>
							</div>
						</div>
					</div>
                @endforeach
            </div>
		</div>
	</div><!--section_right_inner end-->
@endsection