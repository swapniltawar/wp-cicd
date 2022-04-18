/* global React */

export default function Infoblock ({ attributes, setAttributes }) {

  const {
    editor: {
      InspectorControls,
      RichText,
      MediaUpload,
      MediaUploadCheck
    },
    components: {
      Button,
      PanelBody,
      CheckboxControl,
      TextControl,
    },
    i18n: {
      __,
    },
  } = wp;

  const { col1Image, col2Image, col3Image } = attributes;

  return (

    <div className="">
      <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Info Block', 'clabs')}
          >
            <div className="block-cta-wrapper">
                <TextControl
                label={__('CTA Text', 'clab')}
                onChange={(newValue) => {
                    setAttributes({
                        buttonText: newValue,
                    });
                }}
                placeholder={__('More education articles', 'clab')}
                value={attributes.buttonText}
                />
                <TextControl
                    label={__('CTA Link', 'clab')}
                    onChange={(newValue) => {
                        setAttributes({
                        buttonUrl: newValue,
                        });
                    }}
                    placeholder={__('Add Link', 'clab')}
                    value={attributes.buttonUrl}
                />
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

            </div>
          </PanelBody>
      </InspectorControls>

      <section className="featured-projects">

        <div className="container featured-projects--container d-flex">
            <div className="featured-projects--left d-flex">
                <div className="featured-projects--tile">
                    <h5 className="heading-five">
                    <RichText
                        onChange={(newValue) => {
                          setAttributes({
                            col1Text: newValue,
                          });
                        }}
                        value={ attributes.col1Text }
                        formattingControls= { [] }
                    />
                    </h5>
                    <div className="tile-shape"></div>
                    <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={col1Image => setAttributes({ col1Image: col1Image })}
                          allowedTypes={ ['image'] }
                          value={ col1Image ? col1Image.id : ''}
                          render={({ open }) => (
                            col1Image ?
                              <div align={"right"}>
                                {
                                  typeof col1Image === 'string' ?
                                    <div className="tile-image" style={{backgroundImage: `url(${col1Image})`}}></div>
                                  :
                                    <div className="tile-image" style={{backgroundImage: `url(${col1Image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ col1Image: '' })} className="button is-small">Replace Image</Button>
                              </div> :
                              <Button onClick={open} className="button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                </div>

                <div className="featured-projects--tile">
                    <h5 className="heading-five">
                    <RichText
                        onChange={(newValue) => {
                          setAttributes({
                            col2Text: newValue,
                          });
                        }}
                        value={ attributes.col2Text }
                        formattingControls= { [] }
                    />
                    </h5>
                    <div className="tile-shape"></div>
                    <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={col2Image => setAttributes({ col2Image: col2Image })}
                          allowedTypes={ ['image'] }
                          value={ col2Image ? col2Image.id : ''}
                          render={({ open }) => (
                            col2Image ?
                              <div align={"right"}>
                                {
                                  typeof col2Image === 'string' ?
                                    <div className="tile-image" style={{backgroundImage: `url(${col2Image})`}}></div>
                                  :
                                    <div className="tile-image" style={{backgroundImage: `url(${col2Image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ col2Image: '' })} className="button is-small">Replace Image</Button>
                              </div> :
                              <Button onClick={open} className="button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                </div>

                <div className="featured-projects--tile">
                    <h5 className="heading-five">
                    <RichText
                        onChange={(newValue) => {
                          setAttributes({
                            col3Text: newValue,
                          });
                        }}
                        value={ attributes.col3Text }
                        formattingControls= { [] }
                    />
                    </h5>
                    <div className="tile-shape"></div>
                    <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={col3Image => setAttributes({ col3Image: col3Image })}
                          allowedTypes={ ['image'] }
                          value={ col3Image ? col3Image.id : ''}
                          render={({ open }) => (
                            col3Image ?
                              <div align={"right"}>
                                {
                                  typeof col3Image === 'string' ?
                                    <div className="tile-image" style={{backgroundImage: `url(${col3Image})`}}></div>
                                  :
                                    <div className="tile-image" style={{backgroundImage: `url(${col3Image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ col3Image: '' })} className="button is-small">Replace Image</Button>
                              </div> :
                              <Button onClick={open} className="button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                </div>
            </div>

            <div className="big-cta d-flex">
                <div className="cta-shape">
                </div>
                <a href={attributes.buttonUrl}
                    className="btn round-primary"
                    target={attributes.newTab === true ? '_blank' : '_self'}
                    >
                    <span>
                    <RichText
                        onChange={(newValue) => {
                          setAttributes({
                            buttonText: newValue,
                          });
                        }}
                        value={ attributes.buttonText }
                        allowedFormats= { [] }
                    />
                    </span>
                    <div className="btn-shape"></div>
                </a>
            </div>
        </div>
      </section>
    </div>
  );

}
