<?php

include_once('../helper/connection.php'); 

$queryResult = ''; // Initialize a variable to store the query result

if (isset($_POST['search'])) {
    $name = $_POST['name'];
    $grade = $_POST['grade'];
    $q = "SELECT * FROM student WHERE f_name like '$name%'";
    $queryResult = "Query: $q"; 
    $result = mysqli_query($mysqli, $q);

} else {
    $q = "SELECT * FROM student where 1=2";
    $result = mysqli_query($mysqli, $q);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>

<body>
    <form action="q1.php" method="post">
        <fieldset>
            <legend>Search by Name</legend>
            <label>Name:</label>
            <input type="text" name="name"><br><br>
            <label>Grade:</label>
            <input type="number" name="grade"><br><br>
            <input type="submit" name="search" value="Search">
        </fieldset>
    </form>
    
    <?php if (isset($_POST['search']) || !isset($_POST['searchByGrade'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>Student Table</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>s_id</th>
                    <th>f_name</th>
                    <th>m_name</th>
                    <th>l_name</th>
                    <th>linkedln_link</th>
                    <th>s_email</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $r[0]; ?></td>
                        <td><?php echo $r[1]; ?></td>
                        <td><?php echo $r[2]; ?></td>
                        <td><?php echo $r[3]; ?></td>
                        <td><?php echo $r[4]; ?></td>
                        <td><?php echo $r[5]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>