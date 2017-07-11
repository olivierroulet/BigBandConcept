Exemples utiles sur http://www.w3resource.com/mysql/mysql-triggers.php
______________________________________________________________________


CREATE TRIGGER `setDateFin` AFTER INSERT ON `actu`
 FOR EACH ROW BEGIN
SET @TT = NEW.AC_DateFin;
 IF (@TT ='0000-00-00 00:00:00.000000') THEN
	SET @currentFrom = NEW.AC_Date;
	SET @currentTo = DATE_ADD(@currentFrom, INTERVAL 6 HOUR);
	SET @TT = @currentTo ;
	END IF;
_________________________ fin de `setDateFin` ______________________________________________________________________

CREATE TRIGGER `INSArtisteAfterUserINS` AFTER INSERT ON `users`
 FOR EACH ROW BEGIN
IF (NEW.US_idURole = 3) THEN

    INSERT INTO artistes SET 
        AR_ID_InUsersTable = NEW.US_id, 
        AR_Adresse_Mail  = NEW.US_email,
        AR_Date_De_Creation = NOW(),
        AR_Createur = 'Trigger INSArtisteAfterUserINS',
        AR_Modificateur = 'Trigger INSArtisteAfterUserINS',
        AR_Prenom = NEW.US_FirstName,
        AR_Nom = NEW.US_LastName,
        AR_Pseudo = NEW.US_Pseudo,
        AR_Telephone_1 = NEW.US_Tel

    ;

END IF;

END
_________________________ fin de `INSArtisteAfterUserINS` _________________________________________________________

CREATE TRIGGER `INS_DevisDansSes2Fils` AFTER INSERT ON `devis`
 FOR EACH ROW BEGIN
    INSERT INTO detail_devis SET 
        DE_Id_Devis = NEW.DV_Iddevis;
        
    INSERT INTO detail_devis SET 
        detail_devis_2 = NEW.DV_Iddevis;
END
_________________________ fin de `INS_DevisDansSes2Fils` _________________________________________________________
