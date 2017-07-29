<?php
// Breadcrumbs
function custom_breadcrumbs() {

    // Settings
    $separator          = '&gt;';
    $breadcrums_id      = 'breadcrumbs';
    $breadcrums_class   = 'breadcrumbs';
    $home_title         = 'Anasayfa';

    // If you have any custom post types with custom taxonomies, put the taxonomy name below (e.g. product_cat)
    $custom_taxonomy    = 'product_cat';

    // Get the query & post information
    global $post,$wp_query;

    // Do not display on the homepage
    if ( !is_front_page() ) {

        // Build the breadcrums
        echo '<ul id="' . $breadcrums_id . '" class="' . $breadcrums_class . '">';

        // Home page
        echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-home"><a class="bread-link bread-home" itemprop="url" href="' . get_home_url() . '" title="' . $home_title . '"><span itemprop="title">' . $home_title . '</span></a></li>';
        echo '<li class="separator separator-home">' . $separator . ' </li>';

        if ( is_archive() && !is_tax() && !is_category() && !is_tag() ) {

            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-archive"><strong itemprop="title" class="bread-current bread-archive"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'">' . post_type_archive_title($prefix, false) . '</a></strong></li>';

        } else if ( is_archive() && is_tax() && !is_category() && !is_tag() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-cat item-custom-post-type-' . $post_type . '"><a itemprop="url" class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"><span itemprop="title">' . $post_type_object->labels->name . '</span></a></li>';
                echo '<li> ' . $separator . ' </li>';

            }

            $custom_tax_name = get_queried_object()->name;
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-archive"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-archive">' . $custom_tax_name . '</strong></a></li>';

        } else if ( is_single() ) {

            // If post is a custom post type
            $post_type = get_post_type();

            // If it is a custom post type display name and link
            if($post_type != 'post') {

                $post_type_object = get_post_type_object($post_type);
                $post_type_archive = get_post_type_archive_link($post_type);

                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-cat item-custom-post-type-' . $post_type . '"><a itemprop="url" class="bread-cat bread-custom-post-type-' . $post_type . '" href="' . $post_type_archive . '" title="' . $post_type_object->labels->name . '"><span itemprop="title">' . $post_type_object->labels->name . '</span></a></li>';
                echo '<li> ' . $separator . ' </li>';

            }

            // Get post category info
            $category = get_the_category();

            if(!empty($category)) {

                // Get last category post is in
                $last_category = end(array_values($category));

                // Get parent any categories and create array
                $get_cat_parents = rtrim(get_category_parents($last_category->term_id, false, ','), ',');
                $cat_parents = explode(',', $get_cat_parents);

                // Loop through parent categories and store in variable $cat_display
                $cat_display = '';
                foreach($cat_parents as $parents) {

                    $cat_display .= '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-cat"><a href="'.get_category_link( get_cat_ID( $parents ) ).'" itemprop="url"><span itemprop="title">'.$parents.'</span></a></li>';
                    $cat_display .= '<li> ' . $separator . ' </li>';
                }

            }

            // If it's a custom post type within a custom taxonomy
            $taxonomy_exists = taxonomy_exists($custom_taxonomy);
            if(empty($last_category) && !empty($custom_taxonomy) && $taxonomy_exists) {

                $taxonomy_terms = get_the_terms( $post->ID, $custom_taxonomy );
                $cat_id         = $taxonomy_terms[0]->term_id;
                $cat_nicename   = $taxonomy_terms[0]->slug;
                $cat_link       = get_term_link($taxonomy_terms[0]->term_id, $custom_taxonomy);
                $cat_name       = $taxonomy_terms[0]->name;

            }

            // Check if the post is in a category
            if(!empty($last_category)) {
                echo $cat_display;
                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . $post->ID . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></a></li>';

            // Else if post is in a custom taxonomy
            } else if(!empty($cat_id)) {

                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-cat item-cat-' . $cat_id . ' item-cat-' . $cat_nicename . '"><a itemprop="url" class="bread-cat bread-cat-' . $cat_id . ' bread-cat-' . $cat_nicename . '" href="' . $cat_link . '" title="' . $cat_name . '"><span itemprop="title">' . $cat_name . '</span></a></li>';
                echo '<li> ' . $separator . ' </li>';
                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . $post->ID . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></a></li>';

            } else {

                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . $post->ID . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-' . $post->ID . '" title="' . get_the_title() . '">' . get_the_title() . '</strong></a></li>';

            }

        } else if ( is_category() ) {

            // Category page
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-cat"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-cat">' . single_cat_title('', false) . '</strong></a></li>';

        } else if ( is_page() ) {

            // Standard page
            if( $post->post_parent ){

                // If child page, get parents
                $anc = get_post_ancestors( $post->ID );

                // Get parents in the right order
                $anc = array_reverse($anc);

                // Parent page loop
                if ( !isset( $parents ) ) $parents = null;
                foreach ( $anc as $ancestor ) {
                    $parents .= '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-parent item-parent-' . $ancestor . '"><a itemprop="url" class="bread-parent bread-parent-' . $ancestor . '" href="' . get_permalink($ancestor) . '" title="' . get_the_title($ancestor) . '"><span itemprop="title">' . get_the_title($ancestor) . '</span></a></li>';
                    $parents .= '<li class="separator separator-' . $ancestor . '"> ' . $separator . ' </li>';
                }

                // Display parent pages
                echo $parents;

                // Current page
                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . $post->ID . '"><strong itemprop="title" title="' . get_the_title() . '"> ' . get_the_title() . '</strong></li>';

            } else {

                // Just display current page if not parents
                echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . $post->ID . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-' . $post->ID . '"> ' . get_the_title() . '</strong></a></li>';

            }

        } else if ( is_tag() ) {

            // Tag page

            // Get tag information
            $term_id        = get_query_var('tag_id');
            $taxonomy       = 'post_tag';
            $args           = 'include=' . $term_id;
            $terms          = get_terms( $taxonomy, $args );
            $get_term_id    = $terms[0]->term_id;
            $get_term_slug  = $terms[0]->slug;
            $get_term_name  = $terms[0]->name;

            // Display the tag name
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-tag-' . $get_term_id . ' item-tag-' . $get_term_slug . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-tag-' . $get_term_id . ' bread-tag-' . $get_term_slug . '">' . $get_term_name . '</strong></a></li>';

        } elseif ( is_day() ) {

            // Day archive

            // Year link
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-year item-year-' . get_the_time('Y') . '"><a itemprop="url" class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="title">' . get_the_time('Y') . ' Arşiv</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month link
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-month item-month-' . get_the_time('m') . '"><a itemprop="url" class="bread-month bread-month-' . get_the_time('m') . '" href="' . get_month_link( get_the_time('Y'), get_the_time('m') ) . '" title="' . get_the_time('M') . '"><span itemprop="title">' . get_the_time('M') . ' Arşiv</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('m') . '"> ' . $separator . ' </li>';

            // Day display
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-' . get_the_time('j') . '"><strong itemprop="title" class="bread-current bread-' . get_the_time('j') . '"> ' . get_the_time('jS') . ' ' . get_the_time('M') . ' Arşiv</strong></li>';

        } else if ( is_month() ) {

            // Month Archive

            // Year link
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-year item-year-' . get_the_time('Y') . '"><a itemprop="url" class="bread-year bread-year-' . get_the_time('Y') . '" href="' . get_year_link( get_the_time('Y') ) . '" title="' . get_the_time('Y') . '"><span itemprop="title">' . get_the_time('Y') . ' Arşiv</span></a></li>';
            echo '<li class="separator separator-' . get_the_time('Y') . '"> ' . $separator . ' </li>';

            // Month display
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-month item-month-' . get_the_time('m') . '"><strong itemprop="title" class="bread-month bread-month-' . get_the_time('m') . '" title="' . get_the_time('M') . '">' . get_the_time('M') . ' Arşiv</strong></li>';

        } else if ( is_year() ) {

            // Display year archive
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-current-' . get_the_time('Y') . '"><a itemprop="url" href="'.$_SERVER['SERVER_NAME'].'"><strong itemprop="title" class="bread-current bread-current-' . get_the_time('Y') . '" title="' . get_the_time('Y') . '">' . get_the_time('Y') . ' Arşiv</strong></a></li>';

        } else if ( is_author() ) {

            // Auhor archive

            // Get the author information
            global $author;
            $userdata = get_userdata( $author );

            // Display author name
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-current-' . $userdata->user_nicename . '"><strong itemprop="title" class="bread-current bread-current-' . $userdata->user_nicename . '" title="' . $userdata->display_name . '">' . 'Author: ' . $userdata->display_name . '</strong></li>';

        } else if ( get_query_var('paged') ) {

            // Paginated archives
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-current-' . get_query_var('paged') . '"><strong itemprop="title" class="bread-current bread-current-' . get_query_var('paged') . '" title="Page ' . get_query_var('paged') . '">'.__('Page') . ' ' . get_query_var('paged') . '</strong></li>';

        } else if ( is_search() ) {

            // Search results page
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb" class="item-current item-current-' . get_search_query() . '"><strong itemprop="title" class="bread-current bread-current-' . get_search_query() . '" title="Search results for: ' . get_search_query() . '">Search results for: ' . get_search_query() . '</strong></li>';

        } elseif ( is_404() ) {

            // 404 page
            echo '<li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">' . 'Error 404' . '</li>';
        }

        echo '</ul>';

    }

}
?>
