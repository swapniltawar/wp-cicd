/* global React */

export default function Introblock ({ attributes, setAttributes }) {

  const {
    editor: {
      RichText,
      InspectorControls,
      MediaUpload,
      MediaUploadCheck
    },
    components: {
      Button,
      TextControl,
      PanelRow,
      PanelBody,
      CheckboxControl,
      SelectControl,
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
            title={__('Configure Intro Block', 'clabs')}
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
              <SelectControl
                label={__('Image Position', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    imagePosition: newValue,
                  });
                }}
                value={attributes.imagePosition}
                options={[
                  { label: 'Right', value: '' },
                  { label: 'Left', value: 'second-option' },
                ]}
              />
           </PanelRow>
          </PanelBody>
          <PanelBody
            initialOpen
            title={__('Configure Button URL', 'clabs')}
          >
            <TextControl
              label={__('Button URL', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrl: newValue,
                });
              }}
              placeholder={__('Add Button URL', 'clab')}
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
    <section className={'featured-article  '+attributes.titlePosition}>
        <div className="container">
            <div className="article-title d-flex align-items-center">
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

            <div className="featured-article--content d-flex">
                <div className="content">
                    <div className="content-inner">
                        <RichText
                            className={ "tags" }
                            tagName="div"
                            onChange={(newValue) => {
                              setAttributes({
                                sectionTag: newValue,
                              });
                            }}
                            value={ attributes.sectionTag }
                            formattingControls= { [] }
                        />
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
                        <RichText
                            className={ "content-para" }
                            tagName="div"
                            onChange={(newValue) => {
                              setAttributes({
                                subTitle: newValue,
                              });
                            }}
                            value={ attributes.subTitle }
                            formattingControls= { [] }
                        />
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
                <div className="image">
                    <div className="image--oval-shape"></div>
                    <MediaUploadCheck>
                        <MediaUpload
                          className="js-book-details-image wp-admin-book-details-image"
                          onSelect={image => setAttributes({ image: image })}
                          allowedTypes={ ['image'] }
                          value={ image ? image.id : ''}
                          render={({ open }) => (
                            image ?
                              <div align={"right"}>
                                {
                                  typeof image === 'string' ?
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image})`}}></div>
                                  :
                                    <div className="image--wrapper" style={{backgroundImage: `url(${image.url})`}}></div>
                                }
                                  <Button onClick={() => setAttributes({ image: '' })} className="button is-small">Replace Image</Button>
                              </div> :
                              <Button onClick={open} className="button">Upload Image</Button>
                          )}
                        />
                    </MediaUploadCheck>
                </div>                
            </div>

        </div>
    </section>
    </div>
  );

}
