<?php
/**
 * Contains functions for working with Gutenberg blocks.
 *
 * @category ONXRP
 * @package  ONXRP
 * @author   Cemtrexlabs <hello@cemtrexlabs.com>
 * @license  https://cemtrexlabs.com 1.0
 * @link     ONXRP
 */

namespace Clabs;

//Hero Block.
register_block_type(
    'clabs/heroblock',
    [
        'attributes'      => [
            'titleText' => [
                'type'    => 'string',
                'default' => '',
            ],
            'descriptionText' => [
                'type'    => 'string',
                'default' => '',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => '',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => 'true',
            ],
            'image'   => [
                'type'    => 'number',
                'default' => 0,
            ],
            'primage' => [
                'type'    => 'string',
                'default' => '',
            ],
            'backgoundColor' => [
                'type'    => 'string',
                'default' => 'wl-bg-white',
            ],
            'textColor' => [
                'type'    => 'string',
                'default' => 'wl-color-navy',
            ],
            'imgbackgoundColor' => [
                'type'    => 'string',
                'default' => 'wl-bg-orange',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => '',
            ],
            'btnBorder' => [
                'type'    => 'string',
                'default' => 'btn-orange',
            ],
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_heroblock',
    ]
);

// Intro Block
register_block_type(
    'clabs/introblock',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Introduction to project',
            ],
            'sectionTag' => [
                'type'    => 'string',
                'default' => 'FEATURED PROJECTS',
            ],
            'titlePosition' => [
                'type'    => 'string',
                'default' => '',
            ],
            'imagePosition' => [
                'type'    => 'string',
                'default' => '',
            ],
            'title' => [
                'type'    => 'string',
                'default' => 'Building on the XRP Ledger.',
            ],
            'subTitle' => [
                'type'    => 'string',
                'default' => 'The projects listed here have gone through an initial interview and passed vetting checks. Their listing onXRP is not an endorsement or financial advice.',
            ],
            'image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/about-banner.jpg',
            ],
            'buttonText' => [
                'type'    => 'string',
            ],
            'buttonUrl' => [
                'type'    => 'string',
            ],
            'newTab' => [
                'type'    => 'boolean',
            ],
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_introblock',
    ]
);


// Showcase Team
register_block_type(
    'clabs/showcaseteam',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Showcase Team',
            ],
            'title' => [
                'type'    => 'string',
                'default' => 'onXRP’s mission is to provide everyone in the XRP community with value by means of accessible information and user friendly tools.',
            ],
            'titlePosition' => [
                'type'    => 'string',
                'default' => '',
            ],
            'image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/about-banner.jpg',
            ],
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_showcaseteam',
    ]
);

