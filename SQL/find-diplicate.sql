select id, count(id)
from road_names
group by id
having count(id) > 1;

-- with number of  duplicates
SELECT taxcd, COUNT(taxcd) as count
FROM build_holdings
GROUP BY taxcd
HAVING COUNT (taxcd) > 1;