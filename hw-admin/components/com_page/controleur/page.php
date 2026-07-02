<?php
include "../../../config.php";
require_once('../../../instanceDb.php');
require_once('../../../includes/functions/functions.php');
session_start();

if (isset($_GET['task']) && !empty($_GET['task'])) {
    $task = $_GET['task'];
    switch ($task) {
        case 'addPage' :
            addPage($_POST);
            break;
        case 'editPage' :
            editPage($_POST);
            break;
        case 'deletePage' :
            deletePage($_POST);
            break;
        case 'deletePhotoPage' :
            deletePhotoPage($_POST);
            break;
        case 'dupliquerPage' :
            dupliquerPage($_POST);
            break;
        case 'getPageTranslation' :
            getPageTranslation($_POST);
            break;
    }
}

/* -------------------------------- addPage -------------------------------- */
function addPage($data)
{
    global $db;
    if (isset($data['titre']) && !empty($data['titre'])) {

        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['name'][0] != '') {
            $var = uploadFiles('photo', '../../../../images/pages/', array('jpg', 'jpeg', 'gif', 'png', 'webp'));
            $photo = $var[0];
        }


        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "page (type, id_slider, photo, actif) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($data['slider'], "int"),
            GetSQLValueString($photo, "text"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"));

        if (!$db->query($insertSQL)) {
            $id_page = $db->last_id();
            $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "details_page (id_page, seo_titre, seo_description, titre, url, texte, externe, langue, extrait) VALUES (%s, %s, %s, %s, %s, %s, %s, %s,%s)",

                GetSQLValueString($id_page, "int"),
                GetSQLValueString($data['seo_titre'], "text"),
                GetSQLValueString($data['seo_description'], "text"),
                GetSQLValueString($data['titre'], "text"),
                GetSQLValueString($data['url'], "text"),
                GetSQLValueString($data['texte'], "text"),
                GetSQLValueString($data['externe'], "text"),
                GetSQLValueString($_SESSION['langue'], "text"),
                GetSQLValuestring($data['extrait'], "text"));
            if (!$db->query($insertSQL)) {
                seo();
                echo '1';
            } else
                echo '2';
        } else
            echo '3';
    } else
        echo '0'; // champs obligatoirs
}

/* -------------------------------- dupliquerPage -------------------------------- */
function dupliquerPage($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $p = new page($id, $db);

        $photo = "";
        if($p->getPhoto() != "") {
            $image = "../../../../images/pages/" . $p->getPhoto();
            $image_copy = "../../../../images/pages/copy-" . $p->getPhoto();
            @copy($image, $image_copy);
            $photo = "copy-" . $p->getPhoto();
        }

        $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "page (type, id_slider, photo, actif) VALUES (%s, %s, %s, %s)",
            GetSQLValueString($p->getType(), "text"),
            GetSQLValueString($p->getIdSlider(), "int"),
            GetSQLValueString($photo, "text"),
            GetSQLValueString(0, "int"));
        if (!$db->query($insertSQL)) {
            $id_page = $db->last_id();
            $insertSQL = sprintf("INSERT INTO " . __prefixe_db__ . "details_page (id_page, seo_titre, seo_description, titre, url, texte, externe, langue, extrait) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                GetSQLValueString($id_page, "int"),
                GetSQLValueString($p->getSeoTitre(), "text"),
                GetSQLValueString($p->getSeoDescription(), "text"),
                GetSQLValueString($p->getTitre() . "-copie", "text"),
                GetSQLValueString($p->getURL(), "text"),
                GetSQLValueString($p->getTexte(), "text"),
                GetSQLValueString($p->getExterne(), "text"),
                GetSQLValueString($_SESSION['langue'], "text"),
                GetSQLValuestring($p->getextrait(), "text"));

            if (!$db->query($insertSQL)) {
                seo();
                echo '1';
            } else
                echo '2';
        } else
            echo '3';
    } else
        echo '0';
}

