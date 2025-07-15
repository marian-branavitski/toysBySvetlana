<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo $title; ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/img/logos/site-logo.png">

    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- My styles -->
    <link rel="stylesheet" href="/assets/css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img width="40px" src="/assets/img/logos/site-logo.png" alt="TS"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li <?php echo show_active_menu(0); ?>><a href="/">Home</a></li>
            <li <?php echo show_active_menu('news'); ?>><a href="/news/type/all/">News</a></li> 
            <li <?php echo show_active_menu('toys'); ?> class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Toys <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/toys/type/all">All</a></li>
                <li><a href="/toys/type/rabbits">Handmade rabbits</a></li>
                <li><a href="/toys/type/bears">Handmade bears</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="/toys/type/other">Other</a></li>
              </ul>
            </li>
          </ul>
          <form role="search" action="/search/" method="get" class="navbar-form navbar-left hidden-xs">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search" name="q_search">
            </div>
            <button type="submit" class="btn btn-success hidden-xs">Search</button>
          </form>
          <ul class="nav navbar-nav navbar-right">
            <li <?php echo show_active_menu('about'); ?>><a href="/about/page/">About</a></li>
            <li <?php echo show_active_menu('contacts'); ?>><a href="/contacts/">Contacts</a></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
<!-- menu starts -->
    <div class="wrapper">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-8 col-lg-push-3">
            <form role="search" action="/search/" method="get" class="visible-xs">
                <div class="form-group">
                  <div class="input-group">
                    <input type="search" class="form-control input-lg" placeholder="Search" name="q_search">
                    <div class="input-group-btn">
                      <button class="btn btn-default btn-lg" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
             </div>
            </form>

            <!-- header ends -->