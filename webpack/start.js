'use strict';

const webpack = require('webpack');
const config = require('./config')();

const clientCompiler = webpack(config);

clientCompiler.watch(
  {
    noInfo: false,
    quiet: false,
  },
  (err, stats) => {
    if (err) return;
    console.log('Done!!!');
  }
);
