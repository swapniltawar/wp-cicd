Eject Deployment
================

Development Approach Basic Branch flow used

Development Branch - develop
(Deployed on mark3 instance)

Staging Branch - staging
(Optional if needed then Deploy on mark3 instance)

Production Branch - production
(Deplyed on client AWS account)

Credentials required:

AWS SES SMTP
PUSH Notification Android IOS 

Image Processing : 

Set Cron jobs as below:
```cron
    * * * * * /usr/bin/curl http://54.201.105.84/unearth/index.php/cron/ranking_algorithm/index
    0 0 * * 3 /usr/bin/curl http://54.201.105.84/unearth/index.php/cron/ranking_algorithm/music_stats
    */30 * * * 0 /usr/bin/curl http://54.201.105.84/eject/web/index.php/cron/ranking_algorithm/music_stats
    0 0 * * * /usr/bin/curl http://54.201.105.84/eject/web/index.php/cron/ranking_algorithm/index
```
