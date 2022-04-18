/* global React */

export default function Appblock ({ attributes, setAttributes }) {

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
        const applist = [ ...attributes.applist ];
        applist.push( {
            title: 'App Title',
            subTitle: 'Sub Title Text',
            imageUrl: '/wp-content/themes/onxrp/assets/images/article-img.png',
            linkUrl: '#',
            newTab: '',
            comingSoon: '',
        } );
        setAttributes( { applist } );
    };

    const handleRemoveSlide = ( index ) => {
        const applist = [ ...attributes.applist ];
        applist.splice( index, 1 );
        setAttributes( { applist } );
    };

    const handleSlideSubTitleChange = ( subTitle, index ) => {
        const applist = [ ...attributes.applist ];
        applist[ index ].subTitle = subTitle;
        setAttributes( { applist } );
    };

    const handleSlideChange = ( title, index ) => {
        const applist = [ ...attributes.applist ];
        applist[ index ].title = title;
        setAttributes( { applist } );
    };

    const handleSlideImageUrlChange = ( media, index ) => {
      const applist = [ ...attributes.applist ];
      applist[ index ].imageUrl = media.url;
      applist[ index ].imageId = media.id;
      setAttributes( { applist } );
    };

    const handleSlideLinkUrlChange = ( linkUrl, index ) => {
        const applist = [ ...attributes.applist ];
        applist[ index ].linkUrl = linkUrl;
        setAttributes( { applist } );
    };

    const handleSlideLinkUrlTabChange = ( newTab, index ) => {
        const applist = [ ...attributes.applist ];
        applist[ index ].newTab = newTab;
        setAttributes( { applist } );
    };

    const handleSlideComingSoonChange = ( comingSoon, index ) => {
        const applist = [ ...attributes.applist ];
        applist[ index ].comingSoon = comingSoon;
        setAttributes( { applist } );
    };


    let slideFields,
        applistDisplay;

    if ( attributes.applist.length ) {
        slideFields = attributes.applist.map( ( slide, index ) => {
            return <React.Fragment key={ index }>
                <TextControl
                    className=""
                    placeholder="App Text"
                    value={ attributes.applist[ index ].title }
                    onChange={ ( title ) => handleSlideChange( title, index ) }
                />
                 <TextControl
                    className=""
                    placeholder="Sub Title Text"
                    value={ attributes.applist[ index ].subTitle }
                    onChange={ ( subTitle ) => handleSlideSubTitleChange( subTitle, index ) }
                />
                <img width={80} height={80} src={attributes.applist[ index ].imageUrl} />
                <MediaUpload
                  onSelect={(media) => {handleSlideImageUrlChange(media, index)}}
                  multiple={false}
                  allowedTypes={ [ 'image' ] }
                  render={({ open }) => (
                    <>
                      <button onClick={open}>
                        {attributes.applist[ index ].imageUrl == ''
                          ? 'Upload image'
                          : 'Replace image'}
                      </button>
                    </>
                  )}
                />
                 {slide.comingSoon ?
                 ''
                 :
                 <>
                 <TextControl
                    className=""
                    placeholder="Link Url"
                    value={ attributes.applist[ index ].linkUrl }
                    onChange={ ( linkUrl ) => handleSlideLinkUrlChange( linkUrl, index ) }
                />
                <CheckboxControl
                    label={__('Open in a new tab', 'clabs')}
                    id="product-link-new-tab"
                    onChange={ ( newTab ) => handleSlideLinkUrlTabChange( newTab, index ) }
                    checked={attributes.applist[ index ].newTab}
                />
                </>
                }
                <CheckboxControl
                    label={__('Coming Soon', 'clabs')}
                    onChange={ ( comingSoon ) => handleSlideComingSoonChange( comingSoon, index ) }
                    checked={attributes.applist[ index ].comingSoon}
                />
                <IconButton
                    className=""
                    icon="no-alt"
                    label="Delete location"
                    onClick={ () => handleRemoveSlide( index ) }
                />
            </React.Fragment>;
        } );

        applistDisplay = attributes.applist.map( ( slide, index ) => {
            return (
                <div key={index} className={"article-block " + (slide.comingSoon ? 'coming-soon-wrapper' : '')}>
                    <div class="article-block--image">
                    <div class="tile-shape rellax" data-rellax-speed="0" data-rellax-xs-speed="0" data-rellax-mobile-speed="0" data-rellax-tablet-speed=".7" data-rellax-desktop-speed=".1"></div>
                    {slide.comingSoon ?
                    <>
                    <img src={slide.imageUrl}/>
                    <div class="coming-soon-overlay"></div>
                        <div class="coming-soon">
                            <p>Coming Soon</p>
                        </div>
                    </>
                    :
                    <a href={ slide.linkUrl } target="_blank" class="heading-three">
                        <img src={slide.imageUrl}/>
                    </a>
                    }
                    </div>
                    {slide.comingSoon ?
                    <h2 class="heading-three">{ slide.title } </h2>
                    :
                    <a href={ slide.linkUrl } target="_blank" class="heading-three">
                    { slide.title }  <span class="arrow is-top"></span>
                    </a>
                    }
                    <p class="article-text">
                    { slide.subTitle }
                    </p>
                </div>
            );
        } );
    }

    return [
        <InspectorControls key="1">
            <PanelBody title={ __( 'App List' ) }>
                { slideFields }

                    <Button
                        isDefault
                        onClick={ handleAddSlide.bind( this ) }
                    >
                        { __( 'Add App' ) }
                    </Button>

            </PanelBody>
        </InspectorControls>,

<section class="sub-articles sub-articles-full app-articles">
    <div class="sub-articles--container container">
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
        <div class="sub-articles--content d-flex">
            <div class="sub-articles--column d-flex">

            { applistDisplay }

                <div class="article-block no-data"></div>
            </div>
        </div>
    </div>
</section>

    ];

}
