#!/bin/sh

echo "Removendo todas as instâncias e container..."
docker ps -a | grep -v CONTAINER | awk '{print $1}' |  xargs docker rm

echo "Removendo todas as as imagens... "
docker images | grep -v REPOSITORY | awk '{print $3}' | xargs docker rmi
