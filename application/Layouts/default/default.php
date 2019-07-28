<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CorgiMVC</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo CORGI['http'] ?>public/assets/default/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo CORGI['http'] ?>public/assets/default/css/sticky-footer.css" rel="stylesheet">
  </head>

  <body>

    <?php
      require_once $viewBody;
    ?>

    <footer class="footer">
      <div class="container">
        <span class="text-muted">This is where your footer goes.</span>
      </div>
    </footer>
  </body>
</html>