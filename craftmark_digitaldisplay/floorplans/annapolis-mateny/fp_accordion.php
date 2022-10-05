
<div id="accordion_<?php echo $floorplane_name; ?>" class="fp_accordion">
  <!-- Ground -->
  <div class="card">
    <div class="card-header active">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="0">
        <button class="btn fp-link" data-toggle="collapse" data-target="#collapse_1_<?php echo $floorplane_name; ?>" aria-expanded="true" aria-controls="collapse_1_<?php echo $floorplane_name; ?>">
          Ground Floor
        </button>
      </h5>
    </div>

    <div id="collapse_1_<?php echo $floorplane_name; ?>" class="collapse show" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="0">Base Floor Plan</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="1">Base Floor Plan End</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="2">Optional Powder Room</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="3">Buried Basement</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="4">English Basement</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- First -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="5">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_2_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_2_<?php echo $floorplane_name; ?>">
          First Floor
        </button>
      </h5>
    </div>
    <div id="collapse_2_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="5">Base Floor Plan</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="6">Buried &amp; English Basement</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="7">Alternate Kitchen &amp; Breakfast</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="8">Optional Gourmet Kitchen</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="9">Optional Gas Fireplace/Deck</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="10">Standard First Floor - End</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Second -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="11">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_3_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_3_<?php echo $floorplane_name; ?>">
          Second Floor
        </button>
      </h5>
    </div>
    <div id="collapse_3_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="11">Base Floor Plan</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="12">Alternate Second Floor</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="13">Optional Loft</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="14">Stacked Washer/Dryer</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="15">Optional Owner's Bath</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="16">Opt Large Shower in Lieu of Shelves</li>
        </ul>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="17">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_4_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_4_<?php echo $floorplane_name; ?>">
          Optional Loft
        </button>
      </h5>
    </div>
    <div id="collapse_4_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="17">Opt Left Bedroom &amp; Bath</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="18 ">End Condition</li>
        </ul>
      </div>
    </div>
  </div>
</div>
