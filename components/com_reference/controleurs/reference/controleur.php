<?php

if (isset($task) && !empty($task)) {
    switch ($task) {
        case "loadPortfolio":
            loadPortfolio($_POST);
            break;
    }
}
/* ----------------------------------------- loadPortfolio ----------------------------------------- */
function loadPortfolio($data)
{
	require_once ("../../../includes/traduction.php");
	global $db, $siteURL;
	$itemPerPage = 12;
	if(isset($data['page']) && !empty($data['page'])){
		$page = intval($data['page']);
		$limit = (($page - 1) * $itemPerPage).", $itemPerPage";
				
		$references = reference::findAll($_SESSION['lang'], true,$limit,true);
		foreach($references as $reference){
			?>
			<div class="col-sm-3 px-0">
				<div class="item-portfolio">
					<div class="imgbox">
						<img src="<?php echo $siteURL; ?>images/references/<?php echo $reference->getPhoto(); ?>" alt="">
					</div>
					<div class="title-box">
						<h4><?php echo $reference->getNomClient(); ?></h4>
						<a href="http://<?php echo $reference->getSiteWeb(); ?>" target="_blank"><?php echo $reference->getSiteWeb(); ?></a>
					</div>
					<div class="text-box">
						<h4><?php echo $reference->getNomClient(); ?></h4>
						<a href="http://<?php echo $reference->getSiteWeb(); ?>" target="_blank" class="website"><?php echo $reference->getSiteWeb(); ?></a>
						<p><?php echo $reference->getExtrait(); ?></p>
						<ul class="links">
							<li><a href="http://<?php echo $reference->getSiteWeb(); ?>" target="_blank">Le site</a></li>
							<li><a href="<?php echo $reference->getLink(); ?>">Plus de détail</a></li>
						</ul>
					</div>
				</div>
			</div>
		<?php	
		}
	}
}