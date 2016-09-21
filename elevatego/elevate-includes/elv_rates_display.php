<?php
//Create rates shortcode
function elv_get_rate($atts, $content, $tag)
{
	/* Get rate structure from them modifications */
	$rate_structure = get_theme_mod("rate_field_id");

	$values = shortcode_atts(array(
		'rt_stct' => '',        // optional
		'rt_type' => 'rate',        // optional
		'pd_name' => 'basic',    // required
		'pd_feat' => '',        // optional
		'rt_valu' => '',        // optional
		'in_type' => 'var',    // required
		'fx_term' => '',        // optional
		'rt_t1' => '',        // optional
		'rt_t2' => 'lte80',   // optional
		'rt_t3' => 'tier2',   // optional
		'rt_t4' => '',        // optional
		'rt_t5' => '',        // optional
		'rt_t6' => ''         // optional
	), $atts);

	$query = new WP_Query(array('post_type' => 'elv_product_rates', 'name' => $rate_structure));

	// loop through the posts
	while ($query->have_posts()) : $query->the_post();

		$options = get_the_content(null, false);
		//collect values, combining passed in values and defaults

		$options = !is_null(json_decode($options, true)) ? json_decode($options, true) : $options;

		foreach ($options as $rates_array) {

			if (
				$rates_array['rt_stct'] == $values['rt_stct'] &&
				$rates_array['rt_type'] == $values['rt_type'] &&
				$rates_array['pd_name'] == $values['pd_name'] &&
				$rates_array['pd_feat'] == $values['pd_feat'] &&
				$rates_array['in_type'] == $values['in_type'] &&
				$rates_array['fx_term'] == $values['fx_term'] &&
				$rates_array['rt_t1'] == $values['rt_t1'] &&
				$rates_array['rt_t2'] == $values['rt_t2'] &&
				$rates_array['rt_t3'] == $values['rt_t3'] &&
				$rates_array['rt_t4'] == $values['rt_t4'] &&
				$rates_array['rt_t5'] == $values['rt_t5'] &&
				$rates_array['rt_t6'] == $values['rt_t6']
			) {
				return $rates_array["rt_valu"];
			}
		}
		return "n/a";
	endwhile;

	wp_reset_postdata();
}

add_shortcode('get_rate', 'elv_get_rate');

//Create rates shortcode
function elv_get_rates($atts, $content, $tag)
{
	$options = "";
	$values = shortcode_atts(array(
		'rt_stct' => '',        // optional
		'rt_type' => 'rate',        // optional
		'pd_name' => 'basic',    // required
		'pd_feat' => '',        // optional
		'rt_valu' => '',        // optional
		'in_type' => 'var',    // required
		'fx_term' => '',        // optional
		'rt_t1' => '',        // optional
		'rt_t2' => 'lte80',   // optional
		'rt_t3' => 'tier2',   // optional
		'rt_t4' => '',        // optional
		'rt_t5' => '',        // optional
		'rt_t6' => ''         // optional
	), $atts);

	/* Get rate structure from them modifications */
	$rate_structure = get_theme_mod("rate_field_id");

	$query = new WP_Query(array('post_type' => 'elv_product_rates', 'name' => $rate_structure));

	// loop through the posts
	while ($query->have_posts()) : $query->the_post();
		$options = get_the_content(null, false);
	endwhile;

	return $options;

	wp_reset_postdata();
}

add_shortcode('get_rates', 'elv_get_rates');

/**
 * Class MyRatesPage
 * URL: https://codex.wordpress.org/Creating_Options_Pages
 *
 * Add Product Rates
 * Created by - Simon Adams
 * Updated by - Simon Adams
 * Updated on - 4 June 2016
 */
class MyRatesPage
{
	/**
	 * Start up
	 */
	public function __construct()
	{
		add_action('admin_menu', array($this, 'elv_add_plugin_page'));
		add_action('admin_init', array($this, 'elv_page_init'));
		add_action('admin_notices', array($this, 'elv_rates_updated_notice'));
	}

	/**
	 * Loop through custom post types and create based on array
	 */
	public function elv_add_cust_post($audience, $content, $category)
	{
		$post_details = array('post_title' => $audience,
			'post_type' => 'elv_product_rates',
			'post_content' => json_encode($content),
			'post_category' => array($category));

		$id = wp_insert_post($post_details);

		return $id;
	}



	/**
	 * Add options page
	 */
	public function elv_add_plugin_page()
	{
		// This page will be under "Rates"
		add_submenu_page(
			'edit.php?post_type=elv_product_rates',
			'Upload Rates to Elevate',
			'Rate Upload',
			'manage_options',
			'rate-admin-panel',
			array($this, 'elv_create_admin_page')
		);
		// This page will be under "Rates"
		add_submenu_page(
			'edit.php?post_type=elv_product_rates',
			'Create Rate Shortcode',
			'Rate Shortcode',
			'manage_options',
			'rate-shortcode-panel',
			array($this, 'elv_create_rate_shortcode')
		);
	}

