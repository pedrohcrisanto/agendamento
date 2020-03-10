function include(scriptUrl) {
    document.write('<script src="' + scriptUrl + '"></script>');
}

function isIE() {
    var myNav = navigator.userAgent.toLowerCase();
    return (myNav.indexOf('msie') != -1) ? parseInt(myNav.split('msie')[1]) : false;
};

/* cookie.JS
 ========================================================*/
include('js/jquery.cookie.js');

/* Easing library
 ========================================================*/
include('js/jquery.easing.1.3.js');

/* PointerEvents
 ========================================================*/
;
(function ($) {
    if (isIE() && isIE() < 11) {
        include('js/pointer-events.js');
        $('html').addClass('lt-ie11');
        $(document).ready(function () {
            PointerEventsPolyfill.initialize({});
        });
    }
})(jQuery);

/* Stick up menus
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('js/tmstickup.js');

        $(document).ready(function () {
            $('#stuck_container').TMStickUp({})
        });
    }
})(jQuery);

/* ToTop
 ========================================================*/
;
(function ($) {
    var o = $('html');
    if (o.hasClass('desktop')) {
        include('js/jquery.ui.totop.js');

        $(document).ready(function () {
            $().UItoTop({
                easingType: 'easeOutQuart',
                containerClass: 'toTop fa fa-angle-up'
            });
        });
    }
})(jQuery);

/* EqualHeights
 ========================================================*/
;
(function ($) {
    var o = $('[data-equal-group]');
    if (o.length > 0) {
        include('js/jquery.equalheights.js');
    }
})(jQuery);



/* Copyright Year
 ========================================================*/
;
(function ($) {
    var currentYear = (new Date).getFullYear();
    $(document).ready(function () {
        $("#copyright-year").text((new Date).getFullYear());
    });
})(jQuery);


/* Superfish menus
 ========================================================*/
;
(function ($) {
    include('js/superfish.js');
})(jQuery);

/* Navbar
 ========================================================*/
;
(function ($) {
    include('js/jquery.rd-navbar.js');
})(jQuery);


/* Google Map
 ========================================================*/
;
(function ($) {
    var o = document.getElementById("google-map");
    if (o) {
        include('//maps.google.com/maps/api/js?sensor=false');
        include('js/jquery.rd-google-map.js');

        $(document).ready(function () {
            var o = $('#google-map');
            if (o.length > 0) {
                o.googleMap({
                    styles: [{
                        "featureType": "administrative.locality",
                        "elementType": "all",
                        "stylers": [{"hue": "#2c2e33"}, {"saturation": 7}, {"lightness": 19}, {"visibility": "on"}]
                    }, {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{"hue": "#ffffff"}, {"saturation": -100}, {"lightness": 100}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{"hue": "#ffffff"}, {"saturation": -100}, {"lightness": 100}, {"visibility": "off"}]
                    }, {
                        "featureType": "road",
                        "elementType": "geometry",
                        "stylers": [{"hue": "#bbc0c4"}, {"saturation": -93}, {"lightness": 31}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "road",
                        "elementType": "labels",
                        "stylers": [{"hue": "#bbc0c4"}, {"saturation": -93}, {"lightness": 31}, {"visibility": "on"}]
                    }, {
                        "featureType": "road.arterial",
                        "elementType": "labels",
                        "stylers": [{"hue": "#bbc0c4"}, {"saturation": -93}, {"lightness": -2}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "road.local",
                        "elementType": "geometry",
                        "stylers": [{"hue": "#e9ebed"}, {"saturation": -90}, {"lightness": -8}, {"visibility": "simplified"}]
                    }, {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{"hue": "#e9ebed"}, {"saturation": 10}, {"lightness": 69}, {"visibility": "on"}]
                    }, {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{"hue": "#e9ebed"}, {"saturation": -78}, {"lightness": 67}, {"visibility": "simplified"}]
                    }]
                });
            }
        });
    }
})
(jQuery);

/* WOW
 ========================================================*/
;
(function ($) {
    var o = $('html');

    if ((navigator.userAgent.toLowerCase().indexOf('msie') == -1 ) || (isIE() && isIE() > 9)) {
        if (o.hasClass('desktop')) {
            include('js/wow.js');

            $(document).ready(function () {
                new WOW().init();
            });
        }
    }
})(jQuery);

