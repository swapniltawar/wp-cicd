/**
 * Given a media object returned from the WordPress REST API, extracts the
 * thumbnail image for the media item if it exists, or the full size image
 * if it does not. Returns an empty string if unable to find either.
 *
 * @param {string} media - A media object returned by the WordPress API.
 */
export default function getImageThumbnail(media) {
  const {
    media_details: {
      sizes: {
        'post-thumbnail': {
          source_url: thumbnailUrl = '',
        } = {},
      } = {},
    } = {},
    source_url: fullsizeUrl = '',
  } = media;

  return thumbnailUrl || fullsizeUrl;
}
