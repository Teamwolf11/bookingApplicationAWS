# -*- mode: ruby -*-
# vi: set ft=ruby :

# starting an intance
class Hash
  def slice(*keep_keys)
    h = {}
    keep_keys.each { |key| h[key] = fetch(key) if has_key?(key) }
    h
  end unless Hash.method_defined?(:slice)
  def except(*less_keys)
    slice(*keys - less_keys)
  end unless Hash.method_defined?(:except)
end

# Vagrantfile to set up 2 VMs - client, admin and database servers:
Vagrant.configure("2") do |config|
    config.vm.box = "dummy"    
    config.vm.boot_timeout = 3200

    config.vm.provider :aws do |aws, override|
      aws.region = "us-east-1"
  
      override.nfs.functional = false
      override.vm.allowed_synced_folder_types = :rsync
  
      # keypair_name parameter to tell Amazon which public key to use.
      aws.keypair_name = "booking-application-2021"
      override.ssh.private_key_path = "~/.ssh/booking-application-2021.pem"
  
      # Choose your Amazon EC2 instance type (t2.micro is cheap).
      aws.instance_type = "t2.micro"
  
      # List of security groups our VM should be in
      aws.security_groups = ["sg-0fe66a7f302b63ff5, sg-081bdc55ac0b3a3a6"]
  
      # Specific availability_zone
      aws.availability_zone = "us-east-1a"
      aws.subnet_id = "subnet-66446300"
  
      # AMI (i.e., hard disk image) to use
      aws.ami = "ami-036490d46656c4818"
  
      override.ssh.username = "ubuntu"
    end

    # Define clientserver VM
    config.vm.define "clientserver" do |clientserver|
      # Options for the clientserver VM
      clientserver.vm.hostname = "clientserver"
      # For ease of editing as shell commands are in different file
      clientserver.vm.provision "shell", path: "clientserver.sh"
    # End clientserver
    end
  
    # Define adminserver VM
    config.vm.define "adminserver" do |adminserver|
      adminserver.vm.hostname = "adminserver"
      # For ease of editing as shell commands are in different file
      adminserver.vm.provision "shell", path: "adminserver.sh"
    # End adminserver
    end
  
    # Enable provisioning with a shell script.
    config.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
    SHELL

  end # End Vagrantfile
  