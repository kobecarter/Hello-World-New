<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Administration <?= strtoupper($projet); ?></title>
    <link href='styles/simi.css' rel='stylesheet' type='text/css'>
    <link href="styles/simi-2.css" rel="stylesheet" type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:100,300,400,700|Roboto+Condensed:300,400,700'
          rel='stylesheet' type='text/css'>

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css"> -->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    @javascript html5shiv respond.min
    <![endif]-->
    <!-- Fontawesome Icon font -->
    <script src="https://kit.fontawesome.com/9215223ab4.js" crossorigin="anonymous"></script>

    <?php $c = new config($db); ?>
    
    <!-- FavIcon -->
    <link rel="shortcut icon" href="<?php echo $siteURL; ?>assets/img/favicon.ico">
    <!-- ----- -->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../ckeditor/ckeditor.js"></script>

</head>

<body>
<div class="all-wrapper fixed-header left-menu <?php if (isset($_GET['option']) && ($_GET['option'] == 'com_contact' || $_GET['option'] == 'com_config')) echo 'hide-sub-menu'; ?>">
    <div class="page-header">
        <div class="header-links hidden-xs">
            <div class="dropdown">
                <?php if(module::exists("com_page")){ ?>
                    <a href="index.php?option=com_page&task=url" class="header-link"><i
                                class="icon-magic"></i><?= $traduction['REECRIRE_URLS'][$_SESSION['user']->getLangue()]; ?>
                    </a>
                <?php } ?>
            </div>
            <div class="dropdown">
                <?php
                $op = isset($_GET['option']) ? $_GET['option'] : "com_dashboard";
                if (!isset($_SESSION['langue'])) $_SESSION['langue'] = langue::getDefaultLanguage();
                if (isset($_GET['l'])) $_SESSION['langue'] = $_GET['l'];
                ?>
            </div>
            <div class="dropdown hidden-sm hidden-xs">
                <a href="#0" data-toggle="dropdown" class="header-link"><i
                            class="icon-globe"></i> <?= $traduction['LANGUE'][$_SESSION['user']->getLangue()]; ?>
                    (<?php echo $_SESSION['langue'] ?>)</a>
                <ul class="dropdown-menu dropdown-inbar">
                    <?php
                    $SQLselect = "SELECT id FROM " . __prefixe_db__ . "langue ORDER BY date_add DESC";
                    $result = $db->queryS($SQLselect);
                    foreach ($result as $data) {
                        $l = new langue($data['id'], $db);
                        if ($l->isActif()) {
                            ?>
                            <li>
                                <a href="index.php?option=<?= $op ?>&l=<?php echo $l->getCode(); ?>"><?php if ($_SESSION['langue'] == $l->getCode()) { ?>
                                        <i class="icon-pencil"></i> <?php }
                                    echo $traduction[$l->getNom()][$_SESSION['user']->getLangue()]; ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="dropdown hidden-sm hidden-xs">
                <a href="#0" data-toggle="dropdown" class="header-link"><i
                            class="icon-cog"></i> <?= $traduction['PARAMS'][$_SESSION['user']->getLangue()]; ?></a>
                <ul class="dropdown-menu dropdown-inbar">
                    <?php
                    $ids_modules = module::findAllPosition("param");
                    foreach ($ids_modules as $id_module) {
                        $m = new module($id_module, $db);
                        include_once "components/$id_module/traduction.php";
                        $nom = ${"trad_".$id_module}[$id_module][$_SESSION['user']->getLangue()];
                        ?>
                        <?php if ($_SESSION['user']->hasDroit('view', $m->getIdModule())) { ?>
                            <?php if($m->getIdModule() == "com_module" || $m->getIdModule() == "com_lang") { ?>
                                <?php if($_SESSION["user"]->isDev()) { ?>
                                    <li>
                                        <a href="index.php?option=<?= $m->getIdModule(); ?>">
                                            <i class="fa fa-<?= $m->getIcon(); ?>"></i>
                                            <?= $nom; ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            <?php } else { ?>
                                <li>
                                    <a href="index.php?option=<?= $m->getIdModule(); ?>">
                                        <i class="fa fa-<?= $m->getIcon(); ?>"></i>
                                        <?= $nom; ?>
                                    </a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="dropdown"><a href="#0" class="header-link clearfix" data-toggle="dropdown">
                    <div class="avatar"><img src="<?php echo $siteURL; ?>hw-admin/images/logo-circle.png" alt="<?php echo $c->getNom(); ?>"></div>
                    <div class="user-name-w"><?php echo $_SESSION['user']->getName(); ?><i class="icon-caret-down"></i>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-inbar">
                    <li><a href="index.php?option=com_users&task=edit&id=<?php echo $_SESSION['user']->getId(); ?>"><i
                                    class="icon-pencil"></i> <?= $traduction['MES_INFOS'][$_SESSION['user']->getLangue()]; ?>
                        </a></li>
                    <li>
                        <a href="javascript:void(0)" class="dev">
                            <i class="fa fa-code"></i>
                            <?php
                                $devMode = "Dev (désactivé)";
                                $devValue = 0;
                            ?>
                            <?php if($_SESSION["user"]->isDev()): ?>
                                <?php
                                    $devMode = "Dev (activé)";
                                    $devValue = 1;
                                ?>
                            <?php endif; ?>
                            <span class="dev-mode" data-value="<?= $devValue;?>" ><?= $devMode;?></span>
                        </a>
                    </li>
                    <li><a href="#0" class="logout"><i
                                    class="icon-power-off"></i> <?= $traduction['DECONNEXION'][$_SESSION['user']->getLangue()]; ?>
                        </a></li>
                </ul>
            </div>
        </div>
        <?php
        $homeLink = module::exists("com_dashboard") ? "index.php?option=com_dashboard" : "javascript:void(0)";
        ?>
        <a class="current logo hidden-xs" href="<?= $homeLink;?>"><i class="fa fa-dashboard"></i></a>
        <a class="menu-toggler" href="#"><i class="icon-reorder"></i></a>
        <h1>
            <?php
                include_once "components/$op/traduction.php";
                echo ${"trad_".$op}[$op][$_SESSION['user']->getLangue()];
            ?>
        </h1>
    </div>
    <script type="text/javascript">
        $(function () {
            <?php if(file_exists("../commandes.txt")): ?>
            //Notification commandes
            var title = $(document).prop("title");
            setInterval(function(){
                var dt = new Date();
                var time = dt.getDay() + "" + dt.getMonth() + "" + dt.getFullYear() + "" + dt.getHours() + "" + dt.getMinutes() + "" + dt.getSeconds();
                var file = "../commandes.txt" + "?v=" + time;
                var content = "";
                $.get(file, function(txt, status){
                    if(status === "success") {
                        content = txt;
                        if (parseInt(content) > 0) {
                            $(".cart-notif").text(content);
                            var new_title = "(" + content + ") " + title;
                            $(document).prop("title", new_title);
                        } else {
                            $(".cart-notif").text("");
                            $(document).prop("title", title);
                        }
                    }
                });
            }, 1000);
            <?php endif; ?>
            // Btn annuler
            $("input[type=reset]").click(function(){
                history.back();
            });
            // Mode dev
            $(".dev").click(function() {
                var dev_mode = $(".dev-mode");
                var value = dev_mode.attr("data-value");
                var order = "";
                if(value === "0"){
                    var code = prompt("Saisissez le mot de passe du dev mode : ");
                    order = "code=" + code;
                }
                $.post("components/com_users/controleur/user.php?task=dev", order, function (theResponse) {
                    if (parseInt(theResponse) === 1) {
                        dev_mode.text("Dev (activé)").attr("data-value", "1");
                        document.location = "index.php?option=com_module";
                    } else if(parseInt(theResponse) === 0) {
                        dev_mode.text("Dev (désactivé)").attr("data-value", "0");
                    } else if(parseInt(theResponse) === 2) {
                        alert("Le mot de passe saisi est incorrect !");
                    }
                });
            });
            // Déconnexion
            $('.logout').click(function (event) {
                event.preventDefault();
                var order = '';
                $.post("components/com_login/controleur/login.php?task=logout", order, function (theResponse) {
                    if (parseInt(theResponse) === 1) {
                        document.location.reload();
                    }
                });
            });
        });
    </script>