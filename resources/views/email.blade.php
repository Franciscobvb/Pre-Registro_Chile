<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>NIKKEN Latam</title>
    </head>
    <body>

    <table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
        @php
            $title1 = '';
            $title2 = '';
            $cretedntialsLabel = '';
            $cretedntialsUser = '';
            $cretedntialsPass = '';
            if($lang == 'en'){
                $title1 = 'Thank you ';
                $title2 = ' for becoming part of Nikken Latin America.';
                $cretedntialsLabel = 'Credentials';
                $cretedntialsUser = 'User ID';
                $cretedntialsPass = 'Password';
                $sponsorInfo = "Sponsor: ";
            }
            else{
                $title1 = 'Gracias ';
                $title2 = ' por registrarte a NIKKEN Latinoamérica';
                $cretedntialsLabel = 'Credenciales de acceso';
                $cretedntialsUser = 'Usuario';
                $cretedntialsPass = 'Contraseña';
                $sponsorInfo = "Patrocinador: ";
            }
        @endphp
        <tr>
            <td style="padding: 0">
                <center>
                    <img style="padding: 0; display: block" src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" width="50%">
                </center>
            </td>
        </tr>
        
        <tr>
            <td style="background-color: #ecf0f1">
                <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                    <center>
                        <h2 style="color: #00bcd4!important; margin: 0 0 7px">NIKKEN Chile</h2>
                        <p style="margin: 2px; font-size: 15px">
                            {{ $title1 }} {!! $name !!} {{ $title2 }}
                        </p>
                        <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                            <img style="padding: 0; width: 200px; margin: 5px" src="https://icon-library.net/images/successful-icon/successful-icon-10.jpg">
                        </div>
                    </center>
                    <p>
                        {{ $cretedntialsLabel }} <br>
                        {{ $cretedntialsUser }}: {!! $user !!} <br>
                        {{ $cretedntialsPass }}: {!! $pass !!}
                    </p>
                    <b>
                        {{ $sponsorInfo }}: {!! $sponsor !!}
                    </b>
                </div>
            </td>
        </tr>
    </table>

    </body>
</html>