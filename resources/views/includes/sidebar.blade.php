{{-- For mobile view --}}
<div id="wrap"><!--wrap-->
    <div id="header"><!--header-->
        <div class="top_logo">
            <a href="/">
                <h1> Dotori </h1>
            </a>
        </div>
        
        <div class="m_top_section"><!--m_top_section-->
            <div class="m_nav">
                <img src="{{URL::asset('/img/nav.png')}}" alt="menu icon" class="m_nav menu">
            </div>
            <div class="m_logo">
                <a href="/dashboard">
                    <h1> Dotori </h1>
                </a>
            </div>


            <div id="m_nav" style="left:-150%;">
                <div class="m_nav_logo"> 
                    <img src="{{URL::asset('/storage/images/profile_images/'. Auth::user()->profile_image)}}" alt="profile image" class="level_img">
                    <span class="username">
                        {{Auth::user()->name}}
                        <br> 
                        <span class="text-light-blue">{{ strtoupper(Auth::user()->memberId)}}</span>
                    </span>
                    <div class="close close-btn">
                        &times;
                    </div>
                </div>
                <div class="sp10"></div>
                <div class="sp10"></div>
            
                <ul class="nav_list" style="padding:0px">
                    @if(Auth::user()->is_admin)
                        <li class='sub-menu'>
                            <a href="/admin/dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                                Dashboard
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="/admin/packages">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                Packages
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                Shopping Products
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/shopping-products"> All Products </a></li>
                                <li class="tab_menu2"><a href="/admin/shopping/history"> Shopping History </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-users"></i> &nbsp;
                                Subscription History
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/subscribers/active"> Active Subscriptions </a></li>
                                <li class="tab_menu2"><a href="/admin/subscribers/pending"> Pending Subscriptions </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/admin/members">
                                <i class="fas fa-fw fa-users"></i> &nbsp;
                                All Members
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                                Deposits
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/deposits"> Deposits History </a></li>
                                <li class="tab_menu2"><a href="/admin/deposits/requests"> Deposit Requests </a></li>
                            </ul>
                        </li>
                        
                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-share-square"></i> &nbsp;
                                Withdrawals
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/admin/withdrawals"> Withdrawal History </a></li>
                                <li class="tab_menu2"><a href="/admin/withdrawals/requests"> Withdrawal Requests </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!announcement">
                                <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                                Announcement
                            </a>
                            <ul>
                                <li><a href="/admin/announcements"> View all  </a></li>
                                <li><a href="/admin/announcement/create"> Create new </a></li>
                                {{-- <li><a href="/admin/announcements/"> Withdrawal Requests </a></li> --}}
                            </ul>
                        </li>
                    @else
                        <li class='sub-menu'>
                            <a href="/dashboard">
                                <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                                Dashboard
                            </a>
                        </li>
                        
                        <li class='sub-menu'>
                            <a href="#!products">
                                <i class="fas fa-fw fa-history"></i> &nbsp;
                                My Products
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/products/shop"> Shop Products </a></li>
                                <li class="tab_menu2"><a href="/products/order-history"> Order History </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!profile">
                                <i class="fas fa-fw fa-cube"></i> &nbsp;
                                My Packages
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/packages/subscribed"> All Packages </a></li>
                                <li class="tab_menu2"><a href="/packages/subscribe"> Subscribe Package </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/referral">
                                <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                                Referrals
                            </a>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!deposit">
                                <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                                My Deposits
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/deposit"> Request Deposit </a></li>
                                <li class="tab_menu2"><a href="/deposits/history"> Deposit History </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="#!withdrawal">
                                <i class="fas fa-fw fa-share-square"></i> &nbsp;
                                Withdrawals
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/withdrawal"> Request Withdrawal </a></li>
                                <li class="tab_menu2"><a href="/withdrawals/history"> Withdrawal History </a></li>
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
                                Settings
                            </a>
                            <ul>
                                <li class="tab_menu2"><a href="/settings/profile"> Profile Settings </a></li>
                                <li class="tab_menu2"><a href="/settings/password"> Password Settings </a></li>
                                <li class="tab_menu2"><a href="/settings/pin"> PIN Settings </a></li>
                            </ul>
                        </li>

                        <li class='sub-menu'>
                            <a href="/announcement">
                                <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                                Announcement
                            </a>
                        </li>
                    @endif

                    {{-- Logout button --}}
                    <li class='sub-menu'>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;
                            Logout
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
                    Dashboard
                </a>
            </li>
            
            <li class='sub-menu'>
                <a href="/admin/packages">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    Packages
                </a>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    Shopping Products
                </a>
                <ul>
                    <li><a href="/admin/shopping-products"> All Products </a></li>
                    <li><a href="/admin/shopping/history"> Shopping History </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-users"></i> &nbsp;
                    Subscription History
                </a>
                <ul>
                    <li><a href="/admin/subscribers/active"> Active Subscriptions </a></li>
                    <li><a href="/admin/subscribers/pending"> Pending Subscriptions </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="/admin/members">
                    <i class="fas fa-fw fa-users"></i> &nbsp;
                    All Members
                </a>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                    Deposits
                </a>
                <ul>
                    <li><a href="/admin/deposits"> Deposits History </a></li>
                    <li><a href="/admin/deposits/requests"> Deposit Requests </a></li>
                </ul>
            </li>
            <li class='sub-menu'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-share-square"></i> &nbsp;
                    Withdrawals
                </a>
                <ul>
                    <li><a href="/admin/withdrawals"> Withdrawal History </a></li>
                    <li><a href="/admin/withdrawals/requests"> Withdrawal Requests </a></li>
                </ul>
            </li>

            <li class='sub-menu li-underlined'>
                <a href="#!announcement">
                    <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                    Announcement
                </a>
                <ul>
                    <li><a href="/admin/announcements"> View all  </a></li>
                    <li><a href="/admin/announcement/create"> Create new </a></li>
                    {{-- <li><a href="/admin/announcements/"> Withdrawal Requests </a></li> --}}
                </ul>
            </li>
        @else
            <li class='sub-menu li-underlined mt-4' style="background-color: #29033b">
                <a href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                    Dashboard
                </a>
            </li>

            <li class='sub-menu'>
                <a href="#!products">
                    <i class="fas fa-fw fa-history"></i> &nbsp;
                    My Products
                </a>
                <ul>
                    <li><a href="/products/shop"> Shop Products </a></li>
                    <li><a href="/products/order-history"> Order History </a></li>
                </ul>
            </li>
            
            <li class='sub-menu li-underlined'>
                <a href="#!package">
                    <i class="fas fa-fw fa-cube"></i> &nbsp;
                    My Packages
                </a>
                <ul>
                    <li><a href="/packages/subscribed"> All Packages </a></li>
                    <li><a href="/packages/subscribe"> Subscribe Package </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="/referral">
                    <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                    Referrals
                </a>
            </li>
            
            <li class='sub-menu li-underlined'>
                <a href="#!deposit">
                    <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                    My Deposits
                </a>
                <ul>
                    <li><a href="/deposit"> Request Deposit </a></li>
                    <li><a href="/deposits/history"> Deposit History </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="#!withdrawal">
                    <i class="fas fa-fw fa-share-square"></i> &nbsp;
                    Withdrawals
                </a>
                <ul>
                    <li><a href="/withdrawal"> Request Withdrawal </a></li>
                    <li><a href="/withdrawals/history"> Withdrawal History </a></li>
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

            <li class='sub-menu li-underlined'>
                <a href="#!profile">
                    <i class="fas fa-fw fa-cogs"></i> &nbsp;
                    Settings
                </a>
                <ul>
                    <li><a href="/settings/profile"> Profile Settings </a></li>
                    <li><a href="/settings/password"> Password Settings </a></li>
                    <li><a href="/settings/pin"> PIN Settings </a></li>
                </ul>
            </li>

            <li class='sub-menu'>
                <a href="/announcement">
                    <i class="fas fa-bullhorn fa-fw"></i> &nbsp;
                    Announcement
                </a>
            </li>
        @endif
        
        {{-- Logout menu --}}
        <li class='sub-menu'>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;
                Logout
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