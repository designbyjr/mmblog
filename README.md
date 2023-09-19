
# Mitchell Mcdonald Blog

I have designed, developed, and containerized a MVC for a simple web page application using Laravel and Docker.

I have created a docker conatiner using laravel sail. 

The IP address for the project is:

localhost




## Documentation

The project uses scheduling to import the blogs from the customers blog api.
It imports it every few minutes.
A job has been created for this and the ImportService checks the cached blog posts against what has come in and if there is anything missing the Import blog table is updated and so is the cache.

### Performance improvements
On first load the peformance of querying the api is around **500ms**, after a second attempt it drops to **230ms** thanks to the use of the cache.

The blog, user and importBlog models all have lazy loading of the get function and hasMany and belongs to realtionships modified to have a cached version for upto 5 minutes.

If a save or delete occurs, thanks to model obsevers. blog or importBlog models modifies the cache is flushed via a trait inside each of these models and updated with the latest records.

The preformance is dramatically improved and if lazy loading is used it can match the speeds of those with a repository pattern with eager loading.

With some future modifications of using the respoitsory pattern eager loading would also be dramatically improved.

However for this moment and time it would be ideal to lazy load as this is often used with laravel.

## Installation


You will need to have composer and php 8.2 or greater installed and docker.
Make sure docker is running before running commands below in order.

**Have the docker engine running before running composer as all install scripts are run for you.**

DO:
```bash
composer install

```
    
## Running Tests
The tests are limited, I did attempt to use pest but it came with some booting issues with the laravel framework. In normal circumstances i would normally write in php unit for production code.

To run tests, run the following command

```bash
  sail php artisan test
```

