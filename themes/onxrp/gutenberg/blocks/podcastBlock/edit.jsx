/* global React */
export default function Podcastblock ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      InspectorControls,
    },
    components: {
      PanelRow,
      PanelBody,
      CheckboxControl,
      TextControl,
    },
    element: {

    },
    compose:{

    },
    data: {
        useSelect
    },
    i18n: {
      __,
    },
  } = wp;


  const podcastData = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'podcast', { per_page: 1, _embed: true});
   });

  const truncate = (str, max, suffix) => str.length < max ? str : `${str.substr(0, str.substr(0, max - suffix.length).lastIndexOf(' '))}${suffix}`;

  return (
    <div>
      <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Link Text', 'clabs')}
          >
            <TextControl
              label={__('Link', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrl: newValue,
                });
              }}
              placeholder={__('Add Link', 'clab')}
              value={attributes.buttonUrl}
            />

            <PanelRow>
              <CheckboxControl
                label={__('Open in a new tab', 'clabs')}
                id="product-link-new-tab"
                onChange={(newValue) => {
                  setAttributes({
                    newTab: newValue,
                  });
                }}
                checked={attributes.newTab}
              />
               </PanelRow>

          </PanelBody>
        </InspectorControls>
  <section class="featured-article second-option feature-podcast">
        <div class="container">
            <div class="article-title d-flex align-items-center">
                <img src="/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP" /> <RichText
                    onChange={(newValue) => {
                      setAttributes({
                        sectionText: newValue,
                      });
                    }}
                    value={ attributes.sectionText }
                    formattingControls= { [] }
                />
            </div>

            { podcastData &&
              podcastData.map((post) => {

          var podcastimage;

          if(post.featured_media == 0 || post._embedded['wp:featuredmedia'][0].media_details == undefined)
          {
            podcastimage = null;
          }
          else
          {
            podcastimage = post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
          }

        return (
            <div  key={post.id}  class="featured-article--content d-flex">
                <div class="content">
                <div class="content-inner">
                        <div class="tags">
                        <RichText
                    onChange={(newValue) => {
                      setAttributes({
                        tagText: newValue,
                      });
                    }}
                    value={ attributes.tagText }
                    formattingControls= { [] }
                />
                        </div>
                        <h1 class="heading-one">
                        {post.title.raw}
                        </h1>
                        <div class="content-para">
                        {truncate(post.excerpt.raw, 100, '...')}
                        </div>
                        <div class="d-flex justify-content-between podcast-action-wrapper">
                             <div class="author-info">
                               <div class="author-name">
                               {post.author_name}
                                </div>
                                <div class="article-date">
                                {new Date(post.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                                </div>
                             </div>
                             <div class="d-flex podcast-action">
                             <RichText
                            className={ "btn btn--gradient" }
                            tagName="a"
                            onChange={(newValue) => {
                              setAttributes({
                                playButton: newValue,
                              });
                            }}
                            value={ attributes.playButton }
                            formattingControls= { [] }
                        />
                         <RichText
                            className={ "btn btn--gradient" }
                            tagName="a"
                            onChange={(newValue) => {
                              setAttributes({
                                subscribeButton: newValue,
                              });
                            }}
                            value={ attributes.subscribeButton }
                            formattingControls= { [] }
                        />
                             </div>
                        </div>

                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape shape-right"></div>
                    <div class="image--wrapper image--shape-wrapper" style={{
              background: `url(${podcastimage})`,
            }}>
                     <a href={post.link} class="icon-play">
                       <img src="/wp-content/themes/onxrp/assets/images/icon-play.svg" alt="icon-play" /></a>
                    </div>
                </div>
            </div>
);
})}
        </div>
    </section>
</div>
  );

}
