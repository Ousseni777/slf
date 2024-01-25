<?php
session_start();
if (isset($_SESSION['BRAND'])) {
    unset($_SESSION['BRAND']);
}
if (isset($_SESSION['PRODUIT'])) {
    unset($_SESSION['PRODUIT']);
}
if (isset($_SESSION['TARIFF'])) {
    unset($_SESSION['TARIFF']);
}
if (isset($_SESSION['DURATION'])) {
    unset($_SESSION['DURATION']);
}
if (isset($_SESSION['AMOUNT'])) {
    unset($_SESSION['AMOUNT']);
}
if (isset($_SESSION['PROFESSION'])) {
    unset($_SESSION['PROFESSION']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Salafin - Index</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
    <style>
        body {
            background: #fff;
            color: #2f3138;
            font-family: "Open Sans", sans-serif;
        }

        a {
            color: #f82249;
            text-decoration: none;
            transition: 0.5s;
        }

        a:hover,
        a:active,
        a:focus {
            color: #f8234a;
            outline: none;
            text-decoration: none;
        }

        p {
            padding: 0;
            margin: 0 0 30px 0;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: "Raleway", sans-serif;
            font-weight: 400;
            margin: 0 0 20px 0;
            padding: 0;
            color: #0e1b4d;
        }

        .main-page {
            margin-top: 70px;
        }

        /* Prelaoder */
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 999;
            width: 100%;
            height: 100%;
            overflow: visible;
            background: #fff url("assets/img/preloader.svg") no-repeat center center;
        }

        /*--------------------------------------------------------------
# Back to top button
--------------------------------------------------------------*/
        .back-to-top {
            position: fixed;
            visibility: hidden;
            opacity: 0;
            right: 15px;
            bottom: 15px;
            z-index: 996;
            background: #f82249;
            width: 40px;
            height: 40px;
            border-radius: 50px;
            transition: all 0.4s;
        }

        .back-to-top i {
            font-size: 28px;
            color: #fff;
            line-height: 0;
        }

        .back-to-top:hover {
            background: #f94a6a;
            color: #fff;
        }

        .back-to-top.active {
            visibility: visible;
            opacity: 1;
        }

        /* Sections Header
--------------------------------*/
        .section-header {
            margin-bottom: 60px;
            position: relative;
            padding-bottom: 20px;
        }

        .section-header::before {
            content: "";
            position: absolute;
            display: block;
            width: 60px;
            height: 5px;
            background: #f82249;
            bottom: 0;
            left: calc(50% - 25px);
        }

        .section-header h2 {
            font-size: 36px;
            text-transform: uppercase;
            text-align: center;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .section-header p {
            text-align: center;
            padding: 0;
            margin: 0;
            font-size: 18px;
            font-weight: 500;
            color: #9195a2;
        }

        .section-with-bg {
            background-color: #f6f7fd;
        }

        /*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/
        #header {
            height: 90px;
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            transition: all 0.5s;
            z-index: 997;
        }

        #header.header-scrolled,
        #header.header-inner {
            background: rgba(6, 12, 34, 0.98);
            height: 70px;
        }

        #header #logo h1 {
            font-size: 36px;
            margin: 0;
            font-family: "Raleway", sans-serif;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
        }

        #header #logo h1 span {
            color: #f82249;
        }

        #header #logo h1 a,
        #header #logo h1 a:hover {
            color: #fff;
        }

        #header #logo img {
            padding: 0;
            margin: 0;
            max-height: 40px;
        }

        @media (max-width: 992px) {
            #header #logo img {
                max-height: 30px;
            }
        }

        /*--------------------------------------------------------------
# Options
--------------------------------------------------------------*/
        .choix-credit {
            color: #fff;
            background: #f82249;
            padding: 7px 22px;
            margin: 0 0 0 15px;
            border-radius: 50px;
            border: 2px solid #f82249;
            transition: all ease-in-out 0.3s;
            font-weight: 500;
            line-height: 1;
            font-size: 13px;
            white-space: nowrap;
        }

        .choix-credit:hover {
            background: none;
            color: #fff;
        }

        .choix-credit:focus {
            color: #fff;
        }

        @media (max-width: 992px) {
            .choix-credit {
                margin: 0 15px 0 0;
            }
        }

        /*--------------------------------------------------------------
# Navigation Menu
--------------------------------------------------------------*/
        /**
* Desktop Navigation 
*/
        .navbar {
            padding: 0;
        }

        .navbar ul {
            margin: 0;
            padding: 0;
            display: flex;
            list-style: none;
            align-items: center;
        }

        .navbar li {
            position: relative;
        }

        .navbar>ul>li {
            white-space: nowrap;
            padding: 10px 0 10px 12px;
        }

        .navbar a,
        .navbar a:focus {
            display: flex;
            align-items: center;
            justify-content: space-between;
            color: rgba(202, 206, 221, 0.8);
            font-family: "Raleway", sans-serif;
            font-weight: 600;
            font-size: 14px;
            white-space: nowrap;
            transition: 0.3s;
            position: relative;
            padding: 6px 4px;
        }

        .navbar a i,
        .navbar a:focus i {
            font-size: 12px;
            line-height: 0;
            margin-left: 5px;
        }

        .navbar>ul>li>a:before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -6px;
            left: 0;
            background-color: #f82249;
            visibility: hidden;
            transition: all 0.3s ease-in-out 0s;
        }

        .navbar a:hover:before,
        .navbar li:hover>a:before,
        .navbar .active:before {
            visibility: visible;
            width: 100%;
        }

        .navbar a:hover,
        .navbar .active,
        .navbar .active:focus,
        .navbar li:hover>a {
            color: #fff;
        }

        .navbar .dropdown ul {
            display: block;
            position: absolute;
            left: 12px;
            top: calc(100% + 30px);
            margin: 0;
            padding: 10px 0;
            z-index: 99;
            opacity: 0;
            visibility: hidden;
            background: #fff;
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
            transition: 0.3s;
        }

        .navbar .dropdown ul li {
            min-width: 200px;
        }

        .navbar .dropdown ul a {
            padding: 10px 20px;
            font-size: 14px;
            text-transform: none;
            color: #060c22;
        }

        .navbar .dropdown ul a i {
            font-size: 12px;
        }

        .navbar .dropdown ul a:hover,
        .navbar .dropdown ul .active:hover,
        .navbar .dropdown ul li:hover>a {
            color: #f82249;
        }

        .navbar .dropdown:hover>ul {
            opacity: 1;
            top: 100%;
            visibility: visible;
        }

        .navbar .dropdown .dropdown ul {
            top: 0;
            left: calc(100% - 30px);
            visibility: hidden;
        }

        .navbar .dropdown .dropdown:hover>ul {
            opacity: 1;
            top: 0;
            left: 100%;
            visibility: visible;
        }

        @media (max-width: 1366px) {
            .navbar .dropdown .dropdown ul {
                left: -90%;
            }

            .navbar .dropdown .dropdown:hover>ul {
                left: -100%;
            }
        }

        /**
* Mobile Navigation 
*/
        .mobile-nav-toggle {
            color: #fff;
            font-size: 28px;
            cursor: pointer;
            display: none;
            line-height: 0;
            transition: 0.5s;
        }

        @media (max-width: 991px) {
            .mobile-nav-toggle {
                display: block;
            }

            .navbar ul {
                display: none;
            }
        }

        .navbar-mobile {
            position: fixed;
            overflow: hidden;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.9);
            transition: 0.3s;
            z-index: 999;
        }

        .navbar-mobile .mobile-nav-toggle {
            position: absolute;
            top: 15px;
            right: 15px;
        }

        .navbar-mobile ul {
            display: block;
            position: absolute;
            top: 55px;
            right: 15px;
            bottom: 15px;
            left: 15px;
            padding: 10px 0;
            background-color: #fff;
            overflow-y: auto;
            transition: 0.3s;
        }

        .navbar-mobile>ul>li {
            padding: 0;
        }

        .navbar-mobile a:hover:before,
        .navbar-mobile li:hover>a:before,
        .navbar-mobile .active:before {
            visibility: hidden;
        }

        .navbar-mobile a,
        .navbar-mobile a:focus {
            padding: 10px 20px;
            font-size: 15px;
            color: #060c22;
        }

        .navbar-mobile a:hover,
        .navbar-mobile .active,
        .navbar-mobile li:hover>a {
            color: #f82249;
        }

        .navbar-mobile .getstarted,
        .navbar-mobile .getstarted:focus {
            margin: 15px;
        }

        .navbar-mobile .dropdown ul {
            position: static;
            display: none;
            margin: 10px 20px;
            padding: 10px 0;
            z-index: 99;
            opacity: 1;
            visibility: visible;
            background: #fff;
            box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
        }

        .navbar-mobile .dropdown ul li {
            min-width: 200px;
        }

        .navbar-mobile .dropdown ul a {
            padding: 10px 20px;
        }

        .navbar-mobile .dropdown ul a i {
            font-size: 12px;
        }

        .navbar-mobile .dropdown ul a:hover,
        .navbar-mobile .dropdown ul .active:hover,
        .navbar-mobile .dropdown ul li:hover>a {
            color: #f82249;
        }

        .navbar-mobile .dropdown>.dropdown-active {
            display: block;
        }

        /*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
        #hero {
            width: 100%;
            height: 100vh;
            background: url(assets/img/salafin.jpg) top center;
            background-size: cover;
            overflow: hidden;
            position: relative;
        }

        @media (min-width: 1024px) {
            #hero {
                background-attachment: fixed;
            }
        }

        #hero:before {
            content: "";
            background: rgba(6, 12, 34, 0.8);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #hero .hero-container {
            position: absolute;
            bottom: 0;
            left: 0;
            top: 90px;
            right: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            text-align: center;
            padding: 0 15px;
        }

        @media (max-width: 991px) {
            #hero .hero-container {
                top: 70px;
            }
        }

        #hero h1 {
            color: #fff;
            font-family: "Raleway", sans-serif;
            font-size: 56px;
            font-weight: 600;
            text-transform: uppercase;
        }

        #hero h1 span {
            color: #f82249;
        }

        @media (max-width: 991px) {
            #hero h1 {
                font-size: 34px;
            }
        }

        #hero p {
            color: #ebebeb;
            font-weight: 700;
            font-size: 20px;
        }

        @media (max-width: 991px) {
            #hero p {
                font-size: 16px;
            }
        }

        #hero .play-btn {
            width: 94px;
            height: 94px;
            background: radial-gradient(#f82249 50%, rgba(101, 111, 150, 0.15) 52%);
            border-radius: 50%;
            display: block;
            position: relative;
            overflow: hidden;
        }

        #hero .play-btn::after {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid #fff;
            z-index: 100;
            transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
        }

        #hero .play-btn:before {
            content: "";
            position: absolute;
            width: 120px;
            height: 120px;
            animation-delay: 0s;
            animation: pulsate-btn 2s;
            animation-direction: forwards;
            animation-iteration-count: infinite;
            animation-timing-function: steps;
            opacity: 1;
            border-radius: 50%;
            border: 2px solid rgba(163, 163, 163, 0.4);
            top: -15%;
            left: -15%;
            background: rgba(198, 16, 0, 0);
        }

        #hero .play-btn:hover::after {
            border-left: 15px solid #f82249;
            transform: scale(20);
        }

        #hero .play-btn:hover::before {
            content: "";
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-40%) translateY(-50%);
            width: 0;
            height: 0;
            border: none;
            border-top: 10px solid transparent;
            border-bottom: 10px solid transparent;
            border-left: 15px solid #fff;
            z-index: 200;
            animation: none;
            border-radius: 0;
        }

        #hero .about-btn {
            font-family: "Raleway", sans-serif;
            font-weight: 500;
            font-size: 14px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 12px 32px;
            border-radius: 50px;
            transition: 0.5s;
            line-height: 1;
            margin: 10px;
            color: #fff;
            animation-delay: 0.8s;
            border: 2px solid #f82249;
        }

        #hero .about-btn:hover {
            background: #f82249;
            color: #fff;
        }

        @keyframes pulsate-btn {
            0% {
                transform: scale(0.6, 0.6);
                opacity: 1;
            }

            100% {
                transform: scale(1, 1);
                opacity: 0;
            }
        }

        /*--------------------------------------------------------------
# About Section
--------------------------------------------------------------*/
        #about {
            background: url("assets/img/about-bg.jpg");
            background-size: cover;
            overflow: hidden;
            position: relative;
            color: #fff;
            padding: 60px 0 40px 0;
        }

        @media (min-width: 1024px) {
            #about {
                background-attachment: fixed;
            }
        }

        #about:before {
            content: "";
            background: rgba(13, 20, 41, 0.8);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #about h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #fff;
        }

        #about h3 {
            font-size: 18px;
            font-weight: bold;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #fff;
        }

        #about p {
            font-size: 14px;
            margin-bottom: 20px;
            color: #fff;
        }

        /*--------------------------------------------------------------
# Speakers Section
--------------------------------------------------------------*/
        #speakers {
            padding: 60px 0 30px 0;
        }

        #speakers .speaker {
            position: relative;
            overflow: hidden;
            margin-bottom: 30px;
        }

        #speakers .speaker .details {
            background: rgba(6, 12, 34, 0.76);
            position: absolute;
            left: 0;
            bottom: -40px;
            right: 0;
            text-align: center;
            padding-top: 10px;
            transition: all 300ms cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        #speakers .speaker .details h3 {
            color: #fff;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        #speakers .speaker .details p {
            color: #fff;
            font-size: 15px;
            margin-bottom: 10px;
            font-style: italic;
        }

        #speakers .speaker .details .social {
            height: 40px;
        }

        #speakers .speaker .details .social i {
            line-height: 0;
            margin: 0 2px;
        }

        #speakers .speaker .details a {
            color: #fff;
        }

        #speakers .speaker .details a:hover {
            color: #f82249;
        }

        #speakers .speaker:hover .details {
            bottom: 0;
        }

        #speakers-details {
            padding: 60px 0;
        }

        #speakers-details .details h2 {
            color: #112363;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        #speakers-details .details .social {
            margin-bottom: 15px;
        }

        #speakers-details .details .social a {
            background: #e9edfb;
            color: #112363;
            line-height: 1;
            display: inline-block;
            text-align: center;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        #speakers-details .details .social a:hover {
            background: #f82249;
            color: #fff;
        }

        #speakers-details .details .social a i {
            font-size: 16px;
            line-height: 0;
        }

        #speakers-details .details p {
            color: #112363;
            font-size: 15px;
            margin-bottom: 10px;
        }

        /*--------------------------------------------------------------
# Schedule Section
--------------------------------------------------------------*/
        #schedule {
            padding: 60px 0 60px 0;
        }

        #schedule .nav-tabs {
            text-align: center;
            margin: auto;
            display: block;
            border-bottom: 0;
            margin-bottom: 30px;
        }

        #schedule .nav-tabs li {
            display: inline-block;
            margin-bottom: 0;
        }

        #schedule .nav-tabs a {
            border: none;
            border-radius: 50px;
            font-weight: 600;
            background-color: #0e1b4d;
            color: #fff;
            padding: 10px 100px;
        }

        @media (max-width: 991px) {
            #schedule .nav-tabs a {
                padding: 8px 60px;
            }
        }

        @media (max-width: 767px) {
            #schedule .nav-tabs a {
                padding: 8px 50px;
            }
        }

        @media (max-width: 480px) {
            #schedule .nav-tabs a {
                padding: 8px 30px;
            }
        }

        #schedule .nav-tabs a.active {
            background-color: #f82249;
            color: #fff;
        }

        #schedule .sub-heading {
            text-align: center;
            font-size: 18px;
            font-style: italic;
            margin: 0 auto 30px auto;
        }

        @media (min-width: 991px) {
            #schedule .sub-heading {
                width: 75%;
            }
        }

        #schedule .tab-pane {
            transition: ease-in-out 0.2s;
        }

        #schedule .schedule-item {
            border-bottom: 1px solid #cad4f6;
            padding-top: 15px;
            padding-bottom: 15px;
            transition: background-color ease-in-out 0.3s;
        }

        #schedule .schedule-item:hover {
            background-color: #fff;
        }

        #schedule .schedule-item time {
            padding-bottom: 5px;
            display: inline-block;
        }

        #schedule .schedule-item .speaker {
            width: 60px;
            height: 60px;
            overflow: hidden;
            border-radius: 50%;
            float: left;
            margin: 0 10px 10px 0;
        }

        #schedule .schedule-item .speaker img {
            height: 100%;
            transform: translateX(-50%);
            margin-left: 50%;
            transition: all ease-in-out 0.3s;
        }

        #schedule .schedule-item h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        #schedule .schedule-item h4 span {
            font-style: italic;
            color: #19328e;
            font-weight: normal;
            font-size: 16px;
        }

        #schedule .schedule-item p {
            font-style: italic;
            color: #152b79;
            margin-bottom: 0;
        }

        /*--------------------------------------------------------------
# Venue Section
--------------------------------------------------------------*/
        #venue {
            padding: 60px 0;
        }

        #venue .container-fluid {
            margin-bottom: 3px;
        }

        #venue .venue-map iframe {
            width: 100%;
            height: 100%;
            min-height: 300px;
        }

        #venue .venue-info {
            background: url("assets/img/venue-info-bg.jpg") top center no-repeat;
            background-size: cover;
            position: relative;
            padding-top: 60px;
            padding-bottom: 60px;
        }

        #venue .venue-info:before {
            content: "";
            background: rgba(13, 20, 41, 0.8);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        #venue .venue-info h3 {
            font-size: 36px;
            font-weight: 700;
            color: #fff;
        }

        @media (max-width: 574px) {
            #venue .venue-info h3 {
                font-size: 24px;
            }
        }

        #venue .venue-info p {
            color: #fff;
            margin-bottom: 0;
        }

        #venue .venue-gallery-container {
            padding-right: 12px;
        }

        #venue .venue-gallery {
            overflow: hidden;
            border-right: 3px solid #fff;
            border-bottom: 3px solid #fff;
        }

        #venue .venue-gallery img {
            transition: all ease-in-out 0.4s;
        }

        #venue .venue-gallery:hover img {
            transform: scale(1.1);
        }

        /*--------------------------------------------------------------
# Hotels Section
--------------------------------------------------------------*/
        #hotels {
            padding: 60px 0;
        }

        #hotels .hotel {
            border: 1px solid #e0e5fa;
            background: #fff;
            margin-bottom: 30px;
        }

        #hotels .hotel:hover .hotel-img img {
            transform: scale(1.1);
        }

        #hotels .hotel-img {
            overflow: hidden;
            margin-bottom: 15px;
        }

        #hotels .hotel-img img {
            transition: 0.3s ease-in-out;
        }

        #hotels h3 {
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 5px;
            padding: 0 20px;
        }

        #hotels a {
            color: #152b79;
        }

        #hotels a:hover {
            color: #f82249;
        }

        #hotels .stars {
            padding: 0 20px;
            margin-bottom: 5px;
        }

        #hotels .stars i {
            color: rgb(255, 195, 29);
        }

        #hotels p {
            padding: 0 20px;
            margin-bottom: 20px;
            color: #060c22;
            font-style: italic;
            font-size: 15px;
        }

        /*--------------------------------------------------------------
# Gallery Section
--------------------------------------------------------------*/
        #gallery {
            padding: 60px;
            overflow: hidden;
        }

        #gallery .swiper-pagination {
            margin-top: 20px;
            position: relative;
        }

        #gallery .swiper-pagination .swiper-pagination-bullet {
            width: 12px;
            height: 12px;
            background-color: #fff;
            opacity: 1;
            border: 1px solid #f82249;
        }

        #gallery .swiper-pagination .swiper-pagination-bullet-active {
            background-color: #f82249;
        }

        #gallery .swiper-slide-active {
            text-align: center;
        }

        @media (min-width: 992px) {
            #gallery .swiper-wrapper {
                padding: 40px 0;
            }

            #gallery .swiper-slide-active {
                border: 5px solid #f82249;
                padding: 4px;
                background: #fff;
                z-index: 1;
                transform: scale(1.15);
                margin-top: 6px;
            }
        }

        /*--------------------------------------------------------------
# Sponsors Section
--------------------------------------------------------------*/
        #supporters {
            padding: 60px 0;
        }

        #supporters .supporters-wrap {
            border-top: 1px solid #e0e5fa;
            border-left: 1px solid #e0e5fa;
            margin-bottom: 30px;
        }

        #supporters .supporter-logo {
            padding: 30px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-right: 1px solid #e0e5fa;
            border-bottom: 1px solid #e0e5fa;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.5);
            height: 160px;
        }

        #supporters .supporter-logo:hover img {
            transform: scale(1.2);
        }

        #supporters img {
            transition: all 0.4s ease-in-out;
        }

        /*--------------------------------------------------------------
# F.A.Q Section
--------------------------------------------------------------*/
        #faq {
            padding: 60px 0;
        }

        #faq .faq-list {
            padding: 0;
            list-style: none;
        }

        #faq .faq-list li {
            border-bottom: 1px solid #e9eaed;
            margin-bottom: 20px;
            padding-bottom: 20px;
        }

        #faq .faq-list .question {
            display: block;
            position: relative;
            font-family: #f82249;
            font-size: 18px;
            line-height: 24px;
            font-weight: 400;
            padding-left: 25px;
            cursor: pointer;
            color: #e0072f;
            transition: 0.3s;
        }

        #faq .faq-list i {
            font-size: 16px;
            position: absolute;
            left: 0;
            top: -2px;
        }

        #faq .faq-list p {
            margin-bottom: 0;
            padding: 10px 0 0 25px;
        }

        #faq .faq-list .icon-show {
            display: none;
        }

        #faq .faq-list .collapsed {
            color: black;
        }

        #faq .faq-list .collapsed:hover {
            color: #f82249;
        }

        #faq .faq-list .collapsed .icon-show {
            display: inline-block;
            transition: 0.6s;
        }

        #faq .faq-list .collapsed .icon-close {
            display: none;
            transition: 0.6s;
        }

        /*--------------------------------------------------------------
# Subscribe Section
--------------------------------------------------------------*/
        #subscribe {
            padding: 60px;
            background: url(assets/img/subscribe-bg.jpg) center center no-repeat;
            background-size: cover;
            overflow: hidden;
            position: relative;
        }

        #subscribe:before {
            content: "";
            background: rgba(6, 12, 34, 0.6);
            position: absolute;
            bottom: 0;
            top: 0;
            left: 0;
            right: 0;
        }

        @media (min-width: 1024px) {
            #subscribe {
                background-attachment: fixed;
            }
        }

        #subscribe .section-header h2,
        #subscribe p {
            color: #fff;
        }

        #subscribe input {
            background: #fff;
            color: #060c22;
            border: 0;
            outline: none;
            margin: 0;
            padding: 9px 20px;
            border-radius: 50px;
            font-size: 14px;
        }

        @media (min-width: 767px) {
            #subscribe input {
                min-width: 400px;
            }
        }

        #subscribe button {

            padding: 9px 25px;
            cursor: pointer;

            color: #fff;
            transition: all 0.3s ease;
            outline: none;
            font-size: 14px;
            border-radius: 50px;
        }

        #subscribe button:hover {
            background: #e0072f;
        }

        @media (max-width: 460px) {
            #subscribe button {
                margin-top: 10px;
            }
        }

        /*--------------------------------------------------------------
# Options Section
--------------------------------------------------------------*/
        #choix-credit,
        #choix-revcf {
            padding: 60px 0;
        }

        #choix-credit .card,
        #choix-revcf .card {
            border: none;
            border-radius: 5px;
            transition: all 0.3s ease-in-out;
            box-shadow: 0 10px 25px 0 rgba(6, 12, 34, 0.1);
        }

        #choix-credit .card:hover,
        #choix-revcf .card:hover {
            box-shadow: 0 10px 35px 0 rgba(6, 12, 34, 0.2);
        }

        #choix-credit .card hr,
        #choix-revcf .card hr {
            margin: 25px 0;
        }

        #choix-credit .card .card-title,
        #choix-revcf .card .card-title {
            margin: 10px 0;
            font-size: 14px;
            letter-spacing: 1px;
            font-weight: bold;
        }

        #choix-credit .card .card-price,
        #choix-revcf .card .card-price {
            font-size: 48px;
            margin: 0;
        }

        #choix-credit .card ul li,
        #choix-revcf .card ul li {
            margin-bottom: 20px;
        }

        #choix-credit .card .text-muted,
        #choix-revcf .card .text-muted {
            opacity: 0.7;
        }

        #choix-credit .card .btn,
        #choix-revcf .card .btn {
            font-size: 15px;
            border-radius: 50px;
            padding: 10px 40px;
            transition: all 0.2s;
            background-color: #f82249;
            border: 0;
            color: #fff;
        }

        #choix-credit .card .btn:hover,
        #choix-revcf .card .btn:hover {
            background-color: #e0072f;
        }

        #choix-credit #buy-ticket-modal input,
        #choix-credit #buy-ticket-modal select,
        #choix-revcf #buy-ticket-modal input,
        #choix-revcf #buy-ticket-modal select {
            border-radius: 0;
        }

        #choix-credit #buy-ticket-modal .btn,
        #choix-revcf #buy-ticket-modal .btn {
            font-size: 15px;
            border-radius: 50px;
            padding: 10px 40px;
            transition: all 0.2s;
            background-color: #f82249;
            border: 0;
            color: #fff;
        }

        #choix-credit #buy-ticket-modal .btn:hover,
        #choix-revcf #buy-ticket-modal .btn:hover {
            background-color: #e0072f;
        }

        /*--------------------------------------------------------------
# Contact Section
--------------------------------------------------------------*/
        #contact {
            padding: 60px 0;
        }

        #contact .contact-info {
            margin-bottom: 20px;
            text-align: center;
        }

        #contact .contact-info i {
            font-size: 48px;
            display: inline-block;
            margin-bottom: 10px;
            color: #f82249;
        }

        #contact .contact-info address,
        #contact .contact-info p {
            margin-bottom: 0;
            color: #112363;
        }

        #contact .contact-info h3 {
            font-size: 18px;
            margin-bottom: 15px;
            font-weight: bold;
            text-transform: uppercase;
            color: #112363;
        }

        #contact .contact-info a {
            color: #4869df;
        }

        #contact .contact-info a:hover {
            color: #f82249;
        }

        #contact .contact-address,
        #contact .contact-phone,
        #contact .contact-email {
            margin-bottom: 20px;
        }

        @media (min-width: 768px) {

            #contact .contact-address,
            #contact .contact-phone,
            #contact .contact-email {
                padding: 20px 0;
            }
        }

        @media (min-width: 768px) {
            #contact .contact-phone {
                border-left: 1px solid #ddd;
                border-right: 1px solid #ddd;
            }
        }

        #contact .php-email-form .error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        #contact .php-email-form .error-message br+br {
            margin-top: 25px;
        }

        #contact .php-email-form .sent-message {
            display: none;
            color: #fff;
            background: #18d26e;
            text-align: center;
            padding: 15px;
            font-weight: 600;
        }

        #contact .php-email-form .loading {
            display: none;
            background: #fff;
            text-align: center;
            padding: 15px;
        }

        #contact .php-email-form .loading:before {
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid #18d26e;
            border-top-color: #eee;
            animation: animate-loading 1s linear infinite;
        }

        #contact .php-email-form input,
        #contact .php-email-form textarea {
            border-radius: 0;
            box-shadow: none;
            font-size: 14px;
        }

        #contact .php-email-form input:focus,
        #contact .php-email-form textarea:focus {
            border-color: #f82249;
        }

        #contact .php-email-form input {
            padding: 10px 15px;
        }

        #contact .php-email-form textarea {
            padding: 12px 15px;
        }

        #contact .php-email-form button[type=submit] {
            background: #f82249;
            border: 0;
            padding: 10px 40px;
            color: #fff;
            transition: 0.4s;
            border-radius: 50px;
            cursor: pointer;
        }

        #contact .php-email-form button[type=submit]:hover {
            background: #e0072f;
        }

        @keyframes animate-loading {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/
        #footer {
            background: #101522;
            padding: 0 0 25px 0;
            color: #eee;
            font-size: 14px;
        }

        #footer .footer-top {
            background: #040919;
            padding: 60px 0 30px 0;
        }

        #footer .footer-top .footer-info {
            margin-bottom: 30px;
        }

        #footer .footer-top .footer-info h3 {
            font-size: 26px;
            margin: 0 0 20px 0;
            padding: 2px 0 2px 0;
            line-height: 1;
            font-family: "Raleway", sans-serif;
            font-weight: 700;
            color: #fff;
        }

        #footer .footer-top .footer-info img {
            height: 40px;
            margin-bottom: 10px;
        }

        #footer .footer-top .footer-info p {
            font-size: 14px;
            line-height: 24px;
            margin-bottom: 0;
            font-family: "Raleway", sans-serif;
            color: #fff;
        }

        #footer .footer-top .social-links a {
            display: inline-block;
            background: #222636;
            color: #eee;
            line-height: 1;
            margin-right: 4px;
            border-radius: 50%;
            width: 36px;
            height: 36px;
            transition: 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        #footer .footer-top .social-links a i {
            line-height: 0;
            font-size: 16px;
        }

        #footer .footer-top .social-links a:hover {
            background: #f82249;
            color: #fff;
        }

        #footer .footer-top h4 {
            font-size: 14px;
            font-weight: bold;
            color: #fff;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 12px;
            border-bottom: 2px solid #f82249;
        }

        #footer .footer-top .footer-links {
            margin-bottom: 30px;
        }

        #footer .footer-top .footer-links ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        #footer .footer-top .footer-links ul i {
            padding-right: 5px;
            color: #f82249;
            font-size: 18px;
        }

        #footer .footer-top .footer-links ul li {
            border-bottom: 1px solid #262c44;
            padding: 10px 0;
        }

        #footer .footer-top .footer-links ul li:first-child {
            padding-top: 0;
        }

        #footer .footer-top .footer-links ul a {
            color: #eee;
        }

        #footer .footer-top .footer-links ul a:hover {
            color: #f82249;
        }

        #footer .footer-top .footer-contact {
            margin-bottom: 30px;
        }

        #footer .footer-top .footer-contact p {
            line-height: 26px;
        }

        #footer .footer-top .footer-newsletter {
            margin-bottom: 30px;
        }

        #footer .footer-top .footer-newsletter input[type=email] {
            border: 0;
            padding: 6px 8px;
            width: 65%;
        }

        #footer .footer-top .footer-newsletter input[type=submit] {
            background: #f82249;
            border: 0;
            width: 35%;
            padding: 6px 0;
            text-align: center;
            color: #fff;
            transition: 0.3s;
            cursor: pointer;
        }

        #footer .footer-top .footer-newsletter input[type=submit]:hover {
            background: #e0072f;
        }

        #footer .copyright {
            text-align: center;
            padding-top: 30px;
        }

        #footer .credits {
            text-align: center;
            font-size: 13px;
            color: #ddd;
        }
    </style>

    <style>
        ::-webkit-scrollbar {
            width: 2px;
        }

        ::-webkit-scrollbar-thumb {
            background-color: purple;
            /* border-radius: 6px; */

        }

        .choice-img {
            width: 100%;
            height: 200px;
        }

        .option {
            width: 150px;
        }

        #choix-revcf {
            display: none;
        }

        .error-text {
            color: #721c24;
            padding: 8px 10px;
            text-align: center;
            border-radius: 5px;
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            margin-bottom: 10px;
            display: none;
        }

        .modal-body {
            position: relative;
        }

        .spinner-process {
            display: none;
            position: absolute;
            left: 45%;
            top: 35%;
        }
    </style>