// Project Block
register_block_type(
    'clabs/projectblock',
    [
        'attributes'      => [
            'buttonText' => [
                'type'    => 'string',
                'default' => 'More Featured Projects',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => 'false',
            ],
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_projectblock',
    ]
);

// Trusted Resources
register_block_type(
    'clabs/trustedresources',
    [
        'attributes'      => [
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_trustedresources',
    ]
);

// Podcast Block
register_block_type(
    'clabs/podcastblock',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Featured Articles',
            ],
            'tagText' => [
                'type'    => 'string',
                'default' => 'LATEST PODCAST',
            ],
            'playButton' => [
                'type'    => 'string',
                'default' => 'Play',
            ],
            'subscribeButton' => [
                'type'    => 'string',
                'default' => 'Subscribe',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => 'false',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_podcastblock',
    ]
);

// Link Block
register_block_type(
    'clabs/linkblock',
    [
        'attributes'      => [
            'buttonText' => [
                'type'    => 'string',
                'default' => 'BECOME A CONTRIBUTOR',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => 'true',
            ],
            'downloadLink' => [
                'type'    => 'boolean',

            ],
            'image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/contributor-img.png',
            ],
            'extraid' => [
                'type'    => 'string',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_linkblock',
    ]
);


// Brand Guide
register_block_type(
    'clabs/brandguide',
    [
        'attributes'      => [
            'buttonText' => [
                'type'    => 'string',
                'default' => 'DOWNLOAD Brand guide',
            ],
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Articles Title',
            ],
            'listId' => [
                'type'    => 'string',
                'default' => '',
            ],
            'blockId' => [
                'type'    => 'string',
                'default' => '',
            ],
            'image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/contributor-img.png',
            ],
            'downloadfile'   => [
                'type'    => 'object',
                'default' => '',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_brandguide',
    ]
);


// Link Text
register_block_type(
    'clabs/linktext',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Additional Links',
            ],
            'mainTitle' => [
                'type'    => 'string',
                'default' => 'Privacy Policy',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'Privacy Policy',
            ],
            'buttonTextSecond' => [
                'type'    => 'string',
                'default' => 'Terms & Conditions',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'buttonUrlSecond' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => 'false',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_linktext',
    ]
);

// Faq Block
register_block_type(
    'clabs/faqblock',
    [
        'attributes'      => [
            'mainTitle' => [
                'type'    => 'string',
                'default' => 'Faq',
            ],
            'FaqData' => [
                'type'    => 'array',
                'default' => [
                    [
                        'headingText'    => 'headingText',
                        'imageUrl' => 'contentText'
                    ]
                ],
            ],
            'hideButton' => [
                'type'    => 'string',
                'default' => 'hide faq',
            ],
            'showButton' => [
                'type'    => 'string',
                'default' => 'read faq',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_faqblock',
    ]
);


// Grid Posts
register_block_type(
    'clabs/gridposts',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'EDUCATION ARTICLES',
            ],
            'category' => [
                'type'    => 'string',
                'default' => '',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'More Education Articles',
            ],
            'buttonLink' => [
                'type'    => 'string',
                'default' => '#',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_gridposts',
    ]
);

//Hero Post.
register_block_type(
    'clabs/heropost',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Featured Articles',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'Button Text',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'moreLink' => [
                'type'    => 'string',
                'default' => 'no',
            ],
            'orderBy' => [
                'type'    => 'string',
                'default' => 'date/desc',
            ],
            'title' => [
                'type'    => 'string',
                'default' => 'onXRP’s mission is to provide everyone in the XRP community with value by means of accessible information and user friendly tools.',
            ],
            'image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/about-banner.jpg',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_heropost',
    ]
);


//Featured Post.
register_block_type(
    'clabs/featuredpost',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Article Title',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'Button Text',
            ],
            'titlePosition' => [
                'type'    => 'string',
                'default' => '',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'buttonPosition' => [
                'type'    => 'string',
                'default' => 'odd-row',
            ],
            'orderBy' => [
                'type'    => 'string',
                'default' => 'date/desc',
            ],
            'terms' => [
                'type'    => 'string',
                'default' => '6',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_featuredpost',
    ]
);

//Podcast Post.
register_block_type(
    'clabs/podcastpost',
    [
        'attributes'      => [
            'title' => [
                'type'    => 'string',
                'default' => '',
            ],
            'subTitle' => [
                'type'    => 'string',
                'default' => '',
            ],
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Article Title',
            ],
            'tagText' => [
                'type'    => 'string',
                'default' => 'Latest Podcast',
            ],
            'postNumber' => [
                'type'    => 'Number',
                'default' => 5,
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'Button Text',
            ],
            'buttonPosition' => [
                'type'    => 'string',
                'default' => 'odd-row',
            ],
            'titlePosition' => [
                'type'    => 'string',
                'default' => 'title-left',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'Button Text',
            ],
            'imagePosition' => [
                'type'    => 'string',
                'default' => '',
            ],
            'orderBy' => [
                'type'    => 'string',
                'default' => 'date/desc',
            ],
            'terms' => [
                'type'    => 'string',
                'default' => '6',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_podcastpost',
    ]
);

//Grid Block.
register_block_type(
    'clabs/gridblock',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
                'default' => 'Article Title',
            ],
            'titlePosition' => [
                'type'    => 'string',
                'default' => 'odd-row',
            ],
            'orderBy' => [
                'type'    => 'string',
                'default' => 'date/desc',
            ],
            'terms' => [
                'type'    => 'string',
                'default' => '6',
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_gridblock',
    ]
);


