var casper = require('casper').create();
var unique_ts = Math.round((new Date()).getTime() / 1000);
 
/* Apply now login form */
casper.start('http://csp.local.learninghouse.com/apply_now', function( ) {
    this.test.comment('Apply Now form');
    this.test.assertTitle('Concordia University - Saint Paul', 'apply now page title is what we expect');
    this.test.assertExists('form[action="/apply_now/start"]', 'apply now form found');
    this.fill('form[action="/apply_now/start"]', { 
            'first_name': 'Casper',
            'last_name': 'Test',
            'state': 'KY',
            'zip': '40207',
            'email': 'caspregfrtest_' + unique_ts + '@learninghouse.com',
            'program': '2155' }, true);
});

casper.waitForSelector("form#apply_now input[type=submit][value='Ready!']",
    function success() {
        this.test.assertExists("form#apply_now input[type=submit][value='Ready!']",
            'submit button found');
        this.click("form#apply_now input[type=submit][value='Ready!']");
    },
    function fail() {
        this.test.assertExists("form#apply_now input[type=submit][value='Ready!']");
});

casper.then(function() {
    this.capture('spinner.png');
    console.log(this.getCurrentUrl());
    this.test.assertTitle('Loading...', 'spinner page loaded ok');
});

casper.wait(12000);
casper.then(function() {
    this.test.assertUrlMatch(/^https:\/\/csp.local.learninghouse.com\/app$/);
});

casper.then(function() {
    this.capture('error.png');
});

casper.run(function() {
    this.test.renderResults(true);
});
