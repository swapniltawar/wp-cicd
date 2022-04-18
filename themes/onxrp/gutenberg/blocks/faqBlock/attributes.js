export default {
  mainTitle: {
    type: 'string',
    default: 'Faq',
  },
  FaqData: {
    type: 'array',
    default: [
      {
        headingText: 'headingText',
        contentText: 'contentText'
      }
    ],
  },
  hideButton: {
    type: 'string',
    default: 'hide faq',
  },
  showButton: {
    type: 'string',
    default: 'read faq',
  },

};
