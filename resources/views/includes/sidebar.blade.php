<div id="wrap"><!--wrap-->
    <div id="header"><!--header-->
        <div class="top_logo" style="float:left">
            <a href="/">
                <img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.85)"/> 
            </a>
        </div>
        
        
        {{-- For mobile view --}}
        <div class="m_top_section" style="top: -25px"><!--m_top_section-->
            <div class="m_nav">
                <img src="{{URL::asset('/img/nav.png')}}" alt="menu icon" class="m_nav menu">
            </div>
            <div class="m_logo">
                <a href="/dashboard">
                    <img src="{{asset('img/acorn1.png')}}" height="auto" style="transform: scale(0.85)"/> 
                </a>
            </div>


            <div id="m_nav" style="left:-150%;">
                <div class="m_nav_logo"> 
                    {{-- <img src="{{URL::asset('/storage/images/profile_images/'. Auth::user()->profile_image)}}" alt="profile image" class="level_img"> --}}
                    <span class="username">
                        {{Auth::user()->name}}
                        <br> 
                        <span class="text-light-blue">{{ strtoupper(Auth::user()->memberId)}}</span>
                    </span>
                    
                    <div class="close close-btn">
                        &times;
                    </div>
                    <span style="float: right;position: relative;/* right: -55%; */color: white;background-color: black;top: 9px;padding: 5px;border-radius: 17px;">
                        {{$rank->title ?? 0}}
                    </span>
                </div>
                <div class="sp10"></div>
                <div class="sp10"></div>
            
                <ul class="nav_list" style="padding:0px">
                    @if(Auth::user()->is_admin)
                        <li class='sub-menu'>
                            <a href="/admin/dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                                {{ __('Dashboard')}}
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="/admin/packages">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                {{ __('Packages')}}
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                {{ __('Shopping Products')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/shopping-products"> {{ __('All Products')}} </a></li>
                                <li class="tab_menu2"><a href="/admin/shopping/history"> {{ __('Shopping History')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-users"></i> &nbsp;
                                {{ __('Subscription History')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/subscribers/active"> {{ __('Active Subscriptions')}} </a></li>
                                <li class="tab_menu2"><a href="/admin/subscribers/pending"> {{ __('Pending Subscriptions')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/admin/members">
                                <i class="fas fa-fw fa-users"></i> &nbsp;
                                {{ __('All Members')}}
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                                {{ __('Deposits')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/deposits"> {{ __('Deposits History')}} </a></li>
                                <li class="tab_menu2"><a href="/admin/deposits/requests"> {{ __('Deposit Requests')}} </a></li>
                            </ul>
                        </li>
                        
                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-share-square"></i> &nbsp;
                                {{ __('Withdrawals')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/withdrawals"> {{ __('Withdrawal History')}} </a></li>
                                <li class="tab_menu2"><a href="/admin/withdrawals/requests"> {{ __('Withdrawal Requests')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!announcement">
                                <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                                {{ __('Announcement')}}
                            </a>
                            <ul>
                                <li><a href="/admin/announcements"> {{ __('View all') }}  </a></li>
                                <li><a href="/admin/announcement/create"> {{ __('Create new') }} </a></li>
                                {{-- <li><a href="/admin/announcements/"> Withdrawal Requests </a></li> --}}
                            </ul>
                        </li>
                    @else
                        <li class='sub-menu'>
                            <a href="/dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                                {{ __('Dashboard')}}
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!products">
                                <i class="fas fa-fw fa-history"></i> &nbsp;
                                {{ __('My Products')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/products/shop"> {{ __('Shop Products')}} </a></li>
                                <li class="tab_menu2"><a href="/products/order-history"> {{ __('Order History')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!profile">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                {{ __('My Packages')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/packages/subscribed"> {{ __('All Packages')}} </a></li>
                                <li class="tab_menu2"><a href="/packages/subscribe"> {{ __('Subscribe Package')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/referral">
                                <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                                {{ __('Referrals')}}
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                                {{ __('My Deposits')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/deposit"> {{ __('Request Deposit')}} </a></li>
                                <li class="tab_menu2"><a href="/deposits/history"> {{ __('Deposit History')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!withdrawal">
                                <i class="fas fa-fw fa-share-square"></i> &nbsp;
                                Withdrawals
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/withdrawal"> {{ __('Request Withdrawal')}} </a></li>
                                <li class="tab_menu2"><a href="/withdrawals/history"> {{ __('Withdrawal History')}} </a></li>
                            </ul>
                        </li>

                        {{-- <li class='sub-menu'>
                            <a href="#!history">
                                <i class="fas fa-fw fa-history"></i> &nbsp;
                                History
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/daily-history"> Daily History </a></li>
                            </ul>
                        </li> --}}

                        <li class='sub-menu'>
                            <a href="#!profile">
                                <i class="fas fa-fw fa-cogs"></i> &nbsp;
                                {{ __('Settings')}}
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/settings/profile"> {{ __('Profile Settings')}} </a></li>
                                <li class="tab_menu2"><a href="/settings/password"> {{ __('Password Settings')}} </a></li>
                                <li class="tab_menu2"><a href="/settings/pin"> {{ __('PIN Settings')}} </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/announcement">
                                <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                                {{ __('Announcement')}}
                            </a>
                        </li>
                    @endif

                    {{-- Logout button --}}
                    <li class='sub-menu'>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;
                            {{ __('Logout')}}
                        </a>
                    </li>	
                </ul>
            </div><!-- // #m_nav -->
        </div>
        
    </div><!--m_top_section end-->
</div><!--header end-->

<div class="left_menu"><!--left_menu PC-->
    <ul>
        @if(Auth::user()->is_admin)
            <li class='sub-menu li-underlined mt-4' style="background-color: #29033b">
                <a href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                    {{ __('Dashboard')}}
                </a>
            </li>
            
            <li class='sub-menu'>
                <a href="/admin/packages">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    {{ __('Packages')}}
                </a>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    {{ __('Shopping Products')}}
                </a>
                <ul>
                    <li><a href="/admin/shopping-products"> {{ __('All Products')}} </a></li>
                    <li><a href="/admin/shopping/history"> {{ __('Shopping History')}} </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-users"></i> &nbsp;
                    {{ __('Subscription History')}}
                </a>
                <ul>
                    <li><a href="/admin/subscribers/active"> {{ __('Active Subscriptions')}} </a></li>
                    <li><a href="/admin/subscribers/pending"> {{ __('Pending Subscriptions')}} </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="/admin/members">
                    <i class="fas fa-fw fa-users"></i> &nbsp;
                    {{ __('All Members')}}
                </a>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                    {{ __('Deposits')}}
                </a>
                <ul>
                    <li><a href="/admin/deposits"> {{ __('Deposits History')}} </a></li>
                    <li><a href="/admin/deposits/requests"> {{ __('Deposit Requests')}} </a></li>
                </ul>
            </li>
            <li class='sub-menu'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-share-square"></i> &nbsp;
                    {{ __('Withdrawals')}}
                </a>
                <ul>
                    <li><a href="/admin/withdrawals"> {{ __('Withdrawal History')}} </a></li>
                    <li><a href="/admin/withdrawals/requests"> {{ __('Withdrawal Requests')}} </a></li>
                </ul>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!announcement">
                    <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                    {{ __('Announcement')}}
                </a>
                <ul>
                    <li><a href="/admin/announcements"> {{ __('View all')}}  </a></li>
                    <li><a href="/admin/announcement/create"> {{ __('Create new')}} </a></li>
                    {{-- <li><a href="/admin/announcements/"> Withdrawal Requests </a></li> --}}
                </ul>
            </li>
        @else
            <li class='sub-menu li-underlined mt-4' style="background-color: #29033b">
                <a href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                    {{ __('Dashboard')}}
                </a>
            </li>

            <li class='sub-menu'>
                <a href="#!products">
                    <i class="fas fa-fw fa-history"></i> &nbsp;
                    {{ __('My Products')}}
                </a>
                <ul>
                    <li><a href="/products/shop"> {{ __('Shop Products')}} </a></li>
                    <li><a href="/products/order-history"> {{ __('Order History')}} </a></li>
                </ul>
            </li>
            
            <li class='sub-menu li-underlined'>
                <a href="#!package">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    {{ __('My Packages')}}
                </a>
                <ul>
                    <li><a href="/packages/subscribed"> {{ __('All Packages')}} </a></li>
                    <li><a href="/packages/subscribe"> {{ __('Subscribe Package ')}}</a></li>
                </ul>
            </li>
           
            <li class='sub-menu'>
                <a href="/referral">
                    <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                    {{ __('Referrals')}}
                </a>
            </li>
            
            <li class='sub-menu'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                    {{ __('My Deposits')}}
                </a>
                <ul>
                    <li><a href="/deposit"> {{ __('Request Deposit')}} </a></li>
                    <li><a href="/deposits/history"> {{ __('Deposit History')}} </a></li>
                </ul>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!withdrawal">
                    <i class="fas fa-fw fa-share-square"></i> &nbsp;
                    {{ __('Withdrawals')}}
                </a>
                <ul>
                    <li><a href="/withdrawal"> {{ __('Request Withdrawal')}} </a></li>
                    <li><a href="/withdrawals/history"> {{ __('Withdrawal History')}} </a></li>
                </ul>
            </li>
        
            {{-- <li class='sub-menu li-underlined'>
                <a href="#!history">
                    <i class="fas fa-fw fa-history"></i> &nbsp;
                    History
                </a>
                <ul>
                    <li><a href="/daily-history"> Daily History </a></li>
                </ul>
            </li> --}}

            <li class='sub-menu'>
                <a href="/announcement">
                    <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                    {{ __('Announcements')}}
                </a>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!profile">
                    <i class="fas fa-fw fa-cogs"></i> &nbsp;
                    {{ __('Settings')}}
                </a>
                <ul>
                    <li><a href="/settings/profile"> {{ __('Profile Settings')}} </a></li>
                    <li><a href="/settings/password"> {{ __('Password Settings')}} </a></li>
                    <li><a href="/settings/pin"> {{ __('PIN Settings')}} </a></li>
                </ul>
            </li>
        @endif
        
        {{-- Logout menu --}}
        <li class='sub-menu'>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;
                {{__('Logout')}}
            </a>
        </li>	
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>		
    </ul>
</div><!--left_menu-->

<script>
    $(document).ready(function(){
        $('.m_nav').click(function(){
            $('#m_nav').animate({left:'0'}, 500);
        });
        $('.close').click(function(){
            $('#m_nav').animate({left:'-150%'}, 500);
        });
    });

    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("100");
        $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });
</script>