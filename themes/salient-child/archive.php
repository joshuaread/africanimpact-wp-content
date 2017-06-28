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
						global $searchandfilter;
						$sf_current_query = $searchandfilter->get(61)->current_query();
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
					?>
					</h4>
				</div>
			</div>
		</div>
		
		<div class="divider"></div>
		
		<div class="row">
			
			<div class="col span_9">
				
				<div id="search-results">
						
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						
								<article id="gerard" class="result">
									<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<p class="excerpt"><?php the_excerpt(); ?></p>
									<a class="read-more-button" href="<?php the_permalink(); ?>">more information</a>
									<div class="inner-wrap">
										<?php if(has_post_thumbnail( $post->ID )) {	echo '<a href="'.get_permalink().'">'.get_the_post_thumbnail($post->ID, 'search-results-thumb', array('title' => '')).'</a>'; } ?>
										<div class="priceBar"><span class="from">FROM</span> <?php $key="pricing"; echo get_post_meta($post->ID, $key, true); ?></div>
									</div>
								</article><!--/search-result-->	
							
						
						
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

