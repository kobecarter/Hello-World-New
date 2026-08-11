<section class="cl-auth">
  <span class="cl-auth-ghost" aria-hidden="true">Secure</span>

  <div class="cl-auth-card">
    <div class="cl-auth-bread">
      <a href="<?php echo $siteURL; ?>"><i class="fa fa-home"></i> <?php echo $lang['CL_HOME'][$_SESSION['lang']]; ?></a>
      <i class="fa fa-chevron-right"></i>
      <span><?php echo $page->getTitre(); ?></span>
    </div>

    <div class="cl-auth-label"><?php echo $lang['CL_SPACE_LABEL'][$_SESSION['lang']]; ?></div>
    <h1 class="cl-auth-title"><?php echo $page->getTitre(); ?></h1>
    <p class="cl-auth-sub"><?php echo $lang['CL_NEWPASS_SUB'][$_SESSION['lang']]; ?></p>

    <?php echo $page->getTexte(); ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=setNewPasswordApi" id="setNewPasswordApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>
      <input type="hidden" name="token" value="<?= $_GET['token'] ?>" required>

      <div class="ct-group">
        <input class="ct-input" type="email" name="email" id="cl-np-email" value="<?= $_GET['email'] ?>" placeholder=" " readonly required>
        <label class="ct-float-label" for="cl-np-email"><?php echo $lang['CL_EMAIL'][$_SESSION['lang']]; ?></label>
        <span class="ct-line"></span>
      </div>

      <div class="ct-group">
        <input class="ct-input" type="password" name="password" id="cl-np-password" placeholder=" " autocomplete="new-password" required>
        <label class="ct-float-label" for="cl-np-password"><?php echo $lang['CL_PASSWORD'][$_SESSION['lang']]; ?></label>
        <span class="ct-line"></span>
      </div>

      <div class="ct-group">
        <input class="ct-input" type="password" name="confirm_password" id="cl-np-confirm" placeholder=" " autocomplete="new-password" required>
        <label class="ct-float-label" for="cl-np-confirm"><?php echo $lang['CL_CONFIRM_PASSWORD'][$_SESSION['lang']]; ?></label>
        <span class="ct-line"></span>
      </div>

      <button type="submit" class="cl-auth-btn"><span><?php echo $lang['CL_SAVE_PASSWORD'][$_SESSION['lang']]; ?></span></button>
      <div class="loading"></div>
    </form>

    <p class="cl-auth-alt">
      <a href="<?= $page_password_recovery->getLink() ?>"><i class="fa fa-unlock-alt"></i> <?php echo $lang['CL_FORGOT_PASSWORD'][$_SESSION['lang']]; ?></a>
    </p>
  </div>
</section>
