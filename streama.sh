#!/bin/bash
sudo apt install docker-compose
sudo mkdir --parents /mnt/efs/ctfoco/streama/docker
sudo mkdir --parents /mnt/efs/ctfoco/streama/ldap
sudo mkdir --parents /mnt/efs/ctfoco/streama/signup
sudo chmod 777 -R /streama
mv ./LDAP/* /mnt/efs/ctfoco/streama/ldap/
mv ./SIGNUP/* /mnt/efs/ctfoco/streama/signup/
mv ./STREAMA/* /mnt/efs/ctfoco/streama/docker/
cd /mnt/efs/ctfoco/streama/ldap
sudo docker-compose up -d
cd /mnt/efs/ctfoco/streama/signup
sudo docker-compose up -d
cd /mnt/efs/ctfoco/streama/docker
wget https://github.com/streamaserver/streama/releases/download/v1.10.4/streama-1.10.4.jar
sudo docker-compose up -d
sudo chown ubuntu:ubuntu -R /streama