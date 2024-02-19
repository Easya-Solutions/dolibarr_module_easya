# ChangeLog
Le format du fichier est basé sur [Tenez un ChangeLog](http://keepachangelog.com/fr/1.0.0/).

## 2022.5.3+1.0 - 32-01-2024
- Ajout d'un bandeau de maintenance sur détection d'un fichier
## 2022.5.3 - 29-11-2022
- Changement de version suite à la récupération de fixes sur DLBv14
## 2022.5.1 - 08-06-2022
- support des icones FA6 par défaut
- activation de constantes dans le coeur :
  - INFRASPACKPLUS_DISABLED_CORE_CHANGE
  - INFRASPACKPLUS_DISABLED_MODULE_CHANGE
  - OBLYON_DISABLE_VERSION
  - MAIN_MODULE_SETUP_ON_LIST_BY_DEFAULT
- activation de plusieurs constantes en "caché":
  - soit parce qu'elles n'ont pas vocation à être modifiées
  - soit parce qu'une interface admin existe pour les modifier
- corrections sur les imports CSV
## 2022.5 - 06-01-2022
- Version initiale
- 18-05-2022: possibilité d'importer un set de constantes par fichier CSV, en CLI (scriptable) et depuis l'interface admin.
