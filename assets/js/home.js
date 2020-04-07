window.addEventListener('DOMContentLoaded', (event) => {
    if (sessionStorage.getItem('visitedDR')) {
        $('#splash').hide();

    } else {
        sessionStorage.setItem('visitedDR', true)
    }


    const MathUtils = {
        // map number x from range [a, b] to [c, d]
        map: (x, a, b, c, d) => (x - a) * (d - c) / (b - a) + c,
        // linear interpolation
        lerp: (a, b, n) => (1 - n) * a + n * b,
        // Random float
        getRandomFloat: (min, max) => (Math.random() * (max - min) + min).toFixed(2),

        distance: (x1, y1, x2, y2) => Math.hypot(x2 - x1, y2 - y1)
    };

    const body = document.body;
    let winsize;
    const calcWinsize = () => winsize = {
        width: window.innerWidth,
        height: window.innerHeight
    };
    calcWinsize();
    window.addEventListener('resize', calcWinsize);


    // get the mouse position
    const getMousePos = (ev) => {
        let posx = 0;
        let posy = 0;
        if (!ev) ev = window.event;
        if (ev.pageX || ev.pageY) {
            posx = ev.pageX;
            posy = ev.pageY;
        } else if (ev.clientX || ev.clientY) {
            posx = ev.clientX + body.scrollLeft + docEl.scrollLeft;
            posy = ev.clientY + body.scrollTop + docEl.scrollTop;
        }
        return {
            x: posx,
            y: posy
        };
    }

    // mousePos: current mouse position
    // cacheMousePos: previous mouse position
    // lastMousePos: last last recorded mouse position (at the time the last image was shown)
    let mousePos = lastMousePos = cacheMousePos = {
        x: 0,
        y: 0
    };

    // update the mouse position
    window.addEventListener('mousemove', ev => mousePos = getMousePos(ev));

    // gets the distance from the current mouse position to the last recorded mouse position
    const getMouseDistance = () => MathUtils.distance(mousePos.x, mousePos.y, lastMousePos.x, lastMousePos.y);

    //    let docScroll;
    //    // for scroll speed calculation
    //    let lastScroll;
    //    let scrollingSpeed = 0;
    //    // scroll position update function
    //    const getPageYScroll = () => docScroll = window.pageYOffset || document.documentElement.scrollTop;
    //    window.addEventListener('scroll', getPageYScroll);
    if (document.getElementById('home-page')) {
        scrollFeature();
    };

    function scrollFeature() {
        console.log("im in");
        var scrollArea = document.getElementById('home-page');
        // var scrollIndicator = document.getElementById('indicator');
        var scrollIndicator = document.querySelectorAll('.section__title'),
            i;
        // console.log(indicator);///
        var scrollHeight = 0;
        var scrollOffset = 0;
        var scrollPercent = 0;
        resize();

        function loop(elem) {
            // console.log(elem);

            var indicatorPosition = scrollPercent;
            scrollOffset = window.pageYOffset || window.scrollTop;
            scrollPercent = scrollOffset / scrollHeight || 0;
            indicatorPosition += (scrollPercent - indicatorPosition) * 0.05;
            var transformString = 'translateX(-' + (indicatorPosition * 300) + 'px)';
            elem.style.mozTransform = transformString;
            elem.style.webkitTransform = transformString;
            elem.style.transform = transformString;

            requestAnimationFrame(function () {
                loop(elem);
            }); ///
        }


        for (i = 0; i < scrollIndicator.length; ++i) {
            loop(scrollIndicator[i]); ////
        }
        ///

        function resize() {
            scrollHeight = window.innerHeight * 4;
            scrollArea.style.height = (window.innerHeight * 5) + 'px';
        }

        window.addEventListener('resize', resize);
    }

    var lazyLoadInstances = [];
    var lazyLazy = new LazyLoad({
        elements_selector: ".project__images",
        callback_enter: function (el) {
            // ...instantiate a new LazyLoad on it
            var oneLL = new LazyLoad({
                container: el
            });
            // Optionally push it in the lazyLoadInstances
            // array to keep track of the instances
            lazyLoadInstances.push(oneLL);
            checksize(el);
            if (lazyLoadInstances.length == 1) {
                imagesLoaded(el, function (instance) {
                    removeLoader();
                });
            }

        }
    });




    /***********************************/
    /********** Preload stuff **********/

    //
    //    const preloadProjectImages = () => {
    //        return new Promise((resolve, reject) => {
    //            imagesLoaded(document.querySelectorAll('.project__images img'), {
    //                background: true
    //            }, resolve);
    //        });
    //    };
    //
    //    // And then..
    //    preloadProjectImages().then(() => {
    //        // Remove the loader
    //        checksize(removeLoader);
    //
    //
    //    });

    function removeLoader() {
        document.body.classList.remove('loading');

        if ($('#splash')) {
            console.log($('#splash'));
            $('#splash').fadeOut(800);
        }

    }





    function checksize(el) {
        if (matchMedia('screen and (min-width: 64rem)').matches) {
            var aligntype = 'left';
        } else {
            var aligntype = 'center';
        }
        //callback
        //            preloadProjectImages().then(() => {
        $(el).on('ready.flickity', ////$('.main-carousel')
            function () {

                //                    
                console.log('flickity loaded');
            });

        $(el).flickity({
            freeScroll: true,
            //                wrapAround: true,
            imagesLoaded: true,
            lazyLoad: 2,
            percentPosition: false,
            pageDots: false,
            cellAlign: aligntype,
            arrowShape: {
                x0: 25,
                x1: 65,
                y1: 40,
                x2: 70,
                y2: 40,
                x3: 30
            }
        });
        //        callback();
        //            });

    }

    function setWithExpiry(key, value, ttl) {
        const now = new Date()

        // `item` is an object which contains the original value
        // as well as the time when it's supposed to expire
        const item = {
            value: value,
            expiry: now.getTime() + ttl
        }
        localStorage.setItem(key, JSON.stringify(item))
    }

    function getWithExpiry(key) {
        const itemStr = localStorage.getItem(key)
        // if the item doesn't exist, return null
        if (!itemStr) {
            return null
        }
        const item = JSON.parse(itemStr)
        const now = new Date()
        // compare the expiry time of the item with the current time
        if (now.getTime() > item.expiry) {
            // If the item is expired, delete the item from storage
            // and return null
            localStorage.removeItem(key)
            return null
        }
        return item.value
    }



});
