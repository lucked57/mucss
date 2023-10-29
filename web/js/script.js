"use strict";
(function() {
     $('[data-toggle="offcanvas"], .modal-menu').on('click', function () {
    $('.offcanvas-collapse').toggleClass('open');
      $('main').toggleClass('hide');
     // $('.mobile-collapse').toggleClass('hide-collapse');
      $('.modal-menu').fadeToggle(300);
  })
    var userAgent = navigator.userAgent.toLowerCase(),
        initialDate = new Date(),
        $document = $(document),
        $window = $(window),
        $html = $("html"),
        $body = $("body"),
        isRtl = $html.attr("dir") === "rtl",
        isDesktop = $html.hasClass("desktop"),
        isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1,
        isIE = userAgent.indexOf("msie") !== -1 ? parseInt(userAgent.split("msie")[1], 10) : userAgent.indexOf("trident") !== -1 ? 11 : userAgent.indexOf("edge") !== -1 ? 12 : false,
        isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
        windowReady = false,
        isNoviBuilder = false,
        plugins = {
            pointerEvents: isIE < 11 ? "js/pointer-events.min.js" : false,
            bootstrapTooltip: $("[data-toggle='tooltip']"),
            bootstrapModalDialog: $('.modal'),
            rdNavbar: $(".rd-navbar"),
            materialParallax: $(".parallax-container"),
            rdGoogleMaps: $(".rd-google-map"),
            rdMailForm: $(".rd-mailform"),
            rdInputLabel: $(".form-label"),
            regula: $("[data-constraints]"),
            captcha: $('.recaptcha'),
            owl: $(".owl-carousel"),
            swiper: $(".swiper-slider"),
            search: $(".rd-search"),
            searchResults: $('.rd-search-results'),
            mfp: $('[data-lightbox]').not('[data-lightbox="gallery"] [data-lightbox]'),
            mfpGallery: $('[data-lightbox^="gallery"]'),
            wow: $('.wow'),
            isotope: $(".isotope"),
            lightGallery: $("[data-lightgallery='group']"),
            lightGalleryItem: $("[data-lightgallery='item']"),
            lightDynamicGalleryItem: $("[data-lightgallery='dynamic']"),
            radio: $("input[type='radio']"),
            checkbox: $("input[type='checkbox']"),
            customToggle: $("[data-custom-toggle]"),
            counter: $(".counter"),
            progressLinear: $(".progress-linear"),
            circleProgress: $(".progress-bar-circle"),
            dateCountdown: $('.DateCountdown'),
            preloader: $(".preloader"),
            flickrfeed: $(".flickr"),
            selectFilter: $("select"),
            rdAudioPlayer: $(".rd-audio"),
            jPlayerInit: $(".jp-player-init"),
            customParallax: $(".custom-parallax"),
            slick: $('.slick-slider'),
            countDown: $(".countdown"),
            calendar: $(".rd-calendar"),
            bookingCalendar: $(".booking-calendar"),
            bootstrapDateTimePicker: $("[data-time-picker]"),
            facebookWidget: $('#fb-root'),
            twitterfeed: $(".twitter-timeline"),
            stepper: $("input[type='number']"),
            customWaypoints: $('[data-custom-scroll-to]'),
            scroller: $(".scroll-wrap"),
            copyrightYear: $(".copyright-year"),
            videoOverlayWrap: $('.video-overlay-wrap'),
            mailchimp: $('.mailchimp-mailform'),
            campaignMonitor: $('.campaign-mailform'),
        };
    $window.on('load', function() {
        //$('.preloader').addClass('loaded');
        if (plugins.preloader.length && !isNoviBuilder) {
            pageTransition({
                target: document.querySelector('.page'),
                delay: 0,
                duration: 500,
                classIn: 'fadeIn',
                classOut: 'fadeOut',
                classActive: 'animated',
                conditions: function(event, link) {
                    return !/(\#|callto:|tel:|mailto:|:\/\/)/.test(link) && !event.currentTarget.hasAttribute('data-loader');
                },
                onTransitionStart: function(options) {
                    setTimeout(function() {
                        plugins.preloader.removeClass('loaded');
                    }, options.duration * .75);
                },
                onReady: function() {
                    plugins.preloader.addClass('loaded');
                    windowReady = true;
                }
            });
        }
    });
    $(function() {
        var isNoviBuilder = window.xMode;

        function initLightGallery(itemsToInit, addClass) {
            if (!isNoviBuilder) {
                $(itemsToInit).lightGallery({
                    thumbnail: $(itemsToInit).attr("data-lg-thumbnail") !== "false",
                    selector: "[data-lightgallery='item']",
                    autoplay: $(itemsToInit).attr("data-lg-autoplay") === "true",
                    pause: parseInt($(itemsToInit).attr("data-lg-autoplay-delay")) || 5000,
                    addClass: addClass,
                    mode: $(itemsToInit).attr("data-lg-animation") || "lg-slide",
                    loop: $(itemsToInit).attr("data-lg-loop") !== "false"
                });
            }
        }

        

        function getSwiperHeight(object, attr) {
            var val = object.attr("data-" + attr),
                dim;
            if (!val) {
                return undefined;
            }
            dim = val.match(/(px)|(%)|(vh)|(vw)$/i);
            if (dim.length) {
                switch (dim[0]) {
                    case "px":
                        return parseFloat(val);
                    case "vh":
                        return $window.height() * (parseFloat(val) / 100);
                    case "vw":
                        return $window.width() * (parseFloat(val) / 100);
                    case "%":
                        return object.width() * (parseFloat(val) / 100);
                }
            } else {
                return undefined;
            }
        }

        function toggleSwiperInnerVideos(swiper) {
            var prevSlide = $(swiper.slides[swiper.previousIndex]),
                nextSlide = $(swiper.slides[swiper.activeIndex]),
                videos, videoItems = prevSlide.find("video");
            for (var i = 0; i < videoItems.length; i++) {
                videoItems[i].pause();
            }
            videos = nextSlide.find("video");
            if (videos.length) {
                videos.get(0).play();
            }
        }

        function toggleSwiperCaptionAnimation(swiper) {
            var prevSlide = $(swiper.container).find("[data-caption-animate]"),
                nextSlide = $(swiper.slides[swiper.activeIndex]).find("[data-caption-animate]"),
                delay, duration, nextSlideItem, prevSlideItem;
            for (var i = 0; i < prevSlide.length; i++) {
                prevSlideItem = $(prevSlide[i]);
                prevSlideItem.removeClass("animated").removeClass(prevSlideItem.attr("data-caption-animate")).addClass("not-animated");
            }
            var tempFunction = function(nextSlideItem, duration) {
                return function() {
                    nextSlideItem.removeClass("not-animated").addClass(nextSlideItem.attr("data-caption-animate")).addClass("animated");
                    if (duration) {
                        nextSlideItem.css('animation-duration', duration + 'ms');
                    }
                };
            };
            for (var i = 0; i < nextSlide.length; i++) {
                nextSlideItem = $(nextSlide[i]);
                duration = nextSlideItem.attr('data-caption-duration');
                if (!isNoviBuilder) {
                    setTimeout(tempFunction(nextSlideItem, duration), parseInt(delay, 10));
                } else {
                    nextSlideItem.removeClass("not-animated")
                }
            }
        }

        function makeWaypointScroll(obj) {
            var $this = $(obj);
            if (!isNoviBuilder) {
                $this.on('click', function(e) {
                    e.preventDefault();
                    $("body, html").stop().animate({
                        scrollTop: $("#" + $(this).attr('data-custom-scroll-to')).offset().top
                    }, 1000, function() {
                        $window.trigger("resize");
                    });
                });
            }
        }

        function initSwiperWaypoints(swiper) {
            var prevSlide = $(swiper.container),
                nextSlide = $(swiper.slides[swiper.activeIndex]);
            prevSlide.find('[data-custom-scroll-to]').each(function() {
                var $this = $(this);
                makeWaypointScroll($this);
            });
            nextSlide.find('[data-custom-scroll-to]').each(function() {
                var $this = $(this);
                makeWaypointScroll($this);
            });
        }

        function initOwlCarousel(c) {
            var aliaces = ["-", "-sm-", "-md-", "-lg-", "-xl-", "-xxl-"],
                values = [0, 576, 768, 992, 1200, 1600],
                responsive = {};
            for (var j = 0; j < values.length; j++) {
                responsive[values[j]] = {};
                for (var k = j; k >= -1; k--) {
                    if (!responsive[values[j]]["items"] && c.attr("data" + aliaces[k] + "items")) {
                        responsive[values[j]]["items"] = k < 0 ? 1 : parseInt(c.attr("data" + aliaces[k] + "items"), 10);
                    }
                    if (!responsive[values[j]]["stagePadding"] && responsive[values[j]]["stagePadding"] !== 0 && c.attr("data" + aliaces[k] + "stage-padding")) {
                        responsive[values[j]]["stagePadding"] = k < 0 ? 0 : parseInt(c.attr("data" + aliaces[k] + "stage-padding"), 10);
                    }
                    if (!responsive[values[j]]["margin"] && responsive[values[j]]["margin"] !== 0 && c.attr("data" + aliaces[k] + "margin")) {
                        responsive[values[j]]["margin"] = k < 0 ? 30 : parseInt(c.attr("data" + aliaces[k] + "margin"), 10);
                    }
                }
            }
            if (c.attr('data-dots-custom')) {
                c.on("initialized.owl.carousel", function(event) {
                    var carousel = $(event.currentTarget),
                        customPag = $(carousel.attr("data-dots-custom")),
                        active = 0;
                    if (carousel.attr('data-active')) {
                        active = parseInt(carousel.attr('data-active'), 10);
                    }
                    carousel.trigger('to.owl.carousel', [active, 300, true]);
                    customPag.find("[data-owl-item='" + active + "']").addClass("active");
                    customPag.find("[data-owl-item]").on('click', function(e) {
                        e.preventDefault();
                        carousel.trigger('to.owl.carousel', [parseInt(this.getAttribute("data-owl-item"), 10), 300, true]);
                    });
                    carousel.on("translate.owl.carousel", function(event) {
                        customPag.find(".active").removeClass("active");
                        customPag.find("[data-owl-item='" + event.item.index + "']").addClass("active")
                    });
                });
            }
            c.owlCarousel({
                autoplay: isNoviBuilder ? false : c.attr("data-autoplay") === "true",
                loop: isNoviBuilder ? false : c.attr("data-loop") !== "false",
                items: 1,
                rtl: isRtl,
                center: c.attr("data-center") === "true",
                dotsContainer: c.attr("data-pagination-class") || false,
                navContainer: c.attr("data-navigation-class") || false,
                mouseDrag: isNoviBuilder ? false : c.attr("data-mouse-drag") !== "false",
                nav: c.attr("data-nav") === "true",
                dots: c.attr("data-dots") === "true",
                dotsEach: c.attr("data-dots-each") ? parseInt(c.attr("data-dots-each"), 10) : false,
                animateIn: c.attr('data-animation-in') ? c.attr('data-animation-in') : false,
                animateOut: c.attr('data-animation-out') ? c.attr('data-animation-out') : false,
                responsive: responsive,
                navText: function() {
                    try {
                        return JSON.parse(c.attr("data-nav-text"));
                    } catch (e) {
                        return [];
                    }
                }(),
                navClass: function() {
                    try {
                        return JSON.parse(c.attr("data-nav-class"));
                    } catch (e) {
                        return ['owl-prev', 'owl-next'];
                    }
                }()
            });
        }

        function isScrolledIntoView(elem) {
            if (!isNoviBuilder) {
                return elem.offset().top + elem.outerHeight() >= $window.scrollTop() && elem.offset().top <= $window.scrollTop() + $window.height();
            } else {
                return true;
            }
        }

        function lazyInit(element, func) {
            $document.on('scroll', function() {
                if ((!element.hasClass('lazy-loaded') && (isScrolledIntoView(element)))) {
                    func.call();
                    element.addClass('lazy-loaded');
                }
            }).trigger("scroll");
        }
        if (plugins.owl.length) {
            for (var i = 0; i < plugins.owl.length; i++) {
                var c = $(plugins.owl[i]);
                plugins.owl[i].owl = c;
                initOwlCarousel(c);
            }
        }



      


        window.onloadCaptchaCallback = function() {
            for (var i = 0; i < plugins.captcha.length; i++) {
                var $capthcaItem = $(plugins.captcha[i]);
                grecaptcha.render($capthcaItem.attr('id'), {
                    sitekey: $capthcaItem.attr('data-sitekey'),
                    size: $capthcaItem.attr('data-size') ? $capthcaItem.attr('data-size') : 'normal',
                    theme: $capthcaItem.attr('data-theme') ? $capthcaItem.attr('data-theme') : 'light',
                    callback: function(e) {
                        $('.recaptcha').trigger('propertychange');
                    }
                });
                $capthcaItem.after("<span class='form-validation'></span>");
            }
        };



        if (navigator.platform.match(/(Mac)/i)) $html.addClass("mac-os");
        if (isFirefox) $html.addClass("firefox");
        if (isIE) {
            if (isIE < 10) {
                $html.addClass("lt-ie-10");
            }
            if (isIE < 11) {
                if (plugins.pointerEvents) {
                    $.getScript(plugins.pointerEvents).done(function() {
                        $html.addClass("ie-10");
                        PointerEventsPolyfill.initialize({});
                    });
                }
            }
            if (isIE === 11) {
                $html.addClass("ie-11");
            }
            if (isIE === 12) {
                $html.addClass("ie-edge");
            }
        }


        if (plugins.swiper.length) {
            for (var i = 0; i < plugins.swiper.length; i++) {
                var s = $(plugins.swiper[i]);
                var pag = s.find(".swiper-pagination"),
                    next = s.find(".swiper-button-next"),
                    prev = s.find(".swiper-button-prev"),
                    bar = s.find(".swiper-scrollbar"),
                    swiperSlide = s.find(".swiper-slide"),
                    autoplay = false;
                for (var j = 0; j < swiperSlide.length; j++) {
                    var $this = $(swiperSlide[j]),
                        url;
                    if (url = $this.attr("data-slide-bg")) {
                        $this.css({
                            "background-image": "url(" + url + ")",
                            "background-size": "cover"
                        })
                    }
                }
                swiperSlide.end().find("[data-caption-animate]").addClass("not-animated").end();
                s.swiper({
                    autoplay: s.attr('data-autoplay') ? s.attr('data-autoplay') === "false" ? undefined : s.attr('data-autoplay') : 5000,
                    direction: s.attr('data-direction') ? s.attr('data-direction') : "horizontal",
                    effect: s.attr('data-slide-effect') ? s.attr('data-slide-effect') : "slide",
                    speed: s.attr('data-slide-speed') ? s.attr('data-slide-speed') : 600,
                    keyboardControl: s.attr('data-keyboard') === "true",
                    mousewheelControl: s.attr('data-mousewheel') === "true",
                    mousewheelReleaseOnEdges: s.attr('data-mousewheel-release') === "true",
                    nextButton: next.length ? next.get(0) : null,
                    prevButton: prev.length ? prev.get(0) : null,
                    pagination: pag.length ? pag.get(0) : null,
                    paginationClickable: pag.length ? pag.attr("data-clickable") !== "false" : false,
                    paginationBulletRender: pag.length ? pag.attr("data-index-bullet") === "true" ? function(swiper, index, className) {
                        return '<span class="' + className + '">' + (index + 1) + '</span>';
                    } : null : null,
                    scrollbar: bar.length ? bar.get(0) : null,
                    scrollbarDraggable: bar.length ? bar.attr("data-draggable") !== "false" : true,
                    scrollbarHide: bar.length ? bar.attr("data-draggable") === "false" : false,
                    loop: isNoviBuilder ? false : s.attr('data-loop') !== "false",
                    simulateTouch: s.attr('data-simulate-touch') && !isNoviBuilder ? s.attr('data-simulate-touch') === "true" : false,
                    onTransitionStart: function(swiper) {
                        toggleSwiperInnerVideos(swiper);
                    },
                    onTransitionEnd: function(swiper) {
                        toggleSwiperCaptionAnimation(swiper);
                    },
                    onInit: function(swiper) {
                        toggleSwiperInnerVideos(swiper);
                        toggleSwiperCaptionAnimation(swiper);
                        if (!isRtl) {
                            $window.on('resize', function() {
                                swiper.update(true);
                            });
                        }
                    }
                });
                $window.on("resize", (function(s) {
                    return function() {
                        var mh = getSwiperHeight(s, "min-height"),
                            h = getSwiperHeight(s, "height");
                        if (h) {
                            s.css("height", mh ? mh > h ? mh : h : h);
                        }
                    }
                })(s)).trigger("resize");
            }
        }
       
     
        if (plugins.isotope.length) {
            var isogroup = [];
            for (var i = 0; i < plugins.isotope.length; i++) {
                var isotopeItem = plugins.isotope[i],
                    isotopeInitAttrs = {
                        itemSelector: '.isotope-item',
                        layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
                        filter: '*'
                    };
                if (isotopeItem.getAttribute('data-column-width')) {
                    isotopeInitAttrs.masonry = {
                        columnWidth: parseFloat(isotopeItem.getAttribute('data-column-width'))
                    };
                } else if (isotopeItem.getAttribute('data-column-class')) {
                    isotopeInitAttrs.masonry = {
                        columnWidth: isotopeItem.getAttribute('data-column-class')
                    };
                }
                var iso = new Isotope(isotopeItem, isotopeInitAttrs);
                isogroup.push(iso);
            }
            setTimeout(function() {
                for (var i = 0; i < isogroup.length; i++) {
                    isogroup[i].element.className += " isotope--loaded";
                    isogroup[i].layout();
                }
            }, 200);
            var resizeTimout;
            $("[data-isotope-filter]").on("click", function(e) {
                e.preventDefault();
                var filter = $(this);
                clearTimeout(resizeTimout);
                filter.parents(".isotope-filters").find('.active').removeClass("active");
                filter.addClass("active");
                var iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
                    isotopeAttrs = {
                        itemSelector: '.isotope-item',
                        layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
                        filter: this.getAttribute("data-isotope-filter") === '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]'
                    };
                if (iso.attr('data-column-width')) {
                    isotopeAttrs.masonry = {
                        columnWidth: parseFloat(iso.attr('data-column-width'))
                    };
                } else if (iso.attr('data-column-class')) {
                    isotopeAttrs.masonry = {
                        columnWidth: iso.attr('data-column-class')
                    };
                }
                iso.isotope(isotopeAttrs);
            }).eq(0).trigger("click")
        }
        if ($html.hasClass("wow-animation") && plugins.wow.length && !isNoviBuilder && isDesktop) {
            new WOW().init();
        }
        if (plugins.rdInputLabel.length) {
            plugins.rdInputLabel.RDInputLabel();
        }
        if (plugins.regula.length) {
            attachFormValidator(plugins.regula);
        }
       
       

        if (plugins.counter.length) {
            for (var i = 0; i < plugins.counter.length; i++) {
                var $counterNotAnimated = $(plugins.counter[i]).not('.animated');
                $document.on("scroll", $.proxy(function() {
                    var $this = this;
                    if ((!$this.hasClass("animated")) && (isScrolledIntoView($this))) {
                        $this.countTo({
                            refreshInterval: 40,
                            from: 0,
                            to: parseInt($this.text(), 10),
                            speed: $this.attr("data-speed") || 1000
                        });
                        $this.addClass('animated');
                    }
                }, $counterNotAnimated)).trigger("scroll");
            }
        }
      
        if (plugins.progressLinear.length) {
            for (i = 0; i < plugins.progressLinear.length; i++) {
                var progressBar = $(plugins.progressLinear[i]);
                $window.on("scroll load", $.proxy(function() {
                    var bar = $(this);
                    if (!bar.hasClass('animated-first') && isScrolledIntoView(bar)) {
                        var end = parseInt($(this).find('.progress-value').text(), 10);
                        bar.find('.progress-bar-linear').css({
                            width: end + '%'
                        });
                        bar.find('.progress-value').countTo({
                            refreshInterval: 40,
                            from: 0,
                            to: end,
                            speed: 500
                        });
                        bar.addClass('animated-first');
                    }
                }, progressBar));
            }
        }



       
        if (plugins.slick.length) {
            for (var i = 0; i < plugins.slick.length; i++) {
                var $slickItem = $(plugins.slick[i]);
                $slickItem.slick({
                    slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll'), 10) || 1,
                    asNavFor: $slickItem.attr('data-for') || false,
                    dots: $slickItem.attr("data-dots") === "true",
                    infinite: isNoviBuilder ? false : $slickItem.attr("data-loop") === "true",
                    focusOnSelect: true,
                    arrows: $slickItem.attr("data-arrows") === "true",
                    swipe: $slickItem.attr("data-swipe") === "true",
                    autoplay: $slickItem.attr("data-autoplay") === "true",
                    vertical: $slickItem.attr("data-vertical") === "true",
                    centerMode: $slickItem.attr("data-center-mode") === "true",
                    centerPadding: $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.50',
                    mobileFirst: true,
                    rtl: isRtl,
                    responsive: [{
                        breakpoint: 0,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-items'), 10) || 1
                        }
                    }, {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-sm-items'), 10) || 1
                        }
                    }, {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-md-items'), 10) || 1
                        }
                    }, {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-lg-items'), 10) || 1
                        }
                    }, {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: parseInt($slickItem.attr('data-xl-items'), 10) || 1
                        }
                    }]
                }).on('afterChange', function(event, slick, currentSlide, nextSlide) {
                    var $this = $(this),
                        childCarousel = $this.attr('data-child');
                    if (childCarousel) {
                        $(childCarousel + ' .slick-slide').removeClass('slick-current');
                        $(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');
                    }
                });
            }
        }

     
        if (plugins.stepper.length) {
            plugins.stepper.stepper({
                labels: {
                    up: "",
                    down: ""
                }
            });
        }
        if (plugins.countDown.length) {
            var i;
            for (i = 0; i < plugins.countDown.length; i++) {
                var countDownItem = plugins.countDown[i],
                    d = new Date(),
                    type = countDownItem.getAttribute('data-type'),
                    time = countDownItem.getAttribute('data-time'),
                    format = countDownItem.getAttribute('data-format'),
                    settings = [];
                d.setTime(Date.parse(time)).toLocaleString();
                settings[type] = d;
                settings['format'] = format;
                $(countDownItem).countdown(settings);
            }
        }
        if (plugins.customWaypoints.length) {
            var i;
            for (i = 0; i < plugins.customWaypoints.length; i++) {
                var $this = $(plugins.customWaypoints[i]);
                makeWaypointScroll($this);
            }
        }
        if (plugins.scroller.length) {
            var i;
            for (i = 0; i < plugins.scroller.length; i++) {
                var scrollerItem = $(plugins.scroller[i]);
                scrollerItem.jScrollPane({
                    autoReinitialise: true
                });
            }
        }

    });
    if (plugins.materialParallax.length) {
        if (!isNoviBuilder && !isIE && !isMobile) {  /////1
            plugins.materialParallax.parallax();
            $window.on('load', function() {
                setTimeout(function() {
                    $window.scroll();
                }, 500);
            });
        } else {   /////2
            for (var i = 0; i < plugins.materialParallax.length; i++) {
                var parallax = $(plugins.materialParallax[i]),
                    imgPath = parallax.data("parallax-img");
                parallax.css({
                    "background-image": 'url(' + imgPath + ')',
                    "background-size": "cover"
                });
            }
        }   /////3
    }
}());




