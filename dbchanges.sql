-- 25 August 2023--------------------------------

ALTER TABLE teacher_subjects ADD COLUMN level_id VARCHAR(255);

-------------------------------------------------

-- 23 August 2023--------------------------------

ALTER TABLE schedule ADD COLUMN teacher_name VARCHAR(14);

CREATE TABLE
    schedule(
        schedule_id INT AUTO_INCREMENT PRIMARY KEY,
        subject_id INT,
        teacher_id INT,
        day_of_week VARCHAR(30),
        time VARCHAR(100),
        level_id INT,
        Foreign Key (subject_id) REFERENCES subjects(id),
        Foreign Key (teacher_id) REFERENCES teachers(id),
        Foreign Key (level_id) REFERENCES level(id)
    );

-- 22nd August 2023--------------------------------

CREATE TABLE
    teacher_level(
        id INT AUTO_INCREMENT PRIMARY KEY,
        teacher_id INT,
        level_id INT,
        FOREIGN KEY (teacher_id) REFERENCES teachers(id),
        FOREIGN KEY(level_id) REFERENCES level(id)
    );

-- 1709hrs---

alter table teachers DROP COLUMN level;

CREATE TABLE
    level(
        id INT AUTO_INCREMENT PRIMARY KEY,
        level VARCHAR(11)
    );

CREATE TABLE
    student_subject(
        id INT AUTO_INCREMENT PRIMARY KEY,
        student_id INT,
        subject_id INT,
        Foreign Key (student_id) REFERENCES students(id),
        Foreign Key (subject_id) REFERENCES subjects(id)
    );

-- ==============================

ALTER TABLE teachers ADD COLUMN staff_no VARCHAR(11);

ALTER TABLE teachers ADD COLUMN password VARCHAR(255);

ALTER TABLE teachers ADD COLUMN level VARCHAR(10);

--======PASSED 22=======

ALTER TABLE students
ADD
    COLUMN password VARCHAR(255) DEFAULT '12345678';

ALTER TABLE applicant CHANGE `Level of education` Level VARCHAR(255);

ALTER TABLE applicant DROP FOREIGN KEY applicant_ibfk_1;

ALTER TABLE applicant DROP COLUMN Parent_id;

ALTER TABLE parent
ADD COLUMN applicant_id INT,
ADD
    FOREIGN KEY (applicant_id) REFERENCES applicant(id);

CREATE TABLE
    teachers (
        id INT PRIMARY KEY AUTO_INCREMENT,
        name VARCHAR(60) NOT NULL
    );

CREATE TABLE
    subjects (
        id INT PRIMARY KEY AUTO_INCREMENT,
        subjectName VARCHAR(60) NOT NULL
    );

CREATE TABLE
    timetable (
        id INT AUTO_INCREMENT PRIMARY KEY,
        class VARCHAR(255),
        day VARCHAR(255),
        period VARCHAR(20),
        teacher VARCHAR(255),
        subject VARCHAR(255)
    );

CREATE TABLE
    teacher_subjects (
        id INT PRIMARY KEY AUTO_INCREMENT,
        teacher_id INT,
        subject_id INT,
        FOREIGN KEY (teacher_id) REFERENCES teachers(id),
        FOREIGN KEY (subject_id) REFERENCES subjects(id)
    );

CREATE TABLE
    fee(
        id INT AUTO_INCREMENT PRIMARY KEY,
        Bank_Name VARCHAR(255),
        Date_paid DATE,
        Amount INT(11),
        studentId INT,
        FOREIGN KEY (studentId) REFERENCES students(id)
    );

DELETE FROM applicant;

ALTER TABLE applicant AUTO_INCREMENT = 1;