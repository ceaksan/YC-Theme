<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<div class="parallax-container">
  <div class="parallax">
    <?php if ( has_post_thumbnail() ) { the_post_thumbnail('parallax-image'); } else { echo '<img src="'.get_bloginfo( 'template_directory' ).'/assets/img/header/bg.jpg" />'; } ?>
  </div>
</div>

		<main id="main" class="row" role="main">
      <div id="content" class="page container">
        <div class="row">
          <article class="col s12 m12 l8 xl8">

              <header class="card">
                <h2 class="title"><?php echo get_the_title(); ?></h2>
                <div>
                  <ul id="meta-data">
                    <?php echo reading_time(); ?>
                    <li>Yazar: <strong>CEA</strong></li>
                    <li>Yayın tarihi: <strong><?php the_date('d-m-Y'); ?></strong></li>
                  </ul>

                  <div class="social-share">
                    Bu yazıdan başkalarının da faydalanmasına yardımcı olmak ister misin?
                    <br /><br />
                    <a class="btn btn-small btn-floating waves-effect no-padding grey lighten-3" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink($recent["ID"]); ?>" target="_blank" title="Facebook"><i class="fa fa-facebook-square" aria-hidden="true"></i> <span class="hide-on-large-only">Facebook</span></a>
                    <a class="btn btn-small btn-floating waves-effect no-padding grey lighten-3" href="https://instagram.com/yoldanciktimcom" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i> <span class="hide-on-large-only">Instagram</span></a>
                    <a class="btn btn-small btn-floating waves-effect no-padding grey lighten-3" href="https://youtube.com/yoldanciktimcom?utm_medium=<?php echo $_SERVER['REQUEST_URI']; ?>&amp;utm_campaign=footer&amp;utm_term=Youtube&amp;utm_content=text-link" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i> <span class="hide-on-large-only">Youtube</span></a>
                    <a class="btn btn-small btn-floating waves-effect no-padding grey lighten-3" href="https://twitter.com/intent/tweet?text=<?php echo get_the_title(); ?> - <?php echo get_permalink($recent["ID"]); ?> @yoldanciktimcom" target="_blank" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i> <span class="hide-on-large-only">Twitter</span></a>
                  </div>
                </div>
              </header>

              <div class="entry"><?php the_content(); ?></div>

              <?php
                if ( comments_open() || get_comments_number() ) : comments_template(); endif;
              ?>
          </article>
          <div id="sidebar" class="col s12 m12 l4 xl4">
            <div class="container">
                <h4>+ İlgili Sayfalar<span class="line"></span></h4>
                <div class="collection">
									<?php
									$args = array(
									    'post_type'      	=> 'page',
									    'posts_per_page' 	=> 5,
									    'child_of'    		=> $post->post_parent,
											'exclude'					=> array(451, 453, 5606),
									    'orderby'        	=> 'asc',
											'post_status' 		=> 'publish'
									 );
									$parent = new WP_Query( $args );
									if ( $parent->have_posts() ) :
									  while ( $parent->have_posts() ) : $parent->the_post();
                  ?>
                  <aside class="collection-item transparent white-text lighten-5">
                    <summary>
                      <a class="title" href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                    </summary>
                  </aside>
                  <?php
                  	endwhile;
                  endif;
									wp_reset_query();
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

  </main>

<?php
    endwhile;
get_footer(); ?>
