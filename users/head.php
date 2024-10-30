
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>User Dashboard</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- <link  rel="stylesheet" type="text/css" href="../bootstrap-3.4.1/css/bootstrap.min.css"/> -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/<?php  echo $allCompanyDetPic; ?>" />
    <script src="//code.jivosite.com/widget/<?php echo $LiveChatCode ?>" async></script> 


    <link rel="stylesheet" href="assetss/css/icofont.css">	
    <!-- font awesome icon -->
    <link rel="stylesheet" href="assetss/css/fontawesome-all.min.css">	
    <!-- animate CSS -->
    <link rel="stylesheet" href="assetss/css/animate.css">
    <link rel="stylesheet" href="assetss/css/meanmenu.min.css" media="all" />	
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="assetss/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assetss/owlcarousel/css/owl.theme.default.min.css">
    <!-- venobox -->
    <link rel="stylesheet" href="assetss/venobox/css/venobox.css" />	
    <!-- Style CSS --> 
    <link rel="stylesheet" href="assets/css/stylesss.css">
    <!-- Responsive  CSS -->

    <style>
     .tooltip{
         position: relative;
         display: inline-block;
     }    

     .tooltip .tooltiptext{
         visibility: hidden;
         width: 140px;
         background-color: #555;
            color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 5px;
        z-index: 1;
        bottom:150%;
        left: 50%;
        margin-left: -75px;
        opacity: 0;
        transition: opacity 0.3s;
     }

     .tooltip .tooltiptext::after{
         content: "";
         position: absolute;
         top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent
        transparent transparent;

     }

     .tooltip:hover .tooltiptext{
         visibility: visible;
         opacity: 1;
     }
    </style>
    
</head>