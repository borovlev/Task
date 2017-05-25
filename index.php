<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Форма</title>
    <link rel="stylesheet" href="style.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
            <a class="navbar-brand" href="index.php">HIWOOD</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Добавить нового студента</a></li>
                <li><a href="index.php?AllStudents.php">Список студентов</a></li>
                <li><a href="index.php?Schedule.php">Рассписание для преподователей</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <?php

    if(isset($_GET['AllStudents_php'])) {
        include 'AllStudents.php';
    } elseif (isset($_GET['Schedule_php'])) {
        include 'Schedule.php';
    } else {
        include 'Form.php';
    }

    ?>



</div>

</div>
</body>
</html>
