<?php get_header(); ?>

  <main>
    <section id="featured" class="section no-pad-bot">
      <div class="container">
        <div class="row">
          <aside class="featured-post col s12 m8 l8 xl8">
            <h4>+ Yeni Yazı<span class="line"></span></h4>
            <?php
              $query1 = new WP_Query( array( 'posts_per_page' => 1, 'cat' => 126 ) );
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
            <h4>+ Öne Çıkanlar<span class="line"></span></h4>
            <div class="row">
              <?php
                $query2 = new WP_Query( array( 'posts_per_page' => 2, 'orderby' => 'rand' ) );
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
    </section>

        <section id="essential-food" class="section no-pad-bot">
          <div class="container">
            <h3>+ Ekolojik Beslenme<span class="line"></span></h3>
            <div class="row">
              <aside class="col s12 m8 l6 xl5">
                <div class="card">
                  <div class="video-container">
                    <iframe width="853" height="480" src="https://www.youtube.com/embed/<?php echo myLastYoutubeVideo(); ?>?rel=0&amp;modestbranding=0&amp;showinfo=0&amp;controls=0&amp;wmode=opaque" frameborder="0" allowfullscreen></iframe>
                  </div>
                </div>
              </aside>
              <div class="col s12 m4 l6 xl3">
                <?php
                  $query4 = new WP_Query( array( 'posts_per_page' => 2, 'cat' => 90 ) );
                  if ( $query4->have_posts() ) {
                  while ( $query4->have_posts() ) {

                    if (in_array($post_id, $do_not_duplicate)) { continue; }
                    $do_not_duplicate[] = get_the_ID();

                    $query4->the_post();
                ?>
                <aside class="card">
                    <figure class="card-image waves-effect">
                      <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('content-thumb'); } ?>
                      </a>
                      <figcaption class="card-title">
                        <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                      </figcaption>
                    </figure>
                </aside>
                <?php
              }
              wp_reset_postdata();
            }
                ?>
              </div>
              <div class="col s12 m12 l12 xl3">
                <aside class="row">
                  <div class="ads card">
                    <div class="card-action">
                      <a href="<?php echo site_url(); ?>/destekleyen-markalar/">Reklam &amp; Sponsorluk Detayları</a>
                    </div>
                    <div class="card-content left-align">
                      <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                      <!-- Tek yayın - 2 (mobil, yoldanciktim.com) -->
                      <ins class="adsbygoogle"
                           style="display:block; max-height: 335px;"
                           data-ad-client="ca-pub-9190644680357875"
                           data-ad-slot="2741515639"
                           data-ad-format="auto"></ins>
                      <script>
                      (adsbygoogle = window.adsbygoogle || []).push({});
                      </script>
                  </div>
                </aside>
              </div>
              <div class="collection col s12 m12 l12 xl1">
                <h6 class="collection-item">İlgili Kategoriler</h6>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/kendin-yap/yiyecek-icecek/yiyecek/" title="Yiyecek"><span>Yiyecek</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/kendin-yap/yiyecek-icecek/icecek/" title="İçecek"><span>İçecek</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/kendin-yap/bitki-yetistiriciligi/" title="Bitkiler"><span>Bitkiler</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/kendin-yap/yiyecek-icecek/fermantasyon/" title="Fermantasyon"><span>Fermantasyon</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/kendin-yap/kompost/" title="Kompost"><span>Kompost</span></a>
              </div>
            </div>
        </section>

        <section id="essential-cover" class="section no-pad-bot">
          <div class="container">
            <h3>+ Yavaş Yaşam<span class="line"></span></h3>
            <div class="row">
              <aside class="col s12 m12 l5 xl5">
                <div class="card">
                  <?php
                    $query5 = new WP_Query( array( 'posts_per_page' => 1, 'cat' => 1142 ) );
                    if ( $query5->have_posts() ) {
                    while ( $query5->have_posts() ) {

                      if (in_array($post_id, $do_not_duplicate)) { continue; }
                      $do_not_duplicate[] = get_the_ID();

                      $query5->the_post();
                  ?>
                  <figure class="card-image waves-effect">
                    <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
                      <?php if ( has_post_thumbnail() ) { the_post_thumbnail('card-featured'); } ?>
                    </a>
                    <figcaption class="card-title">
                      <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                    </figcaption>
                  </figure>
                  <?php
                }
                wp_reset_postdata();
              }
                  ?>
                </div>
              </aside>
              <div class="col s12 m6 l4 xl3 thumbs">
                <?php
                  $query5 = new WP_Query( array( 'posts_per_page' => 2, 'cat' => 1142, 'offset' => 1 ) );
                  if ( $query5->have_posts() ) {
                  while ( $query5->have_posts() ) {

                    if (in_array($post_id, $do_not_duplicate)) { continue; }
                    $do_not_duplicate[] = get_the_ID();

                    $query5->the_post();
                ?>
                <aside class="card">
                    <figure class="card-image waves-effect">
                      <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('content-thumb'); } ?>
                      </a>
                      <figcaption class="card-title">
                        <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                      </figcaption>
                    </figure>
                </aside>
                <?php
              }
              wp_reset_postdata();
            }
                ?>
              </div>
              <div class="col s12 m6 l3 xl3 thumbs-2">
                <aside class="row">
                  <div class="card">
                    <?php
                      $query5 = new WP_Query( array( 'posts_per_page' => 1, 'cat' => 1142, 'offset' => 3 ) );
                      if ( $query5->have_posts() ) {
                      while ( $query5->have_posts() ) {

                        if (in_array($post_id, $do_not_duplicate)) { continue; }
                        $do_not_duplicate[] = get_the_ID();

                        $query5->the_post();
                    ?>
                    <figure class="card-image waves-effect">
                      <a href="<?php echo get_permalink($recent["ID"]); ?>" title="<?php echo get_the_title(); ?>">
                        <?php if ( has_post_thumbnail() ) { the_post_thumbnail('card-featured'); } ?>
                      </a>
                      <figcaption class="card-title">
                        <a href="<?php echo get_permalink($recent["ID"]); ?>" rel="bookmark" title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></a>
                      </figcaption>
                    </figure>
                    <?php
                  }
                  wp_reset_postdata();
                }
                    ?>
                  </div>
                </aside>
              </div>
              <div class="collection col s12 m12 l12 xl1">
                <h6 class="collection-item">İlgili Kategoriler</h6>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/geziler/sehir-gezileri/"><span>Şehir Gezileri</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/geziler/organik-yolculuk/"><span>Organik Yolculuk</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/geziler/yuruyus-yollari/"><span>Yürüyüş Yolları</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/kategori/geziler/gezi-anilari/"><span>Gezi Anıları</span></a>
                <a class="col xl12 collection-item waves-effect" href="<?php echo site_url(); ?>/planlanan-etkinlikler/"><span>Planlananlar</span></a>
              </div>
            </div>
        </section>

