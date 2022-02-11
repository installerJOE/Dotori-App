@extends('layouts.app')

@section('meta-content')
	<title> Referrals | Dotori </title>
	<style>
		.sub_title img {
			float: left;
			margin-top: 13px;
			margin-right: 5px;
		}
		p{
			line-height: 2em;
			margin-bottom: 1.2em
		}
		.card{
			padding: 20px 30px
		}
	</style>
@endsection

@section('content')
	<div class="sub_top"><!--sub_top-->
		<div class="sub_title">
			<i class="fas fa-fw fa-sitemap"></i> 
			Recommendation Chart
		</div>
	</div><!--sub_top end-->

	<div class="section_right_inner"><!--section_right_inner-->				
		<div class="col-md-6 col-sm-6 col-12 card">
			<h4 class="text-purple"> Referral Link: </h4>
			<p class="referral-link">
				https://www.detori.com/user?referral=devijo
			</p>
			<p> 
				<input type="button" value="Copy Link" class="btn btn-purple-bd"/>
			</p>
		</div><br/>
		<div style="background:#FFFFFF">
			<iframe src="tree_view2.php?code=1000001" width="100%" height="750px" style="border:hidden;"></iframe>
		</div>					
	</div><!--section_right_inner end-->
@endsection