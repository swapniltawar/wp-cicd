export default {
  sectionText: {
    type: 'string',
    default: 'Featured Articles',
  },
  buttonText: {
    type: 'string',
    default: 'Button Text',
  },
  buttonUrl: {
    type: 'string',
    default: '#',
  },
  moreLink: {
    type: 'string',
    default: 'no',
  },
  orderBy: {
    type: 'string',
    default: 'no',
  },
  title: {
    type: 'string',
    default: 'onXRP’s mission is to provide everyone in the XRP community with value by means of accessible information and user friendly tools.',
  },
  primage: {
    type: 'number',
    default: 27,
  },
  image: {
    type: 'object',
    selector: 'js-book-details-image',
    default: '/wp-content/themes/onxrp/assets/images/about-banner.jpg'
  },
};
