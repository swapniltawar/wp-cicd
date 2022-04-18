/* global React */
export default function Projectblock ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      InspectorControls,

    },
    components: {
      PanelBody,
      TextControl,
      CheckboxControl,
      PanelRow,
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
    i18n: {
      __,
    },
  } = wp;


  const projectdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'project', { per_page: 3, _embed: true});
   });



  return (
    <div>
    <InspectorControls key="inspector">
    <PanelBody
      initialOpen
      title={__('Configure Project Block', 'clabs')}
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
    <section class="featured-projects">
    <div class="container featured-projects--container d-flex">
        <div class="featured-projects--left d-flex">

        { projectdata &&
              projectdata.map((post) => {

          var projectimage;

          if(post.featured_media == 0 || post._embedded['wp:featuredmedia'][0].media_details == undefined)
          {
            projectimage = null;
          }
          else
          {
            projectimage = post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
          }

        return (
          <div class="featured-projects--tile">
            <a target="_blank" href={!!(post.onxrp_project_redirect)?post.onxrp_project_redirect:'javascript:;'}><h5 class="heading-five">{post.title.raw}</h5></a>
                <div class="tile-shape"></div>
                <a target="_blank" href={!!(post.onxrp_project_redirect)?post.onxrp_project_redirect:'javascript:;'}>
               <div class="tile-image" style={{
              background: `url(${projectimage})`
            }}>
                </div>
                </a>
                </div>);
            })}

          </div>

        <div class="big-cta d-flex">
            <div class="cta-shape">
                <svg width="162px" height="242px" viewBox="0 0 162 242" version="1.1">
                    <title>Rectangle</title>
                    <defs>
                        <linearGradient x1="0%" y1="50%" x2="100%" y2="50%" id="linearGradient-1">
                            <stop stop-color="#0C01F4" offset="0%"></stop>
                            <stop stop-color="#9F00B9" offset="100%"></stop>
                        </linearGradient>
                    </defs>
                    <g id="Desktop" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="01_Home" transform="translate(-1069.000000, -1706.000000)" fill-rule="nonzero" stroke="url(#linearGradient-1)">
                            <g id="Group-8" transform="translate(1070.000000, 1707.000000)">
                                <rect id="Rectangle" x="0" y="0" width="160" height="240" rx="80"></rect>
                            </g>
                        </g>
                    </g>
                </svg>
            </div>
            <div  class="btn round-primary">
            <RichText
                            tagName="span"
                            onChange={(newValue) => {
                              setAttributes({
                                buttonText: newValue,
                              });
                            }}
                            value={ attributes.buttonText }
                            formattingControls= { [] }
                        />

                <div class="btn-shape"></div>
            </div>
        </div>
    </div>
</section>
</div>
  );

}
