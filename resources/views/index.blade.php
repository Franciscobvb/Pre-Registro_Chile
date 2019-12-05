<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <title>Nikken - Sign Up</title>
        <link rel="shortcut icon" type="image/x-icon" href="https://www.nikken.com/themes_wordpress_/images/icons/nikken_logo.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href="{{asset('regchileasset/css/fontawesome.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/regular.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/solid.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/brands.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/css/plugins.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/css/register.css')}}" rel="stylesheet" type="text/css" />
        <style>
            .dates{
                background-color: #3bafda;
                color: white;
            }

            #days, #hours, #minutes, #seconds{
                font-size: 90px
            }
        </style>
    </head>
    <body class="body-country" >
        <div class="form-register" style="opacity: 0.97" >
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <img alt="logo" src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" class="theme-logo">
                </div>
                <br>
                <div class="count-down" style="width: 100%">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                            <div class="row">
                                <div class="col-sm-3 col-12 mb-sm-0 mb-4">
                                    <div class="widget-content-area social-likes text-center p-0  br-4">
                                        <div class="card dates">
                                            <div class="card-content">
                                                <h1 id="days"></h1>
                                            </div>
                                            <div class="card-btn-section">
                                                <p>Days / Dias</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-3 col-12 mb-sm-0 mb-4">
                                    <div class="widget-content-area social-likes text-center p-0  br-4">
                                        <div class="card dates">
                                            <div class="card-content">
                                                <h1 id="hours"></h1>
                                            </div>
                                            <div class="card-btn-section">
                                                <p>Hours / Horas</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-sm-3 col-12 mb-sm-0 mb-4">
                                    <div class="widget-content-area social-likes text-center p-0  br-4">
                                        <div class="card dates">
                                            <div class="card-content">
                                                <h1 id="minutes"></h1>
                                            </div>
                                            <div class="card-btn-section">
                                                <p>Minutes / Minutos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3 col-12 mb-sm-0 mb-4">
                                    <div class="widget-content-area social-likes text-center p-0  br-4">
                                        <div class="card dates">
                                            <div class="card-content">
                                                <h1 id="seconds"></h1>
                                            </div>
                                            <div class="card-btn-section">
                                                <p>Seconds / Segundos</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <center>
                                <h1>Pre-registro apertura Chile.</h1>
                                <h1>Pre-registration Chile opening.</h1>
                            </center>
                        </div>
                    </div>
                </div>
                <div class="menu-reg" style="width: 100%;">
                    <div class="row layout-spacing col-md-12">
                        <div class="container">
                            <ol class="breadcrumb breadcrumb-arrow">
                                <li><a href="javascript:void(0)">Start / Inicio</a></li>
                                <li class="active"><span>Register / Registro</span></li>
                                <li class="active"><span>Confirmation / Confirmación</span></li>
                            </ol>
                        </div>
                    </div>
                    
                    <div class="col-md-12 text-center mb-4">
                        <br>
                        <h3><span><b>Select your Language / Selecciona el idioma</b></span></h3>
                    </div>
                    <div class="col-md-12 tooltip-section" style="text-align: center; opacity: 1;">
                        <div class="row justify-content-center">
                            <div class="form-group col-md-3">
                                <a href="profile/ch/en">
                                    <img src="{{asset('regchileasset/img/chile.png')}}" class="img_country rounded bs-toolti" data-toggle="tooltip" data-placement="left" title="ENGLISH">
                                </a>
                                <br>
                                <label for="full-name" class="text-center"> <b>ENGLISH</b></label>   
                            </div>
                            <div class="form-group col-md-3">
                                <a href="profile/ch/spa">
                                    <img src="{{asset('regchileasset/img/chile.png')}}" class="img_country rounded bs-toolti" data-toggle="tooltip" data-placement="left" title="ESPAÑOL">
                                </a>
                                <br>
                                <label for="inputEmail" class="text-center"><b>ESPAÑOL</b></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </body>
    <script src="{{asset('regchileasset/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/popper.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/singup/singup.js')}}"></script>
    <script type="text/javascript">
        //Inicializamos el tooltip       
        $('[data-toggle="tooltip"]').tooltip();
        $('.menu-reg').css('display', 'block');
        $('.count-down').css('display', 'none');
    </script>
</html>