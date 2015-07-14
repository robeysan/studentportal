# Student Portal

Student Portal is currently being used to service prospective leads in the admissions process. This includes completing an online application, sending in online transcript request forms, and reviewing financial aid requirements. Some programs only have access to the online application, as defined in the database.

## Deployment

1. Clone this repository, move into the project directory and run the installation instructions above.

2. Open `wwwroot/index.php` and change the first definition at the top of the file to the given environnment: dev, dev2, qa, test, or prod.

3. Confirm the database settings (server, user, pass) are properly set for the environment in `code_igniter/application/config/prod`

4. Confirm the database settings (server, user, pass) are properly set for the environment in `phinx.yml`

5. Run php composer.phar install

6. Run any database migrations:
``` sh
$ ./vendor/bin/phinx migrate -e prod
``` 

## Dependencies

* MongoDB
* MongoDB PECL module
* MySQL
* Forms-new
* api-leads
* api-programs
* GRAIL database
* ELP database
* Student Portal
* HTTPS support on orms-new, and student-portal

## Setup

### Setup your Mongo database

From the student-portal/resources/mongo_setup on your virtual machine:
```bash
./install.sh
```
or to start with a fresh set of users

```bash
./install_drop_users.sh
```

### Setup your mySQL database

From the root directory of the student-portal repo on your virtual machine:
```bash
mysql auth < /resources/auth_setup/auth_db.sql
mysql auth < /resources/auth_setup/auth_user.sql
```

### Fix url paths in GRAIL

Go into the grail.portals database table, filter by portal_type_id 8, and then replace students with local on the urls that are returned.


## Related Products
* Grail
* Partner Portal
* ELC CRM
* Forms
* Lead Director

## Technologies
* MongoDB
* MySQL
* CodeIgniter 2.1
* jQuery 1.7.1
* Twitter Bootstrap 2.0.0
