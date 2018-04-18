<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{URL::to('/')}}/assets/img/logo-symbol.png">


    <title>{{ config('app.name', 'Search My Locals') }}</title>

    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/lib/perfect-scrollbar/css/perfect-scrollbar.min.css"/>
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/><!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{URL::to('/')}}/assets/css/style.css" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="panel panel-default panel-border-color panel-border-color-primary">
              <div class="panel-heading"><img src="{{URL::to('/')}}/assets/img/logo-symbol.png" alt="logo" width="40" height="40" class="logo-img"><span class="splash-description">Please enter your user information.</span></div>
              @include('inc.messages')
              <div class="panel-body">
                <form action="{{url('auth/login')}}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input id="username" name="username" type="text" placeholder="Username" autocomplete="off" class="form-control">
                  </div>
                  <div class="form-group">
                    <input id="password" name="password" type="password" placeholder="Password" class="form-control">
                  </div>

                  <div class="form-group login-submit">
                    <button data-dismiss="modal" type="submit" class="btn btn-primary btn-xl">Sign me in</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
    <script src="{{URL::to('/')}}/assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/lib/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/js/main.js" type="text/javascript"></script>
    <script src="{{URL::to('/')}}/assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        //initialize the javascript
        App.init();
      });
      
    </script>

</html>