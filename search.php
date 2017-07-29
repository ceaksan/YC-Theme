<?php get_header(); ?>

				<main id="main" class="row" role="main">
					<section id="featured" class="section no-pad-bot">
			      <div id="content" class="container">

							                <header class="row card page-header">
																	<div class="col s12">
								                    <h2 class="page-title"><?php printf( __( '"%s" ile ilgili sonuçlar', 'yoldanciktim' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
																		<?php
																		global $wp_query;
																		if($wp_query->found_posts > 0):
																		?>
																		<?php	echo '<h3>Toplam '.$wp_query->found_posts.' ilgili içerik bulundu.</h3>'; ?>
																	</div>
															</header><!-- .page-header -->

																	<div class="row">
																		<aside class="featured-post col s12 m8 l8 xl8">
																			<h4>+ <?php echo get_search_query(); ?> İle İlgili Yazılmış Son Yazı<span class="line"></span></h4>
																			<?php
																				$query1 = new WP_Query( array( 'posts_per_page' => 1, 's' => $s ) );

																				if ( $query1->have_posts() ) {
																				while ( $query1->have_posts() ) {

                                          if (in_array($post_id, $do_not_duplicate)) { continue; }
                                          $do_not_duplicate[] = get_the_ID();

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
																			<h4>+ <?php echo get_search_query(); ?> Hakkında Öne Çıkanlar<span class="line"></span></h4>
																			<div class="row">
																				<?php
																					$query2 = new WP_Query( array( 'posts_per_page' => 2, 'orderby' => 'rand', 's' => $s ) );
																					if ( $query2->have_posts() ) {
																					while ( $query2->have_posts() ) {

                                            if (in_array($post_id, $do_not_duplicate)) { continue; }
                                            $do_not_duplicate[] = get_the_ID();

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
																</div>
															</section>

															<section id="essential-live" class="section no-pad-bot">
															<div class="container">
															<h3>+ "<?php echo get_search_query(); ?>" Hakkındaki Diğer Yazılar<span class="line"></span></h3>
															<div class="row">
															  <?php
															    $query6 = new WP_Query( array( 'posts_per_page' => $wp_query->found_posts, 'offset' => 1, 's' => $s ) );
															    if ( $query6->have_posts() ) {
															    while ( $query6->have_posts() ) {

                                    if (in_array($post_id, $do_not_duplicate)) { continue; }
                                    $do_not_duplicate[] = get_the_ID();

															      $query6->the_post();
															  ?>
															  <aside class="col s12 m6 l4 xl4">
															    <div class="card">
															      <figure class="card-image waves-effect">
															        <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
															          <?php if ( has_post_thumbnail() ) { the_post_thumbnail('category-posts'); } ?>
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

															</section>
<section>
	<div>
																	<?php else: ?>
																	<h3>İlgili içerik bulunamadı. Başka bir şekilde aramak ister misin?</h3>
																	<section class="section row">
															        <div class="col xl12 nav-wrapper">
															          <form role="search" method="get" class="search-form black text-white" action="<?php echo home_url( '/' ); ?>?utm_medium=<?php echo $_SERVER['REQUEST_URI']; ?>&amp;utm_campaign=search&amp;utm_term=navigation">
															            <div class="input-field">
															              <input id="search-404" type="search" class="search-field text-white" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" name="s" placeholder="<?php echo esc_attr_x( 'Ara …', 'placeholder' ) ?>" required>
															              <label class="label-icon" for="search"><i class="material-icons text-white">search</i></label>
															              <i class="material-icons close text-white">close</i>
															            </div>
															          </form>
															        </div>
															    </section>

																	<?php endif; ?>
						</div>

					</section>

				 </main>

				<?php get_footer(); ?>
