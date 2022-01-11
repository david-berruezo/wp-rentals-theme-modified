<style>
    .btn-default {
        text-shadow: none;
        background-image: -webkit-linear-gradient(top, #fff 0%, #fff 100%);
        background-image: -o-linear-gradient(top, #fff 0%, #fff 100%);
        background-image: -webkit-gradient(linear, left top, left bottom, from(#fff), to(#fff));
        background-image: linear-gradient(to bottom, #fff 0%, #fff 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffffff', endColorstr='#fff', GradientType=0);
        filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
        background-repeat: repeat-x;
        border-color: #ccc;

    }

    .btn-default:hover, .btn-default:focus {
        background-color: #fff;
    }

    .btn {
        -webkit-box-shadow: 0px 2px 0px 0px #fff;
        box-shadow: 0px 2px 0px 0px #fff;
    }

    .buscador_amenities {
        background-color: #ffffff;
        border-radius: 8px;
        -webkit-box-shadow: 0px 0px 50px 0px rgb(32 32 32 / 15%);
        -moz-box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        -o-box-shadow: 0px 0px 50px 0px rgba(32, 32, 32, 0.15);
        box-shadow: 0px 0px 50px 0px rgb(32 32 32 / 15%);
        display: none;
        min-height: 254px;
        left: 0;
        position: relative;
        top: 0px;
        width: 100%;
        z-index: 9;
        padding: 15px;
        margin-top:30px;
        margin-bottom:30px;
    }

    .buscador_amenities ul li{
        list-style-type:none;
    }

    #show_advbtn{
        margin-top: 1px;
        margin-left: 20px;
        position: relative;
        display: inline-block;
        width: 115px;
        border: 1px solid #ccc;
        padding: 9px;
        cursor:pointer;
    }

</style>
<script>
    jQuery(function($){
        $("#show_advbtn").click(function(){
            if($(".buscador_amenities").is(":visible")){
                $(".buscador_amenities").hide();
            }else{
                $(".buscador_amenities").show();
            }// end if
        });
    });
</script>

<?php
global $current_adv_filter_search_label;
global $current_adv_filter_category_label;
global $current_adv_filter_city_label;
global $current_adv_filter_area_label;
$current_adv_filter_search_label_non    =   $current_adv_filter_search_label;
$current_adv_filter_category_label_non  =   $current_adv_filter_category_label;
$current_adv_filter_city_label_non      =   $current_adv_filter_city_label;
$current_adv_filter_area_label_non      =   $current_adv_filter_area_label;
$allowed_html                           =   array();

$allowed_html_list =    array(  'li' => array(
                                        'data-value'        =>array(),
                                        'role'              => array(),
                                        'data-parentcity'   =>array(),
                                        'data-value2'       =>array(),
                                    ),
                              
                            );
$current_name      =   '';
$current_slug      =   '';
$listings_list     =   '';
$show_filter_area  =   '';

if( isset($post->ID) ){
    $show_filter_area  =   get_post_meta($post->ID, 'show_filter_area', true);
}

if( is_tax() ){
    $show_filter_area = 'yes';
    $current_adv_filter_search_label        =   esc_html__( 'All Sizes','wprentals');
    $category_second_action_dropdown        =  stripslashes( esc_html(wprentals_get_option('wp_estate_category_second_dropdown', '')));
    
    if($category_second_action_dropdown!=''){
        $current_adv_filter_search_label=$category_second_action_dropdown;
    }
    $current_adv_filter_search_label_non    =   'all';
    $current_adv_filter_category_label      =   esc_html__( 'All Types','wprentals');
    $category_second_dropdown_label         =   stripslashes( esc_html(wprentals_get_option('wp_estate_category_main_dropdown', '')));
    if($category_second_dropdown_label!=''){
        $current_adv_filter_category_label=$category_second_dropdown_label;
    }
    $current_adv_filter_category_label_non  =   'all';
    $current_adv_filter_city_label          =   esc_html__( 'All Cities','wprentals');
    $current_adv_filter_city_label_non      =   'All Cities';
    $current_adv_filter_area_label          =   esc_html__( 'All Areas','wprentals');
    $current_adv_filter_area_label_non      =   'All Areas';    
    $taxonmy                                =   get_query_var('taxonomy');
    $term                                   =   single_cat_title('',false);
    
    if ($taxonmy == 'property_city'){
        $current_adv_filter_city_label =    $current_adv_filter_city_label_non  =   ucwords( str_replace('-',' ',$term) );
    }
    if ($taxonmy == 'property_area'){
        $current_adv_filter_area_label =   $current_adv_filter_area_label_non  =    ucwords( str_replace('-',' ',$term) );
    }
    if ($taxonmy == 'property_category'){
        $current_adv_filter_category_label =$current_adv_filter_category_label_non = ucwords( str_replace('-',' ',$term) );
    }
    if ($taxonmy == 'property_action_category'){
        $current_adv_filter_search_label = $current_adv_filter_search_label_non =   ucwords( str_replace('-',' ',$term) );
    }
    
}

$listing_filter         =   '';
$selected_order         = esc_html__( 'Sort by','wprentals');
if( isset($post->ID) ){
    $listing_filter         = get_post_meta($post->ID, 'listing_filter',true );
}
$listing_filter_array   = array(
                            "1"=>esc_html__( 'Price High to Low','wprentals'),
                            "2"=>esc_html__( 'Price Low to High','wprentals'),
                            "0"=>esc_html__( 'Default','wprentals')
                        );
    
$local_args_property_lsit_filters = wpestate_get_select_arguments();
foreach($listing_filter_array as $key=>$value){
    $listings_list.= '<li role="presentation" data-value="'.esc_attr($key).'">'.esc_html($value).'</li>';

    if($key==$listing_filter){
        $selected_order=$value;
    }
}   
      

$order_class='';
if( $show_filter_area != 'yes' ){
    $order_class=' order_filter_single ';  
}

        
if( $show_filter_area=='yes' ){
        if ( is_tax() ){
            $curent_term    =   get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
            $current_slug   =   $curent_term->slug;
            $current_name   =   $curent_term->name;
            $current_tax    =   $curent_term->taxonomy; 
        }

    $action_select_list =   wpestate_get_action_select_list($local_args_property_lsit_filters);
    $categ_select_list  =   wpestate_get_category_select_list($local_args_property_lsit_filters);
    $select_city_list   =   wpestate_get_city_select_list($local_args_property_lsit_filters); 
  
    if(is_tax() && $taxonmy=='property_city' ){
        $select_area_list   =   wpestate_get_area_select_list($local_args_property_lsit_filters);
    }else{
        $select_area_list   =   wpestate_get_area_select_list($local_args_property_lsit_filters);
    }
        
}// end if show filter

$category_second_action_dropdown=  stripslashes( esc_html(wprentals_get_option('wp_estate_category_second_dropdown', '')));
if($category_second_action_dropdown==$current_adv_filter_search_label_non){
    $current_adv_filter_search_label_non='all';   
}

$category_second_dropdown_label = stripslashes( esc_html(wprentals_get_option('wp_estate_category_main_dropdown', '')));
if($category_second_dropdown_label == $current_adv_filter_category_label_non){
    $current_adv_filter_category_label_non='all';
}

/*
 * 01 calefaccion
 * 02 aire acondicionado
 * 03 aparcamiento
 * 04 camas supletorias
 * 05 piscina climatizada
 * 07 toallas
 * 08 acceso a internet
 * 09 mascotas
 * 18 cuna
 *
 */

global $actual_language;

# services
$service_aire_acondicionado = get_service_name_by_code(2 , $actual_language);
$service_mascota = get_service_name_by_code(9 , $actual_language);
$service_piscina_climatizada = get_service_name_by_code(5 , $actual_language);
$service_wifi = get_service_name_by_code(8 , $actual_language);
//p_($service_aire_acondicionado);

# characteristics
$characteristics = getTextosFeature($actual_language);

/*
 * 10 chimenea
 * 22 gimnasio
 * 01 jacuzzi
 * 02 secador de pelo
 * 24 tennis
 * 13 minibar
 * 06 tv
 * 00 sauna
 * 07 jardin
 * 11 barbacoa
 * 05 piscina
*/

?>

    <?php if( $show_filter_area=='yes' ){?>
    <div class="listing_filters_head row"> 
        <input type="hidden" id="page_idx" value="
            <?php 
            if(!is_tax() ) {
                print intval($post->ID);
            }
            ?>">
        
            <div class="col-md-2 action_taxonomy_filter">
                <div class="dropdown form_control listing_filter_select" >
                    <div data-toggle="dropdown" id="a_filter_action" class="filter_menu_trigger" 
                        data-value="<?php print wp_kses($current_adv_filter_search_label_non,$allowed_html);?>"> <?php print wp_kses($current_adv_filter_search_label,$allowed_html);?> <span class="caret caret_filter"></span> </div>           
                    <ul  class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_action">
                        <?php print  wp_kses($action_select_list,$allowed_html_list); ?>
                    </ul>        
                </div>
            </div>
        
            <div class="col-md-2 main_taxonomy_filter">
                <div class="dropdown form_control listing_filter_select" >
                    <div data-toggle="dropdown" id="a_filter_categ" class="filter_menu_trigger" 
                        data-value="<?php print wp_kses($current_adv_filter_category_label_non,$allowed_html); ?>"> <?php  print wp_kses($current_adv_filter_category_label,$allowed_html); ?> <span class="caret caret_filter"></span> </div>           
                    <ul  class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_categ">
                        <?php print  wp_kses($categ_select_list,$allowed_html_list);?>
                    </ul>        
                </div>      
            </div>
       
            <div class="col-md-2 city_taxonmy_filter">
                <div class="dropdown form_control listing_filter_select" >
                    <div data-toggle="dropdown" id="a_filter_cities" class="filter_menu_trigger" data-value="<?php print wp_kses($current_adv_filter_city_label_non,$allowed_html); ?>"> <?php print wp_kses($current_adv_filter_city_label,$allowed_html);  ?> <span class="caret caret_filter"></span> </div>           
                    <ul id="filter_city" class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_cities">
                        <?php  print trim($select_city_list); ?>
                    </ul>        
                </div>
            </div>
        
            <div class="col-md-2 area_taxonomy_filter">
                <div class="dropdown form_control listing_filter_select" >
                    <div data-toggle="dropdown" id="a_filter_areas" class="filter_menu_trigger" data-value="<?php  print wp_kses($current_adv_filter_area_label_non,$allowed_html); ?>"> <?php print wp_kses($current_adv_filter_area_label,$allowed_html); ?> <span class="caret caret_filter"></span> </div>           
                    <ul id="filter_area" class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_areas">
                        <?php   print  wp_kses($select_area_list,$allowed_html_list); ?>
                    </ul>        
                </div>
            </div>
        
        
            <div class="col-md-2 order_filter">
                <div class="dropdown  listing_filter_select " >
                    <div data-toggle="dropdown" id="a_filter_order" class="filter_menu_trigger" data-value="0"> <?php print wp_kses($selected_order,$allowed_html); ?> <span class="caret caret_filter"></span> </div>           

                    <ul id="filter_order" class="dropdown-menu filter_menu" role="menu" aria-labelledby="a_filter_order">
                        <?php  print  wp_kses($listings_list,$allowed_html_list);?>
                    </ul>        
                </div>

            </div>

            <!--
            <div class="col-md-2">
                <select class="selectpicker show-tick" multiple  title="Servicios...">
                    <option data-taxonomy="extra_services" data-value="aire-acondicionado-es">Aire acondicionado</option>
                    <option data-taxonomy="extra_services" data-value="calefaccion-es">Calefacción</option>
                    <option data-taxonomy="property_features" data-value="lavadora-es">Lavadora</option>
                    <option data-taxonomy="property_features" data-value="lavavajillas-es">Lavavajillas</option>
                    <option data-taxonomy="extra_services" data-value="wifi-es">Wifi</option>
                    <option data-taxonomy="extra_services" data-value="mascotas-es2">Mascotas</option>
                </select>
            </div>
            -->

            <span id="show_advbtn" class="dropbtn">Abrir servicios <i class="flaticon-more pl10 flr-520"></i></span>

            <div class="col-md-12 buscador_amenities">
                <div class="row p15">
                    <div class="col-lg-12">
                        <h4 class="text-thm3">Amenities</h4>
                    </div>
                    <div class="col-xxs-6 col-sm col-lg-2 col-xl">
                        <ul class="ui_kit_checkbox selectable-list">
                            <!-- characteristics
                            * 10 chimenea
                            * 22 gimnasio
                            * 01 jacuzzi
                            * 02 secador de pelo
                            * 24 tennis
                            * 13 minibar
                            * 06 tv
                            * 00 sauna
                            * 07 jardin
                            * 11 barbacoa
                            * 05 piscina
                            -->

                            <!-- services
                            * 01 calefaccion
                            * 02 aire acondicionado
                            * 03 aparcamiento
                            * 04 camas supletorias
                            * 05 piscina climatizada
                            * 07 toallas
                            * 08 acceso a internet
                            * 09 mascotas
                            * 18 cuna
                            *
                            -->

                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="services_2">
                                    <label class="custom-control-label" for="customCheck1"><?php echo $service_aire_acondicionado->text_title; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck2" name="checkbox_10">
                                    <label for="customCheck2"><?php echo $characteristics[10]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck3" name="checkbox_22">
                                    <label class="custom-control-label" for="customCheck3"><?php echo $characteristics[22]; ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xxs-6 col-sm col-lg-2 col-xl">
                        <ul class="ui_kit_checkbox selectable-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck4" name="checkbox_1">
                                    <label class="custom-control-label" for="customCheck4"><?php echo $characteristics[1]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck5" name="checkbox_2">
                                    <label class="custom-control-label" for="customCheck5"><?php echo $characteristics[2]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck6" name="checkbox_24">
                                    <label class="custom-control-label" for="customCheck6"><?php echo $characteristics[24]; ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xxs-6 col-sm col-lg-2 col-xl">
                        <ul class="ui_kit_checkbox selectable-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck7" name="services_9">
                                    <label class="custom-control-label" for="customCheck7"><?php echo $service_mascota->text_title; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck8" name="checkbox_13">
                                    <label class="custom-control-label" for="customCheck8"><?php echo $characteristics[13]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck9" name="checkbox_6">
                                    <label class="custom-control-label" for="customCheck9"><?php echo $characteristics[6]; ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xxs-6 col-sm col-lg-2 col-xl">
                        <ul class="ui_kit_checkbox selectable-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck10" name="services_5">
                                    <label class="custom-control-label" for="customCheck10"><?php echo $service_piscina_climatizada->text_title; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck11" name="checkbox_0">
                                    <label class="custom-control-label" for="customCheck11"><?php echo $characteristics[0]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck12" name="checkbox_7">
                                    <label class="custom-control-label" for="customCheck12"><?php echo $characteristics[7]; ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xxs-6 col-sm col-lg-2 col-xl">
                        <ul class="ui_kit_checkbox selectable-list">
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck13" name="checkbox_11">
                                    <label class="custom-control-label" for="customCheck13"><?php echo $characteristics[11]; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck14" name="services_8">
                                    <label class="custom-control-label" for="customCheck14"><?php echo $service_wifi->text_title; ?></label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck15" name="checkbox_5">
                                    <label class="custom-control-label" for="customCheck15"><?php echo $characteristics[5]; ?></label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

    </div>

    <?php } ?>      