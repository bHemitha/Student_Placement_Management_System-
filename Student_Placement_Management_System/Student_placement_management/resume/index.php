<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
?>

<?php require_once "../helpers/header.php" ?>

<title>SPM: Resume</title>

<?php require_once "../helpers/navbar.php" ?>

    <header class="header bg-bright" id="header">
        <div class="container">
            <div class="header-content text-center">
                <h6 class="text-uppercase text-blue-dark fs-14 fw-6 ls-1">online resume builder</h6>
                <h1 class="lg-title">Only 2% of resumes make it pas the first round. Be in the top 2%</h1>
                <p class="text-dark fs-18 ls-1">Use professional field-tested resume templates that follow that exact 'resume rules' employers look for. Easy to use and done within minutes - try now for free!</p>
                <a href="../resume/resume_form.php" class="b  btn-p text-uppercase">create my resume</a>
                <img src="../static/dublin-resume-templates.avif" alt="">
            </div>
        </div>
    </header>

    <div class="section-one">
        <div class="container">
            <div class="section-one-content">
                <div class="section-one-l">
                    <img src="../static/visual-0c7080adf17f1f207276f613447c924f667dab34b7ac415cd7ef653172defd0b.svg" alt="">
                </div>
                <div class="section-one-r">
                    <h2 class="lg-title">Use the best resume maker as your guide!</h2>
                    <p class="text">Getting that dream job can seem like an impossible task. We're here to change that. Give yourself a real advantage with the best online resume maker: created by experts, imporved by data, trusted by millions of professionals.</p>
                    <div class="but-group">
                        <a href="../resume/resume_form.php" class="b btn-p text-uppercase">create my resume</a>
                        <a href="#" class="b btn-s text-uppercase">watch video</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-two bg-bright">
        <div class="container">
            <div class="section-two-content">
                <div class="section-two-items">
                    <div class="section-two-item">
                        <div class="section-two-item-icon">
                            <img src = "../static/feature-1-edf4481d69166ac81917d1e40e6597c8d61aa970ad44367ce78049bf830fbda5.svg" alt = "">
                        </div>
                        <h5 class = "section-item-title">Make a resume that wins interviews!</h5>
                        <p class = "text">Use our resume maker with its advanced creation tools to tell professional story that engages recruiters, hiring managers and even CEOs.</p>
                    </div>
                    <div class="section-two-item">
                        <div class="section-two-item-icon">
                            <img src = "../static/feature-2-a7a471bd973c02a55d1b3f8aff578cd3c9a4c5ac4fc74423d94ecc04aef3492b.svg" alt = "">
                        </div>
                        <h5 class = "section-item-title">Resume writing made easy!</h5>
                        <p class = "text">Resume writing has never been this effortless. Pre-generated text, visual designs and more - all already integrated into the resume maker. Just fill in your details.</p>
                    </div>
                    <div class="section-two-item">
                        <div class="section-two-item-icon">
                            <img src = "../static/feature-3-4e87a82f83e260488c36f8105e26f439fdc3ee5009372bb5e12d9421f32eabdd.svg" alt = "">
                        </div>
                        <h5 class = "section-item-title">A recruiter-tested CV maker tool</h5>
                        <p class = "text">Our resume builder and its pre-generated content are tested by recruiters and IT experts. We help your CV become truly competitive in the hiring process.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php require_once "../helpers/footer.php"; ?>