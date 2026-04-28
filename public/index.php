<?php require_once '../includes/db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
            <!-- Requirement: Logo click hides content sections -->
            <img src="../images/Marian.svg" id="logo" onclick="hideAllSections()"></img>
            <button class="navbarbuttons" onclick="showSection('create')"> Create </button>
            <button class="navbarbuttons" onclick="showSection('read')"> Read </button>
            <button class="navbarbuttons" onclick="showSection('update')"> Update </button>
            <button class="navbarbuttons" onclick="showSection('delete')"> Delete </button>
    </nav>

    <section id="home" class="homecontent"> 
        <h1 class="splash">Welcome to Student Management System</h1>
        <h2 class="splash">A Project in Integrative Programming Technologies</h2>
    </section>
    
    <!-- CREATE SECTION -->
    <section id="create" class="content" style="display:none;">
        <h1 class="contenttitle"> Insert New Student </h1>
        <form action="../includes/insert.php" method="POST">
            <label for="surname" class="label">Surname</label>
            <input type="text" name="surname" id="surname" class="field" required><br/>
            <label for="name" class="label">Name</label>
            <input type="text" name="name" id="name" class="field" required><br/>
            <label for="middlename" class="label">Middle name</label>
            <input type="text" name="middlename" id="middlename" class="field"><br/>
            <label for="address" class="label">Address</label>
            <input type="text" name="address" id="address" class="field"><br/>
            <label for="contact" class="label">Mobile Number</label>
            <input type="text" name="contact" id="contact" class="field"><br/>
            <div id="btncontainer">
                <button type="button" id="clrbtn" class="btns" onclick="clearFields()">Clear Fields</button><br/>
                <button type="submit" id="savebtn" class="btns">Save</button>
            </div>
        </form>   
    </section>

    <!-- READ SECTION -->
    <section id="read" class="content" style="display:none;">
        <h1 class="contenttitle">View Students</h1>
        <table border="1" style="width:100%; border-collapse: collapse; margin-top: 20px; font-family: sans-serif;">
            <tr style="background-color: #66b0f1; color: white;">
                <th>ID</th>
                <th>Surname</th>
                <th>Name</th>
                <th>Middle Name</th>
                <th>Address</th>
                <th>Contact</th>
            </tr>
            <?php
                $stmt = $pdo->query("SELECT * FROM students");
                while ($row = $stmt->fetch()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['surname']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['middlename']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['contact_number']}</td>
                          </tr>";
                }
            ?>
        </table>
    </section>

    <!-- UPDATE SECTION -->
    <section id="update" class="content" style="display:none;">
        <h1 class="contenttitle">Update Student Records</h1>
        <form action="../includes/update_logic.php" method="POST">
            <label class="label">Student ID</label>
            <input type="number" name="id" class="field" required placeholder="ID to update"><br/>
            
            <label class="label">New Surname</label>
            <input type="text" name="surname" class="field" required><br/>

            <label class="label">New Name</label>
            <input type="text" name="name" class="field" required><br/>

            <label class="label">New Middle Name</label>
            <input type="text" name="middlename" class="field"><br/>

            <label class="label">New Address</label>
            <input type="text" name="address" class="field"><br/>

            <label class="label">New Contact</label>
            <input type="text" name="contact" class="field"><br/>

            <div id="btncontainer">
                <button type="submit" class="btns">Update Record</button>
            </div>
        </form>
    </section>

    <!-- DELETE SECTION -->
    <section id="delete" class="content" style="display:none;">
        <h1 class="contenttitle">Remove Student Records</h1>
        <form action="../includes/delete_logic.php" method="POST">
            <label class="label">Student ID</label>
            <input type="number" name="id" class="field" required placeholder="ID to delete"><br/>
            <div id="btncontainer">
                <button type="submit" class="btns" style="background-color: #ff4d4d; color: white;">Delete Student</button>
            </div>
        </form>
    </section>

    <div id="success-toast" class="toast-hidden">Action Successful!</div>
    <script src="script.js"></script>
</body>
</html>