<?php 

// extract
extract($args);


// page
$page = acf_get_options_page( $slug );
			
?>
<div class="wrap acf-settings-wrap">
	
	<h2><?php echo $page['page_title']; ?></h2>
	
	<form id="post" method="post" name="post">
		
		<?php 
		
		// render post data
		acf_form_data(array( 
			'post_id'	=> 'options', 
			'nonce'		=> 'options',
		));
		
		?>
		
		<div id="poststuff">
			
			<div id="post-body" class="metabox-holder columns-2">
			
				<!-- Main -->
				<div id="post-body-content">
					
					<div id="normal-sortables" class="meta-box-sortables ui-sortable">
						
						<?php do_meta_boxes('acf_options_page', 'normal', null); ?>
					
					</div>
				
				</div>
				
				<!-- Sidebar -->
				<div id="postbox-container-1" class="postbox-container">
					
					<div id="side-sortables" class="meta-box-sortables ui-sortable">
					
						<!-- Update -->
						<div id="submitdiv" class="postbox">
							
							<h3 class="hndle" style="border-bottom:none;"><span><?php _e("Publish",'acf'); ?></span></h3>
							
							<div id="major-publishing-actions">

								<div id="publishing-action">
									<span class="spinner"></span>
									<input type="submit" accesskey="p" value="<?php _e("Save Options",'acf'); ?>" class="button button-primary button-large" id="publish" name="publish">
								</div>
								
								<div class="clear"></div>
							
							</div>

						</div>
						
						<?php do_meta_boxes('acf_options_page', 'side', null); ?>
						
					</div>
					
				</div>
			
			</div>
			
			<br class="clear">
		
		</div>
		
	</form>
	
</div>
<script type="text/javascript">
(function($){
	
	$(document).on('click', '.postbox .handlediv', function(){
				
		var postbox = $(this).closest('.postbox');
		
		if( postbox.hasClass('closed') )
		{
			postbox.removeClass('closed');
		}
		else
		{
			postbox.addClass('closed');
		}
		
	});
	
	$(document).on('submit', '#post', function(){
		
		$('#publishing-action .spinner').css('display', 'inline-block');
		$('#publishing-action #publish').addClass('button-primary-disabled');
		
	});
	
})(jQuery);
</script>