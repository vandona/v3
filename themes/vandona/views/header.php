<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo (!empty($seo_title)) ? $seo_title .' - ' : ''; echo config_item('company_name'); ?></title>

<link rel="shortcut icon" href="<?php echo theme_img('favicon.png');?>" type="image/png" />
<?php if(isset($meta)):?>
<?php echo (strpos($meta, '<meta') !== false) ? $meta : '<meta name="description" content="'.$meta.'" />';?>
<?php else:?>
    <meta name="keywords" content="<?php echo config_item('default_meta_keywords');?>" />
    <meta name="description" content="<?php echo config_item('default_meta_description');?>" />
<?php endif;?>



	
	<!--[if lt IE 9]>
		<script src="js/ie8-responsive-file-warning.js"></script>
	<![endif]-->
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
$_css = new CSSCrunch();
//Theme css
$_css->addFile('bootstrap.min');
$_css->addFile('owl.carousel');
$_css->addFile('style');
$_css->addFile('responsive');
$_css->addFile('magnific-popup');
//Theme css
//$_css->addFile('gumbo/normalize');
//$_css->addFile('gumbo/base');
//$_css->addFile('gumbo/text');
//$_css->addFile('gumbo/banners');
//$_css->addFile('gumbo/buttons');
//$_css->addFile('gumbo/alerts');
//$_css->addFile('gumbo/forms');
//$_css->addFile('gumbo/grid');
//$_css->addFile('gumbo/tabs');
//$_css->addFile('gumbo/tables');
//$_css->addFile('gumbo/pagination');
//$_css->addFile('gumbo/nav');
//$_css->addFile('gumbo/colors');
$_css->addFile('gumbo/tray');
//$_css->addFile('styles');


$_js = new JSCrunch();
$_js->addFile('jquery-1.11.1.min');
$_js->addFile('jquery-migrate-1.2.1.min');
$_js->addFile('bootstrap.min');
$_js->addFile('bootstrap-hover-dropdown.min');
$_js->addFile('jquery.magnific-popup.min');
$_js->addFile('owl.carousel.min');
$_js->addFile('jquery.spin');
$_js->addFile('vandona');

//$_js->crunch(true);


if(true) //Dev Mode
{
    //in development mode keep all the css files separate
    $_css->crunch(true);
    $_js->crunch(true);
}
else
{
    //combine all css files in live mode
    $_css->crunch();
    $_js->crunch();
}


//with this I can put header data in the header instead of in the body.
if(isset($additional_header_info))
{
    echo $additional_header_info;
}
?>
<!-- Google Web Fonts -->
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300italic,400italic,700italic,400,300,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Oswald:400,700,300" rel="stylesheet" type="text/css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
	
	<!-- CSS Files -->
	<link href="<?php echo theme_url('assets');?>/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href='<?php echo theme_css('gumboIcons.css');?>' rel='stylesheet' type='text/css'>
</head>

<body>
<!-- Header Section Starts -->
	<header id="header-area">
	<!-- Header Top Starts -->
		<div class="header-top">
			<div class="container">				
				<div class="row">
				<!-- Header Links Starts -->
					<div class="col-sm-8 col-xs-12">
						<div class="header-links">
							<ul class="nav navbar-nav pull-left">
								
								<?php page_loop(0, false, false);?>
								<li>
									<a href="<?php echo  site_url('checkout');?>">
                                                                            <i class="fa fa-shopping-cart"></i>
										<?php echo lang('checkout');?>
										<span class="hidden-sm hidden-xs">
											<span id="itemCount"><?php echo GC::totalItems();?></span>
										</span>
									</a>
								</li>
																
                                                                
							</ul>
						</div>
					</div>
				<!-- Header Links Ends -->
				<!-- Currency & Languages Starts -->
					<div class="col-sm-4 col-xs-12">
						<div class="pull-right">
                                                    <div class="btn-group"> 
                                                    <?php if(CI::Login()->isLoggedIn(false, false)):?>
                                                       
                                                    <button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                                        <?php echo lang('account');?> <i class="fa fa-caret-down"></i>
                                                    </button>
                                                        <ul class="pull-right dropdown-menu">
                                                                <li>
                                                                    <a href="<?php echo  site_url('my-account');?>">
                                                                        <i class="fa fa-unlock hidden-lg hidden-md" title="<?php echo lang('my_account')?>"></i>
                                                                        <span class="hidden-sm hidden-xs"><?php echo lang('my_account')?></span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="<?php echo site_url('logout');?>">
                                                                        <i class="fa fa-crosshairs hidden-lg hidden-md" title="<?php echo lang('logout');?>"></i>
                                                                        <span class="hidden-sm hidden-xs"><?php echo lang('logout');?></span>
                                                                    </a>
                                                                </li>
                                                        </ul>
                                                    
                                                        <?php else: ?>
                                                                    <a class="btn btn-link dropdown-toggle" href="<?php echo site_url('register');?>">
                                                                        <i class="fa fa-unlock hidden-lg hidden-md" title="<?php echo lang('register');?>"></i>
                                                                        <span class="hidden-sm hidden-xs"><?php echo lang('register');?></span>
                                                                    </a>
                                                                    <a class="btn btn-link dropdown-toggle" href="<?php echo site_url('login');?>">
                                                                        <i class="fa fa-lock hidden-lg hidden-md" title="<?php echo lang('login');?>"></i>
                                                                        <span class="hidden-sm hidden-xs"><?php echo lang('login');?></span>
                                                                    </a>
                                                        <?php endif; ?>
                                                    </div>    
						<!-- Languages Starts -->
