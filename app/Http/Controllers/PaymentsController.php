<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Post;
use Auth;
use DB;
use App\Payments;
use Braintree_Transaction;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function process(Request $request)
    {
            $payload = $request->input('payload', false);
            $nonce = $payload['nonce'];

            $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $nonce,
            'options' => [
            'submitForSettlement' => True
                ]
    ]);

    return response()->json($status);


    }
    public function index()
    {

        if (Auth::check()){
       
        $data['data']= DB::table('category')->select('id','category')->get();
        $sub['sub']= DB::table('subcategory')->select('sub_id','subcategory')->get();
        if (count($data) > 0 && (count($sub) > 0)) 
        {
            
           
                return view('dashboard.subscriptions', $data, $sub);
           
       
        
        } else {
            return redirect('/')->with('error', 'Invalid Categories and Keywords!');
            
        }
        
        }else{
            return redirect('/');
        }
    		 
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if (Auth::check()){
            Payments::create($request->all());
            return view('dashboard.subscriptions');
             
             
         }else{
             return redirect('/');
         }
       
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
