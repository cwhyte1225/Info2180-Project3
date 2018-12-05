--
-- PUT COMMENTS ON THE CHANGES MADE PLEASE SO EVERYBODY CAN OVERS WHATS TAKING PLACE IN THE CODE--
--

CREATE DATABASE HireMe;

USE HireMe;


--

-- Table structure for table `users`

--
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (

  `user_id` int(11) NOT NULL auto_increment,

  `firstname` char(35) NOT NULL default '',
  
  `lastname` char(35) NOT NULL default '',

  `e_mail` char(20) NOT NULL default '',
  
  `telephone` char(35) NOT NULL default '',
  
  `password` char(64) NOT NULL default '',
  
  `date_joined` TIMESTAMP default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,

  PRIMARY KEY  (`user_id`)

) ;

INSERT INTO users (user_id, firstname, lastname, e_mail, telephone, password, date_joined) VALUES (1, 'Rijkaard', 'Harrison', 'admin@hireme.com', '876-123-4567', md5('Password123'), DATE('2018/11/28'));
INSERT INTO users (user_id, firstname, lastname, e_mail, telephone, password, date_joined) VALUES (2, 'Chantay', 'Whyte', 'cwt@test.com', '876-258-3698', md5('Password456'), DATE('2018/11/28'));
INSERT INTO users (user_id, firstname, lastname, e_mail, telephone, password, date_joined) VALUES (3, 'Jovoun', 'Tyrell', 'jjt@test.com', '876-159-1591', md5('Password789'), DATE('2018/11/28'));



--

-- Table structure for table `Jobs`

--

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (

  `jobId` int(11) NOT NULL auto_increment,

  `job_title` char(35) NOT NULL default '',
  
  `job_description` char(35) NOT NULL default '',

  `category` char(35) NOT NULL default '',
  
  `company_name` char(35) NOT NULL default '',

  `company_location` char(20) NOT NULL default '',

  `date_posted` TIMESTAMP default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,

  PRIMARY KEY (`jobId`)

);


INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (1, 'Product Marketing Manager','Market our products','Sales and Marketing','Jamaica Gleaner','kingston, Jamaica',  DATE("14/04/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (2, 'Software Engineer','Create software we need','Programming','UWI-MITS', 'UWI MONA,Jamaica',  DATE("13/06/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (3, 'Business Analyst-Scrum Master','provide competent services','Business and Management','NCB', 'St.Andrew, Jamaica', DATE("25/07/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (4, 'UX/UI Designer','update UI in our systems','Design','Jamaica Yellow Pages','Kingston, Jamaica', DATE("12/10/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (5, 'Director customer support', 'provide customer service to disgruntled students','Customer Support','UWI-Bursary','UWI MONA,Jamaica', DATE("10/10/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (6, 'Senior Systems Engineer', 'upgrade amd manage company programs','DevOps and Sysadmin','Sagicor Bank','St.Andrew, Jamaica', DATE("10/10/2018"));
INSERT INTO jobs (jobId, job_title, job_description, category, company_name, company_location, date_posted) VALUES (7, 'Software Engineer','design or upgrade and maintain current software systems' ,'Programming','Base Camp','Portmore, Jamaica', DATE("18/10/2018"));


--

-- Table structure for table `jobs applied for`

--

DROP TABLE IF EXISTS `JobsAppliedFor`;

CREATE TABLE `JobsAppliedFor` (

  `id` int(11) NOT NULL auto_increment,

  `job_id` int(35) NOT NULL default 0,
  
  `user_id` int(35) NOT NULL default 0,
  
  `date_applied` TIMESTAMP default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,

  PRIMARY KEY  (`id`)

);
INSERT INTO JobsAppliedFor ( job_id, user_id, date_applied) VALUES (3, 2, DATE("14/04/2018"));
INSERT INTO JobsAppliedFor ( job_id, user_id, date_applied) VALUES (6, 2, DATE("13/06/2018"));


--
-- create table for available jobs
--

DROP TABLE IF EXISTS `availJobs`;

CREATE TABLE `availJobs` (

  `j_id` int(11) NOT NULL auto_increment,

  `company` char(35) NOT NULL default '',

  `job_title` char(35) NOT NULL default '',
  
  `category` char(35) NOT NULL default '',

  `date_avail` TIMESTAMP default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,

  PRIMARY KEY  (`j_id`),
  
  FOREIGN KEY (`j_id`) REFERENCES jobs(`jobId`)

) ;

INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (1, 'Jamaica Gleaner','Product Marketing Manager','Sales and Marketing', DATE("14/04/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (2, 'UWI-MITS','Software Engineer', 'Programming', DATE("13/06/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (3, 'NCB','Business Analyst-Scrum Master','Business and Management', DATE("25/07/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (4, 'Jamaica Yellow Pages','UX/UI Designer','Design', DATE("12/10/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (5, 'UWI-Bursary','Director customer support', 'Customer Support', DATE("10/10/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (6, 'Sagicor Bank','Senior Systems Engineer', 'DevOps and Sysadmin', DATE("10/10/2018"));
INSERT INTO availJobs (j_id, company,job_title, category, date_avail) VALUES (7, 'Base Camp','Software Engineer', 'Programming', DATE("18/10/2018"));

