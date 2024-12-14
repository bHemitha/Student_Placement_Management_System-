<!-- Search Students by Company Name in Experience -->
<?php

include_once('../helper/connection.php'); 

$queryResult = '';

if (isset($_POST['searchByreq'])) {
    $cname = $_POST['cname'];

    $q = "SELECT distinct f_name,m_name,l_name ,s_email,exp_title,exp_comp from student s
natural join application 
natural join experience 
where exp_comp LIKE ?";

    $cnameParam = "%" . $cname . "%";

    $stmt = mysqli_prepare($mysqli, $q);
    mysqli_stmt_bind_param($stmt, 's', $cnameParam);
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
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>

<body>

    <form action="q11.php" method="post">
        <fieldset>
            <legend>Search by Job-Roll</legend>
            <label>Company Name</label>
            <input type="text" name="cname"><br><br>
            <input type="submit" name="searchByreq" value="Search">
        </fieldset>
    </form>

    <?php if (isset($_POST['searchByreq'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>Student Table</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>f_name</th>
                    <th>m_name</th>
                    <th>l_name</th>
                    <th>s_email</th>
                    <th>exp_title</th>
                    <th>exp_comp</th>

                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo $r[0]; ?>
                        </td>
                        <td>
                            <?php echo $r[1]; ?>
                        </td>
                        <td>
                            <?php echo $r[2]; ?>
                        </td>
                        <td>
                            <?php echo $r[3]; ?>
                        </td>
                        <td>
                            <?php echo $r[4]; ?>
                        </td>
                        <td>
                            <?php echo $r[5]; ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>