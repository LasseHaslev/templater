var inquirer = require ( 'inquirer' );
var extend = require( 'extend' );

var TemplateReplacer = require( './TemplateReplacer' );


module.exports = function(data, options) {

    var defaults = extend(true, {
        templateFolder: __dirname + '/../templates',
        folder: process.argv[2] || './',
    }, options);

    inquirer.prompt( data ).then( function( newData ) {
        TemplateReplacer( newData, defaults );
    } );

    // Templates folders
    // Properties
};
