<?php
/*
 * Bureaux de l'agence pour les donnees structurees (schema.org) : une entree par bureau, avec les
 * coordonnees telles qu'elles sont affichees sur le site (nos-agences / pied de page).
 *
 * Les champs 'gbp' (lien de la fiche Google Business Profile, ex. https://maps.app.goo.gl/... ou
 * https://www.google.com/maps?cid=...) sont a remplir : tant qu'ils sont vides, rien n'est publie.
 * Ne rien inventer ici (pas de horaires, pas de coordonnees GPS approximatives) : ce qui est publie dans le
 * schema doit etre vrai et identique a ce que le visiteur voit sur la page.
 */
return array(
    'marrakech' => array(
        'name'      => 'Hello World Marrakech',
        'street'    => 'Av My Abdellah Et 11 Janvier Imm Salam 144 Appt 13 étage 3, Bab Doukala',
        'city'      => 'Marrakech',
        'country'   => 'MA',
        'telephone' => '+212 6 75 47 20 01',
        'email'     => 'contact@helloworld-agency.com',
        'gbp'       => '',   // lien Google Business Profile de Marrakech
        'reviews'   => '',   // lien pour laisser un avis (optionnel)
    ),
    'casablanca' => array(
        'name'      => 'Hello World Casablanca',
        'street'    => '70 allé phonex Ain sbaa',
        'city'      => 'Casablanca',
        'country'   => 'MA',
        'telephone' => '+212 6 75 47 20 01',
        'email'     => 'contact@helloworld-agency.com',
        'gbp'       => '',   // lien Google Business Profile de Casablanca
        'reviews'   => '',
    ),
);
