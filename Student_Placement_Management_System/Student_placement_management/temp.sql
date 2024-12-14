-- 
-- Database: `sem3_pro_spm` 
-- 
 
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `achievement` 
-- 
 
CREATE TABLE `achievement` ( 
  `ACH_TITLE` varchar(50) NOT NULL, 
  `ACH_DESC` varchar(250) DEFAULT NULL, 
  `S_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `achievement` 
-- 
 
INSERT INTO `achievement` (`ACH_TITLE`, `ACH_DESC`, `S_ID`) VALUES 
('27-Dec-1995', '28-Mar-1979', 39), 
('Best Student Paper Award', 'Received the best student paper award at a conference.', 3), 
('Community Service Award', 'Recognized for extensive community service work.', 4), 
('Consectetur eaque r', 'Totam excepturi ab r', 59), 
('Corporis optio volu', 'Ratione ut id nulla', 39), 
('Dolore fugiat dolor', 'Autem eveniet volup', 59), 
('Dolores facilis repe', 'Laudantium consequa', 55), 
('Entrepreneurship Award', 'Recognized for outstanding entrepreneurship skills.', 9), 
('Et et ex rerum est l', 'Blanditiis officia v', 53), 
('Ex rerum occaecat ad', 'Debitis voluptas cum', 39), 
('Excepteur nemo sit n', 'Voluptatem sit sunt', 39), 
('First Place in Math Olympiad', 'Won first place in the national math Olympiad competition.', 1), 
('Fugiat facere dolore', 'Quas nesciunt odit ', 57), 
('Iste aliquid accusam', 'Deleniti voluptas au', 55), 
('Leadership Award', 'Received an award for exceptional leadership qualities.', 10), 
('Music Scholarship', 'Awarded a scholarship for excellence in music.', 7), 
 
('Non ipsum non sequi', 'Omnis voluptas id la', 62), 
('Nostrum officia dolo', 'Et vero atque qui qu', 59), 
('Outstanding Research Award', 'Received an award for outstanding research in physics.', 2), 
('Placeat voluptas te', 'Qui aut exercitation', 51), 
('Provident aliqua V', 'Ipsam nostrud hic ad', 39), 
('Published Research Paper', 'Published a research paper in a reputable journal.', 6), 
('Quaerat illo maiores', 'Et dolorem id proide', 52), 
('Qui id accusamus ali', 'Dolore excepturi aut', 54), 
('Sed non maiores sint', 'Minim dolorem aut al', 59), 
('Sports MVP', 'Named the Most Valuable Player in the soccer team.', 8), 
('sueccess victory', 'award honor merit', 55), 
('Top Performer in Coding Competition', 'Achieved the highest score in a coding competition.', 5), 
('Voluptas dicta enim ', 'Doloremque adipisci ', 62), ('Voluptate exercitati', 'Quam adipisicing qui', 52); 
 
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `application` 
-- 
 
CREATE TABLE `application` ( 
  `APP_ID` int(10) NOT NULL, 
  `JOB_TITLE` varchar(100) DEFAULT NULL, 
  `APP_STATUS` varchar(20) DEFAULT 'INREVIEW' CHECK (`APP_STATUS` in 
('INREVIEW','ACCEPTED','REJECTED')), 
  `C_ID` int(10) DEFAULT NULL, 
  `S_ID` int(10) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `application` 
-- 
 
INSERT INTO `application` (`APP_ID`, `JOB_TITLE`, `APP_STATUS`, `C_ID`, `S_ID`) VALUES 
(1, 'Product Manager', 'INREVIEW', 9, 39), 
(2, 'Senior Software Engineer', 'INREVIEW', 1, 39), 
(3, 'Frontend Developer', 'INREVIEW', 5, 39), 
(4, 'Environmental Scientist', 'ACCEPTED', 44, 55), 
(5, 'Research Scientist', 'INREVIEW', 2, 39), 
(6, 'Marketing Manager', 'INREVIEW', 3, 39), 
(7, 'Student Council Advisor', 'INREVIEW', 10, 39), 
(11, 'Social Worker', 'INREVIEW', 4, 39), 
(12, 'Soccer Coach', 'INREVIEW', 8, 39), 
(13, 'Piano Instructor', 'INREVIEW', 7, 39), 
(15, 'Senior Software Engineer', 'INREVIEW', 1, 52), 
(16, 'Product Manager', 'INREVIEW', 9, 52), 
(17, 'Frontend Developer', 'INREVIEW', 5, 52), 
(18, 'Environmental Scientist', 'INREVIEW', 44, 52), 
(19, 'Research Scientist', 'INREVIEW', 2, 52), 
(20, 'Marketing Manager', 'INREVIEW', 3, 52), 
(21, 'Student Council Advisor', 'INREVIEW', 10, 52), 
(22, 'Social Worker', 'INREVIEW', 4, 55), 
(23, 'Soccer Coach', 'INREVIEW', 8, 52), 
(24, 'Piano Instructor', 'INREVIEW', 7, 52), 
(25, 'Senior Software Engineer', 'INREVIEW', 1, 53), 
(26, 'Product Manager', 'INREVIEW', 9, 53), 
(27, 'Frontend Developer', 'INREVIEW', 5, 53), 
(28, 'Environmental Scientist', 'INREVIEW', 44, 53), 
(29, 'Research Scientist', 'INREVIEW', 2, 53), 
(30, 'Marketing Manager', 'INREVIEW', 3, 53), 
(31, 'Student Council Advisor', 'INREVIEW', 10, 53), 
(32, 'Social Worker', 'INREVIEW', 4, 53), 
(33, 'Soccer Coach', 'INREVIEW', 8, 53), 
(34, 'Piano Instructor', 'INREVIEW', 7, 53), 
(35, 'Senior Software Engineer', 'INREVIEW', 1, 54), 
(36, 'Product Manager', 'INREVIEW', 9, 54), 
(37, 'Frontend Developer', 'INREVIEW', 5, 54), 
(38, 'Environmental Scientist', 'ACCEPTED', 44, 54), 
(39, 'Senior Software Engineer', 'INREVIEW', 1, 51), 
(40, 'Product Manager', 'INREVIEW', 9, 51), 
(41, 'Frontend Developer', 'INREVIEW', 5, 51), 
(42, 'Environmental Scientist', 'REJECTED', 44, 51), 
(43, 'Research Scientist', 'INREVIEW', 2, 51), 
(44, 'Product Manager', 'INREVIEW', 9, 43), 
(45, 'Senior Software Engineer', 'INREVIEW', 1, 43), 
(46, 'Environmental Scientist', 'INREVIEW', 44, 43), (47, 'Frontend Developer', 'INREVIEW', 5, 43), 
(48, 'Student Council Advisor', 'INREVIEW', 10, 43), 
(49, 'Soccer Coach', 'INREVIEW', 8, 43), 
(50, 'Piano Instructor', 'INREVIEW', 7, 43), 
(51, 'Social Worker', 'INREVIEW', 4, 43), 
(52, 'Marketing Manager', 'INREVIEW', 3, 43), 
(53, 'Research Scientist', 'INREVIEW', 2, 43), 
(54, 'Senior Software Engineer', 'INREVIEW', 1, 55), (55, 'Product Manager', 'INREVIEW', 9, 55), 
(56, 'Environmental Scientist', 'ACCEPTED', 44, 55), 
(57, 'Marketing Manager', 'INREVIEW', 3, 55), 
(58, 'Frontend Developer', 'INREVIEW', 5, 55), 
(59, 'Student Council Advisor', 'INREVIEW', 10, 55), 
(60, 'Social Worker', 'INREVIEW', 4, 55), 
(61, 'Soccer Coach', 'INREVIEW', 8, 55), 
(62, 'Piano Instructor', 'INREVIEW', 7, 55), 
(63, 'Research Scientist', 'INREVIEW', 2, 55), 
(64, 'Data science', 'ACCEPTED', 58, 59), 
(65, 'Senior Software Engineer', 'INREVIEW', 1, 59), 
(66, 'Product Manager', 'INREVIEW', 9, 59), 
(67, 'Frontend Developer', 'INREVIEW', 5, 59), 
(68, 'Environmental Scientist', 'INREVIEW', 44, 59), 
(69, 'Research Scientist', 'INREVIEW', 2, 59), 
(70, 'Marketing Manager', 'INREVIEW', 3, 59), 
(71, 'Student Council Advisor', 'INREVIEW', 10, 59), 
(72, 'Social Worker', 'INREVIEW', 4, 59), 
(73, 'Soccer Coach', 'INREVIEW', 8, 59), 
(74, 'Piano Instructor', 'INREVIEW', 7, 59), 
(75, 'Environmental Scientist', 'INREVIEW', 44, 62);  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `company` 
-- 
 
CREATE TABLE `company` ( 
  `C_ID` int(10) NOT NULL, 
  `C_NAME` varchar(100) DEFAULT NULL, 
  `C_EMAIL` varchar(100) DEFAULT NULL, 
  `C_PHONE` varchar(15) DEFAULT NULL, 
  `C_MANAGER` varchar(100) DEFAULT NULL, 
  `C_DESC` varchar(500) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `company` 
-- 
 
INSERT INTO `company` (`C_ID`, `C_NAME`, `C_EMAIL`, `C_PHONE`, `C_MANAGER`, `C_DESC`) VALUES 
(1, 'TechCorp', 'info@techcorp.com', '123-456-7890', 'John Manager', 'Leading tech company specializing in software development.'), 
(2, 'ScienceLab', 'contact@sciencelab.com', '987-654-3210', 'Jane Scientist', 'Research organization focused on scientific discoveries.'), 
(3, 'InnoTech', 'hr@innotech.com', '555-555-5555', 'Michael CEO', 'Innovative technology company with a focus on product development.'), 
(4, 'VolunteerOrg', 'volunteer@volunteerorg.org', '111-111-1111', 'Emily 
Volunteer Coordinator', 'Non-profit organization dedicated to community service.'), 
(5, 'WebTech', 'contact@webtech.io', '999-999-9999', 'David CEO', 'Web development company specializing in frontend technologies.'), 
(6, 'EcoResearch', 'info@ecoresearch.org', '777-777-7777', 'Sarah Research Director', 'Environmental research institute working on sustainability.'), 
(7, 'MusicAcademy', 'info@musicacademy.com', '333-333-3333', 'Robert Director', 
'Music school offering lessons in various instruments.'), 
(8, 'SportsClub', 'info@sportsclub.org', '888-888-8888', 'Jennifer Club Manager', 
'Youth sports club promoting physical fitness and teamwork.'), 
(9, 'TechStart', 'info@techstartup.com', '666-666-6666', 'Daniel Founder', 'Tech startup focused on innovative software solutions.'), 
(10, 'UniversityName', 'info@universityname.edu', '444-444-4444', 'Lisa Dean', 
'Educational institution providing various degree programs.'), 
(43, '1111', 'motipolew@mailinator.com', '11111111', 'Sit sed officia ali', 
'Excepteur beatae vit'), 
(44, 'Bianca Sanders', 'sopimus@mailinator.com', '1222222222', 'Aut incididunt illum', 'Esse voluptatem Su'), 
(50, '', 'gapapimanu@mailinator.com', '4511111111', 'Quis quis nihil unde', 'Do illum nihil ipsa'), 
(56, 'comp', 'comp@gmail.com', '9510881310', 'comp', 'comp'), 
(58, 'company', 'company@gmail.com', '9510881310', 'company', 'company'), 
(60, 'tata', 'company1@gmail.com', '9510881310', 'tata', 'tata');  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `education` 
-- 
 
CREATE TABLE `education` ( 
  `INSTITUTE_NAME` varchar(100) DEFAULT NULL, 
  `DEGREE` varchar(100) NOT NULL, 
  `EDU_DESC` varchar(500) DEFAULT NULL, 
  `EDU_GRADE` decimal(20,2) DEFAULT NULL, 
  `EDU_TOTAL_GRADE` decimal(20,2) DEFAULT NULL, 
  `EDU_SD` date DEFAULT NULL, 
  `EDU_ED` date DEFAULT NULL, 
  `S_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `education` 
-- 
 
INSERT INTO `education` (`INSTITUTE_NAME`, `DEGREE`, `EDU_DESC`, `EDU_GRADE`, 
`EDU_TOTAL_GRADE`, `EDU_SD`, `EDU_ED`, `S_ID`) VALUES 
('Voluptatem nulla rei', 'Aliqua Dolores even', 'Consequatur itaque p', '4.00', 
'5.00', '1972-10-31', '2009-06-20', 55), 
('Community College X', 'Associate Degree in Social Work', 'Completed coursework with distinction.', '3.90', '4.00', '2019-01-15', '2021-12-20', 4), 
('University F', 'Bachelor\'s of Arts in Sports Management', 'Focused on sports analytics.', '3.85', '4.00', '2018-08-15', '2022-05-15', 8), 
('University C', 'Bachelor\'s of Business Administration', 'Concentration in 
Marketing.', '3.75', '4.00', '2017-09-01', '2021-05-30', 3), 
('University D', 'Bachelor\'s of Science in Computer Engineering', 'Graduated with top honors.', '3.98', '4.00', '2018-08-20', '2022-05-30', 5), 
('University A', 'Bachelor\'s of Science in Computer Science', 'Graduated with honors.', '3.85', '4.00', '2018-09-01', '2022-05-15', 1), 
('Startup University', 'Certificate in Entrepreneurship', 'Completed the entrepreneurship program.', '3.90', '4.00', '2019-03-01', '2020-12-31', 9), ('Music Institute Y', 'Certificate in Piano Performance', 'Achieved advanced proficiency in piano.', '4.00', '4.00', '2017-06-01', '2019-05-31', 7), 
('University E', 'Doctor of Philosophy in Environmental Science', 'Dissertation on climate change impact.', '4.00', '4.00', '2015-09-01', '2020-12-15', 6), 
('Quam enim tempor vit', 'Dolores irure est qu', 'Perspiciatis volupt', '4.00', 
'5.00', '1983-09-20', '2009-08-27', 53), 
('High School Z', 'High School Diploma', 'Class valedictorian.', '4.00', '4.00', '2014-09-01', '2018-05-30', 10), 
('Non quibusdam offici', 'Ipsum enim consequat', 'Minus libero qui ver', '4.00', 
'5.00', '1978-12-05', '2001-06-25', 52), 
('Maxime voluptatem ma', 'Maiores tempore mag', 'Aut laboris omnis el', '4.00', 
'5.00', '1977-07-13', '1997-02-12', 57), 
('University B', 'Master of Science in Physics', 'Thesis on quantum mechanics.', 
'3.95', '4.00', '2016-08-15', '2018-06-30', 2), 
('Eveniet error dicta', 'Molestiae et anim co', 'Officia optio nostr', '4.00', 
'5.00', '2009-11-02', '2015-02-01', 62), 
('Sint officiis repell', 'Nobis est irure fug', 'Lorem eu reprehender', '4.00', 
'5.00', '2018-06-01', '2014-06-16', 51), 
('Minim voluptatum mod', 'Praesentium ut magna', 'Assumenda at volupta', '4.00', 
'5.00', '2014-12-12', '2005-06-30', 54), 
('In aut labore ipsum', 'Saepe qui quod eius ', 'Voluptatem et et qua', '4.00', 
'5.00', '2008-05-24', '1982-08-20', 59);  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `experience` 
-- 
 
CREATE TABLE `experience` ( 
  `EXP_TITLE` varchar(50) NOT NULL, 
  `EXP_DESC` varchar(250) DEFAULT NULL, 
  `EXP_COMP` varchar(50) DEFAULT NULL, 
  `EXP_LOC` varchar(100) DEFAULT NULL, 
  `EXP_SD` date DEFAULT NULL, 
  `EXP_ED` date DEFAULT NULL, 
  `S_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `experience` 
-- 
 
INSERT INTO `experience` (`EXP_TITLE`, `EXP_DESC`, `EXP_COMP`, `EXP_LOC`, 
`EXP_SD`, `EXP_ED`, `S_ID`) VALUES 
('26-Sep-2019', '15-Sep-1970', 'Craig Riddle Inc', '24-Apr-2021', '2022-01-30', 
'1990-10-28', 39), 
('Community Volunteer', 'Volunteered at local shelters and organized charity events.', 'VolunteerOrg', 'Los Angeles', '2021-02-20', '2022-02-20', 4), 
('Dolores iusto dolore', 'Aspernatur quo harum', 'Wooten and Schultz Trading', 
'Repellendus Nihil q', '2016-10-18', '1975-03-21', 59), 
('Frontend Developer', 'Developed responsive user interfaces for web applications.', 'WebTech', 'Chicago', '2022-04-01', '2022-10-31', 5), 
('Incididunt tempore ', 'Repudiandae fugiat c', 'Koch and Rodriquez Trading', 
'Totam lorem in earum', '2015-08-28', '2002-11-17', 57), 
('Ipsam voluptatem au', 'Eum similique nesciu', 'Wynn and Moran Traders', 'Ipsam impedit et qu', '1987-09-29', '1977-08-25', 52), 
('Music Teacher', 'Taught piano and music theory to students of all ages.', 
'MusicAcademy', 'Houston', '2021-06-01', '2022-05-31', 7), 
('Nulla officia in sit', 'Aperiam tempore cup', 'Haynes Ball Traders', 'Iure quibusdam neces', '2021-06-01', '1974-07-24', 53), 
('Omnis est eligendi a', 'Sed eu provident qu', 'Becker West Plc', 'Voluptatem ullamco ', '1981-03-22', '2014-01-21', 55), 
('Product Manager', 'Managed the development of a new product line.', 'InnoTech', 
'San Francisco', '2022-03-10', '2022-09-30', 3), 
('Qui ut dolore sed si', 'Ex voluptate dicta h', 'Barber and Ortega Associates', 
'Ut doloremque dolore', '1999-08-05', '1981-01-23', 62), 
('Research Assistant', 'Assisted in conducting experiments and data analysis.', 
'ScienceLab', 'Boston', '2021-05-01', '2021-12-31', 2), 
('Researcher', 'Conducted research on environmental sustainability.', 
'EcoResearch', 'Seattle', '2021-08-01', '2022-01-15', 6), 
('Soccer Coach', 'Coached a youth soccer team and led them to victory in regional championships.', 'SportsClub', 'Denver', '2022-02-01', '2022-11-30', 8), ('Software Developer Intern', 'Worked as a software developer intern on web applications.', 'TechCorp', 'New York', '2022-01-15', '2022-06-15', 1), 
('Startup Founder', 'Founded and managed a successful tech startup.', 
'TechStart', 'Austin', '2021-03-15', '2022-12-31', 9), 
('Student Council President', 'Served as the president of the student council.', 
'UniversityName', 'Phoenix', '2021-09-01', '2022-05-30', 10), 
('Totam qui lorem sed ', 'Lorem sit nostrum si', 'Peck and Ramsey Plc', 'Do magna anim nostru', '1973-03-14', '1970-03-06', 54), 
('Voluptas tenetur sol', 'Facilis libero amet', 'Hutchinson Dale Associates', 
'Beatae nostrud optio', '1971-04-08', '2004-07-11', 51);  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `job_opening` 
-- 
 
CREATE TABLE `job_opening` ( 
  `JOB_TITLE` varchar(100) NOT NULL, 
  `JOB_QUALI` varchar(100) DEFAULT NULL, 
  `VACANCY` int(100) DEFAULT NULL, 
  `APP_DEADLINE` date DEFAULT NULL, 
  `JOB_LOCATION` varchar(100) DEFAULT NULL, 
  `JOB_STATUS` varchar(20) DEFAULT 'OPEN', 
  `JOB_PACKAGE` decimal(20,2) DEFAULT NULL, 
  `C_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `job_opening` 
-- 
 
INSERT INTO `job_opening` (`JOB_TITLE`, `JOB_QUALI`, `VACANCY`, `APP_DEADLINE`, 
`JOB_LOCATION`, `JOB_STATUS`, `JOB_PACKAGE`, `C_ID`) VALUES 
('Culpa non amet dig', 'Culpa quo aliquid q', 1000, '2001-11-27', 'Voluptatem sit ut i', 'CLOSED', '58.00', 0), 
('Data science', 'BTECH', 100, '2023-10-11', 'home', 'OPEN', '1000000000.00', 58), 
('Environmental Scientist', 'Ph.D. in Environmental Science, research experience', 12, '2023-10-20', 'Seattle', 'OPEN', '9500000000000.00', 44), ('Frontend Developer', 'Bachelor\'s degree in Computer Science, 2+ years of experience', 0, '2023-10-22', 'Chicago', 'OPEN', '100000.00', 5), 
('Marketing Manager', 'Bachelor\'s degree in Marketing, 3+ years of experience', 
0, '2023-10-18', 'New York', 'OPEN', '80000.00', 3), 
('Piano Instructor', 'Music degree, teaching experience', 12, '2023-10-28', 
'Houston', 'OPEN', '50000.00', 7), 
('Product Manager', 'Bachelor\'s degree in Business, 4+ years of experience', 
152, '2023-10-24', 'Austin', 'OPEN', '110000.00', 9), 
 

('Quia dignissimos Nam', 'Omnis aute nihil fug', 0, '1995-11-20', 'Ut corrupti aute eu', 'CLOSED', '3.00', 0), 
('Research Scientist', 'Ph.D. in Physics, research experience', 0, '2023-10-20', 
'Boston', 'OPEN', '90000.00', 2), 
('SDE', 'BTECH', 0, '2023-10-28', 'NADIAD', 'OPEN', '10000000000.00', 0), 
('Senior Software Engineer', 'Bachelor\'s degree in Computer Science, 5+ years of experience', 0, '2023-10-15', 'San Francisco', 'OPEN', '120000.00', 1), 
('Soccer Coach', 'Coaching certification, soccer experience', 0, '2023-10-29', 'Denver', 'OPEN', '55000.00', 8), 
('Social Worker', 'Bachelor\'s degree in Social Work, certification', 0, '2023-
10-25', 'Los Angeles', 'OPEN', '60000.00', 4), 
('Student Council Advisor', 'Master\'s degree in Education, leadership experience', 0, '2023-10-23', 'Phoenix', 'OPEN', '75000.00', 10);  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `project` 
-- 
 
CREATE TABLE `project` ( 
  `PROJ_NAME` varchar(100) NOT NULL, 
  `PROJ_LINK` varchar(100) DEFAULT NULL, 
  `PROJ_DESC` varchar(500) DEFAULT NULL, 
  `S_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `project` 
-- 
 
INSERT INTO `project` (`PROJ_NAME`, `PROJ_LINK`, `PROJ_DESC`, `S_ID`) VALUES 
('04-Apr-1972', '10-Jun-1987', '10-Apr-1976', 39), 
('E-commerce Website Redesign', 'example.com/ecommerce', 'Redesigned the user interface for an e-commerce website.', 1), 
('Environmental Sustainability Study', 'example.com/sustainability-study', 
'Researched the impact of climate change on ecosystems.', 6), 
('Et est architecto t', 'Ullam quo nihil esse', 'Tenetur incididunt m', 53), ('Homeless Shelter Outreach', 'example.com/homeless-outreach', 'Organized and led outreach events for the homeless.', 4), 
('Ipsum aut occaecat ', 'Sequi quo velit aut ', 'Illum aut consequun', 62), ('New Product Launch', 'example.com/new-product', 'Led the launch of a new product line.', 3), 
('Nihil ipsum ut et u', 'Ullamco delectus do', 'Est qui eveniet tot', 54), ('Particle Physics Research', 'example.com/particle-physics', 'Contributed to experiments in particle physics.', 2), 
('Piano Recital Performance', 'example.com/piano-recital', 'Performed in a solo 
piano recital.', 7), 
('Responsive Web Design', 'example.com/responsive-design', 'Developed responsive web interfaces for multiple clients.', 5), 
('Sapiente esse exerci', 'Exercitationem vero ', 'Minim cupiditate pos', 59), 
('Sint quo et quos do', 'Duis labore molestia', 'Praesentium exceptur', 57), 
('Soluta tempor placea', 'Culpa anim ut et in', 'Repellendus Ratione', 55), ('Student Council Initiatives', 'example.com/student-council', 'Initiated and executed various student council projects.', 10), 
('Tech Startup Development', 'example.com/startup-development', 'Built and scaled a tech startup from scratch.', 9), 
('Tempora ducimus lab', 'Vitae ipsum et null', 'Eum ut cupiditate mi', 52), 
('Tempore quasi quis ', 'Itaque voluptatum is', 'Expedita nostrum qua', 51), ('Youth Soccer Championship', 'example.com/soccer-championship', 'Coached a youth soccer team to a championship win.', 8); 
 
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `register` 
-- 
 
CREATE TABLE `register` ( 
  `fname` varchar(50) NOT NULL, 
  `lname` varchar(50) NOT NULL, 
  `email` varchar(50) NOT NULL, 
  `password` varchar(50) NOT NULL, 
  `id` int(11) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;  
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `skill` -- 
 
CREATE TABLE `skill` ( 
  `SKILL_NAME` varchar(100) NOT NULL, 
  `S_ID` int(10) NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `skill` 
-- 
 
INSERT INTO `skill` (`SKILL_NAME`, `S_ID`) VALUES 
('21-Sep-2016', 39), 
('A aut ipsam eos inci', 54), 
('Aut tenetur ipsam lo', 59), 
('Community Service', 4), 
('Data Analysis', 2), 
('Entrepreneurship', 9), 
('Et sint quia natus ', 51), 
('Frontend Development', 5), 
('Hic expedita voluptaf', 62), 
('Java Programming', 1), 
('Leadership', 10), 
('Non obcaecati illo pbhj', 57), 
('Officia exercitation', 53), 
('Officia reprehenderi', 55), 
('Piano Playing', 7), 
('Product Management', 3), 
('Quam dolores quia ul', 52), 
('Research', 6), 
('Sit aliqua Nobis ra', 59), 
('Soccer Coaching', 8); 
 
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `student` 
-- 
 
CREATE TABLE `student` ( 
  `S_ID` int(10) NOT NULL, 
  `F_NAME` varchar(30) DEFAULT NULL, 
  `M_NAME` varchar(30) DEFAULT NULL, 
  `L_NAME` varchar(30) DEFAULT NULL, 
  `LINKEDIN_LINK` varchar(40) DEFAULT NULL, 
  `S_EMAIL` varchar(30) DEFAULT NULL, 
  `S_PHONE` varchar(10) DEFAULT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci; 
 
-- 
-- Dumping data for table `student` 
-- 
 
INSERT INTO `student` (`S_ID`, `F_NAME`, `M_NAME`, `L_NAME`, `LINKEDIN_LINK`, `S_EMAIL`, `S_PHONE`) VALUES 
(1, 'John', 'A', 'Doe', 'linkedin.com/johndoe', 'johndoe@email.com', 
'1234567890'), 
(2, 'Jane', 'B', 'Smith', 'linkedin.com/janesmith', 'janesmith@email.com', 
'9876543210'), 
(3, 'Michael', 'C', 'Johnson', 'linkedin.com/michaeljohnson', 
'michael@email.com', '5555555555'), 
(4, 'Emily', 'D', 'Brown', 'linkedin.com/emilybrown', 'emily@email.com', 
'1111111111'), 
(5, 'David', 'E', 'Lee', 'linkedin.com/davidlee', 'david@email.com', 
'9999999999'), 
(6, 'Sarah', 'F', 'Davis', 'linkedin.com/sarahdavis', 'sarah@email.com', 
'7777777777'), 
(7, 'Robert', 'G', 'Anderson', 'linkedin.com/robertanderson', 'robert@email.com', 
'3333333333'), 
(8, 'Jennifer', 'H', 'Wilson', 'linkedin.com/jenniferwilson', 
'jennifer@email.com', '8888888888'), 
(9, 'Daniel', 'I', 'Taylor', 'linkedin.com/danieltaylor', 'daniel@email.com', 
'6666666666'), 
(10, 'Lisa', 'J', 'Martinez', 'linkedin.com/lisamartinez', 'lisa@email.com', 
'4444444444'), 
(39, 'Yoshi', 'Armando Carroll', 'Edwards', NULL, 'jiqymapasy@mailinator.com', 
'+1 (532) 9'), 
(51, 'Kasper', 'Arsenio Berger', 'Stephens', NULL, 'tebuzopixy@mailinator.com', 
'+1 (174) 1'), 
(52, 'Urielle', 'Brent Castillo', 'Kelley', NULL, 'jagiduka@mailinator.com', '+1 (589) 8'), 
(53, 'Susan', 'Adena Gibbs', 'Snyder', NULL, 'qumyc@mailinator.com', '+1 (705) 3'), 
(54, 'Marshall', 'Ciaran Knight', 'Cain', NULL, 'baxu@mailinator.com', '+1 (802) 3'), 
(55, 'Kiayada', 'Blaine Carver', 'Frank', 'Blanditiis aliquid t', 
'fujycy@mailinator.com', '+1 (901) 2'), 
(57, 'Anthony', 'Hammett Joyce', 'Clarke', NULL, 'bibaz@mailinator.com', '+1 
(204) 2'), 
(59, 'Guy', 'Kim Wiggins', 'Hall', 'Beatae sit sapiente', 
'hitafo@mailinator.com', '+1 (664) 7'), 
(62, 'Yael', 'Dorian Callahan', 'Gardner', 'Quo laboris et repud', 
'gifawikan@mailinator.com', '+1 (679) 8'); 
 
-- -------------------------------------------------------- 
 
-- 
-- Table structure for table `users` 
-- 
 
CREATE TABLE `users` ( 
  `id` int(11) NOT NULL, 
  `username` text NOT NULL, 
  `email` text NOT NULL, 
  `hash` text NOT NULL, 
  `user_type` varchar(2) NOT NULL DEFAULT 's' 
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci; 
 
-- 
-- Dumping data for table `users` 
-- 
 
INSERT INTO `users` (`id`, `username`, `email`, `hash`, `user_type`) VALUES 
(39, 'vasu', 'vasuvekariya123@gmail.com', 
'$2y$10$hoZ2JyslKQC9HuwN3IPcieGVxqmjbToZwkMMZjYURQ7w1RbqYGwu2', 's'), (41, 'very', 'vasuvekariya007@gmail.com', 
'$2y$10$mEr26iWRtfHYiR8o1/.Pk.JKaD7/sHE/kcFs315c7oYEQ6L3TIPI6', 's'), (42, 'veryy', 'a@gmail.com', 
'$2y$10$XGEGyjsSf1TM/mMfpPwMF.HBUBkLl7.F/3qHkchrZuDkYH0QweMb.', 'c'), 
(43, 'a', 'aa@gmail.com', 
'$2y$10$bLrJgt45HjuMUNEJSfZdEOy46ryI6zxfWIbmdUKyTxwwbrKtqIL9G', 'cc'), (44, 'q', 'q@gmail.com', 
'$2y$10$g/pBgdjMy/rLrhmNAELa0uDKmrBTDIyGN0lOOwuutdvLODxragjxi', 'cc'), 
(45, 'aa', 'aaaaaa@gmail.com', 
'$2y$10$6olEPn34rUY2/kKCTp9I/OKqZoEjAHUw2P1nPDP6UOHJIR8fv.NWe', 'c'), (46, '1', 'ab@gmail.com', 
'$2y$10$Ve2OqlFgeH.EbtV2aEO98.1alwzD6ZZiBMD4GRYm.pHWpiRZZPeTq', 'c'), (47, 'very1', 'very@gmail.com', 
'$2y$10$A4lEJkqneK/CVW/CkZH2d.8PrcjOXQSuN73H86NDvYmrC4VWkBt.C', 'c'), (48, 'qq', 'qqq@gmail.com', 
'$2y$10$PcMw6.7v6imoCLSzLDVvnOQXq29AZwQbAX1B3MAMGNJj0IA4wWbYq', 's'), 
(50, 'z', 'z@gmail.com', 
'$2y$10$PqN5uQHoUKQLZMvVmXmBDe6.ab9sHapPZqZSubVKgVtQ5odejUStq', 'cc'), (51, 'dd', 'd@gmail.com', 
'$2y$10$5YVEl9vuDtx/SAUetg4rDuOaCsEJ9GP5LF2eeU2w6.b9zlLTQUYde', 'ss'), (52, 'aq', 'aq@gmail.com', 
'$2y$10$ZVlo9aH7Yn3IvGUO2z/NYOXdr8d6COjYU2IJii2jDZ4glbxKESWBu', 'ss'), (53, 'aqq', 'qw@gmail.com', 
'$2y$10$TiNTMEeFb/.KRpZacG0SHeDiwikzv8wgVy3YarrRHCuychIdiDbRG', 'ss'), (54, 'milan', 'milan@gmail.com', 
'$2y$10$HPLYxlPOmH/GSpjWF4O84eB8ykS8e60UAqfANdz4thK.Q1Nzh0zzW', 'ss'), (55, 'disha', 'disha@gmail.com', 
'$2y$10$2fosCZMXKCfSGRwtgVRmiu5txWxA9bFA6bJJ6ewmeZwE1zRaQp9BG', 'ss'), (56, 'comp', 'comp@gmail.com', 
'$2y$10$gYdBsZYoPvg8HZ.3sja.ouonQWWetWMVCqtAe1lO6TO6dF14TpzuO', 'cc'), (57, 'abc', 'abc@gmail.com', 
'$2y$10$OdPRPHsKo/SAci3snfyUkuDDsA9WrZ4TJmg6OuHZ81ZJKoLC/hg..', 'ss'), (58, 'company', 'company@gmail.com', 
'$2y$10$GK0SxRltsJvBO6dhRyi/O.o0mKK7TnVDvKh2gIQYii/kz0q/jCqMi', 'cc'), 
 
(59, 'disha2', 'dishatimbadiya055@gmail.com', 
'$2y$10$3QASg9jJqB01F.xmAI1YYueet361viMnYq/ql/v3SSTo0JECt7u2W', 'ss'), 
(60, 'company1', 'comany1@gmail.com', 
'$2y$10$vaBxFJqXPKYe7Pn856pTLuPk3TDC/ZcLhjO7LGuB8yVSoysUEIfnO', 'cc'), 
(61, 's1', 's1@gmail.com', 
'$2y$10$lBQWfwnR54YMwU8xKDxtZO9LrTiSsjlZy3084v5ykpQyW5b1VG2.C', 's'), (62, 'qwe', 'qwe@gmail.com', 
'$2y$10$uDT7q0uJ6egFdrL6bx5JPOb.ATJg1qdowq/5Y7jdBdd4YfxLGYl0q', 'ss'), 
(63, 'asd', 'asd@gmail.com', 
'$2y$10$DJ/YadnXSq6qZx3O/gmaluEzxRik1kx9xe866bUJgzkmVn3ocsiW.', 's'); 
 
-- 
-- Indexes for dumped tables 
--  
-- 
-- Indexes for table `achievement` 
-- 
ALTER TABLE `achievement` 
  ADD PRIMARY KEY (`ACH_TITLE`,`S_ID`), 
  ADD KEY `S_ID` (`S_ID`); 
 
-- 
-- Indexes for table `application` 
-- 
ALTER TABLE `application` 
  ADD PRIMARY KEY (`APP_ID`), 
  ADD KEY `C_ID` (`C_ID`), 
  ADD KEY `S_ID` (`S_ID`), 
  ADD KEY `JOB_TITLE` (`JOB_TITLE`);  
-- 
-- Indexes for table `company` 
-- 
ALTER TABLE `company` 
  ADD PRIMARY KEY (`C_ID`); 
 
-- 
-- Indexes for table `education` 
-- 
ALTER TABLE `education` 
  ADD PRIMARY KEY (`DEGREE`,`S_ID`), 
  ADD KEY `S_ID` (`S_ID`); 
 
-- 
-- Indexes for table `experience` 
-- 
ALTER TABLE `experience` 
  ADD PRIMARY KEY (`EXP_TITLE`,`S_ID`), 
  ADD KEY `S_ID` (`S_ID`); 
 
-- 
-- Indexes for table `job_opening` 
-- 
ALTER TABLE `job_opening` 
  ADD PRIMARY KEY (`JOB_TITLE`,`C_ID`), 
  ADD KEY `C_ID` (`C_ID`); 
 
-- 
-- Indexes for table `project` 
-- 
ALTER TABLE `project` 
  ADD PRIMARY KEY (`PROJ_NAME`,`S_ID`), 
  ADD KEY `S_ID` (`S_ID`); 
 
-- 
-- Indexes for table `register` 
-- 
ALTER TABLE `register` 
  ADD PRIMARY KEY (`email`,`id`); 
 
-- 
-- Indexes for table `skill` 
-- 
ALTER TABLE `skill` 
  ADD PRIMARY KEY (`SKILL_NAME`,`S_ID`), 
  ADD KEY `S_ID` (`S_ID`); 
 
-- 
-- Indexes for table `student` 
-- 
ALTER TABLE `student` 
  ADD PRIMARY KEY (`S_ID`); 
 
-- 
-- Indexes for table `users` 
-- 
ALTER TABLE `users` 
  ADD PRIMARY KEY (`id`); 
 
-- 
-- AUTO_INCREMENT for dumped tables 
-- 
 
-- 
-- AUTO_INCREMENT for table `application` 
-- 
ALTER TABLE `application` 
  MODIFY `APP_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76; 
 
-- 
-- AUTO_INCREMENT for table `company` -- 
ALTER TABLE `company` 
  MODIFY `C_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61; 
 
-- 
-- AUTO_INCREMENT for table `student` 
-- 
ALTER TABLE `student` 
  MODIFY `S_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63; 
 
-- 
-- AUTO_INCREMENT for table `users` 
-- 
ALTER TABLE `users` 
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64; 
COMMIT; 