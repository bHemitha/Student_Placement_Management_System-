<!-- Search by Company Name / Search by Job Title -->

<?php
include_once('../helper/connection.php'); 

$queryResult = '';

if (isset($_POST['searchByname'])) {
    $name = $_POST['name'];
    $q = "SELECT distinct  c_name,c_email,c_phone,c_desc from application NATURAL join company where company.C_NAME like '$name%'";
    $result = mysqli_query($mysqli, $q);
}
elseif (isset($_POST['searchBytitle'])) {
    $title = $_POST['title'];
    $q = "SELECT DISTINCT student.f_name, student.m_name, student.l_name, student.s_email, job_opening.job_title 
          FROM application
          INNER JOIN student ON application.S_ID = student.S_ID
          INNER JOIN job_opening ON application.C_ID = job_opening.C_ID
          WHERE job_opening.vacancy > 0 
          AND job_opening.job_status LIKE 'OPEN' 
          AND job_opening.job_title LIKE '$title%'";
    $result = mysqli_query($mysqli, $q);
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>Document</title>
</head>

<body>
    <form action="q5.php" method="post">
        <fieldset>
            <legend>Search by Company Name</legend>
            <label>Name:</label>
            <input type="text" name="name"><br><br>
            <input type="submit" name="searchByname" value="Search"  >
        </fieldset>
    </form>

    <!-- Display the student table result -->
    <?php if (isset($_POST['searchByname']) || !isset($_POST['searchBytitle'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <h2>Company Table</h2>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>c_name</th>
                    <th>c_email</th>
                    <th>c_phone</th>
                    <th>c_desc</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td><?php echo $r[0]; ?></td>
                        <td><?php echo $r[1]; ?></td>
                        <td><?php echo $r[2]; ?></td>
                        <td><?php echo $r[3]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

    <form action="q5.php" method="post">
        <fieldset>
            <legend>Search by Job-Roll</legend>
            <label>Job-Roll:</label>
            <input type="text" name="title"><br><br>
            <input type="submit" name="searchBytitle" value="Search"  >
        </fieldset>
    </form>

    <div style="text-align: center;">
        <p><?php echo $queryResult; ?></p>
    </div>

    

    <!-- Display the other table result -->
    <?php if (isset($_POST['searchBytitle'])): ?>
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
                        <td><?php echo $r[0]; ?></td>
                        <td><?php echo $r[1]; ?></td>
                        <td><?php echo $r[2]; ?></td>
                        <td><?php echo $r[3]; ?></td>
                        <td><?php echo $r[4]; ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found in the Student Table</h2>
        <?php endif; ?>
    <?php endif; ?>

</body>

</html>