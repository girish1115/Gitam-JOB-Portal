-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2022 at 09:15 AM
-- Server version: 10.2.43-MariaDB-cll-lve
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taurius_tpo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`, `admin_username`) VALUES
(1, 'admin', 'admin123', 'Training and Placement');

-- --------------------------------------------------------

--
-- Table structure for table `applied_jobs`
--

CREATE TABLE `applied_jobs` (
  `applied_jobs_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `company_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `job_interview_link` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `job_interview_status` int(11) NOT NULL DEFAULT 0,
  `job_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `applied_jobs`
--

INSERT INTO `applied_jobs` (`applied_jobs_id`, `student_id`, `job_id`, `company_name`, `job_interview_link`, `job_interview_status`, `job_status`) VALUES
(9, 1, 9, 'TCS Digital', NULL, 0, 1),
(10, 3, 9, 'TCS Digital', NULL, 0, 1),
(11, 3, 10, 'Amazon', 'https://gitam.zoom.us/j/6884485894?pwd=S3g1a0dPcFRCKy9NVXBaT2pKREVvdz09', 1, 2),
(12, 1, 10, 'Amazon', NULL, 0, 2),
(15, 4, 10, 'Amazon', 'drftgyhj.com', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branch_id` int(11) NOT NULL,
  `branch_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branch_id`, `branch_name`) VALUES
(1, 'Information Technology (I.T)'),
(2, 'Aeronautical Engineering'),
(3, 'Automobile Engineering'),
(4, 'Civil Engineering'),
(5, 'Computer Science and Engineering'),
(6, 'Electrical and Electronics Engineering'),
(7, 'Mechanical Engineering'),
(8, 'Electronics & Communication'),
(12, 'BBA');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `hr_id` int(11) NOT NULL,
  `hr_email` varchar(255) NOT NULL,
  `hr_pass` varchar(255) NOT NULL,
  `hr_fullname` varchar(255) NOT NULL,
  `hr_number` varchar(255) NOT NULL,
  `hr_profile` varchar(255) DEFAULT NULL,
  `hr_companydetails` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`hr_id`, `hr_email`, `hr_pass`, `hr_fullname`, `hr_number`, `hr_profile`, `hr_companydetails`) VALUES
(3, 'suthapallisaiganesh@gmail.com', 'qweD3w1', 'TCS Digital', '6301446199', 'uploads/company/1648835397-Collage 2018-11-20 20_34_45.jpg', '<p>&nbsp;</p>\r\n\r\n<p>A purpose-led organization that is building a meaningful future through innovation, technology, and collective knowledge. We&#39;re #BuildingOnBelief. A part of the Tata group, India&#39;s largest multinational business group, TCS has over 500,000 of the world&rsquo;s best-trained consultants in 46 countries. The company generated consolidated revenues of US $22.2 billion in the fiscal year ended March 31, 2021, and is listed on the BSE (formerly Bombay Stock Exchange) and the NSE (National Stock Exchange) in India. TCS&#39; proactive stance on climate change and award-winning work with communities across the world have earned it a place in leading sustainability indices such as the MSCI Global Sustainability Index and the FTSE4Good Emerging Index.</p>\r\n'),
(35, 'girishk1115@gmail.com', 'kB@gF6x5', 'Amazon', '7680914426', 'uploads/company/1648835397-Collage 2018-11-20 20_34_45.jpg', '<p>Overview</p>\r\n\r\n<p>Amazon is guided by four principles: customer obsession rather than competitor focus, passion for invention, commitment to operational excellence, and long-term thinking. We are driven by the excitement of building technologies, inventing products, and providing services that change lives. We embrace new ways of doing things, make decisions quickly, and are not afraid to fail. We have the scope and capabilities of a large company, and the spirit and heart of a small one. Together, Amazonians research and develop new technologies from Amazon Web Services to Alexa on behalf of our customers: shoppers, sellers, content creators, and developers around the world. Our mission is to be Earth&#39;s most customer-centric company. Our actions, goals, projects, programs, and inventions begin and end with the customer top of mind. You&#39;ll also hear us say that at Amazon, it&#39;s always &quot;Day 1.&quot;​ What do we mean? That our approach remains the same as it was on Amazon&#39;s very first day - to make smart, fast decisions, stay nimble, invent, and focus on delighting our customers.</p>\r\n\r\n<p>Website</p>\r\n\r\n<p><a href=\"https://www.aboutamazon.com/\" target=\"_blank\">https://www.aboutamazon.com/</a></p>\r\n\r\n<p>Industry</p>\r\n\r\n<p>Internet Publishing</p>\r\n\r\n<p>Company size</p>\r\n\r\n<p>10,001+ employees</p>\r\n\r\n<p>995,336 on LinkedIn&nbsp;Includes members with current employer listed as Amazon, including part-time roles. Also includes employees from subsidiaries: Amazon Web Services (AWS),Goodreads.com,Audible and 18 more.</p>\r\n\r\n<p>Headquarters</p>\r\n\r\n<p>Seattle, WA</p>\r\n\r\n<p>Specialties</p>\r\n\r\n<p>e-Commerce, Retail, Operations, and Internet</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `student_password` varchar(255) DEFAULT NULL,
  `student_idno` varchar(255) DEFAULT NULL,
  `student_no` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_branch` varchar(255) NOT NULL,
  `student_address` text NOT NULL,
  `student_profile` varchar(255) NOT NULL,
  `student_tenth` varchar(255) NOT NULL,
  `student_inter` varchar(255) NOT NULL,
  `student_grad` varchar(255) NOT NULL,
  `student_company` text DEFAULT NULL,
  `student_verify` int(11) DEFAULT NULL COMMENT '0=> not verified\r\n1=> verified\r\n',
  `student_resume` text NOT NULL,
  `student_date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_password`, `student_idno`, `student_no`, `student_email`, `student_branch`, `student_address`, `student_profile`, `student_tenth`, `student_inter`, `student_grad`, `student_company`, `student_verify`, `student_resume`, `student_date`) VALUES
