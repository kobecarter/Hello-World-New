<?php

class menu
{
    private $id;
    private $titre;

    public function __construct($id, $db)
    {
        if (isset($id)) {
            $result = $db->query("SELECT * FROM " . __prefixe_db__ . "menu WHERE id = " . $id);
            if ($db->num_rows($result) == 1) {

                $data = $db->fetch_assoc($result);
                $this->id = $data['id'];
                $this->titre = $data['titre'];
            }
        }
    }

    public function __destruct()
    {

    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function getMenu($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
					  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
					  WHERE id_menu = " . $this->id . " 
					  AND parent_id = 0
					  AND langue = '" . $_SESSION["lang"] . "' 
					  ORDER BY ordre ASC";
        $result = $db->query($SQLselect);
        if ($db->num_rows($result) > 0) {
            $result = $db->queryS($SQLselect);
            foreach ($result as $data) {
                $mi = new menu_item($data['id'], $db, $_SESSION["lang"]);
                $blank = $mi->isBlank() ? 'target="_blank"' : '';

                $classLi = ($mi->hasSousMenu()) ? 'has-sub ' : '';
                $hrefTiret = ($mi->hasSousMenu() && $mobile) ? '<i class="fa fa-angle-down"></i>' : '';
                $link = $hrefTiret && $mobile ? "#" : $mi->getLink();

                if ($mi->getType() == 'page') {
                    $classLi .= (!isset($_GET['task']) && isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                }
                if($mi->getType() == 'ext' && isHome() && $mi->getLink() == $siteURL){
                    $classLi .=  'active';
                }
                ?>
            <li class="<?php echo $classLi; ?>">
                <a href="<?= $link; ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?> <?= $hrefTiret;?></a>
                <?php
                if ($mi->hasSousMenu() && $deep == 0) {
                    echo '<ul>';
                    $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
									  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
									  WHERE id_menu = " . $this->id . "
									  AND parent_id = " . $mi->getId() . "
									  AND langue = '" . $_SESSION["lang"] . "' 
									  ORDER BY ordre ASC";
                    $result2 = $db->queryS($SQLselect);
                    foreach ($result2 as $data2) {
                        $classLi = "";
                        $mi = new menu_item($data2['id'], $db, $_SESSION["lang"]);
                        $blank = $mi->isBlank() ? 'target="_blank"' : '';

                        if ($mi->getType() == 'page') {
                            $classLi .= (isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                        }
                        ?>
                    <li class="<?php echo $classLi; ?>">
                        <a href="<?php echo $mi->getLink(); ?>" class="mi_<?php echo $mi->getId(); ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?></a>
                        <?php
                        if ($mi->hasSousMenu() && $deep == 0) {
                            echo '<ul>';
                            $SQLselect = "SELECT A.id FROM " . __prefixe_db__ . "menu_items A
												  JOIN " . __prefixe_db__ . "details_menu_item B ON A.id = B.id_menu_item
												  WHERE id_menu = " . $this->id . "
												  AND parent_id = " . $mi->getId() . "
												  AND langue = '" . $_SESSION["lang"] . "' 
												  ORDER BY ordre ASC";
                            $result3 = $db->queryS($SQLselect);
                            foreach ($result3 as $data3) {
                                $classLi = "";
                                $mi = new menu_item($data3['id'], $db, $_SESSION["lang"]);
                                $blank = $mi->isBlank() ? 'target="_blank"' : '';

                                if ($mi->getType() == 'page') {
                                    $classLi .= (isset($_GET['id']) && $_GET['id'] == $mi->getIdItem()) ? 'active' : '';
                                }
                                ?>
                                <li class="<?php echo $classLi; ?>">
                                    <a href="<?php echo $mi->getLink(); ?>" <?php echo $blank; ?>><?php echo $mi->getTitre(); ?></a>
                                </li>
                                <?php
                            }
                            echo '</ul>';
                        }
                        ?>
                        </li>
                        <?php
                    }
                    echo '</ul>';
                }
                ?>
                </li>
                <?php
            }
        }
    }
    
    public function getMenuMobile($deep = 0, $mobile = false)
    {
        global $db;
        $lang = $_SESSION['lang'];
        $testimonials = array(); // not shown on mobile, kept for signature parity with getMegaMenu()
        $panelIds = $this->findAllParentItem();
        foreach ($panelIds as $pid) {
            $mi = new menu_item($pid, $db, $lang);
            $blank = $mi->isBlank() ? 'target="_blank"' : '';
            $groupIds = $mi->getSousMenu();

            if (empty($groupIds)) {
                ?>
                <a href="<?= $mi->getLink(); ?>" class="mm-m-link" <?php echo $blank; ?>><?php echo htmlspecialchars($mi->getTitre(), ENT_QUOTES, 'UTF-8'); ?></a>
                <?php
                continue;
            }

            // Stable, unique id per panel (not a shared literal) so each
            // accordion section opens/closes independently.
            $accId = 'm-' . ($mi->getPanelKey() ? preg_replace('/[^a-z0-9\-]/', '', strtolower($mi->getPanelKey())) : $mi->getId());
            ?>
            <button class="mm-acc-head" aria-expanded="false" data-acc="<?php echo $accId; ?>"><?php echo htmlspecialchars($mi->getTitre(), ENT_QUOTES, 'UTF-8'); ?><span class="mm-acc-chev fal fa-chevron-down"></span></button>
            <div class="mm-acc-body" id="<?php echo $accId; ?>">
                <div class="mm-acc-inner">
                    <?php
                    $isMulti = count($groupIds) > 1;
                    foreach ($groupIds as $gid) {
                        $group = new menu_item($gid, $db, $lang);
                        if ($isMulti) {
                            echo '<p class="mm-acc-group-title">' . htmlspecialchars($group->getTitre(), ENT_QUOTES, 'UTF-8') . '</p>';
                        }
                        $this->renderMobileGroupItems($group, $lang);
                    }
                    ?>
                </div>
            </div>
            <?php
        }
    }

    /* Mobile equivalent of renderMenuGroupItems(): same auto_list expansion
       (live agents/services/sectors/formations) plus manual items, but as
       flat accordion links with a small thumbnail next to the title instead
       of the desktop card/sublink markup. */
    private function renderMobileGroupItems($group, $lang)
    {
        global $siteURL, $db;
        $auto = $group->getAutoList();

        if ($auto === 'service_children') {
            $parentRecord = $this->resolveMenuRecord($group->getType(), $group->getIdItem(), $lang);
            $children = $parentRecord ? $parentRecord->getChildren($lang, true, true) : array();
            foreach ($children as $child) {
                $img = $siteURL . 'images/services/' . $child->getPhoto();
                echo '<a href="' . $child->getLink() . '" class="mm-acc-item"><img class="mm-acc-thumb" data-src="' . $img . '" alt=""><b>' . htmlspecialchars($child->getTitre(), ENT_QUOTES, 'UTF-8') . '</b></a>';
            }
        } elseif (in_array($auto, array('formation', 'agent_ia', 'secteur'))) {
            $records = array();
            if ($auto === 'formation') {
                $records = formation::findAll($lang, true);
            } elseif ($auto === 'agent_ia') {
                $records = agent_ia::findAll($lang, true);
            } elseif ($auto === 'secteur') {
                $records = secteur::findAll($lang, true);
            }
            $limit = $group->getAutoLimit();
            if ($limit) {
                $records = array_slice($records, 0, $limit);
            }
            foreach ($records as $rec) {
                $photo = method_exists($rec, 'getPhotoProduit') && $rec->getPhotoProduit() ? $rec->getPhotoProduit() : $rec->getPhoto();
                $img = $photo ? $siteURL . self::$menuImgDirByType[$auto] . $photo : $siteURL . 'images/pages/formation.webp';
                echo '<a href="' . $rec->getLink() . '" class="mm-acc-item"><img class="mm-acc-thumb" data-src="' . $img . '" alt=""><b>' . htmlspecialchars($rec->getTitre(), ENT_QUOTES, 'UTF-8') . '</b></a>';
            }
        }

        $manualIds = $group->getSousMenu();
        foreach ($manualIds as $mid) {
            $item = new menu_item($mid, $db, $lang);
            $type = $item->getType();
            $record = $this->resolveMenuRecord($type, $item->getIdItem(), $lang);
            $link = trim((string)$item->getLien());
            if ($link === '' || $type !== 'ext') {
                $link = $record ? $record->getLink() : '#';
            }
            $title = $item->getTitre() ?: ($record ? $record->getTitre() : '');
            $img = $this->resolveMenuImage($item, $type, $record);
            echo '<a href="' . $link . '" class="mm-acc-item"><img class="mm-acc-thumb" data-src="' . $img . '" alt=""><b>' . htmlspecialchars($title, ENT_QUOTES, 'UTF-8') . '</b></a>';
        }
    }

    public static function menuExist()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;
    }


    public function findAllParentItem($activeOnly = true)
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE id_menu = " . intval($this->id) . " AND parent_id = 0";
        if ($activeOnly) {
            $SQLselect .= " AND (active IS NULL OR active = 1)";
        }
        $SQLselect .= " ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;

    }

    public function findAllChildItem()
    {
        global $db;
        $ids = array();
        $SQLselect = "SELECT id FROM " . __prefixe_db__ . "menu_items WHERE id_menu = $this->id ORDER BY ordre ASC";
        $result = $db->queryS($SQLselect);
        foreach ($result as $data) {
            array_push($ids, $data['id']);
        }
        return $ids;

    }
    
    /* ══ Data-driven mega menu renderer ═══════════════════════════════════
       Reads menu id=3 from hw_menu_items/hw_details_menu_item (managed via
       the admin "Menu" module) instead of hardcoded HTML. Structure:
       level 1 = panel (nav rubric + mega panel), level 2 = group (a column
       inside a panel; single-group panels render one flat list/grid),
       level 3 = item (a manual card/sublink, or expanded live records when
       the group's auto_list is set). See plan doc for full field reference. */

    private static $menuImgDirByType = array(
        'service'   => 'images/services/',
        'page'      => 'images/pages/',
        'agent_ia'  => 'images/agents_ia/',
        'formation' => 'images/formations/',
        'secteur'   => 'images/secteur/',
        'reference' => 'images/references/',
        'produit'   => 'images/produits/',
        'pack'      => 'images/packs/',
    );

    private function resolveMenuRecord($type, $idItem, $lang)
    {
        global $db;
        if ($type === 'ext' || empty($idItem)) {
            return null;
        }
        if (method_exists($type, 'find')) {
            return $type::find($idItem, $lang);
        }
        return new $type($idItem, $db, $lang);
    }

    private function menuRecordImage($type, $record)
    {
        global $siteURL;
        if (!$record || !method_exists($record, 'getPhoto') || !$record->getPhoto()) {
            return null;
        }
        $dir = isset(self::$menuImgDirByType[$type]) ? self::$menuImgDirByType[$type] : 'images/pages/';
        return $siteURL . $dir . $record->getPhoto();
    }

    private function resolveMenuImage($item, $type, $record)
    {
        global $siteURL;
        $img = $item->getImage();
        if ($img) {
            return (strpos($img, 'http://') === 0 || strpos($img, 'https://') === 0) ? $img : $siteURL . $img;
        }
        $fromRecord = $this->menuRecordImage($type, $record);
        return $fromRecord ? $fromRecord : $siteURL . 'images/pages/formation.webp';
    }

    private function pickMenuTestimonial($validTestimonials, $pinnedId = null)
    {
        if ($pinnedId) {
            foreach ($validTestimonials as $t) {
                if (method_exists($t, 'getId') && $t->getId() == $pinnedId) {
                    return $t;
                }
            }
        }
        return !empty($validTestimonials) ? $validTestimonials[array_rand($validTestimonials)] : null;
    }

    private function renderMenuFoot($panelIndex, $testimonial)
    {
        $quote  = $testimonial ? htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8') : '';
        $author = $testimonial ? htmlspecialchars($testimonial->getNom(), ENT_QUOTES, 'UTF-8') : '';
        $role   = $testimonial ? htmlspecialchars($testimonial->getFonction(), ENT_QUOTES, 'UTF-8') : '';
        return '
            <div class="mega-foot stag" style="--i:' . $panelIndex . '">
                <p class="foot-title" data-foottitle></p>
                <div class="foot-row">
                    <div class="rating">
                        <span class="rating-num">' . $GLOBALS['lang']['MEGA_REVIEWS_SCORE'][$_SESSION['lang']] . '</span>
                        <div class="stars" aria-label="' . $GLOBALS['lang']['MEGA_REVIEWS_ARIA'][$_SESSION['lang']] . '">★★★★★</div>
                    </div>
                    <p class="quote" data-quote>' . $quote . '</p>
                    <div class="who">
                        <span class="ava" data-ava></span>
                        <span class="who-txt">
                            <b data-author>' . $author . '</b>
                            <span class="role" data-role>' . $role . '</span>
                        </span>
                    </div>
                </div>
            </div>';
    }

    /* Renders the <a> markup for one concrete item (manual, or one expanded
       row of an auto_list). $data carries: link, service (title), desc,
       img, ico, grad, packsHtmlBank (base64, only for card_style=sublink
       service items), featureLines (array, only for card_style=card). */
    private function renderMenuCardMarkup($cardStyle, $data, $styleIndex, $extraClass = '')
    {
        $service = htmlspecialchars($data['service'], ENT_QUOTES, 'UTF-8');
        $desc    = htmlspecialchars($data['desc'], ENT_QUOTES, 'UTF-8');
        $grad    = htmlspecialchars($data['grad'], ENT_QUOTES, 'UTF-8');
        $ico     = htmlspecialchars($data['ico'], ENT_QUOTES, 'UTF-8');
        $img     = $data['img'];
        $link    = $data['link'];
        $packs   = isset($data['packsHtmlBank']) ? htmlspecialchars(base64_encode($data['packsHtmlBank']), ENT_QUOTES) : '';

        if ($cardStyle === 'card') {
            $feat = '';
            foreach ((isset($data['featureLines']) ? $data['featureLines'] : array()) as $line) {
                $feat .= '<li>' . htmlspecialchars($line, ENT_QUOTES, 'UTF-8') . '</li>';
            }
            return '
                <a class="card stag' . $extraClass . '" style="--i:' . $styleIndex . '"
                   href="' . $link . '"
                   data-service="' . $service . '"
                   data-img="' . $img . '"
                   data-packs="' . $packs . '"
                   data-ico="' . $ico . '"
                   data-grad="' . $grad . '">
                    <div class="card-h">
                        <span class="thumb ' . $grad . '">
                            <img src="' . $img . '" alt="' . $service . '">
                        </span>
                    </div>
                    <h3 class="card-title">' . $service . '</h3>
                    <ul class="feat">' . $feat . '</ul>
                </a>';
        }

        // sublink style
        $quote  = isset($data['quote']) ? htmlspecialchars($data['quote'], ENT_QUOTES, 'UTF-8') : '';
        $author = isset($data['author']) ? htmlspecialchars($data['author'], ENT_QUOTES, 'UTF-8') : '';
        $role   = isset($data['role']) ? htmlspecialchars($data['role'], ENT_QUOTES, 'UTF-8') : '';
        return '
            <a class="custom-sublink sublink stag' . $extraClass . '" style="--i:' . $styleIndex . '"
               href="' . $link . '"
                data-service="' . $service . '"
                data-desc="' . $desc . '"
                data-img="' . $img . '"
                data-packs="' . $packs . '"
                data-ico="' . $ico . '"
                data-grad="' . $grad . '"
                data-quote="' . $quote . '"
                data-author="' . $author . '"
                data-role="' . $role . '">
                <span class="thumb ' . $grad . '" data-thumb>
                    <img loading="lazy" src="' . $img . '" alt="' . $service . '">
                    <span class="thumb-ico"></span>
                </span>
                <span class="tx">
                    <span class="ttl">' . $service . '</span>
                    <span class="desc">' . $desc . '</span>
                </span>
            </a>';
    }

    /* Expands one group's items: manual rows as-is, auto_list rows into N
       live records. Returns [html, hasPacks] so the caller can decide
       whether to render the packs-grid container. */
    private function renderMenuGroupItems($group, $lang, $panelFallbackLink, $validTestimonials)
    {
        global $siteURL;
        $cardStyle = $group->getCardStyle();
        $auto = $group->getAutoList();
        $html = '';
        $hasPacks = false;
        $i = 1;
        $children = array();

        if ($auto === 'service_children') {
            $parentRecord = $this->resolveMenuRecord($group->getType(), $group->getIdItem(), $lang);
            $children = $parentRecord ? $parentRecord->getChildren($lang, true, true) : array();
            // Web & Mobile (service id 107) has always shown a fixed, hand-picked
            // set of feature bullets per child service rather than an excerpt of
            // its own content -- restored verbatim from the original markup.
            $webMobileFeatures = array(
                39 => array($GLOBALS['lang']['MEGA_WM_IOS'][$lang], $GLOBALS['lang']['MEGA_WM_ANDROID'][$lang], $GLOBALS['lang']['MEGA_WM_HYBRIDE'][$lang]),
                38 => array($GLOBALS['lang']['MEGA_WM_VITRINES'][$lang], $GLOBALS['lang']['MEGA_WM_ECOMMERCE'][$lang], $GLOBALS['lang']['MEGA_WM_APPS_SUR_MESURE'][$lang], $GLOBALS['lang']['MEGA_WM_INTEGRATIONS'][$lang]),
                40 => array($GLOBALS['lang']['MEGA_WM_AUDIT_SEO'][$lang], $GLOBALS['lang']['MEGA_WM_CWV'][$lang], $GLOBALS['lang']['MEGA_WM_KEYWORDS'][$lang], $GLOBALS['lang']['MEGA_WM_SEO_ONPAGE'][$lang]),
            );
            $webMobileDefaultFeature = array($GLOBALS['lang']['MEGA_WM_ESPACES_RGPD'][$lang], $GLOBALS['lang']['MEGA_WM_DASHBOARDS'][$lang], $GLOBALS['lang']['MEGA_WM_INTEGRATIONS'][$lang]);
            $isWebMobileGroup = ((int)$group->getIdItem() === 107);
            foreach ($children as $child) {
                $packs = pack::findAll($lang, true, true, $child->getId());
                $packsHtmlBank = '';
                foreach ($packs as $pack) {
                    $hasPacks = true;
                    $packsHtmlBank .= '<a class="pack grad-web" href="' . $child->getLink() . '"><img loading="lazy" src="' . $siteURL . 'images/packs/' . $pack->getPhoto() . '" alt="' . htmlspecialchars($pack->getTitre()) . '"><span class="pk-tag">Pack</span><span class="pk-title">' . htmlspecialchars($pack->getTitre(), ENT_QUOTES, 'UTF-8') . '</span></a>';
                }
                $desc = menu_item::shortenDescription('', $child, 90);
                if ($isWebMobileGroup) {
                    $lines = isset($webMobileFeatures[$child->getId()]) ? $webMobileFeatures[$child->getId()] : $webMobileDefaultFeature;
                } else {
                    $feature = trim(html_entity_decode(strip_tags($child->getExtrait() ? $child->getExtrait() : $child->getTexteAccueil()), ENT_QUOTES, 'UTF-8'));
                    $lines = $feature !== '' ? preg_split('/\r\n|\r|\n/', $feature) : array($desc);
                }
                $t = $this->pickMenuTestimonial($validTestimonials);
                $html .= $this->renderMenuCardMarkup($cardStyle, array(
                    'link' => $child->getLink(),
                    'service' => $child->getTitre(),
                    'desc' => $desc,
                    'img' => $siteURL . 'images/services/' . $child->getPhoto(),
                    'ico' => $group->getIcon() ? $group->getIcon() : 'palette',
                    'grad' => $group->getGradient() ? $group->getGradient() : 'grad-brand',
                    'packsHtmlBank' => $packsHtmlBank,
                    'featureLines' => $lines,
                    'quote' => $t ? strip_tags($t->getTemoignage()) : '',
                    'author' => $t ? $t->getNom() : '',
                    'role' => $t ? $t->getFonction() : '',
                ), $i);
                $i++;
            }
        } elseif (in_array($auto, array('formation', 'agent_ia', 'secteur'))) {
            $records = array();
            if ($auto === 'formation') {
                $records = formation::findAll($lang, true);
            } elseif ($auto === 'agent_ia') {
                $records = agent_ia::findAll($lang, true);
            } elseif ($auto === 'secteur') {
                $records = secteur::findAll($lang, true);
            }
            $limit = $group->getAutoLimit();
            if ($limit) {
                $records = array_slice($records, 0, $limit);
            }
            foreach ($records as $rec) {
                $photo = method_exists($rec, 'getPhotoProduit') && $rec->getPhotoProduit() ? $rec->getPhotoProduit() : $rec->getPhoto();
                $img = $photo ? $siteURL . self::$menuImgDirByType[$auto] . $photo : $siteURL . 'images/pages/formation.webp';
                $desc = menu_item::shortenDescription('', $rec, 70);
                $html .= $this->renderMenuCardMarkup($cardStyle, array(
                    'link' => $rec->getLink(),
                    'service' => $rec->getTitre(),
                    'desc' => $desc,
                    'img' => $img,
                    'ico' => $group->getIcon() ? $group->getIcon() : 'grid',
                    'grad' => $group->getGradient() ? $group->getGradient() : 'grad-sol',
                    'featureLines' => array($desc),
                ), $i);
                $i++;
            }
        }

        // manual level-3 items (always rendered after any auto-expanded ones,
        // e.g. the trailing "Voir tout..." link)
        $manualIds = $group->getSousMenu();
        foreach ($manualIds as $mid) {
            $item = new menu_item($mid, $GLOBALS['db'], $lang);
            $type = $item->getType();
            $record = $this->resolveMenuRecord($type, $item->getIdItem(), $lang);
            $link = trim((string)$item->getLien());
            if ($link === '') {
                $link = $record ? $record->getLink() : $panelFallbackLink;
            } elseif ($type !== 'ext') {
                $link = $record ? $record->getLink() : $panelFallbackLink;
            }
            $title = $item->getTitre() ?: ($record ? $record->getTitre() : '');
            // The trailing "Voir tout..." link under a service_children group
            // has always shown a live count ("N expertises disponibles")
            // rather than a manually authored description.
            if ($auto === 'service_children' && (stripos($title, 'Voir tout') === 0 || stripos($title, 'See all') === 0)) {
                $desc = count($children) . ' ' . $GLOBALS['lang']['MEGA_EXPERTISES_SUFFIX'][$lang];
            } else {
                $desc = menu_item::shortenDescription($item->getDescription(), $record, $cardStyle === 'card' ? 200 : 90);
            }
            $img = $this->resolveMenuImage($item, $type, $record);
            $ico = $item->getIcon();
            $grad = $group->getGradient() ? $group->getGradient() : ($item->getGradient() ?: 'grad-sol');

            if ($item->getShowPacks() && $type === 'service' && $item->getIdItem()) {
                $packs = pack::findAll($lang, true, true, $item->getIdItem());
                $packsHtmlBank = '';
                foreach ($packs as $pack) {
                    $hasPacks = true;
                    $packsHtmlBank .= '<a class="pack grad-web" href="' . $link . '"><img loading="lazy" src="' . $siteURL . 'images/packs/' . $pack->getPhoto() . '" alt="' . htmlspecialchars($pack->getTitre()) . '"><span class="pk-tag">Pack</span><span class="pk-title">' . htmlspecialchars($pack->getTitre(), ENT_QUOTES, 'UTF-8') . '</span></a>';
                }
            } else {
                $packsHtmlBank = '';
            }

            $lines = $cardStyle === 'card' ? preg_split('/\r\n|\r|\n/', $desc) : array($desc);
            $html .= $this->renderMenuCardMarkup($cardStyle, array(
                'link' => $link,
                'service' => $title,
                'desc' => $cardStyle === 'card' ? '' : $desc,
                'img' => $img,
                'ico' => $ico,
                'grad' => $grad,
                'packsHtmlBank' => $packsHtmlBank,
                'featureLines' => $lines,
            ), $i, stripos($title, 'Voir tout') === 0 || stripos($title, 'Voir tous') === 0 || stripos($title, 'See all') === 0 ? ' sublink-all' : '');
            $i++;
        }

        return array($html, $hasPacks);
    }

    public function getMegaMenu($deep = 0, $mobile = false)
    {
        global $db, $siteURL;
        $lang = $_SESSION['lang'];
        $contactPage = getComponent("com_contact");
        $realisationPage = getComponent("com_reference");
        $testimonials = temoignage::findAllGlobal($lang, true, true);
        $validTestimonials = array_values(array_filter($testimonials, function ($t) {
            return trim(strip_tags($t->getTemoignage())) !== '';
        }));

        $panelIds = $this->findAllParentItem();
        $menuHTML = '';
        $panelIndex = 0;

        foreach ($panelIds as $pid) {
            $panelIndex++;
            $panel = new menu_item($pid, $db, $lang);
            $type = $panel->getType();
            $record = $this->resolveMenuRecord($type, $panel->getIdItem(), $lang);

            $panelKey = htmlspecialchars($panel->getPanelKey(), ENT_QUOTES, 'UTF-8');
            $panelLink = $panel->getLink();
            $panelTitle = $panel->getTitre() ?: ($record ? $record->getTitre() : '');
            $panelDesc = menu_item::shortenDescription($panel->getDescription(), $record, 200);
            $panelImg = $this->resolveMenuImage($panel, $type, $record);
            $badge = htmlspecialchars($panel->getBadge(), ENT_QUOTES, 'UTF-8');
            $grad = htmlspecialchars($panel->getGradient(), ENT_QUOTES, 'UTF-8');
            $ico = htmlspecialchars($panel->getIcon(), ENT_QUOTES, 'UTF-8');

            $testimonial = $this->pickMenuTestimonial($validTestimonials, $panel->getTestimonialId());
            $tQuote = $testimonial ? htmlspecialchars(strip_tags($testimonial->getTemoignage()), ENT_QUOTES, 'UTF-8') : '';
            $tAuthor = $testimonial ? htmlspecialchars($testimonial->getNom(), ENT_QUOTES, 'UTF-8') : '';
            $tRole = $testimonial ? htmlspecialchars($testimonial->getFonction(), ENT_QUOTES, 'UTF-8') : '';

            // The Web & Mobile panel's primary CTA has always pointed to the
            // realisations page rather than its own service page.
            $ctaLink = ($panel->getPanelKey() === 'web') ? $realisationPage->getLink() : $panelLink;
            $ctaLabelRaw = $panel->getCtaLabel();
            if (!$ctaLabelRaw) {
                $ctaLabelRaw = $GLOBALS['lang']['MEGA_CTA_DECOUVRIR'][$_SESSION['lang']];
            } elseif ($_SESSION['lang'] === 'en') {
                $ctaLabelMap = array(
                    'Découvrir' => $GLOBALS['lang']['MEGA_CTA_DECOUVRIR']['en'],
                    'Voir nos réalisations' => $GLOBALS['lang']['MEGA_CTA_VOIR_REALISATIONS']['en'],
                    'Lancer mon produit' => $GLOBALS['lang']['MEGA_CTA_LANCER_PRODUIT']['en'],
                    'Voir le calendrier' => $GLOBALS['lang']['MEGA_CTA_VOIR_CALENDRIER']['en'],
                    'Parcourir' => $GLOBALS['lang']['MEGA_CTA_PARCOURIR']['en'],
                );
                if (isset($ctaLabelMap[$ctaLabelRaw])) {
                    $ctaLabelRaw = $ctaLabelMap[$ctaLabelRaw];
                }
            }
            $ctaLabel = htmlspecialchars($ctaLabelRaw, ENT_QUOTES, 'UTF-8');

            $menuHTML .= '
<div class="mega glass-mega glass-nav" data-panel="' . $panelKey . '">
    <div class="mega-inner">
        <div class="visual stag" style="--i:0"
             data-def-service="' . htmlspecialchars($panelTitle, ENT_QUOTES, 'UTF-8') . '"
             data-def-desc="' . htmlspecialchars($panelDesc, ENT_QUOTES, 'UTF-8') . '"
             data-def-ico="' . $ico . '"
             data-def-grad="' . $grad . '"
             data-def-img="' . $panelImg . '"
             data-def-quote="' . $tQuote . '"
             data-def-author="' . $tAuthor . '"
             data-def-role="' . $tRole . '"
             data-def-cat="">
            <a class="vimg-link" href="' . $panelLink . '">
                <span class="vimg-wrap ' . $grad . '" data-vgrad>
                    <span class="vico" data-vico></span>
                    <img class="vimg" data-vimg alt="">
                </span>
            </a>
            <div class="cap">
                <span class="badge">' . $badge . '</span>
                <h4 data-vtitle></h4>
                <p data-vdesc></p>
                <div class="vactions">
                    <a class="v-pill v-disc" href="' . $ctaLink . '">' . $ctaLabel . ' →</a>
                    <a class="v-pill v-expert" href="' . $contactPage->getLink() . '">' . $GLOBALS['lang']['MEGA_CTA_PARLER_EXPERT'][$_SESSION['lang']] . ' <b data-vservice></b></a>
                </div>
            </div>
        </div>
        <div class="mega-content">';

            $groupIds = $panel->getSousMenu();
            $isMulti = count($groupIds) > 1;
            $anyPacks = false;

            // Agents IA and Sectoriel lists are dense (up to 23 rows), so their
            // sublink rows use tighter vertical spacing than other groups.
            $tightAutoLists = array('agent_ia', 'secteur');

            if (count($groupIds) === 1) {
                $group = new menu_item($groupIds[0], $db, $lang);
                $colsClass = $group->getCardStyle() === 'card' ? 'cols-3' : 'cols-2';
                if (in_array($group->getAutoList(), $tightAutoLists)) {
                    $colsClass .= ' mm-tight-list';
                }
                $menuHTML .= '<p class="eyebrow dark stag" style="--i:1">' . htmlspecialchars($group->getTitre(), ENT_QUOTES, 'UTF-8') . '</p>';
                $menuHTML .= '<div class="' . $colsClass . '">';
                list($itemsHtml, $hasPacks) = $this->renderMenuGroupItems($group, $lang, $panelLink, $validTestimonials);
                $menuHTML .= $itemsHtml . '</div>';
                $anyPacks = $hasPacks;
            } elseif ($isMulti) {
                $menuHTML .= '<div class="cols-3">';
                $gi = 1;
                foreach ($groupIds as $gid) {
                    $group = new menu_item($gid, $db, $lang);
                    $divClass = $gi > 1 ? 'divider stag' : 'stag';
                    if (in_array($group->getAutoList(), $tightAutoLists)) {
                        $divClass .= ' mm-tight-list';
                    }
                    $menuHTML .= '<div class="' . $divClass . '" style="--i:' . $gi . '"><p class="eyebrow dark">' . htmlspecialchars($group->getTitre(), ENT_QUOTES, 'UTF-8') . '</p>';
                    list($itemsHtml, $hasPacks) = $this->renderMenuGroupItems($group, $lang, $panelLink, $validTestimonials);
                    $menuHTML .= $itemsHtml . '</div>';
                    $anyPacks = $anyPacks || $hasPacks;
                    $gi++;
                }
                $menuHTML .= '</div>';
            }

            $menuHTML .= '</div>'; // mega-content
            $menuHTML .= '</div>'; // mega-inner -- packs/mega-foot below are full-width siblings of mega-inner, not nested in its 2-col grid

            if ($anyPacks) {
                $menuHTML .= '
             <div class="packs stag" style="--i:10">
                <p class="packs-title">' . $GLOBALS['lang']['MEGA_PACKS_TITLE'][$lang] . '</p>
                <div class="packs-grid" id="packsGrid-' . $panelKey . '"></div>
            </div>';
            }

            $menuHTML .= $this->renderMenuFoot($panelIndex + 10, $testimonial);
            $menuHTML .= '
    </div>';
        }

        echo $menuHTML;
    }
}

?>