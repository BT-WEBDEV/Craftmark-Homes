
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
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="0">Interior Unit</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="1">Optional Rec Room</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="2">End Unit</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="3">End Unit/Dropped Basement</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="4">Interior Unit/Dropped Basement</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="5">Dropped Basement/Rec Room</li>

        </ul>
      </div>
    </div>
  </div>
  <!-- First -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="6">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_2_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_2_<?php echo $floorplane_name; ?>">
          First Floor
        </button>
      </h5>
    </div>
    <div id="collapse_2_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="6">Optional Gourmet Kitchen</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="7">End Unit</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Second -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="8">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_3_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_3_<?php echo $floorplane_name; ?>">
          Second Floor
        </button>
      </h5>
    </div>
    <div id="collapse_3_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="8">Interior Unit</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="9">End Unit/Owner's Bath</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="10">Alternate Flex Room/Laundry</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Loft Floor -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="11">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_4_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_4_<?php echo $floorplane_name; ?>">
          Loft Floor
        </button>
      </h5>
    </div>
    <div id="collapse_4_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="11">Terrace Floor</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="12">Terrace Floor/Bathroom</li>
        </ul>
      </div>
    </div>
  </div>
</div>
