@extends('layouts.app')

@section('content')



        <div class="main-content container-fluid">

          <div class="row">
            <div class="col-sm-12">
              <div class="panel panel-default panel-table">
                <div class="panel-heading">Listings
             <div class="tools"><span class="icon mdi mdi-download"></span><span class="icon mdi mdi-more-vert"></span></div>
            </div>
                <div class="panel-body">
                  <table id="table1" class="table table-striped table-hover table-fw-widget">
                    <thead>
                      <tr>
                        <th>Business Name</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th>Updated</th>
                        @if(Auth::user()->user_level=='Administrator')
                        <th>Action</th>
                        @endif
                      </tr>
                    </thead>
                    <tbody>
           
                      @if(count($listings) > 0)
                        @foreach($listings as $list)
               @if(Auth::user()->user_level=='Administrator')
               
               
                        @php
                        $subscription = Braintree_Subscription::find($list->subid);
                        $status = $subscription->status;
                        $trial = $subscription->trialPeriod;
                        
                        $customer = Braintree_Customer::find($list->customerid);
                        $firstname = $customer->firstName;
                        $lastname = $customer->lastName;
                        @endphp
                        
                        
                      <tr>
                        <td>{{$list->businessname}}</td>
                        <td>{{$lastname}}</td>
                        <td>{{$firstname}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->primaryphone}}</td>
                       
                        
                        @if($trial == 0)
                        
                        @if($status == "Active")                        
              			<td><span class="label label-success">Active</span></td>
              			@elseif($status == "Canceled")
              			<td><span class="label label-danger">Cancelled</span></td>
              			@elseif($status == "Past Due")
              			<td><span class="label label-danger">Past Due</span></td>
              			@elseif($status == "Expired")
              			<td><span class="label label-danger">Expired</span></td>
              			@elseif($status == "Pending")
              			<td><span class="label label-warning">Pending</span></td>
              			@endif
              			@else
              			<td><span class="label label-success">Trial</span></td>
              			@endif
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->updated_at}}</td>
                        <td style='width:15%;'>
                            <div class="btn-group btn-space">
                                <button data-modal="form-view" class="btn btn-default mdi mdi-eye md-trigger" title="View"></button>
                                <button data-modal="form-success" class="btn btn-default mdi mdi-edit md-trigger" title="Update"></button>
                                <button class="btn btn-default mdi mdi-delete md-trigger" title="Delete"></button>
                            </div>
                        </td>
                      </tr>
                 @elseif(Auth::user()->user_level=='Supervisor')
                    @if(Auth::user()->center==$list->callcenter)
                        <tr>
                        <td>{{$list->businessname}}</td>
                        <td>lastname</td>
                        <td>firstname</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->primaryphone}}</td>
                        <td>{{$list->subscriptionstat}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->updated_at}}</td>
                      </tr>
                   @endif
                 @elseif(Auth::user()->user_level=='Agent')
                    @if(Auth::user()->id==$list->agent)
                        <tr>
                        <td>{{$list->businessname}}</td>
                        <td>{{$list->email}}</td>
                        <td>{{$list->primaryphone}}</td>
                        <td>{{$list->subscriptionstat}}</td>
                        <td>{{$list->created_at}}</td>
                        <td>{{$list->updated_at}}</td>
                      </tr>
                   @endif

                 @endif
                        @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>

    <!--Form Modals-->

   <div id="form-success" class="modal-container colored-header colored-header-primary modal-dialog full-width">
   
      <div class="modal-content">    
        <div class="modal-body form">      

          <div class="row wizard-row">
            <div class="col-md-12 fuelux">
            <div class="block-wizard panel panel-default">
                    <div class="panel-heading">Update Listing<button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="mdi mdi-close"></span></button></div>
            <div id="wizard1" class="wizard wizard-ux">
                  <ul class="steps">
                      <li data-step="1" class="active">1. Account<span class="chevron"></span></li>
                      <li data-step="2">2. Payments<span class="chevron"></span></li>
                      
                  </ul>
        
            <!-- Step 1-->  
          {!! Form::open(['action' => 'SubscriptionsController@store', 'method' => 'POST', 'data-parsley-namespace'=>'data-parsley-', 'data-parsley-validate'=>'','novalidate'=>'','class'=>'form-horizontal group-border-dashed', 'id' => 'checkout' ]) !!}
            <div class="step-content">
            @include('inc.messages')
          
              <div data-step="1" class="step-pane active">
          
                                             <!-- Business Name-->
                
                                                  <div class="form-group">
                                                    {{Form::label('businessname', 'Buisness Name *',['class'=>'col-sm-2 control-label'  ])}}
                                                    
                                                    <div class="col-sm-9">
                                                        {{Form::text('businessname', '',['class'=>'form-control', 'placeholder'=>'Sesame Street Inc.' , 'required'=>''])}}
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
                                                                                  
                                                                              </select>    
                                                              </div>               
                                                              <div class="col-sm-5">
                                                                              <select name="subcategory" class="select2" name="category" multiple="" required>
                                                                                                 
                                                                              </select>     
                                                              </div>
                                                                                                
                                                        </div>
          
                                                         
          
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
              
                            <!-- Name-->
                            <div class="col-sm-12">
                                {{Form::label('Billing', 'Billing Information *',['class'=>'control-label' ])}}
                                           
                               <!-- Name -->
                               <div class="form-group">                          
                                      <div class="col-sm-4">
                                          {{Form::text('firstname', '', ['class'=>'form-control', 'placeholder'=>'First Name', 'required'=>''])}}
                                      </div>   
          
                                      <div class="col-sm-4">
                                          {{Form::text('lastname', '', ['class'=>'form-control', 'placeholder'=>'Last Name', 'required'=>''])}}
                                      </div>
                                      <div class="col-sm-4">
                                          {{Form::text('billingemail', '', ['class'=>'form-control', 'placeholder'=>'example@domain.com', 'required'=>''])}}
                                      </div>
                                 
                               </div>
                            </div>
          
                          
                          <div class="col-sm-12">
                                                  
                                         
                                    <div class="form-group">
                                              <div class="col-sm-6">
                                                  {{Form::text('cardholdername', '', ['class'=>'form-control', 'placeholder'=>'Card Holder Name', 'required'=>''])}}       
                                              </div>
                                              <div class="col-sm-6">  
                                                  {{Form::text('billingphone', '',['class'=>'form-control', 'placeholder'=>'(999) 999-9999', 'data-mask'=>'phone' , 'required'=>''])}}                           
                                              </div>
                                   </div>
                        </div> 
                                 
                           <!-- Credit Card -->
                           
                           <div class="col-sm-12">
                              {{Form::label('creditcardnumber', 'Credit Card Number *',['class'=>'control-label'])}}
                           
                           </div>
                         
                          <div class="col-sm-12">
                              <div class="form-group">
          
                                  <!-- creditcard -->
                                        <div class="col-sm-4">
                                              {{Form::text('creditcardnumber', '', ['class'=>'form-control', 'placeholder'=>'1234 5678 9012 3456', 'id'=>'checkout_card_number', 'size'=>'19','maxlength'=>'19','data-stripe'=>'number', 'required'=>''  ])}}
                                        </div>
                                   <!-- month and year -->
                                        <div class="col-sm-4">
                                              {{Form::text('expdate', '', ['class'=>'form-control', 'placeholder'=>'MM/YYYY','maxlength'=>'7','id'=>'expiration-date', 'size'=>'7','maxlength'=>'7','data-stripe'=>'number', 'required'=>''  ])}}
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
                                    {{Form::label('Address', 'Address *',['class'=>'control-label' ])}}
                                   
                                    
                                       <div class="form-group">
                                              <div class="col-sm-4">
                                                  {{Form::text('street', '', ['class'=>'form-control', 'placeholder'=>'Billing Street', 'required'=>''])}}
                                               
                                              </div>
          
                                              <div class="col-sm-4">
                                                  {{Form::text('city', '', ['class'=>'form-control', 'placeholder'=>'City' , 'required'=>'' ])}}
                                                  
                                                </div>
          
                                                <div class="col-sm-2">
                                                    {{Form::text('state', '', ['class'=>'form-control', 'placeholder'=>'State', 'maxlength'=>'2' , 'required'=>''])}}
                                                    
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
          
          
            </div>
            </div>
            </div>
            </div>
                            
        
            </div>
        </div> 
  
