-- Passage de 5 images de blog/emploi du PNG au WebP (-46 % a -90 %, qualite conservee).
-- A lancer sur la base du serveur APRES le "git pull" qui ajoute les fichiers .webp.
-- Les anciens .png restent sur le serveur : un retour en arriere est possible a tout moment.

UPDATE hw_blog SET photo          = 'blog12.webp'   WHERE photo          = 'blog12.png';
UPDATE hw_blog SET photo_banniere = 'blog13.webp'   WHERE photo_banniere = 'blog13.png';
UPDATE hw_blog SET photo          = 'blog100.webp'  WHERE photo          = 'blog100.png';
UPDATE hw_blog SET photo_banniere = 'blog1001.webp' WHERE photo_banniere = 'blog1001.png';
UPDATE hw_job  SET photo = 'online-jobs-for-introverts-3.webp' WHERE photo = 'online-jobs-for-introverts-3.png';

-- Retour en arriere :
-- UPDATE hw_blog SET photo          = 'blog12.png'   WHERE photo          = 'blog12.webp';
-- UPDATE hw_blog SET photo_banniere = 'blog13.png'   WHERE photo_banniere = 'blog13.webp';
-- UPDATE hw_blog SET photo          = 'blog100.png'  WHERE photo          = 'blog100.webp';
-- UPDATE hw_blog SET photo_banniere = 'blog1001.png' WHERE photo_banniere = 'blog1001.webp';
-- UPDATE hw_job  SET photo = 'online-jobs-for-introverts-3.png' WHERE photo = 'online-jobs-for-introverts-3.webp';
--
-- Les images sans-titre-5-*_0xx, videos/ep101, videos/ka, videos/ka1 et xs-videos/ep101 ne sont reference(e)s nulle part
-- dans le code ni dans la base locale : leurs versions .webp sont ajoutees sans changement de reference.
-- sante.jpg -> sante.webp : reference dans components/com_secteur/views/secteur/sante.php (deja modifie dans ce commit).
