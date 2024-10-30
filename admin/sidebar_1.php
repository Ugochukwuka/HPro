
<div class="main-sidebar sidebar-style-2" style="width:180px">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand" style="padding-top: -30px">
            <a href="dashborad_1"> <img alt="image" src="../images/<?php 
            
            echo $allCompanyDetPic;
            
            
            ?>"  style="width:150px; height:100px; margin-left:7px; 
            padding-bottom:26px; margin-right:80px" class="header-logo" /> <span
                    class="logo-name"></span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header"></li>
            <li class="dropdown active">
                <a href="dashborad_1" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="all_users" class="menu-toggle nav-link has-dropdown"><i
                        data-feather="briefcase"></i><span>My View</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="all_users">Users</a></li>
                    <li><a class="nav-link" href="all_deposit">Deposit</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="all_invest"><i data-feather="file"></i><span>Invest</span></a></li>
            <li><a class="nav-link" href="company"><i data-feather="file"></i><span>Company Det.</span></a></li>
            
            <li class="dropdown">
                <a href="all_withdraw" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>My Withdraw</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="all_withdraw">Profit Withdraw</a></li>
                    <li><a class="nav-link" href="all_withdrawamount">Capital Withdraw</a></li>
                    <li><a class="nav-link" href="all_withref">Bonus Withdraw</a></li>
                </ul>
            </li>
            
            <li><a class="nav-link" href="all_referral"><i data-feather="user"></i><span>Referral</span></a></li>
            <!--Plan Setting -->
            <li class="dropdown">
                <a href="all_withdraw" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Plan Manag.</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="aplan">Add Plan</a></li>
                    <li><a class="nav-link" href="view_allplans">View Plans</a></li>
                </ul>
            </li>

            <!-- Wallet Setting -->
            <li class="dropdown">
                <a href="all_withdraw" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>Wallets</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="wallet_profile">Add Wallet</a></li>
                    
                </ul>
            </li>

            <!-- Company Setting -->
            <!-- <li class="dropdown">
                <a href="all_withdraw" class="menu-toggle nav-link has-dropdown"><i
                            data-feather="briefcase"></i><span>My Withdraw</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="all_withdraw">Profit Withdraw</a></li>
                    <li><a class="nav-link" href="all_withdrawamount">Capital Withdraw</a></li>
                    <li><a class="nav-link" href="all_withref">Bonus Withdraw</a></li>
                </ul>
            </li> -->
            
            <!-- <li><a class="nav-link" href="wallet_profile.php"><i data-feather="file"></i><span>Company Setting</span></a></li>
            <li><a class="nav-link" href="support.php"><i data-feather="file"></i><span>Plan Managment</span></a></li>  -->
            <li><a class="nav-link" href="../action/main_work?option=logout"><i data-feather="file"></i><span>Logout</span></a></li>
            <li class="language-switcher language-switcher-s1 toggle-wrap ">
                <!-- GTranslate: https://gtranslate.io/ -->

                                   <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

            </li>

        </ul>
    </aside>
</div>
