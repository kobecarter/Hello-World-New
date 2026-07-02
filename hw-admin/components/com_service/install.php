<?php
/* -------------------------------- installation -------------------------------- */
function install_com_service()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("service") 
		->column("slug", "VARCHAR(100) NULL")  
		->column("id_parent", "INT NULL")        
		->column("id_slider", "INT NULL")        
		->column("photo","VARCHAR(250) NULL")        
		->column("photo_banniere","VARCHAR(250) NULL")
		->column("ordre", "INT NULL")  
		->column("active","INT(3) NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result2 = $install->init()        
		->table("details_service")        
		->column("id_service","INT NULL")        
		->column("titre", "VARCHAR(250) NULL")        
		->column("sous_titre", "VARCHAR(250) NULL")        
		->column("texte_accueil", "text NULL")        
		->column("extrait", "text NULL")        
		->column("texte", "text NULL")        
		->column("seo_titre","VARCHAR(200) NULL")        
		->column("seo_description", "VARCHAR(300) NULL")        
		->column("seo_keyword", "VARCHAR(300) NULL")        
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()->module("com_service")->addPermissions();    
	
	if($result1 && $result2 && $result3)
	{        
		$install->init()->file("services", "images")->fileCreate();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_service()
{    
	$desinstall = new installation();    
	$result1 = $desinstall->init()->table("service")->drop();    

	$result2 = $desinstall->init()->table("details_service")->drop();    
	$result3 = $desinstall->init()->module("com_service")->revokePermissions();    
	if($result1 && $result2 && $result3)
	{        
		$desinstall->init()->file("services", "images")->fileRemove();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}