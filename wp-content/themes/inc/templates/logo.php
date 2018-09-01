		   <?php global $singlepro_options;if(!empty($singlepro_options['logo_uploader']['url'])) { ?>
		   
			<a class="navbar-brand" href="<?php bloginfo('url');?>"><img src="<?php echo $singlepro_options['logo_uploader']['url'];?>" alt="<?php bloginfo('name');?>"></a>				
			
			<?php } else { ?>
					<a class="navbar-brand" href="<?php bloginfo('url');?>">Single<span>Pro</span></a>
			<?php } ?>	