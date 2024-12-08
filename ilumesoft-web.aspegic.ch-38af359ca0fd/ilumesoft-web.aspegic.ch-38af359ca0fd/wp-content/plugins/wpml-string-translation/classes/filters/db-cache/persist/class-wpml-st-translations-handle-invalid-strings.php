<?php

class WPML_ST_Translations_Handle_Invalid_Strings {
	const NOTICE_TRESHOLD = 5;
	const ROWS_PER_URL_LIMIT = 5;

	/**
	 * @var string
	 */
	private $option_name = 'wpml-st-persist-errors';

	/**
	 * @var array
	 */
	private $invalid_rows = array();

	/**
	 * @var WPML_Notices
	 */
	private $admin_notices;

	/**
	 * @var string
	 */
	private $notice_id = 'wpml-st-persist-errors';

	/**
	 * @var string
	 */
	private $notice_group = 'wpml-st-caching';

	/**
	 * @param WPML_Notices $admin_notices
	 */
	public function __construct( WPML_Notices $admin_notices = null ) {
		$this->admin_notices = $admin_notices;
	}

	/**
	 * @param array $row
	 */
	public function log_invalid_cached_translation( $row ) {
		if ( count( $this->invalid_rows ) < self::ROWS_PER_URL_LIMIT ) {
			$this->invalid_rows[] = $row;
		}
	}

	public function store_invalid_records( $page_url ) {
		$currently_saved = get_option( $this->option_name );
		$currently_saved = $currently_saved instanceof WPML_ST_Invalid_Strings ? $currently_saved : new WPML_ST_Invalid_Strings();

		if ( count( $this->invalid_rows ) ) {
			$currently_saved->log( $this->invalid_rows, $page_url );

			update_option( $this->option_name, $currently_saved );
			if ( $currently_saved->get_hits() >= self::NOTICE_TRESHOLD ) {
				$this->display_notice();
			}
		} else if ( 0 === $currently_saved->get_hits() && $this->admin_notices ) {
			$this->admin_notices->remove_notice( $this->notice_group, $this->notice_id );
		}

		$this->invalid_rows = array();
	}

	private function display_notice() {
		if ( $this->admin_notices ) {
			$msg = __( 'Something doesn\'t look right with "Caching of String Translation plugin". Please contact the WPML support', 'wpml-string-translation' );

			$notice = new WPML_Notice( $this->notice_id, $msg, $this->notice_group );
			$notice->set_css_class_types( 'warning' );
			$notice->set_hideable( true );
			$this->admin_notices->add_notice( $notice );
		}
	}
}