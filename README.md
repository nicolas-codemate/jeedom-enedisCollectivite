# enedisCollectivite

Ce plugin permet de collecter les données de consommation électrique des collectivités à partir des compteurs Enedis.

# Configuration

Sur le site [mon-compte-collectivite.enedis.](mon-compte-collectivite.enedis) :
 - dans le menu "Mes Accès API"
 - Ajouter une nouvelle application
 - Copier l'API Key et le Secret Key et les renseigner dans la configuration du plugin
 - dans l'application crée dans Enedes, ajouter les API suivantes :
   - `mesure_syncrone`
 - activer la collecte des données pour chaque PDL

# Utilisation
- ajouter un équipement EnedisCollectivite
- renseigner son PDL
