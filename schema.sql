CREATE TABLE lecturers (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
)

CREATE TABLE classes (
	id int AUTO_INCREMENT PRIMARY KEY,
	name varchar(255) NOT NULL,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
)

CREATE TABLE lecture_trivia_count (
	id int AUTO_INCREMENT PRIMARY KEY,
	added datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
	lecture_time datetime NOT NULL,
	lecturer_id int NOT NULL,
	class_id int NOT NULL,
	count int NOT NULL,
	FOREIGN KEY (lecturer_id) REFERENCES (lecturers),
	FOREIGN KEY (class_id) REFERENCES (classes)
)
