<!-- Calculates the chance of selection for a specific student
 based on their achievements, education, and experience. It considers various keywords in the descriptions of achievements, education, and experience to determine the likelihood of being shortlisted in resume shortlisting.<!DOCTYPE html> -->

 <?php
session_start();
include_once('../helper/connection.php');
$queryResult = '';
$chanceData = [];
$id = $_SESSION['user_id'];
if (isset($_POST['chance'])) {
    $q = "SELECT 
        S.S_ID,
        S.F_NAME,
        S.M_NAME,
        S.L_NAME AS name,
        (
            SELECT COUNT(*) 
            FROM achievement 
            WHERE ACH_DESC LIKE '%success%' 
                OR ACH_DESC LIKE '%award%' 
                OR ACH_DESC LIKE '%achievement%'
                OR ACH_DESC LIKE '%recognition%'
                OR ACH_DESC LIKE '%honor%'
                OR ACH_DESC LIKE '%accomplishment%'
                OR ACH_DESC LIKE '%milestone%'
                OR ACH_DESC LIKE '%accolade%'
                OR ACH_DESC LIKE '%victory%'
                OR ACH_DESC LIKE '%triumph%'
                OR ACH_DESC LIKE '%certificate%'
                OR ACH_DESC LIKE '%distinction%'
                OR ACH_DESC LIKE '%accolade%'
                OR ACH_DESC LIKE '%recognition%'
                OR ACH_DESC LIKE '%attainment%'
                OR ACH_DESC LIKE '%merit%'
                OR ACH_DESC LIKE '%credential%'
                OR ACH_DESC LIKE '%certification%'
                OR ACH_DESC LIKE '%qualification%'
        ) 
        + 
        (
            SELECT COUNT(*) 
            FROM education 
            WHERE INSTITUTE_NAME LIKE '%university%' 
                OR INSTITUTE_NAME LIKE '%college%' 
                OR INSTITUTE_NAME LIKE '%school%' 
                OR INSTITUTE_NAME LIKE '%institution%'  
                OR DEGREE LIKE '%degree%' 
                OR DEGREE LIKE '%diploma%' 
                OR DEGREE LIKE '%qualification%' 
                OR DEGREE LIKE '%certification%' 
                OR DEGREE LIKE '%major%'
                OR EDU_DESC LIKE '%study%'
        )
        + 
        (
            SELECT COUNT(*) 
            FROM experience 
            WHERE EXP_TITLE LIKE '%Position%' 
                OR EXP_TITLE LIKE '%Role%' 
                OR EXP_TITLE LIKE '%Employment%' 
                OR EXP_TITLE LIKE '%Company%' 
                OR EXP_TITLE LIKE '%Organization%' 
                OR EXP_TITLE LIKE '%Organization%' 
                OR EXP_DESC LIKE '%Responsibilities%' 
                OR EXP_DESC LIKE '%Duties%' 
                OR EXP_DESC LIKE '%Tasks%' 
                OR EXP_DESC LIKE '%Projects%' 
                OR EXP_DESC LIKE '%Achievements%' 
                OR EXP_DESC LIKE '%Experience%' 
                OR EXP_DESC LIKE '%Skills%' 
                OR EXP_DESC LIKE '%Qualifications%' 
                OR EXP_DESC LIKE '%Responsibilities%' 
                OR EXP_DESC LIKE '%Tasks%' 
                OR EXP_DESC LIKE '%Accomplishments%' 
                OR EXP_DESC LIKE '%Achieved%' 
                OR EXP_DESC LIKE '%Completed%' 
                OR EXP_DESC LIKE '%Managed%' 
                OR EXP_DESC LIKE '%Led%' 
                OR EXP_DESC LIKE '%Developed%' 
                OR EXP_DESC LIKE '%Implemented%' 
                OR EXP_DESC LIKE '%Contributed%' 
                OR EXP_DESC LIKE '%Worked%' 
                OR EXP_DESC LIKE '%Collaborated%' 
                OR EXP_DESC LIKE '%Team%' 
                OR EXP_DESC LIKE '%Project%' 
                OR EXP_DESC LIKE '%Initiative%' 
                OR EXP_DESC LIKE '%Impact%' 
                OR EXP_DESC LIKE '%Results%' 
                OR EXP_DESC LIKE '%Results-oriented%' 
                OR EXP_DESC LIKE '%Results-driven%' 
                OR EXP_DESC LIKE '%Results-focused%'
        ) *100/30 AS Chance_of_selection 
    FROM student S where s_id=? ";

    $stmt = mysqli_prepare($mysqli, $q);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
} else {
    $q = "SELECT * FROM student where 1=2";
    $result = mysqli_query($mysqli, $q);
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chance of Selection Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/table.css">
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <form action="q3.php" method="post">
        <fieldset>
            <legend>Chance to get shortlisted in resume shortlisting</legend>
            <input type="submit" name="chance" value="Search">
        </fieldset>
    </form>

    <?php if (isset($_POST['chance'])): ?>
        <?php if (mysqli_num_rows($result) > 0): ?>
            <table align="center" border="2" cellspacing="10" cellpadding="10">
                <tr>
                    <th>S_ID</th>
                    <th>F_NAME</th>
                    <th>M_NAME</th>
                    <th>name</th>
                    <th>Chance_of_selection</th>
                </tr>
                <?php while ($r = mysqli_fetch_array($result)): ?>
                    <tr>
                        <td>
                            <?php echo $r['S_ID']; ?>
                        </td>
                        <td>
                            <?php echo $r['F_NAME']; ?>
                        </td>
                        <td>
                            <?php echo $r['M_NAME']; ?>
                        </td>
                        <td>
                            <?php echo $r['name']; ?>
                        </td>
                        <td>
                            <?php echo $r['Chance_of_selection']; ?>
                        </td>
                        <!-- Assign the value to the JavaScript variable directly -->
                        <script>
                            var chanceData = <?php echo $r['Chance_of_selection']; ?>;
                        </script>
                    </tr>
                <?php endwhile; ?>
            </table>
        <?php else: ?>
            <h2>No Data found</h2>
        <?php endif; ?>
    <?php endif; ?>

    <canvas id="piechart" width="300" height="300"></canvas>

    <script>
        // Function to create and render the two-color pie chart
        function CreatePieChart(chanceData) {
            var chart = document.getElementById('piechart').getContext('2d');

            var colors = ['rgb(243, 168, 190)', 'black'];

            var chartData = {
                labels: ['Selected', 'Not Selected'],
                datasets: [{
                    data: [chanceData, 100 - chanceData],
                    backgroundColor: colors,
                }]
            };

            var options = {
                responsive: false,
                maintainAspectRatio: false,
                legend: {
                    display: true,
                    position: 'center',
                },
            };

            var pieChart = new Chart(chart, {
                type: 'pie',
                data: chartData,
                options: options
            });
        }


        CreatePieChart(chanceData);

    </script>

</body>

</html>