<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Reset</span>

  <div class="cl-auth-card">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label">Espace client</div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>
    <p class="cl-auth-sub">Saisissez votre email pour recevoir les instructions de réinitialisation de votre mot de passe.</p>

    <?php echo $page->getTexte(); ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=verifyEmailApi" id="verifyEmailApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>

      <div class="ct-group">
        <input class="ct-input" type="email" name="email" id="cl-recovery-email" placeholder=" " autocomplete="email" required>
        <label class="ct-float-label" for="cl-recovery-email">Email</label>
        <span class="ct-line"></span>
      </div>

      <button type="submit" class="cl-auth-btn"><span>Envoyer</span></button>
      <div class="loading"></div>
    </form>

    <p class="cl-auth-alt">
      <a href="<?= $page_client_space->getLink() ?>"><i class="fa fa-sign-in"></i> Retour à la connexion</a>
    </p>
  </div>
</section>
