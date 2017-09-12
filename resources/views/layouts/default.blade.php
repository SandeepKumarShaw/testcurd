<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD Application Example</title>
    
    {!! Html::style('css/bootstrap.min.css') !!}
    {!! HTML::style('css/bootstrap-theme.css') !!}
    @yield('style')  

    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/jquery-1.8.3.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}
    <script>
    
            var BASE_URL = "{{ URL::to('/') }}";
 
   </script> 
    @yield('script')
    <script>
      $(document).ready(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      });

     </script>    
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('index') }}">LaravelExample</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{ route('index') }}">Home</a></li>
      <li><a href="{{ route('manageItemAjax') }}">AJAX Curd</a></li>
      <li><a href="{{ route('intervention.getresizeimage') }}">ThubnailGenator</a></li>      
    </ul>
  </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
