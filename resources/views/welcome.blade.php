<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css','resources/assets/css/flex-slider.css','resources/assets/css/fontawesome.css','resources/assets/css/owl.css','resources/assets/css/templatemo-stand-blog.css','resources/assets/css/bootstrap.min.css','resources/assets/css/custom.css'])


  </head>

  <body>

    <div id="app"></div>



  @vite(['resources/js/app.js','resources/assets/js/accordions.js','resources/assets/js/custom.js','resources/assets/js/isotope.js','resources/assets/js/owl.js','resources/assets/js/slick.js','resources/assets/js/myjs.js'])

  <script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
    if(! cleared[t.id]){                      // function makes it static and global
        cleared[t.id] = 1;  // you could use true and false, but that's more typing
        t.value='';         // with more chance of typos
        t.style.color='#fff';
        }
    }
  </script>

</body>
</html>
