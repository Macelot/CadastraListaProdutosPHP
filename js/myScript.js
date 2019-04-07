
var icons = new Array();
icons["red"] = new google.maps.MarkerImage("mapIcons/marker_red.png",
	// This marker is 20 pixels wide by 34 pixels tall.
    new google.maps.Size(30, 34),
    // The origin for this image is 0,0.
    new google.maps.Point(0,0),
    // The anchor for this image is at 9,34.
    new google.maps.Point(9, 34));
	  
icons["green"] = new google.maps.MarkerImage("mapIcons/marker_green.png",
    // This marker is 25 pixels wide by 3 pixels tall.
    new google.maps.Size(30, 34),
    // The origin for this image is 0,0.
    new google.maps.Point(0,0),
    // The anchor for this image is at 9,34.
    new google.maps.Point(9, 34));

var iconImage = new google.maps.MarkerImage('mapIcons/marker_red.png',
    // This marker is 20 pixels wide by 34 pixels tall.
    new google.maps.Size(50, 34),
    // The origin for this image is 0,0.
    new google.maps.Point(0,0),
    // The anchor for this image is at 9,34.
    new google.maps.Point(9, 34));

var iconShadow = new google.maps.MarkerImage('http://www.google.com/mapfiles/shadow50.png',
    // The shadow image is larger in the horizontal dimension
    // while the position and offset are the same as for the main image.
    new google.maps.Size(37, 34),
    new google.maps.Point(0,0),
    new google.maps.Point(9, 34));

// Shapes define the clickable region of the icon.
// The type defines an HTML &lt;area&gt; element 'poly' which
// traces out a polygon as a series of X,Y points. The final
// coordinate closes the poly by connecting to the first
// coordinate.
var iconShape = {
    coord: [9,0,6,1,4,2,2,4,0,8,0,12,1,14,2,16,5,19,7,23,8,26,9,30,9,34,11,34,11,30,12,26,13,24,14,21,16,18,18,16,20,12,20,8,18,4,16,2,15,1,13,0],
    type: 'poly'};

var iconShape2 = {
    coord: [9,0,6,1,4,2,2,4,0,8,0,12,1,14,2,16,5,19,7,23,8,26,9,30,9,34,11,34,11,30,12,26,13,24,14,21,16,18,18,16,20,12,20,8,18,4,16,2,15,1,13,0],
    type: 'poly'};

function getMarkerImage(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "red"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"%7CFF0000%7C000000",
	// This marker is 20 pixels wide by 34 pixels tall.
	new google.maps.Size(30, 49),
	// The origin for this image is 0,0.
	new google.maps.Point(0,0),
	// The anchor for this image is at 6,20.
	new google.maps.Point(10, 40));

	return icons[iconStr];

}
function getMarkerImageVerde(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "green"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"%7C00FF00%7C000000",
	// This marker is 25 pixels wide by 39 pixels tall.
	new google.maps.Size(71, 71),
	// The origin for this image is 0,0.
	new google.maps.Point(0,0),
	// The anchor for this image is at 6,20.
	new google.maps.Point(9, 34));
	return icons[iconStr];
}
function getMarkerImageVerdeGrande(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "green"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",        
	//icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_bubble_text_small&chld=bb|"+iconStr+"|00FF00|000000",
       icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"%7C00FF00%7C000000",
	// This marker is 25 pixels wide by 39 pixels tall.
	new google.maps.Size(71, 71),
	// The origin for this image is 0,0.
	new google.maps.Point(0,0),
	// The anchor for this image is at 6,20.
	new google.maps.Point(9, 34));
	return icons[iconStr];
}
function getMarkerImageVermelhoGrande(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "red"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_bubble_text_small&chld=bbtr|"+iconStr+"|FF0000|000000",
	// This marker is 20 pixels wide by 34 pixels tall.
	new google.maps.Size(30, 49),
	// The origin for this image is 0,0.
	new google.maps.Point(0,0),
	// The anchor for this image is at 6,20.
	new google.maps.Point(10, 40));

	return icons[iconStr];

}
function getMarkerImageArrastado(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "blue"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"%7CADD8E6%7C000000",
		// This marker is 25 pixels wide by 39 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is at 6,20.
		new google.maps.Point(9, 34)
	);
   return icons[iconStr];

}
function getMarkerImageArrastadoOriginal(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "green"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"%7C00FF00%7C000000",
		// This marker is 25 pixels wide by 39 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is at 6,20.
		new google.maps.Point(9, 34));
	return icons[iconStr];
}
function getMarkerImageArrastadoOriginal2(iconStr) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "red"; 
	}
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"|FF0000|000000",
		// This marker is 25 pixels wide by 39 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is at 6,20.
		new google.maps.Point(9, 34));
	return icons[iconStr];
}

