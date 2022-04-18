# rm -rf themes/onxrp/dist/*

# yarn build

zip -r onxrp.zip themes/onxrp/ -x themes/onxrp/gutenberg/node_modules/**\*

echo "Uploading theme zip file"

scp -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem onxrp.zip ubuntu@13.52.136.49:/home/ubuntu/wordpress/onxrp/wp-content/themes

ssh -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem ubuntu@13.52.136.49 << EOF
  pwd
  cd wordpress/onxrp/wp-content/themes
  pwd
  ls -alh
  echo "Extracting theme zip file"

  unzip -o onxrp.zip -d onxrp_temp
  rm -rf onxrp && mv onxrp_temp/themes/onxrp/ ./onxrp && rm -rf onxrp_temp

  echo "Removing theme zip file"
  rm onxrp.zip
  cd ../..
  wp theme activate onxrp
EOF

rm onxrp.zip

pwd

cd ../../..

# scp -i ~/.ssh/mark4-qa-server-cemtrexlabs.pem /home/swapnil/Projects/onxrp/plugins/advanced-custom-fields-pro.zip ubuntu@13.52.136.49:/home/ubuntu/wordpress/onxrp/wp-content/plugins
