<?php
$county_filter = array();

if($communities['communities']) {
    foreach ($communities['communities'] as $key => $f_comm) {
        if($f_comm['address']['county']) {
            array_push($county_filter, $f_comm['address']['county']);
        }
    }
}
if($quickMoveIns) {
    foreach ($quickMoveIns as $key => $f_qmi) {
        if($f_qmi['county']) {
            array_push($county_filter, $f_qmi['county']);
        }
    }
}

$county_filter = array_unique($county_filter);
?>

<div class="bg-grey px-3">
    <div class="d-flex county-filter align-items-center">
        <div class="map-list-btn d-lg-none">
            <a href="#" id="map-list-switch" class="text-blue font-weight-bold" data-toggle="modal">MAP</a>
        </div>
        <div class="flex-grow-1">
            <select id="county-filter" class="mdb-select md-form colorful-select dropdown-primary">
                <option value="any" selected>Any County</option>
                <?php foreach ($county_filter as $key => $option) { ?>
                <option value="<?php echo $option ?>"><?php echo $option ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>
<div class="align-self-center flex-grow-1">
    <ul class="nav md-pills hover-tab filter-tab-menu position-relative">
        <li class="nav-item flex-fill">
            <a class="nav-link openFilterModal" data-toggle="tab" href="#home-type-tab" role="tab">Home
                Type</a>
        </li>
        <!-- <li class="nav-item flex-fill">
            <a class="nav-link openFilterModal" data-toggle="tab" href="#near-tab" role="tab">Near</a>
        </li> -->
        <li class="nav-item flex-fill">
            <a class="nav-link openFilterModal" data-toggle="tab" href="#price-tab" role="tab">Price</a>
        </li>
    </ul>

    <!-- Modal -->
    <div class="modal fade top" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModal"
        aria-hidden="true">
        <div class="modal-dialog m-0 modal-fluid modal-frame modal-top" role="document">
            <div class="modal-content z-depth-0">
                <div class="modal-body">
                    <div class="tab-content p-0">
                        <!--Panel Home Type-->
                        <div class="tab-pane fade" id="home-type-tab" role="tabpanel">
                            <div class="filter-tab-content">
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="homeType" value="any" class="custom-control-input"
                                        id="any-home">
                                    <label class="custom-control-label" for="any-home">Any Home Type</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="homeType" value="singleFamily"
                                        class="custom-control-input" id="single-family">
                                    <label class="custom-control-label" for="single-family">Single Family</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="homeType" value="townhomes"
                                        class="custom-control-input" id="townhomes">
                                    <label class="custom-control-label" for="townhomes">Townhomes</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="homeType" value="condominiums"
                                        class="custom-control-input" id="townhome-condominioms">
                                    <label class="custom-control-label" for="townhome-condominioms">Townhome
                                        Codominioms</label>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel Home Type-->
                        <!--Panel Near-->
                        <div class="tab-pane fade" id="near-tab" role="tabpanel">
                            <div class="filter-tab-content">
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="no-preferences" checked>
                                    <label class="custom-control-label" for="no-preferences">No Preferences</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="near-school">
                                    <label class="custom-control-label" for="near-school">Near School</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="near-parks">
                                    <label class="custom-control-label" for="near-parks">Near Parks</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="near-shopping">
                                    <label class="custom-control-label" for="near-shopping">Near Shopping</label>
                                </div>
                                <!-- Default checked -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="near-water">
                                    <label class="custom-control-label" for="near-water">Near Water</label>
                                </div>
                            </div>
                        </div>
                        <!--/.Panel Near-->
                        <!--Panel Price-->
                        <div class="tab-pane fade" id="price-tab" role="tabpanel">
                            <div class="filter-tab-content">
                                <div id="price-range-label">
                                    <div class="d-flex flex-wrap justify-content-center">
                                        <div class="price">
                                            $<span id="minPrice">300</span>k
                                        </div>
                                        <div>-</div>
                                        <div class="price">
                                            $<span id="maxPrice">999</span>k
                                        </div>
                                    </div>
                                </div>
                                <form id="price-range" class="multi-range-field">
                                    <input id="multi" class="multi-range" type="range" />
                                </form>
                            </div>
                        </div>
                        <!--/.Panel Price-->
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <a href="#" id="filter-btn" class="d-inline-block text-l-blue">Done</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</div>