# Déploiement

Le site en production (`public_html/helloworld-agency.com/new/` sur le serveur cPanel) est un
dépôt Git à part entière, configuré avec ce repo GitHub comme remote `origin`.

## Déploiement automatique

Chaque push sur `main` déclenche `.github/workflows/deploy.yml`, qui exécute un `git pull`
sur le serveur via un runner GitHub Actions auto-hébergé (nécessaire car l'hébergement
mutualisé OVH bloque le port SSH pour toute IP non explicitement autorisée, y compris les
IP dynamiques des runners GitHub-hosted).

## Déploiement manuel (si besoin)

```
ssh hw-cpanel-deploy "cd ~/public_html/helloworld-agency.com/new/ && git pull origin main"
```

## Points d'attention

- Le fichier `.env` (identifiants DB/email) vit uniquement sur le serveur et sur les postes
  locaux — jamais dans Git. Voir `.env.example` pour le modèle.
- `hw-admin/api/` est un dépôt séparé (`yossefEl/helloworld-app-api`), exclu de ce repo.
- Le dossier `.git` est bloqué publiquement via une règle dans `.htaccess`.
- L'IP de la machine hébergeant le runner (ce Mac) doit rester whitelistée dans cPanel
  → "Autorisation SSH". Si cette IP n'est pas fixe, le déploiement automatique cassera
  silencieusement au prochain changement d'IP (le job GitHub Actions échouera en timeout
  SSH) ; il faudra alors ré-autoriser la nouvelle IP et rattraper le serveur manuellement
  avec la commande de déploiement manuel ci-dessus.
