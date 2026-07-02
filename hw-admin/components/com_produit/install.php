<?php
/* -------------------------------- installation -------------------------------- */
function install_com_produit()
{    
	$install = new installation();    
	
	$result1 = $install->init()
		->table("produit")             
		->column("id_categorie", "INT NULL") 
		->column("id_parent", "INT NULL") 
		->column("photo","VARCHAR(250) NULL")        
		->column("photo_banniere","VARCHAR(250) NULL")
		->column("prix","DOUBLE NOT NULL DEFAULT 0")
		->column("devise","VARCHAR(250) NULL")
		->column("url","TEXT NULL")
		->column("active","INT(3) NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result2 = $install->init()        
		->table("details_produit")        
		->column("id_produit","INT NULL")        
		->column("titre", "VARCHAR(250) NULL")        
		->column("sous_titre", "VARCHAR(250) NULL")        
		->column("extrait", "text NULL")        
		->column("texte", "text NULL")        
		->column("seo_titre","VARCHAR(200) NULL")        
		->column("seo_description", "VARCHAR(300) NULL")        
		->column("langue", "VARCHAR(3) NULL")        
		->create(); 
	
	$result3 = $install        ->init()        
		->table("categorie_produit") 
		->column("id_parent","INT NULL")    
		->column("photo","VARCHAR(250) NULL")        
		->column("active","INT(3) NULL")        
		->column("ordre","INT NULL")        
		->column("date_add", "DATE NULL")        
		->column("last_edit", "DATE NULL")        
		->create();    
	
	$result4 = $install        ->init()        
		->table("details_categorie_produit")        
		->column("id_categorie","INT NULL")        
		->column("seo_titre","VARCHAR(200) NULL")        
		->column("seo_description", "VARCHAR(300) NULL")        
		->column("titre", "VARCHAR(250) NULL")        
		->column("langue", "VARCHAR(3) NULL")        
		->create();
	
	$result5 = $install->init()->module("com_produit")->addPermissions();    
	
	if($result1 && $result2 && $result3 && $result4 && $result5)
	{        
		$install->init()->file("produit", "images")->fileCreate();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}
/* -------------------------------- désinstallation -------------------------------- */
function desinstall_com_produit()
{    
	$desinstall = new installation();    
	$result1 = $desinstall->init()->table("produit")->drop();    
	$result2 = $desinstall->init()->table("details_produit")->drop();    
	$result3 = $desinstall->init()->table("categorie_produit")->drop();    
	$result4 = $desinstall->init()->table("details_categorie_produit")->drop();
	
	$result5 = $desinstall->init()->module("com_produit")->revokePermissions();    
	if($result1 && $result2 && $result3 && $result4 && $result5)
	{        
		$desinstall->init()->file("produit", "images")->fileRemove();        
		return 1;    
	} 
	else 
	{        
		return 0;    
	}
}