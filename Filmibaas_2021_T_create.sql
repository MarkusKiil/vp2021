-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-09-28 09:59:17.596

-- tables
-- Table: movie
CREATE TABLE movie (
    id int NOT NULL AUTO_INCREMENT,
    title varchar(100) NOT NULL,
    duration int NOT NULL,
    production_year int NOT NULL,
    description varchar(500) NULL,
    CONSTRAINT movie_pk PRIMARY KEY (id)
);

-- Table: person
CREATE TABLE person (
    id int NOT NULL AUTO_INCREMENT,
    firstname varchar(100) NOT NULL,
    lastname varchar(100) NOT NULL,
    date_of_birth date NOT NULL,
    CONSTRAINT person_pk PRIMARY KEY (id)
);

-- Table: person_in_movie
CREATE TABLE person_in_movie (
    id int NOT NULL AUTO_INCREMENT,
    person_id int NOT NULL,
    movie_id int NOT NULL,
    position_id int NOT NULL,
    role varchar(100) NULL,
    CONSTRAINT person_in_movie_pk PRIMARY KEY (id)
);

-- Table: position
CREATE TABLE position (
    id int NOT NULL AUTO_INCREMENT,
    position_name varchar(100) NOT NULL,
    CONSTRAINT position_pk PRIMARY KEY (id)
);

-- foreign keys
-- Reference: person_in_movie_movie (table: person_in_movie)
ALTER TABLE person_in_movie ADD CONSTRAINT person_in_movie_movie FOREIGN KEY person_in_movie_movie (movie_id)
    REFERENCES movie (id);

-- Reference: person_in_movie_person (table: person_in_movie)
ALTER TABLE person_in_movie ADD CONSTRAINT person_in_movie_person FOREIGN KEY person_in_movie_person (person_id)
    REFERENCES person (id);

-- Reference: person_in_movie_position (table: person_in_movie)
ALTER TABLE person_in_movie ADD CONSTRAINT person_in_movie_position FOREIGN KEY person_in_movie_position (position_id)
    REFERENCES position (id);

-- End of file.

