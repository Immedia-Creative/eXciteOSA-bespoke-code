<?php
/**
 * Template Name: Page Find a Physician 
 *
 */



        get_header();
 
?>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		the_content();
		//
	} // end while
} // end if
?>


<?php

$args = array(
    'posts_per_page' => -1,
    'post_type' => 'physician',
    'post_status' => 'publish',

);
$query = new WP_Query($args);


?>


<div class="wrapper">
   
   <ul class="breadcrumbs">
        <li class="breadcrumbs-item">
            <a href="#" class="breadcrumbs-item__link">Home </a>
        </li>
        <li class="breadcrumbs-item">Find a Doctor</li>
    </ul>

    <div class="block-find">
        <div class="block-find__text">
            <h1>Your Local eXciteOSA Consultants</h1>
            <div class="block-find__info"></div>
            <form class="find-form" id="fad-search" action="/find-a-doctor-result">
                <div class="find-form__row">
                    <input id="fap-zipcode" type="text" name="zipcode" placeholder="Postcode"
                           class="find-form__input" required/>
                </div>
                <div class="find-form__row">
                    <div class="quantity">
                        <input id="fap-distance" type="number" name="distance" placeholder="10" min="1"
                               class="find-form__input" required/>
                    </div>
                </div>
        
                <div class="find-form__row">
                    <button type="submit" class="btn btn-blue">SEARCH</button>
                </div>
            </form>
        </div>
        <div class="block-find__map">
            <div class="map" id="map"></div>


            <?php
            if ($query->have_posts()) {
                foreach ($query->posts as $post) {

                   $doctor_longitude = get_field ('longitude');
                   $doctor_latitude = get_field ('latitude');

                    echo '<div class="doctor-coordinates" data-longitude="' . get_field ('longitude') . '" data-latitude="' . get_field ('latitude') . '"></div>';

                }
            }


            ?>


        </div>
    </div>

</div>


<!-- CONTENT EOF   -->
<!-- BEGIN HEADER -->
<!--        <header class="header-inside">-->
<!--            <div class="wrapper">-->
<!--                <div class="line-top">-->
<!--                    <div class="coose-lang">-->
<!--                        <div class="coose-lang__title">-->
<!--                            <img src="<?php echo get_stylesheet_directory_uri() . '/design2021/'; ?>img/lang-1.png" alt="" />-->
<!--                            USA-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="line-top__item">-->
<!--                        <a href="#">HEALTHCARE PROFESSIONALS</a>-->
<!--                    </div>-->
<!--                    <div class="line-top__item">-->
<!--                        <a href="#" class="mailto">REQUEST INFORMATION</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="line-bottom">-->
<!--                    <a href="#" class="logo"><img src="<?php echo get_stylesheet_directory_uri() . '/design2021/'; ?>img/logo_blue.png" alt="" /></a>-->
<!--                    <nav class="main-nav">-->
<!--                        <ul class="main-nav-list">-->
<!--                            <li class="main-nav-list__item">-->
<!--                                <a href="#" class="main-nav-list__link">Sleep Apnoea & Snoring</a>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item">-->
<!--                                <a href="#" class="main-nav-list__link">How eXciteOSA<sup>®</sup> can help</a>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item">-->
<!--                                <a href="#" class="main-nav-list__link">Clinical Evidence</a>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item">-->
<!--                                <a href="#" class="main-nav-list__link">Find a Physicianp</a>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item tablet">-->
<!--                                <div class="line-top__item">-->
<!--                                    <a href="#">HEALTHCARE PROFESSIONALS</a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item tablet">-->
<!--                                <div class="line-top__item">-->
<!--                                    <a href="#" class="mailto">REQUEST INFORMATION</a>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item tablet">-->
<!--                                <div class="coose-lang">-->
<!--                                    <div class="coose-lang__title">-->
<!--                                        <img src="<?php echo get_stylesheet_directory_uri() . '/design2021/'; ?>img/lang-1.png" alt="" />-->
<!--                                        USA-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </li>-->
<!--                            <li class="main-nav-list__item mobile">-->
<!--                                <a href="#" class="btn btn-blue">TRY OUR ASESSMENT</a>-->
<!--                            </li>-->
<!--                        </ul>-->
<!--                    </nav>-->
<!--                    <a href="#" class="btn btn-blue">TRY OUR ASESSMENT</a>-->
<!--                    <ul class="user-nav">-->
<!--                        <li class="user-nav__item">-->
<!--                            <a href="#" class="user-nav__link"><img src="<?php echo get_stylesheet_directory_uri() . '/design2021/'; ?>img/icons/padlock_blue.png" alt="" /></a>-->
<!--                        </li>-->
<!--                        <li class="user-nav__item">-->
<!--                            <a href="#" class="user-nav__link"><img src="<?php echo get_stylesheet_directory_uri() . '/design2021/'; ?>img/icons/shopping-cart_blue.png" alt="" /></a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <a href="#" class="button-nav js-button-nav">-->
<!--                        <span></span>-->
<!--                        <span></span>-->
<!--                        <span></span>-->
<!--                    </a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </header>-->
<!-- HEADER EOF   -->


<!-- BODY EOF   -->
<!--    <link rel="stylesheet" type="text/css" href="css/style.css" />-->
<!--    <script src="js/jquery-3.5.1.min.js"></script>-->
<!--    <script src="js/components/slick.js"></script>-->
<!--    <script src="js/components/jquery.fancybox.js"></script>-->
<!--    <script src="js/components/wow.min.js"></script>-->
<!--    <script src="js/custom.js"></script>-->

<script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5Rvnbx9Ef0GSoGSE00A6OyrgslhSytlc&callback=initMap&libraries=places"></script>

<script>

    function initMap() {
        const center = {lat: 52.8319661, lng: -1.7132381};
        const map = new google.maps.Map(document.getElementById("map"), {
            center: center,
            zoom: 7,
            disableDefaultUI: true
        });

        let infowindow = new google.maps.InfoWindow;

        let marker, i;

        let locations = document.getElementsByClassName('doctor-coordinates');

        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i].dataset.latitude, locations[i].dataset.longitude),
                map: map
            });
            console.log(locations[i].dataset.longitude, locations[i].dataset.latitude);

            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    let url = "https://www.google.com/maps/search/?api=1&query=" + locations[i].dataset.latitude + "," + locations[i].dataset.longitude;
                    window.open(url, '_blank').focus();
                    // infowindow.setContent(locations[i].dataset.latitude + " " + locations[i].dataset.longitude);
                    // infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>
<?php
//get_sidebar();
get_footer();
?>