</head>

<body>



    <main id="main">
        
        <!-- ======= switch-option Section ======= -->
        <section id="subscribe">

            <div class="container" data-aos="zoom-in">

                <div class="section-header mt-5">
                    <h2>Espace travail</h2>
                    <p>Choisir la solution de financement la mieux adaptée à vos projets.</p>
                </div>


                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-10 d-flex align-items-center justify-content-center">
                        <button type="button" onclick="displayControl(this)" id="credit"
                            class="option btn btn-outline-danger active">Simulateur</button>
                        <button type="button" onclick="displayControl(this)" id="revcf"
                            class="option btn btn-outline-danger ms-2">REVCF</button>
                    </div>
                </div>


            </div>
        </section><!-- End switch-option Section -->
        <ul class="d-flex float-end align-items-center " style=" list-style: none; ">
            <li class="nav-item dropdown">

                <a class="nav-link nav-profile d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                    <span class="d-none d-md-block dropdown-toggle p-2"
                        style="color:  ; font-size: 35px; background-color: rgba(202, 206, 221, 0.5); border-radius: 10px; ">B.
                        OUSSENI</span>
                </a>

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>BORO OUSSENI</h6>
                        <span>Commerçant</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class="bi bi-gear"></i>
                            <span>Mes infos personnelles</span>
                        </a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>


                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="./logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Je me déconnecte</span>
                        </a>
                    </li>

                </ul>
            </li>

        </ul>
        <!-- ======= Option Section ======= -->
        <section id="choix-credit" class="section-with-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">

                    <h2>FORMULES SUR MESURE <i class="bi bi-chevron-right" style="color: red;"></i> SIMULATION</h2>
                    <p>Choisir la solution de financement la mieux adaptée à vos projets</p>
                </div>

                <div class="row">
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center"> Crédit AUTO</h5>
                                <h6 class="card-price text-center"><i class="bi bi-app-indicator"></i></h6>
                                <hr>
                                <img class="choice-img" src="assets/img/auto.jpg" alt="">
                                <p class="col-lg-12 description mt-1" style="margin-top: -10%; color: gray; ">Des
                                    solutions de
                                    crédits adaptées à votre projet automobile : achat de voiture neuve ou
                                    location de voiture
                                </p>

                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-credit-auto" data-ticket-type="standard-access">Choisir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center"> Crédit PERSONNEL</h5>
                                <h6 class="card-price text-center"><i class="bi bi-receipt"></i></h6>
                                <hr>
                                <img class="choice-img" src="assets/img/salafin4.jpg" alt="">
                                <p class="col-lg-12 description mt-1" style="margin-top: -10%; color: gray; ">Vous
                                    exercez une profession libérale ? SALAFIN vous accompagne dans la réalisation de vos
                                    projets professionnels et personnels.
                                </p>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-credit-personnel" data-ticket-type="pro-access">
                                        Choisir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pro Tier -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Crédit RENOUVELABLE</h5>
                                <h6 class="card-price text-center"><i class="bi bi-recycle"></i></h6>
                                <hr>
                                <img class="choice-img" src="assets/img/salafin3.jpg" alt="">

                                <p class="col-lg-12 description mt-1" style="margin-top: -10%; color: gray; ">Le crédit
                                    renouvelable SALAFIN est une réserve d’argent qui se reconstitue, dans la limite du
                                    plafond initialement fixé
                                </p>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-credit-renouvelable"
                                        data-ticket-type="premium-access">Choisir</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Modal Form -->
            <div id="modal-credit-auto" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Critère auto</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="#" id="modal-form-auto">
                                <div class="spinner-border text-danger spinner-process" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="error-text col-12"></div>
                                <div class="form-group mt-3">
                                    <select id="idBrand" name="BRAND" class="form-select" onchange="loadProduct()">

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <!-- <i class="bi bi-vinyl-fill"></i> -->
                                    <select id="idProduct" name="PRODUCT" class="form-select" onchange="loadTariff()">

                                    </select>
                                </div>
                                <div class="form-group mt-3">
                                    <select id="idTariff" name="TARIFF" class="form-select">

                                    </select>
                                </div>
                                <div class="text-center mt-3">
                                    <input type="" name="BTN_AUTO" class="btn btn-outline-danger btn-form-auto"
                                        value="Passer à la simulation">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal Form -->
            <div id="modal-credit-personnel" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Remplir le formulaire pour passer à la simulation</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="modal-form-personnel" action="#">
                                <div class="spinner-border text-danger spinner-process" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="error-text col-12"></div>
                                <div class="form-group mt-3">
                                    <select id="ticket-type" name="PROFESSION" class="form-select">
                                        <option value="">-- S'agit t-il d'un ? --</option>
                                        <option value="SALARIE">SALARIE</option>
                                        <option value="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                        <option value="COMMERCANT">COMMERCANT</option>
                                        <option value="SOCIETE">SOCIETE</option>
                                    </select>
                                </div>
                                <div class="row form-group mt-3">
                                    <div class="col-lg-5 ms-2">
                                        <label for="AMOUNT" class="form-label">Montant (en DH) </label>
                                        <input type="number" name="AMOUNT" class="form-control" id="AMOUNT">
                                    </div>
                                    <div class="col-lg-5 ms-2">
                                        <label for="DURATION" class="form-label">Durée (en mois) </label>
                                        <input type="number" name="DURATION" class="form-control" id="DURATION">
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <input type="" name="BTN_PERSONNEL"
                                        class="btn btn-outline-danger btn-form-personnel"
                                        value="Passer à la simulation">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- Modal Form -->
            <div id="modal-credit-renouvelable" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Remplir le formulaire pour passer à la simulation</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="modal-form-renouvelable" action="#">
                                <div class="spinner-border text-danger spinner-process" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="error-text col-12"></div>
                                <div class="form-group mt-3">
                                    <select id="ticket-type" name="PROFESSION" class="form-select">
                                        <option value="">-- S'agit t-il d'un ? --</option>
                                        <option value="SALARIE">SALARIE</option>
                                        <option value="FONCTIONNAIRE">FONCTIONNAIRE</option>
                                        <option value="COMMERCANT">COMMERCANT</option>
                                        <option value="SOCIETE">SOCIETE</option>
                                    </select>
                                </div>
                                <div class="row form-group mt-3">
                                    <div class="col-lg-5 ms-2">
                                        <label for="AMOUNT" class="form-label">Montant (en DH) </label>
                                        <input type="number" name="AMOUNT" class="form-control" id="AMOUNT">
                                    </div>
                                    <div class="col-lg-5 ms-2">
                                        <label for="DURATION" class="form-label">Durée (en mois) </label>
                                        <input type="number" name="DURATION" class="form-control" id="DURATION">
                                    </div>
                                </div>

                                <div class="text-center mt-3">
                                    <input type="" name="BTN_RENOUVELABLE"
                                        class="btn btn-outline-danger btn-form-renouvelable"
                                        value="Passer à la simulation">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

        </section><!-- End Option Section -->
        <!-- ======= Option Section ======= -->
        <section id="choix-revcf" class="section-with-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2>FORMULES SUR MESURE <i class="bi bi-chevron-right" style="color: red;"></i> REVCF</h2>
                    <p>Effectuer une revision de condition financière</p>
                </div>

                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="card mb-5 mb-lg-0">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center"> Demander une REVCF</h5>
                                <h6 class="card-price text-center"><i class="bi bi-box-arrow-up-right"></i></h6>
                                <hr>
                                <img class="choice-img" src="assets/img/salafin4.jpg" alt="">
                                <p class="col-lg-12 description mt-1" style="margin-top: -10%; color: gray; ">Continuer
                                    avec cette option pour effectuer une demande de revision de condition financière.
                                </p>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-revcf-ask" data-ticket-type="pro-access">
                                        Choisir</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pro Tier -->
                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-muted text-uppercase text-center">Analyser une REVCF</h5>
                                <h6 class="card-price text-center"><i class="bi bi-filter-square-fill"></i></h6>
                                <hr>
                                <img class="choice-img" src="assets/img/analyse_revcf.jpg" alt="">

                                <p class="col-lg-12 description mt-1" style="margin-top: -10%; color: gray; ">Continuer
                                    avec cette option pour obtenir une analyse approfondie de la situation financière.
                                </p>
                                <hr>
                                <div class="text-center">
                                    <button type="button" class="btn" data-bs-toggle="modal"
                                        data-bs-target="#modal-revcf-check"
                                        data-ticket-type="premium-access">Choisir</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Modal Form : revcf-ask-->
            <div id="modal-revcf-ask" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content align-items-center justify-content-center">
                        <div class="modal-header">
                            <h4 class="modal-title">Renseigner le N° de dossier</h4>
                            <button type="button" class="btn-close pl-3" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body col-lg-8">
                            <form method="POST" class="" id="modal-form-ask-revcf" action="#">
                                <div class="spinner-border text-danger spinner-process" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="error-text col-12"></div>
                                <div class="row form-group mt-3">
                                    <div class="col-lg-12">
                                        <!-- <label for="AMOUNT" class="form-label">Numéro dossier </label> -->
                                        <input type="number" name="NUMDOSS" placeholder="Rechercher le N° dossier"
                                            class="form-control p-4" id="mySearchInputAsk">
                                    </div>

                                </div>

                                <div class="row text-center mt-3">
                                    <input type="" name="BTN_ASK_REVCF"
                                        class="btn btn-outline-danger btn-ask-revcf col-lg-12"
                                        value="Demander une REVCF pour ce dossier">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal revcf-ask-->

            <!-- Modal Form : revcf-ask-->
            <div id="modal-revcf-check" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content align-items-center justify-content-center">
                        <div class="modal-header">
                            <h4 class="modal-title">Renseigner le N° de dossier</h4>
                            <button type="button" class="btn-close pl-3" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body col-lg-8">
                            <form method="POST" class="" id="modal-form-check-revcf" action="#">
                                <div class="spinner-border text-danger spinner-process" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                                <div class="error-text col-12"></div>
                                <div class="row form-group mt-3">
                                    <div class="col-lg-12">
                                        <!-- <label for="AMOUNT" class="form-label">Numéro dossier </label> -->
                                        <input type="number" name="NUMDOSS" placeholder="Rechercher le N° dossier"
                                            class="form-control p-4" id="mySearchInputCheck">
                                    </div>

                                </div>

                                <div class="row text-center mt-3">
                                    <input type="" name="BTN_CHECK_REVCF"
                                        class="btn btn-outline-danger btn-check-revcf col-lg-12"
                                        value="Analyser ce dossier">
                                </div>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal revcf-ask-->
        </section><!-- End Option Section -->


    </main><!-- End #main -->

    <?php include "footer.php" ?>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="assets/js/jquery.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main-event.js"></script>


    <script>
        window.addEventListener("load", function () {
            loadBrand();
        });

        const formCheck = document.getElementById("modal-form-check-revcf"),
            btnformCheck = formCheck.querySelector(".btn-check-revcf"),
            errorTextCheckRevcf = formCheck.querySelector(".error-text");
        preloaderCheckRevcf = formCheck.querySelector(".spinner-process");

        formCheck.onsubmit = (e) => {
            e.preventDefault();
        };

        btnformCheck.onclick = () => {
            preloaderCheckRevcf.style.display = "block";
            errorTextCheckRevcf.style.display = "none";
            formCheck.style.opacity = 0.5;

            setTimeout(function () {
                preloaderCheckRevcf.style.display = "none";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/middle-process.php", true);

                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            let responseData = JSON.parse(xhr.responseText);

                            if (responseData.status === "success") {
                                formCheck.style.pointerEvents = "all";
                                location.href = "sim-fx?tag=fx&numdoss=" + responseData.message;

                            } else {
                                formCheck.style.pointerEvents = "all";
                                formCheck.style.opacity = 1;
                                errorTextCheckRevcf.style.display = "block";
                                errorTextCheckRevcf.innerHTML = responseData.message;
                            }
                        }
                    }
                };

                let formData = new FormData(formCheck);
                xhr.send(formData);
            }, 500);
        };


        const formRevcf = document.getElementById("modal-form-ask-revcf"),
            btnformRevcf = formRevcf.querySelector(".btn-ask-revcf"),
            errorTextAskRevcf = formRevcf.querySelector(".error-text");
        preloaderAskRevcf = formRevcf.querySelector(".spinner-process");

        formRevcf.onsubmit = (e) => {
            e.preventDefault();
        };

        btnformRevcf.onclick = () => {
            preloaderAskRevcf.style.display = "block";
            errorTextAskRevcf.style.display = "none";
            formRevcf.style.opacity = 0.5;

            setTimeout(function () {
                preloaderAskRevcf.style.display = "none";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/middle-process.php", true);

                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            let responseData = JSON.parse(xhr.responseText);

                            if (responseData.status === "success") {
                                formRevcf.style.pointerEvents = "all";
                                location.href = "sim-fx?tag=revcf&numdoss=" + responseData.message;

                            } else {
                                formRevcf.style.pointerEvents = "all";
                                formRevcf.style.opacity = 1;
                                errorTextAskRevcf.style.display = "block";
                                errorTextAskRevcf.innerHTML = responseData.message;
                            }
                        }
                    }
                };

                let formData = new FormData(formRevcf);
                xhr.send(formData);
            }, 500);
        };

        const formRenouvelable = document.getElementById("modal-form-renouvelable"),
            btnformRenouvelable = formRenouvelable.querySelector(".btn-form-renouvelable"),
            errorTextRenou = formRenouvelable.querySelector(".error-text");
        preloaderRenouvelable = formRenouvelable.querySelector(".spinner-process");

        formRenouvelable.onsubmit = (e) => {
            e.preventDefault();
        };

        btnformRenouvelable.onclick = () => {
            preloaderRenouvelable.style.display = "block";
            errorTextRenou.style.display = "none";
            formRenouvelable.style.opacity = 0.5;

            setTimeout(function () {
                preloaderRenouvelable.style.display = "none";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/middle-process.php", true);

                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            let responseData = JSON.parse(xhr.responseText);

                            if (responseData.status === "success") {
                                formRenouvelable.style.pointerEvents = "all";
                                location.href = "sim-fx?tag=fx-pr";

                            } else {
                                formRenouvelable.style.pointerEvents = "all";
                                formRenouvelable.style.opacity = 1;
                                errorTextRenou.style.display = "block";
                                errorTextRenou.innerHTML = responseData.message;
                            }
                        }
                    }
                };

                let formData = new FormData(formRenouvelable);
                xhr.send(formData);
            }, 500);
        };


        const formPersonnel = document.getElementById("modal-form-personnel"),
            btnformPersonnel = formPersonnel.querySelector(".btn-form-personnel"),
            errorTextPerso = formPersonnel.querySelector(".error-text");
        preloaderPersonnel = formPersonnel.querySelector(".spinner-process");

        formPersonnel.onsubmit = (e) => {
            e.preventDefault();
        };

        btnformPersonnel.onclick = () => {
            preloaderPersonnel.style.display = "block";
            errorTextPerso.style.display = "none";
            formPersonnel.style.opacity = 0.5;

            setTimeout(function () {
                preloaderPersonnel.style.display = "none";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/middle-process.php", true);

                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            let responseData = JSON.parse(xhr.responseText);

                            if (responseData.status === "success") {
                                formPersonnel.style.pointerEvents = "all";
                                location.href = "sim-fx?tag=fx-pr";

                            } else {
                                formPersonnel.style.pointerEvents = "all";
                                formPersonnel.style.opacity = 1;
                                errorTextPerso.style.display = "block";
                                errorTextPerso.innerHTML = responseData.message;
                            }
                        }
                    }
                };

                let formData = new FormData(formPersonnel);
                xhr.send(formData);
            }, 500);
        };

        const formAuto = document.getElementById("modal-form-auto"),
            btnFormAuto = formAuto.querySelector(".btn-form-auto"),
            errorTextAuto = formAuto.querySelector(".error-text");
        preloaderAuto = formAuto.querySelector(".spinner-process");

        formAuto.onsubmit = (e) => {
            e.preventDefault();
        };

        btnFormAuto.onclick = () => {
            preloaderAuto.style.display = "block";
            errorTextAuto.style.display = "none";
            formAuto.style.opacity = 0.5;

            setTimeout(function () {
                preloaderAuto.style.display = "none";
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "./users/middle-process.php", true);

                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            console.log(xhr.responseText);
                            let responseData = JSON.parse(xhr.responseText);

                            if (responseData.status === "success") {
                                formAuto.style.pointerEvents = "all";
                                location.href = "sim-fx?tag=fx";

                            } else {
                                formAuto.style.pointerEvents = "all";
                                formAuto.style.opacity = 1;
                                errorTextAuto.style.display = "block";
                                errorTextAuto.innerHTML = responseData.message;
                            }
                        }
                    }
                };

                let formData = new FormData(formAuto);
                xhr.send(formData);
            }, 500);
        };


        function loadBrand() {

            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'brand' },
                success: function (data) {
                    data = '<option value="0" selected>-- Selectionner la marque --</option>' + data;
                    $("#idBrand").html(data);
                    loadProduct();
                }
            });
        }

        function loadProduct() {
            BrandID = $("#idBrand");
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'product', ID_MARQUE: BrandID.val() },
                success: function (data) {
                    data = '<option value="0" selected>-- Selectionner le produit --</option>' + data;
                    $("#idProduct").html(data);
                    loadTariff();
                }
            });

        }

        function loadTariff() {
            const BrandID = $("#idBrand").val();
            const ProductID = $("#idProduct").val();
            $.ajax({
                url: "users/agency/data_retriever.php",
                method: "POST",
                data: { ID_SCRIPT: 'tariff', ID_PRODUCT: ProductID, ID_BRAND: BrandID },
                success: function (data) {
                    data = '<option value="0" selected>-- Selectionner le barême --</option>' + data;
                    $("#idTariff").html(data);

                    // loadApport();
                }
            });
        }
        function displayControl(btn) {

            var boutonsMtm = document.querySelectorAll(".option");

            boutonsMtm.forEach(function (bouton) {
                bouton.classList.remove("active");
            });

            btn.classList.add("active");
            if (btn.id == "credit") {
                $("#choix-credit").show();
                $("#choix-revcf").hide();

            } else {
                $("#choix-credit").hide();
                $("#choix-revcf").show();
            }
            scrollToBottom();
        }

        function scrollToBottom() {
            window.scrollTo({
                top: 500,
                behavior: 'smooth'
            });
        }

        $('#mySearchInputAsk').typeahead({
            source: function (query, process) {
                $.ajax({
                    url: "users/agency/data_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'numdoss' },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (query.length > 7) {
                            // console.log(query);
                            controlDisplayOption(query);
                        }

                        var autocompleteData = result;
                        process(autocompleteData);

                    }
                });
            },
            minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
            highlight: true, // Met en surbrillance les correspondances dans les résultats
            hint: true // Affiche une suggestion en surbrillance
        });

        $('#mySearchInputCheck').typeahead({
            source: function (query, process) {
                $.ajax({
                    url: "users/agency/data_retriever.php",
                    method: "POST",
                    data: { ID_SCRIPT: 'numdoss' },
                    success: function (data) {
                        var result = JSON.parse(data);
                        if (query.length > 7) {
                            // console.log(query);
                            controlDisplayOption(query);
                        }

                        var autocompleteData = result;
                        process(autocompleteData);

                    }
                });
            },
            minLength: 1, // Nombre de caractères minimum pour déclencher l'autocomplétion
            highlight: true, // Met en surbrillance les correspondances dans les résultats
            hint: true // Affiche une suggestion en surbrillance
        });
    </script>

</body>

</html>