// Post List Cards Block.
register_block_type(
	'clabs/postlistblock',
	[
		'attributes'      => [
			'postListType'  => [
				'type'    => 'string',
				'default' => 'post',
			],
            'sliderContent' => [
                'type' => 'array',
                'default' => '',
            ],
            'selectedOption'  => [
				'type'    => 'string',
				'default' => 'type1',
			],
            'backgoundColor'  => [
				'type'    => 'string',
				'default' => 'wl-bg-white',
			],
            'cardBackgoundColor'  => [
				'type'    => 'string',
				'default' => 'wl-bg-white',
			],
            'borderColor' => [
                'type' => 'string',
                'default' => 'orange-border',
            ],
            'textColor'  => [
				'type'    => 'string',
				'default' => 'wl-color-navy',
			],
            'title'  => [
				'type'    => 'string',
				'default' => '',
			],
            'lead'  => [
				'type'    => 'string',
				'default' => '',
			],
            'content'  => [
				'type'    => 'string',
				'default' => '',
			],
            'ctaText'  => [
				'type'    => 'string',
				'default' => '',
			],
            'ctaLink'  => [
				'type'    => 'string',
				'default' => '',
			],
            'extraid'  => [
				'type'    => 'string',
				'default' => '',
			],
		],
        'parent' => ['core/post-content'],
		'render_callback' => __NAMESPACE__ . '\render_postlist_block',
	]
);

// Intro Block
register_block_type(
    'clabs/infoblock',
    [
        'attributes'      => [
            'col1Text' => [
                'type'    => 'string',
                'default' => 'XPUNKS',
            ],
            'col1Image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
            ],
            'col2Text' => [
                'type'    => 'string',
                'default' => 'THE HAPPY CATS',
            ],
            'col2Image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
            ],
            'col3Text' => [
                'type'    => 'string',
                'default' => 'LAME LIONS',
            ],
            'col3Image'   => [
                'type'    => 'object',
                'default' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
            ],
            'buttonText' => [
                'type'    => 'string',
                'default' => 'More Education Articles',
            ],
            'buttonUrl' => [
                'type'    => 'string',
                'default' => '#',
            ],
            'newTab' => [
                'type'    => 'boolean',
                'default' => false,
            ]

        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_infoblock',
    ]
);

