      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="about_area">
              <!-- START ABOUT HEADING -->
				<?php get_template_part('inc/templates/about/about-heading');?>

              <!-- START ABOUT CONTENT -->
              <div class="about_content">
                <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about_featured">
                      <div class="panel-group" id="accordion">
					  
                        <!-- START SINGLE FEATURED ITEAM #1-->					
						<?php get_template_part('inc/templates/about/accordion1');?>
						
                        <!-- START SINGLE FEATURED ITEAM #2 -->
						<?php get_template_part('inc/templates/about/accordion2');?>
						
						
                        <!-- START SINGLE FEATURED ITEAM #3 -->
						<?php get_template_part('inc/templates/about/accordion3');?>
						
						
                        <!-- START SINGLE FEATURED ITEAM #4 -->
						<?php get_template_part('inc/templates/about/accordion4');?>
						

						
                      </div>
                    </div>
                  </div>
				  
                  <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="about_slider">
                      <!-- BEGAIN FEATURED SLIDER -->
						<?php get_template_part('inc/templates/about/about-slider');?>
                      <!-- END FEATURED SLIDER -->
                    </div>
                  </div>
				  
                </div>
              </div>
            </div>
          </div>
        </div>       
      </div>