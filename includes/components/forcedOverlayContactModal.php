<?php 
    $communities = getJsonData($json_db_url.'communities.json');    
    usort($communities['communities'], function($a, $b) { 
        return strcmp($a["address"]['county'], $b["address"]['county']);
    });
    $counties = array();
    foreach ($communities['communities'] as $key => $community) {
        if ($community['status'] != 'sold' && $community['status'] != 'soldLabel') {
            $comm = array(
                "communities" => array([
                    "name" => $community['name'],
                    "formId" => $community['formId']
                ])
            );
            if($counties[$community['address']['county']]) {
                $new_comm = array(
                    "name" => $community['name'],
                    "formId" => $community['formId']
                );
                array_push($counties[$community['address']['county']]['communities'], $new_comm);
            } else {
                $counties[$community['address']['county']] = $comm;
            }
        }
    }
?>


<!-- Google Analytics gtag Category -->
<script>
    var gtagCategory = "Contact Popup";
</script>

<!-- Contact Popup Modal -->
<div class="modal forcedOverlayContactModal" id="forcedOverlayContactModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <div>
                    <h3 class="modal-title w-100 text-l-blue font-weight-bold" id="myModalLabel"><strong>
                        Contact Us
                    </strong></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi</p>
                </div>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <div id="success_messageV2" class="text-center">
                    <h3>Thank you for your interest. We will review your message and get back to you as soon as
                        possible!</h3>
                </div>
                <form id="forcedOverlayContactModal" name="forcedOverlayContactModal" class="text-center" action="#!">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="quickDeliAddress" value="">
                    <!-- First Name -->
                    <div class="px-2">
                        <input type="text" id="firstName" name="firstName" value="gkaTest"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="First Name*" required>
                    </div>

                    <!-- Last Name -->
                    <div class="px-2">
                        <input type="text" id="lastName" name="lastName" value="gkaTest"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="Last Name*" required>
                    </div>

                    <!-- Email -->
                    <div class="px-2">
                        <input type="text" id="email" name="email" value="gkaTest@test.com" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Email*" required>
                    </div>
                    <!-- Phone -->
                    <div class="px-2">
                        <input type="text" id="phone" name="phone" value="3015558888" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Phone*" required>
                    </div>

                    <input type="hidden" name="aptDate" value="none">
                    <input type="hidden" name="aptTime" value="none">

                    <!-- Sign in button -->
                    <div class="col-sm-12 px-2">
                        <button id="buttonMainV2"
                            onclick="gtag('event', 'click', { 'event_category': ''+gtagCategory+'' });"
                            class="btn bg-l-blue btn-rounded btn-block mt-3 waves-effect font-weight-bold text-white button-submit"
                            type="submit">Submit</button>
                    </div>
                    <a href="" id="forcedOverLayCloseButton" class="mt-1">See Floor Plans</a>

                    <!-- Captcha -->
                    <!-- <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a" data-callback="recaptcha_callback"></div> -->

                </form>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Contact Today Modal -->