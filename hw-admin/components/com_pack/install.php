<?php
/* -------------------------------- installation -------------------------------- */
function install_com_pack()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("pack")             
		->column("id_service","VARCHAR(250) NULL")        
		->column("prix", "DOUBLE NULL")        
		->column("ordre", "INT NULL")        
		->column("active","INT(3) NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result2 = $install->init()        
		->table("details_pack")        
		->column("id_pack","INT NULL")        
		->column("titre", "VARCHAR(250) NULL")        
		->column("description", "text NULL")        
		->column("details","text NULL")      
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()->module("com_pack")->addPermissions();    
	
	if($result1 && $result2 && $result3)
		return 1;    
	else 
		return 0;    
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_pack()
{    
	$desinstall = new installation();    

	$result1 = $desinstall->init()->table("pack")->drop(); 
	$result2 = $desinstall->init()->table("details_pack")->drop();    
	$result3 = $desinstall->init()->module("com_pack")->revokePermissions(); 

	if($result1 && $result2 && $result3)
		return 1;    
	else 
		return 0;    
}