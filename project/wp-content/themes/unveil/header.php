<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Unveil Visual Showcase Theme</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CDN for icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
</head>
<!-- NAVBAR
================================================== -->
<body>
<section id="main navigation">
    <header class="masthead">
        <nav role="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Unveil</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse mynav" id="bs-example-navbar-collapse-1">
                    <form class="navbar-form navbar-right" role="search" action="/search" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control " placeholder="Search" id="sitesearch" name="query">
                            <button type="submit" class="btn form-btn glyphicon glyphicon-search"></button>
                        </div>
                    </form>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Contact <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="about.html">About</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    </ul>

                </div><!-- /.navbar-collapse -->

            </div><!-- /.container-fluid -->
        </nav>
</section><!-- /main navigation-->

<!-- Carousel
================================================== -->
<section id="main image carousel">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <!-- First carousel slide -->
            <div class="item active first-slide">
                <!-- <img class="first-slide" src="img/bento.jpg" alt="First slide"> -->
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Unveil Visual Showcase Theme</h1>
                        <p>This theme is for highly visual industries such as artists, photographers, restaurants. Unveil is built on Bootstrap3 to be fully responsive, mobile ready as well as optimized for search engines and social sharing so you can <em>Unveil</em> your work to the world! </p>
                        <p><a role="button" class="btn btn-lg" href="#" role="button">Sign up today</a></p>
                    </div>
                </div>
            </div>
            <!-- Second carousel slide -->
            <div class="item second-slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Put This Carousel To Work</h1>
                        <p>This hero image with a link and it's two sisters should be used to highlight your star work and display your major marketing materials in support of your business processes. If you're in to that sort of thing.</p>
                        <p><a role="button" class="btn btn-lg" href="#" role="button">Learn more</a></p>
                    </div>
                </div>
            </div>
            <!-- Third carousel slide -->
            <div class="item third-slide">
                <div class="container">
                    <div class="carousel-caption">
                        <h1>Make It Look Dope, Suckafish.</h1>
                        <p>The carousel is going to immediately grab users attention so make a good impression. Ideally you will have two versions of each picture; a 600x600px and a 1400x500px so it looks great in all viewports. </p>
                        <p><a role="button" class="btn btn-lg" href="#" role="button">Browse gallery</a></p>
                    </div>
                </div>
            </div><!-- End third slide -->
        </div>
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="fa fa-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="fa fa-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- /.carousel -->
</section><!-- /main image carousel -->
</header>