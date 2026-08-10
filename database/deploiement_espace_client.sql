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

-- Rappel : la colonne id_temoignage est DÉJÀ incluse dans le CREATE ci-dessus.
-- (En local, elle avait été ajoutée en 2 temps. En prod, le CREATE suffit.)
-- Si — et seulement si — la table existait déjà SANS cette colonne, décommente :
-- ALTER TABLE `hw_avis_client` ADD COLUMN `id_temoignage` INT NULL AFTER `id_client`;


-- =====================================================================
--  SECTION B — BASE DU CRM (crm_new en local / keha1057_crm en prod)
--  Fonctionnalité : réponse de l'admin à une réclamation client
--  (visible dans l'espace client, + e-mail au client).
-- =====================================================================

ALTER TABLE `crm_reclamation`
  ADD COLUMN `reponse`      MEDIUMTEXT NULL,
  ADD COLUMN `date_reponse` DATETIME NULL;

-- =====================================================================
--  Fin. Rappels HORS SQL pour la mise en ligne :
--   - config du SITE : renseigner GOOGLE_CLIENT_ID et GMB_REVIEW_URL
--   - config du CRM  : renseigner GOOGLE_CLIENT_ID (même valeur que le site)
--   - déployer les fichiers PHP du CRM (connexion sociale + réclamations)
--   - dossiers du CRM en écriture : vendor/mpdf/mpdf/tmp et uploads (PDF)
-- =====================================================================
