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
                        @include('includes.product')
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