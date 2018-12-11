<?php
/**
 * Class for parameter-based Taxes Report querying
 *
 * Example usage:
 * $args = array(
 *          'before'       => '2018-07-19 00:00:00',
 *          'after'        => '2018-07-05 00:00:00',
 *          'page'         => 2,
 *          'taxes'        => array(1,2,3)
 *         );
 * $report = new WC_Admin_Reports_Taxes_Query( $args );
 * $mydata = $report->get_data();
 *
 * @package  WooCommerce Admin/Classes
 */

defined( 'ABSPATH' ) || exit;

/**
 * WC_Admin_Reports_Taxes_Query
 */
class WC_Admin_Reports_Taxes_Query extends WC_Admin_Reports_Query {

	/**
	 * Valid fields for Taxes report.
	 *
	 * @return array
	 */
	protected function get_default_query_vars() {
		return array();
	}

	/**
	 * Get product data based on the current query vars.
	 *
	 * @return array
	 */
	public function get_data() {
		$args = apply_filters( 'woocommerce_reports_taxes_query_args', $this->get_query_vars() );

		$data_store = WC_Data_Store::load( 'report-taxes' );
		$results    = $data_store->get_data( $args );
		return apply_filters( 'woocommerce_reports_taxes_select_query', $results, $args );
	}

}