/* -------------------------------- getPageTranslation -------------------------------- */
function getPageTranslation($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id']) && isset($data['l']) && !empty($data['l'])) {
        $id = $data['id'];
        $l = $data['l'];

        $p = new page($id, $db, $l);

        ?>
        <div class="theResponse">
            <div class="test"></div>
            <form method="post" action="<?php echo $paction ?>" enctype="multipart/form-data" class="validateForm"
                  id="productForm">
                <?php if (isset($p)): ?>

                <?php endif; ?>
                <div class="row">
                    <fieldset>
                        <legend>SEO tags</legend>
                        <div class="col-md-6 form-group">
                            <label>Titre</label>
                            <div class="iconed-input"><input type="text" name="seo_titre"
                                                             value="<?php if (isset($p)) echo stripslashes($p->getSeoTitre()); ?>"
                                                             class="form-control"/></div>
                        </div>

                        <div class="col-md-6 form-group">
                            <label>Description</label>
                            <div class="iconed-input"><input type="text" name="seo_description"
                                                             value="<?php if (isset($p)) echo stripslashes($p->getSeoDescription()); ?>"
                                                             class="form-control"/></div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Détails page</legend>

                        <div class="col-md-3 form-group">
                            <label>Titre</label>
                            <div class="iconed-input"><input type="text" name="titre"
                                                             value="<?php if (isset($p)) echo stripslashes($p->getTitre()); ?>"
                                                             required class="form-control"/></div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>URL</label>
                            <input type="text" name="url"
                                   value="<?php if (isset($p)) echo stripslashes($p->getURL()); ?>"
                                   class="form-control"/>
                        </div>

                        <div class="col-md-3 form-group has-iconed">
                            <label>Type</label>
                            <select name="type" class="form-control chosen-select">
                                <option value="page" <?php if (isset($p) && $p->getType() == 'page') echo "selected"; ?>>
                                    Page de contenu
                                </option>
                                <option value="lien" <?php if (isset($p) && $p->getType() == 'lien') echo "selected"; ?>>
                                    Lien externe
                                </option>
                                <option value="room" <?php if (isset($p) && $p->getType() == 'room') echo "selected"; ?>>
                                    Liste chambre
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3 form-group has-iconed">
                            <label>Lien externe</label>
                            <div class="iconed-input"><input type="text" name="externe"
                                                             value="<?php if (isset($p)) echo $p->getExterne(); ?>"
                                                             class="form-control"/></div>
                        </div>

                        <div class="col-md-3 form-group">
                            <label>Slider</label>
                            <select name="slider" class="form-control chosen-select">
                                <option value="">Par défaut</option>
                                <?php
                                $SQLselect = "SELECT id FROM " . __prefixe_db__ . "slider WHERE actif = 1";
                                $result = $db->queryS($SQLselect);
                                foreach ($result as $data) {
                                    $s = new slider($data['id'], $db);
                                    $sl = isset($p) && $p->getIdSlider() == $s->getId() ? "selected" : "";
                                    ?>
                                    <option value="<?= $s->getId() ?>" <?php echo $sl; ?>><?= $s->getTitre() ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label>Photo</label>
                            <div class="iconed-input"><input type="file" name="photo[]" class=""/></div>
                        </div>
                        <?php
                        if (isset($p) && $p->getPhoto() != '') {
                            ?>
                            <div class="col-md-2">
                                <img src="../images/pages/<?php echo $p->getPhoto(); ?>" alt="" height="60"
                                     style="border:#FFF solid 3px; box-shadow:#CCC 0 0 3px; border-radius:3px; margin-left:10px;"/>
                            </div>
                            <?php
                        }
                        ?>

                        <div style="float:right;" class="col-md-5 form-group">
                            <label>Extrait</label>
                            <textarea class="form-control" id="extrait"
                                      name="extrait"><?php if (isset($p)) echo $p->getextrait(); ?></textarea>
                        </div>

                        <div class="col-md-1 form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="actif"
                                           value="1" <?php if (isset($p) && $p->isActif()) echo "checked"; ?> /> Active
                                </label>
                            </div>
                        </div>


                        <div class="col-md-12 form-group" style="float:left;">
                            <label>Texte</label>
                            <textarea name="texte" id="texte"><?php if (isset($p)) echo $p->getTexte(); ?></textarea>
                            <script type="text/javascript">
                                CKEDITOR.replace('texte', {
                                    allowedContent: true,
                                    //allowedContent: 'p b i ul li tr th h2 h1 h3 h4 h5 h6 a; a[!href]; table[border,cellpadding,cellspacing]; td{height,width}; div(conditions,contentConditions,contentConditions2)',
                                    filebrowserBrowseUrl: '../ckeditor/plugins/ckfinder/ckfinder.html'
                                });
                            </script>
                        </div>
                    </fieldset>


                </div>
                <?php if (isset($p)) { ?>
                    <input type="hidden" name="id" value="<?= $p->getId() ?>"/>
                <?php } ?>

                <input type="reset" class="btn btn-default" value="Annuler"/>
                <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>"
                       class="btn btn-primary submit"/>
                <span class="loading"></span>
            </form>
            <script>
                $(function () {

                    // envoi du formulaire en ajax
                    $('form#productForm').ajaxForm({
                        beforeSubmit: function () {
                            $(".loading").fadeIn();
                        },
                        success: function (theResponse) {
                            $(".loading").fadeOut();
                            // messages
                            if ($(".submit").attr("name") == 'edit') {
                                var msgsucces = 'Page modifi&eacute;e avec succ&egrave;s.';
                                var msgfaild = 'Erreur lors de la modification.';
                            }
                            else {
                                var msgsucces = 'Page ajout&eacute;e avec succ&egrave;s.';
                                var msgfaild = 'Erreur lors de l\'ajout.';
                            }
                            if (theResponse == '1') {
                                $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>Succès</strong> ' + msgsucces + '</div>');
                                setTimeout(function () {
                                    document.location = "index.php?option=com_page";
                                }, 3000)
                            }
                            else {
                                $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>Erreur!</strong> ' + msgfaild + '</div>');
                                $('.msgbox').slideDown();
                            }
                        }
                    });
                })
            </script>
        </div>
        <?php
    } else
        echo '0';
}