</div>
    
    <div class="modal-overlay"></div>

<!-- View Modal -->
<div id="form-view" class="modal-container modal-dialog full-width" >
    
      <div class="modal-content">

        <div class="modal-body form">
   
                <div class="panel panel-default">
                  <div class="panel-heading">Subscription Information<button type="button" data-dismiss="modal" aria-hidden="true" class="close modal-close"><span class="mdi mdi-close"></span></button></div>
                  <div class="tab-container">
                    <ul class="nav nav-tabs">
                      <li class="active"><a href="#home5" data-toggle="tab"><span class="icon mdi mdi-face"></span>Account Details</a></li>
                      <li ><a href="#profile5" data-toggle="tab"><span class="icon mdi mdi-card"></span>Billing Information</a></li>
                      <li><a href="#messages5" data-toggle="tab"><span class="icon mdi mdi-case-check"></span>Payment History</a></li>
                    </ul>
                    <div class="tab-content">
                      <!-- Account Details Tab -->
                      <div id="home5" class="tab-pane active cont form-horizontal group-border-dashed">
                        <h4>Business Information</h4>
                            <!-- Business Name-->
                           
                                <div class="form-group">
                                  <div class="col-sm-12">
                                    {{Form::label('businessname', 'Buisness Name *',['class'=>'col-sm-2 control-label'  ])}}
                                    <div class="col-sm-10">
                                    {{Form::text('businessname', 'Buisness Name Detals',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                    </div>
                                 </div>
                               </div>

                        <!-- Primary Phone-->
                        
                            <div class="form-group">
                              <div class="col-sm-12">
                                {{Form::label('primaryphone', 'Primary Phone *',['class'=>'col-sm-2 control-label' ])}}
                                    <div class="col-sm-10">
                                        {{Form::text('primaryphone', 'Primary Phone ',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                    </div>
                              </div>                          
                           </div>

                        <!-- Primary Email-->
                        
                                  <div class="form-group">
                                    <div class="col-sm-12">
                                      {{Form::label('email', 'Primary Email *',['class'=>'col-sm-2 control-label' ])}}
                                      <div class="col-sm-10">
                                            {{Form::text('email', 'Email ',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                      </div>
                                    </div>
                                  </div>
                        
                          <!-- Category and Keyword-->
                       
                                    <div class="form-group"> 
                                     <div class="col-sm-12">
                                          {{Form::label('category', 'Categories *',['class'=>'col-sm-2 control-label' ])}} 
                                          <div class="col-sm-4">
                                                {{Form::text('category', 'Home Remodeling ',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                          </div>
                                          {{Form::label('category', 'Keyword ',['class'=>'col-sm-1 control-label' ])}}  
                                          <div class="col-sm-5">
                                                {{Form::text('keyword', 'Painting ',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                          </div>                                              
                                     </div>
                                    </div>
                                

                          <!--Business Hours-->
                        
                            <div class="form-group">
                             <div class="col-sm-12">
                                {{Form::label('hours', 'Business Hours *',['class'=>'col-sm-2 control-label' ])}}
                                <div class="col-sm-10">
                                        {{Form::text('hours', 'Business Hours ',['class'=>'form-control','readonly'=>'readonly'  ])}} 
                                  </div>  
                             </div>
                            </div>
                        
                     </div>
                      
                       <!-- Billing Information Tab -->
                      <div id="profile5" class="tab-pane cont form-horizontal group-border-dashed">
                            <!-- Name-->
                           
                                    {{Form::label('Billing', 'Billing Information *',['class'=>'control-label' ])}}
                                               
                                   <div class="form-group">                          
                                          <div class="col-sm-4">
                                              {{Form::text('firstname', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                          </div>   
              
                                          <div class="col-sm-4">
                                              {{Form::text('lastname', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                          </div>
                                          <div class="col-sm-4">
                                              {{Form::text('billingemail', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                          </div>
                                     
                                   </div>
                             <!-- Cardholder and Phone -->
                       
                                        <div class="form-group">
                                              
                                                  <div class="col-sm-6">
                                                      {{Form::text('cardholdername', '', ['class'=>'form-control','readonly'=>'readonly'])}}       
                                                  </div>
                                                  <div class="col-sm-6">  
                                                      {{Form::text('billingphone', '',['class'=>'form-control','readonly'=>'readonly'])}}                           
                                                  </div> 
                                       </div>
                                
                                     
                               <!-- Credit Card -->
                               
                              
                                  {{Form::label('creditcardnumber', 'Credit Card Number *',['class'=>'control-label'])}}
                    
                             
                                  <div class="form-group">
              
                                      <!-- creditcard -->
                                            <div class="col-sm-4">
                                                  {{Form::text('creditcardnumber', '', ['class'=>'form-control','readonly'=>'readonly' ])}}
                                            </div>
                                       <!-- month and year -->
                                            <div class="col-sm-4">
                                                  {{Form::text('expdate', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                            </div>
                                      <!-- cvv -->
                                            <div class="col-sm-2">
                                                {{Form::text('cvv', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                            </div>
                                    
                                  </div>
                             
                                    
                                     <!-- Billing Info-->
                                
                                        {{Form::label('Address', 'Address *',['class'=>'control-label' ])}}
                                       
                                           <div class="form-group">
                                                  <div class="col-sm-4">
                                                      {{Form::text('street', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                                   
                                                  </div>
              
                                                  <div class="col-sm-4">
                                                      {{Form::text('city', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                                      
                                                  </div>
              
                                                    <div class="col-sm-2">
                                                        {{Form::text('state', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                                        
                                                    </div>
                                                
                                                  <div class="col-sm-2">
                                                      {{Form::text('zip', '', ['class'=>'form-control','readonly'=>'readonly'])}}
                                                    
                                                  </div>
                                              
                                           </div>
                                 
                      </div>
                      <!-- Payment History Tab -->
                      <div id="messages5" class="tab-pane">
                        <div class="row">
                          <div class="col-sm-12">
                            <div class="panel panel-default panel-table">
                                
                              <div class="panel-body">
                                <table id="table2" class="table table-striped table-hover table-fw-widget">
                                  <thead>
                                    <tr>
                                      <th>Business Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Status</th>
                                      <th>Created</th>
                                      <th>Updated</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                         
                                    @if(count($listings) > 0)
                                      @foreach($listings as $list)
                             @if(Auth::user()->user_level=='Administrator')
                              
                                    <tr>
                                      <td>{{$list->businessname}}</td>
                                      <td>{{$list->email}}</td>
                                      <td>{{$list->primaryphone}}</td>
                                      <td>{{$list->subscriptiontype}}</td>
                                      <td>{{$list->created_at}}</td>
                                      <td>{{$list->updated_at}}</td>
                                    </tr>
                               @elseif(Auth::user()->user_level=='Supervisor')
                                  @if(Auth::user()->center==$list->callcenter)
                                      <tr>
                                      <td>{{$list->businessname}}</td>
                                      <td>{{$list->email}}</td>
                                      <td>{{$list->primaryphone}}</td>
                                      <td>{{$list->subscriptiontype}}</td>
                                      <td>{{$list->created_at}}</td>
                                      <td>{{$list->updated_at}}</td>
                                    </tr>
                                 @endif
                               @elseif(Auth::user()->user_level=='Agent')
                                  @if(Auth::user()->id==$list->agent)
                                      <tr>
                                      <td>{{$list->businessname}}</td>
                                      <td>{{$list->email}}</td>
                                      <td>{{$list->primaryphone}}</td>
                                      <td>{{$list->subscriptiontype}}</td>
                                      <td>{{$list->created_at}}</td>
                                      <td>{{$list->updated_at}}</td>
                                    </tr>
                                 @endif
              
                               @endif
                                      @endforeach
                                    @endif
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                 <!-- Payment History Tab End -->
                    </div>

                  </div>
                </div>
           
        </div>
       </div> 
    
</div>
<div class="modal-overlay"></div>
@endsection