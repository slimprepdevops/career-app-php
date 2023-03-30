## About Career-Finder Project

this repo is a simple implementation of a jobberman web application, it covers auth, sessions, posting, registration and user management as well as ratings (all in its most minute forms)

## Requirement
- working database
- basic git knowledge
- ability to follow instructions

## INSTALLATION ON UBUNTU

update apt

```bash
sudo apt update
```

install apache

```bash
sudo apt install apache2
```

add the HTTP and HTTPS services to the UFW firewall. (**Uncomplicated Firewall**)

```bash
sudo ufw allow "Apache Full"
```

Visit the IP of the VM and you should see APACHE is running

installing PHP

```bash
sudo apt install php libapache2-mod-php php-mysql
```

check that installation was successful

```bash
php -v
```

NOTE: Apache on Ubuntu 22.04 has one virtual host enabled by default that is configured to serve documents from the `/var/www/html` directory. While this works well for a single site, it can become unwieldy if you are hosting multiple sites. Instead of modifying `/var/www/html` , we’ll create a directory structure within `/var/www` for the **your_domain** site, leaving `/var/www/html` in place as the default directory to be served if a client request doesn’t match any other sites.

setup app 

cd apache root
```bash
cd /var/www/html

sudo rm index.html

sudo git clone https://github.com/slimprepdevops/career-app-php.git .
```

configure database connection

```bash
cd /var/www/html/config
```


update the `connect.php` file to your current database access.
