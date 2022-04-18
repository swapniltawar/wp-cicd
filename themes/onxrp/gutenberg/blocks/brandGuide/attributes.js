export default {
  sectionText: {
    type: 'string',
    default: 'Articles Title',
  },
  buttonText: {
    type: 'string',
    default: 'DOWNLOAD Brand guide',
  },
  listId: {
    type: 'string',
    default: '',
  },
  blockId: {
    type: 'string',
    default: '',
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
  downloadfile: {
    type: 'object',
    selector: 'js-book-details-image',
    default: ''
  },
};
