<?php
// data.php (Contains class definitions)
class Student {
    public $id;
    public $name;
    public $age;
    public $grade;
    public $gender;

    public function __construct($id, $name, $age, $grade, $gender) {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->grade = $grade;
        $this->gender = $gender;
    }
}

class Classroom {
    private $students = [];
    private $nextId = 1;

    public function addStudent($name, $age, $grade, $gender) {
        $student = new Student($this->nextId, $name, $age, $grade, $gender);
        $this->students[] = $student;
        $this->nextId++;
    }

    public function deleteStudent($id) {
        foreach ($this->students as $key => $student) {
            if ($student->id == $id) {
                unset($this->students[$key]);
                $this->students = array_values($this->students);
                return true;
            }
        }
        return false;
    }

    public function editStudent($id, $name, $age, $grade, $gender) {
        foreach ($this->students as $student) {
            if ($student->id == $id) {
                $student->name = $name;
                $student->age = $age;
                $student->grade = $grade;
                $student->gender = $gender;
                return true;
            }
        }
        return false;
    }

    public function getStudents() {
        return $this->students;
    }
}
?>