#!/bin/bash
sudo apt install docker-compose
sudo mkdir --parents /streama/docker
sudo mkdir --parents /streama/ldap
sudo mkdir --parents /streama/signup
sudo chmod 777 -R /streama
mv /home/ubuntu/projeto-streama/LDAP/* /streama/ldap/
mv /home/ubuntu/projeto-streama/SIGNUP/* /streama/signup/
mv /home/ubuntu/projeto-streama/STREAMA/* /streama/docker/
cd /streama/ldap
sudo docker-compose up -d
cd /streama/signup
sudo docker-compose up -d
cd /streama/docker
wget https://github.com/streamaserver/streama/releases/download/v1.10.4/streama-1.10.4.jar
sudo docker-compose up -d
sudo chown ubuntu:ubuntu -R /streama