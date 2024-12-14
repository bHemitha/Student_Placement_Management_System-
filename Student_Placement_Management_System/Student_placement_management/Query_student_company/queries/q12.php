<!-- Search Students by Project Count -->
<?php
include_once('../helper/connection.php'); 

$queryResult = '';

if (isset($_POST['searchByGrade'])) {
    if (isset($_POST['num'])) {
        $num = $_POST['num'];
        $q = "SELECT f_name,m_name,l_name as name  ,s_id ,proj_name from student s
        natural join project p
        where p.s_id=s.s_id and (select count(*) from project p where s.s_id=p.s_id)
        >=?";
        
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
    <title>Document</title>
</head>

<body>
    <form action="q12.php" method="post">
        <fieldset>
            <legend>student project > limit</legend>
            <label>student project count you want </label>
            <input type="number" name="num"><br><br>
            <input type="submit" name="searchByGrade" value="Search"  >
        </fieldset>
    </form>

    <?php if (isset($_POST['searchByGrade']) && isset($result)): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>Student Name</th>
                    <th>Student ID</th>
                    <th>Project_title</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo "{$r['f_name']} {$r['m_name']} {$r['name']}"; ?></td>
                        <td><?php echo $r['s_id']; ?></td>
                        <td><?php echo $r['proj_name']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found for the given criteria</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>