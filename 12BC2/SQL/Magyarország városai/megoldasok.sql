A feladatok megoldására elkészített SQL parancsokat illessze be a feladat sorszáma után!

4. feladat:
SELECT varos.vnev, varos.nepesseg, varos.terulet
FROM varos
WHERE varos.terulet > 400
ORDER BY varos.nepesseg DESC;

5. feladat:
SELECT varos.vnev, varos.nepesseg
FROM varos, megye
WHERE megye.id = varos.megyeid
AND megye.mnev LIKE "Fejér"
AND varos.nepesseg > 15000;

6. feladat:
SELECT varostipus.vtip AS "Város típusa", COUNT(varos.vnev) AS "Városok száma", SUM(varos.nepesseg) AS "Népesség"
FROM varostipus,varos
WHERE varos.vtipid = varostipus.id
AND varostipus.vtip NOT LIKE "Főváros"
GROUP BY varostipus.vtip;

7. feladat:
SELECT megye.mnev, COUNT(varos.id) AS "db"
FROM megye, varos
WHERE varos.megyeid = megye.id
AND varos.kisterseg NOT LIKE varos.jaras
GROUP BY megye.mnev
HAVING COUNT(varos.id)>8
ORDER BY COUNT(varos.id) DESC;
