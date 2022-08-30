<?php


// namespace statement to include Path like kernel, middleware files
namespace App\Helpers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DoctorsTokenManager {
    public static function createDoctorToken($doctor_id) {
        // generate [new token] (random string consist of 40 chars)
        $tokenStr = Str::random(40);

        // encrypt token using Hash function
        $encToken = Hash::make($tokenStr);

        // insert encrypted token (encToken) into Database
        DB::select("insert into doctor_token (doctor_id,token) values (?,?)",[$doctor_id,$encToken]);

        // to get the id of last inserted token
        $tokenId = DB::getPdo()->lastInsertId();

        return "$tokenId|$tokenStr";
    }

    // check if the request sent by doctor
    public static function currentDoctor(Request $request) {

        // get token
        $token = $request->bearerToken();

        // rejects the request of no token is given
        if(!$token){
            return null;
        }

        // rejects any token that does not contain '|' symbol
        if(!str_contains($token,'|')){
            return null;
        }

        // split token into toeknid and tokenStr
        [$tokenId,$tokenStr] = explode('|',$token,2);

        $result = DB::select("select * from doctor_token where id = ?",[$tokenId]);


        if($result){

            $tokenData = $result[0];

            // compare $tokenStr(stored in shared prefs) with $encryptedtoken stored in DB
            if(Hash::check($tokenStr,$tokenData->token)){

                // retrieve doctor data
                $doctor_result = DB::select("select * from doctor where doc_id = ? ",[$tokenData->doctor_id]);

                if($doctor_result){
                    $doctor = $doctor_result[0];
                    return $doctor;
                }
            }
        }
    }

    public static function removeDoctorToken(Request $request) {

        // get token
        $token = $request->bearerToken();

        // rejects the request of no token is given
        if(!$token){
            return null;
        }

        // rejects any token that does not contain '|' symbol
        if(!str_contains($token,'|')){
            return null;
        }

        // split token into toeknid and tokenStr
        [$tokenId,$tokenStr] = explode('|',$token,2);

        $result = DB::select("select * from doctor_token where id = ?",[$tokenId]);


        if($result){

            $tokenData = $result[0];

            // compare $tokenStr(stored in shared prefs) with $encryptedtoken stored in DB
            if(Hash::check($tokenStr,$tokenData->token)){

                $deleted = DB::delete("delete from doctor_token where id = ?",[$tokenData->id]);
            }
        }
    }

}
