// var prompt = require('prompt');
// var shelljs = require( 'shelljs' );

var inquirer = require ( 'inquirer' );
// console.log(inquirer);
module.exports = inquirer.prompt([
    {
        type: 'input',
        name: 'author.name',
        message: 'Whats your name?',
        default: 'Lasse S. Haslev',
    },
    {
        type: 'input',
        name: 'author.email',
        message: 'Whats your email?',
        default: 'lasse@haslev.no',
    },
    {
        type: 'input',
        name: 'package.name',
        message: 'Package name',
        default: 'my-package',
    },
    {
        type: 'input',
        name: 'package.namespace',
        message: 'Namespace',
        default: 'LasseHaslev\\Namespace',
    },
    {
        type: 'input',
        name: 'model.single',
        message: 'Model single name',
        default: 'Account',
    },
    {
        type: 'input',
        name: 'model.plural',
        message: 'Model plural name',
        default: 'Accounts',
    },
    {
        type: 'input',
        name: 'model.instance.single',
        message: 'Model instance single name',
        default: 'account',
    },
    {
        type: 'input',
        name: 'model.instance.plural',
        message: 'Model instance plural name',
        default: 'accounts',
    },
    {
        type: 'input',
        name: 'composer.name',
        message: 'Package name',
        default: 'lassehaslev/my-package',
    },
]);

    // // this.defaults = {
        // // author: {
            // // name: 'Lasse S. Haslev',
            // // email: 'lasse@haslev.no',
        // // },
        // // package: {
            // // name: 'my-package',
            // // namespace: 'LasseHaslev\\Namespace',
        // // },
        // // model: {
            // // single: 'Account',
            // // plural: 'Accounts',
            // // instances: {
                // // single: 'account',
                // // plural: 'accounts',
            // // }
        // // },
        // // composer: {
            // // name: 'lassehaslev/my-package',
        // // }
    // // };

    // this.gather = function() {
        // // console.log('test');
        // return inquirer.prompt([
            // {
                // type: 'input',
                // name: 'author.name',
                // message: 'Whats your name?',
                // default: 'Lasse S. Haslev',
            // },
        // ]);
    // };
    // this.askQuestion = function( object, questions ) {
    // };
// };
// Have defaults
// Cather information
// Set wich you gatter
// Return data array
