<?php
session_start();
define('ROOT_PATH', dirname(__DIR__) . '/');
include_once("seo_insert.php");
include_once("backend/db_connection.php");
include_once("backend/functions.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no">
    <title><?php echo $title; ?></title>

    <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
    <meta property="fb:page_id" content="490379361293393" />
    <meta property="og:url" content="<?php echo $current_url; ?>" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:image" content="https://www.craftmarkhomes.com/gallery/images/exteriors/image1.jpg" />
    <meta property="og:description" content="<?php echo $metaDesc; ?>" />
    <meta property="og:type" content="Website" />

    <meta name="author" content="Craftmark Homes | Amra Narmandakh" />
    <meta name="Owner" content="Craftmark Homes" />
    <meta name="Copyright" content="Copyright &copy; Craftmark Homes" />
    <meta name="keywords" content="<?php echo $keywords; ?>" />
    <meta name="description" content="<?php echo $metaDesc; ?>" />
    <meta name="google-site-verification" content="LpxBIeHgLCXN_nXrUxRS09XC2jI-CKvIaZSTrNHnyxY" />
    <meta name="facebook-domain-verification" content="lm1xuixhyxltu7i3scg8k206on1ja9" />

    <!-- Font Awesome -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="/styles/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css"> -->

    <!-- Material Design Bootstrap -->
    <link href="/styles/css/multi-range.min.css" rel="stylesheet">
    <link href="/styles/css/mdb.min.css" rel="stylesheet">
    <!-- SwiperJS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.min.css">
    <!-- FancyBox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <!-- General CSS -->
    <link href="/styles/css/main.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/favicon.png" sizes="300x300">

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <!--[if lte IE 10]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <P id="VersionTab">Please update your browser to a new version so you can properly view this website. | <a href="https://browsehappy.com/?locale=en" target="_blank">Click here for help</a></p>
    <![endif]-->

    <!-- Cookies JS -->
    <script type="text/javascript" src="/scripts/js/cookies.js"></script>

    <!-- Google reCaptcha v3 --> 
    <script src="https://www.google.com/recaptcha/api.js?render=6LfCa4oiAAAAAD7NhTj4lBLG2BLRwlRkS8m5vRM3"></script>
    
    <!-- Facebook Share Button Script -->
    <script>
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.9";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-3514781-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-3514781-1');
    </script>

    <!-- Pinterest Tag -->
    <script>
        ! function (e) {
            if (!window.pintrk) {
                window.pintrk = function () {
                    window.pintrk.queue.push(Array.prototype.slice.call(arguments))
                };
                var
                    n = window.pintrk;
                n.queue = [], n.version = "3.0";
                var
                    t = document.createElement("script");
                t.async = !0, t.src = e;
                var
                    r = document.getElementsByTagName("script")[0];
                r.parentNode.insertBefore(t, r)
            }
        }("https://s.pinimg.com/ct/core.js");
        pintrk('load', '2612848189096', {
            em: '<user_email_address>'
        });
        pintrk('page');
    </script>
    <script>
        pintrk('track', 'lead', {
            lead_type: 'Community form'
        });
    </script>
    <noscript>
        <img height="1" width="1" style="display:none;" alt=""
            src="https://ct.pinterest.com/v3/?event=init&tid=2612848189096&pd[em]=<hashed_email_address>&noscript=1" />
    </noscript>
    <!-- end Pinterest Tag -->

    <!-- Urban Pace Mateny hill Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WVZGB6S');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Hotjar Tracking Code for http://www.craftmarkhomes.com -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 736457,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        ! function (f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '489710251430721');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=489710251430721&ev=PageView
    &noscript=1" />
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Google Knowledge Graph Schema -->
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@id": "https://craftmarkhomes.com/#organization",
            "@type": "Organization",
            "name": "Craftmark Homes",
            "url": "https://craftmarkhomes.com/",
            "logo": "https://craftmarkhomes.com/images/knowledge_graph_logo.png",
            "contactPoint": [{
                "@type": "ContactPoint",
                "telephone": "+1-703-342-2012",
                "contactType": "sales",
                "areaServed": "US"
            }],
            "sameAs": [
                "https://www.facebook.com/CraftmarkHomes",
                "https://twitter.com/craftmarkhomes",
                "https://www.instagram.com/craftmarkhomes/",
                "https://www.youtube.com/channel/UCdG5p2j56fFMqegeMnDwj5w"
            ]
        }
    </script>

    <!-- Randy at Register Marketing -->
    <img src="https://smart-pixl.com/12402/00003_craftmarkhomes.com_SMART.GIF" style="display: none !important;" />
    <!-- Bing ads -->
    <script>
        (function (w, d, t, r, u) {
            var f, n, i;
            w[u] = w[u] || [], f = function () {
                var o = {
                    ti: "26307604"
                };
                o.q = w[u], w[u] = new UET(o), w[u].push("pageLoad")
            }, n = d.createElement(t), n.src = r, n.async = 1, n.onload = n.onreadystatechange = function () {
                var s = this.readyState;
                s && s !== "loaded" && s !== "complete" || (f(), n.onload = n.onreadystatechange = null)
            }, i = d.getElementsByTagName(t)[0], i.parentNode.insertBefore(n, i)
        })(window, document, "script", "//bat.bing.com/bat.js", "uetq");
    </script>
