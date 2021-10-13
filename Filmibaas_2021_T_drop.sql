-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2021-09-28 09:59:17.596

-- foreign keys
ALTER TABLE person_in_movie
    DROP FOREIGN KEY person_in_movie_movie;

ALTER TABLE person_in_movie
    DROP FOREIGN KEY person_in_movie_person;

ALTER TABLE person_in_movie
    DROP FOREIGN KEY person_in_movie_position;

-- tables
DROP TABLE movie;

DROP TABLE person;

DROP TABLE person_in_movie;

DROP TABLE position;

-- End of file.