/* -------------------------------- editPage -------------------------------- */
function editPage($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id']) && isset($data['titre']) && !empty($data['titre'])) {

        $id = intval($data['id']);
        $p = new page($id, $db);

        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['name'][0] != '') {
            $var = uploadFiles('photo', '../../../../images/pages/', array('jpg', 'jpeg', 'gif', 'png', 'webp'));

            $photo = "photo = " . GetSQLValueString($var[0], "text") . ", ";
        }

        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "page SET type=%s, id_slider=%s, $photo actif=%s WHERE id=%s ",
            GetSQLValueString($data['type'], "text"),
            GetSQLValueString($data['slider'], "int"),
            GetSQLValueString(isset($data['actif']) ? 1 : 0, "int"),
            GetSQLValueString($data['id'], "int"));

        if (!$db->query($updateSQL)) {

            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "details_page WHERE id_page = $id AND langue = '" . $_SESSION['langue'] . "'";
            $result = $db->query($SQLselect);
            // ajout d'une nouvelle traduction
            if ($db->num_rows($result) == 0) {
                $SQLupdate = sprintf("INSERT INTO " . __prefixe_db__ . "details_page (id_page, seo_titre, seo_description, titre, url,  texte, externe, langue, extrait) VALUES (%s, %s, %s, %s,%s, %s, %s, %s, %s)",

                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($data['seo_titre'], "text"),
                    GetSQLValueString($data['seo_description'], "text"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['url'], "text"),
                    GetSQLValueString($data['texte'], "text"),
                    GetSQLValueString($data['externe'], "text"),
                    GetSQLValueString($_SESSION['langue'], "text"),
                    GetSQLValuestring($data['extrait'], "text"));
            } // modification de la table détails
            else {
                $SQLupdate = sprintf("UPDATE " . __prefixe_db__ . "details_page SET seo_titre=%s, seo_description=%s, titre=%s, url=%s, texte=%s, externe=%s , extrait=%s WHERE id_page=%s AND langue=%s ",

                    GetSQLValueString($data['seo_titre'], "text"),
                    GetSQLValueString($data['seo_description'], "text"),
                    GetSQLValueString($data['titre'], "text"),
                    GetSQLValueString($data['url'], "text"),
                    GetSQLValueString($data['texte'], "text"),
                    GetSQLValueString($data['externe'], "text"),
                    GetSQLValuestring($data['extrait'], "text"),
                    GetSQLValueString($data['id'], "int"),
                    GetSQLValueString($_SESSION['langue'], "text")
                );
            }

            if (!$db->query($SQLupdate)) {
                // supprimer l'ancienne photo
                if ($photo != '') {
                    @unlink("../../../../images/pages/" . $p->getPhoto());
                }
                seo();
                echo '1';
            } else
                echo '2';
        } else
            echo '3';
    } else
        echo '0';
}

/* -------------------------------- deletePage -------------------------------- */
function deletePage($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $p = new page($id, $db);
        $SQLdelete = "DELETE FROM " . __prefixe_db__ . "page WHERE id = $id";
        $SQLdelete2 = "DELETE FROM " . __prefixe_db__ . "details_page WHERE id_page = $id";
        if (!$db->query($SQLdelete) && !$db->query($SQLdelete2)) {
            @unlink("../../../../images/pages/" . $p->getPhoto());
            echo '1';
        } else
            echo '2';
    } else
        echo '0';
}

/* -------------------------------- deletePhotoPage -------------------------------- */
function deletePhotoPage($data)
{
    global $db;
    if (isset($data['id']) && !empty($data['id'])) {
        $id = intval($data['id']);
        $p = new page($id, $db);
        $photo = "";
        $updateSQL = sprintf("UPDATE " . __prefixe_db__ . "page SET photo=%s WHERE id=%s ",
            GetSQLValueString($photo, "text"),
            GetSQLValueString($id, "int")
        );

        if(!$db->query($updateSQL)){
            @unlink("../../../../images/pages/" . $p->getPhoto());
            echo '1';
        }else
            echo '2';
    } else
        echo '0';
}

?>