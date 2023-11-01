# Carvision

College project for the web development class, with focus on PHP use.


## Installation

This project use Docker to make easier the installation process. Follow the steps below to configure the enviroment.
> If you don't want to use docker, you can check the versions used for every tool on the compose.yaml.

- 1 . Download and install docker in your machine. [Get Started.](https://www.docker.com/get-started/ )

- 2 . Check if your docker and docker-compose was installed successfully by tipping:

```bash
    docker -v
    docker-compose -v
```

- 3 . Now let's run our containers by building our compose.yaml:


```bash
    docker-compose build
```

- 4 . Then putting alll containers up:

```bash
    docker-compose up -d
```

> "-d" start the containers in the background and leaves them running.

### Dependencies

This project uses composer as PHP package manager, so then we need it to install the dependencies of the project, which are:

- coffeecode/router

- Corvis/crow

For them to run, we need it to install Composer, and then, run the following command on the root of the project (or /app directory)

```bash
    composer install
```

>Note that if your project is running inside a docker container builded with the image presented before, all you need to do is  go to the projet root inside the docker container terminal, to run the command above.

Go to location of the compose.yaml file, and run:

```bash
    docker-compose build
```

And again:

```bash
    docker-compose up -d
```

> We are able to set our project to be listen on port 8080 because of the apache that is included into the docker image.

- If everything went well, you now can access the web application at **localhost:8080**