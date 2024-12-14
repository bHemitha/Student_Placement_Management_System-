<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
?>
<?php require_once "../helpers/header.php" ?>
<title>SPM: Resume_form</title>
<?php require_once "../helpers/navbar.php" ?>
</br>
</br>
<h1>Resume Builder</h1>
<section id="about-sc" class="">
    <div class="container">
        <div class="about-cnt">
            <form action="resume.php" method="post" class="cv-form" id="cv-form">
                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>about section</h3>
                    </div>
                    <div class="cv-form-row cv-form-row-about">
                        <div class="cols-3">
                            <div class="form-elem">
                                <label for="firstname" class="form-label">First Name</label>
                                <input name="firstname" type="text" class="form-control firstname" id=""
                                    onkeyup="generateCV()" placeholder="e.g. dummy" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="middlename" class="form-label">Middle Name</label>
                                <input name="middlename" type="text" class="form-control middlename" id=""
                                    onkeyup="generateCV()" placeholder="e.g. dummy" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input name="lastname" type="text" class="form-control lastname" id=""
                                    onkeyup="generateCV()" placeholder="e.g. dummy" required>
                                <span class="form-text"></span>
                            </div>
                        </div>

                        <div class="cols-2">
                            <div class="form-elem">
                                <label for="designation" class="form-label">Designation</label>
                                <input name="designation" type="text" class="form-control designation" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Sr.Accountants" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="address" class="form-label">Address</label>
                                <input name="address" type="text" class="form-control address" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Surat" required>
                                <span class="form-text"></span>
                            </div>
                        </div>

                        <div class="cols-3">
                            <div class="form-elem">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control email" id="" onkeyup="generateCV()"
                                    placeholder="e.g. dummy@gmail.com" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="phoneno" class="form-label">Phone No:</label>
                                <input name="phoneno" type="text" class="form-control phoneno" id=""
                                    onkeyup="generateCV()" placeholder="e.g. 1111111111" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="linkid" class="form-label">Linkedin ID</label>
                                <input name="linkid" type="text" class="form-control summary" id=""
                                    onkeyup="generateCV()" placeholder="e.g. any" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="summary" class="form-label">Summary</label>
                                <input name="summary" type="text" class="form-control summary" id=""
                                    onkeyup="generateCV()" placeholder="e.g. any" required>
                                <span class="form-text"></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>achievements</h3>
                    </div>
                    <div id="achievements">
                        <div class="achievement">
                            <div class="cv-form-row cv-form-row-achievement">
                                <div class="cols-2">
                                    <div class="form-elem">
                                        <label for="achieve_title[]" class="form-label">Title</label>
                                        <input name="achieve_title[]" type="text" class="form-control achieve_title"
                                            id="" onkeyup="generateCV()" placeholder="e.g. dummy@gmail.com" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="achieve_description[]" class="form-label">Description</label>
                                        <input name="achieve_description[]" type="text"
                                            class="form-control achieve_description" id="" onkeyup="generateCV()"
                                            placeholder="e.g. dummy@gmail.com" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addAchievement" value="Add" class="repeater-add-btn">+</button>
                </div>


                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>experience</h3>
                    </div>
                    <div id="experience">
                        <div class="exp">
                            <div class="cv-form-row cv-form-row-experience">
                                <div class="cols-3">
                                    <div class="form-elem">
                                        <label for="exp_title[]" class="form-label">Title</label>
                                        <input name="exp_title[]" type="text" class="form-control exp_title" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="exp_organization[]" class="form-label">Company /
                                            Organization</label>
                                        <input name="exp_organization[]" type="text"
                                            class="form-control exp_organization" id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="exp_location[]" class="form-label">Location</label>
                                        <input name="exp_location[]" type="text" class="form-control exp_location" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class="form-elem">
                                        <label for="exp_start_date[]" class="form-label">Start Date</label>
                                        <input name="exp_start_date[]" type="date" class="form-control exp_start_date"
                                            id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="exp_end_date[]" class="form-label">End Date</label>
                                        <input name="exp_end_date[]" type="date" class="form-control exp_end_date" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="exp_description[]" class="form-label">Description</label>
                                        <input name="exp_description[]" type="text" class="form-control exp_description"
                                            id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addExperience" value="Add" class="repeater-add-btn">+</button>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>education</h3>
                    </div>

                    <div id="educations">
                        <div class="education">
                            <div class="cv-form-row cv-form-row-experience">
                                <div class="cols-3">
                                    <div class="form-elem">
                                        <label for="edu_school[]" class="form-label">School</label>
                                        <input name="edu_school[]" type="text" class="form-control edu_school" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="edu_degree[]" class="form-label">Degree</label>
                                        <input name="edu_degree[]" type="text" class="form-control edu_degree" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="edu_city[]" class="form-label">City</label>
                                        <input name="edu_city[]" type="text" class="form-control edu_city" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>

                                <div class="cols-3">
                                    <div class="form-elem">
                                        <label for="edu_start_date[]" class="form-label">Start Date</label>
                                        <input name="edu_start_date[]" type="date" class="form-control edu_start_date"
                                            id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="edu_graduation_date[]" class="form-label">End Date</label>
                                        <input name="edu_graduation_date[]" type="date"
                                            class="form-control edu_graduation_date" id="" onkeyup="generateCV()"
                                            required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="edu_description[]" class="form-label">Description</label>
                                        <input name="edu_description[]" type="text" class="form-control edu_description"
                                            id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addEducation" value="Add" class="repeater-add-btn">+</button>
                </div>


                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>projects</h3>
                    </div>

                    <div id="projects">
                        <div class="project">
                            <div class="cv-form-row cv-form-row-experience">
                                <div class="cols-3">
                                    <div class="form-elem">
                                        <label for="proj_title[]" class="form-label">Project Name</label>
                                        <input name="proj_title[]" type="text" class="form-control proj_title" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="proj_link[]" class="form-label">Project link</label>
                                        <input name="proj_link[]" type="text" class="form-control proj_link" id=""
                                            onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                    <div class="form-elem">
                                        <label for="proj_description[]" class="form-label">Description</label>
                                        <input name="proj_description[]" type="text"
                                            class="form-control proj_description" id="" onkeyup="generateCV()" required>
                                        <span class="form-text"></span>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                    <button type="button" id="addProject" value="Add" class="repeater-add-btn">+</button>
                </div>


                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>skills</h3>
                    </div>

                    <div id="skills">
                        <div class="skill">
                            <div class="cv-form-row cv-form-row-skills">
                                <div class="form-elem">
                                    <label for="skill[]" class="form-label">Skill</label>
                                    <input name="skill[]" type="text" class="form-control skill" id=""
                                        onkeyup="generateCV()">
                                    <span class="form-text"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="addSkill" value="Add" class="repeater-add-btn">+</button>
                </div>
        </div>
        <button class="b btn-primary" type="submit">Make resume</button>
        </form>
    </div>
    </div>
