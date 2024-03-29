## Installation

In order to install the application you need to execute the following commands

`composer install`

`npm install`

## Configuration

You probably might want to use your own `Gecko` key so let's do it. Open `config/coin.php` file in you projects and add both your url and key there.

## Running tests

We might you want to make sure that our tests are all passing. Shall we check them? To do so, just run the next command in your cli terminal.

`./vendor/bin/phpunit`

Or, if you rather see some interface tests working, just run the following

`npm run test`

## Serving the application

Now that we have the application fully installed, we need to serve it. Let's do it!

`php artisan serve`

Make sure you're running it under port 8000, since this is the default set on .env.example. Otherwise it won't work

`npm run dev`

## Design Decisions

### Controllers & resources

The controllers don't have any bussines logic. Instead, they pass the request directly to the repository structure
and send it back to the interface through pre formatted resources.

### CoinManager

In this section I'm gonna explain one of the most important design decision I made on creating a class calle `CoinManager`. This class is a manager tha handles anything we need under `Gecko` api. That means that we don't need to instanciate any `Gecko` services in services, controllers or other part of our software at all. `CoinManager` already combines a mix of
singleton design pattern with dependecy inversion on it.

But that really matters is that we don't need to be fully dependent on `CoinManager`, because the manager behind the scenes allow us to create another driver and consumes all the resources from a different api. In other words, we can fetch from 
multiples vendors at same time. Isn't great?

### Repository

Now that we've previously covered `CoinManager`, I can tell that our `CoinRepository` acesses our provider that consumes `Gecko` api and fetches whathever we need. 

## Coder

You might be probably thinking who was the one responsible for this. [Check me out](https://linkedin.com/in/tperrelli).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
