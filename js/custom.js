// Events Slider
$(document).ready(function() {
    $('#nmRecentEvents').lightSlider({
        gallery:true,
        item:1,
        loop:true,
		auto:true,
		addClass:'nm-eve-slider',
		controls:false,
		speed: 1000,
		pause: 3000,
		mode:"slide",
		easing: "linear",
        thumbItem:4,
        slideMargin:0,
		adaptiveHeight:false,
        enableTouch:true,
		enableDrag:true,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#nmRecentEvents .lslide'
            });
        }   
    });  
  });
  
  // Single Slider
$(document).ready(function() {
    $('#nmSingleEvents').lightSlider({
        gallery:false,
        item:5,
        loop:true,
		auto:true,
		addClass:'nm-eve-slider',
		controls:false,
		speed: 1000,
		pause: 3000,
		mode:"slide",
		easing: "linear",
        thumbItem:5,
        slideMargin:0,
		adaptiveHeight:true,
        enableTouch:true,
		enableDrag:true,
        currentPagerPosition:'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#nmSingleEvents .lslide'
            });
        }   
    });  
  });


// Tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

//Wow Js
new WOW().init();

// Back to top
mybutton = document.getElementById("NmBak2Top");

window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

function topFunction() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
}


// First, we need to get reference to canvas element
var fullScreenCanvas = document.getElementById('canvas');

// Take a look at all possible options. You can change what you want right here, but we will skip it for now.
var DEFAULTS = {

	// dom canvas
	canvas: null,

	// settings
	particleCount: 100,
	flareCount: 100,
	motion: 0.05,
	particleColor: '#FDE8E1',
	flareColor: '#757575',
	linkColor: 'white',
	particleSizeBase: 1,
	particleSizeMultiplier: 0.5,
	flareSizeBase: 100,
	flareSizeMultiplier: 100,
	lineWidth: 2,
	linkChance: 100,         // chance per frame of link, higher: smaller chance
	linkLengthMin: 3,        // min linked vertices
	linkLengthMax: 5,        // max linked vertices
	linkOpacity: 0.3,        // number between 0 & 1
	linkFade: 28,            // link fade-out frames
	linkSpeed: 4,            // distance a link travels in 1 frame
	renderParticles: true,
	renderFlares: true,
	renderLinks: false,
	flicker: true,
	flickerSmoothing: 12,    // higher: smoother flicker
	randomMotion: true,
	noiseLength: 1000,
	noiseStrength: 4,
	pointsMultiplier: 1000   // multiplier for delaunay points, since floats too small can mess up the algorithm
};

// These MUST BE configured
DEFAULTS.canvas = fullScreenCanvas;

// This is optional, in case we want to see links in between
DEFAULTS.renderLinks = true;

// And to change big particles color
DEFAULTS.flareColor = 'white';

// We can pack our custom config into separate object. This is minimal implementation.
var config = {
	canvas: canvas
};

// And it will overwrite defaults. Note, DrifterStars2.init(DEFAULTS); will work as well
DrifterStars2.init(config);

// And there is special endpoint for two particular mutations
DrifterStars2.setEnableLinks(true);
DrifterStars2.setFlareColor('#ffffff26');


// Search Table
function tableSearch() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("nmSearchInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}




