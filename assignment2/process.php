<?php
// process.php (Handles form submissions and session management)
require_once 'data.php'; // Include class definitions

session_start();
if (!isset($_SESSION['data'])) {
    $_SESSION['data'] = new Classroom();
}
$classroom = $_SESSION['data'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'add':
                if (isset($_POST['name'], $_POST['age'], $_POST['grade'], $_POST['gender'])) {
                    $name = htmlspecialchars($_POST['name']);
                    $age = htmlspecialchars($_POST['age']);
                    $grade = htmlspecialchars($_POST['grade']);
                    $gender = htmlspecialchars($_POST['gender']);

                    if (empty($name) || empty($age) || empty($grade) || empty($gender)) {
                        echo "<h2>Error: All fields are required.</h2>";
                    } else {
                        $classroom->addStudent($name, $age, $grade, $gender);
                        header("Location: index.php");
                        exit;
                    }
                } else {
                    echo "<h2>Error: Missing form data.</h2>";
                }
                break;
            case 'delete':
                if(isset($_POST['id'])){
                    $classroom->deleteStudent($_POST['id']);
                    header("Location: index.php");
                    exit;
                }
                break;
            case 'edit':
                if (isset($_POST['id'], $_POST['name'], $_POST['age'], $_POST['grade'], $_POST['gender'])) {
                    $name = htmlspecialchars($_POST['name']);
                    $age = htmlspecialchars($_POST['age']);
                    $grade = htmlspecialchars($_POST['grade']);
                    $gender = htmlspecialchars($_POST['gender']);
                    $classroom->editStudent($_POST['id'], $name, $age, $grade, $gender);
                    header("Location: index.php");
                    exit;
                }
                break;
        }
    }
}
?>