	/**
	 * Options page callback
	 */
	public function elv_create_admin_page()
	{
		// Set class property
		/*$this->options = get_option('mq_rates_public');*/
		$this->elv_rate_csv_array();
		?>
		<div class="wrap">
			<h1>Update Rates in Elevate</h1>
			<form action="" method="POST" enctype="multipart/form-data">
				<h2>Basic rate update</h2>
				<p>Upload a CSV with rates from Product based and select an associated product category.</p>
				<table class="form-table">
					<tbody>
					<tr>
						<th scope="row"><label>Select product category</label></th>
						<td><?php wp_dropdown_categories(array(
								'hide_empty' => 0,
								'name' => 'mq_category',
								'orderby' => 'name',
								'selected' => 0,
								'hierarchical' => true
							)); ?>
							<p class="description" id="tagline-description">Select a category these rates will be associated to.</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Upload CSV</label></th>
						<td>
							<input type="file" name="file"/>
							<p class="description" id="tagline-description">Upload a CSV with the rate id and rate value.</p>
							<?php wp_nonce_field('mq_rates_upload', 'mq_rates_upload_nonce'); ?>
						</td>
					</tr>
					</tbody>
				</table>
				<hr />
				<h2>Advanced rate update</h2>
				<p>
					<strong>WARNING:</strong> Updating this section will override the regular expressions that are used to define the rate tiers based on the rate id's.
				</p>
				<table class="form-table">
					<tbody>
					<tr>
						<th scope="row"><label>Rate structure</label></th>
						<td>
							<input type="text" name="rt_stct" value="" placeholder="/(ref)|(mstaff)|(qstaff)/" class="regular-text code" />
							<p class="description" id="tagline-description"> eg Association, Workplace, Referrer, Staff, Public</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Rate type</label></th>
						<td>
							<input type="text" name="rt_type" value="" placeholder="/(rate)|(cmp)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg rate, comparison</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Product name</label></th>
						<td>
							<input type="text" name="pd_name" value="" placeholder="/(basic)|(loc)|(offset)|(smsf)|(rev)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg Basic, LOC, SMSF</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Product feature</label></th>
						<td>
							<input type="text" name="pd_feat" value="" placeholder="/(flyer)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg. Flyer, Non-flyer, Macquarie rewards</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Interest type</label></th>
						<td>
							<input type="text" name="in_type" value="" placeholder="/(fix)|(var)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg Fixed, Variable</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Fixed term</label></th>
						<td>
							<input type="text" name="fx_term" value="" placeholder="/(1year)|(2year)|(3year)|(4year)|(5year)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg 1 year, 2 years, 3 years..</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 1</label></th>
						<td>
							<input type="text" name="rt_t1" value="" placeholder="/(inv)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg Owner occupier, Investment</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 2</label></th>
						<td>
							<input type="text" name="rt_t2" value="" placeholder="/(lte70)|(lte80)|(lte90)|(gt90)/" class="regular-text code" />
							<p class="description" id="tagline-description">Loan to property value ratio, eg lte70, lte80, lte90, gt90</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 3</label></th>
						<td>
							<input type="text" name="rt_t3" value="" placeholder="/(tier1)|(tier2)|(tier3)|(tier4)/" class="regular-text code" />
							<p class="description" id="tagline-description">Borrow amount, eg < $500k, < $750k, < $1.5m, > $1.5m</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 4</label></th>
						<td>
							<input type="text" name="rt_t4" value="" placeholder="/(io)/" class="regular-text code" />
							<p class="description" id="tagline-description">eg Principal, Principal &amp; interest</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 5</label></th>
						<td>
							<input type="text" name="rt_t5" value="" placeholder="/( )/" class="regular-text code" />
							<p class="description" id="tagline-description">Not yet used</p>
						</td>
					</tr>
					<tr>
						<th scope="row"><label>Tier 6</label></th>
						<td>
							<input type="text" name="rt_t6" value="" placeholder="/( )/" class="regular-text code" />
							<p class="description" id="tagline-description">Not yet used</p>
						</td>
					</tr>
					</tbody>
				</table>
				<p class="submit">
					<input type="submit" name="mq_rates_upload" id="mq_rates_upload" class="button-primary" value="Update rates" />
				</p>
			</form>
			<hr />
			<h4 style="text-align:right;">
				<small>Example rates currently in the system<br />Public Basic Home Loan: <?php echo esc_attr(elv_get_rate(array(), '', '')); ?>
				</small>
			</h4>
		</div>
		<?php
	}

