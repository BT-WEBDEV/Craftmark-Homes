
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
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="0">Elevation 1</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="1">Optional Bedroom and Full Bath</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- First -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="2">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_2_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_2_<?php echo $floorplane_name; ?>">
          First Floor
        </button>
      </h5>
    </div>
    <div id="collapse_2_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="2">Base Floor Plan</li>
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="3">Alternate Floor Plan</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Second -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="4">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_3_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_3_<?php echo $floorplane_name; ?>">
          Second Floor
        </button>
      </h5>
    </div>
    <div id="collapse_3_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="4">Base Floor Plan</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Loft Floor -->
  <div class="card">
    <div class="card-header">
      <h5 class="mb-0" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="5">
        <button class="btn fp-link collapsed" data-toggle="collapse" data-target="#collapse_4_<?php echo $floorplane_name; ?>" aria-expanded="false" aria-controls="collapse_4_<?php echo $floorplane_name; ?>">
          Loft Floor
        </button>
      </h5>
    </div>
    <div id="collapse_4_<?php echo $floorplane_name; ?>" class="collapse" data-parent="#accordion_<?php echo $floorplane_name; ?>">
      <div class="card-body active_wrap">
        <ul class="list-unstyled">
          <li class="active-link" data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="5">Rear Terrace</li>
        </ul>
        <ul class="list-unstyled">
          <li data-target="#fp_slider_<?php echo $floorplane_name; ?>" data-slide-to="6">Front Terrace</li>
        </ul>
      </div>
    </div>
  </div>
</div>
