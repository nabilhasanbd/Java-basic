select id, count(id) from road_names 
group by id 
having count(id) > 1;