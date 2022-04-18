/* global React */

import attributes from './attributes';
import Showcaseteam from './edit';

const {
  blockEditor: {
    InnerBlocks,
  },
  blocks: {
    registerBlockType,
  },
  i18n: {
    __,
  },
} = wp;

registerBlockType(
  'clabs/showcaseteam',
  {
    attributes,
    category: 'onxrp',
    description: __(
      'Add Showcase Team',
      'clabs',
    ),
    edit: Showcaseteam,
    icon: <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z" /></svg>,
    keywords: [
      __('showcaseteam', 'clabs'),
    ],
    example: {
      attributes: {
        backgroundColor: '#000000',
        opacity: 0.8,
        padding: 30,
        textColor: '#FFFFFF',
        radius: 10,
        title: __('I am a slide title', 'wp-presenter-pro'),
      },
    },
    save: () => <InnerBlocks.Content />,
    supports: {
      html: true,
    },
    title: __('Showcase Team', 'clabs'),
  },
);
