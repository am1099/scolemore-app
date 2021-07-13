# scolemore-app

STEPS TO INSTALL AND RUN THIS PROJECT:

Step 1: Go to https://www.apachefriends.org/index.html and install 'XAMPP'

Step 2: Unpack the package into a directory of your choice. Please start the "setup_xampp.bat" and beginning the installation.

Step 3: upon successful installation, open XAMPP and  navigate to the 'Actions' part in the middle and click on 'Start'for 'Apache' and 'MySQL' or run the command 'sudo /opt/lampp/lampp start' in terminal.

Step 4: Clone this project on your computer

Step 5: Open Xampp window and click on 'admin' where it refrences 'MySQL' (should be the second line, next to 'Start/Stop' button),
which should take to a web page called phpmyadmin or you should be able to by typing in 'http://127.0.0.1/phpmyadmin/' in your browser (if this does not work try installing phpmyadmin (if you are using linux by running the command ' sudo apt-get install phpmyadmin')

Step 6:Please follow the steps in this link to install composer and laravel in order to run my project https://linuxhint.com/install-laravel-on-ubuntu/
If you come to errors this link should help, https://blog.chapagain.com.np/solved-laravel-error-failed-to-open-stream-no-such-file-or-directory-bootstrapautoload-php/#:~:text=This%20error%20generally%20occurs%20when,Cause%3A&text=The%20missing%20dependencies%20should%20be,to%20make%20Laravel%20run%20properly.

Step 7: Once you are in phpmyadmin, Click on the 'New' button to create a database,

Step 8: Call the database scolemoreDB then click on 'create'

Step 9: cd onto my project folder and run this command in terminal 'php artisan migrate' (to create the migration and create all the tables), then run 'php artisan serve' and 'npm run dev' to run the website. (link should come up, just add '/login' in front of it).

Step 10: Redis would need to be installed so that Jobs can be sent when sending an email with rate limit applied. Use this link to help with installing Redis for Windows: https://riptutorial.com/redis/example/29962/installing-and-running-redis-server-on-windows

NOTE: Mailgun only allows up to 5 Authorized recipients of which I have authorized two of my own. If you would like me to Authorize your email for testing purposes please contact me! 
