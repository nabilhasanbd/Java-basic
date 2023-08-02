select gis_buildings.bin, btype, gis_buildings.ward, structype, flrcount, bldgarea, usecatg, offcnm, bldgasc, verify,
                    STRING_AGG(ownername, ', ') AS ownername,
                    STRING_AGG(ownernamebengali, ', ') AS ownernamebengali,
                    STRING_AGG(fathermothername, ', ') AS fathermothername,
                    STRING_AGG(huswifename, ', ') AS huswifename,
                    STRING_AGG(contact, ', ') AS contact,
                    STRING_AGG(taxcd, ', ') AS taxcd,
                    bldguses.name AS bldusesname
from "gis_buildings"
    left join "build_holdings" on "gis_buildings"."bin" = "build_holdings"."bin"
    left join "bldguses" on "gis_buildings"."bldguse" = "bldguses"."id"
where "gis_buildings"."deleted_at" is null AND "gis_buildings"."bin" = 'B101525'
group by "bldguses"."name", "gis_buildings"."bin", "bldgasc", "gis_buildings"."ward", "structype", "flrcount", "bldgarea", "bldguse", "usecatg", "offcnm", "verify", "btype"
order by "gis_buildings"."bin" asc;