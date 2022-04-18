'use strict';

const fs = require('fs');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const CssMinimizerPlugin = require('css-minimizer-webpack-plugin');
const path = require('path');
const webpack = require('webpack');
const AssetsPlugin = require('assets-webpack-plugin');
const TerserPlugin = require('terser-webpack-plugin');

module.exports = function () {

  const mode = process.env.NODE_ENV || 'development';
  const extensionPrefix = mode === 'production' ? '.min' : '';
  const DEV = process.env.NODE_ENV === 'development';
  const jsPath = process.cwd() + '/themes/' + process.env.NODE_SITE + '/assets/js/website';
  let entry = {};
  const appDirectory = fs.realpathSync(jsPath);

  function resolveApp(relativePath) {
    return path.resolve(appDirectory, relativePath);
  }

  // These are the paths where different types of resources should end up.
  const paths = {
    css: 'assets/css/',
    img: 'assets/img/',
    font: 'assets/font/',
    js: 'assets/js/',
    lang: 'languages/',
  };

  const appPaths = {
    appBuild: resolveApp('../../../dist/auto'),
  };

  // The property names will be the file names, the values are the files that should be included.
  const jsfiles = fs.readdirSync(jsPath);
  jsfiles.forEach(file => {
    if(file.includes('.js')){
      let fileName = file.substring(0, file.length - 3);
      entry[fileName] = resolveApp(file);
    }
  });

  const loaders = {
    css: {
      loader: 'css-loader',
      options: {
        sourceMap: true,
      },
    },
    postCss: {
      loader: 'postcss-loader',
      options: {
        postcssOptions: {
          plugins: [
            [
              "postcss-preset-env",
              {
                // Options
              },
            ],
          ],
        },
        sourceMap: true,
      },
    },
    sass: {
      loader: 'sass-loader',
      options: {
        sourceMap: true,
      },
    },
  };

  const config = {
    node: {
      global: false,
      __filename: false,
      __dirname: false,
    },
    resolve: {
      fallback: {
        fs: false
      }
    },
    mode,
    entry,
    output: {
      path: appPaths.appBuild,
      filename: DEV ? '[name].js' : '[name].[contenthash:8].js',
      chunkLoading: 'jsonp',
      wasmLoading: false,
      chunkFormat: 'commonjs',
      enabledChunkLoadingTypes: ['jsonp', 'require'],
    },
    performance: {
      hints: false,
      maxEntrypointSize: 512000,
      maxAssetSize: 512000
    },
    externals: {
      '@wordpress/a11y': 'wp.a11y',
      '@wordpress/components': 'wp.components', // Not really a package.
      '@wordpress/blocks': 'wp.blocks', // Not really a package.
      '@wordpress/data': 'wp.data', // Not really a package.
      '@wordpress/date': 'wp.date', // Not really a package.
      '@wordpress/element': 'wp.element', // Not really a package.
      '@wordpress/hooks': 'wp.hooks',
      '@wordpress/i18n': 'wp.i18n',
      '@wordpress/utils': 'wp.utils', // Not really a package
      backbone: 'Backbone',
      jquery: 'jQuery',
      lodash: 'lodash',
      moment: 'moment',
      react: 'React',
      'react-dom': 'ReactDOM',
      tinymce: 'tinymce',
    },
    resolve:{
    },
    module: {
      rules: [{
          enforce: 'pre',
          test: /\.js|.jsx/,
          loader: 'import-glob',
          exclude: /(node_modules)/,
        },
        {
          test: /\.js$|.jsx/,
          loader: 'babel-loader',
          exclude: /(node_modules|bower_components)/,
        },
        {
          test: /\.html$/,
          loader: 'raw-loader',
          exclude: /node_modules/,
        },
        {
          test: /\.s?css$/,
          use: [
            MiniCssExtractPlugin.loader,
            loaders.css,
            loaders.postCss,
            loaders.sass,
          ],
          exclude: /node_modules/,
        },
        {
          test: /\.(ttf|eot|svg|woff2?)(\?v=[0-9]\.[0-9]\.[0-9])?$/,
          use: [{
            loader: 'file-loader',
            options: {
              name: '[name].[ext]',
              outputPath: paths.font,
            },
          }, ],
          exclude: /(assets)/,
        },
        {
          test: /\.(eot|ttf|woff|woff2)$/,
          use: ['file-loader']
        },
        // {
        //   test: /\.(gif|png|jpe?g|svg)$/i,
        //   use: ['file-loader'],
        // },
      ],
    },
    plugins: [
      new MiniCssExtractPlugin({
        filename: DEV ? '[name].css' : '[name].[contenthash:8].css'
      }),
      new webpack.EnvironmentPlugin({
        NODE_ENV: JSON.stringify(mode), // use 'development' unless process.env.NODE_ENV is defined
        DEBUG: false,
      }),
      new webpack.DefinePlugin({
        'process.env.NODE_ENV': JSON.stringify(mode),
      }),

      //generate assets.json
      new AssetsPlugin({
        path: paths.appBuild,
        filename: './themes/' + process.env.NODE_SITE + '/dist/assets.json',
      }),
    ],
    optimization: {
      minimizer: [
        new TerserPlugin(),
        new CssMinimizerPlugin(),
      ],

      splitChunks: {
        cacheGroups: {
          defaultVendors: {
            priority: -10,
            test: /[\\/]node_modules[\\/]/
          }
        },

        chunks: 'async',
        minChunks: 1,
        minSize: 30000,
        name: false
      }
    }
  };

  if (mode !== 'production') {
    config.devtool = 'source-map';
  }

  return config;
};
