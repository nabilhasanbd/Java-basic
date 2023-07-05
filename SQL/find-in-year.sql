SELECT *
FROM gis_buildings
WHERE EXTRACT(YEAR FROM created_at) = 2022;

SELECT count(*)
FROM gis_buildings
WHERE EXTRACT(YEAR FROM created_at) is null;