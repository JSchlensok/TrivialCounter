CREATE TABLE lecturers (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE semesters (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL
);
CREATE TABLE classes (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	semester_id int NOT NULL,
	FOREIGN KEY (semester_id) REFERENCES semesters(id)
);

CREATE TABLE lecture_trivial_count (
	id int AUTO_INCREMENT PRIMARY KEY,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	lecture_time datetime NOT NULL,
	lecturer_id int NOT NULL,
	class_id int NOT NULL,
	trivial_count int NOT NULL,
	duration time NOT NULL,
	FOREIGN KEY (lecturer_id) REFERENCES lecturers(id),
	FOREIGN KEY (class_id) REFERENCES classes(id)
);