</section>
<section id="preview-sc" class="print_area">
    <div class="container">
        <div class="preview-cnt">
            <div class="preview-cnt-l bg-green text-white">
                <div class="preview-blk">
                    <div class="preview-item preview-item-name">
                        <span class="preview-item-val fw-6 text-capitalize" id="fullname_dsp"></span>
                    </div>
                    <div class="preview-item">
                        <span class="preview-item-val text-uppercase fw-6 ls-1" id="designation_dsp"></span>
                    </div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>about</h3>
                    </div>
                    <div class="preview-blk-list">
                        <div class="preview-item">
                            <span class="preview-item-val" id="phoneno_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="email_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="address_dsp"></span>
                        </div>
                        <div class="preview-item">
                            <span class="preview-item-val" id="summary_dsp"></span>
                        </div>
                    </div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>skills</h3>
                    </div>
                    <div class="skills-items preview-blk-list" id="skills_dsp">
                        <!-- skills list here -->
                    </div>
                </div>
            </div>

            <div class="preview-cnt-r bg-white">
                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>Achievements</h3>
                    </div>
                    <div class="achievements-items preview-blk-list" id="achievements_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>educations</h3>
                    </div>
                    <div class="educations-items preview-blk-list" id="educations_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>experiences</h3>
                    </div>
                    <div class="experiences-items preview-blk-list" id="experiences_dsp"></div>
                </div>

                <div class="preview-blk">
                    <div class="preview-blk-title">
                        <h3>projects</h3>
                    </div>
                    <div class="projects-items preview-blk-list" id="projects_dsp"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="print-btn-sc">
    <div class="container">
        <button type="button" class="print-btn b btn-p" onclick="printCV()">Print CV</button>
    </div>
</section>



<script>
    // JavaScript to add more sections dynamically
    document.getElementById('addAchievement').addEventListener('click', function () {
        const achievements = document.getElementById('achievements');
        const achievement = document.querySelector('.achievement').cloneNode(true);
        achievements.appendChild(achievement);
    });

    document.getElementById('addProject').addEventListener('click', function () {
        const projects = document.getElementById('projects');
        const project = document.querySelector('.project').cloneNode(true);
        projects.appendChild(project);
    });

    document.getElementById('addExperience').addEventListener('click', function () {
        const experience = document.getElementById('experience');
        const exp = document.querySelector('.exp').cloneNode(true);
        experience.appendChild(exp);
    });

    document.getElementById('addSkill').addEventListener('click', function () {
        const skills = document.getElementById('skills');
        const skill = document.querySelector('.skill').cloneNode(true);
        skills.appendChild(skill);
    });
    document.getElementById('addEducation').addEventListener('click', function () {
        const education = document.getElementById('educations');
        const edu = document.querySelector('.education').cloneNode(true);
        education.appendChild(edu);
    });
</script>

<script src="/Student_placement_management/static/app.js"></script>

<?php require_once "../helpers/footer.php"; ?>