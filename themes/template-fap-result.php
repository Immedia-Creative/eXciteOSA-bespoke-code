<?php
/**
 * Template Name: Page Fap Form Result
 *
 */

    $siteLayout = esc_attr(get_option('site_layout'));

    if ($siteLayout == 'Normal') {
        get_header();
    } elseif ($siteLayout == 'Linear') {
        get_header("linear");
    } else {
        get_header();
    }

$GOOGLE_MAPS_API_KEY = "AIzaSyD5Rvnbx9Ef0GSoGSE00A6OyrgslhSytlc";

$zipcode = $_GET['zipcode'];
//remove whitespaces from zipcode
$zipcode = preg_replace('/\s+/', '', $zipcode);
$distance = $_GET['distance'];
$telehealth = $_GET['telehealth'];

$curl = curl_init();
$url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $zipcode . "&key=" . $GOOGLE_MAPS_API_KEY;

$doctors = [];

curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",

));
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
if ($err) {
    //Only show errors while testing
    return $err;
} else {


    $responseObj = json_decode($response);

    $zip_longitude = $responseObj->results[0]->geometry->location->lng;
    $zip_latitude = $responseObj->results[0]->geometry->location->lat;


    $args = array(
       'posts_per_page' => -1,
        'post_type' => 'physician',
        'post_status' => 'publish',
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        foreach ($query->posts as $post) {
			
			$doctor_ID = get_the_ID();
            $doctor_longitude = get_field ('longitude');
            $doctor_latitude = get_field ('latitude');
			$thepractice = get_the_title();
            //$post_distance_to_zipcode = haversineGreatCircleDistance($zip_latitude, $zip_longitude, floatval($doctor_latitude[0]), floatval($doctor_longitude[0]));
			$post_distance_to_zipcode = haversineGreatCircleDistance($zip_latitude, $zip_longitude, floatval($doctor_latitude), floatval($doctor_longitude));
			
			//echo ($post_distance_to_zipcode." -*- "); //proves the line above works
			
            if ($distance > round($post_distance_to_zipcode * 0.000621371, 2)) {
                array_push($doctors, [
                    'doctor' => [
                        'id' => $doctor_ID,
                        'latitude' => floatval(get_field ('latitude')),
                       'longitude' => floatval(get_field ('longitude')),
                        'first_name' => get_field ('first-name'),
                        'last_name' => get_field ('last-name'), 
                        'practice_name'  => get_the_title(),
                        'address_1' =>  get_field ('address_1'),
                        'address_2' =>  get_field ('address_2'),
                        'city' => get_field ('city'),
                        'state' => get_field ('state'),
                        'zip' => get_field ('postcode'),
                        'phone' => get_field ('phone'),
                        'website' => get_field ('url'),
                        'email' => get_field ('email'),
                        'telehealth' => get_field ('telehealth'),
						'speciality' => get_field ('speciality'),
                    ],
                    'patient' => [
                        'latitude' => $zip_latitude,
                        'longitude' => $zip_longitude,
                    ],
                    'distance' => round($post_distance_to_zipcode * 0.000621371, 2)  // converts to Mi
                ]);
            }
            usort($doctors, function ($a, $b) {
                return ($a['distance'] - $b['distance']);
            });
            $doctors = array_slice($doctors, 0, 4);
        }
    } else {
        return 'No distributors on the site';
    }
}


/**
 * Calculates the great-circle distance between two points, with
 * the Haversine formula.
 * @param float $latitudeFrom Latitude of start point in [deg decimal]
 * @param float $longitudeFrom Longitude of start point in [deg decimal]
 * @param float $latitudeTo Latitude of target point in [deg decimal]
 * @param float $longitudeTo Longitude of target point in [deg decimal]
 * @param float $earthRadius Mean earth radius in [m]
 * @return float Distance between points in [m] (same as earthRadius)
 */
