
<?php $name = strlen($userDetails->username) ; 



?> 
<!-- style="margin-top:20px" -->
<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg-12
									collapse-btn "> <i data-feather="align-justify"></i></a></li><br>
                    <li style="color:darkblue; font-size:15px; padding-top:8px;margin-left:2px">
                     <p>Welcome:</p>
                    </li>
                    <li style="color:darkblue; front-size:15px; padding-top:8px;margin-left:2px"> 
                     <p><?php if ($name <= 8) {
                         # code...
                         echo $userDetails->username;
                     //break;
                     }else {
                         # code...
                         $name = substr($userDetails->username,0,8);
                         echo $name;
                     }
                     
                       ?></p>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"><img style="width:35px; border-radius: 50%;  margin-right:5px;" src="../images/<?php echo $userDetails->image_name; ?>" class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
                                                                                                        
                </li>
            </ul>
        </nav>