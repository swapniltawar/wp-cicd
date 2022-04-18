/* global React */

export default function Linktext ({ attributes, setAttributes }) {

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
            <TextControl
              label={__('Link Second', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrlSecond: newValue,
                });
              }}
              placeholder={__('Add Link', 'clab')}
              value={attributes.buttonUrlSecond}
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
        <section class=" sub-articles odd-row graphic-sub-section-wrapper">
        <div class="container sub-articles--container">
           <div class="article-title d-flex align-items-center">
                <img src="/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP"/>
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
            <div class="sub-articles--content d-flex">
                <div class="big-cta even-odd-big-cta d-flex">
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
                    <div class="btn round-primary">
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
                <div class="sub-articles--column">
                <RichText
                            className={ "lined-title" }
                            tagName="h2"
                            onChange={(newValue) => {
                              setAttributes({
                                mainTitle: newValue,
                              });
                            }}
                            value={ attributes.mainTitle }
                            formattingControls= { [] }
                        />
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
                    <div class="btn round-primary">
                    <RichText
                            tagName="span"
                            onChange={(newValue) => {
                              setAttributes({
                                buttonTextSecond: newValue,
                              });
                            }}
                            value={ attributes.buttonTextSecond }
                            formattingControls= { [] }
                        />


                        <div class="btn-shape"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
  );

}
