# Development
It is recommended to use the included Docker container when developing the library. It contains the required php extensions for running the example files and test suite. 

## Using the container
You can use `docker-compose` to build and run the container. Simply run the following commands:

- `docker-compose up`
- `docker-compose run financial`

The above will start the Docker instance and 'ssh' into the box. The mount point is `./` locally, to `/var/cli/financial` in the container.
