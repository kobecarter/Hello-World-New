-- Passage de 5 captures de references du PNG au WebP (de 2 a 15 Mo a moins de 1 Mo chacune).
-- A lancer sur la base du serveur APRES le "git pull" qui ajoute les fichiers .webp.
-- Les anciens .png restent sur le serveur tant qu'ils ne sont pas supprimes : retour en arriere possible.

UPDATE hw_reference_item SET photo = 'travelquest_capture_website.webp'        WHERE photo = 'travelquest_capture_website.png';
UPDATE hw_reference_item SET photo = 'travelquest_capture_mobile_version.webp' WHERE photo = 'travelquest_capture_mobile_version.png';
UPDATE hw_reference_item SET photo = 'maison_b_website.webp'                   WHERE photo = 'maison_b_website.png';
UPDATE hw_reference_item SET photo = 'maison-b_mobile.webp'                    WHERE photo = 'maison-b_mobile.png';
UPDATE hw_reference_item SET photo = 'le-meurice_website.webp'                 WHERE photo = 'le-meurice_website.png';

-- Retour en arriere :
-- UPDATE hw_reference_item SET photo = 'travelquest_capture_website.png'        WHERE photo = 'travelquest_capture_website.webp';
-- UPDATE hw_reference_item SET photo = 'travelquest_capture_mobile_version.png' WHERE photo = 'travelquest_capture_mobile_version.webp';
-- UPDATE hw_reference_item SET photo = 'maison_b_website.png'                   WHERE photo = 'maison_b_website.webp';
-- UPDATE hw_reference_item SET photo = 'maison-b_mobile.png'                    WHERE photo = 'maison-b_mobile.webp';
-- UPDATE hw_reference_item SET photo = 'le-meurice_website.png'                 WHERE photo = 'le-meurice_website.webp';
