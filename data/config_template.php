<?php

//Register a github application at https://github.com/settings/applications
define('GITHUB_OAUTH_ID','');
define('GITHUB_OAUTH_SECRET','');
define('GITHUB_CALLBACK_URL','http://<site>/panel/login/process');

define('BITLY_TOKEN',''); //Only required for bit.ly stuff

//Only required for submission notifications
define('GMAIL_NAME',''); //Name of sender
define('GMAIL_USER',''); //E-mail address of sender
define('GMAIL_PASS',''); //Password of sender

//NOTE: We will likely drop g-mail in favor of using MailGun