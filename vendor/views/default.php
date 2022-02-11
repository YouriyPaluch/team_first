<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/vendor/img/favicon.png" type="image/x-icon">
    <title>Popular movies</title>
    <link rel="stylesheet" href="/vendor/css/bootstrap.css">
</head>
<body>
<header>
    <div class="container img-polaroid modal-header">
        <a href="/"><img src="/vendor/img/my_site.webp" alt="My_site" class="img-rounded img-circle span2"/></a>
    </div>
</header>
<nav></nav>
<content class="">
    <div class="container bar">
    <?php include_once 'vendor' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $this->_page . '.php' ?>
    </div>
</content>
<footer class="container img-polaroid modal-footer">
    <h4 class="text-center">&copy; test_yourii_korchevskii</h4>
</footer>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script src="/vendor/js/bootstrap.js"></script>
<script src="/vendor/js/main.js"></script>
</body>
</html>