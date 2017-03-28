var inquirer = require ( 'inquirer' );
var extend = require( 'extend' );

var TemplateReplacer = require( './TemplateReplacer' );

module.exports = function(data, options) {

    this.defaults = extend(true, {
        templateFolder: __dirname + '/../templates',
        folder: process.argv[2] || './',
    }, options);

    // console.log(this.replacer);
    this.replacer = new TemplateReplacer( data, this.defaults );

    this.start = function() {
        var self = this;
        return new Promise( function( resolve, reject ) {
            inquirer.prompt( data ).then( function( newData ) {
                self.replacer.start( newData );
                // TemplateReplacer( newData, self.defaults ).then( function() {
                    // resolve();
                // } );
            } );
        } );
    };


    // Templates folders
    // Properties
};
