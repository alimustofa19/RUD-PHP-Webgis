<?php 
require_once 'koneksi.php';
?>
<html>

<head>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="mapstyle.css">
    <TITLE>Peta Lahan Sawah Kabupaten Tegal</TITLE>
    <script language="Javascript" src="http://localhost:8888/mapviewer/fsmc/jslib/oraclemaps.js"></script>
    <script language=javascript>
        var mapview;

        function showMap() {
            var baseURL = "http://localhost:8888/mapviewer";
            var mapCenterLon = 295837.279;
            var mapCenterLat = 9220717.466;
            var mapZoom = 3;
            var mpoint = MVSdoGeometry.createPoint(mapCenterLon, mapCenterLat, 32749);
            mapview = new MVMapView(document.getElementById("map"), baseURL);
            mapview.addMapTileLayer(new MVMapTileLayer("mvdemo1.TEGAL"));
            mapview.setCenter(mpoint);
            mapview.setZoomLevel(mapZoom);
            addThemeBasedFOI();
            mapview.addNavigationPanel("WEST");
            mapview.display();
        }

        function addThemeBasedFOI() {
            var themebasedfoi1 = new MVThemeBasedFOI('themebasedfoi1', 'mvdemo.TEGAL1');
            themebasedfoi1.enableAutoWholeImage(true);
            mapview.addThemeBasedFOI(themebasedfoi1);

            var themebasedfoi2 = new MVThemeBasedFOI('themebasedfoi2', 'mvdemo.tegal2');
            mapview.addThemeBasedFOI(themebasedfoi2);
        }

        function setVisible(item) {
            var themebasedfoi = mapview.getThemeBasedFOI(item.value);
            themebasedfoi.setVisible(!themebasedfoi.isVisible());
        }
    </script>
</head>

<body onload=javascript:showMap();>
<header>
        <nav class="navbar">
            <div class="logo">
                <h4>Kabupaten Tegal</h4>
            </div>
            <ul>
                <li><a href="home-out.php">Home</a></li>
                <li><a href="data.php">Data Lahan Sawah</a></li>
                <li><a href="#" class="active">Peta Lahan Sawah</a></li>
            </ul>
        </nav>
        </header>
    <div class="judul">
    </br>
    <h3>Peta Tematik Luas Lahan Sawah Kabupaten Tegal </h3>
    </div>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <INPUT TYPE="checkbox" value="themebasedfoi1" onclick="setVisible(this)" checked/>&nbsp;Luas Wilayah
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<INPUT TYPE="checkbox" value="themebasedfoi2" onclick="setVisible(this)" checked/>&nbsp;Luas Lahan Sawah</br>
    </br>
        <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Keterangan :</h4>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna Merah Lahan Sawah Cukup Luas</br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna Kuning Lahan Sawah Luas </br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Warna Hijau Lahan Sawah Sangat Luas</p>
    <div id="map" style="left:0px; top:0px; width:100%; height:100%"></div>
</body>

</html>