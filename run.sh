#! /bin/zsh

#Open Docker, only if is not running
if (! docker stats --no-stream ); then
  # On Mac OS this would be the terminal command to launch Docker
  open /Applications/Docker.app
 #Wait until Docker daemon is running and has completed initialisation
while (! docker stats --no-stream ); do
  # Docker takes a few seconds to initialize
  echo "Waiting for Docker to launch..."
  sleep 5
done
fi

docker-compose exec php /bin/bash
if [[ $? -ne 0 ]]; then
  echo "machine not available. starting up containers"
  docker-compose up -d #--build
  if [[ $? -ne 0 ]]; then
    echo "unable to start containers"
  else 
    docker-compose exec php /bin/bash
    if [[ $? -ne 0 ]]; then
      echo "machine still no available."
    fi
  fi
fi