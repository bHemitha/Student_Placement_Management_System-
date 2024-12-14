<!-- Search Students by Company Requirements -->
<?php

include_once('../helper/connection.php'); 

$queryResult = '';

if (isset($_POST['searchByreq'])) {
    $cname = $_POST['cname'];

    $q = "SELECT DISTINCT
    s.f_name,
    s.m_name,
    s.l_name,
    s.s_email,
    j.job_title,
    e.DEGREE,
    c.c_name
FROM
    student s
JOIN
    education e
ON
    s.s_id = e.s_id
JOIN
    job_opening j

JOIN
    company c 
ON
    j.c_id = c.c_id
WHERE
    (
        j.job_title = 'Data Scientist'
        AND e.DEGREE LIKE '%Computer Science%'
    )
    OR
    (
        j.job_title = 'Software Engineer'
        AND e.DEGREE LIKE '%Computer Science%'
        AND e.EDU_GRADE >= 3.0
    )
    OR
    (
        j.job_title = 'Marketing Manager'
        AND e.DEGREE LIKE '%Marketing%'
    )
    OR
    (
        j.job_title = 'UI/UX Designer'
        AND e.DEGREE LIKE '%Design%'
    )
    OR
    (
        j.job_title = 'Data Analyst'
        AND e.DEGREE LIKE '%Statistics%'
    )
    OR
    (
        j.job_title = 'Product Manager'
        AND e.DEGREE LIKE '%Business%'
    )
    OR
    (
        j.job_title = 'HR Specialist'
        AND e.DEGREE LIKE '%HR%'
    )
    OR
    (
        j.job_title = 'Financial Analyst'
        AND e.DEGREE LIKE '%Finance%'
    )
    OR
    (
        j.job_title = 'Software Developer'
        AND e.DEGREE LIKE '%Computer Science%'
    )
    OR
    (
        j.job_title = 'Data Engineer'
        AND e.DEGREE LIKE '%Data Engineering%'
    )
    AND c.c_name LIKE ?"; 

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

    <form action="q8.php" method="post">
        <fieldset>
            <legend>Search by Job-Roll</legend>
            <label>Job ROll</label>
            <input type="text" name="cname"><br><br>
            <input type="submit" name="searchByreq" value="Search"  >
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
                    <th>job_title</th>
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
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>