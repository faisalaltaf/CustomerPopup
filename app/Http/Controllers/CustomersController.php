<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


class CustomersController extends Controller
{


     // == STORE USER CREATE FUNCTION ==//
    public function userlogin(Request $request)
    {
        $shop = auth()->user();
        //    dd($request->email);
  // ==================START CUSTOMER API CREATE START = ==============
    // ========================================================
    $customers = [
        "customer" => [
          "email" => $request->email,
          ]
        ];
    //   dd($customers)
    $customer = $shop->api()->rest('POST', "/admin/api/2021-10/customers.json",$customers);
    if($customer['status'] == 422){
        return response('422');
    };
    if($customer['status'] ==201){
    $customer_id = $customer['body']->container['customer']['id'];
    $customer_email = $customer['body']->container['customer']['email'];
    $customer_accept_merketing = $customer['body']->container['customer']['accepts_marketing'];    
 // ==================END CUSTOMER API CREATE END ==============
//  dd($customer_id, $customer_email,$customer_accept_merketing);
     // ==================database save data ==============
    // ========================================================
    $shop_name = auth()->user()->name;
    $customer_db = new Customers;
    $customer_db->customer_id = $customer_id;
    $customer_db->accept_merketing = $customer_accept_merketing;
    $customer_db->email = $customer_email;
    $customer_db->store_name = $shop_name;
    $result = $customer_db->save();         
    return 'true';
}else{
    return 'false';
}
    }
        // == APP SETTING DATA CREATE FUNCTION ==//
    public function createaudiencelist(Request $request){
    //  dd($request);
        $shop_tags =$request->tags_shop;
        $shop_name =auth()->user()->name;
        // START IMAGE CHECK VALUE //
        if($request->file_name === null) {
            $result =Setting::where(['store_name'=>$shop_name ])->get()->first();
            $imageName= $result->file_path;
        }
    if($request->file_name !=null){
        $imageName = time().'.'.$request->file_name->extension();
        $request->file_name->move(public_path('images'), $imageName);
    } 
     //END IMAGE CHECK VALUE //
    //  APP UPDATE DATA QUERY DTABASE// 
          $Customer_check = Setting::where(['store_name'=>$shop_name ])->update(['store_name'=>$shop_name,'file_path'=>$imageName,'top_heading'=>$request->top_heading ,'list_item'=>$request->list_items,'email'=>$request->email ,'button'=>$request->button,'head_background'=>$request->head_background,'top_heading_color'=>$request->top_heading_color ,'top_heading_font'=>$request->top_heading_font,'list_items_color'=>$request->list_items_color,'list_items_font'=>$request->list_items_font,'button_colors'=>$request->button_color,'tags_shop'=>$shop_tags,'weekday'=>$request->weekday]);
            return response()->json(['success' => 'Your Data Successfully']);   
    }
        // == STORE POPUP DATA GET FUNCTION ==//
    public function getdata_popup(Request $request)
    {
        // dd($request);
        $shop = $request->shop;
        $pop_up_get = Setting::where(['store_name'=>$shop])->get()->first();
        if($pop_up_get!=null){
            return $pop_up_get;
        }else{
            $pop_up_get = Setting::where(['store_name'=>'CustomerAppp'])->get()->first();
            return $pop_up_get;
        }  
    }
    // == APP AUDIENCE LIST GET DATA SHOW IN BLADE FUNCTION BUT CODE NOT USE WEB ROUTE FOLDER GET DATA ==//
    public function getaudiencelist()
    {
        $shop = auth()->user()->name;
        $customer_list_get = Customers::where(['store_name'=>$shop])->get();
            return view('audience_list')->with('customer_list_get',$customer_list_get);
    }
}
