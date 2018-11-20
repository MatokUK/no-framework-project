
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
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
        <h1>List of records</h1>

        <?php foreach($flashMessage->getMessages('success') as $message): ?>
            <div class="alert alert-success" role="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endforeach; ?>

        <?php foreach($flashMessage->getMessages('error') as $message): ?>
            <div class="alert alert-danger" role="alert"><?php echo htmlspecialchars($message); ?></div>
        <?php endforeach; ?>

        <table class="table table-hover">
            <thead>
                <th>Type</th>
                <th>Name</th>
                <th>Content</th>
                <th>TTL</th>
                <th>Priority</th>
                <th>Weight</th>
                <th>Port</th>
                <th></th>
            </thead>
        <?php foreach($records as $record): ?>
            <tr>
                <td><?php echo $record->getType(); ?></td>
                <td><?php echo $record->getName(); ?></td>
                <td><?php echo $record->getContent(); ?></td>
                <td><?php echo $record->getTtl(); ?></td>
                <td><?php echo $record->getPriority(); ?></td>
                <td><?php echo $record->getWeight(); ?></td>
                <td><?php echo $record->getPort(); ?></td>
                <td><a href="/delete?id=<?php echo $record->getId(); ?>"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Remove</a></td>
            </tr>
        <?php endforeach; ?>
        </table>
    </div>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Me & Social Networks</h3>
        </div>
        <div class="panel-body">
            <a href="https://www.codewars.com/users/MatokUK">
                <img src="https://www.codewars.com/users/MatokUK/badges/small" alt="CodeWars">
            </a>

            <br><br>
            <a href="https://github.com/MatokUK"><i class="fab fa-github"></i> https://github.com/MatokUK</a>

            <br><br>
            <a href="https://www.hackerrank.com/mat_kuna"><i class="fab fa-hackerrank"></i> https://www.hackerrank.com/mat_kuna</a>
        </div>
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


