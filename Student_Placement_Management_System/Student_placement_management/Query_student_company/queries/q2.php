<!-- Top n Placement by Company -->

<?php
include_once('../helper/connection.php'); 

$queryResult = ''; 
if (isset($_POST['searchByGrade'])) {
    
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $q = "SELECT c_name FROM company
        NATURAL JOIN job_opening
        ORDER BY job_package DESC
        LIMIT ?";
        $stmt = mysqli_prepare($mysqli, $q);
        mysqli_stmt_bind_param($stmt, "i", $num);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    } else {
        $result = false;
    }
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
    <form action="q2.php" method="post">
        <fieldset>
            <legend>Top n placement given by which company </legend>
            <label>Number of records you want :</label>
            <input type="number" name="num"><br><br>
            <input type="submit" name="searchByGrade" value="Search"  >
        </fieldset>
    </form>

    <?php if (isset($_POST['searchByGrade']) && isset($result)): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>Company name</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $r[0]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Other Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>