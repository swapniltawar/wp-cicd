/* global React */
export default function Gridblock ({ attributes, setAttributes }) {
  const {
    editor: {
      RichText,
      InspectorControls,

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

  const postdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'post', { per_page: 4, _embed: true,orderby: attributes.orderBy.split("/")[0],order: attributes.orderBy.split("/")[1], categories: [attributes.terms]});

});

  return (
    <div>
         <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Grid Block', 'clabs')}
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
                  { label: 'Right', value: 'odd-row' },
                  { label: 'Left', value: 'even-row' },
                ]}
              />
           </PanelRow>
          </PanelBody>
        </InspectorControls>

        <section class={'sub-articles sub-articles-full '+attributes.titlePosition}>
        <div class="container sub-articles--container">
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

          return (
                  <div key={post.id} class="article-block">
                        <div class="article-block--image">
                            <img src={postimage}/>
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
                     })
             }

                </div>
            </div>
        </div>
    </section>
    </div>
  );

}
