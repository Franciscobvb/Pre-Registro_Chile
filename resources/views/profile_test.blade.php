<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">
        <title>Nikken Chile - Pre Registro</title>
        <link rel="shortcut icon" type="image/x-icon" href="https://www.nikken.com/themes_wordpress_/images/icons/nikken_logo.ico">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link href="{{asset('regchileasset/css/fontawesome.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/bootstrap.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/css/regular.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/solid.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/brands.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/plugins.css')}}" rel="stylesheet">
        <link href="{{asset('regchileasset/css/register.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/css/ui-kit/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .row [class*="col-"] .widget .widget-header h4 { color: green; }
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0;
            }

            input[type=number] { -moz-appearance:textfield; }

            .switch-s.s-outline[class*="s-outline-"] .slider::before {
                bottom: 1px;
                left: 1px;
                border: 2px solid #dfe2ea;
                background-color:#000;
                color: #f7f8fa;
                box-shadow: 0 1px 15px 1px
                rgba(52, 40, 104, 0.25);
            }

            .switch.s-outline .slider {
                border: 2px solid #000;
                background-color: transparent;
            }
        </style>
    </head>
    <body>
        <div class="form-register" id="divprofile">
            <div class="row">
                <div class="col-md-12 text-center mb-4">
                    <img alt="logo" src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" class="theme-logo">
                    <img alt="logo" src="{{asset('regchileasset/img/chile.png')}}" width="5%">
                </div>
                <br>
                <div class="row layout-spacing col-md-12">
                    <div class="container">
                        <ol class="breadcrumb breadcrumb-arrow">
                            <li><a href="../../../">{{ __('auth.get_started') }}</a></li>
                            <li><a href="javascript:void(0)">{{ __('auth.profile') }}</a></li>
                            <li class="confirmation"><span>{{ __('auth.confirmation') }}</span></li>
                        </ol>
                    </div>
                </div>
                <div class="alert alert-info col-md-12 text-justify" role="alert" id="profileAltert" hidden>
                    {{ __('auth.alert') }}
                </div>
                <div class="alert alert-info col-md-12 text-justify" role="alert" id="profileAltert" hidden>
                    {{ __('auth.rquired') }}
                </div>
                <div class="alert alert-info col-md-12 text-justify" role="alert" id="confirmationAltert" style="display: none">
                    {{ __('auth.alertConfirmation') }} <br><br> {{ __('auth.alertConfirmation2') }}
                </div>
                <form id="formProfile" class="form-control" border="none" method="get" style="display: none">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header widget-heading">
                                <br>
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                        <h4>{{ __('auth.applicant') }}</h4>
                                    </div>
                                    <hr>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 tooltip-section">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="form-goup col-md-12">
                                        <label for="name"><span style="color: red !important;">*</span> <b>{{ __('auth.name') }}</b></label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="firstName"><span style="color: red !important;">*</span> <b>{{ __('auth.firstName') }}</b></label>
                                        <input type="text" id="firstName" name="firstName" class="form-control">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="secondName"><span style="color: red !important;">*</span> <b>{{ __('auth.secondName') }}</b></label>
                                        <input type="text" id="secondName" name="secondName" class="form-control">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="birthDate"><span style="color: red !important;">*</span> <b>{{ __('auth.birthDate') }}</b></label>
                                        <input type="date" id="birthDate" name="birthDate" class="form-control">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="celPhone"><span style="color: red !important;">*</span> <b>{{ __('auth.celPhone') }}</b></label>
                                        <input type="text" id="celPhone" name="celPhone" class="form-control" maxlength="10">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="phone"><span style="color: red !important;"></span> <b>{{ __('auth.phone') }}</b></label>
                                        <input type="text" id="phone" name="phone" class="form-control" maxlength="10">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="email"><span style="color: red !important;">*</span> <b>{{ __('auth.email') }}</b></label>
                                        <input type="email" id="email" name="email" class="form-control" onchange="validateMail()">
                                    </div>
                                    <div class="form-goup col-md-12">
                                        <label for="confEmail"><span style="color: red !important;">*</span> <b>{{ __('auth.conEmail') }}</b></label>
                                        <input type="email" id="confEmail" name="confEmail" class="form-control" onchange="validateMailEqual()">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-goup col-md-12">
                                    <label>{{ __('auth.warning')}}</label>
                                </div>
                                <div class="form-goup col-md-12">
                                    <!--<label for="sponsorId"><span style="color: red !important;"></span> <b>{{ __('auth.sponsorCode') }}</b></label>-->
                                    <input type="hidden" id="sponsorId" name="sponsorId" class="form-control" readonly>
                                </div>
                                <div class="form-goup col-md-12">
                                    <label>{{ __('auth.warning2')}}</label>
                                </div>
                                <div class="form-goup col-md-12">
                                    <label for="superSearch"><span style="color: red !important;">*</span> <b>{{ __('auth.searchName') }}</b></label>
                                    <input class="form-control" name="superSearch" id="superSearch" onkeyup="loadSponsors()" onchange="validaVacio()">
                                    <div id="respuesta"></div>
                                </div>
                                <div class="form-goup col-md-12" id="sponsorRandoomLabel">
                                    <br><br>
                                    <label>{{ __('auth.label') }}</label><br>
                                    <label id="sponsorLabel"></label>
                                </div>
                                <div class="form-goup col-md-12" id="sponsorRandoom">
                                    <div class="row">
                                        <div class="form-group col-2 text-center">
                                            <label for="withoutSponsor" class="switch s-icons s-outline s-outline-dark">
                                                <input type="checkbox" name="withoutSponsor" id="withoutSponsor" value="withoutSponsor">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="form-group col-10">
                                            <b><label>{{ __('auth.labelWithOutSponsor') }}</label></b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="alert alert-dismissible fade show col-md-12 text-center" role="alert" style="color: #fff; background-color: #A2DADA !important;border-color: #A2DADA !important;">
                                <strong>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <label for="chk2" class="switch s-icons s-outline s-outline-info" style="margin-left: 20px !important;">
                                            <input type="checkbox" name="chk2" id="chk2">
                                            <span class="slider round"></span>
                                        </label>
                                        <br>
                                        <label>{{ __('auth.permissions') }}</label>
                                    </div>
                                </strong> 
                            </div>
                            <div style="text-align: right !important;" class=" form-group col-md-12">
                                <input type="hidden" id="alertDuplicateMail" value="{{ __('auth.alertDuplicateMail') }}" readonly>
                                <input type="hidden" id="alertMailsMatchError" value="{{ __('auth.alertMailsMatchError') }}" readonly>
                                <input type="hidden" id="alertRegistrationOk" value="{{ __('auth.alertRegistrationOk') }}" readonly>
                                <input type="hidden" id="alertHeigtAge" value="{{ __('auth.alertHeigtAge') }}" readonly>
                                <input type="hidden" id="alertAgeInvalid" value="{{ __('auth.alertAgeInvalid') }}" readonly>
                                <input type="hidden" id="rquired" value="{{ __('auth.rquired') }}" readonly>
                                <input type="hidden" id="texteEnd" value="{{ __('auth.texteEnd') }}" readonly>
                                <input type="hidden" id="loginError" value="{{ __('auth.loginError') }}" readonly>
                                <input type="hidden" id="alertSponsorId" value="{{ __('auth.alertSponsorId') }}" readonly>
                                <input type="hidden" id="alertMailInvalid" value="{{ __('auth.alertMailInvalid') }}" readonly>
                                <label id="cargando" name="cargando" style="display: none"> {{ __('auth.labelLoad') }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                <button type="button" class="btn btn-info" id="btnProfile" disabled>{{ __('auth.next') }}</button>
                            </div>
                        </div>
                    </div>
                </form>

                <form id="formConfirmation" class="form-control" border="none" style="display: none">
                    <hr>
                    <div class="col-md-12 tooltip-section">
                        <div class="row">
                            <div class="col-md-4">
                                <label>
                                    <b>{{ __('auth.label') }}</b>
                                </label>
                                <br>
                                <label>
                                    <b><label id="sponsorCode"></label></b>
                                </label>
                                <br><br>
                                <label>
                                    <b>{{ __('auth.labelAsBi')}}</b>
                                </label>
                                <br>
                                <label>
                                    <b>{{ __('auth.labelCode')}} <label id="newadvisorCode"></label></b>
                                </label>
                                <br>
                                <label>
                                    <b>{{ __('auth.labelName')}} <label id="newadvisorName"></label></b>
                                </label>
                                <br>
                                <label>
                                    <b>{{ __('auth.labelCelPhone')}} <label id="newadvisorPhone"></label></b>
                                </label>
                                <br>
                                <label>
                                    <b>{{ __('auth.labelTel')}} <label id="newadvisorPhone2"></label></b>
                                </label>
                                <br>
                                <label>
                                    <b>{{ __('auth.labelEmail')}} <label id="newadvisorEmail"></label></b>
                                </label>
                            </div>
                            <div class="col-md-8">
                                <div class="form-goup col-md-12">
                                    <a href="javascript:void(0)" onclick="getPdf()">
                                        <h4><img src="{{asset('regchileasset/img/pdf.png')}}" width="8%"> {{ __('auth.labelDownloadPDF')}}</h4>
                                    </a>
                                </div>
                            </div>
                            <hr>
                            <div class="alert alert-dismissible fade show col-md-12 text-center" role="alert" style="color: #fff; background-color: #A2DADA !important;border-color: #A2DADA !important; display: none" id="permissions">
                                <strong>
                                    <div class="custom-control custom-checkbox mr-3">
                                        <label for="chk2" class="switch s-icons s-outline s-outline-info" style="margin-left: 20px !important;">
                                            <input type="checkbox" name="chk2" id="chk2">
                                            <span class="slider round"></span>
                                        </label>
                                        <br>
                                        <label>{{ __('auth.direct_deposit_agreement') }}</label>
                                    </div>
                                </strong> 
                            </div>
                            <div style="text-align: right !important;" class=" form-group col-md-12">
                                <!--<button type="button" class="btn btn-info" id="btnProfile"><label id="botonProccess">{{ __('auth.next') }}</label></button>-->
                            </div>
                        </div>
                    </div>
                </form>

                <form id="formLogin" class="form-control" border="none" method="POST">
                    <div class="col-md-12 login-section">
                        <div class="row">
                            <div class="col-md-12">
                                <br>
                                <div class="alert alert-info col-md-12 text-justify" role="alert" id="profileAltert">
                                    {{ __('auth.loginAlert') }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-goup col-md-12">
                                    <label for="userName"><span style="color: red !important;">*</span> <b>{{ __('auth.loginNameLabel') }}</b></label>
                                    <input type="text" id="userName" name="userName" class="form-control">
                                </div>
                                <div class="form-goup col-md-12">
                                    <label for="userPass"><span style="color: red !important;">*</span> <b>{{ __('auth.loginPassLabel') }}</b></label>
                                    <input type="password" id="userPass" name="userPass" class="form-control">
                                </div>
                                <div class="form-goup col-md-12">
                                    <br>
                                    <button type="button" class="btn btn-info" id="loginButton" onclick="logintest()">{{ __('auth.loginButton') }} test</button>
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br><br>
    </body>
    <script src="{{asset('regchileasset/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('regchileasset/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('regchileasset/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/singup/singup.js?v=2.1.0')}}"></script>
    <script src="{{asset('regchileasset/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('regchileasset/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        var alertDuplicateMail = $('#alertDuplicateMail').val();
        var alertMailsMatchError = $('#alertMailsMatchError').val();
        var alertRegistrationOk = $('#alertRegistrationOk').val();
        var alertHeigtAge = $('#alertHeigtAge').val();
        var alertAgeInvalid = $('#alertAgeInvalid').val();
        var rquired = $('#rquired').val();
        var texteEnd = $('#texteEnd').val();
        var loginErrortext = $('#loginError').val();
        var alertSponsorIdtext = $('#alertSponsorId').val();
        var alertMailInvalid = $('#alertMailInvalid').val();

        function alertErroMailFormat(){
            swal({
                title: 'Error',
                text: alertMailInvalid,
                type: 'error',
                padding: '2em'
            })
            $('#email').val('');
        }
        
        function alertMailDup(){
            swal({
                title: 'Error',
                text: alertDuplicateMail,
                type: 'error',
                padding: '2em'
            })
            $('#email').focus();
        }

        function alertErroSponsorId(){
            swal({
                title: 'Error',
                text: alertSponsorIdtext,
                type: 'error',
                padding: '2em'
            })
            $('#sponsorId').val('');
            $('#superSearch').val('');
        }
        
        function emailNotMatch(){
            swal({
                title: 'Error',
                text: alertMailsMatchError,
                type: 'error',
                padding: '2em'
            })
        }

        function loginErrorAlert(){
            console.log(loginErrortext);
            swal({
                title: 'Error',
                text: loginErrortext,
                type: 'error',
                padding: '2em'
            })
        }
    </script>
</html>