<!--							<div class="btn-group">
								<button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
									ENG
									<i class="fa fa-caret-down"></i>
								</button>
								<ul class="pull-right dropdown-menu">
									<li>
										<a tabindex="-1" href="#">English</a>
									</li>
									<li>
										<a tabindex="-1" href="#">French</a>
									</li>
								</ul>
							</div>-->
						<!-- Languages Ends -->
						<!-- Currency Starts -->
<!--							<div class="btn-group">
								<button class="btn btn-link dropdown-toggle" data-toggle="dropdown">
									$
									<i class="fa fa-caret-down"></i>
								</button>
								<ul class="pull-right dropdown-menu">
									<li><a tabindex="-1" href="#">Pound </a></li>
									<li><a tabindex="-1" href="#">US Dollar</a></li>
									<li><a tabindex="-1" href="#">Euro</a></li>
								</ul>
							</div>-->
						<!-- Currency Ends -->
						</div>
					</div>
				<!-- Currency & Languages Ends -->
				</div>
			</div>
		</div>
	<!-- Header Top Ends -->
	<!-- Starts -->
		<div class="container">
		<!-- Main Header Starts -->
			<div class="main-header">
				<div class="row">				
				<!-- Logo Starts -->
					<div class="col-md-3">
						<div id="logo">
							<a href="/"><img src="<?php echo theme_img('logo.png');?>" title="Vandona" alt="Vandona" class="img-responsive" /></a>
						</div>
					</div>
				<!-- Logo Starts -->
				<!-- Search Starts -->
					<div class="col-md-5">
						<div id="search">
                                                    <?php echo form_open('search', 'class="navbar-search pull-right"');?>
							<div class="input-group">
							  <input type="text" name="term" class="form-control input-lg" placeholder="<?php echo lang('search');?>"/>
							  <span class="input-group-btn">
								<button class="btn btn-lg" type="submit" value="<?php echo lang('search');?>"><i class="fa fa-search"></i></button>
							  </span>
							</div>
                                                    </form>
						</div>	
					</div>
				<!-- Search Ends -->
				<!-- Shopping Cart Starts -->
					<div class="col-md-4">
						<div id="cart" class="btn-group btn-block">
                                                    <a href="<?php echo  site_url('checkout');?>" type="button"  class="btn btn-block btn-lg">
								<i class="fa fa-shopping-cart"></i>
								<span class="hidden-md">Кошница:</span> 
								<span id="cart-total"><?php echo GC::totalItems();?> продукт(а)</span>
						    </a>
							
						</div>
					</div>
				<!-- Shopping Cart Ends -->
				</div>
			</div>
		<!-- Main Header Ends -->
		<!-- Main Menu Starts -->
			<nav id="main-menu" class="navbar" role="navigation">
			<!-- Nav Header Starts -->
				<div class="navbar-header">
					<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-cat-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<i class="fa fa-bars"></i>
					</button>
				</div>
			<!-- Nav Header Ends -->
			<!-- Navbar Cat collapse Starts -->
				<div class="collapse navbar-collapse navbar-cat-collapse">
					<ul class="nav navbar-nav">
					<?php category_loop(0, false, false); ?>
					</ul>
				</div>
			<!-- Navbar Cat collapse Ends -->
			</nav>
		<!-- Main Menu Ends -->
		</div>
	<!-- Ends -->
	</header>
<!-- Header Section Ends -->



    <?php if (CI::session()->flashdata('message')):?>
        <div class="alert blue">
            <?php echo CI::session()->flashdata('message'); ?>
        </div>
    <?php endif;?>




    
