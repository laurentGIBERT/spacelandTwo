SpaceProd production
====================


How to install this project
---------------------------

  1. `git clone https://github.com/laurentGIBERT/spacelandTwo`
  2. make a directory named spaceland 
  3. `cd spaceland`
  4. `composer install`
  5. Edit `.env` and configure
     credentials to acces a database.
  6. `php bin/console doctrine:database:create`
  7. `php bin/console doctrine:schema:create`

  8. `php bin/console assets:install --symlink`
  9. `php bin/console server:run`
  10. Browse `http://127.0.0.1:8000/admin/`
