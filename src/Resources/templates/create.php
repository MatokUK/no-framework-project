
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/app/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DNS Records</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $menuLink; ?>"><?php echo $menuLabel; ?></a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="starter-template">
        <h1>Create new record</h1>

        <?php foreach($flashMessage->getMessages('success') as $message): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endforeach; ?>

        <?php foreach($flashMessage->getMessages('error') as $message): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endforeach; ?>


        <form method="post" action="/create">
            <div class="form-group">
                <label for="type">Type</label>
                <select id="type" class="form-control" name="type">
                    <option value="a">A</option>
                    <option value="aaaa">AAAA</option>
                    <option value="mx">MX</option>
                    <option value="aname">ANAME</option>
                    <option value="cname">CNAME</option>
                    <option value="ns">NS</option>
                    <option value="txt">TXT</option>
                    <option value="srv">SRV</option>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Name" name="name">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content" name="content">
            </div>
            <div class="form-group">
                <label for="ttl">TTL</label>
                <input type="text" class="form-control" id="ttl" placeholder="TTL" name="ttl">
            </div>
            <div class="form-group">
                <label for="prio">Priority</label>
                <input type="text" class="form-control" id="prio" placeholder="Priority" name="prio">
            </div>
            <div class="form-group">
                <label for="port">Port</label>
                <input type="text" class="form-control" id="port" placeholder="Port" name="port">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="text" class="form-control" id="weight" placeholder="Weight" name="weight">
            </div>

            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>



</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/app/app.js"></script>
</body>
</html>


