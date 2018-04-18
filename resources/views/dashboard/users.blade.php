@extends('layouts.app')

@section('content')
<div class="row wizard-row">
        <div class="col-md-12 fuelux">
        <div class="block-wizard panel panel-default">
                <div id="wizard1" class="wizard wizard-ux">

    <div class="step-content">
        <div data-step="1" class="step-pane active">
                            {!! Form::open(['action' => 'Register@store', 'method' => 'POST', 'data-parsley-namespace'=>'data-parsley-', 'data-parsley-validate'=>'','novalidate'=>'','class'=>'form-horizontal group-border-dashed' ]) !!}
               <!-- <div class="form-group no-padding"> Add User
                     </div>-->
                            

                        <div class="form-group">

                            <!-- Last Name-->
                                    <div class="col-sm-4">
                                        {{Form::text('lastname', '',['class'=>'form-control', 'placeholder'=>'Last Name', 'required'=>'' ])}}
                                    </div>
                                 
                            <!-- First Name -->
                                 
                                    <div class="col-sm-4">
                                      {{Form::text('firstname', '',['class'=>'form-control', 'placeholder'=>'First Name', 'required'=>''])}}
                                    </div>
                               
                            <!-- Middle Name -->
                                     
                                    <div class="col-sm-4">
                                            {{Form::text('middlename', '',['class'=>'form-control', 'placeholder'=>'Middle Name', 'required'=>''  ])}}
                                    </div>
                        </div>
                              
                                      
                        <div class="form-group">
                                    <!--email-->
                                    <div class="col-sm-4">
                                              {{Form::email('email', '', ['class'=>'form-control', 'placeholder'=>'Email Address', 'required'=>''])}} 
                                    </div>
                                    
                                    <!--Username-->
                                 
                                    <div class="col-sm-4">
                                            {{Form::text('username', '', ['class'=>'form-control', 'placeholder'=>'User Name', 'required'=>'' ])}}
                                    </div>
                                 
                                    <!--Password-->
                                   
                                    <div class="col-sm-4">
                                            <input id="password" name="password" type="password" placeholder="Password" class="form-control">   
                                    </div>
                        </div>

                        
                        <div class="form-group">  
                                     <!-- user_level -->
                                        <div class="col-sm-4">
                                             {{Form::select('user_level', ['Administrator' => 'Administrator', 'Supervisor' => 'Supervisor', 'Agent' => 'Agent'], null, ['placeholder' => 'User_Level', 'class'=>'select2', 'required'=>''])}}
                                        </div>
                                        <!-- user group -->
                                        <div class="col-sm-4">
                                            {{Form::select('user_group', ['3' => 'Administrator', '2' => 'Supervisor', '1' => 'Agent'], null, ['placeholder' => 'User_Group', 'class'=>'select2', 'required'=>''])}}
                                        </div>
                                        <!-- Center -->
                                        <div class="col-sm-4">
                                            {{Form::select('center', ['1' => 'SageOne', '2' => 'Center 1', '2' => 'Center 2'], null, ['placeholder' => 'Centers', 'class'=>'select2', 'required'=>''])}}
                                        </div>
                        </div>

                                  <!--Submit -->
                                  
                                  <div class="form-group">
                                    <div class="col-sm-4">
                                        {{Form::submit('Enroll', ['class'=>'btn btn-primary btn-space' ])}}
                                    </div>
                                  </div>

                {!! Form::close() !!}
        </div>
    </div>

</div>
</div>
</div>
</div>
@endsection