<section id="connection" class="section">
  <div class="container">
    <div class="row">
        <div class="col s12 m12 l6 xl6 center valign-wrapper">
          <form class="center validate" action="//dnomia.us9.list-manage.com/subscribe/post?u=6fe3055fbf3ce33a4e6b59424&amp;id=d158dd5be7" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                <div class="row">
                  <div class="input-field col s10 m10 l10 xl10">
                    <input id="email" name="EMAIL" type="email" class="validate">
                    <label for="email">İçerikler <strong>e-postana</strong> gelsin!</label>
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
        <div class="col s12 m12 l6 xl6 center">
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

<section id="essential-live" class="section no-pad-bot">
<div class="container">
<h3>+ Ekoloji 101<span class="line"></span></h3>
<div class="row">
  <?php
    $query6 = new WP_Query( array( 'posts_per_page' => 6, 'cat' => 126, 'offset' => 1 ) );
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

<?php /*
    <section id="map">
      <div class="container">
        <h3>+ SEYİR NOTLARI<span class="line"></span></h3>
        <div class="section">
          <div class="row">
            <div class="col m4 center">
              <i class="large material-icons">location_on</i>
              <br /><strong>11 Rota</strong>
            </div>
            <div class="col m4 center">
              <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/ui/map-title.jpg" width="50%" />
              <br />Şimdiye Kadar Neler Oldu?
            </div>
            <div class="col m4 center">
              <i class="large material-icons">navigation</i>
              <br /><strong>1345 KM</strong>
            </div>
          </div>
          <div class="row">
            <div class="col m2">
              <ul class="collection with-header">
                <li class="collection-header"><h4>Sıradaki Rotalar</h4></li>
                <li class="collection-item">İki Deniz Arası</li>
                <li class="collection-item">Likya Yolu</li>
                <li class="collection-item">İstiklal Yolu</li>
                <li class="collection-item">Mavi-Yeşil Yol</li>
              </ul>
              <ul class="collection with-header">
                <li class="collection-header"><h4>Sıradaki Çiftlikler</h4></li>
                <li class="collection-item">İki Deniz Arası</li>
                <li class="collection-item">Likya Yolu</li>
                <li class="collection-item">İstiklal Yolu</li>
                <li class="collection-item">Mavi-Yeşil Yol</li>
              </ul>
            </div>
            <div class="col m10">
              <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/ui/map.jpg" width="100%" />
            </div>
          </div>

        </div>
      </div>
    </section>
  */ ?>
  </main>

<?php get_footer(); ?>
