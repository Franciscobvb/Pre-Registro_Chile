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
        <link href="{{asset('regchileasset/css/select2.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('regchileasset/plugins/sweetalerts/sweetalert2.min.css" rel="stylesheet')}}" type="text/css" />
        <link href="{{asset('regchileasset/plugins/sweetalerts/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('regchileasset/css/ui-kit/custom-sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="{{asset('regchileasset/plugins/table/datatable/datatables.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('regchileasset/plugins/table/datatable/custom_dt_zero_config.css')}}">
        <style>
            .row [class*="col-"] .widget .widget-header h4 { color: green; }
            input[type=number]::-webkit-inner-spin-button, 
            input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
            }

            input[type=number] { -moz-appearance:textfield; }

            div.dt-buttons {
                position: relative;
                float: left;
            }

            #zero-config_info{
                display: block;
            }

            th{
                text-align: center;
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
                <form id="formProfile" class="form-control" border="none" method="POST">
                    <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
                    <div class="col-lg-12">
                        <div class="statbox widget box box-shadow">
                            <div class="widget-header widget-heading">
                                <br>
                                <div class="row">
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                        <a href="javascript:void(0)" class="btn btn-info btn-rounded" onclick="salir()">{{ __('auth.btnExit') }}</a><br>
                                    </div>
                                    <div class="col-xl-12 col-md-12 col-sm-12 col-12 text-center">
                                        <h4>{{ __('auth.genealogyTittleDown') }}</h4> <a href="javascript:void(0)" onclick="seeDown()"><span class="flaticon-view-3"></span> ({{ __('auth.labelSee') }})</a>
                                    </div>
                                    <input type="hidden" id="language" name="language" value="{{ $language }}">
                                    <hr>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 tooltip-section down">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="table-responsive mb-4">
                                        <br>
                                        <table id="zero-config-down" class="table table-striped table-hover table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('auth.tabNumber') }}</th>
                                                    <th>{{ __('auth.tabId') }}</th>
                                                    <th>{{ __('auth.tabName') }}</th>
                                                    <th>{{ __('auth.tabTipe') }}</th>
                                                    <th>{{ __('auth.tabCountry') }}</th>
                                                    <th>{{ __('auth.tabMail') }}</th>
                                                    <th>{{ __('auth.tabCelpone') }}</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $num = 1;
                                                @endphp
                                                @foreach ($response as $row)
                                                    @php
                                                        
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $num }}</td>
                                                        <td>{{ $row->associateid }}</td>
                                                        <td>{{ $row->ApFirstName }}</td>
                                                        <td>{{ __('auth.tabdistributor') }}</td>
                                                        <td>{{ $row->Pais }}</td>
                                                        <td>{{ $row->E_Mail }}</td>
                                                        <td>{{ $row->Phone1 }}</td>
                                                        <td>
                                                            <a type="button" class="btn btn-info btn-rounded" href="http://127.0.0.1:8000/preinscripcion/retomar/profile/ch/spa/{{ base64_encode($row->E_Mail) }}" size="50px" width="50px" target="_new">{{ __('auth.btnEndRegistration') }} test</a>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $num++;
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
    <script src="{{asset('regchileasset/js/singup/singup.js?v=1.0.4')}}"></script>
    <script src="{{asset('regchileasset/js/select2.min.js')}}"></script>
    <script src="{{asset('regchileasset/js/custom-select2.js')}}"></script>
    <script src="{{asset('regchileasset/js/custom.js')}}"></script>
    <script src="{{asset('regchileasset/plugins/sweetalerts/sweetalert2.min.js')}}"></script>
    <script src="{{asset('regchileasset/plugins/sweetalerts/custom-sweetalert.js')}}"></script>
    <script src="{{asset('regchileasset/plugins/table/datatable/datatables.js')}}"></script>
    
    <script src="{{asset('retos/plugins/table/datatable/datatables.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.2.1/js/buttons.html5.min.js"></script>

    <script>
        $(function() {
            var language = $('#language').val();
            if(language == 'spa'){
                $('#zero-config-down').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb--7 mr-3', text:"<span class='flaticon-file'></span> {{ __('auth.labelExportExcel') }}",}
                    ]
                });

                $('#zero-config-up').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
                    },
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb--7 mr-3', text:"<span class='flaticon-file'></span> {{ __('auth.labelExportExcel') }}",}
                    ]
                });
            }
            else{
                $('#zero-config-down').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb--7 mr-3', text:"<span class='flaticon-file'></span> {{ __('auth.labelExportExcel') }}",}
                    ]
                });
                $('#zero-config-up').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        { extend: 'excel', className: 'btn btn-fill btn-fill-dark btn-rounded mb--7 mr-3', text:"<span class='flaticon-file'></span> {{ __('auth.labelExportExcel') }}",}
                    ]
                });
            }
            $('#vgpFinalTxt').text($('#vpFinalLabel').text());
        });

        function salir(){
            window.history.back();
        }

        function showEmail(row){
            alert(row);
        }
    </script>
</html>