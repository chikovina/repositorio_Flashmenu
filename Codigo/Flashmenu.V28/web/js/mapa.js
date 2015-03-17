    var map; 
    var geocoder; 
    var errMSG; 
    var fldAddr; 
    var fldLng; 
    var fldLat; 
    var mapCntr; 
    var geocoder;
    var marker;

    function initialize() { 

        mapDIV = document.getElementById("map"); 
        fldAddr = document.getElementById("address"); 
        errMSG = document.getElementById("err"); 
        fldLng = document.getElementById("long"); 
        fldLat = document.getElementById("lat"); 

        geocoder = new google.maps.Geocoder(); 
        var latlng = new google.maps.LatLng(-33.024527, -71.55234000000002); 
        
        var myOptions = {
             zoom: 10, center: latlng, mapTypeId: google.maps.MapTypeId.ROADMAP
         }; 
        
        mapDIV.innerHTML = ""; 
        map = new google.maps.Map(mapDIV, myOptions); 
    } 

    function marcarDireccion() { 
        fldAddr.value = fldAddr.value.trim(); 
        if (fldAddr.value) { 

            fldLat.value = ""; 
            fldLng.value = "";

            geocoder.geocode({'address': fldAddr.value}, 

                function(results, status) { 
                    if (status == google.maps.GeocoderStatus.OK) { 

                        errMSG.innerHTML = ""; map.setCenter(results[0].geometry.location); 
                        fldLat.value = results[0].geometry.location.lat(); 
                        fldLng.value = results[0].geometry.location.lng(); 
                        var txt = fldAddr.value = results[0].formatted_address;

                        if (txt) {
                            var calleCiudad = txt.split(',', 2); 
                            txt = calleCiudad[0].trim() + "\n" + calleCiudad[1].trim() + "\n"; 
                        }

                        txt += "lat: " + fldLat.value + "\nlng: " + fldLng.value + "\n"; 

                        marker = new google.maps.Marker({ 

                            position: new google.maps.LatLng(results[0].geometry.location.lat(), results[0].geometry.location.lng()), 
                            map: map,
                            draggable:true

                        }); map.setZoom(15); 

                        google.maps.event.addListener(marker, 'dragend', function(evt){
                           fldLat.value= evt.latLng.lat().toFixed(3); 
                           fldLng.value = evt.latLng.lng().toFixed(3);
                           txt += "lat: " + fldLat.value + "\nlng: " + fldLng.value + "\n"; 
                        });


                    } 
                    else { 
                            errMSG.innerHTML = "Error " + status; 
                    } 
                    
                });
        }
    } 
    google.maps.event.addDomListener(window, 'load', initialize); 