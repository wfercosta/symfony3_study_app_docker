#!/bin/sh

DIR_CURRENT="$( cd "$( dirname "$0" )" && pwd )"
DIR_PARENT="$(dirname "$DIR_CURRENT")"
source "$DIR_CURRENT/settings.sh"

cd $DIR_PARENT

docker build -t $DOCKER_TAG .
