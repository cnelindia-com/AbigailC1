<?php
require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'helpers.php';

if(isset($_GET['shop'])){
	$shop_row = get_install_by_shop($_GET['shop']);
	$shop_domain = $_GET['shop'];
	$nonce = $shop_row['nonce'];
	$access_token = $shop_row['access_token'];
	
	if(isset($_GET['template']) && !empty($_GET['template'])){
		$template = $_GET['template'];
		
		$is_buttons_template = false;
		$is_mini_poll_template = false;
		$is_mini_thumbs_template = false;
		$is_thumbs_up_template = false;
		$is_thumbs_up_down_template = false;
		$is_up_down_template = false;
		
		if($template == 'buttons'){
			$is_buttons_template = true;
		}
		else if($template == 'mini_poll'){
			$is_mini_poll_template = true;
		}
		else if($template == 'mini_thumbs'){
			$is_mini_thumbs_template = true;
		}
		else if($template == 'thumbs_up'){
			$is_thumbs_up_template = true;
		}
		else if($template == 'thumbs_up_down'){
			$is_thumbs_up_down_template = true;
		}
		else if($template == 'up_down'){
			$is_up_down_template = true;
		}
		else{
			$is_mini_thumbs_template = true;
		}
?>
<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome</title>
        <link rel="stylesheet" href="css/font-awesome.css">
        <link rel="stylesheet" href="css/ht_uptown.css">
        <link rel="stylesheet" href="css/custom_usb.css">
        <link rel="stylesheet" href="css/style.css">
        <script type="text/javascript" src="js/jquery.js"></script>
    </head>

	<body ng-app="usbapp" class="ng-scope">
        <div class="wrapper">
            <div class="fiveld_button_header_container">
                <div class="fiveld_button_header_inner_container">
                    <div class="fiveld_button_header_left_inner_container">
                        <div class="fiveld_button_header_container">
                            <div class="fiveld_button_header_container">
                                <a class="hwedesignblinkbutton hwe_design_anchor">Plans and Pricing</a>
                            </div>
                            <div class="fiveld_header_button_left">
                                <a class="hwedesignblinkbutton hwe_design_anchor">
                                    FAQ
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="fiveld_button_header_right_inner_container">
                        <a href="dashboard.php?shop=<?php echo $shop_domain; ?>" class="hwedesignblinkbutton hwe_design_anchor">
                            Dashboard
                        </a>
                    </div>
                </div>
            </div>

            <div class="ht-config-wrapper ng-scope" ng-controller="configpage">
                <div class="ht-config">
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>Template : <sma ll class="tag--shopify-plus">
							<?php 
							if($is_buttons_template){
								echo "Buttons";
							}
							else if($is_mini_poll_template){
								echo "Mini Poll";
							}
							else if($is_mini_thumbs_template){
								echo "Mini Thumbs";
							}
							else if($is_thumbs_up_template){
								echo "Thumbs Up";
							}
							else if($is_thumbs_up_down_template){
								echo "Thumbs Up Down";
							}
							else if($is_up_down_template){
								echo "Up Down";
							}
							?>
                            
                            </small></h2>
                            <p>Build trust and motivate customers to complete orders.
                                This is a feature for Shopify Plus plans only.
                                <a target="_blank" href="https://support.hextom.com/hc/en-us/articles/360022009153-Checkout-page-campaign-Why-this-feature-is-Shopify-Plus-only-">Why?</a>
                                <i class="icon-offsite"></i>
                            </p>
                        </div>
                    </section>
                    
                    <section>
                        <div class="column two-thirds">
                            <div class="row card">
                                <h5>Campaign Name</h5>
                                <div class="row">
                                    <input type="text" name="campaign_name" class="ng-pristine ng-untouched ng-valid">
                                </div>
                            </div>
                        </div>
                    </section>
                    
                    <section>
                        <div class="column two-thirds">
                            <div class="row card">
                                <h5>Campaign Name</h5>
                                <div class="row">
                                    <input type="text" name="campaign_name" class="ng-pristine ng-untouched ng-valid">
                                </div>
                            </div>
                        </div>
                    </section>
            
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>
                                Home/Collection Page Config
                                <!-- ngIf: data.coll_is_locked --><span class="feature-lock ng-scope" ng-if="data.coll_is_locked">
                                    <i class="icon-locked"></i>
                                    <a class="upgrade-with-icon" ng-click="goto_pricing_page('coll_heading')">Upgrade</a>
                                </span><!-- end ngIf: data.coll_is_locked -->
                            </h2>
                            <p>
                                Make products stand out on home page and collection page
                            </p>
                        </div>
                    </section>
                    
            
            
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>Product Page Config</h2>
                            <p>Motivate customers to “add to cart” on product page</p>
                        </div>
                    </section>
                    <section id="outer-container-sticky-sidebar--prod" style="position: relative;">
                        <div class="column two-thirds">
                            <div class="row card" ng-class="{'feature-lock': data.prod_static_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Message (Display after price)</h4>
                                        <!-- ngIf: data.prod_static_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-static-switch" ng-click="update_setting('prod_static')">
                                            <label class="onoffswitch-label" for="prod-static-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_static_is_on -->
                            </div>
            
                            <div class="row card feature-lock" id="section-prod-deadline" ng-class="{'feature-lock': data.prod_deadline_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Get-it-by Timer (Display after price)</h4>
                                        <!-- ngIf: data.prod_deadline_is_locked --><p ng-if="data.prod_deadline_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('prod_get_it_by_timer')">Upgrade</a>
                                        </p><!-- end ngIf: data.prod_deadline_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-deadline-switch" ng-click="update_setting('prod_deadline')">
                                            <label class="onoffswitch-label" for="prod-deadline-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_deadline_is_on -->
                            </div>
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.prod_atc_button_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Add-to-Cart Button Animation</h4>
                                        <!-- ngIf: data.prod_atc_button_is_locked --><p ng-if="data.prod_atc_button_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('prod_atc_button')">Upgrade</a>
                                        </p><!-- end ngIf: data.prod_atc_button_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-atc-button-switch" ng-click="update_setting('prod_atc_button')">
                                            <label class="onoffswitch-label" for="prod-atc-button-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_atc_button_is_on -->
                            </div>
            
                            
            
                            
            
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.prod_bogo_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Buy X Get Y (BOGO)</h4>
                                        <!-- ngIf: data.prod_bogo_is_locked --><p ng-if="data.prod_bogo_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('prod_bogo')">Upgrade</a>
                                        </p><!-- end ngIf: data.prod_bogo_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-bogo-switch" ng-click="update_setting('prod_bogo')">
                                            <label class="onoffswitch-label" for="prod-bogo-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_bogo_is_on -->
                            </div>
            
            
                            <div class="row card" ng-class="{'feature-lock': data.prod_countdown_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Countdown Timer</h4>
                                        <!-- ngIf: data.prod_countdown_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-countdown-switch" ng-click="update_setting('prod_countdown')" checked="checked">
                                            <label class="onoffswitch-label" for="prod-countdown-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_countdown_is_on --><div class="fadein ng-scope" id="section-prod-countdown" ng-if="data.prod_countdown_is_on" style="">
                                    <div class="row">
                                        <label>Message above the timer</label>
                                        <input type="text" ng-model="data.prod_countdown_msg" class="ng-pristine ng-untouched ng-valid" value="Deal of the Day">
                                    </div>
                                    <div class="row">
                                        <label>Countdown from fixed minutes</label>
                                        <div class="row">
                                            <div class="range-slider">
                                                <span class="irs js-irs-1  irs-with-grid"><span class="irs"><span class="irs-line" tabindex="0"><span class="irs-line-left"></span><span class="irs-line-mid"></span><span class="irs-line-right"></span></span><span class="irs-min" style="visibility: visible;">1</span><span class="irs-max" style="visibility: visible;">1440</span><span class="irs-from" style="visibility: hidden;">0</span><span class="irs-to" style="visibility: hidden;">0</span><span class="irs-single" style="left: 3.21216%;">60</span></span><span class="irs-grid" style="width: 97.4882%; left: 1.15589%;"><span class="irs-grid-pol" style="left: 0%"></span><span class="irs-grid-text js-grid-text-0" style="left: 0%; margin-left: -0.863422%;">1</span><span class="irs-grid-pol small" style="left: 15%"></span><span class="irs-grid-pol small" style="left: 10%"></span><span class="irs-grid-pol small" style="left: 5%"></span><span class="irs-grid-pol" style="left: 20%"></span><span class="irs-grid-text js-grid-text-1" style="left: 20%; visibility: visible; margin-left: -1.64835%;">289</span><span class="irs-grid-pol small" style="left: 35%"></span><span class="irs-grid-pol small" style="left: 30%"></span><span class="irs-grid-pol small" style="left: 25%"></span><span class="irs-grid-pol" style="left: 40%"></span><span class="irs-grid-text js-grid-text-2" style="left: 40%; visibility: visible; margin-left: -1.64835%;">577</span><span class="irs-grid-pol small" style="left: 55%"></span><span class="irs-grid-pol small" style="left: 50%"></span><span class="irs-grid-pol small" style="left: 45%"></span><span class="irs-grid-pol" style="left: 60%"></span><span class="irs-grid-text js-grid-text-3" style="left: 60%; visibility: visible; margin-left: -1.64835%;">864</span><span class="irs-grid-pol small" style="left: 75%"></span><span class="irs-grid-pol small" style="left: 70%"></span><span class="irs-grid-pol small" style="left: 65%"></span><span class="irs-grid-pol" style="left: 80%"></span><span class="irs-grid-text js-grid-text-4" style="left: 80%; margin-left: -2.04082%;">1152</span><span class="irs-grid-pol small" style="left: 95%"></span><span class="irs-grid-pol small" style="left: 90%"></span><span class="irs-grid-pol small" style="left: 85%"></span><span class="irs-grid-pol" style="left: 100%"></span><span class="irs-grid-text js-grid-text-5" style="left: 100%; visibility: visible; margin-left: -2.04082%;">1440</span></span><span class="irs-bar" style="left: 1.25589%; width: 3.99708%;"></span><span class="irs-bar-edge"></span><span class="irs-shadow shadow-single" style="display: none;"></span><span class="irs-slider single" style="left: 3.99708%;"></span></span><input type="text" id="container-range-slider-prod-countdown" value="60" class="irs-hidden-input" tabindex="-1" readonly>
                                            </div>
                                            <div class="range-slider__extra-controls">
                                                <div class="input-group input-check">
                                                    <input type="number" max="1440" min="1" id="input-range-slider-prod-countdown" class="input-range-slider-prod-countdown ng-pristine ng-untouched ng-valid ng-valid-min ng-valid-max" value="60" ng-model="data.prod_countdown_fixed_minutes">
                                                    <span class="append">minutes</span>
                                                    <p class="invalid-feedback invalid-feedback--max">
                                                        Value must be less than or equal to 1,440. Please enter a smaller number.
                                                    </p>
                                                    <p class="invalid-feedback invalid-feedback--min">
                                                        Value must be greater than or equal to 1. Please enter a larger number.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ngIf: data.coll_is_on && data.coll_type_selected === 'timer' -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-control--radio">
                                            <label>When the timer reaches "0 hours 0 minutes"</label>
                                            <!-- ngRepeat: item in data.prod_countdown_expire_items --><label ng-repeat="item in data.prod_countdown_expire_items" class="ng-binding ng-scope">
                                                <input type="radio" name="coll-countdown-expire-type" ng-model="data.prod_countdown_expire_type" value="restart" class="ng-pristine ng-untouched ng-valid" checked="checked">
                                                Restart countdown
                                            </label><!-- end ngRepeat: item in data.prod_countdown_expire_items --><label ng-repeat="item in data.prod_countdown_expire_items" class="ng-binding ng-scope">
                                                <input type="radio" name="coll-countdown-expire-type" ng-model="data.prod_countdown_expire_type" value="hide" class="ng-pristine ng-untouched ng-valid">
                                                Hide the countdown
                                            </label><!-- end ngRepeat: item in data.prod_countdown_expire_items -->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column one-third">
                                            <label>Top background color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--prod-countdown-bkg-start')" ng-style="{'background-color': data.prod_countdown_bkg_color_start}" style="background-color: rgb(255, 97, 98);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--prod-countdown-bkg-start" ng-model="data.prod_countdown_bkg_color_start" class="ng-pristine ng-untouched ng-valid" value="#FF6162">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(255, 0, 2);"><i style="left: 61.9608px; top: 0px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 0.105485px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(255, 97, 98);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                        <div class="column one-third">
                                            <label>Bottom background color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--prod-countdown-bkg-end')" ng-style="{'background-color': data.prod_countdown_bkg_color_end}" style="background-color: rgb(255, 151, 102);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--prod-countdown-bkg-end" ng-model="data.prod_countdown_bkg_color_end" class="ng-pristine ng-untouched ng-valid" value="#FF9766">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(255, 82, 0);"><i style="left: 60px; top: 0px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 94.6623px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(255, 151, 102);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                        <div class="column one-third">
                                            <label>Digit text color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--prod-countdown-digit')" ng-style="{'background-color': data.prod_countdown_digit_color}" style="background-color: rgb(255, 255, 255);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--prod-countdown-digit" ng-model="data.prod_countdown_digit_color" class="ng-pristine ng-untouched ng-valid" value="#FFFFFF">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(255, 0, 0);"><i style="left: 0px; top: 0px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 0px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(255, 255, 255);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column one-half input-check">
                                            <label for="prod-countdown-msg-font-size__input">Message font size</label>
                                            <div class="input-group">
                                                <input type="number" max="100" min="1" id="prod-countdown-msg-font-size__input" ng-model="data.prod_countdown_msg_font_size" class="ng-pristine ng-untouched ng-valid ng-valid-min ng-valid-max" value="14">
                                                <span class="append">px</span>
                                                <p class="invalid-feedback invalid-feedback--max">
                                                    Value must be less than or equal to 100. Please enter a smaller number.
                                                </p>
                                                <p class="invalid-feedback invalid-feedback--min">
                                                    Value must be greater than or equal to 1. Please enter a larger number.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="column one-half input-check">
                                            <label for="prod-countdown-digit-font-size__input">Timer font size</label>
                                            <div class="input-group">
                                                <input type="number" max="100" min="1" id="prod-countdown-digit-font-size__input" ng-model="data.prod_countdown_digit_font_size" class="ng-pristine ng-untouched ng-valid ng-valid-min ng-valid-max" value="24">
                                                <span class="append">px</span>
                                                <p class="invalid-feedback invalid-feedback--max">
                                                    Value must be less than or equal to 100. Please enter a smaller number.
                                                </p>
                                                <p class="invalid-feedback invalid-feedback--min">
                                                    Value must be greater than or equal to 1. Please enter a larger number.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
            
                                    <div class="row section--v-spacious">
                                        <p>
                                            <a target="_blank" href="https://support.hextom.com/hc/en-us/articles/360016174513-Countdown-timer-Why-do-my-timers-disappear-">
                                                Why my timer appears for a split second and then disappears ? <i class="icon-offsite"></i>
                                            </a>
                                        </p>
                                    </div>
                                </div><!-- end ngIf: data.prod_countdown_is_on -->
                            </div>
            
                            
            
                            <div class="row card" id="section-prod-real-stock" ng-class="{'feature-lock': data.prod_real_stock_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Stock Inventory Number</h4>
                                        <!-- ngIf: data.prod_real_stock_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-real-stock-switch" ng-click="update_setting('prod_real_stock')">
                                            <label class="onoffswitch-label" for="prod-real-stock-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.prod_real_stock_is_on -->
                            </div>
            
                            <div class="row card" ng-class="{'feature-lock': data.prod_trust_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Trust Badge</h4>
                                        <!-- ngIf: data.prod_trust_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-trust-switch" ng-click="update_setting('prod_trust')" checked="checked">
                                            <label class="onoffswitch-label" for="prod-trust-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fadein" ng-show="data.prod_trust_is_on" style="">
                                    <div class="row">
                                        <label>Message above the trust badge</label>
                                        <input type="text" ng-model="data.prod_trust_msg" class="ng-pristine ng-untouched ng-valid" value="Secure and trusted checkout with">
                                    </div>
                                    <div class="row">
                                        <div class="column two-thirds">
                                            <label>Select badges</label>
                                            <div class="scrolling-container scrolling-container--badges htusb-ui-prod-badges">
                                                <div class="row">
                                                    <!-- ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-visa" ng-click="select_badge(badge, 'prod')" checked="checked">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-debit"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-visa-debit" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-electron"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-visa-electron" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-visa-pay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-mastercard" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-mastercard-alt" ng-click="select_badge(badge, 'prod')" checked="checked">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard-securecode"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-mastercard-securecode" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-american-express"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-american-express" ng-click="select_badge(badge, 'prod')" checked="checked">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-american-express-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-american-express-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paypal"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paypal" ng-click="select_badge(badge, 'prod')" checked="checked">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paypal-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paypal-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-interac"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-interac" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-interac-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-interac-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-shopify"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-shopify" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-apple-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-apple-pay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-google-wallet"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-google-wallet" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-google-wallet-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-google-wallet-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-square"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-square" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-stripe"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-stripe" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-amazon-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-amazon-pay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-amazon-pay-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-amazon-pay-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bitcoin"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-bitcoin" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-jcb"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-jcb" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-discover"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-discover" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-diners"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-diners" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-diners-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-diners-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-alipay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-alipay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bancontact-mister-cash"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-bancontact-mister-cash" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bank-transfer"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-bank-transfer" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bankomat"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-bankomat" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-braintree"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-braintree" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-carta-si"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-carta-si" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cash-on-delivery"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-cash-on-delivery" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cash-on-pickup"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-cash-on-pickup" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cashcloud"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-cashcloud" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cb"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-cb" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-clickandbuy"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-clickandbuy" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-dankort"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-dankort" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-direct-debit"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-direct-debit" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ec"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-ec" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-elo"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-elo" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-elo-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-elo-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-eps"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-eps" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-eth"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-eth" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-facture"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-facture" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-fattura"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-fattura" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-flattr"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-flattr" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-giropay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-giropay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-gratipay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-gratipay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-gratipay-sign"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-gratipay-sign" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-hipercard"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-hipercard" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ideal"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-ideal" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-invoice"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-invoice" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-klarna"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-klarna" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mercado-pago"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-mercado-pago" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mercado-pago-sign"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-mercado-pago-sign" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-moip"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-moip" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-multibanco"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-multibanco" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ogone"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-ogone" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-pagseguro"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-pagseguro" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paybox"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paybox" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paylife"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paylife" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paymill"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paymill" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paysafecard"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-paysafecard" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-payshop"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-payshop" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-payu"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-payu" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-postepay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-postepay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-quick"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-quick" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-rechnung"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-rechnung" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ripple"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-ripple" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sage"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-sage" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sepa"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-sepa" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-six"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-six" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-skrill"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-skrill" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-skrill-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-skrill-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sodexo"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-sodexo" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sofort"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-sofort" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-truste"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-truste" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-unionpay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-unionpay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-venmo"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-venmo" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-verified-by-visa"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-verified-by-visa" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-verisign"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-verisign" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-wechat-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-wechat-pay" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-western-union"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-western-union" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-western-union-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-western-union-alt" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-wirecard"></i>
                                                        <input class="badge-input" type="checkbox" id="prod-wirecard" ng-click="select_badge(badge, 'prod')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column one-third">
                                            <label>Sort badges</label>
                                            <div class="scrolling-container scrolling-container--badges-order" id="js-sortable-badges-container">
                                                <!-- ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">visa</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">mastercard-alt</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">american-express</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">paypal</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column one-third">
                                            <label>Badges color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--prod-trust-badges')" ng-style="{'background-color': data.prod_trust_badges_color}" style="background-color: rgb(33, 43, 53);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--prod-trust-badges" ng-model="data.prod_trust_badges_color" class="ng-pristine ng-untouched ng-valid" value="#212B35">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(0, 128, 255);"><i style="left: 37.7358px; top: 79.2157px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 41.6667px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(33, 43, 53);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                        <div class="column two-thirds input-check">
                                            <label for="prod-trust-msg-font-size__input">Message font size</label>
                                            <div class="input-group">
                                                <input type="number" max="100" min="1" id="prod-trust-msg-font-size__input" ng-model="data.prod_trust_font_size" class="ng-pristine ng-untouched ng-valid ng-valid-min ng-valid-max" value="14">
                                                <span class="append">px</span>
                                                <p class="invalid-feedback invalid-feedback--max">
                                                    Value must be less than or equal to 100. Please enter a smaller number.
                                                </p>
                                                <p class="invalid-feedback invalid-feedback--min">
                                                    Value must be greater than or equal to 1. Please enter a larger number.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.prod_trust_advanced_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h4>Advanced Trust Badge</h4>
                                        <!-- ngIf: data.prod_trust_advanced_is_locked --><p ng-if="data.prod_trust_advanced_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('prod_trust_advanced')">Upgrade</a>
                                        </p><!-- end ngIf: data.prod_trust_advanced_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="prod-trust-advanced-switch" ng-click="update_setting('prod_trust_advanced')" checked="checked">
                                            <label class="onoffswitch-label" for="prod-trust-advanced-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fadein" ng-show="data.prod_trust_advanced_is_on" style="">
                                    <div class="row">
                                        <label for="prod-trust-advanced" class="badge-upload">
                                            <span class="badge__upload" ng-class="{'disabled': data.prod_trust_advanced_uploading || data.prod_trust_advanced_quantity_limit_left === 0}">
                                                <i class="fa fa-upload"></i>
                                                <span class="badge__upload__notes">Click to upload your <strong>.jpg .png or .gif</strong> file here</span>
                                                <span class="badge__upload__notes">one file, max <strong>3 MB</strong>, smaller file loads faster</span>
                                                <span class="badge__upload__notes">
                                                    Maximum <span ng-bind="data.prod_trust_advanced_quantity_limit" class="ng-binding">6</span> uploaded badges,
                                                    <strong><span ng-bind="data.prod_trust_advanced_quantity_limit_left" class="ng-binding">6</span> badges left</strong>
                                                </span>
                                                <span class="badge__upload__notes">Drag badges to reorder</span>
                                                <input type="file" data-filenames-key="prod_trust_advanced_badge_filenames" data-edit-status-key="prod_trust_advanced_badges_on_edit" data-image-source-key="prod_trust_advanced_uploading_badge_file_source" data-uploading-status-key="prod_trust_advanced_uploading" custom-on-file-change="upload_image" id="prod-trust-advanced" name="prod-trust-advanced" ng-disabled="data.prod_trust_advanced_uploading || data.prod_trust_advanced_quantity_limit_left === 0" accept="image/png, image/jpeg, image/gif">
                                            </span>
                                            <!-- ngIf: data.prod_trust_advanced_quantity_limit_left === 0 -->
                                        </label>
            
                                        <div class="scrolling-container scrolling-container--badges htusb-ui-prod-badges">
                                            <div class="row">
                                                <div class="prod-advanced-badges" id="js-sortable-prod-advanced-badges-container">
                                                    <!-- ngIf: data.prod_trust_advanced_uploading -->
                                                    <!-- ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-yellow-free-shipping.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-yellow-free-shipping.svg" name="img/usb/badges-yellow-free-shipping.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-yellow-free-shipping.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-yellow-free-shipping.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')" checked="checked">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-yellow-money-back-guarantee-30days.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-yellow-money-back-guarantee-30days.svg" name="img/usb/badges-yellow-money-back-guarantee-30days.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-yellow-money-back-guarantee-30days.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-yellow-money-back-guarantee-30days.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')" checked="checked">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-yellow-best-choice.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-yellow-best-choice.svg" name="img/usb/badges-yellow-best-choice.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-yellow-best-choice.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-yellow-best-choice.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')" checked="checked">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-yellow-free-return.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-yellow-free-return.svg" name="img/usb/badges-yellow-free-return.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-yellow-free-return.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-yellow-free-return.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-red-free-shipping.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-red-free-shipping.svg" name="img/usb/badges-red-free-shipping.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-red-free-shipping.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-red-free-shipping.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-red-free-return.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-red-free-return.svg" name="img/usb/badges-red-free-return.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-red-free-return.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-red-free-return.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-red-money-back-guarantee.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-red-money-back-guarantee.svg" name="img/usb/badges-red-money-back-guarantee.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-red-money-back-guarantee.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-red-money-back-guarantee.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-prod-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.prod_trust_advanced_badge_filenames" ng-class="{
                                                                    'prod-advanced-badges-disable': data.prod_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.prod_trust_advanced_badges_on_edit,
                                                                    'prod-advanced-badges-on-edit': data.prod_trust_advanced_badges_on_edit,
                                                                }" for="prod-img/usb/badges-red-money-back-guarantee-30days.svg" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-red-money-back-guarantee-30days.svg" name="img/usb/badges-red-money-back-guarantee-30days.svg" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-red-money-back-guarantee-30days.svg">
                                                        <input type="checkbox" class="badge-input fadein" id="prod-img/usb/badges-red-money-back-guarantee-30days.svg" ng-show="!data.prod_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('prod_trust_advanced_badges_selected', 'js-sortable-prod-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'prod_trust_advanced_badge_filenames', 'prod_trust_advanced_badges_selected')" ng-show="data.prod_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.prod_trust_advanced_badge_filenames -->
                                                </div>
                                            </div>
                                        </div>
            
                                        <a class="prod-advanced-badges__edit-button fadein" ng-click="toggle_edit_status('prod_trust_advanced_badges')">
                                            <i class="icon icon-edit"></i>
                                            <span ng-show="!data.prod_trust_advanced_badges_on_edit">Edit my uploaded badges</span>
                                            <span ng-show="data.prod_trust_advanced_badges_on_edit" class="ng-hide">Done</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
            
                            <div class="card">
                                <div class="row">
                                    <div class="column twelve">
                                        <h5>Aligns to</h5>
                                        <select ng-model="data.prod_global_alignment_selected" class="ng-pristine ng-untouched ng-valid">
                                            <!-- ngRepeat: item in data.alignment_items --><option value="left" ng-repeat="item in data.alignment_items" class="ng-binding ng-scope" selected="selected">
                                                Left
                                            </option><!-- end ngRepeat: item in data.alignment_items --><option value="center" ng-repeat="item in data.alignment_items" class="ng-binding ng-scope">
                                                Center
                                            </option><!-- end ngRepeat: item in data.alignment_items --><option value="right" ng-repeat="item in data.alignment_items" class="ng-binding ng-scope">
                                                Right
                                            </option><!-- end ngRepeat: item in data.alignment_items -->
                                        </select>
                                        <em>It is better to choose the same alignment as the add-to-cart button on your product page.</em>
                                    </div>
                                </div>
                                <div class="row section--v-spacious">
                                    <div class="column twelve">
                                        <h5>Home page - Having a single product store?</h5>
                                        <div class="row">
                                            <label ng-class="{'feature-lock': data.prod_home_is_locked}" class="feature-lock">
                                                <input type="checkbox" name="prod_home" id="prod-home" ng-model="data.prod_home_is_on" class="ng-pristine ng-untouched ng-valid">
                                                Also apply to featured products on the home page
                                                <a target="_blank" href="https://hextom-usb.myshopify.com/" style="margin-left: 8px">
                                                    Demo <i class="icon-offsite"></i>
                                                </a>
                                                <!-- ngIf: data.prod_home_is_locked --><span ng-if="data.prod_home_is_locked" class="ng-scope">
                                                    <i class="icon-locked"></i>
                                                    <a class="upgrade-with-icon" ng-click="goto_pricing_page('prod_home')">Upgrade</a>
                                                </span><!-- end ngIf: data.prod_home_is_locked -->
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></section>
            
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>Cart Page Config</h2>
                            <p>Urge customers to checkout faster on cart page</p>
                        </div>
                    </section>
                    <section id="outer-container-sticky-sidebar--cart" style="position: relative;">
                        <div class="column two-thirds">
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.cart_checkout_button_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h5>Checkout Button Animation</h5>
                                        <!-- ngIf: data.cart_checkout_button_is_locked --><p ng-if="data.cart_checkout_button_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('cart_checkout_button')">Upgrade</a>
                                        </p><!-- end ngIf: data.cart_checkout_button_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="cart-checkout-button-switch" ng-click="update_setting('cart_checkout_button')">
                                            <label class="onoffswitch-label" for="cart-checkout-button-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.cart_checkout_button_is_on -->
                            </div>
            
                            <div class="row card" ng-class="{'feature-lock': data.cart_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h5>Checkout Booster</h5>
                                        <!-- ngIf: data.cart_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="cart-switch" ng-click="update_setting('cart_countdown')">
                                            <label class="onoffswitch-label" for="cart-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.cart_is_on -->
                            </div>
                            <!-- ngIf: data.cart_is_on -->
                        </div>
                        <div class="column one-third container-sticky-sidebar--cart" id="container-sticky-sidebar--cart">
                            <div id="inner-container-sticky-sidebar--cart" class="inner-container-sticky-sidebar--cart" style="position: relative;">
                                <div class="card fadein ng-hide" ng-show="
                                         data.cart_is_on
                                         || data.cart_checkout_button_is_on
                                     ">
                                    <h5>Cart Page Preview</h5>
                                    <p>It will be showing near cart items on your cart page.</p>
                                    <div class="htusb-ui-cart-boost fadein">
                                        <div class="htusb-ui-cart-preview__row">
                                            <div class="htusb-ui-cart-preview__product-image">
                                                <img class="htusb-ui-fake-image" src="Ultimate%20Sales%20Boost%20Configuration_files/product-image-placeholder01.png">
                                            </div>
                                            <div class="htusb-ui-cart-preview__product-details">
                                                <div class="htusb-ui-cart-preview__product-details__top">
                                                    <div class="htusb-ui-cart-preview__product-name">
                                                        <div class="htusb-ui-fake-line"></div>
                                                        <div class="htusb-ui-fake-line"></div>
                                                    </div>
                                                    <div class="htusb-ui-cart-preview__product-price">
                                                        <div class="htusb-ui-fake-price">$$</div>
                                                    </div>
                                                </div>
                                                <div class="fadein htusb-ui-cart-countdown htusb-animate ng-hide" ng-show="
                                                         data.cart_is_on
                                                         &amp;&amp; data.cart_type_selected === 'timer'
                                                    ">
                                                    <div class="htusb-ui-cart-countdown__inner">
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_countdown_msg_before | renderHTML">Reserve for</div>
                                                        <div class="htusb-ui-inline htusb-ui-cart-countdown__clock ng-binding" id="container-cart-countdown" ng-bind="data.cart_countdown_fixed_minutes"><div class="htusb-ui-countdown__grid">14</div><div class="htusb-ui-countdown__divider">:</div><div class="htusb-ui-countdown__grid">43</div></div>
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_countdown_msg_after | renderHTML"></div>
                                                    </div>
                                                </div>
                                                <div class="fadein htusb-ui-cart-text htusb-animate ng-hide" ng-show="
                                                        data.cart_is_on
                                                        &amp;&amp; data.cart_type_selected === 'text'
                                                     ">
                                                    <div class="htusb-ui-cart-text__msg ng-binding" ng-bind-html="data.cart_text_msg | renderHTML">Checkout now to get this deal</div>
                                                </div>
                                                <div class="fadein htusb-ui-cart-bogo htusb-animate ng-hide" ng-show="
                                                        data.cart_is_on
                                                        &amp;&amp; data.cart_type_selected === 'bogo'
                                                     ">
                                                    <!-- ngIf: data.prod_bogo_buy_msg_quantity !== '1' --><div class="htusb-ui-cart-bogo__msg htusb-ui-cart-bogo__msg1 fadein ng-scope" ng-if="data.prod_bogo_buy_msg_quantity !== '1'">
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg1_item_x_before | renderHTML">Buy</div>
                                                        <div class="htusb-ui-inline ng-binding">1</div>
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg1_item_x_after | renderHTML">more t-shirt</div>
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg1_item_y_before | renderHTML">get</div>
                                                        <div class="htusb-ui-inline fadein">
                                                            <a class="htusb-ui-cart-bogo__item-y-link ng-binding" ng-href="" ng-bind-html="data.cart_bogo_msg1_item_y | renderHTML" target="_blank">a hat</a>
                                                        </div>
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg1_item_y_after | renderHTML">50% off</div>
                                                    </div><!-- end ngIf: data.prod_bogo_buy_msg_quantity !== '1' -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="htusb-ui-cart-preview__row">
                                            <div class="htusb-ui-cart-preview__product-image">
                                                <img class="htusb-ui-fake-image" src="Ultimate%20Sales%20Boost%20Configuration_files/product-image-placeholder02.png">
                                            </div>
                                            <div class="htusb-ui-cart-preview__product-details">
                                                <div class="htusb-ui-cart-preview__product-details__top">
                                                    <div class="htusb-ui-cart-preview__product-name">
                                                        <div class="htusb-ui-fake-line"></div>
                                                        <div class="htusb-ui-fake-line"></div>
                                                    </div>
                                                    <div class="htusb-ui-cart-preview__product-price">
                                                        <div class="htusb-ui-fake-price">$$</div>
                                                    </div>
                                                </div>
                                                <div class="fadein htusb-ui-cart-bogo htusb-animate ng-hide" ng-show="
                                                        data.cart_is_on
                                                        &amp;&amp; data.cart_type_selected === 'bogo'
                                                     ">
                                                    <div class="htusb-ui-cart-bogo__msg htusb-ui-cart-bogo__msg2">
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg2_item_y_before | renderHTML">Add</div>
                                                        <div class="htusb-ui-inline fadein">
                                                            <a class="htusb-ui-cart-bogo__item-y-link ng-binding" ng-href="" ng-bind-html="data.cart_bogo_msg2_item_y | renderHTML" target="_blank">a hat</a>
                                                        </div>
                                                        <div class="htusb-ui-inline ng-binding" ng-bind-html="data.cart_bogo_msg2_item_y_after | renderHTML">to cart and get it 50% off now</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ngIf: data.cart_type_selected === 'bogo' -->
                                        <!-- ngIf: data.cart_checkout_button_is_on -->
                                    </div>
                                </div>
                                <div id="js-cart-boost-styles"><style>.htusb-ui-cart-boost{color:#212B35;font-family:inherit;}.htusb-ui-cart-countdown{display:block;margin:0.5em 0;width:auto;overflow:hidden;color:inherit;font-family:inherit;}.htusb-ui-cart-countdown__inner{display:inline-block;line-height:1.5em;padding:0.5em 1em;font-family:inherit;font-size:12px;color:#FFFFFF;background:#FF6162;background:-moz-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-webkit-gradient(left top, right top, color-stop(0%, #FF6162), color-stop(100%, #FF9766));background:-webkit-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-o-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-ms-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:linear-gradient(to right, #FF6162 0%, #FF9766 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#FF6162", endColorstr="#FF9766", GradientType=1 );}.htusb-ui-cart-countdown__clock{display:inline;margin:0;padding:0;color:inherit;font-family:inherit;}.htusb-ui-cart-countdown__clock .htusb-ui-countdown__grid{display:inline;color:inherit;font-family:inherit;}.htusb-ui-cart-countdown__clock .htusb-ui-countdown__grid div{display:inline;color:inherit;font-family:inherit;}.htusb-ui-cart-countdown__clock .htusb-ui-countdown__divider{display:inline;color:inherit;font-family:inherit;}.htusb-ui-cart-text{display:block;width:auto;overflow:hidden;color:inherit;font-family:inherit;}.htusb-ui-cart-text__msg{display:inline-block;line-height:1.5em;padding:0.5em 1em;font-family:inherit;font-size:12px;color:#FFFFFF;background:#FF6162;background:-moz-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-webkit-gradient(left top, right top, color-stop(0%, #FF6162), color-stop(100%, #FF9766));background:-webkit-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-o-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-ms-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:linear-gradient(to right, #FF6162 0%, #FF9766 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#FF6162", endColorstr="#FF9766", GradientType=1 );}.htusb-ui-cart-bogo{display:block;width:auto;overflow:hidden;color:inherit;font-family:inherit;}.htusb-ui-cart-bogo__msg{display:inline-block;line-height:1.5em;padding:0.5em 1em;font-family:inherit;font-size:12px;color:#FFFFFF;background:#FF6162;background:-moz-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-webkit-gradient(left top, right top, color-stop(0%, #FF6162), color-stop(100%, #FF9766));background:-webkit-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-o-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:-ms-linear-gradient(left, #FF6162 0%, #FF9766 100%);background:linear-gradient(to right, #FF6162 0%, #FF9766 100%);filter:progid:DXImageTransform.Microsoft.gradient( startColorstr="#FF6162", endColorstr="#FF9766", GradientType=1 );}.htusb-ui-cart-bogo__msg1 .htusb-ui-cart-bogo__item-y-link, .htusb-ui-cart-bogo__msg1 .htusb-ui-cart-bogo__item-y-link:hover{color:#FFFFFF;border-bottom:1px solid;}.htusb-ui-cart-bogo__msg2 .htusb-ui-cart-bogo__item-y-link, .htusb-ui-cart-bogo__msg2 .htusb-ui-cart-bogo__item-y-link:hover{color:#FFFFFF;border-bottom:1px solid;}.ht-btn-animation{-webkit-animation-duration:4s; animation-duration:4s;-webkit-animation-fill-mode:both; animation-fill-mode:both;-webkit-animation-delay:1s; animation-delay:1s;-webkit-animation-iteration-count:infinite; animation-iteration-count:infinite;}</style></div>
                            <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div>
                        </div>
                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></section>
            
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>Checkout Page Config <small class="tag--shopify-plus">Shopify Plus</small></h2>
                            <p>Build trust and motivate customers to complete orders.
                                This is a feature for Shopify Plus plans only.
                                <a target="_blank" href="https://support.hextom.com/hc/en-us/articles/360022009153-Checkout-page-campaign-Why-this-feature-is-Shopify-Plus-only-">Why?</a>
                                <i class="icon-offsite"></i>
                            </p>
                        </div>
                    </section>
                    <section id="outer-container-sticky-sidebar--checkout" style="position: relative;">
                        <div class="column two-thirds">
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.checkout_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h5>Checkout Booster</h5>
                                        <!-- ngIf: data.checkout_is_locked --><p ng-if="data.checkout_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('checkout')">Upgrade</a>
                                        </p><!-- end ngIf: data.checkout_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="checkout-switch" ng-click="update_setting('checkout')">
                                            <label class="onoffswitch-label" for="checkout-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- ngIf: data.checkout_is_on -->
                            </div>
                            <!-- ngIf: data.checkout_is_on -->
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.checkout_trust_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h5>Trust Badge</h5>
                                        <!-- ngIf: data.checkout_trust_is_locked --><p ng-if="data.checkout_trust_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('checkout_trust')">Upgrade</a>
                                        </p><!-- end ngIf: data.checkout_trust_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="checkout-trust-switch" ng-click="update_setting('checkout_trust')">
                                            <label class="onoffswitch-label" for="checkout-trust-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fadein ng-hide" ng-show="data.checkout_trust_is_on">
                                    <div class="row">
                                        <div class="column two-thirds">
                                            <label>Select badges</label>
                                            <div class="scrolling-container scrolling-container--badges htusb-ui-prod-badges">
                                                <div class="row">
                                                    <!-- ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-visa" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-debit"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-visa-debit" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-electron"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-visa-electron" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-visa-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-visa-pay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-mastercard" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-mastercard-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mastercard-securecode"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-mastercard-securecode" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-american-express"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-american-express" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-american-express-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-american-express-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paypal"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paypal" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paypal-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paypal-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-interac"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-interac" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-interac-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-interac-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-shopify"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-shopify" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-apple-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-apple-pay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-google-wallet"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-google-wallet" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-google-wallet-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-google-wallet-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-square"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-square" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-stripe"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-stripe" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-amazon-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-amazon-pay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-amazon-pay-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-amazon-pay-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bitcoin"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-bitcoin" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-jcb"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-jcb" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-discover"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-discover" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-diners"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-diners" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-diners-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-diners-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-alipay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-alipay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bancontact-mister-cash"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-bancontact-mister-cash" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bank-transfer"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-bank-transfer" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-bankomat"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-bankomat" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-braintree"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-braintree" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-carta-si"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-carta-si" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cash-on-delivery"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-cash-on-delivery" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cash-on-pickup"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-cash-on-pickup" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cashcloud"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-cashcloud" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-cb"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-cb" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-clickandbuy"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-clickandbuy" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-dankort"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-dankort" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-direct-debit"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-direct-debit" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ec"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-ec" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-elo"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-elo" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-elo-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-elo-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-eps"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-eps" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-eth"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-eth" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-facture"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-facture" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-fattura"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-fattura" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-flattr"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-flattr" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-giropay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-giropay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-gratipay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-gratipay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-gratipay-sign"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-gratipay-sign" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-hipercard"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-hipercard" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ideal"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-ideal" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-invoice"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-invoice" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-klarna"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-klarna" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mercado-pago"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-mercado-pago" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-mercado-pago-sign"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-mercado-pago-sign" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-moip"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-moip" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-multibanco"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-multibanco" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ogone"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-ogone" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-pagseguro"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-pagseguro" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paybox"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paybox" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paylife"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paylife" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paymill"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paymill" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-paysafecard"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-paysafecard" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-payshop"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-payshop" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-payu"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-payu" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-postepay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-postepay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-quick"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-quick" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-rechnung"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-rechnung" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-ripple"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-ripple" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sage"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-sage" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sepa"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-sepa" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-six"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-six" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-skrill"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-skrill" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-skrill-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-skrill-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sodexo"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-sodexo" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-sofort"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-sofort" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-truste"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-truste" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-unionpay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-unionpay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-venmo"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-venmo" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-verified-by-visa"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-verified-by-visa" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-verisign"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-verisign" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-wechat-pay"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-wechat-pay" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-western-union"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-western-union" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-western-union-alt"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-western-union-alt" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges --><label class="badge ng-scope" ng-repeat="badge in data.prod_trust_badges">
                                                        <i class="badge-icon pf pf-wirecard"></i>
                                                        <input class="badge-input" type="checkbox" id="checkout-wirecard" ng-click="select_badge(badge, 'checkout')">
                                                    </label><!-- end ngRepeat: badge in data.prod_trust_badges -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="column one-third">
                                            <label>Sort badges</label>
                                            <div class="scrolling-container scrolling-container--badges-order" id="js-sortable-badges-container">
                                                <!-- ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">visa</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">mastercard-alt</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">american-express</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected --><div class="badges-order__item ng-scope" ng-repeat="badge_name in data.prod_trust_badges_selected">
                                                    <i class="fa fa-arrows" aria-hidden="true"></i>
                                                    <span class="js-sortable-badges-item ng-binding">paypal</span>
                                                </div><!-- end ngRepeat: badge_name in data.prod_trust_badges_selected -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="column one-third">
                                            <label>Badges color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--checkout-trust-badges')" ng-style="{'background-color': data.checkout_trust_badges_color}" style="background-color: rgb(33, 43, 53);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--checkout-trust-badges" ng-model="data.checkout_trust_badges_color" class="ng-pristine ng-untouched ng-valid" value="#212B35">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(0, 128, 255);"><i style="left: 37.7358px; top: 79.2157px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 41.6667px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(33, 43, 53);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                        <div class="column two-thirds">
                                            <label for="checkout-trust-alignment">Aligns to</label>
                                            <select id="checkout-trust-alignment" ng-model="data.checkout_trust_alignment_selected" class="ng-pristine ng-untouched ng-valid">
                                                <!-- ngRepeat: item in data.alignment_items --><option value="left" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_alignment_selected === item.id" class="ng-binding ng-scope">
                                                    Left
                                                </option><!-- end ngRepeat: item in data.alignment_items --><option value="center" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_alignment_selected === item.id" class="ng-binding ng-scope">
                                                    Center
                                                </option><!-- end ngRepeat: item in data.alignment_items --><option value="right" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_alignment_selected === item.id" class="ng-binding ng-scope" selected="selected">
                                                    Right
                                                </option><!-- end ngRepeat: item in data.alignment_items -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
            
                            <div class="row card feature-lock" ng-class="{'feature-lock': data.checkout_trust_advanced_is_locked}">
                                <div class="row">
                                    <div class="column two-thirds">
                                        <h5>Advanced Trust Badge</h5>
                                        <!-- ngIf: data.checkout_trust_advanced_is_locked --><p ng-if="data.checkout_trust_advanced_is_locked" class="ng-scope">
                                            This feature is not available in your current plan.
                                            <a ng-click="goto_pricing_page('checkout_trust_advanced')">Upgrade</a>
                                        </p><!-- end ngIf: data.checkout_trust_advanced_is_locked -->
                                    </div>
                                    <div class="column one-third">
                                        <div class="onoffswitch">
                                            <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="checkout-trust-advanced-switch" ng-click="update_setting('checkout_trust_advanced')">
                                            <label class="onoffswitch-label" for="checkout-trust-advanced-switch">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="fadein ng-hide" ng-show="data.checkout_trust_advanced_is_on">
                                    <div class="row section--v-spacious">
                                        <label for="checkout-trust-advanced" class="badge-upload">
                                            <span class="badge__upload" ng-class="{'disabled': data.checkout_trust_advanced_uploading || data.checkout_trust_advanced_quantity_limit_left === 0}">
                                                <i class="fa fa-upload"></i>
                                                <span class="badge__upload__notes">Click to upload your <strong>.jpg .png or .gif</strong> file here</span>
                                                <span class="badge__upload__notes">one file, max <strong>3 MB</strong>, smaller file loads faster</span>
                                                <span class="badge__upload__notes">
                                                    Maximum <span ng-bind="data.checkout_trust_advanced_quantity_limit" class="ng-binding">5</span> uploaded badges,
                                                    <strong><span ng-bind="data.checkout_trust_advanced_quantity_limit_left" class="ng-binding">5</span> badges left</strong>
                                                </span>
                                                <span class="badge__upload__notes">Drag badges to reorder</span>
                                                <input type="file" data-filenames-key="checkout_trust_advanced_badge_filenames" data-edit-status-key="checkout_trust_advanced_badges_on_edit" data-image-source-key="checkout_trust_advanced_uploading_badge_file_source" data-uploading-status-key="checkout_trust_advanced_uploading" custom-on-file-change="upload_image" id="checkout-trust-advanced" name="checkout-trust-advanced" ng-disabled="data.checkout_trust_advanced_uploading || data.checkout_trust_advanced_quantity_limit_left === 0" accept="image/png, image/jpeg, image/gif">
                                            </span>
                                            <!-- ngIf: data.checkout_trust_advanced_quantity_limit_left === 0 -->
                                        </label>
            
                                        <div class="scrolling-container scrolling-container--badges htusb-ui-checkout-badges">
                                            <div class="row">
                                                <div class="checkout-advanced-badges" id="js-sortable-checkout-advanced-badges-container">
                                                    <!-- ngIf: data.checkout_trust_advanced_uploading -->
                                                    <!-- ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-checkout-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.checkout_trust_advanced_badge_filenames" ng-class="{
                                                                    'checkout-advanced-badges-disable': data.checkout_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.checkout_trust_advanced_badges_on_edit,
                                                                    'checkout-advanced-badges-on-edit': data.checkout_trust_advanced_badges_on_edit,
                                                                }" for="checkout-img/usb/badges-payments-NAEU01.png" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-payments-NAEU01.png" name="img/usb/badges-payments-NAEU01.png" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-payments-NAEU01.png">
                                                        <input type="checkbox" class="badge-input fadein" id="checkout-img/usb/badges-payments-NAEU01.png" ng-show="!data.checkout_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('checkout_trust_advanced_badges_selected', 'js-sortable-checkout-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'checkout_trust_advanced_badge_filenames', 'checkout_trust_advanced_badges_selected')" ng-show="data.checkout_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-checkout-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.checkout_trust_advanced_badge_filenames" ng-class="{
                                                                    'checkout-advanced-badges-disable': data.checkout_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.checkout_trust_advanced_badges_on_edit,
                                                                    'checkout-advanced-badges-on-edit': data.checkout_trust_advanced_badges_on_edit,
                                                                }" for="checkout-img/usb/badges-payments-Asia01.png" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-payments-Asia01.png" name="img/usb/badges-payments-Asia01.png" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-payments-Asia01.png">
                                                        <input type="checkbox" class="badge-input fadein" id="checkout-img/usb/badges-payments-Asia01.png" ng-show="!data.checkout_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('checkout_trust_advanced_badges_selected', 'js-sortable-checkout-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'checkout_trust_advanced_badge_filenames', 'checkout_trust_advanced_badges_selected')" ng-show="data.checkout_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-checkout-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.checkout_trust_advanced_badge_filenames" ng-class="{
                                                                    'checkout-advanced-badges-disable': data.checkout_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.checkout_trust_advanced_badges_on_edit,
                                                                    'checkout-advanced-badges-on-edit': data.checkout_trust_advanced_badges_on_edit,
                                                                }" for="checkout-img/usb/badges-payments-NAEU03.png" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-payments-NAEU03.png" name="img/usb/badges-payments-NAEU03.png" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-payments-NAEU03.png">
                                                        <input type="checkbox" class="badge-input fadein" id="checkout-img/usb/badges-payments-NAEU03.png" ng-show="!data.checkout_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('checkout_trust_advanced_badges_selected', 'js-sortable-checkout-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'checkout_trust_advanced_badge_filenames', 'checkout_trust_advanced_badges_selected')" ng-show="data.checkout_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-checkout-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.checkout_trust_advanced_badge_filenames" ng-class="{
                                                                    'checkout-advanced-badges-disable': data.checkout_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.checkout_trust_advanced_badges_on_edit,
                                                                    'checkout-advanced-badges-on-edit': data.checkout_trust_advanced_badges_on_edit,
                                                                }" for="checkout-img/usb/badges-payments-Asia02.png" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-payments-Asia02.png" name="img/usb/badges-payments-Asia02.png" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-payments-Asia02.png">
                                                        <input type="checkbox" class="badge-input fadein" id="checkout-img/usb/badges-payments-Asia02.png" ng-show="!data.checkout_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('checkout_trust_advanced_badges_selected', 'js-sortable-checkout-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'checkout_trust_advanced_badge_filenames', 'checkout_trust_advanced_badges_selected')" ng-show="data.checkout_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames --><label class="badge fadein js-sortable-checkout-advanced-badges-item ng-scope" ng-repeat="badge_filename in data.checkout_trust_advanced_badge_filenames" ng-class="{
                                                                    'checkout-advanced-badges-disable': data.checkout_trust_advanced_badges_on_edit &amp;&amp; is_default_image(badge_filename),
                                                                    'js-sortable-advanced-badges-ignore-elements': data.checkout_trust_advanced_badges_on_edit,
                                                                    'checkout-advanced-badges-on-edit': data.checkout_trust_advanced_badges_on_edit,
                                                                }" for="checkout-img/usb/badges-payments-NAEU02.png" style="">
                                                        <img ng-src="https://s3.amazonaws.com/lastsecondcoupon/img/usb/badges-payments-NAEU02.png" name="img/usb/badges-payments-NAEU02.png" class="badge-image" src="Ultimate%20Sales%20Boost%20Configuration_files/badges-payments-NAEU02.png">
                                                        <input type="checkbox" class="badge-input fadein" id="checkout-img/usb/badges-payments-NAEU02.png" ng-show="!data.checkout_trust_advanced_badges_on_edit || is_default_image(badge_filename)" ng-click="update_selected_images('checkout_trust_advanced_badges_selected', 'js-sortable-checkout-advanced-badges-item')">
                                                        <a class="badge-remove fadein ng-hide" ng-click="remove_image(badge_filename, 'checkout_trust_advanced_badge_filenames', 'checkout_trust_advanced_badges_selected')" ng-show="data.checkout_trust_advanced_badges_on_edit &amp;&amp; !is_default_image(badge_filename)">
                                                            <i class="icon-trash"></i>
                                                            remove
                                                        </a>
                                                    </label><!-- end ngRepeat: badge_filename in data.checkout_trust_advanced_badge_filenames -->
                                                </div>
                                            </div>
                                        </div>
            
                                        <a class="prod-advanced-badges__edit-button fadein" ng-click="toggle_edit_status('checkout_trust_advanced_badges')">
                                            <i class="icon icon-edit"></i>
                                            <span ng-show="!data.checkout_trust_advanced_badges_on_edit">Edit my uploaded badges</span>
                                            <span ng-show="data.checkout_trust_advanced_badges_on_edit" class="ng-hide">Done</span>
                                        </a>
                                    </div>
                                    <div class="row section--v-spacious">
                                        <div class="column">
                                            <label for="checkout-trust-advanced-alignment">Aligns to</label>
                                            <select id="checkout-trust-advanced-alignment" ng-model="data.checkout_trust_advanced_alignment_selected" class="ng-pristine ng-untouched ng-valid">
                                                <!-- ngRepeat: item in data.alignment_items --><option value="left" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_advanced_alignment_selected === item.id" class="ng-binding ng-scope">
                                                    Left
                                                </option><!-- end ngRepeat: item in data.alignment_items --><option value="center" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_advanced_alignment_selected === item.id" class="ng-binding ng-scope">
                                                    Center
                                                </option><!-- end ngRepeat: item in data.alignment_items --><option value="right" ng-repeat="item in data.alignment_items" ng-selected="data.checkout_trust_advanced_alignment_selected === item.id" class="ng-binding ng-scope" selected="selected">
                                                    Right
                                                </option><!-- end ngRepeat: item in data.alignment_items -->
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column one-third container-sticky-sidebar--checkout" id="container-sticky-sidebar--checkout">
                            <div id="inner-container-sticky-sidebar--checkout" class="inner-container-sticky-sidebar--checkout" style="position: relative;">
                                <div class="card fadein ng-hide" ng-show="data.checkout_is_on
                                     || data.checkout_trust_is_on
                                     || data.checkout_trust_advanced_is_on
                                    ">
                                    <h5>Checkout Page Preview</h5>
                                    <div class="htusb-ui-checkout-boost">
                                        <div class="htusb-ui-fake-breadcrumbs">
                                            <div class="htusb-ui-fake-line"></div>
                                            <div class="htusb-ui-fake-arrow">&gt;</div>
                                            <div class="htusb-ui-fake-line"></div>
                                            <div class="htusb-ui-fake-arrow">&gt;</div>
                                            <div class="htusb-ui-fake-line"></div>
                                        </div>
                                        <div class="fadein htusb-ui-checkout-countdown htusb-animate ng-hide" ng-show="
                                                 data.checkout_is_on
                                                 &amp;&amp; data.checkout_type_selected === 'timer'
                                            ">
                                            <div class="htusb-ui-checkout-countdown">
                                                <div class="htusb-ui-inline ng-binding" ng-bind-html="data.checkout_countdown_emoji | renderHTML">🎁</div>
                                                <div class="htusb-ui-inline ng-binding" ng-bind-html="data.checkout_countdown_msg_before | renderHTML">Checkout within</div>
                                                <div class="htusb-ui-inline htusb-ui-checkout-countdown__clock ng-binding" id="container-checkout-countdown" ng-bind="data.checkout_countdown_fixed_minutes">5</div>
                                                <div class="htusb-ui-inline ng-binding" ng-bind-html="data.checkout_countdown_msg_after | renderHTML">so we don't run out of stock</div>
                                            </div>
                                        </div>
                                        <div class="fadein htusb-ui-checkout-text htusb-animate ng-hide" ng-show="
                                                data.checkout_is_on
                                                &amp;&amp; data.checkout_type_selected === 'text'
                                             ">
                                            <div class="htusb-ui-checkout-text">
                                                <div class="htusb-ui-inline ng-binding" ng-bind-html="data.checkout_text_emoji | renderHTML">🎁</div>
                                                <div class="htusb-ui-inline ng-binding" ng-bind-html="data.checkout_text | renderHTML">Checkout now so we don't run out of stock</div>
                                            </div>
                                        </div>
            
            
            
                                        <div class="htusb-ui-section htusb-ui-fake-form-inline">
                                            <input type="text" class="htusb-ui-fake-input" disabled="disabled" value="First Name">
                                            <input type="text" class="htusb-ui-fake-input" disabled="disabled" value="Last Name">
                                        </div>
            
            
            
            
            
            
                                        <div class="htusb-ui-section">
                                            <input type="text" class="htusb-ui-fake-input" disabled="disabled" value="Address">
                                        </div>
                                        <div class="htusb-ui-section">
                                            <input type="text" class="htusb-ui-fake-input" disabled="disabled" value="City">
                                        </div>
                                        <div class="htusb-ui-section htusb-ui-fake-form-inline">
                                            <div class="htusb-ui-fake-select">
                                                <select disabled="disabled">
                                                    <option value="Country" selected="selected">Country</option>
                                                </select>
                                            </div>
                                            <div class="htusb-ui-fake-select">
                                                <select disabled="disabled">
                                                    <option value="Country" selected="selected">State</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="htusb-ui-section">
                                            <input type="text" class="htusb-ui-fake-input" disabled="disabled" value="Postal Code">
                                        </div>
                                        <div class="htusb-ui-fake-button fadein htusb-animate">
                                            Continue to shipping method
                                        </div>
                                        <!-- ngIf: data.checkout_trust_is_on -->
                                        <!-- ngIf: data.checkout_trust_advanced_is_on -->
                                    </div>
                                    <div class="row section--v-spacious-lvl2">
                                        <h5 class="divider-top">Required integration for checkout boost</h5>
                                        <p>Please copy &amp; paste the HTML code below at the end of the <code>checkout.liquid</code> file</p>
                                        <pre id="checkout-integration">&lt;script type="text/javascript" src="https://s3.amazonaws.com/lastsecondcoupon/js/ultimatesalesboost.js?shop=usualfitness.myshopify.com"&gt;&lt;/script&gt;
                                        </pre>
                                        <button id="copy-button-checkout-integration" class="secondary" ng-click="copy_codes('checkout-integration', $event)">
                                            Copy Codes
                                        </button>
                                    </div>
                                </div>
                            <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></div>
                            <div id="js-checkout-boost-styles"><style>.htusb-ui-checkout-boost{font-family:inherit;}.htusb-ui-checkout-countdown{font-family:inherit;font-size:16px;color:#212B35;text-align:left;line-height:1.5;font-family:inherit;}.htusb-ui-checkout-countdown__clock{font-weight:600;}.htusb-ui-checkout-text{font-size:16px;color:#212B35;text-align:left;line-height:1.5;font-family:inherit;}.htusb-ui-checkout-trust__badges{text-align:right;margin:12px 0;color:inherit;font-family:inherit;}.htusb-ui-checkout-trust__badge{display:inline-block;margin:5px;color:inherit;font-family:inherit;}.htusb-ui-checkout-trust__badge .badge-icon{font-size:30px;}.htusb-ui-checkout-trust__badge .badge-icon{color:#212B35;}.badge-icon{display:block;font-size:3.5rem;}.htusb-ui-checkout-trust-advanced__badges{text-align:right;margin:12px 0;color:inherit;font-family:inherit;display:flex;flex-wrap:wrap;justify-content:flex-end;align-items: center;}.htusb-ui-checkout-trust-advanced__badge{margin:6px 3px;max-width:100%;max-height:72px;}</style></div>
                        </div>
                    <div class="resize-sensor" style="position: absolute; inset: 0px; overflow: hidden; z-index: -1; visibility: hidden;"><div class="resize-sensor-expand" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div></div><div class="resize-sensor-shrink" style="position: absolute; left: 0; top: 0; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;"><div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div></div></div></section>
            
                    <section class="ht-config-header">
                        <div class="row">
                            <h2>Overall Customization</h2>
                        </div>
                    </section>
                    <section>
                        <div class="column two-thirds">
                            <div class="row">
                                <div class="card">
                                    <div class="row">
                                        <h5>Applies to all pages above</h5>
                                        <p>The styles here will be applied to all Ultimate Sales Boost on all pages above.</p>
                                    </div>
                                    <div class="row button-list">
                                        <label>Font</label>
                                        <!-- ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope button-selected" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: inherit;">
                                            <!-- ngIf: font === 'inherit' --><span ng-if="font === 'inherit'" class="ng-scope">My website default font</span><!-- end ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Lato;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Lato</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Roboto;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Roboto</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Josefin Sans;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Josefin Sans</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Lobster;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Lobster</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Open Sans;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Open Sans</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Dancing Script;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Dancing Script</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Bangers;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Bangers</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Playfair Display;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Playfair Display</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Chewy;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Chewy</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Quicksand;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Quicksand</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Righteous;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Righteous</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Mystery Quest;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Mystery Quest</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Montserrat;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Montserrat</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Oswald;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Oswald</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Unica One;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Unica One</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Muli;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Muli</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Raleway;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Raleway</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Carter One;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Carter One</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Varela Round;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Varela Round</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items --><button ng-repeat="font in data.font_items" ng-style="{'font-family': font}" class="secondary ng-scope" ng-class="{'button-selected': data.font_selected === font}" ng-click="select_font(font)" style="font-family: Julius Sans One;">
                                            <!-- ngIf: font === 'inherit' -->
                                            <!-- ngIf: font !== 'inherit' --><span ng-if="font !== 'inherit'" class="ng-binding ng-scope">Julius Sans One</span><!-- end ngIf: font !== 'inherit' -->
                                        </button><!-- end ngRepeat: font in data.font_items -->
                                    </div>
                                    <div class="row">
                                        <div class="column one-third">
                                            <label>Text color</label>
                                            <div class="side-elements color-picker">
                                                <div class="color-picker__preview" ng-click="trigger_color_picker('#color-picker--global-text')" ng-style="{'background-color': data.global_text_color}" style="background-color: rgb(33, 43, 53);"></div>
                                                <input type="text" colorpicker="" colorpicker-parent="true" id="color-picker--global-text" ng-model="data.global_text_color" class="ng-pristine ng-untouched ng-valid" value="#212B35">
                                            <div class="colorpicker dropdown ng-scope colorpicker-position-bottom"><div class="dropdown-menu"><colorpicker-saturation style="background-color: rgb(0, 128, 255);"><i style="left: 37.7358px; top: 79.2157px;"></i></colorpicker-saturation><colorpicker-hue><i style="top: 41.6667px;"></i></colorpicker-hue><colorpicker-alpha><i style="top: 0px;"></i></colorpicker-alpha><colorpicker-preview style="background-color: rgb(33, 43, 53);"></colorpicker-preview><button type="button" class="close close-colorpicker">×</button></div></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
            
                    <section class="ht-config-header" id="targeting-setting">
                        <div class="row">
                            <h2>Targeting</h2>
                        </div>
                    </section>
                    <section class="ht-config-targeting" id="outer-container-sticky-sidebar--targeting">
                        <div class="column two-thirds section-products" id="section-products">
                            <div class="row card" id="targeting-products">
                                <h5>
                                    <i class="fa fa-shopping-basket"></i>
                                    Applies to Products:
                                </h5>
                                <div class="form-control--radio">
                                    <label>
                                        <input type="radio" name="product-group" ng-model="data.selected_products_type" value="all" class="ng-pristine ng-untouched ng-valid" checked="checked">
                                        All products
                                    </label>
            
                                    <label ng-class="{'feature-lock': data.selected_products_tag_is_locked}" class="feature-lock">
                                        <input type="radio" name="product-group" ng-model="data.selected_products_type" value="tag" class="ng-pristine ng-untouched ng-valid">
                                        Target products based on product tag
                                        <!-- ngIf: data.selected_products_tag_is_locked --><span ng-if="data.selected_products_tag_is_locked" class="ng-scope">
                                            <i class="icon-locked"></i>
                                            <a class="upgrade-with-icon" ng-click="goto_pricing_page('targeting_products_tag')">Upgrade</a>
                                        </span><!-- end ngIf: data.selected_products_tag_is_locked -->
                                    </label>
                                    <!-- ngIf: data.selected_products_type === 'tag' -->
            
                                    <label>
                                        <input type="radio" name="product-group" ng-model="data.selected_products_type" value="partial" class="ng-pristine ng-untouched ng-valid">
                                        Target products based on manual selection
                                    </label>
                                    <!-- ngIf: data.selected_products_type === 'partial' -->
                                </div>
                            </div>
                        
                        </div>
                        
                    </section>
                    <section class="context-bar">
                        <div class="context-bar__contents">
                            <p class="context-bar__message"></p>
                            <div class="context-bar__actions-group">
                                <button class="secondary" ng-click="on_cancel()">Cancel</button>
                                <button class="primary save-button" ng-click="on_save()">Save</button>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            
            
            <!--<footer>
                <article class="help">
                    <p>Built by Hextom Inc.<br>
                        <a href="#" target="_blank">Term of Service</a>,
                        <a href="#" target="_blank">Privacy Policy</a>,
                        <a href="#" target="_blank">Cookie Policy</a>
                    </p>
                </article>
            </footer>
        -->
        </div>
	</body>
</html>
<?php
	}
	
}
?>

	
