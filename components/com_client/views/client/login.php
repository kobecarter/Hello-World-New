<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Hello</span>

  <div class="cl-auth-card">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> Accueil</a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label">Hello World Agency</div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>
    <p class="cl-auth-sub">Connectez-vous à votre espace client Hello World.</p>

    <?php echo $page->getTexte(); ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=loginApi" id="loginApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>

      <div class="ct-group">
        <input class="ct-input" type="email" name="email" id="cl-email" placeholder=" " autocomplete="email" required>
        <label class="ct-float-label" for="cl-email">Email</label>
        <span class="ct-line"></span>
      </div>

      <div class="ct-group">
        <input class="ct-input" type="password" name="password" id="cl-password" placeholder=" " autocomplete="current-password" required>
        <label class="ct-float-label" for="cl-password">Mot de passe</label>
        <span class="ct-line"></span>
      </div>

      <button type="submit" class="cl-auth-btn"><span>Se connecter</span></button>
      <div class="loading"></div>
    </form>

    <p class="cl-auth-alt">
      <a href="<?= $page_password_recovery->getLink() ?>"><i class="fa fa-unlock-alt"></i> Mot de passe oublié ?</a>
    </p>
  </div>
</section>
