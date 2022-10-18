<?php 
include_once("../includes/header.php"); 
include_once("../includes/backend/functions.php"); 
$communities = getJsonData($json_db_url.'communities.json');
?>
<?php 
    usort($communities['communities'], function($a, $b) { 
        return strcmp($a["address"]['county'], $b["address"]['county']);
    });
    $counties = array();
    foreach ($communities['communities'] as $key => $community) {
        if ($community['status'] != 'sold' && $community['status'] != 'soldLabel' && $community['formId'] != 0) {
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
<section class="nav-space">
    <div class="py-3 z-depth-1">
        <h2 class="m-0 font-weight-bold text-center">Contact Us</h2>
    </div>
    <div class="container py-3 max-md-width-760">
        <div>
            <p>When you register with Craftmark Homes you will be the first to receive information as it becomes
                available about our communities. We will be sending you valuable information available only to our
                Internet registrants, including notifications of special incentives, homes available for immediate
                availability and releases in our new townhome & single family communities.</p>
        </div>
        <div class="contact-address mt-4 d-flex">
            <div class="mr-3">
                <img src="/images/icon/map-pin-blue.svg" alt="">
            </div>
            <div>
                <h5 class="font-weight-bold text-l-blue">Office</h5>
                <a href="" class="text-black">
                    <p>1355 Beverly Rd #330</p>
                    <p>McLean, VA 22101</p>
                </a>
            </div>
        </div>
        <div class="mt-3 mt-sm-4">
            <!-- Form -->
            <div id="success_message" class="text-center">
                <h3>Thank you for your interest. We will review your message and get back to you as soon as possible!
                </h3>
            </div>
            <form id="topBuilderForm" name="topBuilderForm" class="text-center" action="#!">
                <input type="hidden" name="quickDeliAddress" value="">
                <div class="row m-0">
                    <!-- First Name -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="firstName" name="firstName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="First Name*" required>
                    </div>
                    <!-- Last Name -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="lastName" name="lastName"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="Last Name*" required>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6 px-2">
                        <input type="text" id="email" name="email" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Email*" required>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6 px-2">
                        <input type="tel" id="phone" name="phone" class="form-control mb-2 rounded-input z-depth-1"
                            placeholder="Phone*" required>
                    </div>
                    <!-- Zip -->
                    <div class="col-sm-6 px-2">
                        <input type="number" id="zipCode" name="zipCode"
                            class="form-control mb-2 rounded-input z-depth-1" placeholder="Zip Code">
                    </div>
                    <!-- Community -->
                    <div class="col-sm-6 px-2">
                        <select id="community" name="community"
                            class="browser-default custom-select mb-2 form-control rounded-input z-depth-1" required>
                            <option disabled value="" selected hidden>Select Community*</option>
                            <!-- <option disabled value="" selected hidden>Select Community*</option> -->
                            <?php foreach ($counties as $key => $county) { ?>
                            <optgroup label="<?php echo $key; ?>">
                                <?php foreach ($county['communities'] as $key => $comm) { ?>
                                <option value="<?php echo $comm['formId']; ?>"><?php echo $comm['name']; ?></option>
                                <?php } ?>                                
                            </optgroup>
                            <?php } ?>
                            <!-- <optgroup label="Custom Homes">
                                <option value="457">Build on Your Lot</option>
                            </optgroup> -->
                        </select>
                    </div>
                    <!-- For Appointment -->
                    <div class="col-sm-12 px-0">
                        <div class="row m-0">
                            <div class="col-12 px-2">
                                <h5 class="font-weight-normal my-2 text-l-blue text-left pl-3">For Appointment:</h5>
                            </div>
                            <div class="col-sm-6 px-2">
                                <select id="aptDate" name="aptDate" onChange="filterTime();"
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
                                    
                                    
                                    <option <?php if ($day0=="Thu"||$day0=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date0?>"><?php echo $date0 ?></option>
                                    
                                    <option  <?php if ($day1=="Thu"||$day1=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date1; ?>"><?php echo $date1;?></option>
                                    
                                    <option  <?php if ($day2=="Thu"||$day2=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date2; ?>"><?php echo $date2; ?></option>

                                    <option <?php if ($day3=="Thu"||$day3=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date3; ?>"><?php echo $date3; ?></option>

                                    <option  <?php if ($day4=="Thu"||$day4=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date4; ?>"><?php echo $date4; ?></option>

                                    <option  <?php if ($day5=="Thu"||$day5=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date5; ?>"><?php echo $date5; ?></option>

                                    <option  <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date6; ?>"><?php echo $date6; ?></option>

                                    <option <?php if ($day6=="Thu"||$day6=="Fri"){ echo 'style="display:none;"'; } ?> value="<?php echo $date7; ?>"><?php echo $date7; ?></option>
                                        
                                </select>
                            </div>
                            <div class="col-sm-6 px-2">
                                <select id="aptTime" name="aptTime" disabled
                                    class="browser-default custom-select mb-2 form-control rounded-input z-depth-1">

                                    <?php 
                                    // Set up TimeZone, Date, Time Stamp, and Set Current Time. 
                                    date_default_timezone_set('America/New_York'); 
                                    $today = date("m/d/Y");
                                    $timestamp = time(); 
                                    $currentTime = date("H:i:s", $timestamp);  
                                    
                                    // Set up time markers to compare to. 
                                    $elevenAM =  date('H:i:s', mktime(11, 0, 0, null, null, null));
                                    $twelvePM =  date('H:i:s', mktime(12, 0, 0, null, null, null));
                                    $onePM =  date('H:i:s', mktime(13, 0, 0, null, null, null)); 
                                    $twoPM =  date('H:i:s', mktime(14, 0, 0, null, null, null));
                                    $threePM =  date('H:i:s', mktime(15, 0, 0, null, null, null));
                                    $fourPM =  date('H:i:s', mktime(16, 0, 0, null, null, null));
                                    
                                    ?> 

                                    
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
                    <!-- Comments -->
                    <div class="col-sm-12 px-2 form-group">
                        <textarea class="form-control z-depth-1" id="comments" name="comments" rows="3"
                            placeholder="Comments"></textarea>
                    </div>
                    
                    <!-- Sign in button -->
                    <div class="col-sm-12 px-2">
                        <button id="buttonMain"
                            onclick="trackConv(); gtag('event', 'click', { 'event_category': 'General Contact Form' }); fbq('track','Lead');"
                            class="btn bg-l-blue btn-rounded btn-block my-2 waves-effect font-weight-bold text-white button-submit"
                            type="submit" >Submit</button>
                    </div>

                    <!-- Captcha -->
                    <!-- <div class="g-recaptcha" data-sitekey="6LfPwBAcAAAAAGMRQmXe0Gihc_xXFn7b5kUsj07a" data-callback="recaptcha_callback"></div> -->
                </div>
            </form>
            <!-- Form -->
        </div>
    </div>
</section>

<?php include_once(ROOT_PATH."/includes/footer.php"); ?>

<script>
    // Preserve at Westfields Appointment
    // $('#community').on('change', function() {        
    //     if( $('#community').val() == '2873' ) {
    //         $('#aptDate, #aptTime').prop( "disabled", true );
    //         $('#aptDate option, #aptTime option').prop('selected', function() {
    //             return this.defaultSelected;
    //         });
    //     } else {
    //         $('#aptDate, #aptTime').prop( "disabled", false );
    //     }
    // });
</script>

<!--  Filter Available Times from the Current Date Picked --> 
<script>

    function filterTime(){

        //Grab Dates and Time Stamps from PHP to filter the form. 
        var date0 = "<?php echo $date0; ?>";
        var date1 = "<?php echo $date1; ?>";
        var date2 = "<?php echo $date2; ?>";
        var date3 = "<?php echo $date3; ?>";
        var date4 = "<?php echo $date4; ?>";
        var date6 = "<?php echo $date6; ?>";
        var date7 = "<?php echo $date7; ?>";  

        var currentTime = "<?php echo $currentTime; ?>";  
        var elevenAM = "<?php echo $elevenAM; ?>";  
        var twelvePM = "<?php echo $twelvePM; ?>";  
        var onePM = "<?php echo $onePM; ?>"; 
        var twoPM = "<?php echo $twoPM; ?>"; 
        var threePM = "<?php echo $threePM; ?>"; 
        var fourPM = "<?php echo $fourPM; ?>"; 

        var appointmentDate = $("#aptDate").find('option:selected').text();
        
        $("#aptTime").removeAttr("disabled");

        if (appointmentDate == date0 && currentTime >= elevenAM) {
            $('#aptTime option[value="11:00 AM"]').css("display","none");
        } else {
            $('#aptTime option[value="11:00 AM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= twelvePM) {
            $('#aptTime option[value="12:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="12:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= onePM) {
            $('#aptTime option[value="1:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="1:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= twoPM) {
            $('#aptTime option[value="2:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="2:00 PM"]').css("display","block");
        }
        
        if (appointmentDate == date0 && currentTime >= threePM) {
            $('#aptTime option[value="3:00 PM"]').css("display","none");
        } else {
            $('#aptTime option[value="3:00 PM"]').css("display","block");
        }

        if (appointmentDate == date0 && currentTime >= fourPM) { 
            $('#aptTime option[value="4:00 PM"]').css("display","none");

        } else {
            $('#aptTime option[value="4:00 PM"]').css("display","block");
        }
}  

</script>

<!-- 
//======================================================================
// Google reCaptcha V3 - MAIN CONTACT FORM - POSTS TO FORM.PHP - THEN RETURNS RESULT 
//====================================================================== 
-->

<script> 
    //When the form is submitted
    $('#topBuilderForm').submit(function() {
        console.log("Button has been pressed"); 
        // We stop it 
        event.preventDefault();
        var firstName = $('#firstName').val();
        var lastName = $('#lastName').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var zipCode = $('#zipCode').val();
        var community = $('#community').val();
        var aptDate = $('#aptDate').val();
        var aptTime = $('#aptTime').val();
        var comments = $('#comments').val();

        // needs for recaptacha ready
        grecaptcha.ready(function() {
            console.log("Captcha ready.");
            // do request for recaptcha token
            // response is promise with passed token
            grecaptcha.execute('6LfCa4oiAAAAAD7NhTj4lBLG2BLRwlRkS8m5vRM3', {action: 'create_form'}).then(function(token) {
                // add token to form
                console.log("Captcha executed.");
                $('#topBuilderForm').prepend('<input type="hidden" name="g-recaptcha-response" value="' + token + '">');
                $('#topBuilderForm').prepend('<input type="hidden" id ="action" name="action" value="create_form">');
                
                var action = $('#action').val();

                $.post("form.php",{
                    firstName: firstName,
                    lastName: lastName,
                    email: email,
                    phone: phone, 
                    zipCode: zipCode, 
                    community: community, 
                    aptDate: aptDate,
                    aptTime, aptTime, 
                    comments: comments,
                    action: action,  
                    token: token
                }, function(result) {
                            console.log(result);
                            if(result.success) {
                                    alert('Thanks for the form submission!')
                            } else {
                                    alert('This looks like spam!')
                            }
                });
            
            });   
        }); 
    });
</script>




<!-- <script>
    function recaptcha_callback() {
        $('.button-submit').removeAttr('disabled');
    }; 
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script> -->

