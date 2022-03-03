@extends('layouts.app')

@section('meta-content')
	<title> Search Result | Dotori </title>
	<style>
		.post-section{
			margin-bottom: 2em;
			padding-bottom: 10px;
			border-bottom: 1px solid #d9d9d9;
		}
		.post-section > div{
			padding: 10px;
		}
	</style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-search"></i>
			Search Results
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="section_right_inner"><!--section_right_inner-->
			<div class="deposit_right col-md-12 col-sm-12 col-12 mt-4">
				@if(count($results) > 0)
					@foreach ($results as $product)
						<div class="post-section col-md-12 col-lg-11">
							<div class="col-md-4 col-sm-4 col-12">
								<img src="{{asset('products/' . $product->filename)}}" alt="profile image" width="100%"/>
							</div>
							<div class="col-md-8 col-sm-8 col-12 blog-content">
								<h2>
									{{$product->name}}
								</h2>
								<p>
									{{Str::words($product->description, 20, ' . . .')}}
								</p>
								<p style="margin-top:1.3em;" class="col-md-3 col-sm-4 col-6">
									<button class="btn btn-light-blue-bg" data-bs-toggle="modal" data-bs-target="#edit-package-modal-{{$product->id}}">
										View product
									</button>
								</p>
							</div>
						</div>

						{{-- Modal for each product --}}
						<div class="modal fade" id="edit-package-modal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-package-label-{{$product->id}}">
							<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="text-blue modal-title" id="create-package-label-{{$product->id}}">
											View Product
										</h4>
										<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>

									<div class="modal-body products">
										<div class="col-md-8 col-sm-8 col-8">
											<img src="{{asset('products/' . $product->filename)}}" width="100%" height="auto"/>
										</div>
										<div class="col-md-4 col-sm-4 col-4">                                               
											<p class="modal-package-header header2 grey-bg mb-2 mt-3"> Product Status </p>
											<h3 style="font-size: 16px; font-weight:bold">
												Available in stock
											</h3>
										</div>
										<div class="col-md-12 col-sm-12 col-12">
											<h2 class="mt-1 text-purple">{{$product->name}}</h2>
											<div class="product-price">
												{{number_format($product->price)}} SPOINTS 
											</div> <hr/>
											<h3 class="modal-package-header grey-bg"> Description </h3>
											<h3 style="font-size: 16px">
												{{$product->description}}
											</h3>
										</div>
									</div>
									<div class="modal-footer">
										<a href="/products/{{$product->id}}/purchase">
											<button type="button" class="btn btn-purple-bg" style="padding-left: 30px; padding-right: 30px">
												Buy product
											</button>
										</a>
									</div>
								</div>
							</div>
						</div>
					@endforeach
				@else
					<h3 style="font-size:32px"> 
						Search result not found!
					</h3>
				@endif
			</div>
		</div><!--section_right_inner end-->
	</div><!--section_right_inner end-->
@endsection