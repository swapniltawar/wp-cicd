onXRP
==================================

## Table of Contents

- [onXRP](#onxrp)
  - [Table of Contents](#table-of-contents)
  - [Project Setup Requirements](#project-setup-requirements)
  - [Install WP Cli](#install-wp-cli)
  - [Update wp-config](#update-wp-config)
  - [Local Project Setup](#local-project-setup)
  - [Daily Project run commands](#daily-project-run-commands)
  - [Guternberg Blocks](#guternberg-blocks)
  - [WP Backend Local Login](#wp-backend-local-login)

## Project Setup Requirements
- Docker
- Yarn
- NPM
- NVM
- Node.js (v16.13.1)
- WP CLI

## Install WP Cli

You must have installed WP CLI on your machine, which is used to install & update, core wordpress files & plugins
If not installed then please follow below steps:

```bash
  curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
  chmod +x wp-cli.phar
  sudo mv wp-cli.phar /usr/local/bin/wp
```

## Update wp-config

Must have following lines after `$table_prefix`

```php

define( 'ONXRP_ENABLE_LOCAL_SETTINGS', true );
define('WP_ENV', 'development');
define('WP_SITEURL', 'http://onxrp.local/');
define('WP_HOME', 'http://onxrp.local/');

define('WP_DEBUG',true);
define('WP_DEBUG_LOG',true);
define('WP_DEBUG_DISPLAY',false);

```

## Local Project Setup

```bash
Step 1: Clone the project using SSH/HTTP to your machine.

Step 2: cd onxrp (Go to project folder)

Step 3: yarn install (Only once when initial project setup or package.json file updated)

Step 4: yarn sniff:setup (Only once when initial project setup)

Step 5: yarn docker:start (Keep running the script on same terminal tab)

Step 6: yarn docker:setup (On new terminal tab and execute the command only once when initial project setup)

Step 7: yarn start (Execute the command on same tab)

```

## Daily Project run commands

```
  01) yarn docker:start

  02) sudo nano /etc/hosts
      (Paste below line in the file as given below)

      example:- 198.16.57.4 onxrp.local

  03) yarn docker:shell

      example:- echo "198.16.57.4 onxrp.local" >> /etc/hosts

  04) yarn start
```

## Guternberg Blocks

Go to [here](themes/onxrp/gutenberg/README.md) and check the readme.md file


## WP Backend Local Login

```bash

URL: http://onxrp.local/wp-login.php

Username: onxrp
Password: admin

```