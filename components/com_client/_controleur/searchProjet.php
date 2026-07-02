<?php
function searchProjet($data){
	global $db;
$key=$data['key'];
$sql = "SELECT id,nom,etat_avancement,date_debut,date_fin from ".__prefixe_db__."projet where nom LIKE  '%{$key}%'  ";
	
	$result = $db->query($sql);
	?>
	<?php foreach($result as $data2) {
						
						$id = $data2['id']; 
						$p = new projet($id,$db);
					 ?>
                      <tr>
                          <td class="p-name">
                              <a href="project_details.html"><?php echo $p->getNom() ;?></a>
                              <br>
                              <small><?php echo $p->getDate_debut() ;?></small>
                          </td>
                        
                          <td class="p-progress">
                              <div class="progress progress-xs">
                                  <div style="width: <?php echo $p->getEtat_avancement();?>%;" class="progress-bar progress-bar-success"></div>
                              </div>
                              <small><?php echo $p->getEtat_avancement();?>% complete</small>
                          </td>
						  
						  <td class="p-name">
                              <?php $id= $p->getId();
							  echo $p->getDate_fin() ;?>
                              
                          </td>
						  
                          <td>
                              <span class="label label-primary">Active</span>
                          </td>
                          <td>
                              <a href="project_details.html"  class="btn btn-warning btn-xs"><i class="fa fa-folder"></i> View </a>

                            <a class="btn btn-primary btn-xs details" id="row_<?php echo $id; ?>" data-toggle="modal" data-target=".bs-example-modal-lg"></i> Document </a>
							  
					          <a href='index.php?option=com_test&task=messagerie&id=<?php echo $id;?>' class="btn btn-success btn-xs"><i class="fa fa-folder"></i> Message </a>   
                          </td>
                      </tr>
	
	<?php
	
}
	?>