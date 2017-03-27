#! /usr/bin/env node

var TemplateReplacer = require( './TemplateReplacer' );

require('./InformationGatherer').then( function( newData ) {
    TemplateReplacer( newData );
} );
