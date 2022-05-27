<?php


// namespace statement to include Path like kernel, middleware files
namespace App\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MyTokenManager {
    // we use static to access this function without creating object of that class [:: scope resolution]
    public static function createPatientToken($patientId){

        // generate [new Token] (random string consist of 40 chars)
        $tokenStr = Str::random(40);

        // encrypt token using [Hash] class
        $encToken = Hash::make($tokenStr);

        // insert encrypted token (encToken) into Database
        DB::select('insert into patient_token(patient_id,token) VALUES (?, ?)',
        [$patientId,$encToken]);

        // to get the id of last inserted token
        $tokenId = DB::getPdo()->lastInsertId();

        // return tokenId and tokenString [not hashed]
        return "$tokenId|$tokenStr";
    }


    public static function currentPatient(Request $request){

        // get token
        $token = $request->bearerToken();

        // rejects request if no token is given
        if(!$token){
            return null;
        }

        // rejects any token that does not contain '|' symbol
        if(!str_contains($token,'|')){
            return null;
        }

        // split token into toeknid and tokenStr
        [$tokenId,$tokenStr] = explode('|',$token,2); // use 2 to maximise the partitioning to 2 sections only


        // search for token in patient_token table
        $result = DB::select(
            'select * from patient_token where id = ?'
            ,[$tokenId]);

        if($result){
            $tokenData = $result[0];

            // compare $tokenStr(stored in shared prefs) with $encryptedtoken stored in DB
            if(Hash::check($tokenStr,$tokenData->token)){

                // retrieve doctor data
                $queryResult = DB::select('select * from patient where pat_id = ?',[$tokenData->patient_id]);

                if($queryResult){
                    $patient = $queryResult[0];
                    return $patient;
                }
            }
        }

    }

    public static function removePatientToken(Request $request){
        // get token
        $token = $request->bearerToken();

        // rejects the request if it does not contain token
        if(!$token){
            return null;
        }

        // rejects the request if does not contain | symbol
        if(!str_contains($token,'|')){
            return null;
        }

        // split the token into id and tokenStr
        [$tokenId,$tokenStr] = explode('|',$token,2);


        DB::delete('delete from patient_token where id = ?',[$tokenId]);
    }

}
