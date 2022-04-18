/* global React */
export default function Gridposts ({ attributes, setAttributes }) {

  const {
    editor: {
      InspectorControls,
      RichText,
      MediaUpload,
      MediaUploadCheck,
      MediaPlaceholder
    },
    components: {
      PanelRow,
      PanelBody,
      SelectControl,
      CheckboxControl,
      TextControl,
      Button,
      Spinner
    },
    element: {
      useState
    },
    apiFetch,
    i18n: {
      __,
    },
    compose:{
      compose
    },
    data: {
        useSelect, useDispatch, withSelect
    }
  } = wp;

  const { invalidateResolution } = useDispatch('core/data');

    const Render = ( { terms } ) => {

        if ( null === terms ) return <Spinner />;

        const termOptions = terms.map( ( term ) => {
            return {
                label: term.name,
                value: term.id
            }
        });

        termOptions.unshift({label: 'Select Term', value: ''});

        return (
            <SelectControl
                label={ __(
                    'Terms',
                    'pmc-gutenberg'
                ) }
                onChange={ ( value ) => {
                  setAttributes({
                    terms: value,
                  });
                } }
                value={attributes.terms}
                options={ termOptions }
            />
        );
    };

    // This is the "actual" component,
    // together with the markup and data.
    // You can add withDispatch as another argument
    // to the compose function and return an object
    // of methods to access in Render.
    const TermsSelect = compose(
        withSelect( ( scopedSelect ) => {
            const {
                getEntityRecords
            } = scopedSelect( 'core' );

            return {
                terms: getEntityRecords( 'taxonomy', 'category', { per_page: 100 } ),
            };
        } )
    )( Render );

    // Has the request resolved?
    const isLoading = useSelect((select) => {
        return select('core/data').isResolving('core', 'getEntityRecords', [
            'postType', 'post'
        ]);
    });

    // Show the loading state if we're still waiting.
    if (isLoading) {
        return <h3>Loading...</h3>;
    }

  const blockType = [
    {"value": 'button', "label": 'Button'},
    {"value": 'normal', "label": 'Normal'}
  ];

    const posts = useSelect((select) => {
        return select('core').getEntityRecords('postType', 'post', { per_page: 3, _embed: true,orderby: 'date',order: 'desc', categories: [attributes.terms]});
    });


  return (
    <div className="">
        <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Grid Posts', 'clabs')}
          >
            <TextControl
              label={__('Article Title', 'clab')}
              onChange={(newValue) => {
                  setAttributes({
                      sectionText: newValue,
                  });
              }}
              placeholder={__('Education Article', 'clab')}
              value={attributes.sectionText}
            />
            <TermsSelect>

            </TermsSelect>
            <SelectControl
                label={__('Block Type', 'clabs')}
                options={blockType}
                value={blockType.value}
                onChange={(value) => {
                setAttributes({
                    blockType: value,
                });
                }}
            />
            <SelectControl
                label={__('Button Position', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    buttonPosition: newValue,
                  });
                }}
                value={attributes.buttonPosition}
                options={[
                  { label: 'Left',  value: 'even-row' },
                  { label: 'Right', value: 'odd-row' },
                ]}
              />

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
        <section className={'sub-articles ' + attributes.buttonPosition }>
            <div className="container sub-articles--container">
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
                <div className="sub-articles--content d-flex">
                    <div className="sub-articles--column d-flex">
                        { posts &&
                                posts.map((post) => {

                                    var postimage;
                                    if(post.featured_image_url)
                                    {
                                      postimage = post.featured_image_url;
                                    }
                                    else{
                                      postimage = null;
                                    }
                                    // getAuthorName(post.author);
                                    // getThumbUrl(post.featured_media);
                                    // getCategoryName(post.categories[0]);

                                    // console.log('post ..... ',post.categories[0]);
                                    // console.log('post ..... ',attributes.thumbUrl);
                                    return (
                                        <div key={post.id} className="article-block">
                                            <div className="article-block--image">
                                                <img src={postimage} alt="onXRP" />
                                            </div>
                                            <div className="article-block--devider"></div>
                                            <div className="tags">
                                                {post.first_category}
                                            </div>
                                            <h2 className="heading-three">
                                                {post.title.rendered}
                                            </h2>
                                            <div className="author-name">
                                                {post.author_name}
                                            </div>
                                            <div className="article-date">
                                            {new Date(post.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                                            </div>
                                        </div>
                                    );
                                })
                        }

                    </div>

                    <div className="big-cta d-flex">
                        <div className="cta-shape">
                        </div>
                        <a href={attributes.buttonUrl}
                            className="btn round-primary"
                            target={attributes.newTab === true ? '_blank' : '_self'}
                            >
                            <span>{attributes.buttonText}</span>
                            <div className="btn-shape"></div>
                        </a>
                    </div>

                </div>
            </div>
        </section>
    </div>
  );
}