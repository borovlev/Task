
<?php

$dsn = 'mysql: host=localhost; dbname=hiwood';
$user = 'root';
$pass = '';
$pdo = new PDO($dsn, $user, $pass);


$sth = $pdo->query('SELECT schedule.Day, teachers.name, teachers.surname, faculty.name AS faculty FROM schedule 
JOIN teachers ON teachers.id = schedule.id_teachers 
JOIN faculty ON  faculty.id = schedule.id_faculty ');
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
<table class="table table-striped books-list-table">
    <thead>
    <tr>
        <th>Date</th>
        <th>name</th>
        <th>surname</th>
        <th>faculty</th>
    </tr>
    </thead>
    <tbody>
    <?php while ($res = $sth->fetch(PDO::FETCH_ASSOC)) : ?>
        <tr>
            <td><?=$res['Day'] ?></td>
            <td><?=$res['name'] ?></td>
            <td><?=$res['surname'] ?></td>
            <td><?=$res['faculty']  ?></td>
        </tr>
    <?php endwhile ?>
    </tbody>
</table>