function haversineGreatCircleDistance(
    $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371000)
{
    // convert from degrees to radians
    $latFrom = deg2rad($latitudeFrom);
    $lonFrom = deg2rad($longitudeFrom);
    $latTo = deg2rad($latitudeTo);
    $lonTo = deg2rad($longitudeTo);

    $latDelta = $latTo - $latFrom;
    $lonDelta = $lonTo - $lonFrom;

    $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
    return $angle * $earthRadius;
}

?>

    <div class="wrapper">
<div class="breadcrumb" itemprop="breadcrumb"><span><span><a href="https://exciteosa.com/">Home</a> » <span><a href="https://exciteosa.com/support-hub/">Support hub</a> » <span class="breadcrumb_last" aria-current="page">Find a Doctor</span></span></span></span></span></div>

        <div class="block-find block-find_results">
            <div class="block-find__text">
                <h1>Your Local eXciteOSA Consultants</h1>
                <div class="block-find__info">Schedule a consultation now and start the discussion.</div>
                <form class="find-form" id="fad-search" action="/find-a-doctor-result">
                    <div class="find-form__row">
                        <input id="fap-zipcode" type="text" name="zipcode" placeholder="Postcode"
                               class="find-form__input"
                               value="<?php echo $zipcode; ?>">
                    </div>
                    <div class="find-form__row">
                        <div class="quantity">
                            <input id="fap-distance" type="number" name="distance" placeholder="10"
                                   class="find-form__input"
                                   min="0" value="<?php echo $distance; ?>">
                        </div>
                    </div>
                    
                    <div class="find-form__row">
                        <button type="submit" class="btn btn-blue">SEARCH</button>
                    </div>
                    <div class="find-form__row">
                        <div class="find-form__text">Results are ranked by proximity to postcode with no special
                            designation for multiple rankings.
                        </div>
                    </div>
                </form>
            </div>
            <div class="block-find__map">
                <div class="map-results-title">Results:</div>
                <?php if (count($doctors) > 0) {
                    foreach ($doctors as $key => $item) {
                        ?>
                        <div class="map-result map-result_small">
                            <div class="map-result__map">
                                <div class="map-small"
                                     id="map-<?php echo $key; ?>"
                                     data-latitude="<?php echo $item['doctor']['latitude'] ?>"
                                     data-longitude="<?php echo $item['doctor']['longitude'] ?>"
                                >

                                </div>
                            </div>
                            <div class="map-result__info">
                                <div class="map-result__title"><?php echo $item['doctor']['practice_name']; ?></div>
                                <ul class="map-result-list">
                                   
                                     <?php if($item['doctor']['speciality'] <> ""){echo " <li class='map-result-list__item'>".$item['doctor']['speciality']."<br /></li>";} ?>

                                        <li class="map-result-list__item"><?php echo $item['doctor']['address_1'] . ', ' . $item['doctor']['address_2']; ?>

                                        <br />
                                        <?php echo $item['doctor']['city'] . ", " . $item['doctor']['zip'] . ", " . $item['doctor']['state']; ?>
                                        <br>
										<?php if( $item['doctor']['phone'] ){ ?>
                                        Tel:
                                        <a href="tel:<?php echo $item['doctor']['phone']; ?>"><?php echo $item['doctor']['phone']; ?></a>
										<?php } ?>
                                    </li>
									<?php if( $item['doctor']['website'] ){ ?>
                                    <li class="map-result-list__item">Website: <a
                                                href="<?php echo $item['doctor']['website']; ?>"
                                                target="_blank"><?php echo $item['doctor']['website']; ?></a>
                                    </li>
                                    <?php } ?>
                                    	
								
									</li>
                                    
                                    <li class="map-result-list__item">
                                        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $item['doctor']['latitude'] ?>,<?php echo $item['doctor']['longitude'] ?>"
                                           target="_blank"
                                        >
                                            Directions
                                        </a>
                                    </li>

                                </ul>
                                
                                <a href="#" class="contant-physician" data-toggle="modal" data-target="#docModal-<?php echo $item['doctor']['id']; ?>">Contact</a>
							
                               <?php 
							   $thepractice = $item['doctor']['practice_name'];
							  //echo ($thepractice);?>
<div class="modal fade dr_modal" id="docModal-<?php echo $item['doctor']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
		  <div class="modal-close-cont" data-dismiss="modal" aria-label="Close">
			<div class="modal-close-img">Close</div>
		  </div>
          
		<?php //echo do_shortcode( '[contact-form-7 html_id="FAP contact physician" id="23929" title="FAD contact physician" destination-email="'.$item['doctor']['email'].'" pname="'.$item['doctor']['first_name'].' '.$item['doctor']['last_name'].'"]' );  ?>					
         
		 <?php $myshortcodestring='[contact-form-7 id="16492" title="FAP- Contact Physician"  pname="'.$thepractice.'" destination-email="'.$item['doctor']['email'].'"]'; ?>
		   <?php //echo ($myshortcodestring);?>
		 <?php echo do_shortcode( $myshortcodestring );  ?>					
            
      </div>
    </div>
  </div>
</div>

                                
                                
                                <div class="map-result__rate">
                                    <?php echo $item['distance']; ?> miles
                                </div>
                            </div>
                           
                        </div>
                    <?php }
                } else { ?>
                    No distributors found in the given radius
                <?php }
                ?>
            </div>
        </div>
