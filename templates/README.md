# lassehaslev/LaravelPackageTemplate

## Getting started
#### Install dependencies
``` bash
# Make this package yours by running
# Make shure you have to \slash every special character ("\" and "/")
sh install.sh

# If you did not wanted to let the script install dependencies for you

# Install dependencies
composer install

# Install dependencies for automatic tests
yarn
```


## Development
#### Service provider
Your package service provider can be found in ```src/Providers/ServiceProvider.php```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/packages#service-providers) for mor information.

#### Configuration
Your package configurations can be changed in ```config/```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/database-testing#writing-factories) for mor information.

#### Migrations
Your migrations should be added in ```database/migrations/```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/migrations) for mor information.

#### Factories
You can edit your factoreis in ```database/factories/ModelFactory.php```.

See [ Laravel documentations ](https://laravel.com/docs/5.3/database-testing#writing-factories) for mor information.

#### Write tests
We use [PHPUnit](https://phpunit.de/) to write tests.
For more information check out [https://laravel.com/docs/5.3/testing](https://laravel.com/docs/5.3/testing)

Add your tests in ```tests/``` folder.

Your migrations will automaticly be added before each test.
``` php
class MyTest extends TestCase {
    /*
     * This function will run before each test.
     * ( Optional )
     */
    public function setUp()
    {
        parent::setUp();
        // Your logic here
    }

    /** @test */
    public function my_first_test() {
        $this->assertTrue( true );
    }
}
```

## Usage after development
Run ```composer require %composername%```

Create your package and add the following line to ```providers``` in ```config/app.php``` 
```
%namespace%\Providers\ServiceProvider::class,
```


#### Runing tests
``` bash
# Run one time
npm run test

# Automaticly run test on changes
npm run dev
```
