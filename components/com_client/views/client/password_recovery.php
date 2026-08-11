<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Reset</span>

  <div class="cl-auth-card">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['CL_HOME'][$_SESSION['lang']]; ?></a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label"><?php echo $lang['CL_SPACE_LABEL'][$_SESSION['lang']]; ?></div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>
    <p class="cl-auth-sub"><?php echo $lang['CL_RECOVERY_SUB'][$_SESSION['lang']]; ?></p>

    <?php echo $page->getTexte(); ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=verifyEmailApi" id="verifyEmailApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>

      <div class="ct-group">
        <input class="ct-input" type="email" name="email" id="cl-recovery-email" placeholder=" " autocomplete="email" required>
        <label class="ct-float-label" for="cl-recovery-email"><?php echo $lang['CL_EMAIL'][$_SESSION['lang']]; ?></label>
        <span class="ct-line"></span>
      </div>

      <button type="submit" class="cl-auth-btn"><span><?php echo $lang['CL_SEND'][$_SESSION['lang']]; ?></span></button>
      <div class="loading"></div>
    </form>

    <p class="cl-auth-alt">
      <a href="<?= $page_client_space->getLink() ?>"><i class="fa fa-sign-in"></i> <?php echo $lang['CL_BACK_TO_LOGIN'][$_SESSION['lang']]; ?></a>
    </p>
  </div>
</section>
