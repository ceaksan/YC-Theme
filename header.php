<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no" />
  <meta name="classification" content="Gelecek Tasarımı" />

  <link rel="profile" href="http://gmpg.org/xfn/11" />

  <base href="http://yoldanciktim.com" />

  <title>Yoldan Çıktım: Ekolojik ve Yavaş Yaşam Deneyimleri</title>

  <!-- Verifications -->

  <link rel="alternate" href="<?php echo site_url(); ?>/" hreflang="x-default" />
  <link rel="icon" href="http://yoldanciktim.com/favicon.ico" type="image/x-icon" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <link rel="search" type="application/opensearchdescription+xml" title="Yoldan Çıktım" href="<?php echo site_url(); ?>/odesc.xml" />
  <link rel="canonical" href="<?php echo get_permalink(); ?>" />

  <!-- Style  -->
  <link href="https://fonts.googleapis.com/css?family=Material+Icons|Roboto+Slab:400|Montserrat:300,400,500,700&amp;subset=latin-ext" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

  <link href="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="<?php echo get_bloginfo( 'template_directory' ); ?>/style.css" type="text/css" rel="stylesheet" media="screen" />
  <link href="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/css/general.css?v=4.2.1" type="text/css" rel="stylesheet" media="screen" />
  <?php
  if (is_home()) {
    echo "<link href=\"".get_bloginfo('template_directory' )."/assets/css/home.css?v=4.2.1\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />";
  } elseif(is_single() || is_page()) {
    echo "<link href=\"".get_bloginfo('template_directory' )."/assets/css/single.css?v=4.2.1\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />";
  } else {

  }
  ?>

  <?php if (!is_user_logged_in()) { ?>

  <?php } ?>

</head>
<body <?php body_class(); ?>>

  <?php if (!is_user_logged_in()) { ?>

  <?php } ?>

  <header class="navbar-fixed">
    <nav>
      <div class="nav-wrapper container">
        <?php if (!is_home()) { ?>
          <div id="logo-container" class="brand-logo center"><a href="<?php echo site_url(); ?>">Yoldan Çıktım</a></div>
        <?php } else { ?>
          <h1 id="logo-container" class="brand-logo center"><a href="<?php echo site_url(); ?>">Yoldan Çıktım</a></h1>
        <?php } ?>
        <ul class="left">
          <li><a data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a></li>
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/neden-yoldan-ciktim-2/">Neden?</a></li>
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/kategori/ekoloji/">Ekolojik Yaşam</a></li>
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/kategori/geziler/">Geziler</a></li>
        </ul>

        <ul class="right">
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/videolar/">Videolar</a></li>
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/dukkan/">Dükkan</a></li>
          <li class="hide-on-med-and-down"><a href="<?php echo site_url(); ?>/iletisim/">İletişim</a></li>
          <li><a class="search"><i class="material-icons">search</i></a></li>
        </ul>

        <ul id="nav-mobile" class="side-nav left">
          <li>Menü</li>
          <li><a href="<?php echo site_url(); ?>">Anasayfa</a></li>
          <li><a href="<?php echo site_url(); ?>/neden-yoldan-ciktim-2/">Neden Yoldan Çıktım?</a></li>
          <li><a href="<?php echo site_url(); ?>/iletisim/">İletişim</a></li>
          <li>Dükkan</li>
          <li><a href="<?php echo site_url(); ?>/dukkan/">Ekipmanlar</a></li>
          <li><a href="<?php echo site_url(); ?>/dukkan/">İkinci El</a></li>
          <li><a href="<?php echo site_url(); ?>/dukkan/">Takas</a></li>
          <li>Open-house Project</li>
          <li><a href="<?php echo site_url(); ?>/iletisim/">Atölyeler</a></li>
          <li><a href="<?php echo site_url(); ?>/iletisim/">Katılım Talebi</a></li>
          <li>Geziler</li>
          <li><a href="<?php echo site_url(); ?>/planlanan-etkinlikler/">Planlananlar</a></li>
          <li><a href="<?php echo site_url(); ?>/kategori/geziler/">Tamamlananlar</a></li>
        </ul>
      </div>
    </nav>

<?php
    /*
    <div class="fixed-action-btn button-collapse">
      <a data-activates="nav-mobile" class="btn-floating btn-large black button-collapse">
        <i class="material-icons">menu</i>
      </a>
    </div>

    <div class="parallax-container">
      <div class="parallax">
        <img src="<?php echo get_bloginfo( 'template_directory' ); ?>/assets/img/header/bg.jpg" />
      </div>
    </div>
    */
?>

  </header>

    <section id="search" class="section row">
      <nav class="container">
        <div class="nav-wrapper">
          <form role="search" method="get" class="search-form white text-black" action="<?php echo home_url( '/' ); ?>?utm_medium=<?php echo $_SERVER['REQUEST_URI']; ?>&amp;utm_campaign=search&amp;utm_term=navigation">
            <div class="input-field">
              <input id="search-toggle" type="search" class="search-field" value="<?php echo get_search_query() ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" name="s" placeholder="<?php echo esc_attr_x( 'Ara …', 'placeholder' ) ?>" required>
              <label class="label-icon" for="search"><i class="material-icons text-black">search</i></label>
              <i class="material-icons close text-black">close</i>
            </div>
          </form>
        </div>
      </nav>
    </section>
