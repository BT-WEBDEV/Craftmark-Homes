<?php include_once("includes/header.php"); ?>

<section class="main-section">
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="row">
                    <div class="col-6 pr-4 d-flex border-right">
                        <img class="img-fluid" src="images/RetreatAtWestfields_logo.svg" alt="Logo">
                    </div>
                    <div class="col-6 pl-4">
                        <img class="img-fluid" src="images/Craftmark_logo.svg" alt="Logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1 class="text-gold text-center">Join Our VIP List</h1>
                        <p>New Townhomes in Chantilly from the <strong>Upper $600s</strong> - Opening for <strong>Sale This Spring!</strong> Don’t miss a thing! Sign up today and be the first to receive new community details and announcements.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="success_message" class="text-center">
                            <h3>Thank you for your interest. You are now registered for Craftmark's VIP List at The Retreat at Westfields. Stay tuned!</h3>
                        </div>
                        <form id="topBuilderForm" name="topBuilderForm">
                            <input type="hidden" name="quickDeliAddress" value="">
                            <input type="hidden" name="community" value="4969">
                            <input type="hidden" name="zipCode" value="">
                            <input type="hidden" name="comments" value="">
                            <input type="hidden" name="aptDate" value="">
                            <input type="hidden" name="aptTime" value="">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name*" id="firstName" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Last Name*" id="lastName" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email*" id="email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Phone*" id="phone" required>
                            </div>                            
                            <div class="form-group text-center">
                                <button onclick="gtag('event', 'click', { 'event_category': 'Retreat VIP List' });" type="submit" class="btn custom-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <div class="eho">
        <img src="images/eho.svg" alt="EHO">
    </div>
</section>

<?php include_once("includes/footer.php"); ?>