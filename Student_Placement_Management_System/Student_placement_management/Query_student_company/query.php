<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
?>
<?php require_once "../helpers/header.php"; ?>
<style>
    @import url("https://fonts.googleapis.com/css?family=Montserrat:400,700");

    * {
        box-sizing: border-box;
    }

    body {
        --h: 212deg;
        --l: 43%;
        --brandColor: hsl(var(--h), 71%, var(--l));
        font-family: Montserrat, sans-serif;
        margin: 0;
        background-color: whitesmoke;
    }

    p {
        margin: 0;
        line-height: 1.6;
    }

    ol {
        list-style: none;
        counter-reset: list;
        padding: 0 1rem;
    }

    .query-list-item {
        --stop: calc(100% / var(--length) * var(--i));
        --l: 62%;
        --l2: 88%;
        --h: calc((var(--i) - 1) * (180 / var(--length)));
        --c1: hsl(var(--h), 71%, var(--l));
        --c2: hsl(var(--h), 71%, var(--l2));

        position: relative;
        counter-increment: list;
        max-width: 45rem;
        margin: 2rem auto;
        padding: 2rem 1rem 1rem;
        box-shadow: 0.1rem 0.1rem 1.5rem rgba(0, 0, 0, 0.3);
        border-radius: 0.25rem;
        overflow: hidden;
        background-color: white;
    }

    .query-list-item::before {
        content: '';
        display: block;
        width: 100%;
        height: 1rem;
        position: absolute;
        top: 0;
        left: 0;
        background: linear-gradient(to right, var(--c1) var(--stop), var(--c2) var(--stop));
    }

    .query-list-item h3 {
        display: flex;
        align-items: baseline;
        margin: 0 0 1rem;
        color: rgb(70 70 70);
    }

    .query-list-item h3::before {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 0 0 auto;
        margin-right: 1rem;
        width: 3rem;
        height: 3rem;
        content: counter(list);
        padding: 1rem;
        border-radius: 50%;
        background-color: var(--c1);
        color: white;
    }


    h3 {
        display: flex;
        align-items: baseline;
        margin: 0 0 1rem;
        color: rgb(70 70 70);
    }

    h3::before {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 0 0 auto;
        margin-right: 1rem;
        width: 3rem;
        height: 3rem;
        content: counter(list);
        padding: 1rem;
        border-radius: 50%;
        background-color: var(--c1);
        color: white;
    }

    @media (min-width: 40em) {
        h3 {
            font-size: 25px;
            margin: 0 0 2rem;
            font-weight: 700;
        }

        h3::before {
            margin-right: 1.5rem;
        }
    }
</style>
<title>SPM : Query</title>
<?php require_once "../helpers/navbar.php"; ?>
<ol class="query-list" style="--length: 5" role="list">
    <li class="query-list-item" style="--i: 1">
        <a href="queries/q1.php">
            <h3>Search by Name</h3>
        </a>
        <p>Search for students by their first name.</p>
    </li>
    <li class="query-list-item" style="--i: 2">
        <a href="queries/q2.php">
            <h3>Top n Placement by Company</h3>
        </a>
        <p>Retrieves the names of companies offering the top 'n' job packages for job openings.</p>
    </li>
    <li class="query-list-item" style="--i: 3">
        <a href="queries/q3.php">
            <h3>Chance of Selection Calculation</h3>
        </a>
        <p>Calculates the chance of selection for a specific student based on their achievements, education, and
            experience. It considers various keywords in the descriptions of achievements, education, and experience
            to determine the likelihood of being shortlisted in resume shortlisting.</p>
    </li>
    <li class="query-list-item" style="--i: 4">
        <a href="queries/q4.php">
            <h3>Top Student Placement Query</h3>
        </a>
        <p>Retrieves the top students based on their job packages from the 'student' table for accepted job
            applications with a minimum job package value specified by the user.</p>
    </li>
    <li class="query-list-item" style="--i: 5">
        <a href="queries/q5.php">
            <h3>Search by Company Name / Search by Job Title</h3>
        </a>
        <p>Retrieves companies that match the provided name pattern from the 'company' table.</p>
        <p>Retrieves students with job titles that match the provided title pattern from the 'student' table.</p>
    </li>
    <li class="query-list-item" style="--i: 6">
        <a href="queries/q6.php">
            <h3>Colleges with Placement More Than 75%</h3>
        </a>
        <p>Retrieves the names of colleges where the placement percentage is more than 75% among students who have
            been accepted for job applications.</p>
    </li>
    <li class="query-list-item" style="--i: 7">
        <a href="queries/q7.php">
            <h3>Student Minimum Experience Search Query</h3>
        </a>
        <p>SQL query for filtering students by years of experience, utilizing a calculated field for experience
            duration.</p>
    </li>
    <li class="query-list-item" style="--i: 8">
        <a href="queries/q8.php">
            <h3>Search Students by Company Requirements</h3>
        </a>
        <p>Retrieves students who meet specific job requirements set by companies based on the job title and degree
            criteria. The search can be filtered by specifying a company name.</p>
    </li>
    <li class="query-list-item" style="--i: 9">
        <a href="queries/q9.php">
            <h3>Search Students by Grade</h3>
        </a>
        <p>Retrieves students who have a grade percentage greater than or equal to the specified minimum percentage.
            The students are ranked by their grade in descending order.</p>
    </li>
    <li class="query-list-item" style="--i: 10">
        <a href="queries/q10.php">
            <h3>Search Students by Experience Count</h3>
        </a>
        <p>Retrieves students who have a number of experiences greater than or equal to the specified limit. The
            query counts the number of experiences for each student and filters based on the count.</p>
    </li>
    <li class="query-list-item" style="--i: 11">
        <a href="queries/q11.php">
            <h3>Search Students by Company Name in Experience</h3>
        </a>
        <p>Retrieves students based on the company name in their experience records. The query performs a natural
            join with the application, experience, and company tables to filter students based on the specified
            company name in their experiences.</p>
    </li>
    <li class="query-list-item" style="--i: 12">
        <a href="queries/q12.php">
            <h3>Search Students by Project Count</h3>
        </a>
        <p>Retrieves students based on the number of projects they have participated in. The query performs a
            natural join with the project table to filter students based on the specified project count.</p>
    </li>
    <li class="query-list-item" style="--i: 13">
        <a href="queries/q13.php">
            <h3>Search Students by University Name</h3>
        </a>
        <p>Retrieves students based on the specified university name. The query uses a prepared statement to prevent
            SQL injection and fetches student details along with their respective universities.</p>
    </li>
    <li class="query-list-item" style="--i: 14">
        <a href="queries/q14.php">
            <h3>Update Application Status based on Resume Skills</h3>
        </a>
        <p>This query updates the application status to 'ACCEPTED' for students who possess specific technical,
            soft, industry-specific skills, job-specific keywords, personal attributes, and achievements in their
            resumes.</p>
    </li>
    <li class="query-list-item" style="--i: 15">
        <a href="queries/q15.php">
            <h3>Search for Students with Similar Projects</h3>
        </a>
        <p>This query retrieves students' information who have worked on projects containing a specific keyword
            entered by the user.</p>
    </li>
</ol>
<?php require_once "../helpers/footer.php"; ?>