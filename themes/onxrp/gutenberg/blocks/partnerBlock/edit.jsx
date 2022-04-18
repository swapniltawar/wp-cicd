/* global React */
// import Swiper JS
import Swiper, { Navigation, Pagination } from 'swiper';
export default function Partnerblock ({ attributes, setAttributes, clientId}) {

  const {
    editor: {
      RichText,
      InspectorControls,
      MediaUpload,
    },
    components: {
      Button,
      IconButton,
      PanelBody,
      TextControl,
      CheckboxControl,
    },
    i18n: {
      __,
    },
  } = wp;

  const handleAddSlide = () => {
        const partnerlist = [ ...attributes.partnerlist ];
        partnerlist.push( {
            title: 'Partner Text',
            imageUrl: '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
            linkUrl: '#',
        } );
        setAttributes( { partnerlist } );
    };

    const handleRemoveSlide = ( index ) => {
        const partnerlist = [ ...attributes.partnerlist ];
        partnerlist.splice( index, 1 );
        setAttributes( { partnerlist } );
    };

    const handleSlideChange = ( title, index ) => {
        const partnerlist = [ ...attributes.partnerlist ];
        partnerlist[ index ].title = title;
        setAttributes( { partnerlist } );
    };

    const handleSlideImageUrlChange = ( media, index ) => {
      const partnerlist = [ ...attributes.partnerlist ];
      partnerlist[ index ].imageUrl = media.url;
      partnerlist[ index ].imageId = media.id;
      setAttributes( { partnerlist } );
    };

    const handleSlideLinkUrlChange = ( linkUrl, index ) => {
        const partnerlist = [ ...attributes.partnerlist ];
        partnerlist[ index ].linkUrl = linkUrl;
        setAttributes( { partnerlist } );
    };
    const handleSlideLinkUrlTabChange = ( newTab, index ) => {
        const partnerlist = [ ...attributes.partnerlist ];
        partnerlist[ index ].newTab = newTab;
        setAttributes( { partnerlist } );
    };


   const swiper = new Swiper('.js-partner-swiper-'+clientId, {
    modules: [Navigation, Pagination],
    slidesPerView: 3,
    spaceBetween: 40,
    slidesPerGroup: 3,
    // slidesPerView: 2,
    // spaceBetween: 20,
    breakpoints: {
        // when window width is >= 320px
        320: {
            slidesPerView: 2,
            spaceBetween: 20,
            slidesPerGroup: 2
        },

        // when window width is >= 640px
        768: {
            slidesPerView: 2,
            spaceBetween: 24,
            slidesPerGroup: 2
        },
        991: {
            slidesPerView: 3,
            spaceBetween: 40,
            slidesPerGroup: 3
        }
    },
    navigation: {
        nextEl: ".swiper-button-next-"+clientId,
        prevEl: ".swiper-button-prev-"+clientId,
    },
    pagination: {
        el: ".swiper-pagination-"+clientId,
        clickable: true
    },

    // slidesPerGroup: 3,
    loop: true,
    loopFillGroupWithBlank: true,

  });



    let slideFields,
        partnerlistDisplay;

    if ( attributes.partnerlist.length ) {
        slideFields = attributes.partnerlist.map( ( slide, index ) => {
            return <React.Fragment key={ index }>
                <TextControl
                    className=""
                    placeholder="Partner Text"
                    value={ attributes.partnerlist[ index ].title }
                    onChange={ ( title ) => handleSlideChange( title, index ) }
                />
                <img width={80} height={80} src={attributes.partnerlist[ index ].imageUrl} />
                <MediaUpload
                  onSelect={(media) => {handleSlideImageUrlChange(media, index)}}
                  multiple={false}
                  allowedTypes={ [ 'image' ] }
                  render={({ open }) => (
                    <>
                      <button onClick={open}>
                        {attributes.partnerlist[ index ].imageUrl == ''
                          ? 'Upload image'
                          : 'Replace image'}
                      </button>
                    </>
                  )}
                />
                 <TextControl
                    className=""
                    placeholder="Link Url"
                    value={ attributes.partnerlist[ index ].linkUrl }
                    onChange={ ( linkUrl ) => handleSlideLinkUrlChange( linkUrl, index ) }
                />
                <CheckboxControl
                    label={__('Open in a new tab', 'clabs')}
                    id="product-link-new-tab"
                    onChange={ ( newTab ) => handleSlideLinkUrlTabChange( newTab, index ) }
                    checked={attributes.partnerlist[ index ].newTab}
                />
                <IconButton
                    className=""
                    icon="no-alt"
                    label="Delete location"
                    onClick={ () => handleRemoveSlide( index ) }
                />
            </React.Fragment>;
        } );

        partnerlistDisplay = attributes.partnerlist.map( ( slide, index ) => {
            return (
             <div key={index} class="swiper-slide">
              <div className="featured-projects--tile">
                  <a href={ slide.linkUrl }><h5 className="heading-five">{ slide.title }</h5></a>
                  <div className="tile-shape"></div>
                  <a href={ slide.linkUrl }><div className="tile-image" style={{backgroundImage: `url(${slide.imageUrl})`}}></div></a>
              </div>
              </div>
            );
        } );
    }

    return [
        <InspectorControls key="1">
            <PanelBody title={ __( 'Partner List' ) }>
                { slideFields }

                    <Button
                        isDefault
                        onClick={ handleAddSlide.bind( this ) }
                    >
                        { __( 'Add Partner' ) }
                    </Button>

            </PanelBody>
        </InspectorControls>,
         <section class="partner-slider partner-slider-bk title-right">
              <div class="container">
            <div class="article-title d-flex align-items-center">
            <img src="/wp-content/themes/onxrp/assets/images/title-icon.svg" alt="onXRP" />
                    <RichText
                        keepPlaceholderOnFocus
                        onChange={(newValue) => {
                        setAttributes({
                            sectionText: newValue,
                        });
                        }}
                        placeholder={__('Add Title', 'clab')}
                        value={attributes.sectionText}
                    />
            </div>
          </div>
         <div class="container partner-slider--container">

         <div class={'swiper partner-slider--swiper js-partnerSwiper js-partner-swiper-'+ clientId}>
         <div class="swiper-wrapper">
           { partnerlistDisplay }
         </div>
         </div>
                <div class="swiper-buttons">
                <div class="next-prev">
                    <div class={'swiper-button-next swiper-button-next-'+ clientId}><span>Next</span></div>
                    <div class={'swiper-button-prev swiper-button-prev-'+ clientId}><div class="prev-circle"></div></div>
                </div>
                <div class={'pagination pagination-'+ clientId}>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
                </div>

        </section>
    ];

}
