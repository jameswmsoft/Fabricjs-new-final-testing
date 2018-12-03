<!DOCTYPE html>
<html>
  <head>
    <title>EDDM Map Tool</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <!-- <meta name="csrf_token" content="{{ csrf_token() }}"> -->
    <link rel="stylesheet" href="public/css/combine.css" />
    <link rel="stylesheet" href="public/css/style.css" />
    <link href="public/emap-2.3.1.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/icons/favicon.ico">
    <link rel="apple-touch-icon" href="images/icons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/icons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/icons/apple-icon-114x114.png">
     <script src="../../use.typekit.net/dgo6ldy.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <script src="js/modernizr.custom.js"></script>
    <!-- <script type="text/javascript" src="js/jquery.js"> </script> -->

    <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.5/js/dojo/dijit/themes/claro/claro.css">
    <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.6/js/dojo/dojox/grid/resources/Grid.css">
    <link rel="stylesheet" type="text/css" href="http://serverapi.arcgisonline.com/jsapi/arcgis/2.6/js/dojo/dojox/grid/resources/claroGrid.css">
    <style>
    
    table{
        text-align:center!important;
    }
    .eddm-sidebar-totals{
        /* position:absolute!important; */
        margin-top:50px!important;

    }
    .eddm-sidebar{
        
        background-color:#e0395d!important;
    }
    .eddm-well th{ text-align:center!important;
        color:white!important;
    }
    .aaa{
        font-size:16px;
        color:white!important;
    }
 
    }
    tr{
        padding-left:18px;
    }
    .eddm-well td{
        text-align:center!important;
        font-size:12px!important;
        color:white!important;

    }

    
    </style>
  </head>
  <body id="top" data-spy="scroll" data-target=".main-menu" data-offset="100"  class="claro">
  <header id="home" class="header1 right" data-spy="affix" data-offset-top="60" >
	<a id="nav-expander" class="nav-expander fixed">
    	<span class="line1"></span>
    	<span class="line2"></span>
    	<span class="line3"></span>
  	</a>
   
  	<!-- START NAVIGATION -->   
  	<!--<nav id="menu" class="nav">
		<div class="container">
            <div class="col-md-4 col-sm-5 col-xs-12 logo">
                <a title="company Logo" href="index.html"><img class="img-responsive" src="images/company.png" alt="Company Logo" /></a>
                <h6>Start Up Made Easy</h6>
            </div>
            <div class="col-md-8 col-sm-7 col-xs-12 BGprime headRight">
                <ul class="main-menu nav" role="tablist">
                  <!--Include your navigation here-->
                  <!--<li class="active"><a href="#top" title="Home">Home</a></li>
                  <li><a href="#services" title="Services">Services</a></li>
                  <li><a href="#about" title="About">About</a></li>
                  <li><a href="#clients" title="Clients">Clients</a></li>
       
                </ul>
            </div> <div class="clear"></div>
        </div><!-- end container -->
  	<!--</nav>
</header>
<!-- END NAVIGATION -->
      
    </div>
</section>
<section>
    <div class='eddm-app' id='app'></div>
  <script type="text/javascript" src="public/emap-2.3.1.js"></script>
</section>

<script src="js/scripts.min.js"></script>
<script src="js/master.js"></script>
  </body  class="claro">
</html>
