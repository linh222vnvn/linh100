$(document).ready(function() {
    var container = document.getElementById('popup');
    var content = document.getElementById('popup-content');
    var closer = document.getElementById('popup-closer');
    var body = document.getElementById('modal-content')
    var startPoint = new ol.Feature();
    var destPoint = new ol.Feature();
    var result;
    var format = 'image/png';

    var overlay = new ol.Overlay(({
        element: container,
        autoPan: true,
        autoPanAnimation: {
            duration: 250
        }
    }));

    closer.onclick = function() {
        overlay.setPosition(undefined);
        closer.blur();
        return false;
    };

    var HanhChinhHuyen = new ol.layer.Image({
        source: new ol.source.ImageWMS({
            ratio: 1,
            url: 'http://localhost:8080/geoserver/QHBD/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                STYLES: '',
                LAYERS: 'QHBD:hanhchinh_huyen',
            }
        })
    });

    var HanhChinhXa = new ol.layer.Image({
        source: new ol.source.ImageWMS({
            ratio: 1,
            url: 'http://localhost:8080/geoserver/QHBD/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                STYLES: '',
                LAYERS: 'QHBD:hanhchinh_xa',
            }
        })
    });

    var ThuaDat = new ol.layer.Image({
        source: new ol.source.ImageWMS({
            ratio: 1,
            url: 'http://localhost:8080/geoserver/QHBD/wms',
            params: {
                'FORMAT': format,
                'VERSION': '1.1.1',
                STYLES: '',
                LAYERS: 'QHBD:thuadat_phumy',
                
            }
        })
    });


    var bounds = [106.595402, 10.939735,
    106.71948, 11.111376
    ];

    var map = new ol.Map({
        target: 'map',
        layers: [
        new ol.layer.Tile({
            source: new ol.source.OSM()
        }),
        HanhChinhHuyen,
        HanhChinhXa,
        ThuaDat,

        ],
        overlays: [overlay],
        view: new ol.View({
            projection: new ol.proj.Projection({
                code: 'EPSG:4326',
                units: 'degrees',
                axisOrientation: 'neu'
            }),
            center: [0, 0],
            zoom: 10
        })
    });


    var styles = { 'MultiPolygon': new ol.style.Style({ stroke: new ol.style.Stroke({ color: 'blue', width: 1 }) }) };
    var styleFunction = function(feature) {
        return styles[feature.getGeometry().getType()];
    };
    var vectorLayer = new ol.layer.Vector({
        style: styleFunction,
        source: new ol.source.Vector({
            features: [startPoint, destPoint]
        })
    });
    map.addLayer(vectorLayer);

    map.getView().fit(bounds, map.getSize());

    $("#chkThuaDat").change(function() {
        if ($("#chkThuaDat").is(":checked")) {
            ThuaDat.setVisible(true);
        } else {
            ThuaDat.setVisible(false);
        }
    });

    $("#chkHCHuyen").change(function() {
        if ($("#chkHCHuyen").is(":checked")) {
            HanhChinhHuyen.setVisible(true);
        } else {
            HanhChinhHuyen.setVisible(false);
        }
    });

    $("#chkHCXa").change(function() {
        if ($("#chkHCXa").is(":checked")) {
            HanhChinhXa.setVisible(true);
        } else {
            HanhChinhXa.setVisible(false);
        }
    });

    $("#chkDuong").change(function() {
        if ($("#chkDuong").is(":checked")) {
            Duong.setVisible(true);
        } else {
            Duong.setVisible(false);
        }
    });

    map.on('singleclick', function(evt) {
        var viewResolution = map.getView().getResolution();
        var url = ThuaDat.getSource().getFeatureInfoUrl(
            evt.coordinate, viewResolution, 'EPSG:4326', { 'INFO_FORMAT': 'application/json' });
        if (url) {
            $.ajax({
                type: "POST",
                url: url,
                contentType: "application/json; charset=utf-8",
                dataType: 'json',
                success: function(n) {
                    if (n.features.length > 0) {
                        var content = "<div>";
                        for (var i = 0; i < n.features.length; i++) {
                            var feature = n.features[i];
                            var featureAttr = feature.properties;
                            $('#dientich').val(featureAttr["dientich"]);
                            $('#soto').val(featureAttr["sohieutobando"]);
                            $('#sothua').val(featureAttr["sothututhua"]);
                            $('#kyhieu').val(featureAttr["kyhieumucdich"]);


                            $('#diachied').val(featureAttr["diachi"]);

                            $('#dientiched').val(featureAttr["dientich"]);
                            $('#sotoed').val(featureAttr["sohieutobando"]);
                            $('#kyhieued').val(featureAttr["kyhieumucdich"]);
                            $('#tenkhudated').val(featureAttr["tenkhudat"]);
                            $('#makhudated').val(featureAttr["makhudat"]);
                            $('#sothuaed').val(featureAttr["sothututhua"]);
                            $('#hientranged').val(featureAttr["hientrang"]);
                            $('#maxa').val(featureAttr["maxa"]);
                            $('#maxaed').val(featureAttr["maxa"]);

                            $('#macbed').val(featureAttr["macb"]);
                            $('#xoamakhudat').val(featureAttr["objectid"]);
                            $('#noidungxoa').html("Bạn có chắc muốn xóa số thửa: "+featureAttr["sothututhua"]+" số tờ: "+featureAttr["sohieutobando"]+"?");

                            content += "<div class='spPopup'><b>Số thửa: </b>" + featureAttr["sothututhua"] + "</div>" +
                            "<div class='spPopup'><b>Số tờ bản đồ: </b>" + featureAttr["sohieutobando"] + "</div>" +
                            "<div class='spPopup'><b>Diện tích: </b>" + featureAttr["dientich"] + "</div>" +
                            "<div class='spPopup'><b>Loại đất: </b>" + featureAttr["kyhieumucdich"] + "</div>" +
                            "<div class='spPopup'><b>Tên Đất: </b>" + featureAttr["tenkhudat"] + "</div>" 
                            if (featureAttr["makhudat"] !=null){


                             content += "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal\">Sửa</button>" +
                             "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#deleteModal\">Xóa</button>"
                         }else{


                             content += "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#themModal\">Thêm</button>"
                         }


                     }
                     content += "</div>";
                     $("#popup-content").html(content);
                     overlay.setPosition(evt.coordinate);
                     var vectorSource = new ol.source.Vector({ features: (new ol.format.GeoJSON()).readFeatures(n) });
                     vectorLayer.setSource(vectorSource);
                 }
             }
         });
        }

        if (startPoint.getGeometry() == null) {
            startPoint.setGeometry(new ol.geom.Point(evt.coordinate));
            $("#txtPoint1").val(evt.coordinate);
        } else if (destPoint.getGeometry() == null) {
            destPoint.setGeometry(new ol.geom.Point(evt.coordinate));
            $("#txtPoint2").val(evt.coordinate);
        }

    });


