var colors = require( 'colors' );
var fileSystem = require( 'fs' );
var ncp = require( 'ncp' ).ncp;
var hogan = require( 'hogan.js' );
var extend = require( 'extend' );

module.exports = function( data, options ) {

    return new Promise( function( resolve, reject ) {
        var allFiles = [];

        var defaults = extend( true, {
            templateFolder: __dirname + '/../templates',
            folder: './',
        }, options );

        ncp( defaults.templateFolder, defaults.folder, {
            transform: function( read, write ) {
                allFiles.push( write.path );
                read.pipe( write );
            }
        }, function( error ) {
            if (error) {
                return console.error( error );
            }
            replaceVariables();
        } );

        var replaceVariables = function() {
            for (var i = 0, len = allFiles.length; i < len; i++) {
                var filePath = allFiles[i];
                replaceVariable( filePath );
                resolve();
            }
        };
        var replaceVariable = function( filePath ) {

                fileSystem.readFile( filePath, 'utf8', function( error, fileContent ) {
                    if (error) {
                        console.error( error );
                    }
                var newContent = hogan.compile( fileContent, { delimiters: '<% %>' } ).render(data);

                    fileSystem.writeFile( filePath, newContent, 'utf8', function( error ) {
                        if (error) {
                            console.error( error );
                        }
                    } );
                } );
        };
    } );

};
