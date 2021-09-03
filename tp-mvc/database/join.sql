-- Jointure sur une relation Many to Many
SELECT * FROM movies m
LEFT JOIN category_movie cm ON m.id = cm.movie_id
LEFT JOIN categories c ON c.id = cm.category_id
WHERE m.id = 2

-- Jointure sur une relation One to Many
-- SELECT * FROM movies m
-- LEFT JOIN categories c ON c.id = m.category_id
-- WHERE m.id = 2
