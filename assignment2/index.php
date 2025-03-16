<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require_once 'process.php'; ?>

    <h2>Add Student</h2>
    <form method="post">
        <input type="hidden" name="action" value="add">
        <label for="name">Name: </label>
        <input type="text" name="name" required><br>
        <label for="age">Age: </label>
        <input type="number" name="age" required><br>
        <label for="grade">Grade: </label>
        <input type="text" name="grade" required><br>
        <label for="gender">Gender: </label>
        <select name="gender" required>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <button type="submit">Add</button>
    </form>

    <h2>Student List</h2>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Grade</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($classroom->getStudents() as $student): ?>
                <tr>
                    <td><?php echo $student->id; ?></td>
                    <td><?php echo $student->name; ?></td>
                    <td><?php echo $student->age; ?></td>
                    <td><?php echo $student->gender; ?></td>
                    <td><?php echo $student->grade; ?></td>
                   
                    <td>
                        <form method="post" style="display: inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?php echo $student->id; ?>">
                            <button type="submit" id="btn-delete">Delete</button>
                        </form>
                        <button onclick="editStudent(<?php echo $student->id; ?>, '<?php echo $student->name; ?>', <?php echo $student->age; ?>, '<?php echo $student->grade; ?>', '<?php echo $student->gender; ?>')" id="btn-edit">Edit</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div id="editForm" style="display: none;">
        <h2>Edit Student</h2>
        <form method="post">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="editId">
            <label for="name: ">Name: </label>
            <input type="text" name="name" id="editName" required><br>
            <label for="age">Age: </label>
            <input type="number" name="age" id="editAge" required><br>
            <label for="grade">Grade: </label>
            <input type="text" name="grade" id="editGrade" required><br>
            <label for="gender">Gender: </label>
            <select name="gender" id="editGender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>
            <button type="submit">Update</button><br>
            <button type="button" onclick="cancelEdit()" id="btn-cancel">Cancel</button>
        </form>
    </div>

    <script>
        function editStudent(id, name, age, grade, gender) {
            document.getElementById('editId').value = id;
            document.getElementById('editName').value = name;
            document.getElementById('editAge').value = age;
            document.getElementById('editGrade').value = grade;
            document.getElementById('editGender').value = gender;
            document.getElementById('editForm').style.display = 'block';
        }

        function cancelEdit() {
            document.getElementById('editForm').style.display = 'none';
        }
    </script>
</body>
</html>