/////////// modal


//$('#exampleModal').modal('show');

var url;
var val

$(document).ready(function(){
    
    $('.update-text').on("click", function(){
        
        var errors = false;
        
        val = $(this).attr('value').trim();
        
        //errors = meta;
        if(val == 'welcome_' || val == 'slide1_' || val == 'slide2_' || val == 'slide3_'){
            url = 'index';
        }
        
        if(errors == false){

        $.ajax({
                  url: "/site/" + url,
                  type: "GET",
                  data: ({meta: 'select', val: val}),
                  dataType: "html",
                  success: function(data){
                      //alert(data);
                      var res = data.split("<>");
                      $('#TextareaRU').val(res[0].trim());
                      $('#TextareaEN').val(res[1].trim());
                      $('#TextareaEE').val(res[2].trim());
                  }
        
        })
            
        }
        else{
            alert(errors);
        }
    
})
})





$(document).ready(function(){
    
    $('#update-button').on("click", function(){
        
        var errors = false;
        
        //errors = meta;
        
        var ru = $('#TextareaRU').val();
        
        var en = $('#TextareaEN').val();
        
        var ee = $('#TextareaEE').val();
        
        if(ru.trim().length == 0 || en.trim().length == 0 || ee.trim().length == 0){
            errors = 'есть пустые значения';
        }
        
        if(errors == false){

        $.ajax({
                  url: "/site/" + url,
                  type: "GET",
                  data: ({meta: 'update', val: val, ru: ru, en: en, ee: ee}),
                  dataType: "html",
                  success: function(data){
                      alert(data);
                  }
        
        })
            
        }
        else{
            alert(errors);
        }
    
})
})

/*setTimeout(function(){
  $('.card-custom-collapse').removeClass('show');
}, 100);*/
var dotop = true;
$(document).ready(function(){
    $(window).scroll(function () {
        if($(this).scrollTop() > 1 && dotop){
            $('.card-custom-collapse').removeClass('show');
            dotop = false;
        }
    })
})
