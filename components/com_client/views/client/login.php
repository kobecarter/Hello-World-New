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

    <?php
      $__googleOn   = defined('GOOGLE_CLIENT_ID') && GOOGLE_CLIENT_ID !== '';
      $__facebookOn = defined('FACEBOOK_APP_ID')  && FACEBOOK_APP_ID  !== '';
    ?>
    <?php if ($__googleOn || $__facebookOn) : ?>
    <div class="cl-social">
      <div class="msgbox cl-social-msg"></div>
      <?php if ($__googleOn) : ?>
      <div id="clGoogleBtn" class="cl-social-google"></div>
      <?php endif; ?>
      <?php if ($__facebookOn) : ?>
      <button type="button" class="cl-social-btn cl-social-fb" id="clFacebookBtn">
        <i class="fa fa-facebook"></i> <span><?php echo $lang['CL_CONTINUE_FACEBOOK'][$_SESSION['lang']]; ?></span>
      </button>
      <?php endif; ?>
    </div>
    <div class="cl-auth-divider"><span><?php echo $lang['CL_OR'][$_SESSION['lang']]; ?></span></div>
    <?php endif; ?>

    <form action="<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=loginApi" id="loginApiForm" method="post" class="cl-auth-form formTemplate">
      <div class="msgbox"></div>

      <div class="ct-group">
        <input class="ct-input" type="text" name="login" id="cl-login" placeholder=" " autocomplete="username" required>
        <label class="ct-float-label" for="cl-login">Identifiant</label>
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

<?php if ($__googleOn || $__facebookOn) : ?>
<script>
/* Connexion sociale — envoi du jeton fournisseur au proxy, puis rechargement
   (comme le login classique : la session posée fait apparaître le dashboard). */
/* Messages traduits selon la langue de l'utilisateur, mappés sur le "code"
   stable renvoyé par le CRM (indépendant de la langue). */
var CL_SOCIAL_MSG = {
	no_account:       <?php echo json_encode($lang['CL_SOCIAL_NO_ACCOUNT'][$_SESSION['lang']]); ?>,
	email_unverified: <?php echo json_encode($lang['CL_SOCIAL_EMAIL_UNVERIFIED'][$_SESSION['lang']]); ?>,
	not_configured:   <?php echo json_encode($lang['CL_SOCIAL_NOT_CONFIGURED'][$_SESSION['lang']]); ?>,
	verify_failed:    <?php echo json_encode($lang['CL_SOCIAL_VERIFY_FAILED'][$_SESSION['lang']]); ?>,
	invalid_token:    <?php echo json_encode($lang['CL_SOCIAL_INVALID_TOKEN'][$_SESSION['lang']]); ?>,
	missing:          <?php echo json_encode($lang['CL_SOCIAL_MISSING'][$_SESSION['lang']]); ?>
};
var CL_SOCIAL_ERR = <?php echo json_encode($lang['CL_SOCIAL_ERROR'][$_SESSION['lang']]); ?>;
var CL_SOCIAL_OK  = <?php echo json_encode($lang['CL_SOCIAL_SUCCESS'][$_SESSION['lang']]); ?>;
window.clSocialPost = function (url, payload) {
	var box = document.querySelector('.cl-social-msg');
	var body = new URLSearchParams(payload).toString();
	fetch(url, { method: 'POST', headers: { 'Content-Type': 'application/x-www-form-urlencoded' }, body: body })
		.then(function (r) { return r.text(); })
		.then(function (t) {
			var data; try { data = JSON.parse(t); } catch (e) { data = { icon: 'error' }; }
			if (data.icon === 'success') {
				if (box) box.innerHTML = '<div class="alert alert-success">' + CL_SOCIAL_OK + '</div>';
				setTimeout(function () { document.location.reload(); }, 900);
			} else if (box) {
				var msg = (data.code && CL_SOCIAL_MSG[data.code]) || data.message || CL_SOCIAL_ERR;
				box.innerHTML = '<div class="alert alert-warning">' + msg + '</div>';
			}
		})
		.catch(function () { if (box) box.innerHTML = '<div class="alert alert-danger">' + CL_SOCIAL_ERR + '</div>'; });
};
</script>
<?php endif; ?>

<?php if ($__googleOn) : ?>
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
(function () {
	window.clHandleGoogle = function (response) {
		if (!response || !response.credential) return;
		window.clSocialPost('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=googleLoginApi', { credential: response.credential });
	};
	function initGoogle() {
		if (!(window.google && google.accounts && google.accounts.id)) { return setTimeout(initGoogle, 300); }
		google.accounts.id.initialize({ client_id: '<?php echo GOOGLE_CLIENT_ID; ?>', callback: window.clHandleGoogle });
		var el = document.getElementById('clGoogleBtn');
		if (el) {
			var w = Math.min(Math.max(el.offsetWidth || 320, 200), 400);
			google.accounts.id.renderButton(el, { theme: 'outline', size: 'large', type: 'standard', text: 'continue_with', shape: 'pill', logo_alignment: 'center', width: w, locale: '<?php echo $_SESSION['lang']; ?>' });
		}
	}
	if (document.readyState !== 'loading') { initGoogle(); } else { window.addEventListener('DOMContentLoaded', initGoogle); }
})();
</script>
<?php endif; ?>

<?php if ($__facebookOn) : ?>
<script>
(function () {
	var loc = '<?php echo $_SESSION['lang']; ?>' === 'fr' ? 'fr_FR' : ('<?php echo $_SESSION['lang']; ?>' === 'ar' ? 'ar_AR' : 'en_US');
	window.fbAsyncInit = function () { FB.init({ appId: '<?php echo FACEBOOK_APP_ID; ?>', cookie: true, xfbml: false, version: 'v19.0' }); };
	(function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = 'https://connect.facebook.net/' + loc + '/sdk.js'; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'facebook-jssdk'));
	var btn = document.getElementById('clFacebookBtn');
	if (btn) btn.addEventListener('click', function () {
		if (!window.FB) return;
		FB.login(function (resp) {
			if (resp && resp.authResponse && resp.authResponse.accessToken) {
				window.clSocialPost('<?php echo $siteURL; ?>components/com_client/controleurs/router.php?task=facebookLoginApi', { access_token: resp.authResponse.accessToken });
			}
		}, { scope: 'email' });
	});
})();
</script>
<?php endif; ?>
