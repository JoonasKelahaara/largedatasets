/* Roolien trimmaus */
UPDATE `title_genres` SET `genre` = TRIM(`genre`);
/* Genreistä linebreakit pois */
UPDATE `title_genres` SET `genre` = REPLACE(`genre`, '\r', '');
/* Genrejen trimmaus */
UPDATE `had_role` SET `role_` = TRIM(`role_`);