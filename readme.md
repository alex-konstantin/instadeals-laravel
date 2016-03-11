New app uses the same database as the old one, so existing admin users will be able to login with their own credentials.

All information about apps behavior could be found here https://hugbit.atlassian.net/browse/WEB-220
Old app repository: https://github.com/AtypicalBrandsLLC/atb-marketing.instadeals
If you've already have working database, skip this step.
If you don't have database you will need to create it using sql script from old repo:
0. Inside you will find database.sql, run it into your local database and it will create tables.

1. New App could be found here https://github.com/alex-konstantin/instadeals-laravel .
Configure your virtual host, entry point index.php is located in instadeal/public folder.
2. Checkout to WEB-4088/new-redirection-service branch.
3. Run composer install command.
4. Configure connection to database in .env file in project root (copy .env.example and save as .env).
5. To run migrations: php artisan doctrine:migrations:migrate
6. Run php artisan key:generate

Every request to http://application.name/ or http://application.name/some-string will be processed by proxy system and redirect to matching url.
To login into admin area visit http://application.name/login and use the following credentials u:kalexeyev@atypicalbrands.com p:NuMeInstad3a1
After successful login create your own admin user, temporary admin user should be deleted.