<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>NIKKEN Latam</title>
</head>
<body>

<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">

	<tr>
        <td style="padding: 0">
            <center>
                <img style="padding: 0; display: block" src="https://nikkenlatam.com/oficina-virtual/assets/images/general/logo-header-black.png" width="50%">
            </center>
		</td>
    </tr>
    
    @php
        $title = '';
        $text = '';
        if($lang == 'en'){
            $title = 'Congratulations on your successful recruitment of a new Nikken Team Member Latin America!';
            $text = 'We received an Enrollment Application for';
        }
        else{
            $title = '¡Felicitaciones por tu exitosa incorporación de un nuevo miembro del equipo Nikken Latinoamérica!';
            $text = 'Acabas de inscribir a';
        }
    @endphp
	
	<tr>
		<td style="background-color: #ecf0f1">
            <div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
                <center>
                    <h2 style="color: #00bcd4!important; margin: 0 0 7px">NIKKEN Chile</h2>
                    <p style="margin: 2px; font-size: 15px">
                        {{ $title }}
                    </p>
                    <div style="width: 100%;margin:20px 0; display: inline-block;text-align: center">
                        <img style="padding: 0; width: 200px; margin: 5px" src="https://icon-library.net/images/successful-icon/successful-icon-10.jpg">
                    </div>
                </center>
                <p>
                    {{ $text }}: {!! $name !!}<br>
                </p>
			</div>
		</td>
	</tr>
</table>

</body>
</html>