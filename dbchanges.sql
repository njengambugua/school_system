ALTER TABLE applicant CHANGE `Level of education` Level VARCHAR(255);

ALTER TABLE applicant DROP FOREIGN KEY applicant_ibfk_1;

ALTER TABLE applicant DROP COLUMN Parent_id;

ALTER TABLE parent
ADD COLUMN applicant_id INT,
ADD
    FOREIGN KEY (applicant_id) REFERENCES applicant(id);