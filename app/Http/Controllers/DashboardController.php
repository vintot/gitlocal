<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Post;
use Auth;
use DB;
use Braintree_Subscription;
use Braintree_SubscriptionSearch;


class DashboardController extends Controller
{

    public function index()
    {

    	if(Auth::check()){

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        $active = Braintree_Subscription::search([
            Braintree_SubscriptionSearch::status()->in(
                [Braintree_Subscription::ACTIVE]
                ),
            Braintree_SubscriptionSearch::inTrialPeriod()->is(false)
        ]);
        
        $activecount = 0;
        foreach($active as $subscription) {
            $activecount++;
        }
        
        
        $trial = Braintree_Subscription::search([
            Braintree_SubscriptionSearch::status()->in(
                [Braintree_Subscription::ACTIVE]
                ),
            Braintree_SubscriptionSearch::inTrialPeriod()->is(true)
        ]);
        
        $trialcount = 0;
        foreach($trial as $subscription) {
            $trialcount++;
        }
        
        $pastdue = Braintree_Subscription::search([
            Braintree_SubscriptionSearch::status()->in(
                [Braintree_Subscription::PAST_DUE]
                )
        ]);
        
        $pastduecount = 0;
        foreach($pastdue as $subscription) {
            $pastduecount++;
        }
        
        $cancelled = Braintree_Subscription::search([
            Braintree_SubscriptionSearch::status()->in(
                [Braintree_Subscription::CANCELED]
                )
        ]);
        
        $cancelledcount = 0;
        foreach($cancelled as $subscription) {
            $cancelledcount++;
        }
        
        
        
               
        return view('dashboard.index')->with('count',['active'=>$activecount,'trial'=>$trialcount, 'pastdue'=>$pastduecount, 'cancelled'=>$cancelledcount] );
    
    	
    }else{
    	return redirect('/');
    }

	
	}

	public function listings(){

		if (Auth::check()){


			$listings = DB::table('listings')->select('businessname','subid','customerid','subscriptiontype', 'primaryphone', 'email', 'category', 'keyword', 'agent','callcenter', 'businesshour', 'subscriptionstat', 'agreementstatus','created_at', 'updated_at')->get();
			return view('dashboard.listings')->with('listings', $listings);

		}else{
			return redirect('/');
		}

	}

	public function subscriptions(){

		if (Auth::check()){
			
			$categories = DB::table('category')->select('id','category')->get();
			
			return view('dashboard.subscriptions')->with('categories', $categories);
			
			
		}else{
			return redirect('/');
		}

	}

	public function users(){

		if (Auth::check()){

			return view('dashboard.users');

		}else{
			return redirect('/');
		}
	}
	

	public function groups(){

		if (Auth::check()){

			return view('dashboard.groups');

		}else{
			return redirect('/');
		}

	}

	public function permissions(){

		if (Auth::check()){

			return view('dashboard.permissions');

		}else{
			return redirect('/');
		}

	}
	public function invoice(){

		if (Auth::check()){

			return view('dashboard.invoice');

		}else{
			return redirect('/');
		}
		

	}
	
	public function centers(){
		
		if (Auth::check()){

			return view('dashboard.centers');

		}else{
			return redirect('/');
		}
		

    }
    public function tableview(){
		
		if (Auth::check()){


			$users = DB::table('users')->select('lastname','firstname', 'middlename', 'email', 'username', 'user_level','center','created_at', 'updated_at')->get();
			return view('dashboard.tableview')->with('users', $users);

		}else{
			return redirect('/');
		}

		

	}

}
