<?php
/* -------------------------------- installation -------------------------------- */
function install_com_galerie()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("galerie")
		->column("cover","VARCHAR(250) NULL") 
		->column("active","INT(3) NULL") 
		->column("date_add", "DATETIME NULL")
		->column("last_edit", "DATETIME NULL")
		->create();    
	
	$result2 = $install->init()        
		->table("details_galerie")        
		->column("id_galerie", "INT NULL")        
		->column("titre", "VARCHAR(250) NULL")    
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()
		->table("galerie_photo")
		->column("id_galerie","INT NULL") 
		->column("photo","VARCHAR(250) NULL")
		->column("ordre","INT NULL")
		->column("date_add", "DATETIME NULL")
		->column("last_edit", "DATETIME NULL")
		->create();    
	
	$result4 = $install->init()        
		->table("details_galerie_photo")        
		->column("id_galerie_photo", "INT NULL")        
		->column("titre", "VARCHAR(250) NULL") 
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result5 = $install->init()->module("com_galerie")->addPermissions();    
	
	if($result1 && $result2 && $result3 && $result4 && $result5)
	{
		$install->init()->file("galerie", "images")->fileCreate();
		return 1;    
	}
	else 
		return 0;    
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_galerie()
{    
	$desinstall = new installation();    

	$result1 = $desinstall->init()->table("galerie")->drop(); 
	$result2 = $desinstall->init()->table("details_galerie")->drop();    
	$result3 = $desinstall->init()->table("galerie_photo")->drop(); 
	$result4 = $desinstall->init()->table("details_galerie_photo")->drop();    
	$result5 = $desinstall->init()->module("com_galerie")->revokePermissions(); 

	if($result1 && $result2 && $result3 && $result4 && $result5)
		return 1;    
	else 
		return 0;    
}