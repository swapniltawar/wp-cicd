/* global React */

export default function faqblock ({ attributes, setAttributes }) {

  const {
    editor: {
      RichText,
    },
    components: {

    },
    element: {

    },
    i18n: {
      __,
    },
  } = wp;

const faqList = attributes.FaqData;

 // handle click event of the Remove button
 const handleRemoveClick = index => {
  const FaqData = [ ...attributes.FaqData ];
  FaqData.splice( index, 1 );
  setAttributes( { FaqData } );
};

// handle click event of the Add button
const handleAddClick = () => {
  const FaqData = [ ...attributes.FaqData ];
          FaqData.push( {
            headingText: 'headingText',
            contentText: 'contentText'
        } );
        setAttributes( { FaqData } );
};

const headingTextChange = ( headingText, index ) => {
  const FaqData = [ ...attributes.FaqData ];
  FaqData[ index ].headingText = headingText;
  setAttributes( { FaqData } );
};

const contentTextChange = ( contentText, index ) => {
  const FaqData = [ ...attributes.FaqData ];
  FaqData[ index ].contentText = contentText;
  setAttributes( { FaqData } );
};

  return (
    <div>

        <section class="faq-section">
            <div class="container faq-section--container">
                <div class="faq-section--left js-faq-section active">
                <RichText
                            className={ "lined-title faq-title" }
                            tagName="h1"
                            onChange={(newValue) => {
                              setAttributes({
                                mainTitle: newValue,
                              });
                            }}
                            value={ attributes.mainTitle }
                            formattingControls= { [] }
                        />

                    <div class="accordion js-accordion">


                    {faqList.map((faq, index) => {
                return (
                        <div key={index} class="accordion__items">
                            <div class="accordion__header">
                                <button aria-expanded="false" aria-controls="collapseOne">
                                <RichText
                            tagName="h3"
                            name="headingText"
                            value={ faq.headingText }
                            onChange={ ( headingText ) => headingTextChange( headingText, index ) }
                            formattingControls= { [] }
                          />
                                    <div class="expand-controls">
                                        <img src="/wp-content/themes/onxrp//assets/images/icon-plus.svg" alt="icon"/>
                                        <img src="/wp-content/themes/onxrp//assets/images/icon-minus.svg" alt="icon"/>
                                    </div>
                                </button>
                            </div>
                            <div id="collapseOne" class="collapse">
                                <div class="accordion-body">
                                <RichText
                            className={ "content-para" }
                            tagName="p"
                            onChange={ ( contentText ) => contentTextChange( contentText, index ) }
                            name="contentText"
                            value={ faq.contentText }
                            formattingControls= { [] }
                        />
                                </div>
                            </div>
                            <div className="btn-box">
              {faqList.length !== 1 && <button
                className="faq-button"
                onClick={() => handleRemoveClick(index)}>Remove</button>}
              {faqList.length - 1 === index &&
              <button onClick={handleAddClick}>Add</button>}
            </div>
                        </div>
  );
})
}

                    </div>
                </div>

                <div class="faq-section--right">
                    <div class="btn-wrapper js-faq-btn">
                        <div class="faq-btn">
                        <RichText
                            tagName="span"
                            onChange={(newValue) => {
                              setAttributes({
                                showButton: newValue,
                              });
                            }}
                            value={ attributes.showButton }
                            formattingControls= { [] }
                        />
                        </div>

                        <div class="faq-btn ">
                        <RichText
                            tagName="span"
                            onChange={(newValue) => {
                              setAttributes({
                                hideButton: newValue,
                              });
                            }}
                            value={ attributes.hideButton }
                            formattingControls= { [] }
                        />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  );

}
