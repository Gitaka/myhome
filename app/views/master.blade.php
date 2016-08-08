<!--<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title></title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{asset('css/main.css')}}">
   </head>
   <body>
     <div class="container">
        <div class="page_header">

           
        <h1>Welcome to nyumba Kumi</h1>
         

        </div>
     <div class="content">
      <section>
        @yield('search')
      </section>
      <aside style="float:right">
       <a href="login"><input type="button" value="SignIn"></a>
      </aside>
     </div>
     <div class="footer"></div>
     </div>
 
   </body>
  
</html>-->
<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Cats DB</title>
      <link rel="stylesheet" href="{{asset('bootstrap.min.css')}}">
   </head>
   <body>
     <div class="container">
        <div class="page_header">
           @yield('header')
           @yield('authen')      
        </div>
        @if(Session::has('message'))
         <div class="alert alert-success">
              {{Session::get('message')}}
         </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-warning">
       {{Session::get('error')}}
    </div>
    @endif
  
      @yield('content')
      @yield('search')
  
     </div>
 
   </body>
  
</html>