	/**
	 * Options page callback
	 */
	public function elv_create_rate_shortcode()
	{
		// Set class property
		/*$this->options = get_option('mq_rates_public');*/
		$this->elv_rate_csv_array();
		?>
		<div class="wrap">
			<h1>Update Rates in Elevate</h1>
			<form id="sc-rate-creator">
				<select name="rt_stct">
					<option value="" selected>Public</option>
					<option value="ref">Referrer</option>
					<option value="mstaff">Mac Staff</option>
					<option value="qstaff">Qantas Staff</option>
				</select> <select name="rt_type">
					<option value="rate" selected>Rate</option>
					<option value="cmp">Comparison</option>
				</select> <select name="pd_name">
					<option value="basic" selected>Basic Home Loan</option>
					<option value="offset">Offset</option>
					<option value="loc">Line of credit</option>
					<option value="smsf">SMSF</option>
					<option value="rev">Reverse</option>
				</select> <select name="pd_feat">
					<option value="" selected>Non-flyer</option>
					<option value="flyer">Flyer</option>
				</select> <select name="in_type">
					<option value="var" selected>Variable</option>
					<option value="fix">Fixed</option>
				</select> <select name="fx_term">
					<option value="" selected>N/A</option>
					<option value="1year">1 year</option>
					<option value="2year">2 years</option>
					<option value="3year">3 years</option>
					<option value="4year">4 years</option>
					<option value="5year">5 years</option>
				</select> <select name="rt_t1">
					<option value="" selected>Owner occupier</option>
					<option value="inv">Investment</option>
				</select> <select name="rt_t2">
					<option value="lte70"><= 70%</option>
					<option value="lte80" selected><= 80%</option>
					<option value="lte90"><= 90%</option>
					<option value="gt90">> 90%</option>
				</select> <select name="rt_t3">
					<option value="tier1">Price tier 1</option>
					<option value="tier2" selected>Price tier 2</option>
					<option value="tier3">Price tier 3</option>
					<option value="tier4">Price tier 4</option>
				</select> <select name="rt_t4">
					<option value="" selected>Principal and Interest</option>
					<option value="io">Interest only</option>
				</select> <select name="rt_t5" disabled>
					<option value="" selected></option>
					<option value=""></option>
				</select> <select name="rt_t6" disabled>
					<option value="" selected></option>
					<option value=""></option>
				</select></form>
			<h3>
				Rates shortcode:
			</h3>
			<pre id="sc-rate-result"></pre>
			<script>
				jQuery(document).ready(function() {
					jQuery("#sc-rate-creator select").change(function () {
						var rate_shortcode="[get_rate ";

						jQuery("#sc-rate-creator select").each(function() {
							var key =jQuery(this).attr('name'), value=jQuery(this).val();
							rate_shortcode+= "" + key + "=\"" + value + "\" ";
						});
						rate_shortcode+="][/get_rate]";
						jQuery("#sc-rate-result").html(rate_shortcode);
					});
				});
			</script>
			<hr />
			<h4 style="text-align:right;">
				<small>Example rates currently in the system<br />Public Basic Home Loan: <?php echo esc_attr(elv_get_rate(array(), "", "")); ?>
				</small>
			</h4>
		</div>
		<?php
	}

	/**
	 * Register and add rates
	 */
	public function elv_page_init()
	{
		register_setting(
			'my_option_group', // Option group
			'mq_rates_public' // Option name
		);
	}

