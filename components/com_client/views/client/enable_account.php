<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Welcome</span>

  <div class="cl-auth-card cl-auth-status">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label">Espace client</div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>

    <?php echo $page->getTexte(); ?>

    <?php
    if ($client->getId() != 0) {
      $client->setActive(1);
      if ($client->edit()) {
        $_SESSION['client'] = $client;
        ?>
        <div class="alert alert-success">Félicitation !! Votre compte a été activé avec succès.</div>
        <a href="<?php echo $pageAccount->getLink(); ?>" class="cl-auth-btn"><span>Mon compte</span></a>
        <?php
      } else {
        ?>
        <div class="alert alert-danger">Erreur lors de la mise à jour du client.</div>
        <?php
      }
    } else {
      ?>
      <div class="alert alert-danger">Erreur lors de l'exécution de l'opération, compte introuvable.</div>
      <?php
    }
    ?>
  </div>
</section>
