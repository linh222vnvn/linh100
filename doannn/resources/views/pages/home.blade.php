@extends('layout')
@section('content')
<div class="row">
  <div class="col-lg-12">
    <section class="panel">
      <header class="panel-heading">
        <h1 class='panel-title'>

        </h1>
         <select id="area"></select>
          <select id="wards"></select>

        <!-- <img class="legendCk" src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=QHBD:thuadat_phumy" /> -->

        <!-- <img class="legendCk" src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&LAYER=QHBD:hanhchinh_xa" /> -->
      </header>
      <div class="panel-body">
        <div id="map" class="map"></div>
        <div id="popup" class="ol-popup">
          <a href="#" id="popup-closer" class="ol-popup-closer"></a>
          <div id="popup-content"></div>
        </div>

      </div>



    </section>

  </div>
</div>
@endsection