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
            //$upline = $conection->select("exec Sp_UplineTree_CHL '$associateid';");
        \DB::disconnect('sqlsrv');

        return view('hijos',compact('country','language','states','cities', 'response')); //, 'upline'
    }

    public function store(Request $request){
        $product = \App\consecutiveCodesTest::select(
            'consecutive_codes_test.code'
        )
        ->orderBy('code','desc')
        ->first();

        $language = $request->language;
        $country = $request->country;
    
        $newCode = $product->code + 2;

        $codeconsecutive = new  \App\consecutiveCodesTest();
        $codeconsecutive->code = $newCode;
        $codeconsecutive->create_at = date('Y-m-d h:m:i');
        $codeconsecutive->save();
    
        $associateid = $newCode . '03';
        $associateType = '100';
        $signupdate = Date('Y-m-d h:m:s');
        $apFirstName = $request->input('firstName') . ' ' . $request->input('secondName') . ', ' . $request->input('name');
        $apLastName = '';
        $apTaxId = '';
        $address1 = '';
        $city = ''; 
        $State = '';
        $PostalCode = '';
        $Country = 'CH';
        $SponsorId = $request->input('sponsorId');
        $Usr = '0';
        $pais = 'CHL';
        $status = 'N';
        $phone1 = $request->input('celPhone');
        $phone2 = $request->input('phone');
        $email = $request->input('email');
        $LicTradNum = '';
        $Entered = Date('Y-m-d h:m:s');
        $AssociateRank = '';
        $PVPeriod = '0';
    
        $dataRegist = "$associateid;$associateType;$signupdate;$apFirstName;$apLastName;$apTaxId;$address1;$city;$State;$PostalCode;$Country;$SponsorId;$Usr;$pais;$status;$phone1;$phone2;$email;$LicTradNum;$Entered;$AssociateRank;$PVPeriod";
    
        $conection = \DB::connection('sqlsrv');
            $response = $conection->insert("EXEC [dbo].[Datos_CHL] '$dataRegist'");
            $datainserted = $conection->select("SELECT * FROM  Associates_CHL WHERE Associateid = $associateid");
        \DB::disconnect('sqlsrv');
    
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
    
        $data = array(
            'name' => "$apFirstName",
            'user' => "$associateid",
            'pass' => "$psswd",
            'lang' => "$language"
        );

        $correoSponsor = '';

        $associateid = $personal_data->associateid;
        $associateName = $personal_data->name;
        $Email = $personal_data->email;

        $correoSponsor = $Email;
        
        Mail::send('email', $data, function ($message) use ($request) {
            $message->from('fmelchor@nikkenlatam.com', 'Pre-Registro Chile');
            $message->to($request->input('email'))->subject('Pre-Registro Chile');
            $message->bcc('fmelchor@nikkenlatam.com', 'Pre-Registro Chile');
        });

        $datasponsor = array(
            'name' => "$associateid - $apFirstName",
            'lang' => "$language"
        );

        Mail::send('sponsormail', $datasponsor, function ($message) use ($correoSponsor) {
            $message->from('fmelchor@nikkenlatam.com', 'Pre-Registro Chile');
            $message->to($correoSponsor)->subject('Pre-Registro Chile');
        });

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
            $response = $conection->select("select top 10 * from Sponsor_CHL where AssociateName like '%$datoabuscar%' or associateid  like '%$datoabuscar%'");
        \DB::disconnect('sqlsrv');

        return \Response::json($response);
    }
}
