<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;


class AuthController extends Controller
{
  public $successStatus = 200;
    public function register(Request $request){
       $validateData=$request->validate([
           'email' => 'required',
           'name'  =>'required',
           'password' => 'required'
 
       ]);
       

       $user=User::firstOrNew(['email' => $request->email]);
       $user->email=$request->email;
       $user->name= $request->name;
       $user->password=Hash::make($request->password);
       $user->save();

    //   $http= new \GuzzleHttp\Client();
    // $response = $http->post( 'http://localhost:8000/oauth/token', [
    
    //     'form_params' => [
    //         'client_id' => '2',
    //         'client_secret' => 'vb3c4g4aNQHpngSOqr7kVRSLDCO029Shi3UOLJxn',
    //         'grant_type' => 'password',
    //         'username' => $request->email,
    //         'password' => $request->password,
    //         'scope' => '',
    //     ],
    //   ]);




    // make an internal request to the passport server
    $tokenRequest = Request::create('/oauth/token', 'post', [
            'grant_type'    => 'password',
            'client_id'     => '2',
            'client_secret' => 'YjeTgChvldu6Dn7mwYmoow32CAvibyHGncM3Vjyq',
            'username'      => $request->input('email'),
            'password'      => $request->input('password')
    ]);

    
    $response = app()->handle($tokenRequest);
    
    return $response;
   } 
   public function login(Request $request){
     $validateData=$request->validate([
           'email' => 'required',
           
           'password' => 'required'
 
       ]);
     $user=User::firstOrNew(['email' => $request->email]);
     if(!$user){
      return response(['[status'=>'error','message'=> 'User Not Found']);
     }

     if(Hash::check($request->password,$user->password)){
          $tokenRequest = Request::create('/oauth/token', 'post', [
                'grant_type'    => 'password',
                'client_id'     => '2',
                'client_secret' => 'YjeTgChvldu6Dn7mwYmoow32CAvibyHGncM3Vjyq',
                'username'      => $request->input('email'),
                'password'      => $request->input('password')
        ]);

        
        $response = app()->handle($tokenRequest);
        return $response;
     }

   }


}