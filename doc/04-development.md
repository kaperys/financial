# Development
It is recommended to use the included Docker container when developing the library. It contains the required php extensions
for running the example files and test suite. 

## Using the container
Included in the root of the project is a `container` bash file. This is a basic wrapper for the included Docker container. 
You can use the `container` file to easily manager your Docker container.

```bash
./container start
./container ssh
```

The above will start the Docker instance and 'ssh' into the box. The mount point is `/src` locally, to `/var/cli/financial`
on the container. 