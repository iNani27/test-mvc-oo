SELECT e.lenom, e.labio, e.sciecle_id,p.laperiode 
	FROM ecrivain e
	INNER JOIN periode p
	ON e.sciecle_id=p.id 
;

SELECT e.lenom, e.labio, e.sciecle_id 
	FROM ecrivain e
	WHERE sciecle_id=1
;

SELECT l.ecrivain_id AS AUTHOR_id, 
		e.lenom, e.labio,
        GROUP_CONCAT(l.id) AS LesLivres, 
        GROUP_CONCAT(l.letitre) AS LesTitres, 
        GROUP_CONCAT(l.ladescription) AS LesDesc, 
        GROUP_CONCAT(l.lasortie) AS LesDates
	FROM ecrivain e 
    INNER JOIN livre l
    ON e.id=l.ecrivain_id
    WHERE e.id=1
    GROUP BY l.ecrivain_id
    ;
    