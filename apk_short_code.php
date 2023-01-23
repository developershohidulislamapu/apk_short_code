
// category by apu 

function cat_shortcode_function(){
 
?>
<style>
.cat-area ul li {
    padding: 8px 4px;
    list-style: none;
    margin-left: 10px;
}
.cat-area ul::before {
    content: "";
    width: 0;
    height: 100%;
    position: absolute;
    display: block;
    background-color: #f7f8f9;
    transition: 0.3s;
}

.cat-area {
    display: flex;
    flex-wrap: wrap;
    overflow: hidden;
    
}
.cat-area ul li {
    margin: 0px 10px 0px 0px;
    list-style: none;
    width: 100%;
}
.cat-area ul li a img{
    margin: 0px 6px 0px 0px;
    
}

.cat-area  ul {
    display: flex;
    width: 50%;
    transition: 1s;
    position: relative;
    
}
.cat-area ul:hover::before{
    width: 100%;
}
.cat-area ul li a {
    text-decoration: none;
    color: #333;
}
.cat-area ul li a {

font-size: 14px;
}
.widget-area .widget {
    padding: 30px 15px;
}
.cat-area ul li a {
    font-size: 14px;
    display: flex;
    align-items: center;
}	
	.sidebar .widget:first-child, .sidebar .widget:first-child .widget-title {
   background-color: #fff; 
    color: #333;
}
	.cat-area ul li a img {

    border-radius: 50px;
}

h5.title-cat a {
    display: flex;
    align-items: center;
	position: relative;
}
i.fa-solid.fa-angle-right {
    float: right;
    position: absolute;
    right: 0;
}
h5.title-cat a img {
    width: 23px;
    margin-right: 10px;
}
h5.title-cat >a:hover {
    color: #1abc9c!important;
}
h5.title-cat {
    border: 1px solid #1f242412;
    padding: 10px;
}
h5.title-cat:hover{
	border: 1px solid #1abc9c;
}
.icon-area {
    position: absolute;
    right: 0;
}
.post-top-area img {
    max-width: 60px;
  
}
a.main-post-box {
    display: flex;
    align-items: center;
    justify-content: start;
    position: relative;
    color: #858585;
    padding: 10px 0px;
    border-bottom: 1px solid #1f242412;
    border-radius: 10px;
}
.title-area {
    margin-left: 15px;
    font-size: 14px;
}
.post-top-area img {
    max-width: 50px;
    height: 36px;
}
a.main-post-box:hover {
    color: #1abc9c;
    background-color: #eff0f03b;
}
h5.title-apps {
    font-weight: 600;
    color: #333;
}
</style>
<h5 class="title-cat"><a style="color: #333;" href="<?php echo site_url('/apps/'); ?>"><img src="https://apkorgan.com/wp-content/uploads/2023/01/apps.png">APPS <i class="fa-solid fa-angle-right"></i></a></h5>
	<div class="cat-area"><?php

	$terms = get_terms(
		array(
			'taxonomy'   => 'category',
			'parent'   =>  3,
		)

	);

	foreach ($terms as $term):
		$term_image = get_field( 'cat_images', 'category_' . $term->term_id ); 

		?>

			<ul>
				
				<li>
					<a href="<?php echo get_term_link($term->slug, 'category') ?>">
							<?php if ( $term_image ) : ?>
										
                                    <img src="<?php echo $term_image['url']; ?>" alt="<?php echo $term->name; ?>">

                             <?php endif; ?>
						
						<?php echo wp_trim_words( $term->name ,1, '...' );?>
					</a>
				</li>
			</ul>
			
		
		<?php
		

	endforeach;

	?></div><?php
	
}

add_shortcode( "CATEGORY_SHORTCODE", "cat_shortcode_function" );

function cat_shortcode_tow_function(){
 
	?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
	<h5 class="title-cat"><a style="color: #333;" href="<?php echo site_url('/games/'); ?>"><img src="https://apkorgan.com/wp-content/uploads/2023/01/game.png">GAMES <i class="fa-solid fa-angle-right"></i></a></h5>

	
		<div class="cat-area"><?php
	
		$terms = get_terms(
			array(
				'taxonomy'   => 'category',
				'parent'   =>  4,
			)
	
		);
	
		foreach ($terms as $term):
			$term_image = get_field( 'cat_images', 'category_' . $term->term_id ); 
	
			?>
	
				<ul>
					
					<li>
						<a href="<?php echo get_term_link($term->slug, 'category') ?>">
										<?php if ( $term_image ) : ?>
											
										<img src="<?php echo $term_image['url']; ?>" alt="<?php echo $term->name; ?>">
	
										<?php endif; ?>
							
							<?php echo wp_trim_words( $term->name ,1, '...' );?>
						</a>
					</li>
				</ul>
				
			
			<?php
			
	
		endforeach;
	
		?></div><?php
		
	}
	
add_shortcode( "CATEGORY_SHORTCODE_TOW", "cat_shortcode_tow_function" );

function cat_shortcode_post_function(){
 
	?>
	<h5 class="title-apps">Download Popular APPS :</a></h5>
	

			<?php
			global $post;
			$args = array( 'numberposts' => 10, 'offset'=> -1);
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :  setup_postdata($post); ?>


			<a class="main-post-box" href="<?php the_permalink(); ?>">
				<div class="post-top-area">
						<?php the_post_thumbnail(); ?>
				</div>
				<div class="title-area">
					<?php echo wp_trim_words(get_the_title() ,4, '...' );?>
				</div>
				<div class="icon-area">
				<i class="fa-solid fa-download"></i><span style=" display:none; padding-left:5px; font-size: 14px;"><?php setPostViews(get_the_ID()); echo getPostViews(get_the_ID());; ?></span>
				</div>
			</a>
			<?php endforeach; ?>

			
	<?php
		
	}
	
add_shortcode( "CATEGORY_SHORTCODE_POST", "cat_shortcode_post_function" );

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }
    else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
