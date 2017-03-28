#! /usr/bin/env node

var Templater = require( '../src/Templater' );

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
]);

templater.start().then( function( response ) {
    console.log('All complete!');
    console.log('This is what we got in response:');
    console.log(response);
} );

// console.log(templater);
