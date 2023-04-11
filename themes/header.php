<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Immedia
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-NSZ9JBG');</script>
<!-- End Google Tag Manager -->
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
	


<!-- TrustBox script -->
<script type="text/javascript" src="//widget.trustpilot.com/bootstrap/v5/tp.widget.bootstrap.min.js" async></script>
<!-- End TrustBox script -->
	
<meta name="apple-mobile-web-app-capable" content="yes">

<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-responsive.min.css"> //-->

<!-- mailchimp css -->

<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">

<!-- Optional theme -->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">



<!-- Additional Fonts -->

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet"> 

<!-- Latest compiled and minified JavaScript -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<!-- hamburger -->

<script src="<?php echo (get_theme_root_uri()); ?>/immedia-theme/bigSlide.js"></script>


<script>

$(document).ready(function() {

$('.menu-link').bigSlide();

});

</script>

<?php wp_head(); ?>

<script src="https://kit.fontawesome.com/fcc5867676.js" crossorigin="anonymous"></script>

<link rel="icon" href="/wp-content/uploads/2020/04/favicon-32-1.png" sizes="32x32">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-57.png" sizes="57x57">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-76.png" sizes="76x76">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-128.png" sizes="128x128">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-152.png" sizes="152x152">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-167.png" sizes="167x167">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-180.png" sizes="180x180">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-192.png" sizes="192x192">
<link rel="icon" href="/wp-content/uploads/2020/04/favicon-196.png" sizes="196x196">
	
<?php $customCSS = esc_attr( get_option( 'css_options' ) ); ?>
<?php $decodeCSS = html_entity_decode($customCSS); ?>
<?php if($customCSS != ''){ ?>
<style>
<?php print $decodeCSS; ?>
</style>
<?php } ?>

<?php $googleAnalytics = esc_attr( get_option( 'google_analytics' ) ); ?>
<?php $decodeAnalytics = html_entity_decode($googleAnalytics); ?>
<?php if($googleAnalytics != ''){ ?>
<script>
<?php print $decodeAnalytics; ?>
</script>
<?php } ?>

<?php $googleMaps = esc_attr( get_option( 'google_maps' ) ); ?>
<?php $decodeMaps = html_entity_decode($googleMaps); ?>
<?php if($googleMaps != ''){ ?>
<script async defer
      src="https://maps.googleapis.com/maps/api/js?key=<?php print $decodeMaps; ?>&callback=initMap">
    </script>
<?php } ?>
<meta name="ahrefs-site-verification" content="82dbd849962eee385e0f496e02cd69b48b06574357e1efd51622d96d71724dff">
<meta name="google-site-verification" content="6kqSBzPacsWvb32G8veH5xKQ71HET2xdqo8bTjd32rs" />


<!-- zias redirection uk //-->
<script>
(function(g,e,o,t,a,r,ge,tl,y,s){
g.getElementsByTagName(o)[0].insertAdjacentHTML('afterbegin','<style id="georedirect1625057830910style">body{opacity:0.0 !important;}</style>');
s=function(){g.getElementById('georedirect1625057830910style').innerHTML='body{opacity:1.0 !important;}';};
t=g.getElementsByTagName(o)[0];y=g.createElement(e);y.async=true;
y.src='https://g792337340.co/gr?id=-MdRzeTHPo3PKcNUNuDN&refurl='+g.referrer+'&bots=disallow&winurl='+encodeURIComponent(window.location);
t.parentNode.insertBefore(y,t);y.onerror=function(){s()};
georedirect1625057830910loaded=function(redirect){var to=0;if(redirect){to=5000};
setTimeout(function(){s();},to)};
})(document,'script','head');
</script>


<!-- end zias redirection //-->



</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NSZ9JBG"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<?PHP
/*display the admin bar to staff*/
show_admin_bar( true );
?>	
	
