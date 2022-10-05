<!-- Google Analytics gtag Category -->
<script>
    var gtagCategory = "<?php echo $gtagCategory; ?>";
</script>
<!-- Contact Today Modal -->
<div class="modal fade" id="contactToday" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content form-elegant">
            <!--Header-->
            <div class="modal-header text-center">
                <h3 class="modal-title w-100 dark-grey-text font-weight-bold my-3" id="myModalLabel"><strong>Contact
                        Today</strong></h3>
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
                    <input type="hidden" name="community" value="<?php echo $formId; ?>">
                    <input type="hidden" name="zipCode" value="Not Provided">
                    <input type="hidden" name="quickDeliAddress" value="<?php echo $qmi_address; ?>">
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
                    <!-- For Appointment -->
                    <?php 
                        //if($comm['url'] != "crown" && $comm['url'] != "preserve-at-westfields" && $communityName != "Preserve at Westfields") { 
                        if($comm['url'] != "retreat-at-westfields" ) { 
                    ?>
                    <div class="px-0">
                        <div class="row m-0">
                            <div class="col-12 px-2">
                                <h5 class="font-weight-normal mb-2 text-l-blue text-left pl-3">For Appointment:</h5>
                            </div>
                            <div class="col-sm-6 px-2">
                                <select id="aptDate" name="aptDate"
                                    class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">
                                    <?php 
                                        // Calculate Dates (Day, Month, Numeric Day)
                                        $date0 = gmdate("D, M d");
                                        $date1 = gmdate("D, M d", time() + 86400);
                                        $date2 = gmdate("D, M d", time() + 86400*2);
                                        $date3 = gmdate("D, M d", time() + 86400*3);
                                        $date4 = gmdate("D, M d", time() + 86400*4);
                                        $date5 = gmdate("D, M d", time() + 86400*5);
                                        $date6 = gmdate("D, M d", time() + 86400*6);
                                        $date7 = gmdate("D, M d", time() + 86400*7);

                                        // Grab the Day from the gmdate String 
                                        $day0 = substr($date0,0,3);
                                        $day1 = substr($date1,0,3);
                                        $day2 = substr($date2,0,3);
                                        $day3 = substr($date3,0,3);
                                        $day4 = substr($date4,0,3);
                                        $day5 = substr($date5,0,3);
                                        $day6 = substr($date6,0,3);
                                        $day7 = substr($date7,0,3);
                                    ?> 

                                    <option value="--">
                                        Select Date
                                    </option>
                                    
                                    
                                    <option class="option-hide" <?php if ($day0=="Thu"||$day0=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date0?>"> 
                                            <?php echo $date0 ?> 
                                    </option>
                                    
                                    <option class="option-hide" <?php if ($day1=="Thu"||$day1=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date1; ?>">
                                        <?php echo $date1;?>
                                    </option>
                                    
                                    <option class="option-hide" <?php if ($day2=="Thu"||$day2=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date2; ?>">
                                        <?php echo $date2; ?>    
                                    </option>

                                    <option class="option-hide" <?php if ($day3=="Thu"||$day3=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date3; ?>">
                                        <?php echo $date3; ?>
                                    </option>

                                    <option class="option-hide" <?php if ($day4=="Thu"||$day4=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date4; ?>">
                                        <?php echo $date4; ?>
                                    </option>

                                    <option class="option-hide" <?php if ($day5=="Thu"||$day5=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date5; ?>">
                                        <?php echo $date5; ?>
                                    </option>

                                    <option class="option-hide" <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date6; ?>">
                                        <?php echo $date6; ?>
                                    </option>

                                    <option class="option-hide" <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date7; ?>">
                                        <?php echo $date7; ?>
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-6 px-2">
                                <select id="aptTime" name="aptTime"
                                    class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">
                                    <option value="--">Select Time</option>
                                    <option value="11:00 AM">11:00 AM</option>
                                    <option value="12:00 PM">12:00 PM</option>
                                    <option value="1:00 PM">1:00 PM</option>
                                    <option value="2:00 PM">2:00 PM</option>
                                    <option value="3:00 PM">3:00 PM</option>
                                    <option value="4:00 PM">4:00 PM</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <?php } else { ?>
                        <input type="hidden" name="aptDate" value="none">
                        <input type="hidden" name="aptTime" value="none">
                    <?php } ?>
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