<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>KaMeubel | Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
     <!-- Bootstrap core CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="/css/trix.css">
     <script type="text/javascript" src="/js/trix.js"></script>
    <!-- Custom styles for this template -->
    <link href="/css/dashboard.css" rel="stylesheet">
    <style>
      trix-toolbar [data-trix-button-group="file-tools"]{
        display: none;
      }
    </style>
  </head>
  <body>
    
    <?php echo $__env->make('dashboard.layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="container-fluid">
  <div class="row">
    
    <?php echo $__env->make('dashboard.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <?php echo $__env->yieldContent('container'); ?>
    </main>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>    <script src="/js/dashboard.js"></script>
  </body>
</html>
<?php /**PATH C:\Users\tuf\meubelku\resources\views/dashboard/layout/main.blade.php ENDPATH**/ ?>