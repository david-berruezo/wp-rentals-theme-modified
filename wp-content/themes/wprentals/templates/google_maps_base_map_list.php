<div id="gmap-control-list">
    <span  id="gmapzoomplus"></span>
    <span  id="gmapzoomminus"></span>
    <span  id="geolocation-button"></span>
    <span  id="gmap-full"></span>
    <span  id="gmap-prev"></span>
    <span  id="gmap-next"></span>
</div>

<div  id="google_map_prop_list">
    <?php
    if(  wprentals_get_option('wp_estate_kind_of_places')!=2){
    ?>
        <div id="gmap-loading"><?php esc_html_e('Loading Maps','wprentals');?>
            <div class="spinner map_loader" id="listing_loader_maps">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
           </div>
        </div>
    <?php 
    } 
    ?>
</div> 