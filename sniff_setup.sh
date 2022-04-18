
sudo apt install zip unzip curl

curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar

curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcbf.phar

chmod +x phpcs.phar

chmod +x phpcbf.phar

sudo mv phpcs.phar /usr/local/bin/phpcs

sudo mv phpcbf.phar /usr/local/bin/phpcbf

cd sniffs

wget https://github.com/WordPress/WordPress-Coding-Standards/archive/2.3.0.zip
unzip -o 2.3.0.zip
rm 2.3.0.zip

wget https://github.com/Automattic/VIP-Coding-Standards/archive/2.0.0.zip
unzip -o 2.0.0.zip
rm 2.0.0.zip

sudo phpcs --config-set installed_paths $(pwd)/WordPress-Coding-Standards-2.3.0/,$(pwd)/VIP-Coding-Standards-2.0.0/

cd ..
