var express = require('express');
var path = require('path');
var favicon = require('serve-favicon');
var logger = require('morgan');
var cookieParser = require('cookie-parser');
var bodyParser = require('body-parser');

var routes = require('./routes/index');
var arduinoRoutes = require('./routes/arduino');
var settingsRoutes = require('./routes/settings');

var Promise = require('bluebird');
var readFile = Promise.promisify(require("fs").readFile);

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

app.use(favicon(path.join(__dirname, 'public', 'favicon.ico')));
app.use(logger('dev'));
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({ extended: true }));
app.use(cookieParser());
var oneDay = 86400000;
app.use(express.static(path.join(__dirname, 'public'), { maxAge: oneDay }));

app.use('/', routes);
app.use('/arduino', arduinoRoutes);
app.use('/settings', settingsRoutes);

//documentation static pages
app.use('/docs', express.static('/otgstorage/docs'));
// catch 404 and forward to error handler
app.use(function(req, res, next) {
  var err = new Error('Not Found');
  err.status = 404;
  next(err);
});

// error handlers

// development error handler
// will print stacktrace
if (app.get('env') === 'development') {
  app.use(function(err, req, res, next) {
    res.status(err.status || 500);
    res.render('error', {
      message: err.message,
      error: err
    });
  });
}

// production error handler
// no stacktraces leaked to user
app.use(function(err, req, res, next) {
  res.status(err.status || 500);
  res.render('error', {
    message: err.message,
    error: {}
  });
});

//tty.js
var tty = require('tty.js');

readFile("/opt/udoo-web-conf/ttyconfig.json", "utf8").then(function(data) {
	var ttycfg = JSON.parse(data);
    var ttyapp = tty.createServer(ttycfg);
	ttyapp.listen();
});

module.exports = app;
