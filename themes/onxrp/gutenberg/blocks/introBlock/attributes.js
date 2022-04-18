export default {
  sectionText: {
    type: 'string',
    default: 'Introduction to project',
  },
  sectionTag: {
    type: 'string',
    default: 'FEATURED PROJECTS',
  },
  title: {
    type: 'string',
    default: 'Building on the XRP Ledger.',
  },
  titlePosition: {
    type: 'string',
    default: '',
  },
  imagePosition: {
    type: 'string',
    default: '',
  },
  subTitle: {
    type: 'string',
    default: 'The projects listed here have gone through an initial interview and passed vetting checks. Their listing onXRP is not an endorsement or financial advice.',
  },
  image: {
    type: 'object',
    selector: 'js-book-details-image',
    default: '/wp-content/themes/onxrp/assets/images/about-banner.jpg'
  },
  buttonText: {
    type: 'string',
  },
  buttonUrl: {
    type: 'string',
  },
  newTab: {
    type: 'boolean',
  },
  extraid: {
    type: 'string',
  },
};
