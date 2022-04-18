/* global React */

export default function Sliderblock ({ attributes, setAttributes }) {

  const {
    editor: {
      InspectorControls,
      MediaUpload,
    },
    components: {
      Button,
      IconButton,
      PanelBody,
      TextControl,
    },
    i18n: {
      __,
    },
  } = wp;

  const handleAddSlide = () => {
        const slides = [ ...attributes.slides ];
        slides.push( {
            title: 'Slide Text',
            imageUrl: '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
        } );
        setAttributes( { slides } );
    };

    const handleRemoveSlide = ( index ) => {
        const slides = [ ...attributes.slides ];
        slides.splice( index, 1 );
        setAttributes( { slides } );
    };

    const handleSlideChange = ( title, index ) => {
        const slides = [ ...attributes.slides ];
        slides[ index ].title = title;
        setAttributes( { slides } );
    };

    const handleSlideImageUrlChange = ( media, index ) => {
      const slides = [ ...attributes.slides ];
      slides[ index ].imageUrl = media.url;
      slides[ index ].imageId = media.id;
      setAttributes( { slides } );
    };

    let slideFields,
        slidesDisplay;

    if ( attributes.slides.length ) {
        slideFields = attributes.slides.map( ( slide, index ) => {
            return <React.Fragment key={ index }>
                <TextControl
                    className=""
                    placeholder="Slide Text"
                    value={ attributes.slides[ index ].title }
                    onChange={ ( title ) => handleSlideChange( title, index ) }
                />
                <img width={80} height={80} src={attributes.slides[ index ].imageUrl} />
                <MediaUpload
                  onSelect={(media) => {handleSlideImageUrlChange(media, index)}}
                  multiple={false}
                  allowedTypes={ [ 'image' ] }
                  render={({ open }) => (
                    <>
                      <button onClick={open}>
                        {attributes.slides[ index ].imageUrl == ''
                          ? 'Upload image'
                          : 'Replace image'}
                      </button>
                    </>
                  )}
                />
                <IconButton
                    className=""
                    icon="no-alt"
                    label="Delete location"
                    onClick={ () => handleRemoveSlide( index ) }
                />
            </React.Fragment>;
        } );

        slidesDisplay = attributes.slides.map( ( slide, index ) => {
            return (
              <div key={ index } className="swiper-slide">
                  <div className="featured-projects--tile">
                      <h5 className="heading-five">{ slide.title }</h5>
                      <div className="tile-shape"></div>
                      <div className="tile-image" style={{backgroundImage: `url(${slide.imageUrl})`}}>
                      </div>
                  </div>
              </div>
            );
        } );
    }

    return [
        <InspectorControls key="1">
            <PanelBody title={ __( 'Slides' ) }>
                { slideFields }
                <Button
                    isDefault
                    onClick={ handleAddSlide.bind( this ) }
                >
                    { __( 'Add Slide' ) }
                </Button>
            </PanelBody>
        </InspectorControls>,
        <section key="2" className="partner-slider">
            <div className="container partner-slider--container">
                <div className="swiper partner-slider--swiper js-partnerSwiper">
                    <div className="swiper-wrapper">
                        { slidesDisplay }
                    </div>
                </div>
                <div className="swiper-buttons">
                    <div className="next-prev">
                        <div className="swiper-button-next"><span>Next</span></div>
                        <div className="swiper-button-prev"><div className="prev-circle"></div></div>
                    </div>
                    <div className="pagination">
                        <div className="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </section>
    ];

}
