<?php
if (isset($u)) {
    $action = "components/com_users/controleur/user.php?task=editUser";
    $task = "edit";
    $bt = $trad_com_users['MODIFIER_USER'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_users/controleur/user.php?task=addUser";
    $task = "add";
    $bt = $trad_com_users['AJOUTER_USER'][$_SESSION['user']->getLangue()];
}
?>
<form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm" id="userForm">
    <div class="row">
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_users['NOM'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="nom" type="text"
                                             value="<?php if (isset($u)) echo $u->getLastName() ?>" id="nom" required
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_users['PRENOM'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="prenom" type="text"
                                             value="<?php if (isset($u)) echo $u->getFirstName() ?>" id="prenom"
                                             required class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_users['LOGIN'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="login" id="login" type="text"
                                             value="<?php if (isset($u)) echo $u->getUserName() ?>" required
                                             class="form-control" <?php if (isset($u)) echo 'disabled="disabled"' ?> />
            </div>
        </div>
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_users['MOT_DE_PASSE'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="password" type="password" value=""
                                             class="form-control" <?php if (!isset($u)) echo 'required'; ?> /></div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 form-group has-iconed">
            <label><?= $trad_com_users['E_MAIL'][$_SESSION['user']->getLangue()]; ?></label>
            <div class="iconed-input"><input name="email" id="email" type="email"
                                             value="<?php if (isset($u)) echo $u->getEmail() ?>" required
                                             class="form-control"/></div>
        </div>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_users['TEL'][$_SESSION['user']->getLangue()]; ?></label>
            <input name="tel" type="text" value="<?php if (isset($u)) echo $u->getTel() ?>" class="form-control"/>
        </div>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_users['ADRESSE'][$_SESSION['user']->getLangue()]; ?></label>
            <input name="adresse" type="text" value="<?php if (isset($u)) echo $u->getAdresse() ?>"
                   class="form-control"/>
        </div>
        <div class="col-md-3 form-group">
            <label><?= $trad_com_users['PROFIL'][$_SESSION['user']->getLangue()]; ?></label>
            <select name="profil" class="form-control chosen-select">
                <?php
                $SQLselect = "SELECT id FROM " . __prefixe_db__ . "profils";
                $result = $db->queryS($SQLselect);
                foreach ($result as $data) {
                    $p = new profil($data['id'], $db);
                    $sl = (isset($u) && $u->getIdProfil() == $p->getId()) ? "selected" : "";
                    ?>
                    <option value="<?php echo $p->getId(); ?>" <?php echo $sl; ?>><?php echo $p->getProfil(); ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

        <div class="col-md-3 form-group">
            <label><?= $trad_com_users['LANGUE_SYSTEME'][$_SESSION['user']->getLangue()]; ?></label>
            <select name="langue" class="form-control chosen-select">
                <?php
                $langues = array('Français' => 'fr', 'Anglais' => 'en');
                foreach ($langues as $langue => $code) {
                    $sl = (isset($u) && $u->getLangue() == $code) ? "selected" : "";
                    ?>
                    <option value="<?= $code; ?>" <?= $sl; ?>><?= $langue; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>

    </div>
    <?php if (isset($u)) { ?>
        <input type="hidden" name="id" value="<?= $u->getId() ?>"/>
    <?php } ?>

    <input type="reset" class="btn btn-default" value="<?= $trad_com_users['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
    <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
</form>
<script>
    $(function () {
        var succes = "<?= $trad_com_users['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_users['ERREUR'][$_SESSION['user']->getLangue()];?>";
        var warning = "<?= $trad_com_users['ATTENTION'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#userForm').ajaxForm({

            beforeSubmit: function () {

            },
            success: function (theResponse) {
                // messages
                if ($(".submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_users['SUCCES_MODIF_USER'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_users['ERREUR_MODIF_USER'][$_SESSION['user']->getLangue()];?>";
                    var warning_msg = "<?= $trad_com_users['ATTENTION_LOGIN'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_users['SUCCES_ADD_USER'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_users['ERREUR_ADD_USER'][$_SESSION['user']->getLangue()];?>";
                    var warning_msg = "<?= $trad_com_users['ATTENTION_LOGIN'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) === 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_users";
                    }, 1500)
                }
                else if (parseInt(theResponse) === 2) {
                    $('.msgbox').html('<div class="alert alert-warning alert-dismissable"><i class="icon-exclamation-sign"></i> <strong>' + warning + '</strong> ' + warning_msg + '</div>');
                    $('.msgbox').slideDown();
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    })
</script>