<?php

spl_autoload_register(function ($className) {
    $filePath = "{$className}.php";

    if (!file_exists($filePath)) {
        die("file {$filePath} not found");
    }
    require_once($filePath);
});


$dsn = 'mysql: host=localhost; dbname=hiwood';
$user = 'root';
$pass = '';
$pdo = new PDO($dsn, $user, $pass);


if ($_POST) {
    if (!isset($_POST['name']) || !isset($_POST['surname']) || !isset($_POST['faculty']) || !isset($_POST['gender'])) {
        StudentForm::$flashMessage  = "Заполните все поля" ;
    }
    else {

        $studentName = $_POST['name'];
        $studentSurname = $_POST['surname'];
        $facultyID = $_POST['faculty'];
        $gender = $_POST['gender'];

        $newStudent = new StudentForm($studentName, $studentSurname, $gender, $facultyID , $pdo);

    }

}


?>


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
            <a class="navbar-brand" href="#">HIWOOD</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Добавить нового студента</a></li>
                <li><a href="AllStudents.php">Список студентов</a></li>
                <li><a href="Schedule.php">Рассписание для преподователей</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="starter-template">
        <h4>Форма для добавления нового студента:</h4>
        <form method="post" action="index.php">
            <h5 id="warning"><?=StudentForm::$flashMessage?></h5>
            <p>Имя </p>
            <input type="text" name="name" required class="form-control">
            <p>Фамилия</p>
            <input type="text" name="surname" class="form-control" ><br>
            <div id="gender">
                <p>Факультет:</p>
                <input type="radio" name="faculty" value="1" required >Робототехника<Br>
                <input type="radio" name="faculty" value="2" required>Нано-хирургия<Br>
                <input type="radio" name="faculty" value="3" required>Инженерия<Br>
            </div>
            <div id="gender">
                <p>Пол :</p>
                <input type="radio" name="gender" value="male" >Парень<Br>
                <input type="radio" name="gender" value="female" >Девушка<Br>
            </div>
            <input type="submit" value="Добавить" class="btn btn-primary">

        </form>
    </div>

</div>
</body>
</html>
