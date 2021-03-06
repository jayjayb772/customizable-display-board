# Customizable display board
This will be a multi-user webapp that gives users the ability to create custom dashboards. i am writing it in laravel PHP, using an inertia/VueJS front end. This will allow for standardization and easy addition of new board components.

I'm making this as a re-write of my previous display board app, which was a mess of code and ui that was so fragile I couldn't keep throwing little band-aids on it.
I'd like for this to extremely customizable, both from the webapp itself, but also in regards to adding new board tiles.

## Current work to be done
- Setup users, remove teams
- Create user home page
    - List Boards
    - New board button

- add simple tile type - words
  - 1x1, 1x2, 2x1
  - allow for color customization, text and background
- More to user dashboard
    - Explore Tile types
    - Create favorite tiles, pre customized tiles, easy to use
- Create display board item that users can create
    - add horizontal and vertical options
    - add rows and columns option
- display board editor
    - I want this to be drag n drop, but i may end up doing simpler point and click.
    - menu bar on the side with tile types, show fav tiles
        - submenu for tile customization

    

## Development

### Prerequisites
* [Docker](https://www.docker.com/)
* [Docker Compose](https://docs.docker.com/compose/)
* [PHP 8](https://www.php.net/releases/8.0/en.php)
* [Composer](https://getcomposer.org/)
* [WSL 2](https://docs.microsoft.com/en-us/windows/wsl/install-win10) [*](#wsl)

<a id="wsl">_*_</a>  Windows users must use Windows Subsystem for Linux. Use the command ```wsl``` to open the WSL command line

### Install
Pull down the source and install the dependencies:
```bash
composer install
```

### Configure
We configure our application via environment variables in the `.env` file. If it does not already exist, copy the example environment variables file and
generate a new `APP_KEY`:

```bash
cp .env.example .env
php artisan key:generate
```

### Start
We use [Sail](https://laravel.com/docs/8.x/sail) to manage our development
environment.

In order to spin up and orchestrate all the necessary containers and serve the
application:
```bash
./vendor/bin/sail up
```

The assets are served locally, instead of from a container:
```bash
npm run hot
```
_*_ You may need to install laravel-mix using ```npm install laravel-mix@latest``` and install nvm to provide a newer
version of nodejs if the version your distro comes with is old. You'll get an error ehwne running ```npm run hot``` if so.
[These nvm install instructions](https://tecadmin.net/how-to-install-nvm-on-ubuntu-20-04/) are for Ubuntu 20.04.

Drop any existing tables, run all migrations, and seed the database with fake
data:
```bash
./vendor/bin/sail artisan migrate:fresh --seeder DevelopmentSeeder
```

## Formatting

### PHP
We use PHP CodeSniffer to enforce PHP coding standards. It is recommended that
you integrate the `phpcs` linter and the `phpcbf` formatter with your IDE, tho
you can check your code's formatting manually at any time with:
```bash
./vendor/bin/phpcs
```
The formatter can be run with:
```bash
./vendor/bin/phpcbf
```

### Javascript
We use ESLint and Prettier to enforce our Javascript coding standard. It is
recommended that you integrate the `eslint` linter and the `prettier` formatter
with your IDE.

#### ESLint
The configuration for ESLint can be found in `package.json["eslintConfig"]`
[*](#jsconfigs).
You can manually check your code's formatting with:
```bash
npm run lint
```

#### Prettier
The configuration for Prettier can be found in `package.json["prettier"]`
[*](#jsconfigs).
Automatically formatting your code with Prettier can be accomplished with:
```bash
npm run format
```

## Testing
We utilized three different test runners in order to test our application from
multiple angles.

### Jest
Jest is a Javascript test runner that we use to test our Vue components. It will
run any test matching `/tests/**/*.test.js`. See the whole config in
`package.json["jest"]`[*](#jsconfigs).  Our component test suite is
located in `tests/Component/`.
In order to continuously test components while you develop them, run:
```bash
npm run test:watch
```

### PHPUnit
PHPUnit is a test runner that we use to test the bulk of our test suites,
`tests/Feature/`, `tests/Integration/`, and `tests/Unit/`. It will run any test
ending in `Test.php` in those three suites. See the configuration PHPUnit uses
in `phpunit.xml.dist`. PHPUnit is integrated with Sail and can be run via:
```bash
./vendor/bin/sail test
```

### Laravel Dusk
Dusk is a test runner built on top of PHPUnit that runs the application
on a headless browser against any test ending in `Test.php` in the suite
`tests/Browser/`. The configuration is autogenerated for you by Sail
when you run:
```bash
./vendor/bin/sail dusk
```


## Libraries

### Frameworks
* [Inertia](https://inertiajs.com/)
* [Laravel](https://laravel.com/)
* [Vue](https://vuejs.org/)

### Tooling
* [ESLint](https://eslint.org/)
* [Jest](https://jestjs.io/)
* [Laravel Dusk](https://laravel.com/docs/8.x/dusk)
* [Laravel Sail](https://laravel.com/docs/8.x/sail)
* [PHP CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer)
* [PHPUnit](https://phpunit.readthedocs.io/en/stable/)
* [Prettier](https://prettier.io/)

### Authentication and Team Management
* [Fortify](https://laravel.com/docs/8.x/fortify)
* [Jetstream](https://jetstream.laravel.com/)
* [Passport](https://laravel.com/docs/8.x/passport) [*](#oauth)
* [Sanctum](https://github.com/laravel/sanctum)

<a id="oauth">*</a> Used only to provide OAuth server functionality.
Sanctum still supplies all SPA and personal user token functionality.
Passport cannot easily replace Sanctum given Jetstream makes heavy use
of Sanctum natively.

## Project Structure



## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
