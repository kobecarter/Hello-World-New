<?php
@$task = $_GET['task'];

if(isset($_SESSION['client'])){
include('includes/tpl/sidebar.php');

switch($task)
{
	
	case "login" : login();  break ;
	case "projet": projet(); break;
	case "messagerie": messagerie();break;
	case "newMessage": newMessage();break;
	case "document" : document();break;
	case "temoignage" : temoignage();break;
	case "facture" :facture();break;
	case "mdpOublie": mdpOublie();break;
	case "reinitialisation" : reinitialisation();break;
    case "profil" : profil();break ;
	default : projet();

}
}
else
{ 
switch($task){
	
case "mdpOublie": mdpOublie();break;
case "reinitialisation" : reinitialisation();break;

default:login();
}
}


/* -------------------------------------------- login -------------------------------------------- */
function login(){
global $siteURL;
?>

<section id="page-cms">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
				<h2>Espace <span>client</span></h2>
            </div>
            <div class="col-sm-6 col-sm-offset-3">
                <h3 align="center">Authentification</h3>
                <p align="center">Connectez vous à votre espace client Hello World</p>
                <form action="<?php echo $siteURL; ?>controleurs/main.php?task=login"  id="loginForm" method="post" class="formTemplate">
                    <div class="msgbox"></div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="login" placeholder="login">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="mdp" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Login">
                        <div class="loading"></div>
                    </div>
                </form>
                <p align="center"><a href="index.php?option=com_test&task=mdpOublie"><i class="glyphicon glyphicon-lock sm"></i> Mot de passe oublié ?</a></p>
            </div>
        </div>
    </div>
</section>
<?php
}
/* -------------------------------------------- projet -------------------------------------------- */
function projet(){
global $db,$siteURL;
?>
<script>
$(function(){
	$(".details").click(function(){
        var id = $(this).attr("data-id");
        var order = 'id='+id;

        $.post("<?php echo $siteURL; ?>controleurs/main.php?task=getDetails", order, function(theResponse){
            $("#dialog1 .modal-title").html("Détails");
            $("#dialogContent").html(theResponse);
            $('#dialog1').modal('show');
        });
 })
 
	$(".messages").click(function(){
		var id = $(this).attr("data-id");
		var order = 'id='+id;
		
		$.post("<?php echo $siteURL; ?>controleurs/main.php?task=getMessages", order, function(theResponse){
			$("#dialog1 .modal-title").html("Messages");
			$("#dialogContent").html(theResponse);
			$('#dialog1').modal('show');   
		});
	})
	
	$(".documents").click(function(){
		var id = $(this).attr("data-id");
		var order = 'id='+id;
		
		$.post("<?php echo $siteURL; ?>controleurs/main.php?task=getDocuments", order, function(theResponse){
			$("#dialog1 .modal-title").html("Documents");
			$("#dialogContent").html(theResponse);
			$('#dialog1').modal('show');   
		});
	})

});
</script>
<?php
$id_client = $_SESSION['client']->getId();
$SQLselect = "SELECT * FROM ".__prefixe_db__."projet WHERE fk_client = $id_client";
$result = $db->queryS($SQLselect);
?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12"> 
        
        <!--------->
        
        <h1 class="grey">Projets</h1>
        <header class="panel-heading"> </header>
        
        <table class="table table-hover table-striped table-hw">
          <thead>
            <tr>
              <th>Projet</th>
              <th>Avancement</th>
              <th>Date de livraison</th>
              <th>Etat du projet</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			foreach($result as $data){
			$id = $data["id"];
			$p = new projet($id,$db);
			?>
            <tr>
              <td>
              	<strong><?php echo $p->getNom() ;?></strong><br>
                <small><?php  echo normaldate($p->getDate_debut()) ;?></small>
              </td>
              <td>
              	<div class="progress progress-xs">
                  <div style="width: <?php echo $p->getEtat_avancement();?>%;" class="progress-bar progress-bar-success"></div>
                </div>
                <small><?php echo $p->getEtat_avancement();?>% complete</small></td>
              <td><i class="fa fa-calendar"></i> <?php echo normaldate($p->getDate_fin());?></td>
              <td><span class="label label-warning">En cours</span></td>
              <td>
              	<a href="javascript:void(0)" class="btn btn-hw btn-xs details" data-id="<?php echo $id;?>"><i class="fa fa-eye"></i> Détails </a>
                <a href="javascript:void(0)" class="btn btn-hw btn-xs documents" data-id="<?php echo $id;?>"><i class="fa fa-file"></i> Documents </a> 
                <a href="javascript:void(0)" data-id="<?php echo $id;?>" class="btn btn-info btn-xs messages"><i class="fa fa-comments"></i> Message </a>
                <?php
				  $id_domaine = $p->getFk_nom_domaine(); 
			   	  $nd = new nom_domaine($id_domaine,$db);
				  if($nd->getFTP() != ''){
					$disabled = ""; 
					$url = $siteURL.'components/com_client/controleur/download.php?file='.$nd->getFTP();
				  }
				  else{
					$disabled = 'disabled="disabled"';
					$url = 'javascript:void(0)';
				  }
					?>
                <a href='<?php echo $siteURL; ?>' class="btn btn-info btn-xs" <?php echo $disabled; ?> ><i class="fa fa-download"></i> les acces FTP </a></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- modal -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" id="dialog1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Documents</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" id="dialogContent"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" id="dialog2" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Discussion</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" id="dialogContent"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } 

/* -------------------------------------------- messagerie -------------------------------------------- */
function messagerie(){
global $db, $siteURL;
?>
<script>
$(function(){
	
	$(".discussion").click(function(){
		var id = $(this).attr("data-id");
		var order = 'id='+id;
		
		$.post("<?php echo $siteURL; ?>controleurs/main.php?task=getDiscussion", order, function(theResponse){
			$("#dialogContent").html(theResponse);
			$('#dialog1').modal('show');   
		});
	})
 
}) 
</script>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12"> 
        <h1 class="grey">Messages</h1>
            <form action="" method="post" class="formTemplate searchForm">
              <div class="row">
                <div class="col-sm-10">
                  <input type="text" name="keyword" value="<?php if(isset($_POST["keyword"])) echo $_POST["keyword"]; ?>" placeholder="Recherche ..." class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="submit" value="Go!">
                </div>
                <div class="col-sm-12"><div class="sep"></div></div>
              </div>
            </form>
        <table class="table table-hover table-striped table-hw">
          <thead>
            <tr>
              <th>Département</th>
              <th>Objet</th>
              <th>Contenu </th>
              <th>Date</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
			$claus = '';
			if(isset($_POST["keyword"]) && !empty($_POST["keyword"])){
				$keyword = GetSQLValueString('%'.$_POST["keyword"].'%', "text");
				$claus = " AND (A.titre LIKE $keyword OR A.contenu LIKE $keyword)";	
			}
			$id_client = $_SESSION["client"]->getId();
			$SQLselect = "SELECT A.id FROM ".__prefixe_db__."message A
						  JOIN ".__prefixe_db__."projet B ON A.fk_projet = B.id
						  WHERE fk_client = $id_client
						  AND id_parent = 0
						  $claus
						  ORDER BY date_message DESC";
			//echo $SQLselect;
			$result = $db->queryS($SQLselect);
			foreach($result as $data){
				$msg = new message($data["id"],$db);
				$d = new departement($msg->getIdDepartement(),$db);
			?>
            <tr>                
              <td><?php echo $d->getNom() ;  ?></td>
              <td><?php echo $msg->getTitre();?></td>
              <td><?php echo substr($msg->getContenu(),0,80).'...'; ?></td>
              <td class="p-name"><?php echo normaldate(substr($msg->getDate(),0,10)).' '.substr($msg->getDate(),11,5); ?></td>
              <td>
              	<a class="btn btn-hw btn-xs discussion" data-id="<?php echo $msg->getId(); ?>"><i class="fa fa-comments"></i> Discussion </a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="dialog1" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Discussion</h4>
      </div>
      <div class="modal-body">
        <div class="container-fluid" id="dialogContent">
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php }

/* -------------------------------------------- newMessage -------------------------------------------- */
function newMessage(){
global $db,$siteURL;
$c = $_SESSION['client'];
?>
<script>
$(function(){
	
	$(".add-file").click(function(){
		$(".input-box").append('<div class="col-sm-6 col-md-4 form-group"><input type="file" name="userfile[]" /><a href="javascript:void(0)" class="remove-file" ><i class="fa fa-times"></i></a></div>');
	});

});
</script>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12" >
        <div class="msgbox"></div>
        <h1 class="grey" >Nouveau Message</h1>
        <form class="formTemplate" id="msgform" enctype="multipart/form-data" method="post" action="<?php echo $siteURL; ?>controleurs/main.php?task=newMessage">
          <div class="msgbox"></div>
          <div class="row">
              <div class="form-group col-sm-6">
                <select name="projet" class="form-control">
                  <option value="">Projet</option>
                  <?php 
                    $SQLselect = "SELECT id from ".__prefixe_db__."projet WHERE fk_client = ".$c->getId();
                    $result = $db->queryS($SQLselect);
                    foreach($result as $data){
                        $p = new projet($data['id'],$db);
                    ?>
                    <option value="<?php echo $p->getId(); ?>"><?php echo $p->getNom(); ?></option>
                    <?php } ?>
                </select>
              </div>
              
              <div class="form-group col-sm-6">
                <select  name="departement" class="form-control">
                	<option value="">Département</option>
                  <?php 
					$SQLselect = "SELECT id FROM ".__prefixe_db__."departement";
					$result = $db->queryS($SQLselect);
					foreach($result as $data){
						$d = new departement($data['id'],$db);
						?>
                  		<option value="<?php echo $d->getId(); ?>"><?php echo $d->getNom(); ?></option>
                    <?php
                    } 
					?>
                </select>
              </div>
              
              <div class="form-group col-sm-12">
                <input name="objet" placeholder="Objet" type="text" class="form-control">
              </div>
              
              <div class="form-group col-sm-12">
                <textarea class="form-control" name="message" placeholder="Message" rows="5"></textarea>
              </div>
          </div>
          
			<a class="btn btn-default btn-sm pull-right add-file" href="javascript:void(0)"><i class="fa fa-file"></i> Attacher des fichiers</a>
			<div class="clearfix"></div>
			<div class="row input-box">
				<div class="col-sm-6 col-md-4 form-group">
                	<input type="file" name="userfile[]" />
                    <a href="javascript:void(0)" class="remove-file" ><i class="fa fa-times"></i></a>
                </div>
			</div>

          <div class="form-group">
            <input id="title" name="valider" type="submit" class="btn btn-danger btn-block">
            <div class="loading"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php
 }

/* -------------------------------------------- document -------------------------------------------- */
function document(){
global $db,$siteURL;
?>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12" > 
        <h1 class="grey" >Documents</h1>
        <form action="" method="post" class="formTemplate searchForm">
            <div class="row">
                <div class="col-sm-10">
                  <input type="text" name="keyword" value="<?php if(isset($_POST["keyword"])) echo $_POST["keyword"]; ?>" placeholder="Recherche" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="submit" value="Go!">
                </div>
                <div class="col-sm-12"><div class="sep"></div></div>
            </div>
        </form>
            
        <?php
		$docExt = array("doc","docx","DOC","DOCX"); 
		$ExlExt = array("xlsx","XLSX","csv","CSV");
		$pdfExt = array("pdf","PDF"); 
		$zipExt = array("zip","ZIP","rar","RAR"); 
		$imgEXt = array("jpg","gif","jpeg","png","JPG");
		
		$claus = '';
		if(isset($_POST["keyword"]) && !empty($_POST["keyword"])){
			$keyword = GetSQLValueString('%'.$_POST["keyword"].'%', "text");
			$claus = " AND (A.nom LIKE $keyword OR A.message LIKE $keyword)";	
		}
		
		$SQLselect = "SELECT A.id FROM ".__prefixe_db__."file A
					  JOIN ".__prefixe_db__."projet B ON A.fk_projet = B.id 
					  WHERE B.fk_client = ".$_SESSION["client"]->getId()."
					  $claus
					  ORDER BY date_add DESC
					  ";
		$result = $db->queryS($SQLselect);
		foreach($result as $data){ 
		$f = new fil($data['id'],$db);
		$p = new projet($f->getIdProjet(),$db);
		
		$extension=explode(".",$f->getNom());
		 
		if(in_array($extension[1],$docExt)) $class = "file-word-o";
		elseif(in_array($extension[1], $imgEXt)) $class = "file-photo-o";
		elseif(in_array($extension[1], $ExlExt)) $class = "file-excel-o";
		elseif(in_array($extension[1], $pdfExt)) $class = "file-pdf-o";
		elseif(in_array($extension[1], $zipExt)) $class = "file-zip-o";
		else $class = "file" ;

		?>
        <div class="col-md-3 doc-item">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3"><i class="fa fa-<?php echo $class; ?>"></i></div>
                        <div class="col-xs-9 text-right comment">
                            <?php echo $f->getMessage(); ?>
                        </div>
                    </div>
                </div>
                <a href="<?php echo $siteURL; ?>controleurs/main.php?task=downloadFile&file=<?php echo $f->getIdEncode(); ?>">
                    <div class="panel-footer">
                        <div class="pull-left"><?php echo $f->getNom(); ?> </div>
                        <div class="pull-right"><i class="glyphicon glyphicon-circle-arrow-down"></i></div>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>
<?php }

/* -------------------------------------------- temoignage -------------------------------------------- */
function temoignage(){
global $db,$siteURL;
?>
<script>                
$(".alert").addClass("in").fadeOut(3500);
// starrr plugin (https://github.com/dobtco/starrr)
var __slice = [].slice;

(function($, window) {
  var Starrr;

  Starrr = (function() {
    Starrr.prototype.defaults = {
      rating: void 0,
      numStars: 5,
      change: function(e, value) {}
    };

    function Starrr($el, options) {
      var i, _, _ref,
        _this = this;

      this.options = $.extend({}, this.defaults, options);
      this.$el = $el;
      _ref = this.defaults;
      for (i in _ref) {
        _ = _ref[i];
        if (this.$el.data(i) != null) {
          this.options[i] = this.$el.data(i);
        }
      }
      this.createStars();
      this.syncRating();
      this.$el.on('mouseover.starrr', 'span', function(e) {
        return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('mouseout.starrr', function() {
        return _this.syncRating();
      });
      this.$el.on('click.starrr', 'span', function(e) {
        return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
      });
      this.$el.on('starrr:change', this.options.change);
    }

    Starrr.prototype.createStars = function() {
      var _i, _ref, _results;

      _results = [];
      for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
        _results.push(this.$el.append("<span class='fa fa-star-o'></span>"));
      }
      return _results;
    };

    Starrr.prototype.setRating = function(rating) {
      if (this.options.rating === rating) {
        rating = void 0;
      }
      this.options.rating = rating;
      this.syncRating();
      return this.$el.trigger('starrr:change', rating);
    };

    Starrr.prototype.syncRating = function(rating) {
      var i, _i, _j, _ref;

      rating || (rating = this.options.rating);
      if (rating) {
        for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
          this.$el.find('span').eq(i).removeClass('fa-star-o').addClass('fa-star');
        }
      }
      if (rating && rating < 5) {
        for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
          this.$el.find('span').eq(i).removeClass('fa-star').addClass('fa-star-o');
        }
      }
      if (!rating) {
        return this.$el.find('span').removeClass('fa-star').addClass('fa-star-o');
      }
    };

    return Starrr;

  })();
  return $.fn.extend({
    starrr: function() {
      var args, option;

      option = arguments[0], args = 2 <= arguments.length ? __slice.call(arguments, 1) : [];
      return this.each(function() {
        var data;

        data = $(this).data('star-rating');
        if (!data) {
          $(this).data('star-rating', (data = new Starrr($(this), option)));
        }
        if (typeof option === 'string') {
          return data[option].apply(data, args);
        }
      });
    }
  });
})(window.jQuery, window);

$(function() {
  return $(".starrr").starrr();
});

$( document ).ready(function() {
      
  <?php
	$SQLselect = "SELECT id FROM ".__prefixe_db__."departement";
	$result = $db->queryS($SQLselect);
	foreach($result as $data){
		$d = new departement($data['id'],$db);
  ?>
  $('#stars<?php echo $d->getId(); ?>').on('starrr:change', function(e, value){
      $('#count').html(value);
	  $('.rating<?php echo $d->getId(); ?>').val(value);
    $('.alert').removeClass('hide').show().delay(1000).addClass("in").fadeOut(3500);
  });
 <?php } ?>   
});                  
</script>
<style>
.starrr{
	color:#680262;
}
.starrr span{
	cursor:pointer;
	font-size:22px;
	padding:0 3px;
}
.starrr span:hover,
.starrr span.fa-star{
	color:#08c3df;
}
</style>
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-12" id="testimonials">
        <h1 class="grey" >Témoignages</h1>
        <?php if($_SESSION['client']->HasTestimonial()):?>
        	<?php $t = $_SESSION['client']->getTestimonial();?>
              <div class="item row">
                <div class="col-sm-5">
                    <div class="testimonial-infos">
                        <div class="autor-photo">
                            <img src="<?php echo $siteURL; ?>images/clients/<?php echo $_SESSION['client']->getLogo(); ?>" />
                        </div>
                        <div class="autor-info">
                            <span class="autor"><?php echo $t->getNom(); ?></span><br />
                            <span class="profession"><?php echo $t->getFonction(); ?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="col-sm-7">
                    <div class="testimonial-text">
                        <h4><?php echo $t->getSujet(); ?></h4>
                        <p><?php echo nl2br($t->getTemoignage()); ?></p>
                    </div>
                </div>
              </div>
        <?php endif; ?>
        <div class="clearfix"></div>
        <div class="sep"></div>
        <form class="formTemplate" enctype="multipart/form-data" method="post" id="testimonialForm" action="<?php echo $siteURL; ?>controleurs/main.php?task=addTemoignage">
          <div class="msgbox"></div>
          
          <div class="row">
              <div class="form-group col-sm-6">
                <input type="text" name="fonction" placeholder="Fonction" class="form-control" value="<?php if($_SESSION['client']->HasTestimonial()) echo $t->getFonction(); ?>" />
              </div>
              
              <div class="form-group col-sm-6">
                <input type="text" name="sujet" placeholder="Objet" class="form-control" value="<?php if($_SESSION['client']->HasTestimonial()) echo $t->getSujet(); ?>" />
              </div>
          </div>
          <div class="form-group">
            <textarea class="form-control" placeholder="Témoignages" name="temoignage" rows="5"><?php if($_SESSION['client']->HasTestimonial()) echo $t->getTemoignage(); ?></textarea>
          </div>
          <?php
			$SQLselect = "SELECT id FROM ".__prefixe_db__."departement";
			$result = $db->queryS($SQLselect);
			foreach($result as $data){
				$d = new departement($data['id'],$db);
		  ?>
          <div class="row">
            <input type="hidden" value="" class="rating<?php echo $d->getId(); ?>" name="depart<?php echo $d->getId(); ?>" >
            <span class="col-sm-2" >
            <label for="title "><?php echo $d->getNom(); ?></label>
            </span>
            <div class="col-sm-10">
              <div class="row">
                  <div id="stars<?php echo $d->getId(); ?>" class="starrr"></div>
              </div>
              </br>
            </div>
          </div>
          <?php } ?>
          <div class="form-group">
            <input id="title" name="valider" type="submit" class="btn">
            <div class="loading"></div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php	 
 }
/* -------------------------------------------- facture -------------------------------------------- */
function facture(){
global $db,$siteURL;

$id_client = $_SESSION['client']->getId();

$claus = '';
if(isset($_POST["keyword"]) && !empty($_POST["keyword"])){
	$keyword = GetSQLValueString('%'.$_POST["keyword"].'%', "text");
	$claus = " AND numero LIKE $keyword";	
}
$SQLselect = "SELECT id FROM ".__prefixe_db__."facture WHERE fk_client = $id_client $claus";
?>
<div class="col-sm-12"> 
  
  <!--------->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-12" >
          <h1 class="grey">Factures</h1>
        <form action="" method="post" class="formTemplate searchForm">
            <div class="row">
                <div class="col-sm-10">
                  <input type="text" name="keyword" value="<?php if(isset($_POST["keyword"])) echo $_POST["keyword"]; ?>" placeholder="Recherche" class="form-control">
                </div>
                <div class="col-sm-2">
                  <input type="submit" value="Go!">
                </div>
                <div class="col-sm-12"><div class="sep"></div></div>
            </div>
        </form>
        <table class="table table-hover table-striped table-hw">
            <thead>
              <tr>
                <th>Facture</th>
                <th>Date</th>
                <th>Projets</th>
                <th>Montant </th>
                <th>Reste</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
			  	$total = 0;
				$total_reste = 0;
				$result = $db->queryS($SQLselect);
				foreach($result as $data) {
					$f = new facture($data['id'],$db);
					$total += $f->getMontant();
					$total_reste += $f->getReste();
				?>
              <tr>
                <td>N° <?php echo $f->getNumero();?></td>
                <td><?php echo normaldate($f->getDate());?></td>
                <td>
				<?php 
				$projets = $f->getProjets();
				if(is_array($projets)){
					foreach($projets as $projet){
						$p = new projet($projet["fk_projet"],$db);
						echo $p->getNom(); ?> <small>(<?php echo normaldate($p->getDate_debut()) ;?>)</small><br>
                    <?php	
					}	
				}
				?>
                </td>
                <td><?php echo number_format($f->getMontant(), 2, ',', ' ')." Dhs"; ?></td>
                <td><?php echo number_format($f->getReste(), 2, ',', ' ')." Dhs"; ?></td>
                <td>
				<?php $disabled = $f->getReste() > 0 ? 'disabled="disabled"' : ''; ?>
                <?php $file = base64_encode('Hello'.$f->getFichier().'World'); ?>
                  <a href="<?php echo $siteURL; ?>controleurs/main.php?task=downloadFile&invoice=<?php echo $file; ?>" class="btn btn-danger btn-xs" <?php echo $disabled; ?> >télécharger </a></td>
              </tr>
              <?php } ?>
              <tr  style="background: #EEE;">
                <td colspan="2"></td>
                <td>Total</td>
                <td><?php echo number_format($total, 2, ',', ' '); ?> Dhs</td>
                <td><?php echo number_format($total_reste, 2, ',', ' '); ?> Dhs</td>
                <td></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  <?php
}

function mdpOublie(){
global $siteURL ;	 ?>

  <form action="<?php echo $siteURL; ?>controleurs/main.php?task=mdpOublie"  id="contactClientForm1" method="post">
    <div class="login-container animated fadeInDown bootstrap snippets">
    <div class="loginbox bg-white">
    <div class="msgbox"></div>
    <div class="loginbox-title">Sign In </div>
    <div class="loginbox-social">
      <div class="social-title ">Rechercher votre compte </div>
    </div>
    <div class="loginbox-or">
      <div class="or-line"></div>
      <div class="or"></div>
    </div>
    <div class="loginbox-textbox">
      <input type="text" class="form-control" name="login" placeholder="login ou Email">
    </div>
    <div class="loginbox-submit">
      <input type="submit" class="btn btn-primary btn-block" value="reinitialiser">
    </div>
  </form>
</div>
</div>
<?php }
 function reinitialisation(){
	 global $siteURL ;
	 ?>
<form action="<?php echo $siteURL; ?>controleurs/main.php?task=nvpassword"  id="contactClientForm2" method="post">
  <div class="login-container animated fadeInDown bootstrap snippets">
  <div class="loginbox bg-white">
  <div class="msgbox"></div>
  <div class="loginbox-title">Sign In </div>
  <div class="loginbox-social">
    <div class="social-title ">reinitialiser votre mot de passe </div>
  </div>
  <div class="loginbox-or">
    <div class="or-line"></div>
    <div class="or"></div>
  </div>
  <div class="loginbox-textbox">
    <input type="text" class="form-control" name="pswd1" placeholder="nouveau password">
  </div>
  <div class="loginbox-textbox">
    <input type="text" class="form-control" name="pswd2" placeholder="confirmer votre password">
    <input type="hidden" name="id_client" value=<?php echo $_GET['id'] ;?> >
  </div>
  <div class="loginbox-submit">
    <input type="submit" class="btn btn-primary btn-block" value="reinitialiser">
  </div>
</form>
</div>
</div>
<?php }
/* -------------------------------------------- profil -------------------------------------------- */
function profil(){
global $db,$siteURL ;
$c = new client($_SESSION['client']->getId(),$db);
?>

<div class="container">
  <div class="row">
  	<div class="col-sm-12"><h1 class="grey">Profil</h1></div>
  	<div class="col-sm-3">
    	<img src="<?php echo $siteURL; ?>images/clients/<?php echo $c->getLogo();?>" alt="<?php echo $c->getNom(); ?>" class=" img-responsive">
    </div>
    <div class="col-sm-9">
    	<form action="<?php echo $siteURL; ?>controleurs/main.php?task=editProfil" id="profilForm" method="post" class="formTemplate">
        	  <div class="msgbox"></div>
              <div class="row">
              	<div class="col-sm-3"><label>Nom</label></div>
              	<div class="form-group col-sm-9">
                	<input type="text" name="nom" value="<?php echo $c->getNom();?>" class="form-control" />
              	</div>
              </div>
              
              <div class="row">
              	<div class="col-sm-3"><label>Prénom</label></div>
              	<div class="form-group col-sm-9">
                	<input type="text" name="prenom" value="<?php echo $c->getPrenom();?>" class="form-control" />
              	</div>
              </div>
              
              <div class="row">
              	<div class="col-sm-3"><label>Email</label></div>
              	<div class="form-group col-sm-9">
                	<input type="text"   name="email" value="<?php echo $c->getEmail();?>" class="form-control" />
              	</div>
              </div>
              
              <div class="row">
              	<div class="col-sm-3"><label>Téléphone</label></div>
              	<div class="form-group col-sm-9">
                	<input type="text"   name="telephone" value="<?php echo $c->getTelephone();?>" class="form-control" />
              	</div>
              </div>
              
              <div class="row">
              	<div class="col-sm-3"><label>Login</label></div>
              	<div class="form-group col-sm-9">
                	<input type="text" name="login" value="<?php echo $c->getLogin();?>" class="form-control" disabled="disabled" />
              	</div>
              </div>
              
              <div class="row">
              	<div class="col-sm-3"><label>Mot de passe</label></div>
              	<div class="form-group col-sm-9">
                	<input type="password" name="password" class="form-control" placeholder="Laissez vide s'il n'y a pas de changement" />
              	</div>
              </div>
              
              <div class="form-group">
                <input type="submit" class="btn btn-block btn-success"  value="Mettre à jour" >
                <div class="loading"></div>
              </div>
        </form>
    </div>
    
  </div>
</div>
<?php }
	
  
?>
</body></html>