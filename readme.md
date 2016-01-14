This is a demo Laravel 5.1 Project

#Installation instruction:
1. Clone the repo using command: "git clone git@github.com:arafatazam/L5_1_demo.git"
2. Open the project directory in the terminal and apply command: "composer install"
3. Run migration with command: "php artisan migrate --seed"
4. Open the project in the browser.
5. If you are getting 500 server error then change the permission of the storage directory with: "chmod 0777 -Rv storage/"
6. For production change the .env file and use "php artisan key:generate" in order to change the application key.
