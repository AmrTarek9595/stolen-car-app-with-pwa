<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\carinfo;
use App\inform;
use DB;
class apiController extends Controller
{
    public function getcountrisforstolenfrom()
    {
        $contries=DB::table('governorates')->get();
        return response()->json($contries);
    }
    public function getcitiesforstolenfrom($gov_id)
    {
        $cities=DB::table('cities')->where('gov_id',$gov_id)->get();
        return response()->json($cities);
    }

    public function reciveimage(Request $request)
    {
            $validator      =   Validator::make($request->all(),
            ['image1'=>'mimes:jpeg,jpg|max:5120','image2'=>'mimes:jpeg,jpg|max:5120']);
            
            if($validator->fails()) {
            
                return response()->json(['error_message'=>'please make sure the image not greater than 5MB, we Approve jpeg,jpg only.']);
            
                                    }
                $code = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUXYZ", 15)), 0, 15);
                $fullname=request()->fullName;
                $mobileNumber=request()->Mobile_Number;
                $stolenfrom=request()->stolenFrom;
                $city=request()->city;
                $carinfo =new carinfo;
                
            if(request()->carNumbers)
                {
                    if(request()->hasfile('image1') && request()->hasfile('image2'))
                        {
                
                                $image1=$request->file('image1');
                                $image2=$request->file('image2');
                                $file_name1=$code.'-'.$request->file('image1')->getClientOriginalName();
                                $file_name2=$code.'-'.$request->file('image2')->getClientOriginalName();
                                $destination = public_path('/images/library');
                                $carNumber=request()->carNumbers;
                                $carinfo->fullname=$fullname;   
                                $carinfo->mobilenumber=$mobileNumber;
                                $carinfo->carnumber=$carNumber;
                                $carinfo->image1=$file_name1;
                                $carinfo->image2=$file_name2;
                                $carinfo->govid=$stolenfrom;
                                $carinfo->cityid=$city;
                                $carinfo->code=$code;
                            
                        try {
                            $carinfo->save(); 
                            $image1->move($destination, $file_name1);
                            $image2->move($destination, $file_name2);
                            return response()->json(['message'=>"Your data has been successfully registered
                            ","code"=>$code]);
                        } catch(\Illuminate\Database\QueryException $e){
                            $errorCode = $e->errorInfo[1];
                            
                            return response()->json(['error_message'=>"Data may already be present",422]);
                            
                        }
                                
                        }
                    else if(request()->hasfile('image1') && !request()->hasfile('image2')) 
                    {  
                        $image1=$request->file('image1');
                        
                        $file_name1=$code.'-'.$request->file('image1')->getClientOriginalName();
                        $destination = public_path('/images/library');
                    
                        $carNumber=request()->carNumbers;
                        
                        $carinfo->fullname=$fullname;   
                        $carinfo->mobilenumber=$mobileNumber;
                        $carinfo->carnumber=$carNumber;
                        $carinfo->image1=$file_name1;
                        
                        $carinfo->govid=$stolenfrom;
                        $carinfo->cityid=$city;
                        $carinfo->code=$code;
                     
                    
                        try {
                            
                            $carinfo->save(); 
                            $image1->move($destination, $file_name1);
                    
                            return response()->json(['message'=>"Your data has been successfully registered
                            ","code"=>$code]);
                           
                        } catch(\Illuminate\Database\QueryException $e){
                            $errorCode = $e->errorInfo[1];
                            
                            return response()->json(['error_message'=>"Data may already be present",422]);
                            
                        }
                    
                    } 
                    

                    else if(!request()->hasfile('image1') && request()->hasfile('image2')) 
                    {  
                        

                        $image2=$request->file('image2');
                        $file_name2=$code.'-'.$request->file('image2')->getClientOriginalName();
                        $destination = public_path('/images/library');
                    
                        $carNumber=request()->carNumbers;

                        $carinfo->fullname=$fullname;   
                        $carinfo->mobilenumber=$mobileNumber;
                        $carinfo->carnumber=$carNumber;
                        $carinfo->image2=$file_name2;
                        $carinfo->govid=$stolenfrom;
                        $carinfo->cityid=$city;
                        $carinfo->code=$code;
                    
                    

                        try {
                            $carinfo->save(); 
                        
                            $image2->move($destination, $file_name2);
                            return response()->json(['message'=>"Your data has been successfully registered
                            ","code"=>$code]);
                        } catch(\Illuminate\Database\QueryException $e){
                            $errorCode = $e->errorInfo[1];
                            
                            return response()->json(['error_message'=>"Data may already be present",422]);
                            
                        }
                            
                    } 

                    else if(!request()->hasfile('image1') && !request()->hasfile('image2')){
                        $carNumber=request()->carNumbers;
                        $carinfo->fullname=$fullname;   
                        $carinfo->mobilenumber=$mobileNumber;
                        $carinfo->carnumber=$carNumber;
                        $carinfo->govid=$stolenfrom;
                        $carinfo->cityid=$city;
                        $carinfo->code=$code;
                        
                        try {
                            $carinfo->save(); 
                            return response()->json(['message'=>"Your data has been successfully registered
                            ","code"=>$code]);
                        } catch(\Illuminate\Database\QueryException $e){
                            $errorCode = $e->errorInfo[1];
                            
                            return response()->json(['error_message'=>"Data may already be present",422]);
                            
                        }
                        
                    
                    
                    }
                
                
                
                }
        else if((request()->carchar1 && request()->carchar2 && request()->carchar4) || (request()->carchar1 && request()->carchar2 && request()->carchar4 && request()->carchar3))
            {
                if(request()->hasfile('image1') && request()->hasfile('image2'))
                {
            
                    $image1=$request->file('image1');
                    $image2=$request->file('image2');
                    $file_name1=$code.'-'.$request->file('image1')->getClientOriginalName();
                    $file_name2=$code.'-'.$request->file('image2')->getClientOriginalName();
                    $destination = public_path('/images/library');
                    
                    $carChar1 = request()->carchar1;
                    $carChar2 = request()->carchar2;
                    $carChar3 = request()->carchar3;
                    $carChar4 = request()->carchar4;
                    $carinfo->fullname=$fullname;
                    $carinfo->mobilenumber=$mobileNumber;
                    $carinfo->govid=$stolenfrom;
                    $carinfo->cityid=$city;
                    $carinfo->code=$code;
                    $carinfo->image1=$file_name1;
                    $carinfo->image2=$file_name2;
                    $carinfo->carnumber=$carChar1.' '.$carChar2.' '.$carChar3.' '.$carChar4;
                    try {
                        $carinfo->save(); 
                        $image1->move($destination, $file_name1);
                        $image2->move($destination, $file_name2);
                        return response()->json(['message'=>"Your data has been successfully registered
                        ","code"=>$code]);
                    } catch(\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        
                        return response()->json(['error_message'=>"Data may already be present",422]);
                        
                    } 
                }
                else if(request()->hasfile('image1') && !request()->hasfile('image2'))
                {
                    $image1=$request->file('image1');
                    $file_name1=$code.'-'.$request->file('image1')->getClientOriginalName();
                    $destination = public_path('/images/library');
                
                    $carChar1 = request()->carchar1;
                    $carChar2 = request()->carchar2;
                    $carChar3 = request()->carchar3;
                    $carChar4 = request()->carchar4;
                    $carinfo->fullname=$fullname;
                    $carinfo->mobilenumber=$mobileNumber;
                    $carinfo->govid=$stolenfrom;
                    $carinfo->cityid=$city;
                    $carinfo->code=$code;
                    $carinfo->image1=$file_name1;
                    $carinfo->carnumber=$carChar1.' '.$carChar2.' '.$carChar3.' '.$carChar4;
                    try {
                        $carinfo->save(); 
                        $image1->move($destination, $file_name1);
                        return response()->json(['message'=>"Your data has been successfully registered
                        ","code"=>$code]);
                    } catch(\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        
                        return response()->json(['error_message'=>"Data may already be present",422]);
                        
                    } 
                } 
                else if(!request()->hasfile('image1') && request()->hasfile('image2'))
                {
                    $image2=$request->file('image2');
                    $file_name2=$code.'-'.$request->file('image2')->getClientOriginalName();
                    $destination = public_path('/images/library');
                
                    $carChar1 = request()->carchar1;
                    $carChar2 = request()->carchar2;
                    $carChar3 = request()->carchar3;
                    $carChar4 = request()->carchar4;
                    $carinfo->fullname=$fullname;
                    $carinfo->mobilenumber=$mobileNumber;
                    $carinfo->govid=$stolenfrom;
                    $carinfo->cityid=$city;
                    $carinfo->code=$code;
                    $carinfo->image2=$file_name2;
                    $carinfo->carnumber=$carChar1.' '.$carChar2.' '.$carChar3.' '.$carChar4;
                    try {
                        $carinfo->save(); 
                        $image2->move($destination, $file_name2);
                        return response()->json(['message'=>"Your data has been successfully registered
                        ","code"=>$code]);
                    } catch(\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        
                        return response()->json(['error_message'=>"Data may already be present",422]);
                        
                    } 
                } 
                else
                {
                    $carChar1 = request()->carchar1;
                    $carChar2 = request()->carchar2;
                    $carChar3 = request()->carchar3;
                    $carChar4 = request()->carchar4;
                    $carinfo->fullname=$fullname;
                    $carinfo->mobilenumber=$mobileNumber;
                    $carinfo->govid=$stolenfrom;
                    $carinfo->cityid=$city;
                    $carinfo->code=$code;
                    $carinfo->carnumber=$carChar1.' '.$carChar2.' '.$carChar3.' '.$carChar4;
                    try {
                        $carinfo->save(); 
                        return response()->json(['message'=>"Your data has been successfully registered
                        ","code"=>$code]);
                    } catch(\Illuminate\Database\QueryException $e){
                        $errorCode = $e->errorInfo[1];
                        
                        return response()->json(['error_message'=>"Data may already be present",422]);
                        
                    } 
                    
                
                }
            
            }
     
    }
    public function inquiry()
    {
        if(request()->phonenumber && request()->code)
        
        {
        $phone_number=request()->phonenumber;
        $code=request()->code;
        $carinfo=new carinfo();
        
        $dataapi = carinfo::where('code','=',$code)->where('mobilenumber','=',$phone_number)->get();
        if(count($dataapi)>0){
                    return response()->json($dataapi);
                }
                else{
                    return response()->json(['message'=>'No car with this numbers.']);

                }
         }
         else if(request()->carinfo_id){
                $data=inform::where('carinfo_id',request()->carinfo_id)->get();
                if(count($data)>0)
                {
                    return response()->json($data);
                }
                else
                {
                    return response()->json(['informmessage'=>'No Inform yet']);
                }
         }
    }
    public function searchinform()
    {
        if(request()->numbercar)
        {
            $no=request()->numbercar;
            $carno=carinfo::where('carnumber','=',$no)->get();
        if(count($carno)>0)
        {
            return response()->json(['datafound'=>$carno]);
        }
        else {
            return response()->json(['datanotfound'=>'Data Not Found']);
        }
        }
                else if(request()->no4){
                    $no1=request()->no1;
                    $no2=request()->no2;
                    $no3=request()->no3;
                    $no4=request()->no4;
                    $concatno=$no1.' '.$no2.' '.$no3.' '.$no4;
                    $carno=carinfo::where('carnumber','=',$concatno)->get();
                if(count($carno)>0)
                {
                    return response()->json(['datafound'=>$carno]);
                }
                else {
                    return response()->json(['datanotfound'=>'Data Not Found']);
                }
                }
    }
    public function submitinform(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
     
        
        $inform=new inform();
       $inform->mac_address = $ip;
       $inform->carinfo_id = request('carid');
       $inform->address_address	= request('location');
       $inform->address_latitude = request('lat'); 
       $inform->address_longitude = request('long');
        
       $check=inform::where('mac_address',$ip)->where('carinfo_id',request('carid'))->get();
        
       
       try {
        if(count($check)>0)
        {
            return response()->json(['message'=>"You made inform before"]);
        }
        else{
            $inform->save();
            return response()->json(['message'=>"Your data has been successfully registered "]);
        }
        
       
             } catch(\Illuminate\Database\QueryException $e){
        $errorCode = $e->errorInfo[1];
        
        return response()->json(['error_message'=>"You may Inform before",422]);
        
    } 
          
            
    }
    public function sendmessage(){
        $FullName=request()->FullName;
        /*$email=request()->email;
        $mobilenumber=request()->mobilenumber;
        $textmessage=request()->textmessage;*/
        return $FullName;
    }
    public function basic_email() {
        $data = array('name'=>request()->name,'email'=>request()->email,'phone'=>request()->phone,'text'=>request()->text);
        
        Mail::send('mail', $data, function($message) {
           $message->to('amr.el-sayed@nrchrod.org',request()->name)->subject
              ('E-mail from saree- Contact us section');
//$message->attach('C:\wamp64\www\stolenApp_V1\public\images\apply\apply_carInfo.png');
           $message->from(request()->email);
        });
        return response()->json('Thank you.');
     }
}
