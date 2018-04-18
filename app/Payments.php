<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Payments extends Model
{
    protected $category='category';
    protected $table = 'listings';
    
    protected $fillable = [
        'businessname', 'primaryphone', 'email', 'category', 'keyword', 'agent','callcenter', 'businesshour', 'billingname', 'creditcardnumber', 'month', 'year', 'cvv', 'prepaid', 'street', 'city', 'state', 'zip', 'subscriptiontype', 'agreementstatus'
     ];
     protected $hidden = [
         'creditcarnumber', 'billingname', 
        
     ];
 
}