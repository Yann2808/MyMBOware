# Project Location
This project located on branch master.

For project initialization, follow these steps :
1. Clone the project using ```git clone https://github.com/Yann2808/MyMBOware```
2. On Command Line Interface (CLI), go to the clone repository with ```cd```
3. Use ```git checkout master``` te switch on branch master
4. Install project dependencies with ```composer install```
5. Create a .env File: Laravel uses environment variables for configuration.
   Duplicate the .env.example file and rename the copy to .env. Then, open the .env file and set up your database connection details, app key, and any other necessary environment variables.
6. Use ```php artisan key:generate``` to generate application key
7.  If the project uses a database and has migrations set up, you need to run them to create the necessary tables. Run the following command ```php artisan migrate``` to run migrations (if you needed)
8.  Use ```php artisan serve``` to start a development server.
