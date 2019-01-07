# CS143
Database Systems

This project is a Movie Database System accessed by users exclusively through a web interface, which allow users to search and browse movie, actor/director related information, and add movie comments/ratings.

## project 1c - Movie Database Website
developed in Ubuntu 17.10, MySQL 5.7.21, Apache 2.4.27, PHP 7.1.15

input pages:
- add_person.php: a page that lets users to add actor and/or director information.
- add_movie.php: a page that lets users to add movie information.
- add_comment.php: a page that lets users to add comments to movies. i.e. This movie was terrible.
- add_MArelation.php: a page that lets users to add "actor to movie" relation(s). i.e. Johnny Depp stars Alice in Wonderland
- add_MDrelation.php: a page that lets users to add "director to movie" relation(s). i.e. Johnny Depp directs Alice in Wonderland

browsing pages:
- browse_actor.php: shows each actor's detailed information, which can be linked from search page and movie info page.
    - show links to the movies that the actor was in.
- browse_movie.php: shows each movie's detailed information, which can be linked from search page and actor info page.
    - show Title, Producer, MPAA Rating, Director, Genre of this movie
    - show links to the actors/actresses that were in this movie
    - show the average score of the movie based on user feedbacks
    - show all user comments
    - contain "Add Comment" button which links to input page where users can add comments

search page:
- search.php: a page that let users search for an actor/actress/movie through a keyword search interface, the keyword is not case-sensitive. (For actor/actress, you should examine first/last name, and for movie, you should examine title). Multi-word search is supported.

others:
- menu.php: the design of this website's overall look.
- home.php: the homepage of this website, which contains some introduction and instructions.
