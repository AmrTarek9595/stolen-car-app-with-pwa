<!DOCTYPE html>
<html lang="en">

    <head>
    @laravelPWA
      <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174493139-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-174493139-1');
</script>

    

      <!--
      <script>
        if (window.screen.width > 1000) {
   // resolution is below 10 x 7
   window.location = 'https://google.com'; //for example
 }
      </script>-->
     
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        @if(Request::url() == 'https://pwa.nrchrod.org/en')
          <title>Home</title>
          @elseif(Request::url() == 'https://pwa.nrchrod.org/en/apply')
            <title>Apply</title>
            @elseif(Request::url() == 'https://pwa.nrchrod.org/en/inquiry')
              <title>Inquiry</title>
              @elseif(Request::url() == 'https://pwa.nrchrod.org/en/inform')
              <title>Inform</title>
              @elseif(Request::url() == 'https://pwa.nrchrod.org/ar')
          <title>الرئيسيه</title>
          @elseif(Request::url() == 'https://pwa.nrchrod.org/ar/apply')
            <title>التقديم</title>
            @elseif(Request::url() == 'https://pwa.nrchrod.org/ar/inquiry')
              <title>الإستعلام</title>
              @elseif(Request::url() == 'https://pwa.nrchrod.org/ar/inform')
              <title>الإبلاغ</title>
              
        @endif
       

        <!-- Fonts -->
        <link href="https://pwa.nrchrod.org/public/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

        <!-- Styles -->
        <link rel="stylesheet" href="https://pwa.nrchrod.org/public/vendor/bootstrap/css/bootstrap.min.css?v=1.0">
        <link rel="stylesheet" href="https://pwa.nrchrod.org/public/css/agency.min.css?v=1.0">
        <link rel="stylesheet" href="https://pwa.nrchrod.org/public/vendor/fontawesome-free/css/all.min.css">
     <link href="https://unpkg.com/nprogress@0.2.0/nprogress.css" rel="stylesheet" />
<script src="https://unpkg.com/nprogress@0.2.0/nprogress.js"></script>
        <style>
          #page-top{
            background-color:#fff2f2;
            margin: 5px;
          }
        </style>
    </head>
    <body id="page-top">
    
      <div class="page">
      @if(str_contains(url()->current(), '/en'))
      <Layout></Layout>
      @elseif(str_contains(url()->current(), '/ar'))
      <Layoutar></Layoutar>
@endif
       
        
      </div>
      
        
  
        <script src="https://pwa.nrchrod.org/public/js/app.js?v=1.6"></script>
      
              <script src="https://pwa.nrchrod.org/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
              <script src="https://pwa.nrchrod.org/public/vendor/jquery-easing/jquery.easing.min.js"></script>
              <!-- Plugin JavaScript -->
              
            
              <!-- Contact form JavaScript -->
        
            
              <!-- Custom scripts for this template -->
              <script src="https://pwa.nrchrod.org/public/js/agency.min.js"></script>
                 
            
               
          
    </body>
</html>
