<p align="center">
<a href="https://getbootstrap.com" target="_blank"><img src="https://miro.medium.com/v2/resize:fit:400/1*onZhQJU7A3ab6V1sHfMRkQ.jpeg" height="150"></a>
    <a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" height="150"></a>
<a href="https://laravel.com" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/96/Sass_Logo_Color.svg/1200px-Sass_Logo_Color.svg.png" height="150"></a>

</p>

# Template for a Laravel 9.2 + SCSS + Boostrap 5.x
Template to generate a new standard and simple project using Laravel 9.2, Bootstrap 5.x and SCSS (SASS with SCSS Syntax).

## Steps to build another template just like this one:
- Edit `package.json`:
    - Update `laravel-vite-plugin` to version `^0.6.0`
    - Update `vite` to version `^3.0.0`
- Remove POSTCSS from our application `npm remove postcss`
- Execute `npm i`
- Install SASS `npm i --save-dev sass`
- Update both css file and folder to scss:
    - Rename `resources/css` into `resources/scss`
    - Rename `app.css` into `app.scss`
- Edit `vite.config.js` file:

            export default defineConfig({
                plugins: [
                    laravel({
                        input: [
                        'resources/scss/app.scss',
                        'resources/js/app.js',
                    ],
                    refresh: true
                }),
                ],

                resolve: {
                    alias: {
                        '~resources' : '/resources/',
                    }
                }
            });
- Add `import '~resources/scss/app.scss'` to `resources/app/js`
- Add `@vite('resources/js/app.js')` to the pages that want to implement it (layouts included, eventually)
- Add to `resources/app/js` this block of code to allow the correct renderization of our images

        import.meta.glob([
            '../img/**'
        ])
- Add `package-lock.json` to `.gitignore` file
- Install and configure Bootstrap:
    - Install both bootstrap and popperjs packages `npm i --save bootstrap @popperjs/core`
    - Add `const path = require('path')` at the beginning of our `vite.config.js` file
    - Add `'~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap')` to our aliases by the end of our `vite.config.js` file
    - Add bootstrap js via import `import * as bootstrap from 'bootstrap';` to our `resources/app.js`
    - Add boostrap scss via @import `@import "~bootstrap/scss/bootstrap";` to our `resources/app.scss`

## Steps to use this project correctly:
- Open this repository and click on  `Use this template ---> Create a new repository`
- Clone the repository wherever you want to develop, e.g. `VS Code`, `VSCodium`, ecc.
- **Open** the cloned folder with a `terminal`
- Copy and paste the `.env.example` file and rename it into `.env` **without removing the `env.example` file**
- Run `composer install` to install all our composer packages
- Run `php artisan key:generate` to generate our custom application key
- Run `npm i` to install all our npm packages
- Run on two separeted terminals:
    - run `npm run dev` to build iteratively our front-end packages and code
    - run `php artisan serve` to build iteratively our back-end packages and code
- Start changing the world with your oustanding code!