<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login to Asset Admin</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

<div class="container">
  <div class="row align-items-center justify-content-center">
    <div class="col-md-7">
      <h3>Login to <strong>Asset Admin</strong></h3>
      
      @if(Session::has('errMesg'))
          <div class="alert alert-danger">{{Session::get('errMesg')}}</div>
      @endif
      @if(Session::has('success'))
          <div class="alert alert-danger">{{Session::get('success')}}</div>
      @endif
      <form action="{{route('postadmin')}}" method="post">
        @csrf()
        <div class="form-group first">
          <label for="username">Email</label>
          <input type="text" class="form-control" name="email" placeholder="your-email@gmail.com" id="username">
        </div>
        @if($errors->has('email'))
          <div class="alert alert-danger">{{$errors->first('email')}}</div>
      @endif
        <div class="form-group last mb-3">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Your Password" id="password">
        </div>
        @if($errors->has('password'))
          <div class="alert alert-danger">{{$errors->first('password')}}</div>
      @endif
        <div class="d-flex mb-5 align-items-center">
          <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
            <input type="checkbox" checked="checked"/>
            <div class="control__indicator"></div>
          </label>
         
        </div>

        <input type="submit" value="Log In" class="btn btn-block btn-primary">

      </form>
    </div>
  </div>
</div>
</div>
    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>