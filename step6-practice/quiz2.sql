select distinct c.name
from cat a, cat b, breed c
where a.id<>b.id and a.breedid=b.breedid and a.breedid = c.id

select distinct a.name
from cat a, cat b
where a.age < b.age and a.id<>b.id
order by a.name