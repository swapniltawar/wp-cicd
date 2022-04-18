const fs = require('fs')
const chalk = import('chalk');
const ESLintPlugin = require('eslint-webpack-plugin');
const path = require('path');
const { CleanWebpackPlugin } = import('clean-webpack-plugin');
const StatsPlugin = require('webpack-stats-plugin').StatsWriterPlugin;

const assetRegex = new RegExp('[^\\/\\.\\-_a-zA-Z0-9]', 'g');
const hasInvalidCharacters = (value) => {
  if (assetRegex.test(value)) {
    // eslint-disable-next-line max-len, no-console
    console.log(chalk.red(`Attempted to write invalid value '${value}' to static asset JSON manifest. All JSON values must match ${assetRegex}`));
    return true;
  }

  return false;
};

const getAssets = (assetList) => assetList.reduce((assetAcc, outputPath) => {
  const fileInfo = path.parse(outputPath);
  const ext = fileInfo.ext.replace('.', '');

  // Validate key and value
  if (hasInvalidCharacters(ext) || hasInvalidCharacters(outputPath)) {
    return assetAcc;
  }

  if (ext !== 'map') {
    return { ...assetAcc, [ext]: outputPath };
  }

  return assetAcc;
}, {});

const createWriteWpAssetManifest = (mode) => (stats) => {
const assets = stats.assetsByChunkName;

  // Loop through entries
  const entryMap = Object.keys(assets).reduce((entryAcc, entryName) => {
    // Validate entry name
    if (hasInvalidCharacters(entryName)) {
      return entryAcc;
    }

    // Make sure it's an array
    const assetList = [].concat(assets[entryName]);

    // Loop through assets
    return {
      ...entryAcc,
      [entryName]: getAssets(assetList),
    };
  }, {});

  const manifestJSON = JSON.stringify(entryMap);

  // Write out asset manifest explicitly or else it'll be served from localhost,
  // where wp can't access it
  if (mode === 'development') {
    fs.writeFileSync(
      path.join(__dirname, 'build/assetMap.json'),
      manifestJSON,
    );
  }

  return manifestJSON;
};

module.exports = (env, argv) => {
  const { mode } = argv;

  return {
    devtool: mode === 'production' ? 'source-map' : 'eval-cheap-module-source-map',
    entry: {
      blockHeroBlock: './blocks/heroBlock/index',
      blockIntroBlock: './blocks/introBlock/index',
      blockGridPosts: './blocks/gridPosts/index',
      blockHeroPost: './blocks/heroPost/index',
      blockFeaturedPost: './blocks/featuredPost/index',
      blockPodcastPost: './blocks/podcastPost/index',
      blockGridBlock: './blocks/gridBlock/index',
      blockPostListCard: './blocks/postlistcards/index',
      blockLinkBlock: './blocks/linkBlock/index',
      blockBrandGuide: './blocks/brandGuide/index',
      blockLinkText: './blocks/linkText/index',
      blockFaqBlock: './blocks/faqBlock/index',
      blockShowcaseTeam: './blocks/showcaseTeam/index',
      blockProjectBlock: './blocks/projectBlock/index',
      blockTrustedResources: './blocks/trustedResources/index',
      blockPodcastBlock: './blocks/podcastBlock/index',
      blockInfoBlock: './blocks/infoBlock/index',
      blockSliderBlock: './blocks/sliderBlock/index',
      blockPartnerBlock: './blocks/partnerBlock/index',
      blockAppBlock: './blocks/appBlock/index',
    },
    module: {
      rules: [
        {
          exclude: /node_modules/,
          test: /.jsx?$/,
          use: [
            'babel-loader',
          ],
        },
      ],
    },
    output: {
      filename: mode === 'production'
        ? '[name].[chunkhash].bundle.min.js'
        : '[name].js',
      path: path.join(__dirname, 'build'),
    },
    plugins: [
      new StatsPlugin({
        transform: createWriteWpAssetManifest(mode),
        fields: ['assetsByChunkName', 'hash'],
        filename: 'assetMap.json',
      }),
      ...(mode === 'production'
        ? [
          new CleanWebpackPlugin(),
        ] : []
      ),
    ],
    resolve: {
      extensions: ['.js', '.jsx'],
    },
  };
};
