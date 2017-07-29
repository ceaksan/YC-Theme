<?php get_header(); ?>
		<main id="main" class="row" role="main">
      <div id="content" class="container">
        <div class="row">
          <article class="col s12 m12 l8 xl8">
            <?php custom_breadcrumbs(); ?>
              <?php
              while ( have_posts() ) : the_post();
              ?>
              <header class="card scrollspy">
                <figure><?php if ( has_post_thumbnail() ) { the_post_thumbnail('featured-single'); } ?></figure>
                <h1 class="title"><?php echo get_the_title(); ?></h1>
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

              <div class="entry scrollspy">
                <?php the_content(); ?>
              </div>

<div id="imageLibraries" class="row center">
  <div class="container col s12 m4"><a class="col s12 waves-effect waves-light btn grey lighten-3 black-text" href="<?php if(get_post_meta($post->ID, 'takenbysomeone', true) == '') { echo 'https://www.pinterest.com/yoldanciktim/'; } else { echo get_post_meta($post->ID, 'takenbysomeone', true); } ?>"><i class="small material-icons left">pageview</i> Referans Görseller</a></div>
  <div class="container col s12 m4"><a class="col s12 waves-effect waves-light btn grey lighten-3 black-text" href="<?php if(get_post_meta($post->ID, 'takenbyme', true) == '') { echo 'https://www.instagram.com/yoldanciktimcom/'; } else { echo get_post_meta($post->ID, 'takenbyme', true); } ?>"><i class="small material-icons left">perm_media</i> Kaynak Medya</a></div>
  <div class="container col s12 m4"><a class="col s12 waves-effect waves-light btn grey lighten-3 black-text" href="https://www.shutterstock.com/g/StockNomia?rid=88155&utm_medium=email&utm_source=ctrbreferral-link"><i class="small material-icons left">view_module</i> Stock Görüntüler</a></div>
</div>
              <div class="innerBox form row">
                <form id="mc-embedded-subscribe-form" class="center validate col s12 scrollspy" action="//dnomia.us9.list-manage.com/subscribe/post?u=6fe3055fbf3ce33a4e6b59424&amp;id=d158dd5be7" method="post" name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                  <div class="row valign-wrapper">
                    <div class="input-field col s8 m8 l8 xl8">
                      <input id="email" class="validate" name="EMAIL" type="email" />
                      <label for="email">İçerikler <strong>e-postana</strong> gelsin!</label>
                    </div>
                    <div class="col s4 m4 l4 xl4">
                      <button class="btn waves-effect black waves-light" name="action" type="submit"><i class="material-icons right">done</i>Kayıt Ol!</button>
                    </div>
                  </div>
                </form>
              </div>

              <div class="postNav card">
                <ul class="collection">
                  <li class="collection-item col s12 m6">
                    <h4>+ Önceki Yazı<span class="line"></span></h4>
                    <?php previous_post_link(); ?>
                  </li>
                  <li class="collection-item col s12 m6">
                    <h4>+ Sonraki Yazı<span class="line"></span></h4>
                    <?php next_post_link(); ?>
                  </li>
                </ul>
              </div>

              <?php
                if ( comments_open() || get_comments_number() ) : comments_template(); endif;
                endwhile;
              ?>
          </article>
          <div id="sidebar" class="col">
            <div class="floatSidebar col s12 m12 l3 xl3">
                <h4>+ İlgili Yazılar<span class="line"></span></h4>
                <div class="collection">

                  <?php
                  $current_category = get_the_category();

                  $same_category = new WP_Query(array(
                      'cat'            => $category[0]->cat_ID,
                      'post__not_in'   => array($post->ID),
                      'orderby'        => 'rand',
                      'posts_per_page' => 3
                  ));
                  while ( $same_category->have_posts() ) : $same_category->the_post();
                  ?>
                  <aside class="collection-item transparent white-text lighten-5 avatar">
                    <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
                      <?php if ( has_post_thumbnail() ) { the_post_thumbnail('category-posts', ['class' => 'circle']); } ?>
                    </a>
                    <summary>
                      <a class="title" href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                      <br /><time><?php the_date('d-m-Y'); ?></time>
                    </summary>
                  </aside>
                  <?php
                  endwhile;
                  wp_reset_postdata();
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>

  </main>

<?php get_footer(); ?>
