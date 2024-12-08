<?php


class WPML_ST_Page_URL_Preprocessor {
	/**
	 * @var array
	 */
	private $white_list = array(
		'p',
		'page_id',
		'page',
		'pagename',
		'shop',
		'lang',
		'category_name',
		'cat',
		'tag',
		'tag_id',
	);

	/**
	 * @var array
	 */
	private $ignore_value = array(
		'shop',
	);

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	public function process_url( $url ) {
		if ( empty( $url ) ) {
			return $url;
		}

		if ( false !== strpos( $url, '/wp-admin/admin-ajax.php' ) ) {
			return '/wp-admin/admin-ajax.php';
		}

		$url = $this->process_forum_topics( $url );
		$url = $this->process_path( $url );
		$url = $this->process_query( $url );

		return $url;
	}

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	private function process_forum_topics( $url ) {
		if ( false !== strpos( $url, '/forums/topic/' ) ) {
			return '/forums/topic/';
		} else {
			return $url;
		}
	}
	
	/**
	 * @param string $url
	 *
	 * @return string
	 */
	private function process_path( $url ) {
		$path = parse_url( $url, PHP_URL_PATH );
		if ( empty( $path ) ) {
			return $url;
		}

		if ( '/' === $path[ strlen( $path ) - 1 ] ) {
			return $url;
		}

		$new_path = $path . '/';
		$url      = str_replace( $path, $new_path, $url );

		return $url;
	}

	/**
	 * @param string $url
	 *
	 * @return string
	 */
	private function process_query( $url ) {
		$query = parse_url( $url, PHP_URL_QUERY );
		parse_str( $query, $output );

		$white_list = apply_filters( 'wpml-st-url-preprocessor-whitelist', $this->white_list );
		$output = array_intersect_key( $output, array_flip( $white_list ) );

		foreach ( array_intersect_key( $output, array_flip( $this->ignore_value ) ) as $key => $value ) {
			$output[ $key ] = '';
		}

		$new_query = http_build_query( $output );

		$url = str_replace( $query, $new_query, $url );

		if ( '?' === $url[ strlen( $url ) - 1 ] ) {
			$url = rtrim( $url, '?' );
		}

		return $url;
	}
}
