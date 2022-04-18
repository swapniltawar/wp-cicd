/* global React */
// import Swiper JS
import Swiper, { Navigation, Pagination } from 'swiper';
export default function Trustedresources ({ attributes, setAttributes, clientId }) {
  const {
    editor: {
      InspectorControls,
    },
    components: {
      TextControl,
      PanelBody,
    },
    element: {

    },
    compose:{

    },
    data: {
        useSelect
    },
    i18n: {
      __,
    },
  } = wp;


  const partnersdata = useSelect((select) => {
    return select('core').getEntityRecords('postType', 'trusted_resources', { per_page: -1, _embed: true});
   });

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



  return (
    <div>
         <InspectorControls key="inspector">
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
        <section class="partner-slider partner-slider-bk">
        <div class="container partner-slider--container">
        <div class={'swiper partner-slider--swiper js-partnerSwiper js-partner-swiper-'+ clientId}>
                <div class="swiper-wrapper">

                { partnersdata &&
              partnersdata.map((post) => {

          var partnerimage;

          if(post.featured_media == 0 || post._embedded['wp:featuredmedia'][0].media_details == undefined)
          {
            partnerimage = null;
          }
          else
          {
            partnerimage = post._embedded['wp:featuredmedia'][0].media_details.sizes.full.source_url;
          }

        return (<div key={post.id} class="swiper-slide">
                        <div class="featured-projects--tile">
                        <a href={post.link}> <h5 class="heading-five">{post.title.raw}</h5></a>
                            <div class="tile-shape"></div>
                            <a href={post.link}>
               <div class="tile-image" style={{
              background: `url(${partnerimage})`
            }}>
                </div>
                </a>
                        </div>
                    </div>);
            })}

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
</div>
  );

}
