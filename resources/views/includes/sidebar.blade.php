{{-- For mobile view --}}
<div id="wrap"><!--wrap-->
    <div id="header"><!--header-->
        <div class="top_logo">
            <a href="/">
                {{-- <img src="../img/logo.jpg" alt="로고"> --}}
                <h1> Dotori </h1>
            </a>
        </div>
        
        <div class="m_top_section"><!--m_top_section-->
            <div class="m_nav">
                <img src="../img/nav.png" alt="모바일네비게이션" class="m_nav menu">
            </div>
            <div class="m_logo">
                <a href="/dashboard">
                    {{-- <img src="../img/logo.jpg" alt="mobilelogo" class="m_logo"/> --}}
                    <h1> Dotori </h1>
                </a>
            </div>


            <div id="m_nav" style="left:-150%;">
                <div class="m_nav_logo"> 
                    <img src="../img/level1.png" alt="" class="level_img">
                    <span class="username">test2<br>홍길동</span></span>
                    <div class="close close-btn">
                        &times;
                    </div>
                </div>
                <div class="sp10"></div>
                <div class="sp10"></div>
            
                <ul class="nav_list" style="padding:0px">
                    <li class='sub-menu'>
                        <a href="/dashboard">
                            <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                            Dashboard
                        </a>
                    </li>

                    <li class='sub-menu'>
                        <a href="#">
                            <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                            Organization    
                        </a>
                        <ul class="tab_menu" style="display:none;">
                            <li class="tab_menu2">
                                <a href="/referral">
                                    Referrals
                                </a>
                            </li>
                        </ul>
                    </li>
                
                    <li class='sub-menu'>
                        <a href="/purchase-package">
                            <i class="fas fa-fw fa-cube"></i> &nbsp;
                            Purchase
                        </a>
                    </li>

                    <li class='sub-menu'>
                        <a href="/deposit">
                            <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                            Deposit
                        </a>
                    </li>

                    <li class='sub-menu'>
                        <a href="/withdrawal">
                            <i class="fas fa-fw fa-share-square"></i> &nbsp;
                            Withdrawal
                        </a>
                    </li>

                    <li class='sub-menu'>
                        <a href="#">
                            <i class="fas fa-fw fa-history"></i> &nbsp;
                            History
                        </a>
                        <ul class="tab_menu" style="display:none;">
                            <li class="tab_menu2"><a href="/daily-history"> Daily History </a></li>
                            <li class="tab_menu2"><a href="/referral-history"> Referral History </a></li>	
                        </ul>
                    </li>

                    <li class='sub-menu'>
                        <a href="#">
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

                    {{-- Logout button --}}
                    <li class='sub-menu'>
                        <a href="/">
                            <i class="fas fa-fw fa-sign-out-alt"></i> &nbsp;
                            Logout
                        </a>
                    </li>	
                </ul>
            </div><!-- // #m_nav -->
        </div>
        
    </div><!--m_top_section end-->
</div><!--header end-->

<div class="left_menu"><!--left_menu PC버전-->
    <ul>
        <li class='sub-menu'>
            <a href="/dashboard">
                <i class="fas fa-fw fa-tachometer-alt"></i> &nbsp;
                Dashboard
            </a>
        </li>

        <li class='sub-menu'>
            <a href="#">
                <i class="fas fa-fw fa-sitemap"></i> &nbsp;
                Organization
            </a>
            <ul>
                <li><a href="/referral"> Referrals </a></li>
            </ul>
        </li>

        <li class='sub-menu'>
            <a href="/purchase-package"> 
                <i class="fas fa-fw fa-cube"></i> &nbsp;
                Purchase
            </a>
        </li>
        
        <li class='sub-menu'>
            <a href="/deposit">
                <i class="fas fa-fw fa-money-check-alt"></i> &nbsp; 
                Deposit
            </a>
        </li>

        <li class='sub-menu'>
            <a href="/withdrawal">
                <i class="fas fa-fw fa-share-square"></i> &nbsp;
                Withdrawal
            </a>
        </li>
        <li class='sub-menu'>
            <a href="#!history">
                <i class="fas fa-fw fa-history"></i> &nbsp;
                History
            </a>
            <ul>
                <li><a href="/daily-history"> Daily History </a></li>
                <li><a href="/referral-history"> Referral History </a></li>		
            </ul>
        </li>

        <li class='sub-menu'>
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