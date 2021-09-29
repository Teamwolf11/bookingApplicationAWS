# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile to set up 2 VMs - client, admin and database servers:
Vagrant.configure("2") do |config|
    # All servers run Ubuntu
    config.vm.box = "ubuntu/xenial64"
  
    # Define a named VM
    config.vm.define "clientserver" do |clientserver|
      # Options for the clientserver VM
      clientserver.vm.hostname = "clientserver"
      
      config.vm.boot_timeout = 3200
      
      # So that our host computer can connect to IP address 127.0.0.1 port 8080, and that network
      # request will reach our clientserver VM's port 80.
      clientserver.vm.network "forwarded_port", guest: 80, host: 8080, host_ip: "127.0.0.1"
     
      # Private network that our VMs will use to communicate
      clientserver.vm.network "private_network", ip: "192.168.2.11"
      
      # Necessary in the CS Labs
      clientserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
  
      # For ease of editing as shell commands are in different file
      clientserver.vm.provision "shell", path: "clientserver.sh"
  
    # End clientserver
    end
  
    # Define a named VM
    config.vm.define "adminserver" do |adminserver|
      adminserver.vm.hostname = "adminserver"
  
      # So that our host computer can connect to IP address 127.0.0.1 port 8080, and that network
      # request will reach our adminserver VM's port 80.
      adminserver.vm.network "forwarded_port", guest: 80, host: 8081, host_ip: "127.0.0.1"
     
      # Private network that our VMs will use to communicate
      adminserver.vm.network "private_network", ip: "192.168.2.12"
      
      # Necessary in the CS Labs
      adminserver.vm.synced_folder ".", "/vagrant", owner: "vagrant", group: "vagrant", mount_options: ["dmode=775,fmode=777"]
  
      # For ease of editing as shell commands are in different file
      adminserver.vm.provision "shell", path: "adminserver.sh"
  
    # End adminserver
    end
  
  # End Vagrantfile
  end
  