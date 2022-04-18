/* global React */

import PropTypes from '../../../../../node_modules/prop-types';
import ImagePicker from '../../components/imagePicker';

/**
 * A React component to render the edit view of a Product block.
 */
export default class PostlistCardEdit extends React.PureComponent {
  render() {
    const {
      blockEditor: {
        InspectorControls,
      },
      editor: {
        RichText,
      },
      components: {
        PanelBody,
        SelectControl,
        TextControl,
      },
      i18n: {
        __,
      },
    } = wp;
    const {
      attributes: {
        title = '',
        lead = '',
        content = '',
        ctaText = '',
        ctaLink = '',
        postListType = 'post',
        selectedOption = 'type1',
        backgoundColor = 'wl-bg-white',
        cardBackgoundColor = 'wl-bg-white',
        borderColor = 'orange-border',
        textColor = 'wl-color-navy',
        extraid = '',
      } = {},
      setAttributes,
      blocks,
      event,
      career,
      resource,
      service,
      meta, // eslint-disable-line
    } = this.props;

    const postList = [
      { value: 'post', label: __('Blog', 'clabs') },
      { value: 'career', label: __('Career', 'clabs') },
      { value: 'resource', label: __('Resource', 'clabs') },
      { value: 'service', label: __('Service', 'clabs') },
      { value: 'event', label: __('Event', 'clabs') },
    ];
    let listsposts = '';
    let listevent = '';
    let listcareer = '';
    let listresourses = '';
    let listservices = '';
    let dividerColor = '';
    let postType2 = '';
    let eventType2 = '';
    let careerType2 = '';
    let resoursesType2 = '';
    let servicesType2 = '';

    if (borderColor === 'navy-border') {
      dividerColor = 'wl-bg-navy';
    }
    if (borderColor === 'orange-border') {
      dividerColor = 'wl-bg-orange';
    }
    // console.log(career);
    if (selectedOption === 'type1') {
      console.log('meta ... ',blocks);
      if (blocks) {
        listsposts = blocks.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="event">
                {index < 3
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } event-card-with-image`}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      <div className="event-card--read-type">
                        {rs.page_header_read
                          ? (
                            <div className="event-card--read">{rs.page_header_read}</div>
                          ) : <div className="event-card--read">{time}</div>}
                        <div className="event-card--verticle-devider wl-bg-orange" />
                        <div className="event-card--type">
                          {rs.header_term}
                        </div>
                      </div>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                      <div className="event-card--date">
                        <div className={['date-devider', dividerColor].join(' ')} />
                        {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                        <div className={['date-devider', dividerColor].join(' ')} />
                      </div>
                      <div className="event-card--para">
                        {rs.excerpt.raw}
                      </div>
                      <div className="read-more">
                        <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                        <div className={['border-bottom', dividerColor].join(' ')} />
                      </div>
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (event) {
        listevent = event.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="event">
                {index < 3
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      <div className="event-card--read-type">
                        {rs.event_location_content
                          ? (
                            <div className="event-card--read">{rs.event_location_content}</div>
                          ) : ''}
                        <div className="event-card--verticle-devider wl-bg-orange" />
                        <div className="event-card--type">
                          {rs.header_term}
                        </div>
                      </div>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                      <div className="event-card--date">
                        <div className={['date-devider', dividerColor].join(' ')} />
                        {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                        <div className={['date-devider', dividerColor].join(' ')} />
                      </div>
                      <div className="event-card--para">
                        {rs.excerpt.raw}
                      </div>
                      <div className="read-more">
                        <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                        <div className={['border-bottom', dividerColor].join(' ')} />
                      </div>
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (career) {
        listcareer = career.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="event">
                {index < 3
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      <div className="event-card--read-type">
                        {rs.page_header_read
                          ? (
                            <div className="event-card--read">{rs.page_header_read}</div>
                          ) : <div className="event-card--read">{time}</div>}
                        <div className="event-card--verticle-devider wl-bg-orange" />
                        <div className="event-card--type">
                          {rs.header_term}
                        </div>
                      </div>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                      <div className="event-card--date">
                        <div className={['date-devider', dividerColor].join(' ')} />
                        {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                        <div className={['date-devider', dividerColor].join(' ')} />
                      </div>
                      <div className="event-card--para">
                        {rs.excerpt.raw}
                      </div>
                      <div className="read-more">
                        <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                        <div className={['border-bottom', dividerColor].join(' ')} />
                      </div>
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (resource) {
        listresourses = resource.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="event">
                {index < 3
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      <div className="event-card--read-type">
                        {rs.page_header_read
                          ? (
                            <div className="event-card--read">{rs.page_header_read}</div>
                          ) : <div className="event-card--read">{time}</div>}
                        <div className="event-card--verticle-devider wl-bg-orange" />
                        <div className="event-card--type">
                          {rs.header_term}
                        </div>
                      </div>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                      <div className="event-card--date">
                        <div className={['date-devider', dividerColor].join(' ')} />
                        {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                        <div className={['date-devider', dividerColor].join(' ')} />
                      </div>
                      <div className="event-card--para">
                        {rs.excerpt.raw}
                      </div>
                      <div className="read-more">
                        <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                        <div className={['border-bottom', dividerColor].join(' ')} />
                      </div>
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (service) {
        listservices = service.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="event">
                {index < 3
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      <div className="event-card--read-type">
                        {rs.page_header_read
                          ? (
                            <div className="event-card--read">{rs.page_header_read}</div>
                          ) : <div className="event-card--read">{time}</div>}
                        <div className="event-card--verticle-devider wl-bg-orange" />
                        <div className="event-card--type">
                          {rs.header_term}
                        </div>
                      </div>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                      <div className="event-card--date">
                        <div className={['date-devider', dividerColor].join(' ')} />
                        {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                        <div className={['date-devider', dividerColor].join(' ')} />
                      </div>
                      <div className="event-card--para">
                        {rs.excerpt.raw}
                      </div>
                      <div className="read-more">
                        <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                        <div className={['border-bottom', dividerColor].join(' ')} />
                      </div>
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
    }
    if (selectedOption === 'type2') {
      if (blocks) {
        postType2 = blocks.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div>
                {index < 2
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } ${ index === 0 ? 'event-card-big' : '' } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      {index === 0
                        ? (
                          <div className="event-card-big-content">
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                      {index === 1
                        ? (
                          <div>
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (event) {
        eventType2 = event.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div>
                {index < 2
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } ${ index === 0 ? 'event-card-big' : '' } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      {index === 0
                        ? (
                          <div className="event-card-big-content">
                            <div className="event-card--read-type">
                              {rs.event_location_content
                                ? (
                                  <div className="event-card--read">{rs.event_location_content}</div>
                                ) : ''}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                      {index === 1
                        ? (
                          <div>
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.event_location_content}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (career) {
        careerType2 = career.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div>
                {index < 2
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } ${ index === 0 ? 'event-card-big' : '' } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      {index === 0
                        ? (
                          <div className="event-card-big-content">
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                      {index === 1
                        ? (
                          <div>
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (resource) {
        resoursesType2 = resource.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div>
                {index < 2
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } ${ index === 0 ? 'event-card-big' : '' } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      {index === 0
                        ? (
                          <div className="event-card-big-content">
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                      {index === 1
                        ? (
                          <div>
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
      if (service) {
        servicesType2 = service.map( // eslint-disable-line
          (rs, index) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div>
                {index < 2
                  ? (
                    <div className={`event-card ${ cardBackgoundColor } ${ textColor } ${ index === 0 ? 'event-card-big' : '' } event-card-with-image `}>
                      {rs.featured_media
                        ? (
                          <div className="event-card--image">
                            <ImagePicker
                              metaKey="image"
                              value={rs.featured_media}
                            />
                          </div>
                        ) : ''}
                      {index === 0
                        ? (
                          <div className="event-card-big-content">
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                      {index === 1
                        ? (
                          <div>
                            <div className="event-card--read-type">
                              {rs.page_header_read
                                ? (
                                  <div className="event-card--read">{rs.page_header_read}</div>
                                ) : <div className="event-card--read">{time}</div>}
                              <div className="event-card--verticle-devider wl-bg-orange" />
                              <div className="event-card--type">
                                {rs.header_term}
                              </div>
                            </div>
                            <div className="event-card--subtitle">
                              {rs.page_header_title}
                            </div>
                            <div className="event-card--date">
                              <div className={['date-devider', dividerColor].join(' ')} />
                              {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                              <div className={['date-devider', dividerColor].join(' ')} />
                            </div>
                            <div className="event-card--para">
                              {rs.excerpt.raw}
                            </div>
                            <div className="read-more">
                              <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                              <div className={['border-bottom', dividerColor].join(' ')} />
                            </div>
                          </div>
                        ) : ''}
                    </div>
                  ) : ''}
              </div>
            );
          },
        );
      }
    }
    if (selectedOption === 'type3') {
      if (resource) {
        listresourses = resource.map( // eslint-disable-line
          (rs) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="swiper-slide">
                <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                  {rs.featured_media
                    ? (
                      <div className="event-card--image">
                        <ImagePicker
                          metaKey="image"
                          value={rs.featured_media}
                        />
                      </div>
                    ) : ''}
                  <div className="event-card--read-type">
                    {rs.page_header_read
                      ? (
                        <div className="event-card--read">{rs.page_header_read}</div>
                      ) : <div className="event-card--read">{time}</div>}
                    <div className="event-card--verticle-devider wl-bg-orange" />
                    <div className="event-card--type">
                      {rs.header_term}
                    </div>
                  </div>
                  <div className="event-card--subtitle">
                    {rs.page_header_title}
                  </div>
                  <div className="event-card--date">
                    <div className={['date-devider', dividerColor].join(' ')} />
                    {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                    <div className={['date-devider', dividerColor].join(' ')} />
                  </div>
                  <div className="event-card--para">
                    {rs.excerpt.raw}
                  </div>
                  <div className="read-more">
                    <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                    <div className={['border-bottom', dividerColor].join(' ')} />
                  </div>
                </div>
              </div>
            );
          },
        );
      }
      if (blocks) {
        listsposts = blocks.map( // eslint-disable-line
          (rs) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="swiper-slide">
                <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                  {rs.featured_media
                    ? (
                      <div className="event-card--image">
                        <ImagePicker
                          metaKey="image"
                          value={rs.featured_media}
                        />
                      </div>
                    ) : ''}
                  <div className="event-card--read-type">
                    {rs.page_header_read
                      ? (
                        <div className="event-card--read">{rs.page_header_read}</div>
                      ) : <div className="event-card--read">{time}</div>}
                    <div className="event-card--verticle-devider wl-bg-orange" />
                    <div className="event-card--type">
                      {rs.header_term}
                    </div>
                  </div>
                  <div className="event-card--subtitle">
                    {rs.page_header_title}
                  </div>
                  <div className="event-card--date">
                    <div className={['date-devider', dividerColor].join(' ')} />
                    {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                    <div className={['date-devider', dividerColor].join(' ')} />
                  </div>
                  <div className="event-card--para">
                    {rs.excerpt.raw}
                  </div>
                  <div className="read-more">
                    <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                    <div className={['border-bottom', dividerColor].join(' ')} />
                  </div>
                </div>
              </div>
            );
          },
        );
      }
      if (event) {
        listevent = event.map( // eslint-disable-line
          (rs) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="swiper-slide">
                <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                  {rs.featured_media
                    ? (
                      <div className="event-card--image">
                        <ImagePicker
                          metaKey="image"
                          value={rs.featured_media}
                        />
                      </div>
                    ) : ''}
                  <div className="event-card--read-type">
                    {rs.event_location_content
                      ? (
                        <div className="event-card--read">{rs.event_location_content}</div>
                      ) : ''}
                    <div className="event-card--verticle-devider wl-bg-orange" />
                    <div className="event-card--type">
                      {rs.header_term}
                    </div>
                  </div>
                  <div className="event-card--subtitle">
                    {rs.page_header_title}
                  </div>
                  <div className="event-card--date">
                    <div className={['date-devider', dividerColor].join(' ')} />
                    {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                    <div className={['date-devider', dividerColor].join(' ')} />
                  </div>
                  <div className="event-card--para">
                    {rs.excerpt.raw}
                  </div>
                  <div className="read-more">
                    <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                    <div className={['border-bottom', dividerColor].join(' ')} />
                  </div>
                </div>
              </div>
            );
          },
        );
      }
      if (career) {
        listcareer = career.map( // eslint-disable-line
          (rs) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="swiper-slide">
                <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                  {rs.featured_media
                    ? (
                      <div className="event-card--image">
                        <ImagePicker
                          metaKey="image"
                          value={rs.featured_media}
                        />
                      </div>
                    ) : ''}
                  <div className="event-card--read-type">
                    {rs.page_header_read
                      ? (
                        <div className="event-card--read">{rs.page_header_read}</div>
                      ) : <div className="event-card--read">{time}</div>}
                    <div className="event-card--verticle-devider wl-bg-orange" />
                    <div className="event-card--type">
                      {rs.header_term}
                    </div>
                  </div>
                  <div className="event-card--subtitle">
                    {rs.page_header_title}
                  </div>
                  <div className="event-card--date">
                    <div className={['date-devider', dividerColor].join(' ')} />
                    {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                    <div className={['date-devider', dividerColor].join(' ')} />
                  </div>
                  <div className="event-card--para">
                    {rs.excerpt.raw}
                  </div>
                  <div className="read-more">
                    <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                    <div className={['border-bottom', dividerColor].join(' ')} />
                  </div>
                </div>
              </div>
            );
          },
        );
      }
      if (service) {
        listservices = service.map( // eslint-disable-line
          (rs) => {
            const text = rs.content.raw;
            const wpm = 200;
            const words = text.trim().split(/\s+/).length;
            const time = Math.ceil(words / wpm) + ' min'; // eslint-disable-line
            return (
              <div className="swiper-slide">
                <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                  {rs.featured_media
                    ? (
                      <div className="event-card--image">
                        <ImagePicker
                          metaKey="image"
                          value={rs.featured_media}
                        />
                      </div>
                    ) : ''}
                  <div className="event-card--read-type">
                    {rs.page_header_read
                      ? (
                        <div className="event-card--read">{rs.page_header_read}</div>
                      ) : <div className="event-card--read">{time}</div>}
                    <div className="event-card--verticle-devider wl-bg-orange" />
                    <div className="event-card--type">
                      {postListType}
                    </div>
                  </div>
                  <div className="event-card--subtitle">
                    {rs.page_header_title}
                  </div>
                  <div className="event-card--date">
                    <div className={['date-devider', dividerColor].join(' ')} />
                    {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                    <div className={['date-devider', dividerColor].join(' ')} />
                  </div>
                  <div className="event-card--para">
                    {rs.excerpt.raw}
                  </div>
                  <div className="read-more">
                    <a href={rs.link} className={['read-more-btn', textColor].join(' ')}>{__('Read More', 'clab')}</a>
                    <div className={['border-bottom', dividerColor].join(' ')} />
                  </div>
                </div>
              </div>
            );
          },
        );
      }
    }
    if (selectedOption === 'onlytitle') {
      if (blocks) {
        listsposts = blocks.map( // eslint-disable-line
          (rs, index) => (
            <div className="event">
              {index < 3
                ? (
                  <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                    <a href={rs.link}>
                      <div className="event-card--subtitle">
                        {rs.page_header_title}
                      </div>
                    </a>
                    <div className="event-card--date">
                      <div className={['date-devider', dividerColor].join(' ')} />
                      {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                      <div className={['date-devider', dividerColor].join(' ')} />
                    </div>
                  </div>
                ) : ''}
            </div>
          ),
        );
      }
      if (event) {
        listevent = event.map( // eslint-disable-line
          (rs, index) => (
            <div className="event">
              {index < 3
                ? (
                  <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                    <div className="event-card--subtitle">
                      <a href={rs.link}>
                        {rs.page_header_title}
                      </a>
                    </div>
                    <div className="event-card--date">
                      <div className={['date-devider', dividerColor].join(' ')} />
                      {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                      <div className={['date-devider', dividerColor].join(' ')} />
                    </div>
                  </div>
                ) : ''}
            </div>
          ),
        );
      }
      if (career) {
        listcareer = career.map( // eslint-disable-line
          (rs, index) => (
            <div className="event">
              {index < 3
                ? (
                  <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                    <div className="event-card--subtitle">
                      <a href={rs.link}>
                        {rs.page_header_title}
                      </a>
                    </div>
                    <div className="event-card--date">
                      <div className={['date-devider', dividerColor].join(' ')} />
                      {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                      <div className={['date-devider', dividerColor].join(' ')} />
                    </div>
                  </div>
                ) : ''}
            </div>
          ),
        );
      }
      if (resource) {
        listresourses = resource.map( // eslint-disable-line
          (rs, index) => (
            <div className="event">
              {index < 3
                ? (
                  <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                    <div className="event-card--subtitle">
                      <a href={rs.link}>
                        {rs.page_header_title}
                      </a>
                    </div>
                    <div className="event-card--date">
                      <div className={['date-devider', dividerColor].join(' ')} />
                      {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                      <div className={['date-devider', dividerColor].join(' ')} />
                    </div>
                  </div>
                ) : ''}
            </div>
          ),
        );
      }
      if (service) {
        listservices = service.map( // eslint-disable-line
          (rs, index) => (
            <div className="event">
              {index < 3
                ? (
                  <div className={`event-card ${ cardBackgoundColor } ${ textColor }`}>
                    <div className="event-card--subtitle">
                      <a href={rs.link}>
                        {rs.page_header_title}
                      </a>
                    </div>
                    <div className="event-card--date">
                      <div className={['date-devider', dividerColor].join(' ')} />
                      {new Date(rs.date).toString().replace(/\w+ (\w+) (\d+) (\d+).*/, '$1 $2, $3')}
                      <div className={['date-devider', dividerColor].join(' ')} />
                    </div>
                  </div>
                ) : ''}
            </div>
          ),
        );
      }
    }

    return (
      <div className="block-postlist-card block-wrapper">
        <InspectorControls key="inspector">
          <PanelBody
            initialOpen
            title={__('Configure Post List', 'clab')}
          >
            <SelectControl
              label={__('Select Post Type', 'clabs')}
              options={postList}
              className="selectposttype"
              value={postListType}
              onChange={(value) => {
                setAttributes({
                  postListType: value,
                });
              }}
            />
            <SelectControl
              label="Select block Type"
              className="selectposttype"
              onChange={(newValue) => {
                setAttributes({
                  selectedOption: newValue,
                });
              }}
              value={selectedOption}
              options={[
                { label: 'Post List - 3 Column Card Row', value: 'type1' },
                { label: 'Post List - 2 Column Card Row', value: 'type2' },
                { label: 'Post List - Card Slider', value: 'type3' },
                { label: 'Post List - 3 Column Title Only', value: 'onlytitle' },
              ]}
            />

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
        {selectedOption === 'type1'
          ? (
            <div className={['postlist-slider-list ', backgoundColor, textColor].join(' ')}>
              <section className="post-list-card">
                {postListType === 'event'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listevent}
                    </div>
                  ) : ''}
                {postListType === 'post'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listsposts}
                    </div>
                  ) : ''}
                {postListType === 'career'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listcareer}
                    </div>
                  ) : ''}
                {postListType === 'resource'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listresourses}
                    </div>
                  ) : ''}
                {postListType === 'service'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listservices}
                    </div>
                  ) : ''}
              </section>
            </div>
          ) : ''}
        {selectedOption === 'type2'
          ? (
            <div className={['postlist-slider-list ', backgoundColor, textColor].join(' ')}>
              <section className="post-list-card nopadding">
                {postListType === 'event'
                  ? (
                    <div className="post-list-card--container post-list-card--two-column">
                      {eventType2}
                    </div>
                  ) : ''}
                {postListType === 'post'
                  ? (
                    <div className="post-list-card--container post-list-card--two-column">
                      {postType2}
                    </div>
                  ) : ''}
                {postListType === 'career'
                  ? (
                    <div className="post-list-card--container post-list-card--two-column">
                      {careerType2}
                    </div>
                  ) : ''}
                {postListType === 'resource'
                  ? (
                    <div className="post-list-card--container post-list-card--two-column">
                      {resoursesType2}
                    </div>
                  ) : ''}
                {postListType === 'service'
                  ? (
                    <div className="post-list-card--container post-list-card--two-column">
                      {servicesType2}
                    </div>
                  ) : ''}
              </section>
            </div>
          ) : ''}
        {selectedOption === 'type3'
          ? (
            <div className={['postlist-slider-list ', backgoundColor, textColor].join(' ')}>
              <div className="static-data">
                <RichText
                  className="lead-plain-text"
                  placeholder="lead"
                  value={lead}
                  onChange={(value) => {
                    setAttributes({
                      lead: value,
                    });
                  }}
                />
                <RichText
                  className="name-plain-text"
                  placeholder="Title Text"
                  value={title}
                  onChange={(value) => {
                    setAttributes({
                      title: value,
                    });
                  }}
                />
                <RichText
                  className="content-plain-btn"
                  style={{ height: 58 }}
                  placeholder="Content"
                  autoFocus
                  value={content}
                  onChange={(value) => {
                    setAttributes({
                      content: value,
                    });
                  }}
                />
                <div className="link">
                  <RichText
                    className={`cta-plain-textd ${ borderColor } ${ textColor }`}
                    placeholder="CTA Button"
                    value={ctaText}
                    onChange={(value) => {
                      setAttributes({
                        ctaText: value,
                      });
                    }}
                  />
                </div>
                <RichText
                  className="cta-plain-text"
                  placeholder="CTA Button Url"
                  value={ctaLink}
                  onChange={(value) => {
                    setAttributes({
                      ctaLink: value,
                    });
                  }}
                />
                <div className="swiper-button">
                  <div className={`swiper-button-prev postListPrev custom-prev-btn ${ borderColor }`} />
                  <div className={`swiper-button-next postListNext custom-next-btn ${ borderColor }`} />
                </div>
              </div>
              <div className="slider-data">
                {postListType === 'event'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column post-list-card swiper jsEventCardSwiper">
                      <div className="swiper-wrapper">
                        {listevent}
                      </div>
                      <div className="swiper-pagination custom-pagination" />
                    </div>
                  ) : ''}
                {postListType === 'post'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column post-list-card swiper jsEventCardSwiper">
                      <div className="swiper-wrapper">
                        {listsposts}
                      </div>
                      <div className="swiper-pagination custom-pagination" />
                    </div>
                  ) : ''}
                {postListType === 'career'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column post-list-card swiper jsEventCardSwiper">
                      <div className="swiper-wrapper">
                        {listcareer}
                      </div>
                      <div className="swiper-pagination custom-pagination" />
                    </div>
                  ) : ''}
                {postListType === 'resource'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column post-list-card swiper jsEventCardSwiper">
                      <div className="swiper-wrapper">
                        {listresourses}
                      </div>
                      <div className="swiper-pagination custom-pagination" />
                    </div>
                  ) : ''}
                {postListType === 'service'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column post-list-card swiper jsEventCardSwiper">
                      <div className="swiper-wrapper">
                        {listservices}
                      </div>
                    </div>
                  ) : ''}
              </div>
            </div>
          ) : ''}
        {selectedOption === 'onlytitle'
          ? (
            <div className={['post-list-card media-text-photo-cards', backgoundColor, textColor].join(' ')}>
              <section className="post-list-card">
                {postListType === 'event'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listevent}
                    </div>
                  ) : ''}
                {postListType === 'post'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listsposts}
                    </div>
                  ) : ''}
                {postListType === 'career'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listcareer}
                    </div>
                  ) : ''}
                {postListType === 'resource'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listresourses}
                    </div>
                  ) : ''}
                {postListType === 'service'
                  ? (
                    <div className="post-list-card--container post-list-card--three-column">
                      {listservices}
                    </div>
                  ) : ''}
              </section>
            </div>
          ) : ''}
      </div>
    );
  }
}

// Set up initial props.
PostlistCardEdit.defaultProps = {
  attributes: {
    postListType: 'post',
    sliderContent: [],
    selectedOption: 'type1',
    backgoundColor: 'wl-bg-white',
    cardBackgoundColor: 'wl-bg-white',
    borderColor: 'orange-border',
    textColor: 'wl-color-navy',
    extraid: '',
    title: '',
    lead: '',
    content: '',
    ctaText: '',
    ctaLink: '',
  },
};

// Set PropTypes for this component.
PostlistCardEdit.propTypes = {
  attributes: PropTypes.shape({
    postListType: PropTypes.string,
    selectedOption: PropTypes.string,
    backgoundColor: PropTypes.string,
    cardBackgoundColor: PropTypes.string,
    borderColor: PropTypes.string,
    textColor: PropTypes.string,
    extraid: PropTypes.string,
    title: PropTypes.string,
    lead: PropTypes.string,
    content: PropTypes.string,
    ctaText: PropTypes.string,
    ctaLink: PropTypes.string,
  }),
  setAttributes: PropTypes.func.isRequired,
  blocks: PropTypes.func.isRequired,
  event: PropTypes.func.isRequired,
  career: PropTypes.func.isRequired,
  resource: PropTypes.func.isRequired,
  service: PropTypes.func.isRequired,
};
