/* Roolien trimmaus */
UPDATE `title_genres` SET `genre` = TRIM(`genre`);
/* Genreistä linebreakit pois */
UPDATE `title_genres` SET `genre` = REPLACE(`genre`, '\r', '');
/* Genrejen trimmaus */
UPDATE `had_role` SET `role_` = TRIM(`role_`);

/* View 10 suomalaisen elokuvan näyttämiseen; niistä otetaan nimi, genre ja aloitusvuosi */

CREATE VIEW FinnishMovies AS 
SELECT title, genre, start_year
FROM titles INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
INNER JOIN aliases 
ON titles.title_id = aliases.title_id
WHERE region = "FI"
LIMIT 10;

/* View 10 isobritannialaisen elokuvan näyttämiseen; niistä otetaan nimi, genre ja aloitusvuosi */

CREATE VIEW EnglishMovies AS
SELECT title, genre, start_year
FROM titles INNER JOIN title_genres
ON titles.title_id = title_genres.title_id
INNER JOIN aliases
ON titles.title_id = aliases.title_id
WHERE region = "GB"
LIMIT 10;