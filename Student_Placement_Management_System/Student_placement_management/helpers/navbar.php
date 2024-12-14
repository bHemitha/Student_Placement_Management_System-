</head>

<body style="margin: 0; padding: 0; height: 100%; display: flex; flex-direction: column;">
    <div class="content">
        <nav>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="padding:15px 0px">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/Student_placement_management/home.php"
                        style="font-family: cursive;">STUDENT PLACEMENT
                        MANAGEMENT</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <?php
                        if (isset($_SESSION["user_id"])): ?>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <?php
                                if (isset($_SESSION["user_type"]) && ($_SESSION["user_type"] == 's' || $_SESSION["user_type"] == 'ss')):
                                    ?>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/Student_placement_management/resume/index.php">make
                                            resume</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="/Student_placement_management/resume/available_job.php">Available
                                            Job</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/Student_placement_management/resume/applied_job.php">Applied
                                            Job</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="/Student_placement_management/resume/view_resume.php">View
                                            Resume</a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link"
                                            href="/Student_placement_management/Query_student_company/queries/q3.php?S_ID=<?php echo $_SESSION['user_id']; ?>">Chance
                                            To Get Selected</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/Query_student_company/query.php">Query</a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/features_company/profile.php">Company
                                            Profile</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                    <a class="nav-link"
                                        href="/Student_placement_management/features_company/job_opening.php?company_id=
                                        ">
                                        Add
                                        Job Opening</a>
                                </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/features_company/job_vacancy.php">Job
                                            Vacancy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/features_company/recived_application.php">Recived
                                            Application</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/features_company/accepted_application.php">Accepted
                                            Application</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/features_company/rejected_application.php">Rejected
                                            Application</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/Query_student_company/queries/q14.php ?>">SortList
                                            Resume</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="/Student_placement_management/Query_student_company/query.php">Query</a>
                                    </li>

                                </ul>
                                <ul class="navbar-nav ms-auto">
                                <?php endif ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="/Student_placement_management/login/logout.php">Logout</a>
                                </li>
                            </ul>
                        <?php else: ?>
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item"><a class="nav-link"
                                        href="/Student_placement_management/login/register_company.php">Register as
                                        company</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="/Student_placement_management/login/login_company.php">Log In as
                                        company</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="/Student_placement_management/login/register_student.php">Register as
                                        student</a></li>
                                <li class="nav-item"><a class="nav-link"
                                        href="/Student_placement_management/login/login_student.php">Log In as
                                        student</a></li>
                            </ul>
                        <?php endif ?>
                    </div>
                </div>
            </nav>
    </div>
    </nav>
    <main class="container-fluid  text-center">