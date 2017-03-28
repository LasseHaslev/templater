var colors = require( 'colors' );
var fileSystem = require( 'fs' );
var ncp = require( 'ncp' ).ncp;
var hogan = require( 'hogan.js' );
var extend = require( 'extend' );

module.exports = function( options, data ) {

    this.allFiles = [];

    this.data = data || [];

    this.defaults = extend( true, {
        templateFolder: __dirname + '/../templates',
        folder: './',
    }, options );

    this.start = function( data ) {

        this.data = data || this.data;
        var self = this;

        return new Promise( function( resolve, reject ) {
            var promises = [];
            ncp( self.defaults.templateFolder, self.defaults.folder, {
                transform: function( read, write ) {
                    self.allFiles.push( write.path );
                    read.pipe( write );
                }
            }, function( error ) {
                if (error) {
                    reject( error );
                    return console.error( error );
                }
                for (var i = 0, len = self.allFiles.length; i < len; i++) {
                    var filePath = self.allFiles[i];
                    var promise = self.replaceVariable( filePath );
                    promises.push( promise );
                }

                return Promise.all( promises ).then( function( test ) {
                    resolve({
                        files: self.allFiles,
                    });
                } ).catch( function( reason ) {
                    reject(reason)
                } );
            } );
        } )


    }

    this.replaceVariable = function( filePath ) {

        var self = this;
        return new Promise( function( resolve, reject ) {
            fileSystem.readFile( filePath, 'utf8', function( error, fileContent ) {
                if (error) {
                    console.error( error );
                    reject( error );
                }
                // console.log(self.data);
                var newContent = hogan.compile( fileContent, { delimiters: '<% %>' } ).render(self.data);

                fileSystem.writeFile( filePath, newContent, 'utf8', function( error ) {
                    if (error) {
                        reject( error );
                        console.error( error );
                    }
                    resolve();
                } );
            } );
        } );

    };

};
