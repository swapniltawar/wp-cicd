/* global React */
export default function Heropost ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      InspectorControls,
      MediaUpload,
      MediaUploadCheck,

    },
    components: {
      Button,
      PanelRow,
      PanelBody,
      SelectControl,
      TextControl,
    },
    element: {
      useState
    },
    compose:{
      compose
    },
    data: {
        useSelect
    },
    apiFetch,
    i18n: {
      __,
    },
  } = wp;


  const { image } = attributes;

  const truncate = (str, max, suffix) => str.length < max ? str : `${str.substr(0, str.substr(0, max - suffix.length).lastIndexOf(' '))}${suffix}`;

  const postdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'post', { per_page: 5, _embed: true,orderby: 'date',order: 'desc',});

});

  return (
    <div>
         <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Hero Post', 'clabs')}
          >
            <PanelRow>
            <SelectControl
                label={__('Order By', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    orderBy: newValue,
                  });
                }}
                value={attributes.orderBy}
                options={[
                  { value: 'date/desc', label: __('Newest to oldest', 'clabs') },
                  { value: 'date/asc', label: __('Oldest to newest', 'clabs') },
                  { value: 'title/asc', label: __('A → Z', 'clabs') },
                  { value: 'title/desc', label: __('Z → A', 'clabs') },
                ]}
              />
           </PanelRow>
            <PanelRow>
            <SelectControl
                label={__('More Link Button', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    moreLink: newValue,
                  });
                }}
                value={attributes.moreLink}
                options={[
                  { label: 'no', value: 'No' },
                  { label: 'yes', value: 'Yes' },
                ]}
              />
           </PanelRow>
            <PanelRow>
            <TextControl
              label={__('Button Link', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrl: newValue,
                });
              }}
              placeholder={__('Add Link', 'clab')}
              value={attributes.buttonUrl}
            />
            </PanelRow>

          </PanelBody>
        </InspectorControls>

     <section class="featured-article">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP" />
                <RichText
                    onChange={(newValue) => {
                      setAttributes({
                        sectionText: newValue,
                      });
                    }}
                    value={ attributes.sectionText }
                    formattingControls= { [] }
                />
            </div>

            { postdata &&

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                        <div class="tags">
                            {postdata[0].first_category}
                        </div>
                        <h1 class="heading-one">
                           {postdata[0].title.raw}
                        </h1>
                        <div class="content-para">
                          {truncate(postdata[0].excerpt.raw, 100, '...')}
                        </div>
                        <div class="author-date">
                            <div class="author-name">
                            {postdata[0].author_name}
                            </div>
                            <div class="article-date">
                            {new Date(postdata[0].date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape"></div>
                    <div class="image--wrapper" style={{
              background: `url(${postdata[0].featured_image_url})`,
            }}>

                    </div>
                </div>
            </div>
         }
        </div>
    </section>

    <section class="article-column">
        <div class="container article-column--container">

        { postdata &&
              postdata.map((post, index) => {

                var postimage;
                if(post.featured_image_url)
                {
                  postimage = post.featured_image_url;
                }
                else{
                  postimage = null;
                }

              if (index != 0) {
          return (
            <div key={index} class="article-block">
                <div class="article-block--image">
                    <img src={postimage} />
                </div>
                <div class="article-block--devider"></div>
                <div class="tags">
               {post.first_category}
                </div>
                <h2 class="heading-three">
                   {post.title.raw}
                </h2>
                <div class="author-name">
                {post.author_name}
                </div>
                <div class="article-date">
                {new Date(post.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                </div>
            </div>
            );
               } })
        }
        </div>
    </section>

    </div>
  );

}
