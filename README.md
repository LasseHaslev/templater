# @lassehaslev/templater
> CLI (Command Line Interface) template engine for all sorts of files

## Install
```bash
npm install @lassehaslev/templater
```

## Usage
Templater takes 2 parameters
1. [Inquirer.js objects](https://github.com/sboudrias/Inquirer.js#objects) (Array)
2. Options (Object)
    - ```templateFolder``` default:```__dirname + '/../templates'```
        - What folder to find templates
    - ```folder``` default:```process.argv[2] || './'```
        - Where to add new templates

```js
#! /usr/bin/env node

var Templater = require( './Templater' );
var templater = new Templater([
    {
        type: 'input',
        name: 'author.name',
        message: 'Whats your name?',
        default: 'My name',
    },
    {
        type: 'input',
        name: 'author.email',
        message: 'Whats your email?',
        default: 'your@email.com',
    },
], {
    templateFolder: __dirname + '/../templates',
});

templater.start();
```

#### Templates
You can add any files in this folder. All files and folders/subfolders added in this folder will be copied to destination and rendered with new variables.

Use ```<% variable.name %>``` syntax to edit your variables.

###### Example file
```php
<?php

/**
 * Class TestFile
 * @author <% author.name %> <<% author.email %>>
 */
class TestFile
{
}
```

*This will render*
```php
<?php

/**
 * Class TestFile
 * @author My name <your@email.com>
 */
class TestFile
{
}
```
