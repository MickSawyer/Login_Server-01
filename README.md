# Docker - PHP - MySQL - NGNIX - Symfony
    This Repo is a Techinical RESTful Server By Mohammad Al Kalaleeb
    
# Day One:

    -  Such New way of doing things, constructed learning outline and downloading Docker
    -  Watching Docker for Windows, and Docker Learning
    -  Learning To Create Compose Files

# Day Two:
    -  Installed Docker and the Docker Images of PHP - MySQL - NGNIX 
    -  Get To Know The Docker Way of doing things
    -  Get To Know The Bash/Ash of the PHP - Alpine Images and containers
    -  Get To Know Volume Mount using docker-compose and the YML

# Day Three:

    - Watching Symfony 3 Course From Lynda, Having Troubles though, the framework is now v4.
    - Done Installing Everything Should be able to start Coding
    - 403 Error and Outstream Issues, Should Debug
    - Problem Solved by installing Symfony the Standard Way using composer

# Day Four:

    - Reading Symfony Demo App, and Tring to Get how the my problem could be fixed with this sample code
    - Trying to Authenticate to MySQL Proved to be pretty impossible. the usage of caching-sha2-password
        is not supported by Doctrine, Should Switch to the old version of MySQL.

# Day Five:
    - Solved MySQL Issue By: CREATE USER 'server_user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'admin'; 
    - Connection Refused is KILLING ME!!!!!, No Appearent Sollution on StackOverflow ;)

# Day Six:
    - Finally Solved it, the sullotion was to pase My IP Address to the docker .env file