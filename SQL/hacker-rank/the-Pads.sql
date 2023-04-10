SELECT *
FROM ((SELECT CONCAT(name, '(', LEFT(Occupation, 1), ')') AS name FROM OCCUPATIONS ORDER BY name)
      UNION
      (select CONCAT('There are a total of ', COUNT(Occupation), ' ', lower(Occupation), 's.')
       FROM OCCUPATIONS
       Group BY Occupation
       ORDER BY COUNT(Occupation) asc)) AS table_name
ORDER BY name;

---------------------------------------------------------------------------

select name + '(' + substring(occupation, 1, 1) + ')'
from occupations
order by name;

select 'There are a total of ' + convert(varchar, count(*)) + ' ' + lower(occupation) + 's.'
from occupations
group by occupation
order by count(*);