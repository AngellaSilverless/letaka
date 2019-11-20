<?php /**
 * Header
 * @package letaka
 */?>
<!doctype html>
<?php
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
?>

<html <?php language_attributes(); ?> class="<?php echo $dir ?>">  
<head>

<meta charset="UTF-8">
<meta name="description" content="Letaka Safaris is a citizen-owned safari company that has been operating in Botswana since October 2000. The founding directors, known locally as the Letaka Brothers, have over 40 years of combined guiding experience and started guiding safaris in Botswana in the mid-90’s. Mobile tented safaris in Botswana are, without a doubt, the best way to experience one of Africa’s last unspoilt wilderness areas, so pack your bags and book that flight... it's Safari Time!">
<meta name="keywords" content="Originally all our safaris were owner-guided but the company has now grown to employ some of Botswana’s most highly experienced mobile safari guides. The focus of our company has always been on the quality of our guides, hence our close association with African Guiding Academy (previously called Okavango Guiding School), a training facility which we created to elevate the standard of guiding in Botswana. Many of Botswana’s top guides pass through AGA’s doors at one time or another and we are proud to continue this initiative to create a guiding fraternity that will stand head and shoulders above other African destinations.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Letaka Safaris | <?php wp_title('|', true, 'right'); ?></title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><!--Bootstrap CDN-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><!-- Font Awesome CDN-->
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" type="image/x-icon" />

<link rel="preconnect" href="https://use.typekit.net/lvp3olv.css"  rel="stylesheet" >

<?php wp_head(); ?>
	
</head>

    <body <?php body_class(); ?>>
    
    	    <div id="page" class="site-wrapper">

            <header>
                
                <nav>
	                
	                <div class="container">
	                
	                <div class="row pt1 pb1">
	                
		                <div class="col-12 col-lg-2 menu-header">
			                
			                <div class="row">
				                
				                <div class="col-3 col-lg-0 row-toggle">
			                
					                <div class="menu-toggle">
				        
										<i class="fas fa-bars icon-open"></i>
										<i class="fas fa-times icon-close"></i>
									
									</div>
								
				                </div>
				                
				                <div class="col-9 col-lg-12 row-brand">
				                
					                <div class="brand">
				        
										<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>">
										
											<img src="<?php echo get_field("logo", "options")["url"]; ?>">
										
										</a>
									
									</div>
								
				                </div>
							
			                </div>
						
		                </div>
		                
		                <div class="col-12 col-lg-7 offset-1 menu-body">
	                
			                <div class="nav-menu">
			                
			                	<div class="top-menu">
				                	
				                	<div class="row">
					                	
					                	<div class="col-12 col-lg-5">
				                	
						                	<div class="search">
							                	
							                	<i class="fas fa-search"></i>
							                	
							                	<form action="/" method="get">
												    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
												    <button>Go</button>
												</form>
											
						                	</div>
						                
					                	</div>
					                	
					                	<div class="col-12 col-lg-7">
					                	
						                    <?php wp_nav_menu( array(
							                    'theme_location' => 'main-menu-t',
							                    'container_class' => 'mainMenu-top' ) );
					                    	?>
					                    
					                	</div>
					                	
				                	</div>
					                
			                	</div>
			                    
			                    <?php wp_nav_menu( array(
				                    'theme_location' => 'main-menu-b',
				                    'container_class' => 'mainMenu-bottom' ) );
			                    ?>
			                
			                </div>
		                
		                </div>
		                
		                <div class="col-12 col-lg-2 menu-body">
	                
			                <div class="actions-nav">
			                
			                    <a href="<?php the_field("online_payment", "options"); ?>" class="button button__transparent-light" target="_blank">Online Payment</a>
			                    <a class="button" href="<?php echo get_permalink( get_page_by_path( 'enquire-now' ) ); ?>">Enquire Now</a>
			                
			                </div>
			            
		                </div>
		                
	                </div>
	                
	                </div>

                </nav>
                
            </header>
            
            <?php if(is_front_page()): ?>
			    
				<?php get_template_part('template-parts/modal-home');?>
				
			<?php endif; ?>
		    
			<?php get_template_part('template-parts/modal-newsletter');?>

            <main><!--closes in footer.php-->