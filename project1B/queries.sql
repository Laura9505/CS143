-- Give the names of all the actors in the movie 'Die Another Day'
/*
SELECT CONCAT(first, ' ', last) AS actors
FROM Actor
JOIN MovieActor ON MovieActor.aid = Actor.id
JOIN Movie ON Movie.id = MovieActor.mid
WHERE Movie.title = 'Die Another Day'
*/
-- Give the count of all the actors who acted in multiple movies
/*
SELECT COUNT(*) AS number_of_actors
FROM (
    SELECT Actor.id
    FROM Actor
    JOIN MovieActor ON Actor.id = MovieActor.aid
    GROUP BY Actor.id
    HAVING COUNT(MovieActor.aid) > 1
) t
*/
-- Give the names of all the directors that acts in more than 20 movies

SELECT DISTINCT CONCAT(first, ' ', last) AS director_actors
FROM Actor
JOIN MovieActor ON MovieActor.aid = Actor.id
JOIN Movie ON Movie.id = MovieActor.mid
JOIN MovieDirector ON MovieDirector.did = MovieActor.aid
GROUP BY director_actors
HAVING COUNT(MovieActor.aid)>20
