# wp-theme-cc-sotc
WordPress theme for the State of the Commons. Built with [Foundation Framework](http://foundation.zurb.com/) and [queulat](https://github.com/felipelavinz/queulat)

## System requirements
you should have installed:
- Node
- Composer

## Install
Go to the `frontend` directory and execute
``` npm install``` 

### Use
- ```gulp watch``` execute a watch task over the .scss files and trigger node-sass when detect changes, the css file is automatically generated and copied to the css directory `assets/css`
- ```gulp build-js``` grab all the Js dependencies specified in `gulpfile.js`  and generate and copy a minified js to the `assets/js` directory
- ```gulp build-css``` grab al the css dependencies specified in `gulpfile.js` and generate and copy a minified css to the `assets/css` directory
- ```gulp imgmin``` perform an image compression task using `gulp-imagemin`. it replaces the current images with the compressed ones

## Wordpress dependencies
### Installing
You can install these dependencies by executing ```composer install``` in the root ot this theme

### Queulat 
Queulat is a development toolkit for WordPress which is necessary to make the theme work 
- [Github's repository](https://github.com/creativecommons/queulat)
### Polylang
Multilanguage support for Wordpress. 
- [Wordpress plugin directory](https://wordpress.org/plugins/polylang/)
- [Github's Repository](https://github.com/polylang/polylang)
- [Documentation](https://polylang.pro/doc/)