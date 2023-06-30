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
            if(isset($counties[$community['address']['county']])) {
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
<div class="modal fade" id="contactPopupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold" id="myModalLabel"><strong>Contact
                        Us</strong></h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!--Body-->
            <div class="modal-body mx-4">
                <div id="success_message" class="text-center">
                    <h3>Thank you for your interest. We will review your message and get back to you as soon as
                        possible!</h3>
                </div>
                <form id="topBuilderForm" name="topBuilderForm" class="text-center" action="#!">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="quickDeliAddress" value="">
                    <!-- First Name -->
                    <div class="px-2">
                        <input type="text" id="firstName" name="firstName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="First Name*" required>
                    </div>

                    <!-- Last Name -->
                    <div class="px-2">
                        <input type="text" id="lastName" name="lastName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="Last Name*" required>
                    </div>

                    <!-- Email -->
                    <div class="px-2">
                        <input type="text" id="email" name="email" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Email*" required>
                    </div>
                    <!-- Phone -->
                    <div class="px-2">
                        <input type="text" id="phone" name="phone" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Phone*" required>
                    </div>
                    <!-- Comments -->
                    <div class="col-sm-12 px-2 form-group">
                        <textarea class="form-control z-depth-1" id="comments" name="comments" rows="3"
                            placeholder="Comments"></textarea>
                    </div>
                    <!-- Community -->
                    <div class="col-12 px-2">
                        <h5 class="font-weight-normal mb-2 text-l-blue text-left pl-3">Interested Community:</h5>
                    </div>
                    <div class="col-sm-12 px-2 form-group">
                        <select id="community" name="community"
                            class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">
                            <option disabled selected>Select Community*</option>
                            <?php foreach ($counties as $key => $county) { ?>
                            <optgroup label="<?php echo $key; ?>">
                                <?php foreach ($county['communities'] as $key => $comm) { ?>
                                <option value="<?php echo $comm['formId']; ?>"><?php echo $comm['name']; ?></option>
                                <?php } ?>
                            </optgroup>
                            <?php } ?>
                            <optgroup label="Custom Homes">
                                <option value="457">Build on Your Lot</option>
                            </optgroup>
                        </select>
                    </div>
                    
                    <input type="hidden" name="aptDate" value="none">
                    <input type="hidden" name="aptTime" value="none">

                    <!-- Sign in button -->
                    <div class="col-sm-12 px-2">
                        <button id="buttonMain"
                            onclick="gtag('event', 'click', { 'event_category': ''+gtagCategory+'' });"
                            class="btn bg-l-blue btn-rounded btn-block my-2 waves-effect font-weight-bold text-white button-submit"
                            type="submit" disabled>Submit</button>
                    </div>

                    <!-- Captcha -->
                    <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a" data-callback="recaptcha_callback"></div>

                </form>

                <div class="row my-3 d-flex justify-content-center">
                    <!--Facebook-->
                    <a target="_blank" href="https://www.facebook.com/CraftmarkHomes"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-facebook text-black"></i>
                    </a>
                    <!--Twitter-->
                    <a target="_blank" href="https://twitter.com/craftmarkhomes"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-twitter text-black"></i>
                    </a>
                    <!--Instagram-->
                    <a target="_blank" href="https://www.instagram.com/craftmarkhomes/"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-instagram text-black"></i>
                    </a>
                    <!--Youtube-->
                    <a target="_blank" href="https://www.youtube.com/channel/UCdG5p2j56fFMqegeMnDwj5w"
                        class="btn btn-white btn-rounded mr-md-3 z-depth-1a">
                        <i class="fa fa-youtube text-black"></i>
                    </a>
                </div>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- Contact Today Modal -->

<script>
    function recaptcha_callback() {
        $('.button-submit').removeAttr('disabled');
    }; 
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>