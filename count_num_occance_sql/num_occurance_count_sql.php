# mysql count number of occurrences in a column
SELECT name,COUNT(*) 
FROM tablename 
GROUP BY name 
ORDER BY COUNT(*) DESC;