-- Primary key constraints 

-- The primary key 'id' of Movie must be unique
INSERT INTO Movie(id, title, year, rating, company) 
VALUES (2, 'Movie1', 2008, 'R', 'Disney');

-- The primary key 'id' of Actor must be unique
INSERT INTO Actor(id, last, first, sex, dob, dod)
VALUES (1, 'James', 'Big', 'Male', '1980-1-1', NULL);

-- The primary key '(mid,aid)' of Actor must be unique
INSERT INTO MovieDirector(mid, did)
VALUES (3, 112);

-- Referential integrity constraints 

-- Inserting or update  MovieGenre whose mid doesn't appear in Movie table
INSERT INTO MovieGenre(mid, genre) VALUES(1,'Thriller');
UPDATE MovieGenre SET mid=1, genre = 'Thriller';

-- Inserting or update  MovieDirector whose mid doesn't appear in Movie table
INSERT INTO MovieDirector(mid, did) VALUES(1,2);
UPDATE MovieDirector SET mid=1, did = 222;

-- Inserting or update  MovieDirector whose aid doesn't appear in Actor table
INSERT INTO MovieDirector(mid, did) VALUES(2,10);
UPDATE MovieDirector SET mid=2, did=10;

-- Inserting or update  MovieActor whose mid doesn't appear in Movie table
INSERT INTO MovieActor(mid, aid, role) VALUES(1,1,'Supporting actress');
UPDATE MovieActor SET mid=1, did=100;

-- Inserting or update  MovieActor whose aid doesn't appear in Actor table
INSERT INTO MovieActor(mid, aid, role) VALUES(2,2,'Supporting actress');
UPDATE MovieActor SET aid=2, mid=1;

-- Inserting or update Review whose mid doesn't appear in Movie table
INSERT INTO Review(name, time, mid, rating, comment) VALUES('James','2010-08-01',1,4,'Good.');

-- CHECK constraints

-- id of the Movie table must be greater than 0
-- INSERT INTO Movie(id, title, year, rating, company)
-- VALUES (-1, 'Movie2', '2004', 'R', 'Disney')

-- -- In the Actor table, dob must come before dod
-- INSERT INTO Actor(id, last, first, sex, dob, dod)
-- VALUES (2, 'James', 'Big', 'Male', '1980-1-1', '1970-1-1')

-- -- The role of MovieActor must not be null
-- INSERT INTO MovieActor(mid, aid, role)
-- VALUES (2, 1, NULL)