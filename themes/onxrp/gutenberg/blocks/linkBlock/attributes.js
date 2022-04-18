export default {
  buttonText: {
    type: 'string',
    default: 'BECOME A CONTRIBUTOR',
  },
  buttonUrl: {
    type: 'string',
    default: '#',
  },
  newTab: {
    type: 'boolean',
  },
  downloadLink: {
    type: 'boolean',
  },
  primage: {
    type: 'number',
    default: 27,
  },
  image: {
    type: 'object',
    selector: 'js-book-details-image',
    default: '/wp-content/themes/onxrp/assets/images/contributor-img.png'
  },
  extraid: {
    type: 'string',
  },
};