	/**
	 * Get the rates from CSV and convert them to options
	 */
	public function elv_rate_csv_array()
	{
		if (
			isset($_POST['mq_rates_upload'])
			&& wp_verify_nonce($_POST['mq_rates_upload_nonce'], 'mq_rates_upload')
		) {
			if ($_FILES["file"]["error"] > 0) {
				$this->elv_rates_error_notice();
				exit;
			} else {

				/* Get CSV file contents after upload and explode to array */
				$uploadedfile =  $_FILES["file"];
				$upload_overrides = array( 'test_form' => false,  'mimes' => array('csv' => 'text/csv') );
				$movefile = wp_handle_upload( $uploadedfile, $upload_overrides );

				$content_rates = wpcom_vip_file_get_contents($movefile['url'], 10, 900);
				
				$csv_lines = explode("\n", $content_rates); //explode by line

				foreach ($csv_lines as $line) { //loop through lines
					list($id, $value) = explode(',', $line); //explode into id and rate
					if (isset($value)) {
						$id_rate_array[$id] = $value; // insert id and rate into array
					} else {
						$this->rates_error_notice;
						exit;
					}
				}

				$rate_array = [];

				foreach ($id_rate_array as $result_id => $result_value) {
					/* Insert or replace row into mq_rates_full */
					/* Explode rate id */

					$result_value = preg_replace("/\r|\n/", "", $result_value);

					$rate_id = explode("_", str_replace('"', '', $result_id));
					$rate_data = [
						'rt_stct' => '',
						'rt_type' => '',
						'pd_name' => '',
						'pd_feat' => '',
						'rt_valu' => str_replace('"', '', $result_value),
						'in_type' => '',
						'fx_term' => '',
						'rt_t1' => '',
						'rt_t2' => '',
						'rt_t3' => '',
						'rt_t4' => '',
						'rt_t5' => '',
						'rt_t6' => ''
					];

					/* If row exists, then replace */
					foreach ($rate_id as $rate_feature) {
						switch ($rate_feature) {
							case (preg_match('/(mort)/', $rate_feature) ? true : false): // eg mort
								break;
							case (preg_match($_POST['rt_stct'] ? $_POST['rt_stct'] : '/(ref)|(mstaff)|(qstaff)/', $rate_feature) ? true : false): // eg Association, Workplace, Referrer, Staff, Public
								$rate_data['rt_stct'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_type'] ? $_POST['rt_type'] : '/(rate)|(cmp)/', $rate_feature) ? true : false): // eg rate, comparison
								$rate_data['rt_type'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['pd_name'] ? $_POST['pd_name'] : '/(basic)|(loc)|(offset)|(smsf)|(rev)/', $rate_feature) ? true : false): // eg Basic, LOC, SMSF
								$rate_data['pd_name'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['pd_feat'] ? $_POST['pd_feat'] : '/(flyer)/', $rate_feature) ? true : false): // eg flyer, non-flyer, mac_reward
								$rate_data['pd_feat'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['in_type'] ? $_POST['in_type'] : '/(fix)|(var)/', $rate_feature) ? true : false): // eg Fixed, Variable
								$rate_data['in_type'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['fx_term'] ? $_POST['fx_term'] : '/(1year)|(2year)|(3year)|(4year)|(5year)/', $rate_feature) ? true : false): // eg 1 year, 2 years, 3 years..
								$rate_data['fx_term'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t1'] ? $_POST['rt_t1'] : '/(inv)/', $rate_feature) ? true : false): // eg Owner occupier, Investment
								$rate_data['rt_t1'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t2'] ? $_POST['rt_t2'] : '/(lte70)|(lte80)|(lte90)|(gt90)/', $rate_feature) ? true : false): // eg lte70, lte80, lte90, gt90
								$rate_data['rt_t2'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t3'] ? $_POST['rt_t3'] : '/(tier1)|(tier2)|(tier3)|(tier4)/', $rate_feature) ? true : false): // eg < $500k, < $750k, < $1.5m, > $1.5m
								$rate_data['rt_t3'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t4'] ? $_POST['rt_t4'] : '/(io)/', $rate_feature) ? true : false): // eg Principal, Principal & interest
								$rate_data['rt_t4'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t5'] ? $_POST['rt_t5'] : '/( )/', $rate_feature) ? true : false): // placeholder
								$rate_data['rt_t5'] = sanitize_text_field($rate_feature);
								break;
							case (preg_match($_POST['rt_t6'] ? $_POST['rt_t6'] : '/( )/', $rate_feature) ? true : false): // placeholder
								$rate_data['rt_t6'] = sanitize_text_field($rate_feature);
								break;
						}
					}
					array_push($rate_array, $rate_data);
				}

				//get the structure and add it to a multi array
				foreach ($rate_array as $rate_array_line) {
					$audience_type = $rate_array_line['rt_stct'] ? $rate_array_line['rt_stct'] : 'public'; // update blank to be 'public'

					$audience[$audience_type][] = $rate_array_line;
				}

				//add to custom post type
				$category_id = sanitize_text_field($_POST['mq_category']) ? sanitize_text_field($_POST['mq_category']) : 1; // get selected category, default to 1 (Uncategorised)

				foreach ($audience as $audience_key => $audience_single) {
					$post_added = $this->elv_add_cust_post($audience_key, $audience_single, $category_id);
				}
			}
		}
	}

	public function elv_rates_updated_notice()
	{
		if(isset($_FILES["file"])){


		if (($_POST) && ($_FILES["file"]["error"] <= 0)) {
			?>
			<div class="updated notice is-dismissible">
				<p><?php _e('Rates updated, please publish these rates in \'Product Rates\' to go live.', 'elevatego'); ?></p>
			</div>
			<?php
		}
		}
	}

	public function elv_rates_error_notice()
	{
		?>
		<div class="error notice is-dismissible">
			<p><?php _e('Rates were not updated, there may be an issue with your CSV file.', 'elevatego'); ?></p>
		</div>
		<?php
	}
}

if (is_admin()) {
	$my_rates_page = new MyRatesPage();
}
