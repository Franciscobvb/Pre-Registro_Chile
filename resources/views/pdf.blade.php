<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>NIKKEN Chile</title>
        <style>
            body{
                font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;;
            }
            h1{
                text-align: center;
                text-transform: uppercase;
            }
            .contenido{
                width: 90%;
                
                padding: 1rem 1rem;
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #495057;
                background-color: #fff;
                background-clip: padding-box;
                border: 1px solid #ced4da;
                border-radius: 0.25rem;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                color:
                #495057;
                background-color: #fff;
                border-color: #80bdff;
                outline: 0;
                box-shadow: 0 0 0 0.2rem
                rgba(0, 123, 255, 0.25);
                margin: auto;
            }
            #primero{
                background-color: #ccc;
            }
            #segundo{
                color:#44a359;
            }
            #tercero{
                text-decoration:line-through;
            }

            .col-md-4{
                width: 49%;
                padding-left: 1px;
                float: left;
            }

            .col-md-4-1{
                width: 49%;
                padding-right: 1px;
                float: right;
            }

            .after-box {
                clear: left;
            }
        </style>
    </head>
    <body>
        <center>
            <img src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" width="10%">
        </center>
        <h1 style="color: green; padding-top: 0;">NIKKEN Chile</h1>
        <hr>
        <div class="contenido">
            <div class="col-md-4">
                <label>
                    <b>{{ __('auth.label') }}</b>
                </label>
                <br>
                @foreach ($sponsor as $data)
                    @php
                        $sponsor = $data->associateid . " - " . $data->associateName;
                    @endphp
                @endforeach
                @foreach ($datainserted as $row)
                    @php
                        $associateId = $row->AssociateId;
                        $name = $row->ApFirstName;
                        $Phone1 = $row->Phone1;
                        $Phone2 = $row->Phone2;
                        $E_Mail = $row->E_Mail;
                    @endphp
                @endforeach
                <label>
                    <b><label id="sponsorCode">{{ $sponsor }}</label></b>
                </label>
                <br><br><br>
                <label>
                    <b>{{ __('auth.labelAsBi')}}</b>
                </label>
                <br><br>
                <label>
                    {{ __('auth.labelCode')}}<b> <label id="newadvisorCode">{{ $associateId }}</label></b>
                </label>
                <br><br>
                <label>
                    {{ __('auth.labelName')}}<b> <label id="newadvisorName">{{ $name }}</label></b>
                </label>
                <br><br>
                <label>
                    {{ __('auth.labelCelPhone')}}<b> <label id="newadvisorPhone">{{ $Phone1 }}</label></b>
                </label>
                <br><br>
                <label>
                    {{ __('auth.labelTel')}}<b> <label id="newadvisorPhone2">{{ $Phone2 }}</label></b>
                </label>
                <br><br>
                <label>
                    {{ __('auth.labelEmail')}}<b> <label id="newadvisorEmail">{{ $E_Mail }}</label></b>
                </label>
            </div>
            <div class="col-md-4-1">
                <img alt="logo" src="{{asset('regchileasset/img/flag-chile.png')}}" width="100%">
            </div>
            <section class="after-box"></section>
        </div>
    </body>
</html>

