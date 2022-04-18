/* global React */
export default function Showcaseteam ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      MediaUpload,
      MediaUploadCheck,
      InspectorControls
    },
    components: {
      Button,
      TextControl,
      PanelRow,
      PanelBody,
      SelectControl,
    },
    element: {
      useState
    },
    compose:{
      compose
    },
    i18n: {
      __,
    },
    data: {
        useSelect
    }
  } = wp;


  const { image } = attributes;

  const teamdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'team', { per_page: -1, _embed: true});

});

  const truncate = (str, max, suffix) => str.length < max ? str : `${str.substr(0, str.substr(0, max - suffix.length).lastIndexOf(' '))}${suffix}`;

  return (
    <div>
      <InspectorControls key="inspector">
        <PanelBody
            initialOpen
            title={__('Configure Showcaseteam Block', 'clabs')}
          >
           <PanelRow>
            <SelectControl
                label={__('Title Position', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    titlePosition: newValue,
                  });
                }}
                value={attributes.titlePosition}
                options={[
                  { label: 'Left', value: 'title-left' },
                  { label: 'Right', value: 'title-right' },
                ]}
              />
           </PanelRow>
        </PanelBody>
        <PanelBody
            initialOpen
            title={__('Add Block ID', 'clab')}
          >
            <TextControl
              label={__('ID', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  extraid: newValue,
                });
              }}
              placeholder={__('Add ID', 'clab')}
              value={attributes.extraid}
            />
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

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                    <RichText
                            className={ "heading-one" }
                            tagName="h1"
                            onChange={(newValue) => {
                              setAttributes({
                                title: newValue,
                              });
                            }}
                            value={ attributes.title }
                            formattingControls= { [] }
                        />
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape"></div>
                    <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={image => setAttributes({ image: image })}
                          allowedTypes={ ['image'] }
                          value={ image ? image.id : ''}
                          render={({ open }) => (
                            image ?
                              <div>
                                {
                                  typeof image === 'string' ?
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image})`}}></div>
                                  :
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ image: '' })} className="button is-small backend-img-upload-button">Replace Image</Button>
                              </div> :
                              <Button onClick={open} className="button backend-img-upload-button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                </div>
            </div>

        </div>
    </section>
    <section class="team">
        <div class="container team--container">

        { teamdata &&
              teamdata.map((post) => {

          var teamimage;

          if(post.featured_media == 0 || post._embedded['wp:featuredmedia'][0].media_details == undefined)
          {
            teamimage = '/wp-content/themes/onxrp/assets/images/team-preview.png';
          }
          else
          {
           teamimage = post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
          }



        return (
          <div key={post.id} class="team--tile">
          <div class="team--shape">
              <img src="/wp-content/themes/onxrp/assets/images/team-shape.svg" alt="onXRP" />
          </div>
          <h5 class="team--heading heading-five">
             {post.onxrp_team_designation}
          </h5>
          <div class="team--pic-social">
              <div class="pic">
                  <img src={teamimage} />
              </div>
              <div class="social">
             {post.onxrp_team_twitter != '' &&
              <a target="_blank" href={post.onxrp_team_twitter }><img src="/wp-content/themes/onxrp/assets/images/icon-twitter.svg" alt="onXRP" /></a>
             }
             {post.onxrp_team_linkedin != '' &&
              <a target="_blank" href={post.onxrp_team_linkedin}><img src="/wp-content/themes/onxrp/assets/images/icon-linkedin.svg" alt="onXRP" /></a>
              }
              </div>
          </div>
          <h3 class="team--name heading-three">
          {post.title.raw}
          </h3>
          <div class="team--description">
          {truncate(post.excerpt.raw, 200, '...')}
          </div>
      </div>
          );
        })
}
        </div>
    </section>
    </div>
  );

}
