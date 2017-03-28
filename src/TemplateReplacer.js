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
        ncp( this.defaults.templateFolder, this.defaults.folder, {
            transform: function( read, write ) {
                self.allFiles.push( write.path );
                read.pipe( write );
            }
        }, function( error ) {
            if (error) {
                return console.error( error );
            }
            self.replaceVariables();
        } );
    }


    this.replaceVariables = function() {
        for (var i = 0, len = this.allFiles.length; i < len; i++) {
            var filePath = this.allFiles[i];
            this.replaceVariable( filePath );
        }
    };
    this.replaceVariable = function( filePath ) {

        var self = this;
        fileSystem.readFile( filePath, 'utf8', function( error, fileContent ) {
            if (error) {
                console.error( error );
            }
            // console.log(self.data);
            var newContent = hogan.compile( fileContent, { delimiters: '<% %>' } ).render(self.data);

            fileSystem.writeFile( filePath, newContent, 'utf8', function( error ) {
                if (error) {
                    console.error( error );
                }
            } );
        } );
    };

};
