<?php
/* -------------------------------- installation -------------------------------- */
function install_com_reference()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("reference")
		->column("photo","VARCHAR(250) NULL") 
		->column("logo", "VARCHAR(250) NULL")  
		->column("active","INT(3) NULL") 
		->column("date_add", "DATETIME NULL")
		->column("last_edit", "DATETIME NULL")
		->create();    
	
	$result2 = $install->init()        
		->table("details_reference")        
		->column("id_reference", "INT NULL")        
		->column("nom_client", "VARCHAR(250) NULL")    
		->column("extrait", "text NULL")        
		->column("description", "text NULL")        
		->column("secteur_activite", "text NULL")      
		->column("historique_collaboration", "text NULL")      
		->column("resultat", "text NULL")      
		->column("site_web", "VARCHAR(250) NULL")      
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()
		->table("reference_item")
		->column("id_reference","INT NULL") 
		->column("id_service","INT NULL") 
		->column("id_galerie","INT NULL") 
		->column("id_video","INT NULL") 
		->column("photo","VARCHAR(250) NULL")
		->column("pdf", "VARCHAR(250) NULL")     
		->column("ordre","INT NULL")
		->column("date_add", "DATETIME NULL")
		->column("last_edit", "DATETIME NULL")
		->create();    
	
	$result4 = $install->init()        
		->table("details_reference_item")        
		->column("id_reference_item", "INT NULL")        
		->column("titre", "VARCHAR(250) NULL") 
		->column("soustitre", "VARCHAR(250) NULL") 
		->column("description", "text NULL") 
		->column("langue", "VARCHAR(3) NULL")        
		->create(); 
	
	$result5 = $install->init()
		->table("cursus")
		->column("id_reference","INT NULL") 
		->column("ordre","INT NULL")
		->column("date_add", "DATETIME NULL")
		->column("last_edit", "DATETIME NULL")
		->create();    
	
	$result6 = $install->init()        
		->table("details_cursus")        
		->column("id_cursus", "INT NULL")        
		->column("titre", "VARCHAR(250) NULL") 
		->column("description", "text NULL") 
		->column("langue", "VARCHAR(3) NULL")        
		->create(); 
	
	$result7 = $install->init()->module("com_reference")->addPermissions();    
	
	if($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7)
	{
		$install->init()->file("references", "images")->fileCreate();
		return 1;    
	}
	else 
		return 0;    
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_reference()
{    
	$desinstall = new installation();    

	$result1 = $desinstall->init()->table("reference")->drop(); 
	$result2 = $desinstall->init()->table("details_reference")->drop();    
	$result3 = $desinstall->init()->table("item_reference")->drop(); 
	$result4 = $desinstall->init()->table("details_item_reference")->drop(); 
	$result5 = $desinstall->init()->table("cursus")->drop(); 
	$result6 = $desinstall->init()->table("details_cursus")->drop(); 
	$result7 = $desinstall->init()->module("com_reference")->revokePermissions(); 

	if($result1 && $result2 && $result3 && $result4 && $result5 && $result6 && $result7)
		return 1;    
	else 
		return 0;    
}