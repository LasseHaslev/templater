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