<div id="page" class="site">
	<header id="masthead" class="site-header sticky" role="banner">
		<?php $topBar = esc_attr( get_option( 'top_bar' ) );?>
		<?php if($topBar == 'Yes'){	?>
		<?php $containTopbar = esc_attr( get_option( 'contain_topbar' ) ); ?>
		<div class="top-bar-cont hidden-xs">
			<?php if($containTopbar == 'Yes' || $containTopbar == ''){?><div class="container"><?php } ?>	
			<div class="row">	
				<div class="col-md-12">
					<?php
					wp_nav_menu( array(
						'menu'              => '',
						'theme_location'    => 'top-bar-menu',
						'depth'             => 2,
						'container'         => '',
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => 'bs-example-navbar-collapse-1',
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'walker'            => new wp_bootstrap_navwalker())
					);
					?>
				</div>			
			</div>
			<?php if($containTopbar == 'Yes' || $containTopbar == ''){?></div><?php } ?>
		</div>
	<?php } ?>
	
		<div class="top-content">
		
			<?php
			$verticalNav = esc_attr( get_option( 'vertical_nav' ) );
			if($verticalNav == 'On'){ ?>
				<div id="body_overlay"></div>
			<?php } ?>
		
			<?php $containHeader = esc_attr( get_option( 'contain_header' ) ); ?>
			<?php if($containHeader == 'Yes' || $containHeader == ''){?><div class="container"><?php } ?>
			<div class="row">
			
		 		<div class="logo col-lg-2 col-md-2 col-sm-3 col-xs-12 head-left">
				<?php $logo = esc_attr( get_option( 'logo' ) ); ?>
				<?php $logoWidth = esc_attr( get_option( 'logo_width' ) ); ?>
				<?php $logoAltText = esc_attr( get_option( 'logo_alt_text' ) );?>
					<a href="/">
						<img src="<?php print $logo; ?>" <?php if($logoWidth != ''){ ?> style="width:100%; max-width:<?php print $logoWidth; ?>px;" <?php }?> <?php if($logoAltText != ''){ ?> alt="<?php print $logoAltText; ?>" <?php }?>/>
					</a>
					
				<?php $logoText = esc_attr( get_option( 'logo_text' ) ); ?>
				<?php if($logoText != ''){ ?>
					<div class="logo-text-band"><?php print $logoText; ?></div>
				<?php } ?>
				</div>
				
				<div class="col-lg-10 col-md-10  col-xs-12 col-sm-9 head-right">
					<?php dynamic_sidebar( 'header-content' ); ?>
					        <!-- Brand and toggle get grouped for better mobile display -->
<nav class="navbar navbar-default " role="navigation">
	
    <?php $containNavigation = esc_attr( get_option( 'contain_navigation' ) ); ?>
	<?php if($containNavigation == 'Yes' || $containNavigation == ''){?><div class="container"><?php } ?>
	<div class="row">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div><!--end navbar-header-->
        <div class="collapse navbar-collapse menu-primary" id="bs-example-navbar-collapse-1">
		
		<?php
		$verticalNav = esc_attr( get_option( 'vertical_nav' ) );
		if($verticalNav == 'On'){ ?>
			<div class="text-right visible-xs visible-sm">
				<div class="modal-close-cont vertical-navbar-close" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<div class="modal-close-img">Close</div>
				</div>
			</div>
		<?php } ?>
		
            <?php
            wp_nav_menu( array(
                'menu'              => '',
                'theme_location'    => 'primary',
                'depth'             => 2,
                'container'         => '',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
            ?>
        </div><!--end navbar-colapse-->
	</div>
    <?php if($containNavigation == 'Yes' || $containNavigation == ''){?></div><?php } ?><!--end container-->
</nav>
				</div>
				
			</div>
			<?php if($containHeader == 'Yes' || $containHeader == ''){?></div><?php } ?>
		</div>
		


	</header><!-- #masthead -->
	

	<div></div>
	
	<?php $containBody = esc_attr( get_option( 'contain_body' ) ); ?>
	<?php if($containBody == 'Yes' || $containBody == ''){?><div class="container"><?php } ?>
	<div id="content" class="site-content">