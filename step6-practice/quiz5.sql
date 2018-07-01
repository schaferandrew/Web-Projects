select C.name, L.LANGUAGE 
from Country as C, CountryLanguage as L
where C.code=L.CountryCode