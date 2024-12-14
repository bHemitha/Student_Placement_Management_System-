<!-- Top Student Placement Query -->

<?php
include_once('../helper/connection.php'); 

$result = '';

if (isset($_POST['topstudent'])) {
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $q = "SELECT f_name, m_name, l_name, job_package, j.job_title
              FROM student s 
              JOIN application a ON a.S_ID = s.S_ID 
              JOIN job_opening j ON j.C_ID = a.C_ID AND j.JOB_TITLE = a.JOB_TITLE 
              WHERE app_status = 'ACCEPTED'
              ORDER BY job_package DESC
              LIMIT ?";
        
        // Execute the query
        $stmt = mysqli_prepare($mysqli, $q);
        mysqli_stmt_bind_param($stmt, "i", $num);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    }
}
 else {
    $q = "SELECT * FROM student where 1=2";
    $result = mysqli_query($mysqli, $q);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>

</head>

<body>
    <form action="q4.php" method="post">
        <fieldset>
            <legend>Top pakage placement given by which company </legend>
            <label>Number of records you want :</label>
            <input type="number" name="num"><br><br>
            <input type="submit" name="topstudent" value="topstudent"  >
        </fieldset>
    </form>

    <?php if (isset($_POST['num']) && mysqli_num_rows($result) > 0): ?>
        <table align="center" border="2" cellspacing="10" cellpadding="10">
            <tr>
                <th>Name</th>
                <th>Job package</th>
                <th>Job Title</th>
            </tr>
            <?php while ($r = mysqli_fetch_array($result)): ?>
                <tr>
                    <td>
                        <?php echo $r['f_name'] . ' ' . $r['m_name'] . ' ' . $r['l_name']; ?>
                    </td>
                    <td>
                        <?php echo $r['job_package']; ?>
                    </td>
                    <td>
                        <?php echo $r['job_title']; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php elseif (isset($_POST['num'])): ?>
        <h2>No Data found</h2>
    <?php endif; ?>
</body>

</html>