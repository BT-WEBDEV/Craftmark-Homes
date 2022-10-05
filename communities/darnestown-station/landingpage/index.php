<?php include_once("includes/header.php"); ?>

<section class="main-section">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 col-lg-6">
                <div class="row">
                    <div class="col-12">
                        <img class="main-logo" class="img-fluid" src="images/darnestown-station-craftmark.svg" alt="Logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h1>Join Our VIP List</h1>
                        <p><strong>Selling this Spring!</strong>  Brand new single family homes at <strong>Darnestown Station</strong> in Gaithersburg, MD, <strong>starting at $1.2M.</strong>  Join our VIP list and receive the latest information on floor plans, pricing, and sales appointments as it becomes available.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div id="success_message" class="text-center">
                            <h3>Thank you for your interest. You are now registered for Craftmark's VIP List at Darnestown Station. Stay tuned!</h3>
                        </div>
                        <form id="topBuilderForm" name="topBuilderForm">
                            <input type="hidden" name="quickDeliAddress" value="">
                            <input type="hidden" name="community" value="4987">
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
                                <button onclick="gtag('event', 'click', { 'event_category': 'DarnsStat VIP List' });" type="submit" class="btn custom-btn">Submit</button>
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
    <div class="background-right">
        <img src="images/right.png" alt="Leaf">
    </div>
    <div class="background-left">
        <img src="images/left.png" alt="Leaf">
    </div>
</section>

<?php include_once("includes/footer.php"); ?>