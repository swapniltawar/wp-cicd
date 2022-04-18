ssh -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem ubuntu@13.52.136.49 << EOF
  cd wordpress/onxrp/wp-content/
  ls -alh
  rm -rf uploads.zip && zip -r uploads.zip uploads/

  cd ../../..
  rm -rf onxrp.sql
  mysqldump -u root -pxsCKfqnk6PDQ onxrp_dev_blank > onxrp.sql
EOF

scp -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem ubuntu@13.52.136.49:/home/ubuntu/wordpress/onxrp/wp-content/uploads.zip ~/Workspace/onxrp/backup/
scp -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem ubuntu@13.52.136.49:/home/ubuntu/onxrp.sql ~/Workspace/onxrp/backup/
