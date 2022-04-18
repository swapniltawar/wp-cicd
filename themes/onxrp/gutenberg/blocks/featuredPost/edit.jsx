/* global React */
export default function Featuredpost ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      InspectorControls,
      MediaUpload,
      MediaUploadCheck,

    },
    components: {
      Button,
      PanelRow,
      PanelBody,
      SelectControl,
      TextControl,
      Spinner,
    },
    element: {
      useState
    },
    compose:{
      compose
    },
    data: {
        useSelect, useDispatch, withSelect
    },
    apiFetch,
    i18n: {
      __,
    },
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

  const truncate = (str, max, suffix) => str.length < max ? str : `${str.substr(0, str.substr(0, max - suffix.length).lastIndexOf(' '))}${suffix}`;

  const postdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'post', { per_page: 4, _embed: true,orderby: 'date',order: 'desc', categories: [attributes.terms]});

});

  return (
    <div>
         <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Featured Post', 'clabs')}
          >
            <PanelRow>
           <TermsSelect>

           </TermsSelect>
           </PanelRow>
            <PanelRow>
            <SelectControl
                label={__('Order By', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    orderBy: newValue,
                  });
                }}
                value={attributes.orderBy}
                options={[
                  { value: 'date/desc', label: __('Newest to oldest', 'clabs') },
                  { value: 'date/asc', label: __('Oldest to newest', 'clabs') },
                  { value: 'title/asc', label: __('A → Z', 'clabs') },
                  { value: 'title/desc', label: __('Z → A', 'clabs') },
                ]}
              />
           </PanelRow>
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
                  { label: 'Right', value: 'title-right second-option' },
                ]}
              />
           </PanelRow>
           <PanelRow>
            <SelectControl
                label={__('Button Position', 'clabs')}
                onChange={(newValue) => {
                  setAttributes({
                    buttonPosition: newValue,
                  });
                }}
                value={attributes.buttonPosition}
                options={[
                  { label: 'Right', value: 'odd-row' },
                  { label: 'Left', value: 'even-row' },
                ]}
              />
           </PanelRow>
            <PanelRow>
            <TextControl
              label={__('Button Link', 'clab')}
              onChange={(newValue) => {
                setAttributes({
                  buttonUrl: newValue,
                });
              }}
              placeholder={__('Add Link', 'clab')}
              value={attributes.buttonUrl}
            />
            </PanelRow>

          </PanelBody>
        </InspectorControls>

     <section class={'featured-article  '+attributes.titlePosition}>
        <div class="container">
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

            { postdata?.length &&

            <div class="featured-article--content d-flex">
                <div class="content">
                    <div class="content-inner">
                        <div class="tags">
                            {postdata[0].first_category}
                        </div>
                        <h1 class="heading-one">
                           {postdata[0].title.raw}
                        </h1>
                        <div class="content-para">
                          {truncate(postdata[0].excerpt.raw, 100, '...')}
                        </div>
                        <div class="author-date">
                            <div class="author-name">
                            {postdata[0].author_name}
                            </div>
                            <div class="article-date">
                            {new Date(postdata[0].date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image">
                    <div class="image--oval-shape"></div>
                    <div class="image--wrapper" style={{
              background: `url(${postdata[0].featured_image_url})`,
            }}>

                    </div>
                </div>
            </div>
         }
        </div>
    </section>

    <section class={'sub-articles '+attributes.buttonPosition}>
        <div class="container sub-articles--container">
            <div class="sub-articles--content d-flex">
                <div class="sub-articles--column d-flex">

        { postdata &&
              postdata.map((post, index) => {

          var postimage;
          if(post.featured_image_url)
          {
            postimage = post.featured_image_url;
          }
          else{
            postimage = null;
          }

              if (index != 0) {
          return (
            <div key={index} class="article-block">
                <div class="article-block--image">
                    <img src={postimage} />
                </div>
                <div class="article-block--devider"></div>
                <div class="tags">
               {post.first_category}
                </div>
                <h2 class="heading-three">
                   {post.title.raw}
                </h2>
                <div class="author-name">
                {post.author_name}
                </div>
                <div class="article-date">
                {new Date(post.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                </div>
            </div>
            );
               } })
        }
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
                                buttonText: newValue,
                              });
                            }}
                            value={ attributes.buttonText }
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
