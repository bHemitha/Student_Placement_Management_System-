<?php
require_once("../helpers/config.php");
require_once("../helpers/help.php");
require_login();
?>
<?php require_once "../helpers/header.php" ?>

<title>SPM: Resume_form</title>

<?php require_once "../helpers/navbar.php" ?>
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
                                <label for="" class="form-label">First Name</label>
                                <input name="firstname" type="text" class="form-control firstname" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Vasu" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="" class="form-label">Middle Name</label>
                                <input name="middlename" type="text" class="form-control middlename" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Piyushbhai" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="" class="form-label">Last Name</label>
                                <input name="lastname" type="text" class="form-control lastname" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Vekariya" required>
                                <span class="form-text"></span>
                            </div>
                        </div>

                        <div class="cols-2">
                            <div class="form-elem">
                                <label for="" class="form-label">Designation</label>
                                <input name="designation" type="text" class="form-control designation" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Sr.Accountants" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="" class="form-label">Address</label>
                                <input name="address" type="text" class="form-control address" id=""
                                    onkeyup="generateCV()" placeholder="e.g. Surat" required>
                                <span class="form-text"></span>
                            </div>
                        </div>

                        <div class="cols-3">
                            <div class="form-elem">
                                <label for="" class="form-label">Email</label>
                                <input name="email" type="text" class="form-control email" id="" onkeyup="generateCV()"
                                    placeholder="e.g. vasuvekariya@gmail.com" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="" class="form-label">Phone No:</label>
                                <input name="phoneno" type="text" class="form-control phoneno" id=""
                                    onkeyup="generateCV()" placeholder="e.g. 9904661409" required>
                                <span class="form-text"></span>
                            </div>
                            <div class="form-elem">
                                <label for="" class="form-label">Summary</label>
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

                    <div class="row-separator repeater">
                        <div class="repeater" data-repeater-list="group-a">
                            <div data-repeater-item>
                                <div class="cv-form-row cv-form-row-achievement">
                                    <div class="cols-2">
                                        <div class="form-elem">
                                            <label for="" class="form-label">Title</label>
                                            <input name="achieve_title[]" type="text" class="form-control achieve_title"
                                                id="" onkeyup="generateCV()" placeholder="e.g. vasuvekariya@gmail.com"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Description</label>
                                            <input name="achieve_description[]" type="text"
                                                class="form-control achieve_description" id="" onkeyup="generateCV()"
                                                placeholder="e.g. vasuvekariya@gmail.com" required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>
                                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>experience</h3>
                    </div>

                    <div class="row-separator repeater">
                        <div class="repeater" data-repeater-list="group-b">
                            <div data-repeater-item>
                                <div class="cv-form-row cv-form-row-experience">
                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">Title</label>
                                            <input name="exp_title" type="text" class="form-control exp_title" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Company / Organization</label>
                                            <input name="exp_organization" type="text"
                                                class="form-control exp_organization" id="" onkeyup="generateCV()"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Location</label>
                                            <input name="exp_location" type="text" class="form-control exp_location"
                                                id="" onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>

                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">Start Date</label>
                                            <input name="exp_start_date" type="date" class="form-control exp_start_date"
                                                id="" onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">End Date</label>
                                            <input name="exp_end_date" type="date" class="form-control exp_end_date"
                                                id="" onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Description</label>
                                            <input name="exp_description" type="text"
                                                class="form-control exp_description" id="" onkeyup="generateCV()"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>

                                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>education</h3>
                    </div>

                    <div class="row-separator repeater">
                        <div class="repeater" data-repeater-list="group-c">
                            <div data-repeater-item>
                                <div class="cv-form-row cv-form-row-experience">
                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">School</label>
                                            <input name="edu_school" type="text" class="form-control edu_school" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Degree</label>
                                            <input name="edu_degree" type="text" class="form-control edu_degree" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">City</label>
                                            <input name="edu_city" type="text" class="form-control edu_city" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>

                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">Start Date</label>
                                            <input name="edu_start_date" type="date" class="form-control edu_start_date"
                                                id="" onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">End Date</label>
                                            <input name="edu_graduation_date" type="date"
                                                class="form-control edu_graduation_date" id="" onkeyup="generateCV()"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Description</label>
                                            <input name="edu_description" type="text"
                                                class="form-control edu_description" id="" onkeyup="generateCV()"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>

                                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>projects</h3>
                    </div>

                    <div class="row-separator repeater">
                        <div class="repeater" data-repeater-list="group-d">
                            <div data-repeater-item>
                                <div class="cv-form-row cv-form-row-experience">
                                    <div class="cols-3">
                                        <div class="form-elem">
                                            <label for="" class="form-label">Project Name</label>
                                            <input name="proj_title" type="text" class="form-control proj_title" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Project link</label>
                                            <input name="proj_link" type="text" class="form-control proj_link" id=""
                                                onkeyup="generateCV()" required>
                                            <span class="form-text"></span>
                                        </div>
                                        <div class="form-elem">
                                            <label for="" class="form-label">Description</label>
                                            <input name="proj_description" type="text"
                                                class="form-control proj_description" id="" onkeyup="generateCV()"
                                                required>
                                            <span class="form-text"></span>
                                        </div>
                                    </div>
                                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="repeater-add-btn">+</button>
                    </div>
                </div>

                <div class="cv-form-blk">
                    <div class="cv-form-row-title">
                        <h3>skills</h3>
                    </div>

                    <div class="row-separator repeater">
                        <div class="repeater" data-repeater-list="group-e">
                            <div data-repeater-item>
                                <div class="cv-form-row cv-form-row-skills">
                                    <div class="form-elem">
                                        <label for="" class="form-label">Skill</label>
                                        <input name="skill" type="text" class="form-control skill" id=""
                                            onkeyup="generateCV()">
                                        <span class="form-text"></span>
                                    </div>

                                    <button data-repeater-delete type="button" class="repeater-remove-btn">-</button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create value="Add" class="repeater-add-btn">+</button>
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
<!-- app js -->
<script src="/Student_placement_management/static/app.js"></script>

<?php require_once "../helpers/footer.php"; ?>