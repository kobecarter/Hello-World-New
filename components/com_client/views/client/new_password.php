<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Secure</span>

  <div class="cl-auth-card">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label">Espace client</div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>
    <p class="cl-auth-sub">Choisissez un mot de passe robuste pour sécuriser votre compte.</p>

    <?php echo $page->getTexte(); ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=setNewPasswordApi" id="setNewPasswordApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>
      <input type="hidden" name="token" value="<?= $_GET['token'] ?>" required>

      <div class="ct-group">
        <input class="ct-input" type="email" name="email" id="cl-np-email" value="<?= $_GET['email'] ?>" placeholder=" " readonly required>
        <label class="ct-float-label" for="cl-np-email">Email</label>
        <span class="ct-line"></span>
      </div>

      <div class="ct-group">
        <input class="ct-input" type="password" name="password" id="cl-np-password" placeholder=" " autocomplete="new-password" required>
        <label class="ct-float-label" for="cl-np-password">Mot de passe</label>
        <span class="ct-line"></span>
      </div>

      <div class="ct-group">
        <input class="ct-input" type="password" name="confirm_password" id="cl-np-confirm" placeholder=" " autocomplete="new-password" required>
        <label class="ct-float-label" for="cl-np-confirm">Confirmer le mot de passe</label>
        <span class="ct-line"></span>
      </div>

      <button type="submit" class="cl-auth-btn"><span>Enregistrer le mot de passe</span></button>
      <div class="loading"></div>
    </form>

    <p class="cl-auth-alt">
      <a href="<?= $page_password_recovery->getLink() ?>"><i class="fa fa-unlock-alt"></i> Mot de passe oublié ?</a>
    </p>
  </div>
</section>
