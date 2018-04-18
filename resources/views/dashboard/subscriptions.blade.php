@extends('layouts.app')

@section('content')
 
<div class="row wizard-row">
  <div class="col-md-12 fuelux">
  <div class="block-wizard panel panel-default">
  <div id="wizard1" class="wizard wizard-ux">
        <ul class="steps">
            <li data-step="1" class="active">1. Account<span class="chevron"></span></li>
            <li data-step="2">2. Payments<span class="chevron"></span></li>
            
        </ul>
      
     
  <!-- Step 1-->  
{!! Form::open(['action' => 'PaymentsController@process', 'method' => 'POST', 'data-parsley-namespace'=>'data-parsley-', 'data-parsley-validate'=>'','novalidate'=>'','class'=>'form-horizontal group-border-dashed', 'id' => 'checkout' ]) !!}
  <div class="step-content">
    <div data-step="1" class="step-pane active">
        <div class="panel-body">
           
          </div>
  
      <div class="form-group no-padding">
        </div>
                                   <!-- Business Name-->
      
                                        <div class="form-group">
                                          {{Form::label('businessname', 'Buisness Name *',['class'=>'col-sm-2 control-label'  ])}}
                                          
                                          <div class="col-sm-9">
                                              {{Form::text('businessname', '',['class'=>'form-control', 'placeholder'=>'Sesame Street Inc.','style'=>'text-transform:uppercase', 'required'=>''])}}
                                          </div>

                                        </div>
                                  <!-- Primary Phone-->
                                      <div class="form-group">
                                          {{Form::label('primaryphone', 'Primary Phone *',['class'=>'col-sm-2 control-label' ])}}
                                       
                                        <div class="col-sm-9">
                                            {{Form::text('primaryphone', '',['class'=>'form-control', 'placeholder'=>'(999) 999-9999', 'data-mask'=>'phone' , 'required'=>''])}}
                                         
                                        </div>
                                      </div>
                                  <!-- Primary Email-->
                                            <div class="form-group">
                                                {{Form::label('email', 'Primary Email *',['class'=>'col-sm-2 control-label' ])}}
                
                                              <div class="col-sm-9">
                                                  {{Form::email('email', '',['class'=>'form-control', 'placeholder'=>'Enter email', 'parsley-trigger'=>'change', 'autocomplete'=>'on', 'required'=>''  ])}}
                                              </div>
                                            </div>
                                    <!-- Category and Keyword-->
                                              <div class="form-group"> 
                                                    {{Form::label('category', 'Categories *',['class'=>'col-sm-2 control-label' ])}} 
                                                    <div class="col-sm-4">      
                                                                     <select name="category" class="select2" name="category">
                                                                            @foreach($data as $value)
                                                                                 <option value="{{$value->category}}">{{$value->category}}</option>
                                                                            @endforeach 
                                                                    </select>    
                                                    </div>               
                                                    <div class="col-sm-5">
                                                                    <select name="subcategory" class="select2" name="category" multiple="">
                                                                            @foreach($sub as $sub_value)
                                                                                <option value="{{$sub_value->subcategory}}">{{$sub_value->subcategory}}</option>
                                                                            @endforeach
                                                                                        
                                                                    </select>     
                                                    </div>
                                                                                            
                                    
                                              </div>

                                     <!--Agent-->

                               
                                           
                                        
                                            {{Form::hidden('agent', Auth::user()->firstname, ['class'=>'form-control', 'readonly'=>'readonly', ])}}
                                         
                                    

                                     <!--Call Center-->
                                        
                                    
                                           
                                       
                                                    
                                         {{Form::hidden('callcenter', Auth::user()->center, ['class'=>'form-control', 'readonly'=>'readonly', ])}}
                                       
                                    
                

                                    <!--Business Hours-->

                                      <div class="form-group">
                                          {{Form::label('hours', 'Business Hours *',['class'=>'col-sm-2 control-label' ])}}
                                       
                                          <div class="col-sm-10">
                                              
                                                <div id="businessHoursContainer1"></div>
                                                
                                                {{Form::hidden('businesshour', null, ['class'=>'form-control','id'=> 'businessHoursOutput1'])}}
                                            
                                          </div>
                                      </div>
    

                                        <!--Next Button -->
                                        
                                        <div class="form-group">
                                          <div class="col-sm-offset-2 col-sm-10">
                                               {{Form::submit('Next Step', ['class'=>'btn btn-primary btn-space wizard-next','id'=>'btnSerialize',  'data-wizard'=>'#wizard1' ])}}
                                          </div>
                                        </div>


     
    </div>
 
  <!-- Step 2--> 
  
 
    <div data-step="2" class="step-pane active">
    
        <div class="form-group no-padding">
        </div>
                  <!-- Name-->
                  <div class="col-sm-12">
                      {{Form::label('billingname', 'Card Holder Information *',['class'=>'control-label' ])}}
                  <!--Card holder-->
                     <div class="form-group">

    
                            <div class="col-sm-4">
                                {{Form::text('lastname', '', ['class'=>'form-control', 'placeholder'=>'Last Name', 'style'=>'text-transform:uppercase','required'=>''])}}
                            </div>
                           <div class="col-sm-4">
                                {{Form::text('firstname', '', ['class'=>'form-control', 'placeholder'=>'First Name','style'=>'text-transform:uppercase', 'required'=>''])}}
                            </div>
                             <div class="col-sm-4">
                                {{Form::email('email', '',['class'=>'form-control', 'placeholder'=>'Enter email', 'parsley-trigger'=>'change', 'autocomplete'=>'on', 'required'=>''  ])}}
                            </div>

                     </div>
                   
                     <!--Card holder name-->
                     <div class="form-group">

    
                            <div class="col-sm-6">
                                {{Form::text('billingname', '', ['class'=>'form-control', 'placeholder'=>'Cardholder Name','style'=>'text-transform:uppercase', 'required'=>''])}}
                            </div>
                            <div class="col-sm-6">
                           {{Form::text('primaryphone', '',['class'=>'form-control', 'placeholder'=>'(999) 999-9999', 'data-mask'=>'phone' , 'required'=>''])}}
                            </div>
                          
                     </div>
                    </div>
                       
                 <!-- Credit Card -->
                 
                 <div class="col-sm-12">
                    {{Form::label('creditcardnumber', 'Credit Card Number *',['class'=>'control-label' ])}}
                
                 
              </div>
               
                <div class="col-sm-12">
                    <div class="form-group">

                        <!-- creditcard -->
                              <div class="col-sm-4">
                                    {{Form::text('creditcardnumber', '', ['class'=>'form-control', 'placeholder'=>'1234 5678 9012 3456', 'id'=>'checkout_card_number', 'size'=>'19','maxlength'=>'19','data-stripe'=>'number', 'required'=>''  ])}}
                              </div>
                         <!-- month and year -->
                              <div class="col-sm-4">
                                    {{Form::text('Expiration Date', '', ['class'=>'form-control', 'placeholder'=>'MM/YYYY', 'id'=>'expiration-date', 'size'=>'7','maxlength'=>'7','data-stripe'=>'number', 'required'=>''  ])}}
                              </div>
                        <!-- cvv -->
                              <div class="col-sm-2">
                                  {{Form::text('cvv', '', ['class'=>'form-control', 'placeholder'=>'CVV', 'maxlength'=>'4', 'data-parsley-type'=>'number' , 'required'=>'' ])}}
                              </div>
                                {{ Form::checkbox('prepaid', 'Yes') }} {{Form::label('prepaid', 'Allow Prepaid',['class'=>'control-label' ])}}
                      
                    </div>
                </div>
                      
                       <!-- Billing Info-->
                       <div class="col-sm-12">
                          {{Form::label('billinginformation', 'Billing Information *',['class'=>'control-label' ])}}
                         
                          
                             <div class="form-group">
                                    <div class="col-sm-4">
                                        {{Form::text('street', '', ['class'=>'form-control', 'placeholder'=>'Billing Street','style'=>'text-transform:uppercase', 'required'=>''])}}
                                     
                                    </div>

                                    <div class="col-sm-4">
                                        {{Form::text('city', '', ['class'=>'form-control', 'placeholder'=>'City' ,'style'=>'text-transform:uppercase' ,'required'=>'' ])}}
                                        
                                      </div>

                                      <div class="col-sm-2">
                                          {{Form::text('state', '', ['class'=>'form-control', 'placeholder'=>'State','style'=>'text-transform:uppercase', 'maxlength'=>'2' , 'required'=>''])}}
                                          
                                        </div>
                                  
                                    <div class="col-sm-2">
                                        {{Form::text('zip', '', ['class'=>'form-control', 'placeholder'=>'Zip', 'maxlength'=>'5', 'required'=>'' ])}}
                                      
                                    </div>
                                
                                   
                             </div>

                             <div class="form-group">
                                    <div class="col-sm-12">
                                    {{ Form::checkbox('agreementstatus', 'Yes') }} {{Form::label('agreementstatus', 'I agree to the searchmylocals.com Terms and Condition',['class'=>'control-label', 'required'=>'' ])}}
                                    </div>
                            </div>
                              

                      </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                          {{Form::submit('Previous', ['class'=>'btn btn-default btn-space wizard-previous','data-wizard'=>'#wizard1' ])}}
                          {{Form::submit('Complete', ['class'=>'btn btn-success btn-space', 'id'=>'process'])}}
                      </div>
                    </div>
   
                   
    </div>
</div>
{!! Form::close() !!}

<!-- Load the required client component. -->
<script src="https://js.braintreegateway.com/web/3.32.0/js/client.min.js"></script>

<!-- Load Hosted Fields component. -->
<script src="https://js.braintreegateway.com/web/3.32.0/js/hosted-fields.min.js"></script>

<script type="text/javascript">

var form = document.querySelector('#checkout');
var submit = document.querySelector('#process');



</script>


  </div>
  </div>
  </div>
  </div>

@endsection