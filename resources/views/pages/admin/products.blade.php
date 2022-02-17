@extends('layouts.app')

@section('meta-content')
	<title> Deposit Request | Dotori </title>
	<style>
		img {
            display: block;
            max-width: 100%;
			max-height: auto;
        }
        .preview {
            overflow: hidden;
            width: 160px; 
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
        .modal-lg{
            max-width: 800px !important;
        }

	</style>
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
                                <img src="{{URL::asset('/storage/images/products/' . $product->filename)}}" width="100%" height="auto"/>
                                <p class="product-name mt-1">{{$product->name}}</p>
                                <div class="product-price">
                                    {{$product->price}} SPOINTS 
                                    @if($product->is_active == false)
                                        <span class="label purple-bg">
                                            disabled
                                        </span>
                                    @endif
                                </div>
                                <button class="btn btn-light-blue-bg" data-bs-toggle="modal" data-bs-target="#edit-package-modal-{{$product->id}}">
                                    View product
                                </button>
                            </div>
                        </div>
                        
                        <!-- Modal containing a form to edit package -->
                        <div class="modal right fade" id="edit-package-modal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="edit-package-label-{{$product->id}}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="text-blue modal-title" id="create-package-label-{{$product->id}}">
                                            Edit Package
                                        </h4>
                                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <form action="/admin/shopping-products/{{$product->id}}/update" method="POST">
                                            @csrf

                                            <div class="form-group">
                                                <span> 
                                                    Product Name <span class="text-red">*</span> 
                                                </span>
                                                <input type="text" 
                                                    class="form-control" 
                                                    name="product_name" 
                                                    value="{{$product->name}}" 
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
                                                    rows="5"
                                                >{{$product->description}}</textarea>
                                            </div>
            
                                            <div class="form-group">
                                                <span> 
                                                    Price (SPOINT) <span class="text-red">*</span> 
                                                </span>
                                                <input type="number" 
                                                    class="form-control" 
                                                    name="product_price" 
                                                    value="{{$product->price}}" 
                                                    required
                                                />
                                            </div>
                                            <button type="submit" class="btn btn-purple-bg">
                                                Update product
                                            </button> &nbsp;
                                            @if($product->is_active)
                                                <button type="button" class="btn btn-grey-bg" onclick="updateProductStatus('disable')">
                                                    Disable product
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-purple-bd" onclick="updateProductStatus('enable')">
                                                    Enable product
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <form action="/admin/shopping-products/{{$product->id}}/update-status" method="POST" id="update-product-status-form">
                            @csrf
                            <input type="hidden" name="status-action" id="status-action"/>
                        </form>
                    @endforeach
                @else
                    <h2>
                        No Product has been created yet
                    </h2>
                @endif
            </div>
		</div>
	</div><!--section_right_inner end-->

    <script>
        function updateProductStatus(statusAction){
            var confirmDisable = confirm(`Are your sure you want to ${statusAction} this product?`);
            if(confirmDisable){
                document.getElementById('status-action').value = statusAction;
                document.getElementById('update-product-status-form').submit();
            }
        }
    </script>
@endsection