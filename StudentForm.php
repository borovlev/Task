<?php

class StudentForm
{
    public static $flashMessage = "<br>";

    public $studentName;
    public $studentSurname;
    public $facultyID;
    public $gender;

    private $pdo;

    public function __construct($studentName, $studentSurname,$gender, $facultyID, $pdo)
    {
        $this->studentName = ucfirst(strtolower($studentName));
        $this->studentSurname = ucfirst(strtolower($studentSurname));
        $this->gender = $gender;
        $this->facultyID = $facultyID;
        $this->pdo = $pdo;
        self::isValid();

    }
    public function isValid () {

        $studentCount = $this->pdo->prepare('SELECT COUNT(*) FROM students WHERE faculty_id = :id');
        $studentCount->execute([
        'id' => $this->facultyID
    ]);
    $studentCount = $studentCount->fetch(PDO::FETCH_ASSOC);

        if ($studentCount['COUNT(*)'] == 21) {
            self::$flashMessage = "Факультет переполнен" ;

        } else {
            self::facultyCount();
        }

    }

// Метод проверки есть ли места на факультете
    public function facultyCount () {
        $studentsCount = $this->pdo->prepare('SELECT COUNT(*) FROM students WHERE faculty_id = :id AND gender = :gender');
        $studentsCount->execute([
            'id' => $this->facultyID,
            'gender' => $this->gender
        ]);
        $studentsCount = $studentsCount->fetch(PDO::FETCH_ASSOC);

        if ($this->facultyID == 1 && $this->gender == 'male' ) {
            if($studentsCount['COUNT(*)'] == 13) {
                self::$flashMessage = "На факультет \"Робототехника\" нельзя принять более 65% парней";
            } else {
                self::Save();
            }
        } elseif ($this->facultyID == 2 && $this->gender == 'female') {
            if($studentsCount['COUNT(*)'] == 13) {
                self::$flashMessage = "На факультет \"Нано-хирургия\" нельзя принять более 65% девушек";
            } else  {
                self::Save();
            }
        }  elseif ($this->facultyID == 3 && $this->gender == 'male') {
            if($studentsCount['COUNT(*)'] == 10) {
                self::$flashMessage = "На факультет \"Инженерия\" нельзя принять более 50% парней";
            } else  {
                self::Save();
            }
        }



    }

    public function Save () {


        $sth = $this->pdo->prepare('INSERT INTO students VALUES (null, :studentName, :studentSurname, :gender, :facultyID)');
        $sth-> execute([
            'studentName' => $this->studentName,
            'studentSurname' => $this->studentSurname,
            'gender' => $this->gender,
            'facultyID' => $this->facultyID
        ]);
            self::$flashMessage = "Студент добавлен";
//        header('Location: index.php');
    }
}