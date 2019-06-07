<?php
/**
 * Header
 *
 * @package letaka
 */

?>
<!doctype html>
<?php
	$url = explode('/',$_SERVER['REQUEST_URI']);
	$dir = $url[1] ? $url[1] : 'home';
?>

<html <?php language_attributes(); ?> class="<?php echo $dir ?>">  
<head>

<meta charset="UTF-8">
<meta name="description" content=" ">
<meta name="keywords" content=" ">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

<title>Letaka Safaris</title>

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
	                
		                <div class="col-3">
			                
			                <div class="brand">
		        
								<a href="<?php echo home_url(); ?>" alt="<?php wp_title(''); ?>" title="<?php wp_title(''); ?>">
								
									<img src="<?php echo get_field("logo", "options")["url"]; ?>">
								
								</a>
							
							</div>
						
		                </div>
		                
		                <div class="col-7">
	                
			                <div class="nav-menu">
			                
			                	<div class="top-menu">
				                	
				                	<div class="search">
					                	
					                	<i class="fas fa-search"></i>
					                	
					                	<form action="/" method="get">
										    <input type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
										    <button>Go</button>
										</form>
									
				                	</div>
				                	
				                    <?php wp_nav_menu( array(
					                    'theme_location' => 'main-menu-t',
					                    'container_class' => 'mainMenu-top' ) );
			                    	?>
			                	</div>
			                    
			                    <?php wp_nav_menu( array(
				                    'theme_location' => 'main-menu-b',
				                    'container_class' => 'mainMenu-bottom' ) );
			                    ?>
			                
			                </div>
		                
		                </div>
		                
		                <div class="col-2">
	                
			                <div class="actions-nav">
			                
			                    <a class="button button__transparent-light">Online Payment</a>
			                    <a class="button" href="<?php echo get_permalink( get_page_by_path( 'enquire-now' ) ); ?>">Enquire Now</a>
			                
			                </div>
			            
		                </div>
		                
	                </div>
	                
	                </div>

                </nav>
                
            </header>

            <main><!--closes in footer.php-->