(1, 'Sai Ganesh', 'GANESH@143', '121810305048', '9986757543', '121810305048@gitam.in', 'Computer Science and Engineering', 'Dr No.- 34-1-36 , Chinna Kummari Street ', '1648647779-passport.jpg', '93', '80', '80', NULL, 1, '1648647779-SAI_GANESH.pdf', '30 - 03 - 2022'),
(3, 'Girish Kumar', 'GANESH@143', '121810305037', '7893251457', '121810305037@gitam.in', 'Computer Science and Engineering', 'Dr No.- 34-1-36 , Chinna Kummari Street', '1648834085-IMG_20180922_134017.jpg', '60', '60', '60', NULL, 1, '1648834085-resumdivya.pdf', '01 - 04 - 2022'),
(4, 'Kavya Rupa', 'KAVYA@123', '121810305047', '9848479078', '121810305047@gitam.in', 'Computer Science and Engineering', 'Dr No.- 34-1-36 , Chinna Kummari Street', '1648876236-4691ae68ecc91355ad996098db267.gif', '93', '80', '80', NULL, 1, '1648876236-ASSIGNMENT.pdf', '02 - 04 - 2022'),
(5, 'suresh', '123456789', '123456789', '1234567899', 'hello@gmail.com', 'Electronics & Communication', '10', '1648881508-jayson.jpg', '10', '10', '10', NULL, 1, '1648881508-document.pdf.pdf', '02 - 04 - 2022');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `vac_id` int(11) NOT NULL,
  `vac_profile` varchar(255) NOT NULL,
  `vac_designation` varchar(255) NOT NULL,
  `vac_salary` varchar(255) NOT NULL,
  `vac_venue` varchar(255) NOT NULL,
  `vac_date` varchar(255) NOT NULL,
  `vac_total` int(11) NOT NULL,
  `vac_company` varchar(255) NOT NULL,
  `vac_status` int(1) NOT NULL DEFAULT 1,
  `vac_job` text NOT NULL,
  `vac_tenth` varchar(255) NOT NULL,
  `vac_twelve` varchar(255) NOT NULL,
  `vac_batch` varchar(255) NOT NULL,
  `vac_backlog` varchar(255) NOT NULL,
  `vac_degree` varchar(255) NOT NULL,
  `vac_branch` varchar(255) NOT NULL,
  `vac_college` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`vac_id`, `vac_profile`, `vac_designation`, `vac_salary`, `vac_venue`, `vac_date`, `vac_total`, `vac_company`, `vac_status`, `vac_job`, `vac_tenth`, `vac_twelve`, `vac_batch`, `vac_backlog`, `vac_degree`, `vac_branch`, `vac_college`) VALUES
