<?php

/* -------------------------------- installation -------------------------------- */
function install_com_video()
{    $install = new installation();  
     $result1 = $install->init()
                ->table("video")           
                ->column("id_categorie","INT NULL")        
                ->column("video","VARCHAR(100) NULL")
		 		        ->column("photo","VARCHAR(250) NULL") 
                ->column("active","INT(3) NULL")        
                ->column("ordre","INT NULL")        
                ->column("date_add", "DATE NULL")        
                ->column("last_edit", "DATE NULL")        
                ->create();
    $result2 = $install        
               ->init()        
               ->table("details_video")        
               ->column("id_video","INT NULL")  
               ->column("titre", "VARCHAR(250) NULL")      
               ->column("extrait", "VARCHAR(300) NULL")
               ->column("langue", "VARCHAR(3) NULL")        
               ->create();    
               
    $result3 = $install->init()->module("com_video")->addPermissions();   
    if($result1 && $result2 && $result3)
        {       
             $install->init()->file("videos", "images")->fileCreate(); 
               return 1;  
         }
         else 
         {   
            return 0; 
            }
        }
        /* -------------------------------- désinstallation -------------------------------- */
        function desinstall_com_video(){  
              $desinstall = new installation();   
               $result1 = $desinstall->init()->table("video")->drop(); 
                  $result2 = $desinstall->init()->table("details_video")->drop();
                      $result3 = $desinstall->init()->module("com_video")->revokePermissions();
                          if($result1 && $result2 && $result3){     
                                 $desinstall->init()->file("videos", "images")->fileRemove();    
                                     return 1;    } 
                                     else {        
                                         return 0;    }
                                        }
?>