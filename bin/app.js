#! /usr/bin/env node

var colors = require( 'colors' );
var fileSystem = require( 'fs' );
var ncp = require( 'ncp' ).ncp;
// console.log(fileSystem);
//
var hogan = require( 'hogan.js' );
// console.log(hogan);


var allFiles = [];

var replaceData = {
    author: {
        name: 'Lasse S. Haslev',
        email: 'lasse@haslev.no',
    },
    package: {
        name: 'my-package',
        namespace: 'LasseHaslev\\Namespace',
    },
    model: {
        single: 'Account',
        plural: 'Accounts',
        instances: {
            single: 'account',
            plural: 'accounts',
        }
    },
    composer: {
        name: 'lassehaslev/my-package',
    }
}

var testFunction = function( test ) {
    // console.log(test);
};

ncp( '../templates', 'test', {
    transform: function( read, write ) {
        allFiles.push( write.path );
        read.pipe( write );
    }
}, function( error ) {
    if (error) {
        return console.error( error );
    }
    // console.log('Done');
    // console.log(allFiles);
    replaceVariables();
} );

var replaceVariables = function() {
    for (var i = 0, len = allFiles.length; i < len; i++) {
        var filePath = allFiles[i];

        console.log(filePath);
        fileSystem.readFile( filePath, 'utf8', function( error, data ) {
            if (error) {
                console.error( error );
            }
            // console.log(data);
            // console.log('---------');
            // console.log(hogan.compile( data, { delimiters: '% %' } ));
        } );
        
    }
    // fileSystem.readFile(  )
    var test = hogan.compile( 'Hello <% author.name %>!', {
        delimiters: '<% %>',
    } );
    console.log(test.render(replaceData));

};

// Collect parameters
// Get all templates files
// Loop each template file and change mustache filename
// Copy new files to current folder