<!--<p>If you do not find a local distributor for your state, contact a <a href="/fill/regional-distributors/">regional</a> or <a href="/fill/national-distributors/">national</a> dealer.</p> //-->
    </div>

    <script async
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5Rvnbx9Ef0GSoGSE00A6OyrgslhSytlc&callback=initMap"></script>

    <script>

        function initMap() {
            // MAP 0
            let map_element_0 = document.getElementById("map-0");
            let myLatlng_0 = new google.maps.LatLng(map_element_0.dataset.latitude, map_element_0.dataset.longitude);
            let mapOptions_0 = {zoom: 14, center: myLatlng_0, disableDefaultUI: true}
            let map_0 = new google.maps.Map(map_element_0, mapOptions_0);
            let marker_0 = new google.maps.Marker({position: myLatlng_0,});
            marker_0.setMap(map_0);
            // MAP 1
            let map_element_1 = document.getElementById("map-1");
            let myLatlng_1 = new google.maps.LatLng(map_element_1.dataset.latitude, map_element_1.dataset.longitude);
            let mapOptions_1 = {zoom: 14, center: myLatlng_1, disableDefaultUI: true}
            let map_1 = new google.maps.Map(map_element_1, mapOptions_1);
            let marker_1 = new google.maps.Marker({position: myLatlng_1,});
            marker_1.setMap(map_1);
            // MAP 2
            let map_element_2 = document.getElementById("map-2");
            let myLatlng_2 = new google.maps.LatLng(map_element_2.dataset.latitude, map_element_2.dataset.longitude);
            let mapOptions_2 = {zoom: 14, center: myLatlng_2, disableDefaultUI: true}
            let map_2 = new google.maps.Map(map_element_2, mapOptions_2);
            let marker_2 = new google.maps.Marker({position: myLatlng_2,});
            marker_2.setMap(map_2);
            // MAP 3
            let map_element_3 = document.getElementById("map-3");
            let myLatlng_3 = new google.maps.LatLng(map_element_3.dataset.latitude, map_element_3.dataset.longitude);
            let mapOptions_3 = {zoom: 14, center: myLatlng_3, disableDefaultUI: true}
            let map_3 = new google.maps.Map(map_element_3, mapOptions_3);
            let marker_3 = new google.maps.Marker({position: myLatlng_3,});
            marker_3.setMap(map_3);
        }


    </script>
<?php
//get_sidebar();
get_footer();
?>