# Carvision

Projeto elaborado para Disciplina de Desenvolvimento Web-Servidor, com foco em uso do PHP.


## Installation

This project contains a Dockerfile, that means you can run it as a docker container.
> If you don't want to use docker, you can check the versions used for every tool on the Dockerfile.

- 1 . Download and install docker in your machine. [Get Started.](https://www.docker.com/get-started/ )

- 2 . Check if your docker was installed  by tipping:

```bash
    docker -v
```

- 2 . Check if your docker-compose is also installed:

```bash
    docker-compose -v
```

- 3 . Now let's run our containers by building our compose.yaml:


```bash
    docker-compose build -d
```

> -d is for start the containers in the background and leaves them running.

> We are able to set our project to be listen on port 8080 because of the apache that is included into the docker image.

- If everything went well, you now can access the web application at **localhost:8080**
    
