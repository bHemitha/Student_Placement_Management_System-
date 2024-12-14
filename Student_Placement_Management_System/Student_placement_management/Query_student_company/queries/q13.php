<!-- Search Students by University Name -->
<?php
include_once('../helper/connection.php'); 

$queryResult = '';

if (isset($_POST['searchByuni'])) {
    $uni = $_POST['uni'];

    // Use a prepared statement to prevent SQL injection
    $q = "SELECT s.f_name, s.m_name, s.l_name, s.s_email, e.institute_name
          FROM student s
          JOIN education e ON s.s_id = e.s_id
          WHERE e.institute_name LIKE ?";

    $uniParam = $uni . "%";

    $stmt = mysqli_prepare($mysqli, $q);
    mysqli_stmt_bind_param($stmt, 's', $uniParam);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $q = "SELECT * FROM student WHERE 1=2";
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

    <form action="q13.php" method="post">
        <fieldset>
            <legend>Search by University</legend>
            <label>University Name:</label>
            <input type="text" name="uni"><br><br>
            <input type="submit" name="searchByuni" value="Search"  >
        </fieldset>
    </form>

    <div style="text-align: center;">
        <p><?php echo $queryResult; ?></p>
    </div>

    <?php if (isset($_POST['searchByuni'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>Student Table</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>University</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $r['f_name']; ?></td>
                        <td><?php echo $r['m_name']; ?></td>
                        <td><?php echo $r['l_name']; ?></td>
                        <td><?php echo $r['s_email']; ?></td>
                        <td><?php echo $r['institute_name']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>