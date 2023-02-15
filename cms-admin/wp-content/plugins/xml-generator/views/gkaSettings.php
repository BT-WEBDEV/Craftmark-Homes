
<?php

function gka_settings_page() {
    $gkaXML = new gkaXML();

    if (array_key_exists('submit_generate_xml', $_POST)) {
		$gkaXML->create_zillow_xml();		
    }

    if (array_key_exists('submit_settings_save', $_POST)) {
        gkaDB::insertSettings($_POST);
    }

    $settings = gkaDB::getSettings();
?>
<div class="wrap">
    <div class="container-fluid">
        <h2 class="my-4"><b>Settings</b></h2>
        <div class="row">
            <div class="col-8">
                <form method="post" action="">
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Corporate Builder Number:</label>
                        <input type="text" class="form-control d-block" name="CorporateBuilderNumber" value="<?php echo $settings->CorporateBuilderNumber ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Corporate State:</label>
                        <input type="text" class="form-control d-block" name="CorporateState" value="<?php echo $settings->CorporateState ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Corporate Name:</label>
                        <input type="text" class="form-control d-block" name="CorporateName" value="<?php echo $settings->CorporateName ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Corporate Reporting Email:</label>
                        <input type="email" class="form-control d-block" name="CorporateReportingEmail"
                            value="<?php echo $settings->CorporateReportingEmail ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Builder Number:</label>
                        <input type="text" class="form-control d-block" name="BuilderNumber"
                            value="<?php echo $settings->BuilderNumber ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Brand Name:</label>
                        <input type="text" class="form-control d-block" name="BrandName"
                            value="<?php echo $settings->BrandName ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Brand Logo:</label>
                        <input type="text" class="form-control d-block" name="BrandLogo_Med"
                            value="<?php echo $settings->BrandLogo_Med ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Reporting Name:</label>
                        <input type="text" class="form-control d-block" name="ReportingName"
                            value="<?php echo $settings->ReportingName ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Default Leads Email:</label>
                        <input type="email" class="form-control d-block" name="DefaultLeadsEmail"
                            value="<?php echo $settings->DefaultLeadsEmail ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Builder Website:</label>
                        <input type="url" class="form-control d-block" name="BuilderWebsite"
                            value="<?php echo $settings->BuilderWebsite ?>">
                    </div>
                    <hr class="my-3">

                    <h2><b>Json Data</b></h2>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Community JSON:</label>
                        <input type="url" class="form-control d-block" name="communityJson"
                            value="<?php echo $settings->communityJson ?>">
                    </div>
                    <div class="d-flex d-wrap align-items-center mb-3">
                        <label class="col-4">Floor Plan JSON:</label>
                        <input type="url" class="form-control d-block" name="floorplanJson"
                            value="<?php echo $settings->floorplanJson ?>">
                    </div>

                    <div class="d-flex d-wrap mb-1">
                        <button class="btn btn-primary btn-block" type="submit" name="submit_settings_save">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-3">
    <div class="container-fluid">
        <h2 class="my-4"><b>Generate XML</b></h2>
        <div class="row">
            <div class="col-8">
                <form method="post" action="">
                    <button type="submit" name="submit_generate_xml" class="btn btn-primary btn-block">GENERATE
                        XML</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
}
?>