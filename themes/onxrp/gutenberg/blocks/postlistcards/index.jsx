/* global React */

import attributes from './attributes';
import PostlistCardEdit from './edit';

const { withSelect } = wp.data;
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
const query = {
  per_page: 10,
  orderby: 'date',
  order: 'desc',
  status: 'publish',
};

registerBlockType(
  'clabs/postlistblock',
  {
    attributes,
    category: 'onxrp',
    description: __(
      'Add Post List Card Block',
      'clabs',
    ),
    edit: withSelect(() => ({
      blocks: wp.data.select('core').getEntityRecords('postType', 'post', query),
      event: wp.data.select('core').getEntityRecords('postType', 'event', query),
      career: wp.data.select('core').getEntityRecords('postType', 'career', query),
      resource: wp.data.select('core').getEntityRecords('postType', 'resource', query),
      service: wp.data.select('core').getEntityRecords('postType', 'service', query),
      meta: wp.data.select('core/editor').getEditedPostAttribute('meta'),
    }))(PostlistCardEdit),
    icon: <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false"><path d="M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z" /></svg>,
    keywords: [
      __('postlistblock', 'clabs'),
    ],
    save: () => <InnerBlocks.Content />,
    supports: {
      html: true,
    },
    title: __('Post List Card Block', 'clabs'),
  },
);
