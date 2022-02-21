@extends('layouts.app')

@section('meta-content')
	<title> Products | Dotori </title>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-money-check-alt"></i>
			Shopping Products
		</div>
	</div><!--sub_top end-->
	<div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12 mb-4">
			<div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
				<button type="button" class="btn btn-purple-bd" data-bs-toggle="modal" data-bs-target="#create-package-modal">
					Create product 
				</button>
			</div>

			<!-- Modal containing a form to add a new package -->
			<div class="modal right fade" id="create-package-modal" tabindex="-1" role="dialog" aria-labelledby="create-package-label">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="text-blue modal-title" id="create-package-label">
								Create New Product
							</h4>
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>

						<div class="modal-body">
							<form action="/admin/shopping-product" method="POST" enctype="multipart/form-data">
								@csrf

								<div class="form-group">
									<span> 
										Product Name <span class="text-red">*</span> 
									</span>
									<input type="text" 
										class="form-control" 
										name="product_name" 
										value="{{old('product_name')}}" 
										required
									/>
								</div>

                                <div class="form-group">
									<span> 
										Product Description <em class="text-grey">(Optional)</em> 
									</span>
									<textarea
										class="form-control" 
										name="product_description" 
										defaultvalue="{{old('product_description')}}" 
                                        rows="5"
									></textarea>
								</div>

								<div class="form-group">
									<span> 
										Price (SPOINT) <span class="text-red">*</span> 
									</span>
									<input type="number" 
										class="form-control" 
										name="product_price" 
										value="{{old('product_price')}}" 
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
									Create product
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div><br/>
		@include('includes.productImageUpload')

		<div class="col-md-12 col-sm-12 col-12">
            <div class="mt-4 col-md-12 col-sm-12 col-12">
                @if($products->count() > 0)
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-4 col-sm-6 col-12 products">
                            <div>
                                <img src="{{asset('products/' . $product->filename)}}" width="100%" height="auto"/>
                                <p class="product-name mt-1">{{$product->name}}</p>
                                <div class="product-price">
                                    {{$product->price}} SPOINTS 
                                    @if($product->is_active == false)
                                        <span class="label purple-bg">
                                            disabled
                                        </span>
                                    @endif
                                </div>
                                <a href="/admin/shopping-products/{{$product->id}}">
                                    <button class="btn btn-light-blue-bg">
                                        View product
                                    </button>
                                </a>
                            </div>
                        </div>
						{{-- @if($products->count() > 0) --}}
                    @endforeach
					<div class="mt-2 col-md-12 col-sm-12 col-12">
						<hr/>
						{{$products->links("pagination::bootstrap-4")}}
					</div>
                @else
                    <h2>
                        No Product has been created yet
                    </h2>
                @endif
            </div>
		</div>
	</div><!--section_right_inner end-->
@endsection