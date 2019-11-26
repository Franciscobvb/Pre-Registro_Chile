<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\State;
use App\consecutiveCodesTest;
use App;
use Mail;
use DB;

class preregistro extends Controller{
    public function index(){
        return view('index');
    }

    public function profile(Request $request){
        $language = $request->language;
        $country = $request->country;

        App::setLocale($language);

        if ($language == 'spa' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        else if ($language == 'en' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        
        $states = "chile";
        $cities = "Chile";

        return view('profile',compact('flag','country','language','states','cities'));
    }

    public function validateEmail(Request $request){
        $email = $request->input('email');
        $conection = \DB::connection('sqlsrv');
            $response = $conection->select("SELECT E_Mail FROM Associates_CHL WHERE E_Mail = '$email'");
        \DB::disconnect('sqlsrv');
        return $response;
    }

    public function getgenealogy(Request $request){
        $language = $request->language;
        $country = $request->country;

        App::setLocale($language);

        if ($language == 'spa' && $country == 'ch') {
            $countryN = 1;
        }
        else if ($language == 'en' && $country == 'ch') {
            $countryN = 1;
        }
        
        $states = "chile";
        $cities = "Chile";

        $associateid = $request->input('associateid');
        $conection = \DB::connection('sqlsrv');
            $response = $conection->select("exec GenTree_CHL '$associateid';");
        \DB::disconnect('sqlsrv');

        return view('hijos',compact('country','language','states','cities', 'response'));
    }

    public function store(Request $request){
        date_default_timezone_set('America/Mexico_City');

        $product = \App\consecutiveCodesTest::select(
            'consecutive_codes.code'
        )
        ->orderBy('code','desc')
        ->first();

        $language = $request->language;
        $country = $request->country;
    
        $newCode = $product->code + 2;
    
        $associateid = $newCode . '03';
        $associateType = '100';
        $signupdate = Date('Y-m-d 00:00:00');
        $apFirstName = $request->input('firstName') . ' ' . $request->input('secondName') . ', ' . $request->input('name');
        $apLastName = '';
        $apTaxId = '';
        $address1 = '';
        $city = ''; 
        $State = '';
        $PostalCode = '';
        $Country = 'CH';

        $SponsorId = $request->input('sponsorId');

        if($SponsorId == "sin_sponsor"){
            $sponsorDefault = "6267203-9571503-9494103-10809403-8757303-11730103-9637503-8701603-5731603-470803-10567703-477303-2231703-227703-478903-4936003-7982203-2919703-13158703-8503703-1450503-2063403-17532303-1536403-5125003-6531303-6511903-7888103-6657503-3245503-8006703-8569803-10276603-13417903-13304203-9709003-12463203-12554703-9822003-11194603-11878103-9594803-3706503-2056103-2099603-2053003-10701003-2105403-4292703-12642803-11233703-4580203-12728303-2056703-12634003-2186803";
            $sponsorDefault = explode('-', $sponsorDefault);
            $randoom = rand(0, 55);
            $SponsorId = $sponsorDefault[$randoom];
            $apLastName = 'ALEATORIO';
        }
        
        $Usr = '0';
        $pais = 'CHL';
        $status = 'N';
        $phone1 = $request->input('celPhone');
        $phone2 = $request->input('phone');
        $email = $request->input('email');
        $email = str_replace(' ', '', $email);
        $LicTradNum = '';
        $Entered = Date('Y-m-d 00:00:00');
        $AssociateRank = '';
        $PVPeriod = '0';
    
        $dataRegist = "$associateid;$associateType;$signupdate;$apFirstName;$apLastName;$apTaxId;$address1;$city;$State;$PostalCode;$Country;$SponsorId;$Usr;$pais;$status;$phone1;$phone2;$email;$LicTradNum;$Entered;$AssociateRank;$PVPeriod";
    
        $conection = \DB::connection('sqlsrv');
            $response = $conection->insert("EXEC [dbo].[Datos_CHL] '$dataRegist'");
            $datainserted = $conection->select("SELECT * FROM  Associates_CHL WHERE Associateid = $associateid");
        \DB::disconnect('sqlsrv');

        $psswd = substr( md5(microtime()), 1, 8);

        $contmailLogin = 0;
        if($contmailLogin == 0){

            $conection = \DB::connection('sqlsrv');
                $login = $conection->insert("EXEC [dbo].[Sp_LoginCHL] '$associateid;$psswd'");
            \DB::disconnect('sqlsrv');
            $countInsertLogin = 10;

            $conection = \DB::connection('sqlsrv');
                $personal_data = $conection->table('Sponsor_CHL')
                ->select('associateid as associateid','associateName as name','Email as email')
                ->where('associateid','=', $SponsorId)
                ->first();
            \DB::disconnect('sqlsrv');
        
            $correoSponsor = '';

            $Email = $personal_data->email;

            $correoSponsor = $Email;

            $cadena = str_replace(' ', '', $correoSponsor);

            $data = array(
                'name' => "$apFirstName",
                'user' => "$associateid",
                'pass' => "$psswd",
                'lang' => "$language",
                'sponsor' => "$personal_data->associateid - $personal_data->name",
            );
            Mail::send('email', $data, function ($message) use ($request) {
                $message->from('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
                $message->to($request->input('email'))->subject('Pre-Registro Chile');
                $message->bcc('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
            });

            if (!empty($cadena)) {
                $datasponsor = array(
                    'name' => "$associateid - $apFirstName",
                    'lang' => "$language"
                );

                Mail::send('sponsormail', $datasponsor, function ($message) use ($cadena) {
                    $message->from('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
                    $message->to($cadena)->subject('Pre-Registro Chile');
                });
            }

            $contmailLogin = 10;
        }

        $dataRegist = "";

        $codeconsecutive = new  \App\consecutiveCodesTest();
        $codeconsecutive->code = $newCode;
        $codeconsecutive->create_at = date('Y-m-d h:m:i');
        $codeconsecutive->save();

        return \Response::json($datainserted);
    }

    public function submitRegistro(Request $request){
        date_default_timezone_set('America/Mexico_City');

        $product = \App\consecutiveCodesTest::select(
            'consecutive_codes.code'
        )
        ->orderBy('code','desc')
        ->first();

        $language = $request->language;
        $country = $request->country;
    
        $newCode = $product->code + 2;
    
        $associateid = $newCode . '03';
        $associateType = '100';
        $signupdate = Date('Y-m-d 00:00:00');

        $apFirstName = $request->input('firstName') . ' ' . $request->input('secondName') . ', ' . $request->input('name');
        $apFirstName = preg_replace('/[0-9]+/', '', $apFirstName);
        $apFirstName = str_replace("/", "", $apFirstName);
        //$firstName = $apFirstName;

        $apLastName = '';
        $apTaxId = '';
        $address1 = '';
        $city = ''; 
        $State = '';
        $PostalCode = '';
        $Country = 'CH';

        $SponsorId = $request->input('sponsorId');

        if($SponsorId == "sin_sponsor"){
            $sponsorDefault = "6267203-9571503-9494103-10809403-8757303-11730103-9637503-8701603-5731603-470803-10567703-477303-2231703-227703-478903-4936003-7982203-2919703-13158703-8503703-1450503-2063403-17532303-1536403-5125003-6531303-6511903-7888103-6657503-3245503-8006703-8569803-10276603-13417903-13304203-9709003-12463203-12554703-9822003-11194603-11878103-9594803-3706503-2056103-2099603-2053003-10701003-2105403-4292703-12642803-11233703-4580203-12728303-2056703-12634003-2186803";
            $sponsorDefault = explode('-', $sponsorDefault);
            $randoom = rand(0, 55);
            $SponsorId = $sponsorDefault[$randoom];
            $apLastName = 'ALEATORIO';
        }
        
        $Usr = '0';
        $pais = 'CHL';
        $status = 'N';
        $phone1 = $request->input('celPhone');
        $phone2 = $request->input('phone');
        $email = $request->input('email');
        $email = str_replace(' ', '', $email);
        $LicTradNum = '';
        $Entered = Date('Y-m-d 00:00:00');
        $AssociateRank = '';
        $PVPeriod = '0';
    
        $dataRegist = "$associateid;$associateType;$signupdate;$apFirstName;$apLastName;$apTaxId;$address1;$city;$State;$PostalCode;$Country;$SponsorId;$Usr;$pais;$status;$phone1;$phone2;$email;$LicTradNum;$Entered;$AssociateRank;$PVPeriod";
    
        $conection = \DB::connection('sqlsrv');
            $response = $conection->insert("EXEC [dbo].[Datos_CHL] '$dataRegist'");
            $datainserted = $conection->select("SELECT * FROM  Associates_CHL WHERE Associateid = $associateid");
        \DB::disconnect('sqlsrv');

        $conection = \DB::connection('sqlsrv');
            $existLogin = $conection->select("SELECT * FROM Login_CHL WHERE Associateid = $associateid;");
        \DB::disconnect('sqlsrv');

        if(sizeof($existLogin) <= 0){

            $conection = \DB::connection('sqlsrv');
                $existAsesor = $conection->select("SELECT * FROM Associates_CHL WHERE Associateid = associateid;");
            \DB::disconnect('sqlsrv');

            if(sizeof($existAsesor) >= 1){
                $psswd = substr( md5(microtime()), 1, 8);
                $conection = \DB::connection('sqlsrv');
                    $login = $conection->insert("EXEC [dbo].[Sp_LoginCHL] '$associateid;$psswd'");
                \DB::disconnect('sqlsrv');
                

                $conection = \DB::connection('sqlsrv');
                    $personal_data = $conection->table('Sponsor_CHL')
                    ->select('associateid as associateid','associateName as name','Email as email')
                    ->where('associateid','=', $SponsorId)
                    ->first();
                \DB::disconnect('sqlsrv');
            
                $correoSponsor = '';

                $Email = $personal_data->email;

                $correoSponsor = $Email;

                $cadena = str_replace(' ', '', $correoSponsor);

                $data = array(
                    'name' => "$apFirstName",
                    'user' => "$associateid",
                    'pass' => "$psswd",
                    'lang' => "$language",
                    'sponsor' => "$personal_data->associateid - $personal_data->name",
                );
                Mail::send('email', $data, function ($message) use ($request) {
                    $message->from('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
                    $message->to($request->input('email'))->subject('Pre-Registro Chile');
                    $message->bcc('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
                });

                if (!empty($cadena)) {
                    $datasponsor = array(
                        'name' => "$associateid - $apFirstName",
                        'lang' => "$language"
                    );

                    Mail::send('sponsormail', $datasponsor, function ($message) use ($cadena) {
                        $message->from('servicio.chl@nikkenlatam.com', 'Pre-Registro Chile');
                        $message->to($cadena)->subject('Pre-Registro Chile');
                    });
                }

                $codeconsecutive = new  \App\consecutiveCodesTest();
                $codeconsecutive->code = $newCode;
                $codeconsecutive->create_at = date('Y-m-d h:m:i');
                $codeconsecutive->save();
            }
        }

        $dataRegist = "";

        return \Response::json($datainserted);
    }

    public function Loginproccess(Request $request){
        $userName = $request->input('userName');
        $userPass = $request->input('userPass');

        $conection = \DB::connection('sqlsrv');
            $login = $conection->select("SELECT * FROM Login_CHL WHERE Associateid = $userName AND Password_CHL = '$userPass';");
        \DB::disconnect('sqlsrv');

        return $login;
    }

    public function pdf(Request $request){
        $associateid = $request->associateid;
        $sponsorid = $request->sponsorid;

        $language = $request->language;
        $country = $request->country;

        App::setLocale($language);

        if ($language == 'spa' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        else if ($language == 'en' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        
        $states = "chile";
        $cities = "Chile";

        $conection = \DB::connection('sqlsrv');
            $datainserted = $conection->select("SELECT * FROM  Associates_CHL WHERE Associateid = $associateid");
            $sponsor = $conection->select("SELECT * FROM Sponsor_CHL WHERE associateid = $sponsorid");
        \DB::disconnect('sqlsrv');

        //return view('pdf', compact('datainserted', 'sponsor'));
        $pdf = \PDF::loadView('pdf', compact('datainserted', 'sponsor', 'flag', 'country', 'language', 'states', 'cities'));
        return $pdf->download('NIKKEN CHile.pdf');
    }

    public function getSponsors(Request $request){
        $datoabuscar = $request->datoabuscar;

        $conection = \DB::connection('sqlsrv');
            $response = $conection->select("SELECT TOP 7 associateid, AssociateName  FROM Sponsor_CHL WHERE associateid LIKE '%$datoabuscar%' OR AssociateName LIKE '%$datoabuscar%'");
        \DB::disconnect('sqlsrv');

        $resultado = '';
        foreach ($response as $key) {
            $resultado = $resultado . "
                <a href='javascript:void(0)' style='cursor: pointer; width: 100%;' id='" . $key->associateid . '-' . $key->AssociateName ."' onclick='clearDiv(this.id)'>" . 
                    "<label width='100%'>" . $key->associateid . '-' . $key->AssociateName . "</label>" .
                "</a'>
            ";
        }
        return $resultado;
    }

    public function validarSponsor(Request $request){
        $datoabuscar = $request->sponsorId;
        $conection = \DB::connection('sqlsrv');
            $response = $conection->select("SELECT * FROM Sponsor_CHL WHERE associateid = $datoabuscar");
        \DB::disconnect('sqlsrv');

        return \Response::json($response);
    }

    public function profiletest(Request $request){
        $language = $request->language;
        $country = $request->country;

        App::setLocale($language);

        if ($language == 'spa' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        else if ($language == 'en' && $country == 'ch') {
            $flag = 'chile.png';
            $countryN = 1;
        }
        
        $states = "chile";
        $cities = "Chile";

        return view('profile_test',compact('flag','country','language','states','cities'));
    }

    public function Loginproccesstest(Request $request){
        $userName = $request->input('userName');
        $userPass = $request->input('userPass');

        $conection = \DB::connection('sqlsrv');
            $login = $conection->select("SELECT * FROM Login_CHL WHERE Associateid = $userName AND Password_CHL = '$userPass';");
        \DB::disconnect('sqlsrv');

        return $login;
    }

    public function getgenealogytest(Request $request){
        $language = $request->language;
        $country = $request->country;

        App::setLocale($language);

        if ($language == 'spa' && $country == 'ch') {
            $countryN = 1;
        }
        else if ($language == 'en' && $country == 'ch') {
            $countryN = 1;
        }
        
        $states = "chile";
        $cities = "Chile";

        $associateid = $request->input('associateid');
        $conection = \DB::connection('sqlsrv');
            $response = $conection->select("exec GenTree_CHL '$associateid';");
        \DB::disconnect('sqlsrv');

        return view('hijos_test',compact('country','language','states','cities', 'response'));
    }
}