(9, 'IT Services', 'system engineer', '7.0', 'Banglore,Mumbai,Hyderabad', '2022-04-05', 2, 'TCS Digital', 1, '<p><strong>Mandatory registration process:</strong></p>\r\n\r\n<p>1. cocubes and</p>\r\n\r\n<p>2.&nbsp;Students have to register and fill up the application form on the<strong>&nbsp;TCS&nbsp;</strong><strong>NextStep portal</strong>&nbsp;(if not done already). The status of the student should be&nbsp;<strong>&ldquo;Application Received&rdquo;</strong>&nbsp;. This is important for the test process.</p>\r\n\r\n<p>3. Submit your TCS Reference Number for TCS Digital Test with status &quot;Application Received&quot;. (Example: CT20144556677 or DT11223344556) through the given link: https://forms.gle/Rgox81TAWG1CtpMS9</p>\r\n\r\n<p><strong>Steps to register on TCS NextStep Portal:</strong></p>\r\n\r\n<ul>\r\n	<li>Students can go to&nbsp;<a href=\"http://nextstep.tcs.com/campus\" target=\"_blank\">http://nextstep.tcs.com/campus</a></li>\r\n	<li>Click on &ldquo;Register Now&rdquo;.</li>\r\n	<li>Choose the category as &ldquo;IT&rdquo;.</li>\r\n	<li>Fill up the details to get a<strong>&nbsp;Reference ID.</strong></li>\r\n	<li>Proceed to complete the Application Form.</li>\r\n	<li><strong>IMPORTANT NOTE:</strong>&nbsp;If students have already applied in the system, they need not create new profile. They should use the existing application only. Please make sure that the status is &ldquo;Application Received&rdquo;. Student can check this by going to the &ldquo;Track my Application&rdquo; link in the NextStep portal.</li>\r\n</ul>\r\n\r\n<p><strong>NOTE: Students who complete all 3 steps (Cocubes, TCS NextStep and Google form) will ONLY be considered eligible for the drive.</strong></p>\r\n\r\n<p><strong>TCS Eligibility Criteria:</strong></p>\r\n\r\n<p>&bull;&nbsp;<strong>Percentage</strong>: Minimum 60% or 6 CGPA throughout academics and an aggregate of&nbsp;<strong>70% or 7 CGPA in the highest qualification</strong>, till the semester for which results have been declared. If selected, TCS Digital Offer will be valid only if the 70% criteria or 7 CGPA is met after completion of the course, at the time of joining.</p>\r\n\r\n<p>&bull;&nbsp;<strong>Backlogs / Arrears / ATKT:</strong>&nbsp;The student should not be having any active backlog / arrear/ ATKT at the time of appearing for the TCS Selection process. If selected, no pending backlogs / arrears / ATKT will be permitted at the time of joining TCS. All pending backlogs / arrears / ATKT should be completed within the course duration stipulated by the University.</p>\r\n\r\n<p>&bull;&nbsp;<strong>Gap / Break in Education:</strong>&nbsp;It is mandatory to declare the gaps if any, during the period of education. Break in education should not be due to extended education (examinations cleared after the time stipulated by the Board / University). Any break in education should&nbsp;<strong>not exceed 24 months</strong>&nbsp;and is permissible only for valid reasons. Relevant document proof, as applicable, will be checked for gaps in education.</p>\r\n\r\n<p><strong>Course Types:</strong>&nbsp;Only Full-Time courses will be considered (Part Time / Correspondence courses will not be considered). Students who have completed their Secondary and / or Senior Secondary course from NIOS (National Institute of Open Schooling) are also eligible to apply if the other courses are full time.</p>\r\n\r\n<p>&bull;&nbsp;<strong>Work Experience</strong>: Students with prior work experience of up to 2 years are eligible to apply for the TCS NQT (Digital) Test Process.</p>\r\n\r\n<p>&bull;&nbsp;<strong>Age</strong>: A student should be of 18 to 28 years of age to participate in the TCS NQT Digital process.</p>\r\n\r\n<p><strong>Additional Opportunities &ndash; Exclusive for TCS Priority Colleges:</strong></p>\r\n\r\n<p>&bull; Additional Opportunity for TCS NQT (Digital) Test &ndash; Students from TCS Priority Colleges who take up the TCS Digital Test, but do not clear the test or interview, will have an opportunity to appear for the TCS NQT Ninja process (dates will be announced soon).</p>\r\n', '60', '60', '2022', 'no backlog', 'btech', 'Cse,Ece', '60'),
(10, 'IT Product', 'SDE-1', '19.0', 'Banglore', '2022-04-10', 5, 'Amazon', 1, '<h2>About the job</h2>\r\n\r\n<p><strong>Job Summary</strong><br />\r\n<br />\r\n<strong>DESCRIPTION</strong><br />\r\n<br />\r\nThe Amazon India Consumer team is building a new team to build the next generation of features that will help Amazon to effectively communicate with its customers.<br />\r\n<br />\r\nIn this role you will be involved in building features and will require understanding and working across back-end services and the shopping app.<br />\r\n<br />\r\nWe are looking for solid SDEs who are excited by the charter and looking to solve complex technical problems. If dealing with ambiguity and solving complex technical problems interests you, this may be a great opportunity for you to consider.<br />\r\n<br />\r\n<br />\r\n<strong>Basic Qualifications</strong></p>\r\n\r\n<ul>\r\n	<li>Bachelor&#39;s degree in Computer Science or equivalent.</li>\r\n	<li>0-2 years of industry experience</li>\r\n	<li>Experience building scalable infrastructure software or distributed systems for commercial online services</li>\r\n	<li>Experience in design</li>\r\n	<li>Experience with tools of the trade, including a variety of modern programming languages (Java, C/C++, Objective C, Python, JavaScript) and open-source technologies (Linux, Spring, JQuery, etc)</li>\r\n</ul>\r\n\r\n<p><strong>Preferred Qualifications</strong></p>\r\n\r\n<ul>\r\n	<li>Bachelors or Masters in Computer Science or related field</li>\r\n	<li>Experience with building scalable services</li>\r\n	<li>Ability to write good quality code and good understanding of data structures and algorithms</li>\r\n	<li>Ability to achieve stretch goals in fast-paced, innovation-focused environment</li>\r\n	<li>Hands-on experience developing with Amazon Web Services</li>\r\n	<li>Familiarity with Alexa as a customer</li>\r\n</ul>\r\n', '60', '60', '2022', 'no backlog', 'btech', 'Cse,Ece', '70'),
(11, 'fdsaf', 'Hello dsfaf', '10', 'sfdsaf f', '2022-04-28', 32, 'Taurius', 1, '<p>dsfs af</p>\r\n\r\n<p>&nbsp;fsaf</p>\r\n\r\n<p>asfsaf</p>\r\n', '233', '23', 'fdsaf', 'fdsaf', 'fdsaf', 'dfsaf ', '232'),
(13, '10', '10', '10', '101', '2022-10-10', 10, 'Taurius', 1, '<p>10</p>\r\n', '10', '10', '10', '10', '10', '10', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  ADD PRIMARY KEY (`applied_jobs_id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applied_jobs`
--
ALTER TABLE `applied_jobs`
  MODIFY `applied_jobs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `hr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `vac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
