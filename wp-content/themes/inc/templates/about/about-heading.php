              <div class="heading">

				<!-- title -->
				<?php 
					global $singlepro_options;
					if(!empty($singlepro_options['about_us_title'])) { ?>
						<h2 class="wow fadeInLeftBig"><?php echo $singlepro_options['about_us_title']?></h2>
				<?php } ?> 				
				
				<!--description-->			
				<?php 
					//global $singlepro_options;
					if(!empty($singlepro_options['about_us_desc'])) { ?>
						<p><?php echo $singlepro_options['about_us_desc']?></p>
				<?php } ?> 					
				
              </div>