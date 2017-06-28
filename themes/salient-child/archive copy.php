<?php get_header(); ?>

<script>
jQuery(document).ready(function($){
	
	var $searchContainer = $('#search-results');
	
	$(window).load(function(){
		
		$searchContainer.isotope({
		   itemSelector: '.result',
		   layoutMode: 'packery',
		   packery: { columnWidth: $('#search-results').width() / 3 }
		});
		
		$searchContainer.css('visibility','visible');
				
	});
	
	$(window).resize(function(){
	   $searchContainer.isotope({
	   	  layoutMode: 'packery',
	      packery: { columnWidth: $('#search-results').width() / 3}
	   });
	});

	
});
</script>

<div id="joshua" class="container-wrap">
	
	<div class="container main-content">
		
		<div class="row">
			<div class="col span_12">
				<div class="col span_12 section-title">
					<h4>You searched for:  <?php
	//Get a multiple fields values by passing an array of field names
	//replace `1526` with the ID of your search form
	global $searchandfilter;
	$sf_current_query = $searchandfilter->get(61)->current_query();
	/*
	 * EXAMPLE 3 - without labels for fields themselves (the `str` value has been changed to include only values)
	 */
	$args = array(
		"str" 					=> '%2$s', 
		"delim" 				=> array(", ", " - "), 
		"field_delim"				=> ', ', 
		"show_all_if_empty"			=> false 
	);
	
	echo $sf_current_query->get_fields_html(
		array("_sft_project_type", "_sft_impact_type", "_sft_destination"), 
		$args
	);
	/* will output:
	
	Community Volunteering, Orphan Care, South Africa
	
	*/
?></h4>
				</div>
			</div>
		</div>
		
		<div class="divider"></div>
		
		<div class="row">
			
			<div class="col span_9">
				
				<div id="search-results">
						
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						

							
							<?php if( get_post_type($post->ID) == 'post' ){ ?>
								<article id="john" class="result">
									<div class="inner-wrap">
										<span class="bottom-line"></span>
										<?php if(has_post_thumbnail( $post->ID )) {	
											echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'full', array('title' => '')).'</a>'; 
										} ?>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php echo __('Blog Post', NECTAR_THEME_NAME); ?></span></h2>
									</div>
								</article><!--/search-result-->	
							<?php }
							
							else if( get_post_type($post->ID) == 'page' ){ ?>
								<article id="bev" class="result">
									<div class="inner-wrap">
										<span class="bottom-line"></span>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php echo __('Page', NECTAR_THEME_NAME); ?></span></h2>	
										
										<?php if(has_excerpt()) the_excerpt(); ?>
									</div>
								</article><!--/search-result-->	
							<?php }
							
							else if( get_post_type($post->ID) == 'portfolio' ){ ?>
								<article id="greg" class="result">
									<div class="inner-wrap">
										<span class="bottom-line"></span>
										<?php if(has_post_thumbnail( $post->ID )) {	
											echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'full', array('title' => '')).'</a>'; 
										} ?>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php echo __('Portfolio Item', NECTAR_THEME_NAME); ?></span></h2>
									</div>
								</article><!--/search-result-->		
							<?php }
							
							else if( get_post_type($post->ID) == 'product' ){ ?>
								<article id="adii" class="result">
									<div class="inner-wrap">
										<span class="bottom-line"></span>
										<?php if(has_post_thumbnail( $post->ID )) {	
											echo '<a href="'.get_permalink().'">'. get_the_post_thumbnail($post->ID, 'full', array('title' => '')).'</a>'; 
										} ?>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php echo __('Product', NECTAR_THEME_NAME); ?></span></h2>	
									</div>
								</article><!--/search-result-->	
							<?php } else { ?>
								<article id="gerard" class="result">
									<div class="inner-wrap">
										<span class="bottom-line"></span>
										<?php if(has_post_thumbnail( $post->ID )) {	
											echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'search-results-thumb', array('title' => '')).'</a>'; 
										} ?>
										<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									</div>
								</article><!--/search-result-->	
							<?php } ?>
							
						
						
					<?php endwhile; 
					
					else: echo "<p>" . __('No results found', NECTAR_THEME_NAME) . "</p>"; endif;?>
				
						
				</div><!--/search-results-->
				
				
				<?php if( get_next_posts_link() || get_previous_posts_link() ) { ?>
					<div id="pagination">
						<div class="prev"><?php previous_posts_link('&laquo; Previous Entries') ?></div>
						<div class="next"><?php next_posts_link('Next Entries &raquo;','') ?></div>
					</div>	
				<?php }?>
				
			</div><!--/span_9-->
			
			<div id="sidebar" class="col span_3 col_last">
				<?php echo do_shortcode('[searchandfilter id="61"]'); ?>
			</div><!--/span_3-->
		
		</div><!--/row-->
		
	</div><!--/container-->

</div><!--/container-wrap-->

<?php get_footer(); ?>