// Repeater Block
register_block_type(
    'clabs/sliderblock',
    [
        'attributes'      => [
            'slides' => [
                'type'    => 'array',
                'default' => [
                    [
                        'title'    => 'Slide 1 Text',
                        'imageUrl' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png'
                    ],
                    [
                        'title'    => 'Slide 2 Text',
                        'imageUrl' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png'
                    ],
                    [
                        'title'    => 'Slide 3 Text',
                        'imageUrl' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png'
                    ]
                ],
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_sliderblock',
    ]
);

// Partner Block
register_block_type(
    'clabs/partnerblock',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
            ],
            'partnerlist' => [
                'type'    => 'array',
                'default' => [
                    [
                        'title'    => 'Partner Text',
                        'imageUrl' => '/wp-content/themes/onxrp/assets/images/featured-projects-pic.png',
                        'linkUrl'  => '#',
                        'newTab'   => 'false',
                    ],

                ],
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_partnerblock',
    ]
);

// App Block
register_block_type(
    'clabs/appblock',
    [
        'attributes'      => [
            'sectionText' => [
                'type'    => 'string',
            ],
            'partnerlist' => [
                'type'    => 'array',
                'default' => [
                    [
                        'title'  => 'App Title',
                        'subTitle' => 'Sub Title Text',
                        'imageUrl' => '/wp-content/themes/onxrp/assets/images/article-img.png',
                        'linkUrl' => '#',
                        'newTab' => '',
                        'comingSoon' => '',
                    ],

                ],
            ],
        ],
        'parent' => ['core/post-content'],
        'render_callback' => __NAMESPACE__ . '\render_block_appblock',
    ]
);

/**
 * Renders the Hero Post.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_heroblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/heroblock.php';
    return ob_get_clean();
}

/**
 * Renders the Featured Post.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_featuredpost( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/featuredpost.php';
    return ob_get_clean();
}

/**
 * Renders the Podcast Post.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_podcastpost( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/podcastpost.php';
    return ob_get_clean();
}

/**
 * Renders the Grid Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_gridblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/gridblock.php';
    return ob_get_clean();
}


/**
 * Renders the Intro Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_introblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/introblock.php';
    return ob_get_clean();
}


/**
 * Renders the Link Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_linkblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/linkblock.php';
    return ob_get_clean();
}

/**
 * Renders the Brand Guide.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_brandguide( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/brandguide.php';
    return ob_get_clean();
}


/**
 * Renders the Link Text.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_linktext( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/linktext.php';
    return ob_get_clean();
}

/**
 * Renders the Faq Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_faqblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/faqblock.php';
    return ob_get_clean();
}

/**
 * Renders the Showcase Team.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_showcaseteam( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/showcaseteam.php';
    return ob_get_clean();
}

/**
 * Renders the Project Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_projectblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/projectblock.php';
    return ob_get_clean();
}

/**
 * Renders the Trusted Resources.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_trustedresources( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/trustedresources.php';
    return ob_get_clean();
}

/**
 * Renders the Podcast Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */

function render_block_podcastblock( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/podcastblock.php';
    return ob_get_clean();
}

/**
 * Renders the Grid Posts.
 *
 *
 *  @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */
function render_block_gridposts( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/gridposts.php';
    return ob_get_clean();
}

/**
 * Renders the Hero Block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */
function render_block_heropost( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/heropost.php';
    return ob_get_clean();
}


/**
 * Renders latest post list block.
 *
 * @param  array  $attributes The attributes for this block.
 * @param  string $content    The inner block content.
 * @return string The content for the block.
 */
function render_postlist_block( $attributes, $content )
{
    ob_start();
    include dirname(__DIR__) . '/template-parts/blocks/postlistcard_block/postlistcards.php';
    return ob_get_clean();
}

/** Renders the Intro Block.
*
* @param  array  $attributes The attributes for this block.
* @param  string $content    The inner block content.
* @return string The content for the block.
*/

function render_block_infoblock( $attributes, $content )
{
   ob_start();
   include dirname(__DIR__) . '/template-parts/blocks/infoblock.php';
   return ob_get_clean();
}

/** Renders the Repeater Block.
*
* @param  array  $attributes The attributes for this block.
* @param  string $content    The inner block content.
* @return string The content for the block.
*/

function render_block_sliderblock( $attributes, $content )
{
   ob_start();
   include dirname(__DIR__) . '/template-parts/blocks/sliderblock.php';
   return ob_get_clean();
}

/** Renders the Partner Block.
*
* @param  array  $attributes The attributes for this block.
* @param  string $content    The inner block content.
* @return string The content for the block.
*/

function render_block_partnerblock( $attributes, $content )
{
   ob_start();
   include dirname(__DIR__) . '/template-parts/blocks/partnerblock.php';
   return ob_get_clean();
}

/** Renders the App Block.
*
* @param  array  $attributes The attributes for this block.
* @param  string $content    The inner block content.
* @return string The content for the block.
*/

function render_block_appblock( $attributes, $content )
{
   ob_start();
   include dirname(__DIR__) . '/template-parts/blocks/appblock.php';
   return ob_get_clean();
}