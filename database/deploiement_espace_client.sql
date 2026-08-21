-- =====================================================================
--  Déploiement Espace client — changements de base de données
--  Généré pour la mise en ligne. À exécuter UNE fois en production.
--
--  ⚠️ Deux bases DIFFÉRENTES sont concernées :
--     - SECTION A  → base du SITE   (local: helloworldlang | prod: ta base hwm_new)
--     - SECTION B  → base du CRM     (local: crm_new        | prod: keha1057_crm)
--  Exécute chaque section sur la BONNE base (ne pas tout lancer d'un coup).
-- =====================================================================


-- =====================================================================
--  SECTION A — BASE DU SITE (helloworldlang)
--  Fonctionnalité : avis / témoignage laissé par le client dans l'espace client.
--  Le témoignage alimente ensuite hw_temoignage / hw_details_temoignage
--  (déjà existantes) ; cette table sert de pont (note + lien + modération).
-- =====================================================================

CREATE TABLE IF NOT EXISTS `hw_avis_client` (
  `id`            INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`     INT NULL,                 -- id du client (CRM)
  `id_temoignage` INT NULL,                 -- lien vers hw_temoignage créé
  `client_nom`    VARCHAR(255) NULL,        -- nom affiché (prénom + nom)
  `client_email`  VARCHAR(255) NULL,
  `note`          TINYINT NOT NULL DEFAULT 5,   -- note 1 à 5
  `message`       MEDIUMTEXT NOT NULL,          -- texte du témoignage
  `statut`        TINYINT NOT NULL DEFAULT 0,   -- suivi interne (0 = envoyé)
  `date_add`      DATETIME NOT NULL,
  `last_edit`     DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --- Parrainage : un client (parrain) recommande un prospect (filleul).
--     Suivi + attribution des récompenses côté agence (manuel).
CREATE TABLE IF NOT EXISTS `hw_parrainage` (
  `id`                 INT AUTO_INCREMENT PRIMARY KEY,
  `id_parrain`         INT NULL,                 -- id du client parrain (CRM)
  `parrain_nom`        VARCHAR(255) NULL,
  `parrain_email`      VARCHAR(255) NULL,
  `filleul_nom`        VARCHAR(255) NOT NULL,
  `filleul_entreprise` VARCHAR(255) NULL,
  `filleul_email`      VARCHAR(255) NOT NULL,
  `filleul_tel`        VARCHAR(50) NULL,
  `message`            MEDIUMTEXT NULL,
  `statut`             TINYINT NOT NULL DEFAULT 0,  -- 0 en attente, 1 contacté, 2 converti, 3 clôturé
  `recompense`         VARCHAR(255) NULL,           -- récompense attribuée (texte libre)
  `recompense_donnee`  TINYINT NOT NULL DEFAULT 0,
  `date_add`           DATETIME NOT NULL,
  `last_edit`          DATETIME NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Rappel : la colonne id_temoignage est DÉJÀ incluse dans le CREATE ci-dessus.
-- (En local, elle avait été ajoutée en 2 temps. En prod, le CREATE suffit.)
-- Si — et seulement si — la table existait déjà SANS cette colonne, décommente :
-- ALTER TABLE `hw_avis_client` ADD COLUMN `id_temoignage` INT NULL AFTER `id_client`;

-- --- Points de fidélité : historique des gains (avis laissé, parrainage
--     converti, attestation signée/téléchargée...). Le total affiché dans
--     l'espace client (onglet Club Élite) est la SOMME des lignes de cette
--     table pour le client, pas une colonne dénormalisée.
CREATE TABLE IF NOT EXISTS `hw_points_client` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`  INT NOT NULL,                  -- id du client (CRM)
  `points`     INT NOT NULL,                  -- toujours positif ici (que des gains pour l'instant)
  `type`       VARCHAR(50) NOT NULL,          -- avis / parrainage / attestation / attestation_telechargement
  `libelle`    VARCHAR(255) NULL,             -- texte affiché dans l'historique
  `date_add`   DATETIME NOT NULL,
  KEY `idx_id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --- Demandes du client depuis l'onglet "Découvrir" (essai/commande d'un
--     agent IA, inscription à une formation, commande d'un service). Une
--     table générique pour les 4 cas, notifiée par e-mail à l'agence ;
--     id_ref pointe vers l'entité CRM correspondante (agent_ia/formation),
--     NULL pour les services (lien externe, pas d'id local).
CREATE TABLE IF NOT EXISTS `hw_demande_client` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`  INT NOT NULL,                              -- id du client (CRM)
  `type`       VARCHAR(30) NOT NULL,                       -- agent_essai / agent_commande / formation / service
  `id_ref`     INT NULL,                                   -- id CRM de l'agent/la formation concernée
  `ref_titre`  VARCHAR(255) NOT NULL,                       -- titre affiché (figé au moment de la demande)
  `ref_slug`   VARCHAR(255) NULL,
  `message`    MEDIUMTEXT NULL,                             -- message libre du client (optionnel)
  `statut`     TINYINT NOT NULL DEFAULT 0,                  -- 0 nouvelle, 1 en cours, 2 traitée
  `date_add`   DATETIME NOT NULL,
  KEY `idx_id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --- Historique de connexion : une ligne par connexion réussie (login classique
--     ou sociale). Sert uniquement à calculer le bonus de fidélité "connexion
--     régulière" (voir clCheckMonthlyLoginBonus dans le contrôleur) — pas de
--     finalité de sécurité/audit ici.
CREATE TABLE IF NOT EXISTS `hw_client_login_log` (
  `id`         INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`  INT NOT NULL,
  `date_add`   DATETIME NOT NULL,
  KEY `idx_id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --- Paliers de récompenses : dès qu'un client franchit un seuil de points
--     (10/20/50/100 — voir clCheckRewardThresholds dans le contrôleur ET son
--     équivalent côté CRM dans com_fidelite/classes/fidelite.php, les deux
--     DOIVENT rester synchronisés), une ligne est débloquée ici. `statut`
--     suit si l'agence a effectivement remis la récompense (audit, formation,
--     budget Ads, remise — geste manuel, jamais automatique) ; `notifie`
--     évite de réafficher le message de félicitations au client à chaque visite.
CREATE TABLE IF NOT EXISTS `hw_client_rewards` (
  `id`             INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`      INT NOT NULL,
  `seuil`          INT NOT NULL,
  `libelle`        VARCHAR(255) NOT NULL,
  `statut`         TINYINT NOT NULL DEFAULT 0,  -- 0 débloqué/en attente, 1 affecté par l'agence
  `notifie`        TINYINT NOT NULL DEFAULT 0,  -- 0 message de félicitations pas encore vu, 1 déjà vu
  `notifie_don`    TINYINT NOT NULL DEFAULT 0,  -- 0 popup "contactez l'agence" pas encore vu, 1 déjà vu
  `date_debloque`  DATETIME NOT NULL,
  `date_affecte`   DATETIME NULL,
  `affecte_par`    VARCHAR(255) NULL,           -- utilisateur CRM qui a marqué la récompense comme donnée
  KEY `idx_id_client` (`id_client`),
  UNIQUE KEY `uniq_client_seuil` (`id_client`, `seuil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Si la table existait déjà (installation antérieure à l'ajout de
-- notifie_don), ajoute la colonne manquante :
-- ALTER TABLE `hw_client_rewards` ADD COLUMN `notifie_don` TINYINT NOT NULL DEFAULT 0 AFTER `notifie`;

-- Rattrapage ponctuel : les clients qui avaient déjà accumulé des points
-- AVANT la mise en place de ce système de paliers doivent aussi voir leurs
-- récompenses déjà méritées débloquées (sinon un client à 140 points, par
-- exemple, se retrouve sans aucun palier tant qu'il ne regagne pas de
-- points après le déploiement). Idempotent (INSERT IGNORE + contrainte
-- UNIQUE) — sans effet si déjà exécuté.
INSERT IGNORE INTO `hw_client_rewards` (`id_client`, `seuil`, `libelle`, `date_debloque`)
SELECT t.id_client, s.seuil, s.libelle, NOW()
FROM (SELECT id_client, SUM(points) AS total FROM `hw_points_client` GROUP BY id_client) t
CROSS JOIN (
    SELECT 10 AS seuil, 'Audit SEO offert' AS libelle
    UNION ALL SELECT 20, 'Formation offerte'
    UNION ALL SELECT 50, 'Crédits publicitaires Google Ads'
    UNION ALL SELECT 100, 'Remise de 10% sur votre prochaine facture'
) s
WHERE t.total >= s.seuil;


-- =====================================================================
--  SECTION B — BASE DU CRM (crm_new en local / keha1057_crm en prod)
--  Fonctionnalité : réponse de l'admin à une réclamation client
--  (visible dans l'espace client, + e-mail au client).
-- =====================================================================

ALTER TABLE `crm_reclamation`
  ADD COLUMN `reponse`      MEDIUMTEXT NULL,
  ADD COLUMN `date_reponse` DATETIME NULL;

-- --- Attestations de référence : document (PDF/Word) déposé par l'agence
--     depuis la fiche CRM du client, "signé" dans l'espace client (nom tapé +
--     confirmation, horodaté + IP — pas une signature manuscrite). Le premier
--     téléchargement est aussi daté/tracé (download_date/download_ip), qu'il
--     ait lieu avant ou après la signature.
CREATE TABLE IF NOT EXISTS `crm_attestation` (
  `id`             INT AUTO_INCREMENT PRIMARY KEY,
  `id_client`      INT NOT NULL,
  `id_agence`      INT NULL,
  `titre`          VARCHAR(255) NOT NULL,
  `message`        MEDIUMTEXT NULL,
  `fichier`        VARCHAR(255) NULL,           -- nom du fichier dans uploads/attestations/
  `statu`          TINYINT NOT NULL DEFAULT 0,  -- 0 en attente, 1 signée
  `signature_nom`  VARCHAR(255) NULL,
  `signature_date` DATETIME NULL,
  `signature_ip`   VARCHAR(64) NULL,
  `download_date`  DATETIME NULL,
  `download_ip`    VARCHAR(64) NULL,
  `id_user_added`  INT NULL,                    -- utilisateur CRM qui a déposé le document
  `date_add`       DATETIME NOT NULL,
  KEY `idx_id_client` (`id_client`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --- Espace Fidélité (admin CRM, module com_fidelite) : gère les points de
--     fidélité des clients — les points eux-mêmes restent dans la base du
--     SITE (hw_points_client, SECTION A), le CRM n'est qu'une couche
--     d'administration par-dessus (voir hw_crm/components/com_fidelite/).
--     Pas de nouvelle table ici : seulement le module + les permissions.
--     ⚠️ Adapter la valeur d'`ordre` si un module 'ordre'=13 existe déjà en
--     prod dans crm_modules (positioned='side').
INSERT IGNORE INTO `crm_modules` (`id_module`, `enabled`, `installed`, `nom`, `classe`, `nom_table`, `translated`, `url`, `system`, `icon`, `positioned`, `ordre`)
VALUES ('com_fidelite', 1, 1, 'Espace Fidélité', 'fidelite', '', 0, 0, 0, 'star', 'side', 13);

INSERT IGNORE INTO `crm_droits` (`id_profil`, `module`, `action`) VALUES
  (1, 'com_fidelite', 'view'),
  (1, 'com_fidelite', 'add'),
  (1, 'com_fidelite', 'edit'),
  (1, 'com_fidelite', 'delete');

-- =====================================================================
--  Fin. Rappels HORS SQL pour la mise en ligne :
--   - config du SITE : renseigner GOOGLE_CLIENT_ID et GMB_REVIEW_URL
--   - config du CRM  : renseigner GOOGLE_CLIENT_ID (même valeur que le site)
--   - déployer les fichiers PHP du CRM (connexion sociale + réclamations)
--   - dossiers du CRM en écriture : vendor/mpdf/mpdf/tmp et uploads (PDF)
-- =====================================================================
