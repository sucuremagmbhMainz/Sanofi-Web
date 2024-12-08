<?php

class WPML_ST_Invalid_Strings {
	const PAGE_LIMIT = 20;

	/**
	 * @var int
	 */
	private $hits = 0;

	/**
	 * @var array
	 */
	private $pages = array();

	/**
	 * @return int
	 */
	public function get_hits() {
		return $this->hits;
	}

	/**
	 * @param $rowset
	 * @param $url
	 */
	public function log( $rowset, $url ) {
		$this->hits++;

		if ( count( $this->pages ) < self::PAGE_LIMIT ) {
			$this->pages[ $url ] = $rowset;
		}
	}

	/**
	 * @return array
	 */
	public function get_pages() {
		return $this->pages;
	}
}