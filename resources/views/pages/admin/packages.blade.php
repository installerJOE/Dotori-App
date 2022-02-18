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
										Staking Amount (SPOINT) <span class="text-red">*</span> 
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
										Reward (RPOINT) <span class="text-red">*</span> 
									</span>
									<input type="number" 
										class="form-control" 
										name="reward_pts" 
										value="{{old('reward_pts')}}" 
										required
									/>
								</div>

								{{-- Image upload section --}}
								<div class="form-group">
									<div class="container" style="padding:0px">
										<div class="row" style="padding:0px">
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 mb-2" id="image_container" style="padding:0px; display:none">
												<img id="output_img" width="100%" height="auto"/>
											</div>
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 file-input">
												<input type="file" name="product_image" class="image" accept=".png, .jpg, .jpeg" required="required"/><br><br>
												<input type="hidden" id="base64image" name="base64image">
											</div>
										</div>
									</div>
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
		@include('includes.productImageUpload')

		<div class="col-md-12 col-sm-12 col-12">
			<h4> Click on any package to view </h4>
            <div class="mt-4 col-md-12 col-sm-12 col-12">
                @foreach($packages as $package)
                    <a href="/admin/packages/{{$package->id}}">
						<div class="buy_package col-lg-3 col-md-4 col-sm-6 col-12 {{'buy_package0' . $package->id}}">
							<img src="{{URL::asset('packages/' . $package->filename)}}" class="package_img"/>
							<p class="text-white subheader mt-3">{{$package->name}}</p>
							<h6 class="text-white">Reward - {{number_format($package->reward)}} RPOINT</h6>
							<div class="total_sum {{'total_sum0' . $package->id}}">
								{{number_format($package->staking_amount + $package->reward)}} KRW
							</div>
						</div>
					</a>
                @endforeach
            </div>
		</div>
	</div><!--section_right_inner end-->
@endsection