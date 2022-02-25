<?php
/*
Template name: Subscriber Carousel
*/ 
get_header();  ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
    jQuery(document).ready(() => {
    jQuery('.client_logo').slick({
        variableWidth: true,
        speed: 4000,
            infinite: true,
            autoplay: true, 
            autoplaySpeed: 0, 
            cssEase: 'linear', 
            slidesToShow: 1, 
            slidesToScroll: 1, 
            direction: 'ltr',
            pauseOnHover: true,
            pauseOnFocus: true,
            centerMode: false,
            arrows: true
    });
});
</script>
<style type="text/css">
.client_logo { margin-top: 20px;}
.slick-prev, .slick-next { top: 30%;}
section.directory-ads.slick-initialized.slick-slider { margin-top: 50px;}
.slick-slide {height: 120px !important;}
#listing {margin-top: 50px;}
</style>
<?php
function featured_logo() {
 $wp_user_query = new WP_User_Query(array (
    'role__in' => array( 'contributor', 'subscriber' ),
    'order' => 'ASC',
    'orderby' => 'display_name'
));
// Get the results
$subscribers = $wp_user_query->get_results();
// Looping managers
if (!empty($subscribers)) 
{
    echo '<div class="client_logo">';
    foreach ($subscribers as $subscriber)
    {
        // get all the user's data
        $user_info = get_userdata($subscriber->ID);
        $author_link = get_author_posts_url($subscriber->ID);
        //printing basic infos
        echo '<div class="brand-logo">';
        echo '<a href="' . esc_url( $author_link ) . '">'.get_avatar( get_userdata( $subscriber->ID ), 96 ).'</a>';
        echo '</div>';
    }
    echo '</div>';
} else  {
    echo 'No Subscriber found';
        }
}
?>
<?php get_footer(); ?>
