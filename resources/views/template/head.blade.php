<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>


    <!-- Google Font: Source Sans Pro -->


    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <!-- select 2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/daterangepicker/daterangepicker.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet"
        href="{{ asset('assets') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/bs-stepper/css/bs-stepper.min.css">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dropzone/min/dropzone.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets') }}/dist/css/adminlte.min.css">
    <link rel="stylesheet" type="text/css" href=" {{ asset('assets') }}/css/slider.css">
    <link rel="stylesheet" type="text/css" href=" {{ asset('assets') }}/dropify/dist/css/dropify.min.css">
    <link href="{{ asset('assets') }}/css1/bootstrap-switch-button.min.css" rel="stylesheet" />
    <link href="{{ asset('assets') }}/css1/bootstrap4-toggle.min.css" rel="stylesheet">
    <!-- Alpine Plugins -->
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/mask@3.x.x/dist/cdn.min.js"></script>
 
<!-- Alpine Core -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes blinking {
            0% {
                background-color: red
            }

            100% {
                background-color: yellow;
                color: #000
            }
        }

        #blink {
            animation: blinking 1s infinite
        }

        navbar-nav>.user-menu>.dropdown-menu>li.user-header {
            height: 195px;
            padding: 10px;
            text-align: center
        }

        .bg-gradient,
        .main-footer {
            background: #26C784;
            background: -webkit-linear-gradient(to right, #11998e, #26C784);
            background: linear-gradient(to right, #11998e, #26C784);
            color: #fff
        }

        .badge-primary {
            background: #1CB089;
            color: #fff
        }

        .btn-primary {
            background: #1E5FAA;
            border-color: #1E5FAA;
            color: #fff
        }

        .btn-primary:hover {
            background: #1E5FAA;
            border-color: #1E5FAA;
            color: #fff
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #19AB8A;
            border-color: #19AB8A
        }

        .page-link {
            color: #1E5FAA
        }

        .subnavbar {
            -webkit-box-shadow: 0 8px 6px -6px #CCC;
            -moz-box-shadow: 0 8px 6px -6px #CCC;
            box-shadow: 0 8px 6px -6px #CCC
        }

        .subnavbar-inner {
            height: 66px;
            background: #fff;
            border-bottom: 1px solid #CCC
        }

        .subnavbar .container>ul {
            display: inline-block;
            height: 80px;
            padding: 0;
            margin: 0
        }

        .subnavbar .container>ul>li {
            float: left;
            min-width: 90px;
            height: 66px;
            padding: 0;
            margin: 0;
            text-align: center;
            list-style: none;
            border-left: 1px solid #d9d9d9
        }

        .subnavbar .container>ul>li>a {
            display: block;
            height: 100%;
            padding: 0 15px;
            font-size: 12px;
            font-weight: 700;
            color: #545454
        }

        .subnavbar .container>ul>li>a:hover {
            color: #888;
            text-decoration: none
        }

        .subnavbar .container>ul>li>a>i {
            display: inline-block;
            width: 24px;
            height: 24px;
            margin-top: 10px;
            margin-bottom: -3px;
            font-size: 20px
        }

        .subnavbar .container>ul>li>a>img {
            display: inline-block;
            width: 30px;
            height: 30px;
            margin-top: 8px;
            font-size: 20px
        }

        .subnavbar .container>ul>li>a>span {
            display: block;
            font-size: 15px
        }

        .subnavbar .container>ul>li.active>a {
            background: #67AA8D
        }

        .subnavbar .dropdown .dropdown-menu a {
            font-size: 13px;
            padding: .25rem 1rem;
            font-weight: 400;
            color: #212529;
            text-align: inherit
        }

        .subnavbar .dropdown .dropdown-menu li {
            margin-top: 5px;
            margin-bottom: 5px
        }

        .subnavbar .dropdown .dropdown-menu li:hover {
            background: #11998E;
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
            color: #fff
        }

        .subnavbar .dropdown .dropdown-menu a:hover {
            color: #fff
        }

        .subnavbar .dropdown .dropdown-menu {
            text-align: left;
            -webkit-border-top-left-radius: 0;
            -webkit-border-top-right-radius: 0;
            -moz-border-radius-topleft: 0;
            -moz-border-radius-topright: 0;
            border-top-left-radius: 0;
            border-top-right-radius: 0
        }

        .subnavbar .dropdown-menu::before {
            content: '';
            display: inline-block;
            border-left: 7px solid transparent;
            border-right: 7px solid transparent;
            border-bottom: 7px solid #CCC;
            border-bottom-color: rgba(0, 0, 0, .2);
            position: absolute;
            top: -7px;
            left: 9px
        }

        .subnavbar .dropdown-menu::after {
            content: '';
            display: inline-block;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-bottom: 6px solid #fff;
            position: absolute;
            top: -6px;
            left: 10px
        }

        .subnavbar .caret {
            margin-top: 4px;
            border-top-color: #fff;
            border-bottom-color: #fff
        }

        .subnavbar .dropdown.open .caret {
            display: none
        }

        .content-wrapper .content-header .title {
            color: #263238;
            font-weight: 700;
            font-size: 18px;
            letter-spacing: -.2px
        }

        th {
            background-color: #F2F2F2;
            border-bottom: 0;
            color: #787878;
            cursor: pointer;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            position: relative;
            text-transform: uppercase;
            vertical-align: middle;
            text-align: center
        }

        td {
            color: #787878;
            font-family: Arial, Helvetica, sans-serif
        }

        .soldout {
            background: #cb2d3e;
            border-radius: 10px
        }

        .soldout a i {
            color: #fff
        }

        .soldout a span {
            color: #fff
        }

        @media (max-width:767px) {
            .btn-x {
                width: 47%;
                margin-top: 6px;
                margin-left: 5px;
                padding: .25rem .4rem;
                font-size: .875rem;
                line-height: .5;
                border-radius: .2rem
            }

            #nomeja {
                font-size: 20px
            }

            .content-header h1 {
                font-size: 22px;
                text-align: center
            }

            .subnavbar-inner {
                height: 230px
            }

            .subnavbar .container>ul {
                width: 100%;
                height: auto;
                border: none
            }

            .subnavbar .container>ul>li {
                width: 33%;
                height: 70px;
                margin-bottom: 0;
                border: none
            }

            .subnavbar .container>ul>li>a>span {
                display: block;
                font-size: 13px
            }

            .subnavbar .container>ul>li.active>a {
                font-size: 11px;
                background: transparent
            }

            .subnavbar .container>ul>li>a>i {
                display: inline-block;
                margin-bottom: 0;
                font-size: 20px
            }

            .subnavbar-open-right .dropdown-menu {
                left: auto;
                right: 0
            }

            .subnavbar-open-right .dropdown-menu:before {
                left: auto;
                right: 12px
            }

            .subnavbar-open-right .dropdown-menu:after {
                left: auto;
                right: 13px
            }

            .soldoutc {
                background: #CB2D3E;
                border-radius: 50%;
                box-shadow: 0 5px 10px -2px #CB2D3E;
                padding: 12px 33px 31px 12px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .soldout {
                background: #fff
            }

            .soldout a i {
                color: #fff
            }

            .soldout a span {
                color: #545454
            }
        }

        @media (max-width:1023px) {
            .btn {
                margin-top: 6px;
                margin-left: 5px
            }

            #nomeja {
                font-size: 23px
            }

            .order {
                background: #129C8E;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #129C8E;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .meja1 {
                background: #155799;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #155799;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .tugas_head {
                background: #8E44AD;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #8E44AD;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .soldoutc {
                background: #CB2D3E;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #CB2D3E;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .report {
                background: #EF32D9;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #EF32D9;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .void {
                background: #D76B26;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #D76B26;
                padding: 12px 33px 32px 15px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .rekrut {
                background: #FFD200;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #FFD200;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .catatan {
                background: #1CB5E0;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #1CB5E0;
                padding: 12px 33px 31px 14px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .more {
                background: #30DD81;
                border-radius: 15%;
                box-shadow: 0 5px 10px -2px #30DD81;
                padding: 12px 33px 31px 13px;
                margin: 0 auto;
                color: #fff;
                margin-bottom: 20px
            }

            .subnavbar-inner {
                height: 310px
            }

            .subnavbar .container>ul {
                width: 100%;
                height: auto;
                border: none
            }

            .subnavbar .container>ul>li {
                width: 33%;
                height: 70px;
                margin-bottom: 18px;
                border: none
            }

            .soldout {
                background: #fff
            }

            .soldout a i {
                color: #fff
            }

            .soldout a span {
                color: #545454
            }

            .subnavbar .container>ul>li.active>a {
                font-size: 11px;
                background: transparent
            }

            .subnavbar .container>ul>li>a>i {
                display: inline-block;
                margin-bottom: 2px;
                font-size: 20px
            }

            .subnavbar .container>ul>li>a>img {
                display: inline-block;
                width: 50px;
                height: 50px;
                margin-top: 20px;
                font-size: 20px
            }

            .subnavbar-open-right .dropdown-menu {
                left: auto;
                right: 0
            }

            .subnavbar-open-right .dropdown-menu:before {
                left: auto;
                right: 12px
            }

            .subnavbar-open-right .dropdown-menu:after {
                left: auto;
                right: 13px
            }
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            color: #787878
        }

        .btn-costume {
            background: #19AB8A;
            color: #FFF
        }

        th {
            text-align: left
        }

        .navbar-toggler {
            border: none
        }

        .animated-icon1,
        .animated-icon2,
        .animated-icon3 {
            width: 30px;
            height: 20px;
            position: relative;
            margin: 0;
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: .5s ease-in-out;
            -moz-transition: .5s ease-in-out;
            -o-transition: .5s ease-in-out;
            transition: .5s ease-in-out;
            cursor: pointer
        }

        .animated-icon1 span,
        .animated-icon2 span,
        .animated-icon3 span {
            display: block;
            position: absolute;
            height: 3px;
            width: 100%;
            border-radius: 9px;
            opacity: 1;
            left: 0;
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
            -webkit-transition: .25s ease-in-out;
            -moz-transition: .25s ease-in-out;
            -o-transition: .25s ease-in-out;
            transition: .25s ease-in-out
        }

        .animated-icon1 span {
            background: #FFF
        }

        .animated-icon2 span {
            background: #e3f2fd
        }

        .animated-icon3 span {
            background: #f3e5f5
        }

        .animated-icon1 span:nth-child(1) {
            top: 0
        }

        .animated-icon1 span:nth-child(2) {
            top: 10px
        }

        .animated-icon1 span:nth-child(3) {
            top: 20px
        }

        .animated-icon1.open span:nth-child(1) {
            top: 11px;
            -webkit-transform: rotate(135deg);
            -moz-transform: rotate(135deg);
            -o-transform: rotate(135deg);
            transform: rotate(135deg)
        }

        .animated-icon1.open span:nth-child(2) {
            opacity: 0;
            left: -60px
        }

        .animated-icon1.open span:nth-child(3) {
            top: 11px;
            -webkit-transform: rotate(-135deg);
            -moz-transform: rotate(-135deg);
            -o-transform: rotate(-135deg);
            transform: rotate(-135deg)
        }

        .animated-icon2 span:nth-child(1) {
            top: 0
        }

        .animated-icon2 span:nth-child(2),
        .animated-icon2 span:nth-child(3) {
            top: 10px
        }

        .animated-icon2 span:nth-child(4) {
            top: 20px
        }

        .animated-icon2.open span:nth-child(1) {
            top: 11px;
            width: 0%;
            left: 50%
        }

        .animated-icon2.open span:nth-child(2) {
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg)
        }

        .animated-icon2.open span:nth-child(3) {
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg)
        }

        .animated-icon2.open span:nth-child(4) {
            top: 11px;
            width: 0%;
            left: 50%
        }

        .animated-icon3 span:nth-child(1) {
            top: 0;
            -webkit-transform-origin: left center;
            -moz-transform-origin: left center;
            -o-transform-origin: left center;
            transform-origin: left center
        }

        .animated-icon3 span:nth-child(2) {
            top: 10px;
            -webkit-transform-origin: left center;
            -moz-transform-origin: left center;
            -o-transform-origin: left center;
            transform-origin: left center
        }

        .animated-icon3 span:nth-child(3) {
            top: 20px;
            -webkit-transform-origin: left center;
            -moz-transform-origin: left center;
            -o-transform-origin: left center;
            transform-origin: left center
        }

        .animated-icon3.open span:nth-child(1) {
            -webkit-transform: rotate(45deg);
            -moz-transform: rotate(45deg);
            -o-transform: rotate(45deg);
            transform: rotate(45deg);
            top: 0;
            left: 8px
        }

        .animated-icon3.open span:nth-child(2) {
            width: 0%;
            opacity: 0
        }

        .animated-icon3.open span:nth-child(3) {
            -webkit-transform: rotate(-45deg);
            -moz-transform: rotate(-45deg);
            -o-transform: rotate(-45deg);
            transform: rotate(-45deg);
            top: 21px;
            left: 8px
        }

        .dropdown-item:hover {
            background: #19AB8A
        }

        .nav-link {
            font-weight: 700;
            color: #787878
        }

        .btn-new {
            background-color: #fff;
            border: 1 px solid #eceff1;
            color: #263238;
            display: inline-block;
            white-space: nowrap;
            font-size: 14px;
            font-weight: 600;
            text-shadow: none;
            vertical-align: middle;
            height: 32 px;
            border-radius: 3 px
        }
    </style>
    <style type="text/css">
        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #F1F1F0;
        }

        .preloader .loading {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            font: 14px arial;
        }
    </style>
</head>