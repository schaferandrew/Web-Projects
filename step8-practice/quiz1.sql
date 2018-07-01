SELECT first, last, b.name
FROM owner
INNER JOIN own
ON id=ownerid
INNER JOIN cat
ON catid=cat.id
INNER JOIN breed b
ON breedid=b.id
ORDER BY first

/*
breed: id, name
cat: id, name, age, breedid, gender
own: ownerid, catid
owner: id, last, first
*/
