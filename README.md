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

var templater = require( './Templater' )([
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
]);
```

#### Templates
You can add any files in this folder.
Use ```<% variable.name %>``` syntax to edit your variables

templates/TestFile.php
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
