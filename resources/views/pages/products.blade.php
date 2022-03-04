@extends('layouts.app')

@section('meta-content')
	<title> {{ __('Shop Products')}} | {{ __('Dotori')}} </title>
	<style>
		.modal .products > div{
            padding:10px;
        }
        .header2{
            font-size:16px
        }
        @media screen and (max-width: 575px) {
            .ctrl-btn{
                margin-bottom: 2em
            }
        }
	</style>
@endsection

@section('content')
	<div class="sub_top col-md-12 col-sm-12 col-12" style="padding-bottom:2em"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-cube"></i>
			{{ __('Shop Products')}}
		</div><hr class="dashboard-hr"/>
        <div class="ctrl-btn col-md-3 col-sm-6 col-12" style="float:right; padding-right:15px"> 
            <a href="/products/order-history"> 
                <button class="btn btn-purple-bd"> {{ __('Order history')}} </button>
            </a>
        </div>
        <div class="col-md-9 col-sm-6 col-12"> 
            <h3 class="subheader text-grey"> 
                {{ __('Search products')}}
            </h3>
            <div class="search-container">
                <form action="{{route('search.product')}}" method="GET">
                    <input type="text" placeholder="Search.." name="search">
                    <button type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
	</div><!--sub_top end-->

    <div class="section_right_inner"><!--section_right_inner-->
        <div class="col-md-12 col-sm-12 col-12">
			<div class="mt-4 col-md-12 col-sm-12 col-12">
				<h3 class="subheader text-grey"> 
					{{ __('Choose a product to purchase')}}
				</h3>
                @if($products->count() > 0)
                    @foreach($products as $product)
                        @include('includes.product')
                    @endforeach
                @else
                    <h2>
                        {{ __('No Product has been created yet')}}
                    </h2>
                @endif
			</div>
		</div>
	</div>
@endsection