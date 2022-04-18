/* global React */

export default function Linkblock ({ attributes, setAttributes }) {

  const {
    editor: {
      RichText,
      MediaUpload,
      InspectorControls,
      MediaUploadCheck
    },
    components: {
      Button,
      PanelRow,
      PanelBody,
      CheckboxControl,
      TextControl,
    },
    i18n: {
      __,
    },
  } = wp;



  const { image } = attributes;

  return (
    <div>
         <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Link Block', 'clabs')}
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
               <PanelRow>
               <CheckboxControl
                label={__('Download', 'clabs')}
                id="product-link-download"
                onChange={(newValue) => {
                  setAttributes({
                    downloadLink: newValue,
                  });
                }}
                checked={attributes.downloadLink}
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
    <section className="graphic-section-wrapper">
       <div class="featured-article">
        <div className="container">
        <div class="featured-article--content featured-article--content--full featured-article--content--full--nbb d-flex">
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
                              <>
                                {
                                  typeof image === 'string' ?
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image})`}}></div>
                                  :
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ image: '' })} className="button is-small backend-img-upload-button">Replace Image</Button>
                              </> :
                              <Button onClick={open} className="button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                    <RichText
                            className={ "btn btn--gradient" }
                            tagName="a"
                            onChange={(newValue) => {
                              setAttributes({
                                buttonText: newValue,
                              });
                            }}
                            value={ attributes.buttonText }
                            formattingControls= { [] }
                        />

                    </div>
                </div>
           </div>
        </div>
    </section>
    </div>
  );

}
