cp /vagrant/booking-client.conf /etc/apache2/sites-available/

chmod 777 /vagrant
chmod 777 /vagrant/client
chmod 777 /vagrant/client/index.html
chmod 777 /vagrant/client/insert.php
chmod 777 /vagrant/client/style.css

a2ensite booking-client
a2dissite 000-default
service apache2 reload