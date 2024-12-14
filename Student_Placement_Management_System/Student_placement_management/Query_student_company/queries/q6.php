<!-- Colleges with Placement More Than 75% -->
<?php
include_once('../helper/connection.php'); 

$queryResult = ''; // Initialize a variable to store the query result

if (isset($_POST['search'])) {
    $q = "SELECT E.INSTITUTE_NAME AS COLLEGE_NAME
    FROM education E
    JOIN student S ON E.S_ID = S.S_ID
    JOIN application A ON S.S_ID = A.S_ID
    WHERE A.APP_STATUS = 'ACCEPTED'
    GROUP BY E.INSTITUTE_NAME
    HAVING COUNT(*) > (SELECT COUNT(*) * 0.75 FROM application WHERE APP_STATUS = 'ACCEPTED');
    ";
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
    <form action="q6.php" method="post">
        <fieldset>
            <legend>Search College Name where placement is more tan 75</legend>
            <input type="submit" name="search" value="Search"  >
        </fieldset>
    </form>
    
    <?php if (isset($_POST['search']) || !isset($_POST['searchByGrade'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>College Table</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>College Name</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $r[0]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>