/* global React */

export default function Brandguide ({ attributes, setAttributes, clientId}) {

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



  const { image , downloadfile, blockId} = attributes;
  setAttributes( { blockId: clientId } );

  return (
    <div>
         <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Brand Guide', 'clabs')}
          >
            <PanelRow>
            <TextControl
                    label={__('List Id', 'clab')}
                    onChange={(newValue) => {
                        setAttributes({
                        listId: newValue,
                        });
                    }}
                    placeholder={__('List Id', 'clab')}
                    value={attributes.listId}
            />
           </PanelRow>
           <PanelRow>
           <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={downloadfile => setAttributes({ downloadfile: downloadfile })}
                          value={ downloadfile ? downloadfile.id : ''}
                          render={({ open }) => (
                            downloadfile ?
                              <div>
                                    <a download href={downloadfile.url}>{downloadfile.url}</a>

                                  <Button onClick={() => setAttributes({ downloadfile: '' })} className="button is-small">Replace File</Button>
                              </div> :
                              <Button onClick={open} className="button">Upload File</Button>
                          )}
                        />
                    </MediaUploadCheck>
           </PanelRow>
          </PanelBody>
        </InspectorControls>
    <section className="graphic-section-wrapper">
       <div class="featured-article">
        <div className="container">
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
                                    <div className="image--wrapper"  style={{backgroundImage: `url(${image})`}}></div>
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
