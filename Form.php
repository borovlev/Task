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
