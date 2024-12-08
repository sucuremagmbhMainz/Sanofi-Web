<?php

class WPML_ST_DB_Cache_Factory {
	/**
	 * @var wpdb
	 */
	private $wpdb;

	/**
	 * @var sitepress
	 */
	private $sitepress;

	/**
	 * @param wpdb $wpdb
	 * @param $sitepress sitepress
	 */
	public function __construct( $wpdb, $sitepress = null ) {
		$this->wpdb = $wpdb;

		if ( ! $sitepress ) {
			global $sitepress;
		}
		$this->sitepress = $sitepress;
	}

	/**
	 * @param string $language
	 *
	 * @return WPML_ST_DB_Cache
	 */
	public function create( $language ) {
		$persist = $this->create_persist();

		$retriever = new WPML_ST_DB_Translation_Retrieve( $this->wpdb );
		$url_preprocessor = new WPML_ST_Page_URL_Preprocessor();

		return new WPML_ST_DB_Cache( $language, $persist, $retriever, $url_preprocessor );
	}

	/**
	 * @return IWPML_ST_Page_Translations_Persist
	 */
	public function create_persist() {
		$notices = $this->create_notices();
		$logger = new WPML_ST_Translations_Handle_Invalid_Strings( $notices );

		return new WPML_ST_Page_Translations_Persist( $this->wpdb, $logger );
	}

	/**
	 * @return null|WPML_Notices
	 */
	private function create_notices() {
		if ( $this->sitepress->get_wp_api()->is_admin() ) {
			global $wpml_admin_notices;
			if ( ! $wpml_admin_notices ) {
				$wpml_notice_render = new WPML_Notice_Render();
				$wpml_admin_notices = new WPML_Notices( $wpml_notice_render );
				$wpml_admin_notices->init_hooks();
			}

			return $wpml_admin_notices;
		}

		return null;
	}
}
