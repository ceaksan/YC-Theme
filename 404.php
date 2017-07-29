<?php get_header(); ?>

				<main id="main" class="row" role="main">
					<section id="featured" class="section no-pad-bot">
			      <div id="content" class="container">
							<header class="page-header">
								<h1>404</h1>
								<h2 class="page-title"><?php esc_html_e( 'Aradığın yazıyı bulamadım!', 'yoldanciktim' ); ?></h2>
								<h3>İstersen aşağıdaki yazılarla kaldığımız yerden devam edebiliriz, ne dersin?</h3>
							</header><!-- .page-header -->

					        <div class="row">
					          <aside class="featured-post col s12 m8 l8 xl8">
					            <h4>+ Yeni Yazı<span class="line"></span></h4>
					            <?php
					              $query1 = new WP_Query( array( 'posts_per_page' => 1 ) );
					              if ( $query1->have_posts() ) {
					            	while ( $query1->have_posts() ) {
					            		$query1->the_post();
					            ?>

					            <div class="card">
					              <figure class="card-image waves-effect">
					                <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
					                  <?php if ( has_post_thumbnail() ) { the_post_thumbnail('featured-post'); } ?>
					                </a>
					                <figcaption class="card-title">
					                  <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
					                </figcaption>
					              </figure>
					            </div>
					            <?php
					          }
					          wp_reset_postdata();
					        }
					            ?>
					          </aside>
					          <div class="latest-post col s12 m4 l3 xl3">
					            <h4>+ Öne Çıkanlar<span class="line"></span></h4>
					            <div class="row">
					              <?php
					                $query2 = new WP_Query( array( 'posts_per_page' => 2, 'orderby' => 'rand' ) );
					                if ( $query2->have_posts() ) {
					              	while ( $query2->have_posts() ) {
					              		$query2->the_post();
					              ?>
					              <aside>
					                <div class="card">
					                  <figure class="card-image waves-effect">
					                    <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
					                      <?php if ( has_post_thumbnail() ) { the_post_thumbnail('popular-posts'); } ?>
					                    </a>
					                    <figcaption class="card-title">
					                      <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
					                    </figcaption>
					                  </figure>
					                </div>
					              </aside>
					              <?php
					            }
					            wp_reset_postdata();
					          }
					              ?>
					            </div>
					          </div>

					          <div class="collection social-media-links col s1 m1 l1 xl1 hide-on-med-and-down">
					            <h6>Sosyal Medya</h6>
					            <a href="http://facebook.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-facebook-square" aria-hidden="true"></i> <span>Facebook</span></a>
					            <a href="http://instagram.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-instagram" aria-hidden="true"></i> <span>Instagram</span></a>
					            <a href="http://youtube.com/yoldanciktimcom?utm_medium=homepage&amp;utm_campaign=badge&amp;utm_term=Youtube&amp;utm_content=text-link" class="collection-item transparent waves-effect"><i class="fa fa-youtube-play" aria-hidden="true"></i> <span>Youtube</span></a>
					            <a href="http://twitter.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-twitter" aria-hidden="true"></i> <span>Twitter</span></a>
					            <a href="http://pinterest.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-pinterest" aria-hidden="true"></i> <span>Pinterest</span></a>
					          </div>
					        </div>

									<h1>Belki de...</h1>
									<h2 class="page-title">Aradığın yazıyı daha yazmadım!</h2>

					    </section>

							<section id="connection" class="section">
							  <div class="container">
							    <div class="row">
							        <div class="col s12 m12 l8 xl7 center valign-wrapper">
							          <form class="center validate"  action="//dnomia.us9.list-manage.com/subscribe/post?" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
							                <div class="row">
							                  <div class="input-field col s10 m10 l10 xl10">
							                    <input id="email" name="EMAIL" type="email" class="validate">
							                    <label for="email">Yeni yazılar <strong>e-postana</strong> gelsin!</label>
							                  </div>
							                  <div id="mce-responses" class="clear">
							                    <div class="response" id="mce-error-response" style="display:none"></div>
							                    <div class="response" id="mce-success-response" style="display:none"></div>
							                  </div>
							                  <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6fe3055fbf3ce33a4e6b59424_d158dd5be7" tabindex="-1" value=""></div>
							                  <div class="col s2 m2 l2 xl2">
							                    <button class="btn btn-floating waves-effect black waves-light" type="submit" name="action"><i class="material-icons right">done</i></button>
							                  </div>
							                </div>
							              </form>
							        </div>
							        <div class="col s12 m12 l4 xl5 center">
							          <ul>
							            <li><a href="http://facebook.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-facebook-square" aria-hidden="true"></i> <br /><span>Facebook</span></a></li>
							            <li><a href="http://instagram.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-instagram" aria-hidden="true"></i> <br /><span>Instagram</span></a></li>
							            <li><a href="http://youtube.com/yoldanciktimcom?utm_medium=homepage&amp;utm_campaign=full-width-box&amp;utm_term=Youtube&amp;utm_content=text-link" class="collection-item transparent waves-effect"><i class="fa fa-youtube-play" aria-hidden="true"></i> <br /><span>Youtube</span></a></li>
							            <li><a href="http://twitter.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-twitter" aria-hidden="true"></i> <br /><span>Twitter</span></a></li>
							            <li><a href="http://pinterest.com/yoldanciktimcom" class="collection-item transparent waves-effect"><i class="fa fa-pinterest" aria-hidden="true"></i> <br /><span>Pinterest</span></a></li>
							          </ul>
							        </div>
							    </div>
							  </div>
							</section>

				 </main>

				<?php get_footer(); ?>
