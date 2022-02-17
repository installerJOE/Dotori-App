@extends('layouts.app')

@section('meta-content')
	<title> Dashboard | Dotori </title>
	<script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.2/dist/circle-progress.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/react@16.12/umd/react.production.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/react-dom@16.12/umd/react-dom.production.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/prop-types@15.7.2/prop-types.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.34/browser.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="https://cdn.jsdelivr.net/npm/react-apexcharts@1.3.6/dist/react-apexcharts.iife.min.js"></script> 
	<style>
		
	</style>
@endsection
 
@section('content')
	<div class="main_notice">
		<p class="sub_title" style="padding-top: 0px !important"> 
			<i class="fas fa-fw fa-tachometer-alt"></i>
			Dashboard 
		</p>
		<div class="notice_more" onclick="locaion.href='#'">
			MORE+ 
		</div>
	</div>
	<div class="section_right_inner">
		<!--main_section01--> 
		<div class="main_section01">       
			<div class="main_balance_box main_balance_box02">
				<p class="title01 mb-2"> My Earnings </p>
				<p class="s_title01">(SPOINT) &nbsp;</p>
				<div class="total_sum total_sum02">
					<p> {{Auth::user()->earnings}} </p>
				</div>
			</div>
			<div class="main_balance_box main_balance_box01">
				<p class="title01"> My Level</p>
				<p class="s_title01"></p>
				<div class="total_sum total_sum01">
		
					<p> {{number_format($rank->title ?? 0)}} </p>

				</div>
			</div>					
			<div class="main_balance_box main_balance_box04">
				<p class="title01 mb-2"> My Balance </p>
				<p class="s_title01">(SPOINT) &nbsp;</p>
				<div class="total_sum total_sum04">
					<p> {{Auth::user()->available_points}} </p>
				</div>
			</div>
			<div class="main_balance_box main_balance_box03">
				<p class="title01"> No. of Referrals </p>
				<p class="s_title01">&nbsp;</p>
				<div class="total_sum total_sum03">
					<p> {{$referrals}} </p>
				</div>
			</div>					
		</div>
		<!--main_section01 end-->

		<!--main_section02-->
		<div class="main_section02">
			{{-- <div class="bonus_div">
				<p class="title">
					<i class="fas fa-chart-pie"></i>
					Subscription Chart
				</p>
				<div id="app"></div>
				<div class="bonus_total">
					<ul>
						<li>
							<span class="span01"></span>
							<span> earnings </span>
							<span class="total"> </span>
						</li>
						<li>
							<span class="span01"></span>
							<span> referrals </span>
							<span class="total"> </span>
						</li>
						<li>
							<span class="span01"></span>
							<span> rank </span>
							<span class="total"> </span>
						</li>
					</ul>
				</div>
			</div> --}}

			<div class="bonus_div referral-block">
				<div class="title">
					<i class="fas fa-link"></i>
					Referral Link
				</div><br/>
				<p class="referral-link">
					<span id="linkBar"> 
						{{"http://127.0.0.1:8000/register?refer=" . Auth::user()->memberId}}
					</span>
				</p>
				<p>
					<button class="btn btn-purple-bd"> Copy link </button>
				</p>
			</div>
		</div>
		<!--main_section02 end-->

		<!--main_section03-->
		<div class="main_section03">
			<!--history_box01-->
			<div class="history_box01 mb-4">
				<p class="title">
					<i class="fas fa-gift"></i> 
					Active Subscriptions
				</p>					

				<!--Daily history-->
				<div id ="tab-1" class="tab-content current table_a">
					<table>
						<tr>
							<th> Package </th>
							<th> Staking Amount (KRW) </th>
							<th> Rewards/Profit (SPOINT) </th>
							<th> Status </th>
						</tr>
						@if(Auth::user()->subscribed_users->count() > 0)
							@foreach(Auth::user()->subscribed_users as $subscriber)
								@if($subscriber->status === "active")
									<tr>
										<td>{{$subscriber->package->name}}</td>
										<td>{{$subscriber->package->staking_amount * $subscriber->quantity}}</td>
										<td> 
											{{(($subscriber->percent_paid + (200*$subscriber->repurchase))/100) * $subscriber->quantity * $subscriber->package->staking_amount}}
										</td>
										<td>{{$subscriber->status}}</td>
									</tr>	
								@endif
							@endforeach
						@else
							<tr>
								<td colspan="4" style="font-size:21px; padding: 10px;"> You have no active subscription yet. </td>
							</tr>
						@endif
					</table>
				</div>
				<!--Daily history end-->
			</div>
			<!--history_box01 end-->

			{{-- <!--history_box02-->
			<div class="col-md-12 col-sm-12 col-12 history_box02">	
				<p class="title">
					<i class="fas fa-history"></i>
					Withdrawal History
				</p>
				<div class="table_a">
					<table>
						<tr>
							<th> Amount (KRW) </th>
							<th> Date </th>
							<th> Status </th>
						</tr>
						<tr>
							<td colspan="3" style="font-size:21px; padding: 10px;"> No withdrawals have been made yet </td>
						</tr>
					</table>
				</div>
			</div>
			<!--history_box02 end--> --}}
		</div>
		<!--main_section03 end-->
	</div><!--section_right inner end-->

	<script type="text/babel">
      	class ApexChart extends React.Component {
        	constructor(props) {
          		super(props);

				this.state = {
					series: [44, 55, 13, 33, 12],
					options: {
						chart: {
							width: 240,
							type: 'donut',
						},
						dataLabels: {
							enabled: false
						},
						responsive: [{
							breakpoint: 480,
							options: {
								chart: {
									width: 200
								},
								legend: {
									show: false
								}
							}
						}],
						legend: {
							position: 'right',
							offsetY: 0,
							height: 230,
						}
					},
				};
        	}
      
			appendData() {
				var arr = this.state.series.slice()
				arr.push(Math.floor(Math.random() * (100 - 1 + 1)) + 1)
				this.setState({
					series: arr
				})
			}
        
			removeData() {
				if(this.state.series.length === 1) return
				
				var arr = this.state.series.slice()
				arr.pop()
				
				this.setState({
					series: arr
				})
			}
        
			randomize() {
				this.setState({
					series: this.state.series.map(function() {
					return Math.floor(Math.random() * (100 - 1 + 1)) + 1
					})
				})
			}
			
			reset() {
				this.setState({
					series: [44, 55, 13, 33]
				})
			}
      
			render() {
				return (
					<div>
						<div>
							<div class="chart-wrap">
								<div id="chart">
									<ReactApexChart 
									  options={this.state.options} 
									  series={this.state.series} 
									  type="donut" 
									  width={240} 
									/>
								</div>
							</div>
						</div>
					</div>
				);
			}
        }
		
		const domContainer = document.querySelector('#app');
      	ReactDOM.render(React.createElement(ApexChart), domContainer);
    </script>

	<script>
		$(document).ready(function(){
			$('ul.tab_ul li').click(function(){
				var tab_id = $(this).attr('data-tab');

				$('ul.tab_ul li').removeClass('current');
				$('ul.tab_ul li').removeClass('tab_active');
				$('.tab-content').removeClass('current');

				$(this).addClass('current');
				$(this).addClass('tab_active');
				$("#"+tab_id).addClass('current');
			})
		})
	</script>
@endsection



