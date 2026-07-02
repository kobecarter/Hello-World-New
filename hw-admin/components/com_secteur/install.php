<?php
/* -------------------------------- installation -------------------------------- */
function install_com_secteur()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("secteur")             
		->column("id_service", "INT NULL")        
		->column("photo","VARCHAR(250) NULL")        
		->column("photo_banniere","VARCHAR(250) NULL")
		->column("active","INT(3) NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result2 = $install->init()        
		->table("details_secteur")        
		->column("id_secteur","INT NULL")        
		->column("titre", "VARCHAR(250) NULL")
		->column("slug", "VARCHAR(250) NULL")
		->column("sous_titre", "VARCHAR(250) NULL")        
		->column("extrait", "text NULL")        
		->column("texte", "text NULL")        
		->column("seo_titre","VARCHAR(200) NULL")        
		->column("seo_description", "VARCHAR(300) NULL")        
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()->module("com_secteur")->addPermissions();    
	
	if($result1 && $result2 && $result3)
	{        
		$install->init()->file("secteur", "images")->fileCreate();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_secteur()
{    
	$desinstall = new installation();    
	$result1 = $desinstall->init()->table("secteur")->drop();    

	$result2 = $desinstall->init()->table("details_secteur")->drop();    
	$result3 = $desinstall->init()->module("com_secteur")->revokePermissions();    
	if($result1 && $result2 && $result3)
	{        
		$desinstall->init()->file("secteur", "images")->fileRemove();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}