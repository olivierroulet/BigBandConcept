trigger INS_DevisDansSes2Fils


devis = master AI = DV_Iddevis
	detail_devis : DE_Id_Devis = DV_Iddevis
	detail_devis_2 : D2_Iddevis = DV_Iddevis
	
	
BEGIN

    INSERT INTO detail_devis SET 
    	DE_Id_Devis = NEW.DV_Iddevis;
        
	INSERT INTO detail_devis_2 SET 
    	D2_Iddevis = NEW.DV_Iddevis;

END