function getMarkerImageArrastadoOriginal2Linhas(iconStr,cor) {
	if ((typeof(iconStr)=="undefined") || (iconStr==null)) { 
		iconStr = "red"; 
	}
        corlimpa=cor.substring(1, 7);
	//icons[iconStr] = new google.maps.MarkerImage("http://www.google.com/mapfiles/marker"+ iconStr +".png",
	//icons[iconStr] = new google.maps.MarkerImage("http://google-maps-icons.googlecode.com/files/red"+ iconStr +".png",
	icons[iconStr] = new google.maps.MarkerImage("http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld="+iconStr+"|"+corlimpa+"|000000",
		// This marker is 25 pixels wide by 39 pixels tall.
		new google.maps.Size(50, 50),
		// The origin for this image is 0,0.
		new google.maps.Point(0,0),
		// The anchor for this image is at 6,20.
		new google.maps.Point(9, 34));
	return icons[iconStr];
}
// Marker sizes are expressed as a Size of X,Y
// where the origin of the image (0,0) is located
// in the top left of the image.

// Origins, anchor positions and coordinates of the marker
// increase in the X direction to the right and in
// the Y direction down.

function createMarkerVerde(map, latlng, label, html, color, quem) {
    //alert("createMarker("+latlng+","+label+","+html+","+color+")");
    //var contentString = '<b>'+label+'</b><br>'+html;
    var contentString = '<b>Local '+label+'</b> ['+quem+'] <br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        shadow: iconShadow,
        icon: getMarkerImageVerde(color),
        shape: iconShape,
        title: label,
        draggable: false,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;

    google.maps.event.addListener(marker, 'click', function(evt) {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
     });
     
     marker.addListener('dragstart', function() {
        console.log("arrastou VERDE");
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
        this.setDraggable(false);
     });
       
    return marker;
}

function createMarkerArrastado(map, latlng, label, html, color) {
	//alert("createMarker("+latlng+","+label+","+html+","+color+")");
    var contentString = '<b>'+label+'</b><br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        shadow: iconShadow,
        icon: getMarkerImageArrastado(color),
        shape: iconShape,
        title: label,
        draggable: false,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
    });
    return marker;
}
function createMarkerOriginal(map, latlng, label, html, color,quem) {
	//alert("createMarker("+latlng+","+label+","+html+","+color+")");
     var contentString = '<b>Local '+label+'</b> ['+quem+'] <br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        shadow: iconShadow,
        icon: getMarkerImageArrastadoOriginal(color),
        shape: iconShape,
        title: label,
        draggable: false,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
    });
    return marker;
}
function createMarkerOriginal2(map, latlng, label, html, color,quem) {
	//alert("createMarker("+latlng+","+label+","+html+","+color+")");
     var contentString = '<b>Local '+label+'</b> ['+quem+'] <br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        shadow: iconShadow,
        icon: getMarkerImageArrastadoOriginal2(color),
        shape: iconShape,
        title: label,
        draggable: false,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
    });
    return marker;
}
function createMarkerOriginal2LINHAS(map, latlng, label, html, color,quem,cor) {
	//alert("createMarker("+latlng+","+label+","+html+","+color+")");
     var contentString = '<b>Local '+label+'</b> ['+quem+'] <br>'+html;
    var marker = new google.maps.Marker({
        position: latlng,
        map: map,
        shadow: iconShadow,
        icon: getMarkerImageArrastadoOriginal2Linhas(color,cor),
        shape: iconShape,
        title: label,
        animation: google.maps.Animation.DROP,
        //animation: google.maps.Animation.BOUNCE,
        draggable: false,
        zIndex: Math.round(latlng.lat()*-100000)<<5
    });
    marker.myname = label;

    google.maps.event.addListener(marker, 'click', function() {
        infowindow.setContent(contentString); 
        infowindow.open(map,marker);
    });
    return marker;
}
function deg2rad (angle) {
	//discuss at: http://locutus.io/php/deg2rad/
	//original by: Enrique Gonzalez
	//improved by: Thomas Grainger (http://graingert.co.uk)
	//example 1: deg2rad(45)
	//returns 1: 0.7853981633974483
	return angle * 0.017453292519943295 // (angle / 180) * Math.PI;
}

function distLatLong(lat1,lon1,lat2,lon2) {
	var R = 6371; // raio da terra
	var Lati = Math.PI/180*(lat2-lat1);  //Graus  - > Radianos
	var Long = Math.PI/180*(lon2-lon1);
	var a =
		Math.sin(Lati/2) * Math.sin(Lati/2) +
		Math.cos(deg2rad(lat1)) * Math.cos(deg2rad(lat2)) *
		Math.sin(Long/2) * Math.sin(Long/2);
	var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
	var d = R * c * 1000; // distância en km
	return d;
}

function addZero(i) {
	if (i < 10) {
		i = "0" + i;
	}
	return i;
}
function transforma_tempos(s){
	horas = Math.floor(s / 3600);
	minutos =  Math.floor((s - (horas * 3600)) / 60);
	segundos =  Math.floor(s % 60);
	formatado = addZero(Math.round(horas))+":"+addZero(minutos)+":"+addZero(segundos);        
    return formatado;
}
function abreLinkPopUp(onde){
	pagina=onde;
	abriu=true;
	window.open(pagina);
}
function addslashes(ch) {   
	ch = ch.toString().replace('Passo d\'Areia','Passo d\\\'Areia'); 
	ch = ch.toString().replace('Passo D\'areia','Passo D\\\'areia'); 
	return ch   
}

	