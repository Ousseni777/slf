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
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
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
# Buy Tickets
--------------------------------------------------------------*/
    .buy-tickets {
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

    .buy-tickets:hover {
      background: none;
      color: #fff;
    }

    .buy-tickets:focus {
      color: #fff;
    }

    @media (max-width: 992px) {
      .buy-tickets {
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
      /* border-radius: 50px; */
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
      border: 0;
      padding: 9px 25px;
      cursor: pointer;
      background: #f82249;
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
# Buy Tickets Section
--------------------------------------------------------------*/
    #buy-tickets {
      padding: 60px 0;
    }

    #buy-tickets .card {
      border: none;
      border-radius: 5px;
      transition: all 0.3s ease-in-out;
      box-shadow: 0 10px 25px 0 rgba(6, 12, 34, 0.1);
    }

    #buy-tickets .card:hover {
      box-shadow: 0 10px 35px 0 rgba(6, 12, 34, 0.2);
    }

    #buy-tickets .card hr {
      margin: 25px 0;
    }

    #buy-tickets .card .card-title {
      margin: 10px 0;
      font-size: 14px;
      letter-spacing: 1px;
      font-weight: bold;
    }

    #buy-tickets .card .card-price {
      font-size: 48px;
      margin: 0;
    }

    #buy-tickets .card ul li {
      margin-bottom: 20px;
    }

    #buy-tickets .card .text-muted {
      opacity: 0.7;
    }

    #buy-tickets .card .btn {
      font-size: 15px;
      border-radius: 50px;
      padding: 10px 40px;
      transition: all 0.2s;
      background-color: #f82249;
      border: 0;
      color: #fff;
    }

    #buy-tickets .card .btn:hover {
      background-color: #e0072f;
    }

    #buy-tickets #signup-modal input,
    #buy-tickets #signup-modal select {
      border-radius: 0;
    }

    #buy-tickets #signup-modal .btn {
      font-size: 15px;
      border-radius: 50px;
      padding: 10px 40px;
      transition: all 0.2s;
      background-color: #f82249;
      border: 0;
      color: #fff;
    }

    #buy-tickets #signup-modal .btn:hover {
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
    #logo h1 {
      background-color: rgba(255, 250, 200, .1);
      padding: 1% 5%;
      width: 200px;
      text-align: center;
      border-radius: 20px;
      border-bottom: 1px solid red;
    }

    /*--------------------------------------------------------------
# Tabs
--------------------------------------------------------------*/
    .tabs .nav-tabs {
      border: 0;
    }

    .tabs .nav-link {
      border: 1px solid #b9b9b9;
      padding: 15px;
      transition: 0.3s;
      color: #111111;
      border-radius: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
    }

    .tabs .nav-link i {
      padding-right: 15px;
      font-size: 48px;
    }

    .tabs .nav-link h4 {
      font-size: 18px;
      font-weight: 600;
      margin: 0;
    }

    .tabs .nav-link:hover {
      color: #e03a3c;
    }

    .tabs .nav-link.active {
      background: #e03a3c;
      color: #fff;
      border-color: #e03a3c;
    }

    @media (max-width: 768px) {
      .tabs .nav-link i {
        padding: 0;
        line-height: 1;
        font-size: 36px;
      }
    }

    @media (max-width: 575px) {
      .tabs .nav-link {
        padding: 15px;
      }

      .tabs .nav-link i {
        font-size: 24px;
      }
    }

    .tabs .tab-content {
      margin-top: 30px;
    }

    .tabs .tab-pane h3 {
      font-weight: 600;
      font-size: 26px;
    }

    .tabs .tab-pane ul {
      list-style: none;
      padding: 0;
    }

    .tabs .tab-pane ul li {
      padding-bottom: 10px;
    }

    .tabs .tab-pane ul i {
      font-size: 20px;
      padding-right: 4px;
      color: #e03a3c;
    }

    .tabs .tab-pane p:last-child {
      margin-bottom: 0;
    }
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center ">
    <div class="container-fluid container-xxl d-flex align-items-center">

      <div id="logo" class="me-auto">
        <h1><a href="./"><span>SALAFIN</span></a></h1>
        <!-- <a href="./" class="scrollto"><img style="width: 100px; height: 50px;" src="assets/img/logo.svg" alt=""
            title=""></a> -->

      </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">SALAFIN</a></li>

          <li><a class="nav-link scrollto" href="#schedule">Besoin d'argent</a></li>
          <li><a class="nav-link glightbox play-btn" href="https://www.youtube.com/watch?v=aGvseOGhWEY">Comment ça
              marche</a></li>
          <li><a class="nav-link scrollto" href="#venue">Nos agence</a></li>
          <li><a class="nav-link scrollto" href="#contact">Nous contacter</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a class="buy-tickets scrollto" href="./login">Espace travail</a>

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container" data-aos="zoom-in" data-aos-delay="100">
      <h1 class="mb-4 pb-0">Demander un crédit avec <br><span>Salafin</span> , c'est simple !</h1>
      <p class="mb-4 pb-0">Comment ça marche ?</p>
      <a href="#" title="En état de construction" class="glightbox play-btn mb-4"></a>
      <a href="#about" class="about-btn scrollto">Je découvre !</a>
    </div>
  </section><!-- End Hero Section -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about">
      <div class="container position-relative" data-aos="fade-up">
        <div class="row">
          <div class="col-lg-2">
            <h3>Mon projet</h3>
            <div class="col-md-11">
              <select id="inputState" class="form-select">
                <option value="auto">Crédit Auto</option>
                <option value="Crédit personnel">Crédit personnel</option>
                <option value="Crédit renouvelable">Crédit renouvelable</option>
              </select>
            </div>
          </div>
          <div class="col-lg-2">
            <h3>Je suis</h3>
            <div class="col-md-11">
              <select id="inputState" class="form-select">
                <option value="SALARIE">Salarié</option>
                <option value="FONCTIONNAIRE">Fonctionnaire</option>
                <option value="COMMERCANT">Commerçant</option>
                <option value="SOCIETE">Société</option>
              </select>
            </div>
          </div>
          <div class="col-lg-2">
            <h3>Montant (en DH)</h3>
            <div class="col-md-11">
              <input type="text"
                style="width: 80px; height: 20px; text-align: center; border-radius: 5px; color: white;" readonly
                disabled value="500 000">
              <input type="range">
            </div>
          </div>
          <div class="col-lg-2">
            <h3>Durée (en mois)</h3>
            <div class="col-md-11">
              <select id="inputState" class="form-select">
                <option value="SALARIE">20</option>
                <option value="FONCTIONNAIRE">48</option>
                <option value="COMMERCANT">36</option>
                <option value="SOCIETE">52</option>
              </select>
            </div>
          </div>
          <div class="col-lg-2">
            <h3>Mensualité (en DH)</h3>
            <div class="col-md-11">
              <input type="text"
                style="width: 80px; height: 20px; text-align: center; border-radius: 5px; color: white;" readonly
                disabled value="1 203.5">
              <input type="range">
            </div>
          </div>
          <div class="col-lg-2">
            <h3>Sans engagement</h3>
            <div class="col-md-11">
              <button class="btn btn-danger" onclick="displayProcessModal()" title="En état de construction" >Continuer <i class="bi bi-chevron-right"></i> </button>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End About Section -->

    <!-- ======= Schedule Section ======= -->
    <section id="schedule" class="section-with-bg">
      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Mes besoins</h2>
          <p>Faire le choix de votre besoin pour commencer la simulation</p>
        </div>

        <ul class="nav nav-tabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
          <li class="nav-item">
             <a class="nav-link d-flex flex-row align-items-center justify-content-center" title="En état de construction" href="#day-1" role="tab" data-bs-toggle="tab"><i class="bx bx-car" style="font-size : 60px; margin-right: 20px;" ></i>Crédit AUTO</a>
          </li>
          <li class="nav-item">
          <a class="nav-link d-flex flex-row align-items-center justify-content-center" title="En état de construction" href="#day-2" role="tab" data-bs-toggle="tab"><i class="bx bx-donate-blood" style="font-size : 60px; margin-right: 20px;" ></i>Crédit PERSONNEL</a>
          </li>
          <li class="nav-item">
          <a class="nav-link d-flex flex-row align-items-center justify-content-center" title="En état de construction" href="#day-3" role="tab" data-bs-toggle="tab"><i class="bx bx-refresh" style="font-size : 60px; margin-right: 20px; " ></i>Crédit RENOUVELABLE</a>
          </li>
        </ul>

        <h3 class="sub-heading">Des solutions de crédits adaptées à votre projet : achat de voiture ou crédit personel
        </h3>

        <div class="tab-content row justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <!-- Schdule Day 1 -->
          <div role="tabpanel" class="row col-lg-9 tab-pane fade show active" id="day-1">



          </div>
          <!-- End Schdule Day 1 -->

          <!-- Schdule Day 2 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-2">


          </div>
          <!-- End Schdule Day 2 -->

          <!-- Schdule Day 3 -->
          <div role="tabpanel" class="col-lg-9  tab-pane fade" id="day-3">

          </div>
          <!-- End Schdule Day 2 -->

        </div>

      </div>

    </section><!-- End Schedule Section -->

    <!-- ======= Venue Section ======= -->
    <section id="venue">

      <div class="container-fluid" data-aos="fade-up">

        <div class="section-header">
          <h2>Nos agences</h2>
          <p>Salafin compte plus de 6 angences au Maroc</p>
        </div>

        <div class="row g-0">
          <div class="col-lg-6 venue-map">
            <?php
            $adress = "SALAFIN-Siège"
              ?>
            <!-- -->
            <iframe src="https://maps.google.com/maps?&q=<?php echo $adress; ?>&output=embed" frameborder="0"
              style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6 venue-info">
            <div class="row justify-content-center">
              <div class="col-lg-5 position-relative">
                <h3>Casablanca</h3>
                <h3>Fès</h3>
                <h3>Rabat</h3>

              </div>
              <div class="col-lg-1"></div>
              <div class="col-lg-5 position-relative">
                <h3>Kenitra</h3>
                <h3>Tanger</h3>
                <h3>...</h3>

              </div>
            </div>
          </div>
        </div>

      </div>


    </section><!-- End Venue Section -->



    <!-- ======= Supporters Section ======= -->
    <section id="supporters" class="section-with-bg">

      <div class="container" data-aos="fade-up">
        <div class="section-header">
          <h2>Nos partenaires</h2>
          <p>Nos partenaires potentiels</p>
        </div>

        <div class="row no-gutters supporters-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-xs-6">
            <div class="supporter-logo">
              <img src="assets/img/supporters/1.png" class="img-fluid" alt="">
            </div>
          </div>


        </div>

      </div>

    </section><!-- End Sponsors Section -->

    <!-- =======  F.A.Q Section ======= -->
    <section id="faq">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>F.A.Q </h2>
          <p>Foire aux questions</p>
        </div>

        <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-9">

            <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Quelles sont les pièces
                  justificatives à fournir pour souscrire un prêt ? <i class="bi bi-chevron-down icon-show"></i><i
                    class="bi bi-chevron-up icon-close"></i>
                </div>
                <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                  <p>
                  <ul>
                    <li>Une pièce d'identité</li>
                    <li>Trois derniers relevés bancaires</li>
                    <li>Un relevé d'identité bancaire ou spécimen de chèque</li>
                    <li>Un justificatif de domicile datant de moins de 3 mois</li>
                  </ul>

                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Combien de temps me
                  faudra t-il pour obtenir une réponse à ma demande de crédit ?<i
                    class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                </div>
                <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    La réponse de principe à la demande de crédit sur le site est instantanée, il suffit de
                    remplir les champs d'informations et de transmettre en ligne les pièces justificatives.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Que signifie un accord de
                  principe ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i>
                </div>
                <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Un accord de principe signifie que votre crédit est accordé sous réserve de présentation
                    des pièces justificatives correspondant à vos déclarations sur le site. Une fois les
                    pièces originales reçues et vérifiées, vous pouvez procéder à la signature du contrat.
                  </p>
                </div>
              </li>

              <li>
                <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Quel est le délai pour
                  recevoir le virement ?<i class="bi bi-chevron-down icon-show"></i><i
                    class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq4" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    Les fonds sont virés sous 48h (jours ouvrés) sur votre compte bancaire, après
                    acceptation définitive de votre dossier par EQDOM et expiration du délai de rétractation
                    de 7 jours.
                  </p>
                </div>
              </li>

            </ul>

          </div>
        </div>

      </div>

    </section><!-- End  F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="section-bg">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>NOUS CONTACTER</h2>
          <p>PLUS D'INFORMATIONS</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="bi bi-geo-alt"></i>
              <h3>Address</h3>
              <address>20520; HAY SIDI MAAROUF; CASABLANCA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="bi bi-phone"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+212 605 142 256</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="bi bi-envelope"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@salafin.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Votre nom" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Votre Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Sujet" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Envoyer le Message</button></div>
          </form>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- Modal Order Form -->
  <div id="process-modal" class="modal fade">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="background-color: rgba(101, 111, 150, 0.6);" >
     
        <div class="modal-body" style="background-color: rgba(101, 111, 150, 0.15);">
        <?php include "./sim-cl-perso.php" ?>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

  <?php include "footer.php" ?>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/js/jquery.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main-event.js"></script>

  <script>
    function displayProcessModal(){
      $("#process-modal").modal("show");
    }
  </script>

</body>

</html>