<?php
/* -------------------------------- installation -------------------------------- */
function install_com_job(){    
	$install = new installation();    
	
	$result1 = $install->init()->table("job")
		->column("photo","VARCHAR(250) NULL")
		->column("ordre", "INT NULL")
		->column("active","INT(3) NULL")
		->column("date_add", "DATE NULL")
		->column("last_edit", "DATE NULL")
		->create();    
	
	$result2 = $install->init()->table("details_job")
		->column("id_job","INT NULL")       
		->column("titre", "VARCHAR(250) NULL")        
		->column("description", "text NULL")        
		->column("langue", "VARCHAR(3) NULL")        
		->create();    
	
	$result3 = $install->init()->module("com_job")->addPermissions();    
	
	if($result1 && $result2 && $result3){ 
		$install->init()->file("jobs", "images")->fileCreate();        
		return 1;    
	} else {        
		return 0;    
	}
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_job(){
	$desinstall = new installation();    
	$result1 = $desinstall->init()->table("job")->drop();    
	$result2 = $desinstall->init()->table("details_job")->drop();    
	$result3 = $desinstall->init()->module("com_job")->revokePermissions();    
	if($result1 && $result2 && $result3){        
		$desinstall->init()->file("job", "images")->fileRemove();        
		return 1;    
	} else {        
		return 0;    
	}
}

