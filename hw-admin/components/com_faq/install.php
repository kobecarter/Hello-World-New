<?php
/* -------------------------------- installation -------------------------------- */
function install_com_faq()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("faq")             
		->column("id_service", "INT NULL")        
		->column("active","INT(3) NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result2 = $install->init()        
		->table("details_faq")        
		->column("id_faq","INT NULL")        
		->column("titre", "VARCHAR(250) NULL")            
		->column("texte", "text NULL")            
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()->module("com_faq")->addPermissions();    
	
	if($result1 && $result2 && $result3)
	{        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_faq()
{    
	$desinstall = new installation();    
	$result1 = $desinstall->init()->table("faq")->drop();    

	$result2 = $desinstall->init()->table("details_faq")->drop();    
	$result3 = $desinstall->init()->module("com_faq")->revokePermissions();    
	if($result1 && $result2 && $result3)
	{        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}