# Project Setup

This guide will help you build, run, and initialize the project using Docker.

---

## **Build and Run**

To build and start the project for the first time, run:

  ```shell
  docker-compose build --no-cache
  ```

```shell
docker-compose up -d
```

This will:
- Build the Docker images for the application.
- Start all services defined in the `docker-compose.yml` file in detached mode.

---

## **Start the Project**

For subsequent runs (after the initial build), simply start the containers:

```shell
docker-compose up -d
```

---

## **First-Time Setup**

On the first launch, follow these steps to configure the application:

1. Copy the example environment file:
   ```shell
   docker-compose exec app cp .env.example .env
   ```

2. Generate the application key:
   ```shell
   docker-compose exec app php artisan key:generate
   ```

3. Run database migrations:
   ```shell
   docker-compose exec app php artisan migrate
   ```

These steps set up the necessary environment variables and database structure for the application.

---

## **Cache Game Results and Prize Calculations**

To pre-cache game results and prize calculations, execute the following command:

```shell
docker-compose exec app php artisan prizes:precache
```

This command improves performance by preloading calculations into the cache.

---

## **Access the Application**

After setup, the project will be accessible at:  
[http://localhost:8000](http://localhost:8000)

---

### **Additional Notes**

- If you encounter any issues, check the container logs for details:
  ```shell
  docker-compose logs app
  ```

- To stop the application, use:
  ```shell
  docker-compose down
  ```

- To rebuild the containers without caching, add the `--no-cache` flag:
  ```shell
  docker-compose build --no-cache
  ```
