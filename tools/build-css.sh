#!/bin/bash
# Genere assets/css/main.min.css a partir de assets/css/main.css (minification sans risque : espaces,
# commentaires, valeurs equivalentes ; aucun selecteur n'est fusionne ni supprime).
# A relancer apres toute modification de main.css, puis augmenter le numero de version (?v=) dans
# includes/template.php pour que les navigateurs rechargent le fichier.
# Necessite Node.js :  npx --yes clean-css-cli
set -e
cd "$(dirname "$0")/.."
# La police Anton est chargee par un <link> dans le <head> (en parallele) : on retire l'@import de tete,
# qui obligeait le navigateur a telecharger main.css avant de decouvrir la police.
sed "1{/^@import url('https:\/\/fonts.googleapis.com\/css2?family=Anton/d;}" assets/css/main.css > /tmp/main.noimport.css
npx --yes clean-css-cli -O1 -o assets/css/main.min.css /tmp/main.noimport.css
rm -f /tmp/main.noimport.css
echo "main.min.css : $(wc -c < assets/css/main.min.css) octets"
