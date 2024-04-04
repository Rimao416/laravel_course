Pour créer une migration
**** php artisan make:migration CreatePosteTable
*** Après la création de notre migration, nous devons nous rendre dans database/migration et ajouter les tables de notre bdd

*** Pour démarrer notre migration php artisan migrate
Ensuite nous allons créer notre modèle en faisans ```php artisan make:model Post```

### Notons que nous pouvons créer un modèle et une migration directement en faisant php artisan make:model Post -m

*** Lorsque nous avons déjà créer une table et que nous voulions la modifier, faire php artisan:fresh


### En Laravel quand on essaie de créer un objet à partir d'un tableau, il n'autorise pas, il faut le signifier dans le model