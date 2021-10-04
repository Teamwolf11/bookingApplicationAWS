cp /vagrant/booking-server.conf /etc/apache2/sites-available/

chmod 777 /vagrant
chmod 777 /vagrant/www
chmod 777 /vagrant/www/index.php
chmod 777 /vagrant/www/style.css            

a2ensite booking-server
a2dissite 000-default
service apache2 reload