/* Mailform
 =============================================*/
;
(function ($) {
    include('js/mailform/jquery.rd-mailform.min.c.js');
})(jQuery);

/* Orientation tablet fix
 ========================================================*/
$(function () {
    // IPad/IPhone
    var viewportmeta = document.querySelector && document.querySelector('meta[name="viewport"]'),
        ua = navigator.userAgent,

        gestureStart = function () {
            viewportmeta.content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0";
        },

        scaleFix = function () {
            if (viewportmeta && /iPhone|iPad/.test(ua) && !/Opera Mini/.test(ua)) {
                viewportmeta.content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
                document.addEventListener("gesturestart", gestureStart, false);
            }
        };

    scaleFix();
    // Menu Android
    if (window.orientation != undefined) {
        var regM = /ipod|ipad|iphone/gi,
            result = ua.match(regM);
        if (!result) {
            $('.sf-menus li').each(function () {
                if ($(">ul", this)[0]) {
                    $(">a", this).toggle(
                        function () {
                            return false;
                        },
                        function () {
                            window.location.href = $(this).attr("href");
                        }
                    );
                }
            })
        }
    }
});
var ua = navigator.userAgent.toLocaleLowerCase(),
    regV = /ipod|ipad|iphone/gi,
    result = ua.match(regV),
    userScale = "";
if (!result) {
    userScale = ",user-scalable=0"
}
document.write('<meta name="viewport" content="width=device-width,initial-scale=1.0' + userScale + '">');


/* Camera
 ========================================================*/
;
(function ($) {
    var o = $('#camera');
    if (o.length > 0) {
        if (!(isIE() && (isIE() > 9))) {
            include('js/jquery.mobile.customized.min.js');
        }
        include('js/camera.js');
        $(document).ready(function () {
            o.camera({
                autoAdvance: true,
                height: '40.63414634146341%',
                minHeight: '300px',
                pagination: true,
                thumbnails: false,
                playPause: false,
                hover: false,
                loader: 'none',
                navigation: false,
                navigationHover: false,
                mobileNavHover: false,
                fx: 'simpleFade'
            })
        });
    }
})(jQuery);

/* FancyBox
 ========================================================*/
;
(function ($) {
    var o = $('.thumb');
    if (o.length > 0) {
        include('js/jquery.fancybox.js');
        include('js/jquery.fancybox-media.js');
        include('js/jquery.fancybox-buttons.js');
        $(document).ready(function () {
            o.fancybox();
        });
    }
})(jQuery);

/* Parallax
 =============================================*/
;
(function ($) {
    include('js/jquery.rd-parallax.js');
})(jQuery);


$("input[name='email']").on('blur', function(){
  var email = $(this).val();
  $.get('verified/verified_mail.php?email=' + email,function(data){
    $('#result_mail').html(data);
  });
});

$("input[name='cpf_1']").on('blur', function(){
  var cpf_1 = $(this).val();
  $.get('verified/verified_cpf.php?cpf_1=' + cpf_1,function(data){
    $('#result_cpf').html(data);
  });
});

$("input[name='sus_1']").on('blur', function(){
  var sus_1 = $(this).val();
  $.get('verified/verified_sus.php?sus_1=' + sus_1,function(data){
    $('#result_sus').html(data);
  });
});

$("input[name='data']").on('blur', function(){
  var data = $(this).val();
  $.get('verified/verified_data.php?data=' + data,function(data){
    $('#result_data').html(data);
  });
});

$("input[name='cpf_2']").on('blur', function(){
  var cpf_2 = $(this).val();
  $.get('verified/verified_cpf2.php?cpf_2=' + cpf_2,function(data){
    $('#result_cpf2').html(data);
  });
});

$(function(){
	$('#data').change(function(){
		if( $(this).val() ) {
			$('#horario').hide();
			$('.carregando').show();
			$.getJSON('verified/verified_hora.php?search=',{data: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option value=""></option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].horario_consulta_id + '">Atendimento das ' + j[i].horario +'</option>';
				}	
				$('#horario').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#horario').html('<option value="">– Escolha uma data –</option>');
		}
	});
});