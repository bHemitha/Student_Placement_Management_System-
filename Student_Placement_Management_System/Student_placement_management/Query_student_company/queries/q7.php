<!-- Student Minimum Experience Search Query -->
<?php
include_once('../helper/connection.php');

$queryResult = '';

if (isset($_POST['searchByGrade'])) {
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $q = "SELECT * FROM 
        (
            SELECT S_ID, f_name, m_name, l_name AS NAME, 
            DATEDIFF(EXP_ED, EXP_SD) / 365 AS YEAR_OF_EXPERIENCE, exp_title FROM EXPERIENCE NATURAL JOIN STUDENT
        ) AS subquery
        WHERE YEAR_OF_EXPERIENCE >= ?";

        $stmt = mysqli_prepare($mysqli, $q);
        mysqli_stmt_bind_param($stmt, "i", $num);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

    } else {
        $result = false;
    }
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
    <title>Search Students by Experience Count</title>
</head>

<body>
    <form action="q7.php" method="post">
        <fieldset>
            <legend>Search Students by Experience Count</legend>
            <label>Minimum years of experience:</label>
            <input type="number" name="num"><br><br>
            <input type="submit" name="searchByGrade" value="Search">
        </fieldset>
    </form>

    <?php if (isset($_POST['searchByGrade']) && isset($result)): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>Student Name</th>
                    <th>Years of Experience</th>
                    <th>Experience Title</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo "{$r['f_name']} {$r['m_name']} {$r['NAME']}"; ?>
                        </td>
                        <td>
                            <?php echo number_format($r['YEAR_OF_EXPERIENCE'], 2); ?>
                        </td>
                        <td>
                            <?php echo $r['exp_title']; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found for the given criteria</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>