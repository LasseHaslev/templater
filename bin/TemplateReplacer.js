var colors = require( 'colors' );
var fileSystem = require( 'fs' );
var ncp = require( 'ncp' ).ncp;
var hogan = require( 'hogan.js' );

module.exports = function( data ) {
    var allFiles = [];

    console.log(data);

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
            replaceVariable( filePath );
        }
        // fileSystem.readFile(  )
        var test = hogan.compile( 'Hello <% author.name %>!', {
            delimiters: '<% %>',
        } );
        // console.log(test.render(data));

    };
    var replaceVariable = function( filePath ) {

            // console.log(filePath);
            fileSystem.readFile( filePath, 'utf8', function( error, fileContent ) {
                if (error) {
                    console.error( error );
                }
               var newContent = hogan.compile( fileContent, { delimiters: '<% %>' } ).render(data);
                // console.log('---------');
                console.log( filePath );
                // console.log(newContent);

                fileSystem.writeFile( filePath, newContent, 'utf8', function( error ) {
                    if (error) {
                        console.error( error );
                    }
                    // console.log('done');
                } );
            } );
    };

    // Collect parameters
    // Get all templates files
    // Loop each template file and change mustache filename
    // Copy new files to current folder
};
