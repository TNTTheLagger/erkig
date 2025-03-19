A feladatok megoldására elkészített SQL parancsokat illessze be a feladat sorszáma után!

1. feladat:

3. feladat:

4. feladat:
SELECT COUNT(partnerek.id) AS "Alkalmak" 
FROM partnerek, kiszallitasok 
WHERE partnerek.telepules LIKE "Vác" 
AND kiszallitasok.partnerid = partnerek.id;

5. feladat:
SELECT MAX(kiszallitasok.karton) AS "legtobb"
FROM kiszallitasok
WHERE YEAR(kiszallitasok.datum) = 2016
AND MONTH(kiszallitasok.datum) = 5;

6. feladat:
SELECT partnerek.telepules 
FROM partnerek 
GROUP BY partnerek.telepules 
HAVING COUNT(partnerek.id) > 1

7. feladat:
SELECT gyumolcslevek.gynev AS "ital", SUM(kiszallitasok.karton)* 6 AS "doboz" 
FROM kiszallitasok, gyumolcslevek 
WHERE kiszallitasok.gyumleid = gyumolcslevek.id 
GROUP BY gyumolcslevek.gynev 
ORDER BY SUM(kiszallitasok.karton) DESC LIMIT 3;
