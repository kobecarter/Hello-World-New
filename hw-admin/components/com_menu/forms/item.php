<?php
if (isset($_GET['id_item']) && !empty($_GET['id_item'])) $i = new menu_item(intval($_GET['id_item']), $db, $_SESSION['langue']);

if (isset($i)) {
    $action = "components/com_menu/controleur/menu.php?task=editMenuItem";
    $task = "edit";
    $bt = $trad_com_menu['MODIFIER_ELEMENT'][$_SESSION['user']->getLangue()];
} else {
    $action = "components/com_menu/controleur/menu.php?task=addMenuItem";
    $task = "add";
    $bt = $trad_com_menu['AJOUTER_ELEMENT'][$_SESSION['user']->getLangue()];
}
?>
<div class="widget widget-green">
    <div class="widget-title">
        <div class="widget-controls">
            <a href="#" class="widget-control widget-control-refresh" data-toggle="tooltip" data-placement="top"
               title="" data-original-title="<?= $trad_com_menu['ACTUALISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-refresh"></i></a>
            <a href="#" class="widget-control widget-control-minimize" data-toggle="tooltip" data-placement="top"
               title="" data-original-title="<?= $trad_com_menu['MINIMISER'][$_SESSION['user']->getLangue()]; ?>"><i class="icon-minus-sign"></i></a>
        </div>
        <h3><i class="icon-plus-sign"></i><?php echo $bt; ?></h3>
    </div>
    <div class="widget-content">
        <div class="msgbox"></div> <!-- conteneur de message -->

        <form method="post" action="<?php echo $action ?>" enctype="multipart/form-data" class="validateForm"
              id="menuForm">
            <div class="row">
                <div class="col-md-3 form-group">
                    <label><?= $trad_com_menu['ELEMENT_PARENT'][$_SESSION['user']->getLangue()]; ?></label>
                    <select name="item_parent" class="form-control chosen-select">
                        <option value="0">- <?= $trad_com_menu['SELECTIONNER_ITEM'][$_SESSION['user']->getLangue()]; ?> -</option>
                        <?php
                        isset($i) ? $claus = " AND id<>" . $i->getId() : $claus = "";
                        $SQLselect = "SELECT * FROM " . __prefixe_db__ . "menu_items WHERE parent_id = 0 AND id_menu = " . $m->getId() . " $claus";
                        $result = $db->queryS($SQLselect);
                        foreach ($result as $data) {
                            $mi = new menu_item($data['id'], $db, $_SESSION['langue']);
                            ?>
                            <option value="<?= $mi->getId() ?>" <?php if (isset($i) && $i->getItemParent() == $mi->getId()) echo "selected"; ?>><?= $mi->getTitre() ?></option>
                            <?php
                            $SQLselect = "SELECT * FROM " . __prefixe_db__ . "menu_items WHERE parent_id = " . $mi->getId() . " AND id_menu = " . $m->getId() . " $claus";
                            $result = $db->queryS($SQLselect);
                            foreach ($result as $data) {
                                $mi = new menu_item($data['id'], $db, $_SESSION['langue']);
                                ?>
                                <option value="<?= $mi->getId() ?>" <?php if (isset($i) && $i->getItemParent() == $mi->getId()) echo "selected"; ?>><?php echo '___' . $mi->getTitre() ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2 form-group">
                    <label><?= $trad_com_menu['TYPE'][$_SESSION['user']->getLangue()]; ?></label>
                    <select name="type" class="form-control chosen-select">

                        <?php
                        $ids_modules = module::findAllUrl();
                        foreach ($ids_modules as $id_module) {
                            $module = new module($id_module, $db);
                            ?>
                            <option value="<?= $module->getClasse(); ?>" <?php if (isset($i) && $i->getType() == $module->getClasse() . '') echo "selected"; ?>><?php echo ucfirst($module->getClasse()); ?></option>
                            <?php
                        }
                        ?>

                        <option value="ext" <?php if (isset($i) && $i->getType() == 'ext') echo "selected"; ?>>
                            <?= $trad_com_menu['LIEN_EXTERNE'][$_SESSION['user']->getLangue()]; ?>
                        </option>
                    </select>
                </div>

                <div class="col-md-4 form-group">
                    <label><?= $trad_com_menu['TITRE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="titre" type="text" value="<?php if (isset($i)) echo $i->getTitre() ?>" required
                           class="form-control"/>
                </div>

                <div class="col-md-1 form-group">
                    <label><?= $trad_com_menu['ORDRE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="ordre" type="number" value="<?php if (isset($i)) echo $i->getOrdre() ?>"
                           class="form-control"/>
                </div>

                <div class="col-md-2 form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="blank"
                                   value="1" <?php if (isset($i) && $i->isBlank()) echo "checked"; ?> />
                            <?= $trad_com_menu['NOUVELLE_FENETRE'][$_SESSION['user']->getLangue()]; ?>
                        </label>
                    </div>
                </div>


                <?php
                $ids_modules = module::findAllUrl();
                foreach ($ids_modules as $id_module) {
                    $module = new module($id_module, $db);
                    ?>
                    <div class="col-md-3 form-group">
                        <label><?php echo ucfirst($module->getClasse()); ?></label>
                        <select name="<?= $module->getClasse(); ?>" class="form-control chosen-select">
                            <option value="0">- <?= $trad_com_menu['SELECTIONNER'][$_SESSION['user']->getLangue()]; ?> <?= $module->getClasse(); ?> -</option>
                            <?php
                            if($module->getIdModule() == "com_page") {
                                $SQLselect = "SELECT * FROM " . __prefixe_db__ . $module->getNomTable() . " WHERE actif = 1";
                            } else {
                                $SQLselect = "SELECT * FROM " . __prefixe_db__ . $module->getNomTable() . " WHERE active = 1";
                            }
                            $result = $db->queryS($SQLselect);
                            foreach ($result as $data) {
                                $class = $module->getClasse();
                                if(method_exists($class, "find")) {
                                    $obj = $class::find($data['id'], $_SESSION["langue"]);
                                } else {
                                    $obj = new $class($data['id'], $db, $_SESSION["langue"]);
                                }
                                if(method_exists($class, "getTitre")) {
                                    $objTitre = $obj->getTitre();
                                } else if (method_exists($class, "getNom")) {
                                    $objTitre = $obj->getNom();
                                }
                                $sl = (isset($i) && $i->getType() == $module->getClasse() . '' && $i->getIdItem() == $obj->getId()) ? "selected" : "";
                                ?>
                                <option value="<?php echo $obj->getId() ?>" <?php echo $sl; ?>><?php echo $objTitre; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php

                }
                ?>

                <div class="col-md-3 form-group">
                    <label><?= $trad_com_menu['LIEN_EXTERNE'][$_SESSION['user']->getLangue()]; ?></label>
                    <input name="lien_ext" type="text" value="<?php if (isset($i)) echo $i->getLien() ?>"
                           class="form-control"/>
                </div>

            </div>

            <hr>
            <div class="row">
                <div class="col-md-12"><h4>Méga menu — apparence &amp; contenu</h4>
                    <p class="help-block">Ces champs pilotent l'affichage dans le méga menu du site. "Clé du panneau", dégradé, badge et libellé du bouton ne concernent que les rubriques de premier niveau (Solutions IA, Web &amp; Mobile, etc.). "Style d'affichage" et "Liste automatique" concernent les groupes (colonnes) à l'intérieur d'un panneau. "Afficher les packs" concerne un item de type Service.</p>
                </div>

                <div class="col-md-2 form-group">
                    <label>Clé du panneau (non modifiable)</label>
                    <input name="panel_key" type="text" value="<?php if (isset($i)) echo htmlspecialchars($i->getPanelKey(), ENT_QUOTES, 'UTF-8'); ?>"
                           class="form-control" <?php if (isset($i) && $i->getPanelKey()) echo 'readonly'; ?>/>
                </div>

                <div class="col-md-2 form-group">
                    <label>Icône</label>
                    <select name="icon" class="form-control chosen-select">
                        <option value="">- aucune (par défaut : chat) -</option>
                        <?php
                        $iconChoices = array('chat','whatsapp','mic','robot','headset','users','mail','target','chart','home','hotel','bag','heart','globe','mobile','lock','rocket','building','dash','palette','camera','star','share','event','press','printer','pin','cap','pen','phone','gear','grid');
                        foreach ($iconChoices as $ic) {
                            $sel = (isset($i) && $i->getIcon() === $ic) ? 'selected' : '';
                            echo '<option value="'.$ic.'" '.$sel.'>'.$ic.'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 form-group">
                    <label>Dégradé (rubrique)</label>
                    <select name="gradient" class="form-control chosen-select">
                        <option value="">- aucun -</option>
                        <?php
                        $gradChoices = array('grad-brand','grad-web','grad-saas','grad-mk','grad-form','grad-sol');
                        foreach ($gradChoices as $gc) {
                            $sel = (isset($i) && $i->getGradient() === $gc) ? 'selected' : '';
                            echo '<option value="'.$gc.'" '.$sel.'>'.$gc.'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-2 form-group">
                    <label>Badge (rubrique)</label>
                    <input name="badge" type="text" value="<?php if (isset($i)) echo htmlspecialchars($i->getBadge(), ENT_QUOTES, 'UTF-8'); ?>" class="form-control"/>
                </div>

                <div class="col-md-2 form-group">
                    <label>Bouton principal (rubrique)</label>
                    <input name="cta_label" type="text" placeholder="Découvrir" value="<?php if (isset($i)) echo htmlspecialchars($i->getCtaLabel(), ENT_QUOTES, 'UTF-8'); ?>" class="form-control"/>
                </div>

                <div class="col-md-2 form-group">
                    <label>Style d'affichage (groupe)</label>
                    <select name="card_style" class="form-control chosen-select">
                        <option value="sublink" <?php if (isset($i) && $i->getCardStyle() === 'sublink') echo 'selected'; ?>>Liste (sublink)</option>
                        <option value="card" <?php if (isset($i) && $i->getCardStyle() === 'card') echo 'selected'; ?>>Cartes (card)</option>
                    </select>
                </div>

                <div class="col-md-2 form-group">
                    <label>Liste automatique (groupe)</label>
                    <select name="auto_list" class="form-control chosen-select">
                        <option value="">Aucune (contenu manuel)</option>
                        <option value="service_children" <?php if (isset($i) && $i->getAutoList() === 'service_children') echo 'selected'; ?>>Enfants du service lié</option>
                        <option value="formation" <?php if (isset($i) && $i->getAutoList() === 'formation') echo 'selected'; ?>>Toutes les formations</option>
                        <option value="agent_ia" <?php if (isset($i) && $i->getAutoList() === 'agent_ia') echo 'selected'; ?>>Tous les agents IA</option>
                        <option value="secteur" <?php if (isset($i) && $i->getAutoList() === 'secteur') echo 'selected'; ?>>Tous les secteurs</option>
                    </select>
                </div>

                <div class="col-md-1 form-group">
                    <label>Limite</label>
                    <input name="auto_limit" type="number" min="0" value="<?php if (isset($i)) echo $i->getAutoLimit(); ?>" class="form-control"/>
                </div>

                <div class="col-md-2 form-group">
                    <div class="checkbox" style="margin-top:24px">
                        <label>
                            <input type="checkbox" name="show_packs" value="1" <?php if (isset($i) && $i->getShowPacks()) echo 'checked'; ?>/>
                            Afficher les packs (item Service)
                        </label>
                    </div>
                </div>

                <div class="col-md-2 form-group">
                    <label>Témoignage épinglé (rubrique)</label>
                    <select name="testimonial_id" class="form-control chosen-select">
                        <option value="0">- aléatoire -</option>
                        <?php
                        $allTestimonials = temoignage::findAllGlobal($_SESSION['langue'], true);
                        foreach ($allTestimonials as $tm) {
                            if (trim(strip_tags($tm->getTemoignage())) === '') continue;
                            $sel = (isset($i) && $i->getTestimonialId() == $tm->getId()) ? 'selected' : '';
                            echo '<option value="'.$tm->getId().'" '.$sel.'>'.htmlspecialchars($tm->getNom(), ENT_QUOTES, 'UTF-8').'</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="col-md-3 form-group">
                    <label>Image personnalisée (chemin relatif ou URL)</label>
                    <input name="image" type="text" placeholder="images/pages/exemple.webp" value="<?php if (isset($i)) echo htmlspecialchars($i->getImage(), ENT_QUOTES, 'UTF-8'); ?>" class="form-control"/>
                </div>

                <div class="col-md-3 form-group">
                    <div class="checkbox" style="margin-top:24px">
                        <label>
                            <input type="checkbox" name="active" value="1" <?php if (!isset($i) || $i->isActive()) echo 'checked'; ?>/>
                            Actif (visible sur le site)
                        </label>
                    </div>
                </div>

                <div class="col-md-12 form-group">
                    <label>Description (1-2 lignes affichées dans le méga menu)</label>
                    <textarea name="description" class="form-control" rows="2"><?php if (isset($i)) echo htmlspecialchars($i->getDescription(), ENT_QUOTES, 'UTF-8'); ?></textarea>
                    <p class="help-block">Laisser vide pour reprendre automatiquement le sous-titre/extrait de l'élément lié.</p>
                </div>
            </div>
            <input type="hidden" name="id_menu" value="<?= $m->getId() ?>"/>

            <?php if (isset($i)) { ?>
                <input type="hidden" name="id" value="<?= $i->getId() ?>"/>
            <?php } ?>

            <input type="reset" class="btn btn-default" value="<?= $trad_com_menu['ANNULER'][$_SESSION['user']->getLangue()]; ?>"/>
            <input type="submit" value="<?php echo $bt ?>" name="<?php echo $task; ?>" class="btn btn-primary submit"/>
            <span class="loading"><img src="../images/loading.gif" /></span>
        </form>
    </div>
</div>

<script>
    $(function () {
        var succes = "<?= $trad_com_menu['SUCCES'][$_SESSION['user']->getLangue()];?>";
        var error = "<?= $trad_com_menu['ERREUR'][$_SESSION['user']->getLangue()];?>";

        // envoi du formulaire en ajax
        $('form#menuForm').ajaxForm({
            beforeSubmit: function () {
                $("#menuForm .loading").fadeIn();
            },
            success: function (theResponse) {
                $("#menuForm .loading").fadeOut();
                $("html, body").animate({scrollTop: 0}, "slow");
                // messages
                if ($("#menuForm .submit").attr("name") == 'edit') {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_MODIF_ITEM'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_MODIF_ITEM'][$_SESSION['user']->getLangue()];?>";
                }
                else {
                    var succes_msg = "<?= $trad_com_menu['SUCCES_ADD_ITEM'][$_SESSION['user']->getLangue()];?>";
                    var error_msg = "<?= $trad_com_menu['ERREUR_ADD_ITEM'][$_SESSION['user']->getLangue()];?>";
                }
                if (parseInt(theResponse) == 1) {
                    $('.msgbox').html('<div class="alert alert-success alert-dismissable"><i class="icon-check-sign"></i> <strong>' + succes + '</strong> ' + succes_msg + '</div>');
                    setTimeout(function () {
                        document.location = "index.php?option=com_menu&task=items&id=<?php echo $m->getId()?>";
                    }, 3000)
                }
                else {
                    $('.msgbox').html('<div class="alert alert-danger alert-dismissable"><i class="icon-remove-sign"></i> <strong>' + error + '</strong> ' + error_msg + '</div>');
                    $('.msgbox').slideDown();
                }
            }
        });
    });
</script>