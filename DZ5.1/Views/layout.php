<!DOCTYPE html>
<html lang="">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php include 'index.css'; ?>
    </style>
    <title>MVC HR Schema</title>
</head>
<body style="font-family:Verdana;color:#aaaaaa;">

<div class="header">
    <h1>HR Schema</h1>
</div>

<div class="menu">
    <a href="jobs" class="button-link">Poslovi</a>
    <a href="countries" class="button-link">Države</a>
    <a href="regions" class="button-link">Regije</a>
</div>

<div class="main">


<?php require_once('Routes.php')?>


</div>

</body>
</html>