</head>

<!-- <div id="alert-message" class="">
    <p class="text-center">
        PERSONAL APPOINTMENTS REQUIRED! | We're Here for You! Model Home Open and Selling by Personal Appointment
        and&nbsp;Virtual&nbsp;Tour&nbsp;|&nbsp;<a class="text-l-blue" style="text-decoration: underline;"
            href="/Statement.pdf" target="_blank">Read&nbsp;Statement</a>
    </p>
</div> -->

<body>
    <h1 class="outline">Craftmark Homes</h1>
    <!--Main Navigation-->
    <header id="header" class="position-relative">
        <div id="mobile-logo-container" class="<?php echo $d_block; ?> d-sm-none">
            <div class="mobile-logo d-flex flex-wrap justify-content-between w-100 align-items-center">
                <img src="/images/Main_Logo/craftmark-logo-white-vertical.svg" class="img-fluid" alt="">
                <a href="/contact">Contact</a>
            </div>
        </div>
        <nav class="navbar navbar-expand custom-navbar alert-space">
            <h1 class="outline">Main Navigation</h1>
            <div class="container-fluid">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="/">
                    <img id="header-logo" class="logo" src="/images/Main_Logo/craftmark-logo-white.svg"
                        alt="Craftmark Homes Logo">
                </a>

                <div id="main-nav">
                    <ul class="navbar-nav hover-ul justify-content-between position-relative">
                        <li class="nav-item active order-1">
                            <a class="nav-link" href="/">
                                <!-- <img src="/images/icon/home.svg" alt=""> -->
                                <?php include_once(ROOT_PATH."/images/icon/home.svg");  ?>
                                <div class="nav-text">Home</div>
                            </a>
                        </li>
                        <li class="nav-item order-2">
                            <a class="nav-link" href="/locations/">
                                <!-- <img src="/images/icon/locations.svg" alt=""> -->
                                <?php include_once(ROOT_PATH."/images/icon/locations.svg");  ?>
                                <div class="nav-text">Locations</div>
                            </a>
                        </li>
                        <li class="nav-item order-3">
                            <a class="nav-link" href="/floorplans/">
                                <!-- <img src="/images/icon/floorplan.svg" alt=""> -->
                                <?php include_once(ROOT_PATH."/images/icon/floorplan.svg");  ?>
                                <div class="nav-text">Floor Plans</div>
                            </a>
                        </li>
                        <li class="nav-item order-4">
                            <a class="nav-link" href="/quick-move-ins/">
                                <!-- <img src="/images/icon/quick-move-ins.svg" alt=""> -->
                                <?php include_once(ROOT_PATH."/images/icon/quick-move-ins.svg");  ?>
                                <div class="nav-text">Quick Move-Ins</div>
                            </a>
                        </li>
                        <!-- <li class="nav-item d-none d-xl-block order-5">
                            <a class="nav-link" href="/custom/">
                                <div class="nav-text">Build on Your Lot</div>
                            </a>
                        </li> --> 
                        <li class="nav-item order-7 order-md-9 order-lg-7">
                            <a class="nav-link more-button" href="#" data-toggle="modal" data-target="#hamburgerMenu">
                                <div class="animated-icon1 hamburger-menu"><span></span><span></span><span></span></div>
                                <div class="nav-text">More</div>
                            </a>
                        </li>
                        <li id="saved-items-container" class="nav-item ml-auto order-8 d-none d-md-block">
                            <a id="savedItemsBtn" class="nav-link" href="#" data-toggle="modal"
                                data-target="#savedItems">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="19"
                                    viewBox="0 0 21.133 19.372" class="d-inline-block">
                                    <path id="heart"
                                        d="M17.782,29.946a1.434,1.434,0,0,1-.512-.094c-.227-.084-2.278-.922-5.107-4.084-1.492-1.668-4.89-5.957-4.228-9.78a4.9,4.9,0,0,1,2.607-3.543c3.179-1.726,5.8.673,7.241,2.385,1.429-1.711,4.057-4.1,7.241-2.385a4.9,4.9,0,0,1,2.607,3.543c.661,3.823-2.737,8.112-4.228,9.78-2.829,3.162-4.88,4-5.107,4.084A1.434,1.434,0,0,1,17.782,29.946Z"
                                        transform="translate(-7.216 -11.199)" fill="#ffde28" stroke="#ffde28"
                                        stroke-width="1.25" />
                                </svg>
                                <span id="saved-total">0</span>
                            </a>
                        </li>
                        <li class="nav-item d-none d-md-block order-9 order-md-7 order-lg-9">
                            <a class="nav-link" href="/contact">
                                <div class="nav-text">Contact</div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Navigation Modal -->
    <div class="modal fade bottom" id="hamburgerMenu" tabindex="-1" role="dialog" aria-labelledby="hamburgerMenuLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-fluid modal-bottom m-0" role="document">
            <div class="modal-content">
                <div class="nav-secondary d-flex flex-column">
                    <div class="text-center bg-grey logo">
                        <img src="/images/Main_Logo/craftmark-logo-blue.svg" alt="" class="img-fluid">
                    </div>
                    <div class="flex-grow-1">
                        <ul class="nav list-unstyled">
                            <li class="nav-item">
                                <a href="/gallery" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/gallery.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Gallery</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="/custom" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/custom-properties.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Build on Your Lot</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li> --> 
                            <li class="nav-item">
                                <a href="/craftmark-green" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/craftmark-green.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Craftmark Green</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/blog" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/blog.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Blog</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/we-buy-land" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/custom-properties.svg" alt="" class="icon">
                                        <div class="flex-grow-1">We Buy Land</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="/saved-homes" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/saved-homes.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Saved Homes</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="/contact" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/contact-us.svg" alt="" class="icon">
                                        <div class="flex-grow-1">Contact Us</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/about-us" class="nav-link">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/icon/menu/about-us.svg" alt="" class="icon">
                                        <div class="flex-grow-1">About Us</div>
                                        <img src="/images/icon/menu/arrow.svg" alt="" class="arrow">
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="social-menu">
                        <ul class="list-unstyled list-inline text-center">
                            <li class="list-inline-item">
                                <a href="">
                                    <img src="/images/facebook.svg" alt="Facebook">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="">
                                    <img src="/images/twitter.svg" alt="Twitter">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="">
                                    <img src="/images/youtube.svg" alt="Youtube">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="">
                                    <img src="/images/instagram.svg" alt="Instagram">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation Modal -->

    <!-- Saved Items Modal -->
    <div class="modal fade bottom" id="savedItems" tabindex="-1" role="dialog" aria-labelledby="savedItemsLabel"
        aria-hidden="true">
        <div class="modal-dialog flex-center" role="document">
            <div class="modal-content bg-white">
                <!-- Saved Communities -->
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between pr-15 px-md-20">
                        <h3 class="font-weight-normal m-0">Locations</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="row px-md-20">
                        <?php 
                            $communities = getJsonData($json_db_url.'communities.json');
                            foreach ($communities['communities'] as $comm) { ?>
                        <div id="savedCommWrap-<?php echo $comm['id']; ?>"
                            class="col-sm-6 col-lg-4 savedCommunity savedItem d-none">
                            <div class="py-4">
                                <?php include("components/community/locationListV3.php"); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div id="communityEmptyLable" class="col-12 d-none">
                            <p class="mt-2 text-l-blue">Your list is empty. Please <img src="/images/icon/heart-red.svg"
                                    alt="heart icon"> a location to keep a list of your favorite listings.</p>
                        </div>
                    </div>
                </div>
                <!-- Saved Quick Move-Ins -->
                <div class="container-fluid mt-4">
                    <div class="d-flex align-items-center justify-content-between pr-15 px-md-20">
                        <h3 class="font-weight-normal m-0">Quick Move-Ins</h3>
                    </div>
                    <div class="row px-md-20">
                        <?php
                            $quickMoveIns = getQuickMoveIns(null, null, null);
                            foreach ($quickMoveIns as $qmi) { ?>
                        <div id="savedQmiWrap-<?php echo $qmi['id']; ?>"
                            class="col-sm-6 col-lg-4 savedQuickMoveIns savedItem d-none">
                            <div class="py-4">
                                <?php include("components/quickMoveIns/quickMoveInsListV3.php"); ?>
                            </div>
                        </div>
                        <?php } ?>
                        <div id="QuickMoveInsEmptyLabel" class="col-12 d-none">
                            <p class="mt-2 text-l-blue">Your list is empty. Please <img src="/images/icon/heart-red.svg"
                                    alt="heart icon"> a quick move-in to keep a list of your favorite listings.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Saved Items Modal -->
    <!--Main Navigation-->