<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <link rel="shortcut icon" href="assets/img/logo-symbol.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Search My Locals') }}</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="assets/lib/datetimepicker/css/bootstrap-datetimepicker.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/select2/css/select2.min.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/bootstrap-slider/css/bootstrap-slider.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/datatables/css/dataTables.bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>

 <!-- business Hours-->
 <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.2.17/jquery.timepicker.min.css"/>
 <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
 <link rel="stylesheet" type="text/css" href="assets/lib/hourcss/jquery.businessHours.css"/>
 <link rel="stylesheet" type="text/css" href="assets/lib/hourcss/page.css"/>

 <!-- Credit Card -->
 <style type="text/css">
  #checkout_card_number {
    background-image: url(assets/img/cards.png);
    background-position: 3px 3px;
    background-size: 45px 260px; 
    background-repeat: no-repeat;
    padding-left: 48px;
  }
  </style>

</head>
  <body>
  <div class="be-wrapper be-color-header">
      <nav class="navbar navbar-default navbar-fixed-top be-top-header">
  
        <div class="container-fluid">
          <div class="be-right-navbar">
            <ul class="nav navbar-nav navbar-right be-user-nav">
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="assets/img/avatar.png" alt="Avatar"><span class="user-name">Túpac Amaru</span></a>
                <ul role="menu" class="dropdown-menu">
                  <li>
                    <div class="user-info">
                      <div class="user-name">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</div>
                    </div>
                  </li>
                  <li><a href="auth/logout"><span class="icon mdi mdi-power"></span> Logout</a></li>
                </ul>
              </li>
            </ul>
            <div class="page-title"><span>Dashboard</span></div>
          </div>
        </div>
      </nav>
      <div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a href="dashboard" class="left-sidebar-toggle">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                 @if(Auth::user()->user_level=='Administrator')
                  <li class="divider">Menu</li>
                 
                  <li class=""><a href="dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                  <li class=""><a href="listings"><i class="icon mdi mdi-accounts-alt"></i><span>Listings</span></a></li>
                  <li class=""><a href="subscriptions"><i class="icon mdi mdi-money-box"></i><span>Subscriptions</span></a></li>
                  <li class="divider">Security</li>

                  <li class="parent"><a href="#"><i class="icon mdi mdi-accounts"></i><span>Users</span></a>
                    <ul class="sub-menu">
                      <li><a href="users"><i class="icon mdi mdi-accounts-add"></i> Add Users</a>
                      </li>
                      <li><a href="tableview"><i class="icon mdi mdi-accounts-list-alt"></i> View Users</a>
                      </li>
                    </ul>
                  </li>

                  <li class="parent"><a href="#"><i class="icon mdi mdi-group"></i><span>Groups</span></a>
                    <ul class="sub-menu">
                      <li><a href="groups"><i class="icon mdi mdi-accounts-add"></i> Add Groups</a>
                      </li>
                      <li><a href="tableview"><i class="icon mdi mdi-accounts-list"></i> View Groups</a>
                      </li>
                    </ul>
                  </li>
                 
                  <li class="parent"><a href="#"><i class="icon mdi mdi-lock"></i><span>Permissions</span></a>
                    <ul class="sub-menu">
                      <li><a href="invoice"><i class="icon mdi mdi-lock-open"></i> Add Permissions</a>
                      </li>
                      <li><a href="tableview"><i class="icon mdi mdi-lock-open"></i> View Permissions</a>
                      </li>
                    </ul>
                  </li>
                 

                  @elseif(Auth::user()->user_level=='Supervisor')
                  <li class="divider">Menu</li>
                 
                  <li class=""><a href="dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                  <li class=""><a href="listings"><i class="icon mdi mdi-accounts-alt"></i><span>Listings</span></a></li>
                  <li class=""><a href="subscriptions"><i class="icon mdi mdi-money-box"></i><span>Subscriptions</span></a></li>
                  <li class="divider">Security</li>

                  <li class="parent"><a href="#"><i class="icon mdi mdi-accounts"></i><span>Users</span></a>
                    <ul class="sub-menu">
                      <li><a href="users"><i class="icon mdi mdi-accounts-add"></i> Add Users</a>
                      </li>
                      <li><a href="tableview"><i class="icon mdi mdi-accounts-list-alt"></i> View Users</a>
                      </li>
                    </ul>
                  </li>
                  @elseif(Auth::user()->user_level=='Agent')
                  <li class="divider">Menu</li>
                  <li class=""><a href="dashboard"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                  <li class=""><a href="listings"><i class="icon mdi mdi-accounts-alt"></i><span>Listings</span></a></li>
                  <li class=""><a href="subscriptions"><i class="icon mdi mdi-money-box"></i><span>Subscriptions</span></a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="be-content">
        <div class="main-content container-fluid">
                 
          @yield('content')
          
        </div>
      </div>
    </div>

    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="assets/js/app-form-elements.js" type="text/javascript"></script>

    <script src="assets/lib/jquery.niftymodals/dist/jquery.niftymodals.js" type="text/javascript"></script>
    <script src="assets/lib/fuelux/js/wizard.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="assets/js/app-form-wizard.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/dataTables.buttons.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/plugins/buttons/js/buttons.bootstrap.js" type="text/javascript"></script>
    <script src="assets/js/app-tables-datatables.js" type="text/javascript"></script>

    <!--Business Hours -->
  
    <script src="//cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js" type="text/javascript"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-json/2.4.0/jquery.json.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.2.17/jquery.timepicker.min.js"></script>
    <script type="text/javascript" src="assets/lib/hourcss/jquery.businessHours.min.js"></script>

   <!--Credit Card -->
   <script type="text/javascript" src="assets\js\jquery.creditCardValidator.js"></script>

   <!--Input Mask -->
   <script src="assets/lib/jquery.maskedinput/jquery.maskedinput.min.js" type="text/javascript"></script>
   <script src="assets/js/app-form-masks.js" type="text/javascript"></script>
   
   <!-- Dashboard-->
   <script src="assets/js/app-dashboard.js" type="text/javascript"></script>
   <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
   <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
   <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
   <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
   <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
   <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
   <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>

 <!--Input Validation -->
  <script src="assets/lib/parsley/parsley.min.js" type="text/javascript"></script>
 

   <script type="text/javascript">

      $(document).ready(function(){
        //initialize the javascript
        App.init();
        App.masks();
        App.dataTables();
        App.wizard();
        App.formElements();
        App.dashboard();
        
        $('form').parsley();

    
      });
      //creditcard
      var $cardinput = $('#checkout_card_number');
      $('#checkout_card_number').validateCreditCard(function(result)
      {		
        //console.log(result);
        if (result.card_type != null)
        {				
          switch (result.card_type.name)
          {
            case "visa":
              $cardinput.css('background-position', '3px -34px');
              $cardinput.addClass('card_visa');
              break;
    
            case "visa_electron":
              $cardinput.css('background-position', '3px -72px');
              $cardinput.addClass('card_visa_electron');
              break;
    
            case "mastercard":
              $cardinput.css('background-position', '3px -110px');
              $cardinput.addClass('card_mastercard');
              break;
    
            case "maestro":
              $cardinput.css('background-position', '3px -148px');
              $cardinput.addClass('card_maestro');
              break;
    
            case "discover":
              $cardinput.css('background-position', '3px -186px');
              $cardinput.addClass('card_discover');
              break;
    
            case "amex":
              $cardinput.css('background-position', '3px -223px');
              $cardinput.addClass('card_amex');
              break;
    
            default:
              $cardinput.css('background-position', '3px 3px');
              break;					
          }
        } else {
          $cardinput.css('background-position', '3px 3px');
        }
    
        if (result.length_valid || $cardinput.val().length > 16)
        {
          if (result.luhn_valid) {
            $cardinput.parent().removeClass('has-error').addClass('has-success');
          } else {
            $cardinput.parent().removeClass('has-success').addClass('has-error');
          }
        } else {
          $cardinput.parent().removeClass('has-success').removeClass('has-error');
        }
    });

   
            (function () {
            Rainbow.color();
            var businessHoursManager1 = $("#businessHoursContainer1").businessHours();
            $("#btnSerialize").click(function() {
                $("#businessHoursOutput1").val(JSON.stringify(businessHoursManager1.serialize()));
                

            });
            $.fn.niftyModal('setDefaults',{        overlaySelector: '.modal-overlay',        closeSelector: '.modal-close',        classAddAfterOpen: 'modal-show',      });
        })();
    </script>


  </body>
</html>