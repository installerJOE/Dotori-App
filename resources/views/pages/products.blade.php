@extends('layouts.app')

@section('meta-content')
	<title> Shop Products | Dotori </title>
	<style>
		.modal .products > div{
            padding:10px;
        }
        .header2{
            font-size:16px
        }
	</style>
@endsection

@section('content')
	<div class="sub_top col-md-12 col-sm-12 col-12"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			Shop Products
		</div>
        <div class="ctrl-btn col-md-3 col-sm-6 col-12"> 
            <a href="/products/order-history"> 
                <button class="btn btn-purple-bd"> Order history </button>
            </a>
        </div><br/>
	</div><!--sub_top end-->

    <div class="section_right_inner"><!--section_right_inner-->
		<div class="col-md-12 col-sm-12 col-12">
			<div class="mt-4 col-md-12 col-sm-12 col-12">
				<h3 class="subheader text-grey"> 
					Choose a product to purchase
				</h3>
                @if($products->count() > 0)
                    @foreach($products as $product)
                        @if($product->is_active)
                            <div class="col-lg-3 col-md-4 col-sm-6 col-6 products">
                                <div>
                                    <img src="{{URL::asset('/storage/images/products/' . $product->filename)}}" width="100%" height="auto"/>
                                    <p class="product-name mt-1">{{$product->name}}</p>
                                    <div class="product-price">
                                        {{$product->price}} SPOINTS
                                    </div>
                                    <button class="btn btn-light-blue-bg" data-bs-toggle="modal" data-bs-target="#edit-package-modal-{{$product->id}}">
                                        View product
                                    </button>
                                </div>
                            </div>
                        @endif
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
                                            <img src="{{URL::asset('/storage/images/products/' . $product->filename)}}" width="100%" height="auto"/>
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
                                                {{$product->price}} SPOINTS 
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
                    <h2>
                        No Product has been created yet
                    </h2>
                @endif
			</div>
		</div>
	</div>
@endsection