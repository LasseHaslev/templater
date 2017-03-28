var inquirer = require ( 'inquirer' );
var extend = require( 'extend' );

var TemplateReplacer = require( './TemplateReplacer' );


module.exports = function(data, options) {

    this.defaults = extend(true, {
        templateFolder: __dirname + '/../templates',
        folder: process.argv[2] || './',
    }, options);

    this.start = function() {
        var self = this;
        inquirer.prompt( data ).then( function( newData ) {
            TemplateReplacer( newData, self.defaults );
        } );
    };


    // Templates folders
    // Properties
};