$.ajax({
    url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:hanhchinh_huyen&maxFeatures=50&outputFormat=json&jsoncallback=?",
    contentType: 'application/json',
    success: function() {
            //console.log('Thanh cong!');
        }
    }).done(function(data) {
        loadFeatures(data);
    });

    function loadFeatures(data) {
        const featuresTemp = vectorLayer.getSource().getFeatures();
        featuresTemp.forEach((feature) => {
            vectorLayer.getSource().removeFeature(feature);
        });

        // load vector source
        vectorLayer.getSource().addFeatures(new ol.format.GeoJSON().readFeatures(data));

        const features = vectorLayer.getSource().getFeatures();
        // add select options
        $.each(features, function(i, v) {
            if (v.get('tenhuyen') != null) {
                $('#area').append($('<option></option>').val(i).html(v.get('tenhuyen')));
            }
        });

        $.ajax({
            url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:hanhchinh_xa&CQL_FILTER=mahuyentp='718'&maxFeatures=50&outputFormat=json&jsoncallback=?",
            contentType: 'application/json',
            success: function() {}
        }).done(function(data2) {
            loadFeatures2(data2);
        });

        $('#area').on('change', function() {

            const featuresTemp = vectorLayer.getSource().getFeatures();
            featuresTemp.forEach((feature) => {
                vectorLayer.getSource().removeFeature(feature);
            });

            // load vector source
            vectorLayer.getSource().addFeatures(new ol.format.GeoJSON().readFeatures(data));

            const selected = $('#area').val();
            const extent = vectorLayer.getSource().getFeatures()[selected].getGeometry().getExtent();
            map.getView().fit(extent, map.getSize());
            var tenhuyen = $('#area').find(":selected").text();
            $.ajax({
                url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:hanhchinh_xa&CQL_FILTER=tenhuyen='" + tenhuyen + "'&maxFeatures=50&outputFormat=json&jsoncallback=?",
                contentType: 'application/json',
                success: function() {}
            }).done(function(data2) {
                loadFeatures2(data2);
            });

        });
            ///tu huyen suy ra xa
        // $('#huyen').on('change', function() {
        //     var document=$('#huyen').val();
        //     console.log(document);
        //     $.ajax({
        //        url:"./layphuongxa",
        //        cache:false,
        //        type:"GET",
        //      data:{"_token_":"{{csrf_token()}}","mahuyenxa":document},  /////mahuyenxa tu dat
        //      success: function(response) {
        //         var content="";
        //         for(var i=0;i<response['xa1'].length;i++)
        //         {
        //             content+="<option value='"+response['xa1'][i]['maphuongxa']+"'>"+response['xa1'][i]['tenxa']+"</option>";

        //         }

        //         $('#xa').html(content);


        //     },
        //     error:function(request,status,error){
        //         console.log("sai r"+error);
        //     },
        // })

        // });
    }

    function loadFeatures2(data) {
        const featuresTemp = vectorLayer.getSource().getFeatures();
        featuresTemp.forEach((feature) => {
            vectorLayer.getSource().removeFeature(feature);
        });
        // load vector source
        vectorLayer.getSource().addFeatures(new ol.format.GeoJSON().readFeatures(data));

        const features = vectorLayer.getSource().getFeatures();
        var s2 = "";
        // add select options
        $.each(features, function(i, v) {
            if (v.get('tenxa') != null) {
                s2 += "<option value='" + i + "'>" + v.get('tenxa') + "</option>";
            }

        });
        document.getElementById("wards").innerHTML = s2;

        $('#wards').on('change', function() {
            const featuresTemp = vectorLayer.getSource().getFeatures();
            featuresTemp.forEach((feature) => {
                vectorLayer.getSource().removeFeature(feature);
            });
            var tenhuyen = $('#area').find(":selected").text();
            

            $.ajax({
                url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:hanhchinh_xa&CQL_FILTER=tenhuyen='" + tenhuyen + "'&maxFeatures=50&outputFormat=json&jsoncallback=?",
                contentType: 'application/json',
                success: function() {}
            }).done(function(data3) {
                // load vector source

                vectorLayer.getSource().addFeatures(new ol.format.GeoJSON().readFeatures(data3));
                const selected = $('#wards').val();
                const extent = vectorLayer.getSource().getFeatures()[selected].getGeometry().getExtent();
                //console.log(vectorLayer.getSource().getFeatures()[selected].values_.maphuongxa);
                //console.log(vectorLayer.getSource().getFeatures()[selected].values_.mahuyentp);
                map.getView().fit(extent, map.getSize());
            });
        });
    }

    $("#btnTimthua").click(function() {
        var soto = $("#txSoto").val();
        var sothua = $("#txtSothua").val();
        const featuresTemp = vectorLayer.getSource().getFeatures();
        featuresTemp.forEach((feature) => {
            vectorLayer.getSource().removeFeature(feature);
        });
        var tenhuyen = $('#area').find(":selected").text();
        $.ajax({
            url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:hanhchinh_xa&CQL_FILTER=tenhuyen='" + tenhuyen + "'&maxFeatures=50&outputFormat=json&jsoncallback=?",
            contentType: 'application/json',
            success: function() {}
        }).done(function(data3) {
            console.log(data3);
            vectorLayer.getSource().addFeatures(new ol.format.GeoJSON().readFeatures(data3));
            const selected = $('#wards').val();
            var maxa = vectorLayer.getSource().getFeatures()[selected].values_.maphuongxa;
            $('#maxa').val(maxa);
            $('#maxaed').val(maxa);
            $.ajax({
                url: "http://localhost:8080/geoserver/QHBD/ows?service=WFS&version=1.0.0&request=GetFeature&typeName=QHBD:thuadat_phumy&CQL_FILTER=sohieutobando=" + soto + " AND sothututhua=" + sothua + " AND maxa='" + maxa + "'&maxFeatures=50&outputFormat=json&jsoncallback=?",
                contentType: 'application/json',
                success: function() {}
            }).done(function(data) {
                if (data.features.length > 0) {
                    var content = "<div>";
                    for (var i = 0; i < data.features.length; i++) {
                        var feature = data.features[i];
                        var featureAttr = feature.properties;
                        var coordinate = data.features[i].geometry.coordinates[0][0][0];
                        
                        $('#dientich').val(featureAttr["dientich"]);
                        $('#soto').val(featureAttr["sohieutobando"]);
                        $('#sothua').val(featureAttr["sothututhua"]);
                        $('#kyhieu').val(featureAttr["kyhieumucdich"]);

                        

                        
                        $('#dientiched').val(featureAttr["dientich"]);
                        $('#sotoed').val(featureAttr["sohieutobando"]);
                        $('#kyhieued').val(featureAttr["kyhieumucdich"]);
                        $('#sothuaed').val(featureAttr["sothututhua"]);
                        


                        $('#xoamakhudat').val(featureAttr["objectid"]);
                        $('#noidungxoa').html("Bạn có chắc muốn xóa số thửa: "+featureAttr["sothututhua"]+" số tờ: "+featureAttr["sohieutobando"]+"?");

                        content += "<div class='spPopup'><b>Số thửa: </b>" + featureAttr["sothututhua"] + "</div>" +
                        "<div class='spPopup'><b>Số tờ bản đồ: </b>" + featureAttr["sohieutobando"] + "</div>" +
                        "<div class='spPopup'><b>Diện tích: </b>" + featureAttr["dientich"] + "</div>" +
                        "<div class='spPopup'><b>Loại đất: </b>" + featureAttr["kyhieumucdich"] + "</div>" +
                        
                        "<div class='spPopup'><b>Tên đất: </b> <strong id=\"tendat\"> </strong> </div>"+
                        "<div class='spPopup'><b>Ngày quản lý: </b> <strong id=\"ngayquanly\"> </strong> </div>"+
                        "<div class='spPopup'><b>Hiện trạng: </b> <strong id=\"hientrang\"> </strong> </div>"+
                        "<div class='spPopup'><b>Địa chỉ: </b> <strong id=\"diachi\"> </strong> </div>"+
                        "<div class='spPopup'><b>Mục đích: </b> <strong id=\"mucdich\"> </strong> </div>"+
                        "<div class='spPopup'><b>Họ tên: </b> <strong id=\"canbo\"> </strong> </div>"+

                        "<div id='btntonghop'></div>"



                        
                        var laymakhudat=featureAttr["objectid"];

                        $.ajax({
                           url:"./laymakhudat",
                           cache:false,
                           type:"GET",
                         data:{"_token_":"{{csrf_token()}}","makhudat":laymakhudat},  /////mahuyenxa tu dat
                         success: function(response) {
                                console.log(response);
                            var td=response['dat1'][0]['tenkhudat'];

                            $('#diachied').val(response['dat1'][0]['diachi']);
                            $('#tenkhudated').val(response['dat1'][0]['tenkhudat']);

                            $('#hientranged').val(response['dat1'][0]['hientrang']);
                            $('#macbed').val(response['dat1'][0]['macb']);
                            ///
                            $("#tendat").html(response['dat1'][0]['tenkhudat']);
                            $("#ngayquanly").html(response['dat1'][0]['ngayquanly']);
                            $("#hientrang").html(response['dat1'][0]['hientrang']);
                            $("#diachi").html(response['dat1'][0]['diachi'])

                            //lay du lieu cán bộ với mục đích
                            var mamd=response['dat1'][0]['mamd'];
                            var macb=response['dat1'][0]['macb'];
                            
                            $.ajax({
                                url:"./laymamucdich",
                                cache:false,
                                type:"GET",
                         data:{"_token_":"{{csrf_token()}}","mamucdich":mamd,"macanbo":macb},  /////mahuyenxa tu dat
                         success: function(response) {
                            console.log('vaoham');
                            var td=response['mucdich1'][0]['tenmucdich'];
                            var cb=response['canbo1'][0]['ho'] +' '+ response['canbo1'][0]['ten'];
                            $("#mucdich").html(response['mucdich1'][0]['tenmucdich']);
                            $("#canbo").html(cb);
                            // $("#ngayquanly").html(response['dat1'][0]['ngayquanly']);
                            // $("#hientrang").html(response['dat1'][0]['hientrang']);
                            // $("#diachi").html(response['dat1'][0]['diachi'])
                        },
                        error:function(request,status,error){
                            console.log("sai ham du lieu mucdich"+error);
                        },

                    })

                            //
                        },
                        error:function(request,status,error){
                            console.log("sai r"+error);
                        },

                    })
                        //hàm kiểm tra đất công
                        $.ajax({
                            url:"./kiemtradatcong",
                            cache:false,
                            type:"GET",
                         data:{"_token_":"{{csrf_token()}}","makhudat":laymakhudat},  /////mahuyenxa tu dat
                         success: function(response) {

                            // var td=response['mucdich1'][0]['tenmucdich'];
                            // var cb=response['canbo1'][0]['ho'] +' '+ response['canbo1'][0]['ten'];
                            var tonghop='';
                            if(response.kiemtra==1){

                                tonghop += "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#editModal\">Sửa</button>" + "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#deleteModal\">Xóa</button>";

                            }
                            else
                            {
                                tonghop += "<button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#themModal\">Thêm</button>";

                            }
                            $("#btntonghop").html(tonghop);
                    
                        },
                        error:function(request,status,error){
                            console.log("sai ham du lieu mucdich"+error);
                        },

                    })
                        
                    }
                    content += "</div>";

                    $("#popup-content").html(content);
                    var vectorSource = new ol.source.Vector({ features: (new ol.format.GeoJSON()).readFeatures(data) });
                    vectorLayer.setSource(vectorSource);
                    const extent = vectorLayer.getSource().getFeatures()[0].getGeometry().getExtent();
                    var x = (vectorLayer.getSource().getFeatures()[0].getGeometry().getExtent()[0] + vectorLayer.getSource().getFeatures()[0].getGeometry().getExtent()[2]) / 2;
                    var y = (vectorLayer.getSource().getFeatures()[0].getGeometry().getExtent()[1] + vectorLayer.getSource().getFeatures()[0].getGeometry().getExtent()[3]) / 2;
                    overlay.setPosition([x, y]);
                    map.getView().fit(extent, map.getSize());
                } else {
                    alert("Số tờ hoặc số thửa không hợp lệ!");
                }
            });
});
});

});