UPDATE raw."Structure"
SET bin = bin_raw;

--remove B from bin
UPDATE raw."Structure"
SET bin = SUBSTRING(bin FROM 2)
WHERE bin IS NOT NULL;

UPDATE raw."Structure"
SET bin = NULLIF(bin, '');

UPDATE raw."Structure"
SET bin = TRIM(bin)
WHERE bin IS NOT NULL;

WITH MaxBin AS (
    SELECT MAX(bin::int) + 1 AS start_value
    FROM raw."Structure"
    WHERE bin IS NOT NULL
)
UPDATE raw."Structure"
SET bin = start_value::varchar
FROM MaxBin
WHERE bin IS NULL;

--------------
alter table public.gis_buildings
    add deleted_at timestamp;

alter table public.gis_buildings
    add bldguse integer;

alter table public.gis_buildings
    add bldgarea double precision;

alter table public.gis_buildings
    rename column survey_bld to btype;

alter table public.gis_buildings
    add verify boolean default false not null;

UPDATE public.gis_buildings
SET bin = 'B' || LPAD(bin, 6, '0')
WHERE bin IS NOT NULL;

-- now i have to replace the taxcd in build_holdings and fsm

truncate table public.build_holdings_fsm;
truncate table public.build_holdings;

INSERT INTO build_holdings (bin, taxcd, ward, contact)
SELECT gis_buildings.bin, gis_buildings.taxcd, gis_buildings.ward, gis_buildings.phone
FROM gis_buildings
WHERE gis_buildings.taxcd IS NOT NULL;

INSERT INTO build_holdings_fsm (bin, taxcd, ward, contact)
SELECT gis_buildings.bin, gis_buildings.taxcd, gis_buildings.ward, gis_buildings.phone
FROM gis_buildings
WHERE gis_buildings.taxcd IS NOT NULL;

alter table public.gis_buildings
    drop column taxcd;

----------------------
ALTER TABLE public.gis_buildings
  ALTER COLUMN geom TYPE geometry(MultiPolygon, 4326)
  USING ST_Transform(ST_SetSRID(ST_Multi(geom), 32645), 4326)::geometry(MultiPolygon, 4326);


CREATE TABLE gis_buildings_new AS
SELECT DISTINCT ON (bin) * FROM gis_buildings;

-- Drop the original table
DROP TABLE gis_buildings;

-- Rename the new table to the original table name
ALTER TABLE gis_buildings_new RENAME TO gis_buildings;

-- Add the primary key constraint
ALTER TABLE gis_buildings
ADD PRIMARY KEY (bin);






