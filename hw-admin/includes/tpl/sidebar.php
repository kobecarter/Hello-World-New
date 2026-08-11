<div class="side">
  <div class="sidebar-wrapper">
  <ul>


      <?php
      $ids_modules = module::findAllPosition("side");
      foreach ($ids_modules as $id_module) {
          $m = new module($id_module, $db);
          include_once "components/$id_module/traduction.php";
          $nom = ${"trad_".$id_module}[$id_module][$_SESSION['user']->getLangue()];
          ?>
          <?php if ($_SESSION['user']->hasDroit('view', $m->getIdModule())) { ?>
              <?php if($m->getIdModule() == "com_cart"): ?>
                  <?php
                  $nbrClientsNonVus = client::count(true);
                  $notifs = $nbrClientsNonVus == 0 ? "" : $nbrClientsNonVus;
                  ?>
                  <li class="<?= $m->getIdModule(); ?>">
                      <a href="index.php?option=<?= $m->getIdModule(); ?>" data-toggle="tooltip"
                         data-placement="right" title="" data-original-title="<?= $nom; ?>">
                          <span class="badge cart-notif"><?= $notifs; ?></span>
                          <i class="fa fa-<?= $m->getIcon(); ?>"></i>
                      </a>
                  </li>
              <?php else : ?>
                  <li class="<?= $m->getIdModule(); ?>">
                      <a href="index.php?option=<?= $m->getIdModule(); ?>" data-toggle="tooltip"
                         data-placement="right" title="" data-original-title="<?= $nom; ?>">
                          <i class="fa fa-<?= $m->getIcon(); ?>"></i>
                      </a>
                  </li>
              <?php endif; ?>
          <?php } ?>
          <?php
      }
      ?>
      <li class="com_parrainage">
          <a href="index.php?option=com_parrainage" data-toggle="tooltip"
             data-placement="right" title="" data-original-title="Parrainages">
              <i class="fa fa-handshake-o"></i>
          </a>
      </li>
  </ul>
</div>