/* global React */

import PropTypes from '../../../../../node_modules/prop-types';
import ImagePicker from '../../components/imagePicker';

/**
 * A React component to render the edit view of a Product block.
 */
export default class HeroblockEdit extends React.PureComponent {
  render() {
    const {
      editor: {
        InspectorControls,
        RichText,
      },
      components: {
        PanelRow,
        PanelBody,
        SelectControl,
        CheckboxControl,
        TextControl,
      },
      i18n: {
        __,
      },
    } = wp;

    const {
      attributes: {
        titleText = '',
        descriptionText = '',
        buttonText = '',
        buttonUrl = '',
        newTab = true,
        primage = '',
        backgoundColor = 'wl-bg-white',
        textColor = 'wl-color-navy',
        imgbackgoundColor = 'wl-bg-orange',
        btnBorder = 'btn-orange',
        image = Number(0),
        extraid = '',
      } = {},
      setAttributes,
    } = this.props;

    const removeprimage = () => {
      setAttributes({
        primage: '',
      });
    };

    const txtColor = [
      { value: 'wl-color-white', label: __('White', 'clabs') },
      { value: 'wl-color-navy', label: __('Navy', 'clabs') },
    ];

    const bgColor = [
      { value: 'wl-bg-white', label: __('White', 'clabs') },
      { value: 'wl-bg-grey', label: __('Grey', 'clabs') },
      { value: 'wl-bg-blue', label: __('Blue', 'clabs') },
      { value: 'wl-bg-yellow', label: __('Yellow', 'clabs') },
      { value: 'wl-bg-navy', label: __('Navy', 'clabs') },
      { value: 'wl-bg-green', label: __('Green', 'clabs') },
      { value: 'wl-bg-red', label: __('Red', 'clabs') },
      { value: 'wl-bg-orange', label: __('Orange', 'clabs') },
      { value: 'wl-bg-pink', label: __('Pink', 'clabs') },
      { value: 'wl-bg-transparent', label: __('Transparent', 'clabs') },
    ];

    return (
      <div className="">
        <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Hero Block', 'clabs')}
          >
            <TextControl
              label={__('CTA Link', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrl: newValue,
                });
              }}
              placeholder={__('Add Link', 'clab')}
              value={buttonUrl}
            />
            <div className="block-textcolor-wrapper">
              <SelectControl
                label={__('Text Color', 'clabs')}
                options={txtColor}
                value={textColor}
                onChange={(value) => {
                  setAttributes({
                    textColor: value,
                  });
                }}
              />
            </div>
            <div className="block-bgcolor-wrapper">
              <SelectControl
                label={__('Background Color', 'clabs')}
                options={bgColor}
                value={backgoundColor}
                onChange={(value) => {
                  setAttributes({
                    backgoundColor: value,
                  });
                }}
              />
            </div>
            <div className="block-img-bgcolor-wrapper">
              <SelectControl
                label={__('Image Background Color', 'clabs')}
                options={bgColor}
                value={imgbackgoundColor}
                onChange={(value) => {
                  setAttributes({
                    imgbackgoundColor: value,
                  });
                }}
              />
            </div>
            <div className="block-btn-border-color-wrapper">
              <SelectControl
                label={__('Button Border Color', 'clabs')}
                onChange={(value) => {
                  setAttributes({
                    btnBorder: value,
                  });
                }}
                value={btnBorder}
                options={[
                  { label: 'Orange', value: 'orange-border' },
                  { label: 'Navy', value: 'navy-border' },
                ]}
              />
            </div>
            <PanelRow>
              <CheckboxControl
                label={__('Open in a new tab', 'clabs')}
                id="product-link-new-tab"
                onChange={(newValue) => {
                  setAttributes({
                    newTab: newValue,
                  });
                }}
                checked={newTab}
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
              value={extraid}
            />
          </PanelBody>
        </InspectorControls>
        <section className="hero-block11">
          <div className={['hero-block--container', backgoundColor].join(' ')}>
            <div className={['hero-block--image-bg', imgbackgoundColor].join(' ')}>
              {primage ? (
                <div>
                  <img src={primage} alt="" className="block-new-product-image" />
                  <button type="button" className="components-button is-primary" onClick={removeprimage}>Remove image</button>
                </div>
              ) : (
                <ImagePicker
                  metaKey="image"
                  onUpdate={(key, value) => setAttributes({
                    image: Number(value),
                  })}
                  value={image}
                />
              )}
            </div>
            <div className="hero-block--content">
              <RichText
                className={['heading-one', textColor].join(' ')}
                keepPlaceholderOnFocus
                onChange={(newValue) => {
                  setAttributes({
                    titleText: newValue,
                  });
                }}
                placeholder={__('Add Title', 'clab')}
                value={titleText}
              />
              <RichText
                className={['content-para', textColor].join(' ')}
                keepPlaceholderOnFocus
                onChange={(newValue) => {
                  setAttributes({
                    descriptionText: newValue,
                  });
                }}
                placeholder={__('Add Description', 'clab')}
                value={descriptionText}
              />
              <div className="cta">
                <RichText
                  className={['btn get-started ', btnBorder].join(' ')}
                  tagName="a"
                  keepPlaceholderOnFocus
                  onChange={(newValue) => {
                    setAttributes({
                      buttonText: newValue,
                    });
                  }}
                  placeholder={__('Add CTA text', 'clab')}
                  value={buttonText}
                />
              </div>
            </div>
          </div>
        </section>
      </div>
    );
  }
}

// Set up initial props.
HeroblockEdit.defaultProps = {
  attributes: {
    titleText: '',
    descriptionText: '',
    buttonText: '',
    buttonUrl: '',
    newTab: true,
    image: Number(0),
    primage: '',
    backgoundColor: 'wl-bg-white',
    textColor: 'wl-color-navy',
    imgbackgoundColor: 'wl-bg-orange',
    btnBorder: 'btn-orange',
    extraid: '',
  },
};

// Set PropTypes for this component.
HeroblockEdit.propTypes = {
  attributes: PropTypes.shape({
    titleText: PropTypes.string,
    descriptionText: PropTypes.string,
    buttonText: PropTypes.string,
    buttonUrl: PropTypes.string,
    newTab: PropTypes.bool,
    primage: PropTypes.string,
    image: PropTypes.number,
    backgoundColor: PropTypes.string,
    textColor: PropTypes.string,
    imgbackgoundColor: PropTypes.string,
    btnBorder: PropTypes.string,
    extraid: PropTypes.string,
  }),
  setAttributes: PropTypes.func.isRequired,
};
