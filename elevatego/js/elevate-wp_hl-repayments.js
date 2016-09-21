/**
 * Created by sadams3 on 26/05/2016.
 */

/**
 * On load functions
 */
jQuery(document).ready(function () {

	//Change price on selected repayment type

	//Show/hide Fixed loan terms

	jQuery('.loan_btn').click(function () {
		jQuery('#fixed').toggleClass('hide');
	});

	jQuery(".in_type").click(function () {
		if (jQuery(this).children().val() == "fix") {
			jQuery('#fixed').removeClass('hide');
		} else {

			jQuery('#fixed').addClass('hide');
			jQuery("#fx_term").val("");
		}
	});

	var input = jQuery('.calculator-body input[type=text]');

	input.focus(function () {
		jQuery(this).val(elv_dollarUnWrapper(jQuery(this).val()));
	}).blur(function () {
		jQuery(this).val(elv_dollarWrapper(jQuery(this).val()));
	});

	// alter table
	jQuery(".table-col-lvr").hide();
	jQuery(".table-col-repayments").hide();

	// format calc
	jQuery(":input[name='property_value']").val(elv_dollarWrapper(jQuery(":input[name='property_value']").val()));
	jQuery(":input[name='your_savings']").val(elv_dollarWrapper(jQuery(":input[name='your_savings']").val()));

	jQuery("#repayForm").submit(function (e) {
		elv_updateCalculations(["basic", "offset", "loc"]);

		/* scroll to area */
		if (jQuery("#repayments-table").length) {
			jQuery('html, body').animate({
				scrollTop: jQuery("#repayments-table").offset().top - 65
			}, 500);
		}

		/* change background color */
		jQuery(".comparison-row .feature-tile").removeClass("bg-white").addClass("bg-blue");

		e.preventDefault();

	});

	jQuery(".rt_t4").change(function () {
		jQuery(".rt_t4").val(jQuery(this).val()); // they all change

		elv_updateCalculations(["basic", "offset", "loc"]);
	});

});

function elv_updateCalculations(arrayProducts) {
	jQuery(".table-col-gift").hide();
	jQuery(".table-col-apply").hide();

	// alter table
	jQuery("#repayments-table td").attr("width", "40%");
	jQuery(".table-col-rates").attr("width", "15%").fadeIn();
	jQuery(".table-col-lvr").attr("width", "15%").fadeIn();
	jQuery(".table-col-repayments").attr("width", "15%").fadeIn();

	var prop_value = elv_dollarUnWrapper(jQuery(":input[name='property_value']").val());
	var loan_amount = elv_dollarUnWrapper(jQuery(":input[name='your_savings']").val());
	var frequency = jQuery(".rt_t4").val();

	var rt_t2 = "lte80", rt_t3 = "tier1", rate = "", cmp = "", lvr = "", repay = "";

	jQuery.each(arrayProducts, function (key, product) {
		// fixed rates have no tiers to lte

		if (jQuery(":input[name='in_type']:checked").val() == "var") {
			rt_t2 = elv_calculateLvr(loan_amount, prop_value);
			rt_t3 = elv_calculateTier(loan_amount);
		}

		rate = elv_calculateInterestRate("", "rate", product, jQuery(":input[name='pd_feat']:checked").val(), jQuery(":input[name='in_type']:checked").val(), jQuery("#fx_term option:selected").val(), jQuery(":input[name='rt_t1']:checked").val(), rt_t2, rt_t3, jQuery(":input[name='rt_t4']:checked").val(), "", "");
		cmp = elv_calculateInterestRate("", "cmp", product, jQuery(":input[name='pd_feat']:checked").val(), jQuery(":input[name='in_type']:checked").val(), jQuery("#fx_term option:selected").val(), jQuery(":input[name='rt_t1']:checked").val(), rt_t2, rt_t3, jQuery(":input[name='rt_t4']:checked").val(), "", "");
		lvr = elv_lvrWrapper(rt_t2);

		repay = elv_calculateRepayments(loan_amount, rate, frequency, 30);

		jQuery(".result-" + product + "-rate").html(elv_rateWrapper(rate));
		jQuery(".result-" + product + "-cmp").html(elv_rateWrapper(cmp));
		jQuery(".result-" + product + "-lvr").html(lvr);
		jQuery(".result-" + product + "-repay").html(elv_dollarWrapper(repay));
	});
}

/**
 * Find interest rates interest rates
 * @param rt_stct
 * @param rt_type
 * @param pd_name
 * @param pd_feat
 * @param in_type
 * @param fx_term
 * @param rt_t1
 * @param rt_t2
 * @param rt_t3
 * @param rt_t4
 * @param rt_t5
 * @param rt_t6
 */
function elv_calculateInterestRate(rt_stct, rt_type, pd_name, pd_feat, in_type, fx_term, rt_t1, rt_t2, rt_t3, rt_t4, rt_t5, rt_t6) {
	var rate_vale = "";
	var myarray = {
		'rt_stct': rt_stct,
		'rt_type': rt_type,
		'pd_name': pd_name,
		'pd_feat': pd_feat,
		'in_type': in_type,
		'fx_term': fx_term,
		'rt_t1': rt_t1,
		'rt_t2': rt_t2,
		'rt_t3': rt_t3,
		'rt_t4': rt_t4,
		'rt_t5': rt_t5,
		'rt_t6': rt_t6
	};
	jQuery.each(rateArray, function (key, value) {
		if (myarray['rt_stct'] == value['rt_stct'] && myarray['rt_type'] == value['rt_type'] && myarray['pd_name'] == value['pd_name'] && myarray['pd_feat'] == value['pd_feat'] && myarray['in_type'] == value['in_type'] && myarray['fx_term'] == value['fx_term'] && myarray['rt_t1'] == value['rt_t1'] && myarray['rt_t2'] == value['rt_t2'] && myarray['rt_t3'] == value['rt_t3'] && myarray['rt_t4'] == value['rt_t4'] && myarray['rt_t5'] == value['rt_t5'] && myarray['rt_t6'] == value['rt_t6']) {
			rate_vale = value['rt_valu'];
		}
	});
	return rate_vale;
}

/**
 * Calculate the tier of the loan
 * @param loanVal
 * @returns {*}
 */
var elv_calculateTier = function (loanVal) {

	if (loanVal <= 499999) {
		return 'tier2';
	} else if (loanVal <= 749999) {
		return 'tier2';
	} else if (loanVal <= 1499999) {
		return 'tier3';
	} else {
		return 'tier4';
	}

	return ''; // needs to be defined by business
};

/**
 * Calculate the LVR of the loan
 * @param loanVal
 * @param houseVal
 * @returns {*}
 */
var elv_calculateLvr = function (loanVal, houseVal) {
	var calc = parseFloat(loanVal / houseVal).toFixed(10);

	if (calc <= 0.70) {
		return 'lte80';
	} else if (calc <= 0.80) {
		return 'lte80';
	} else if (calc <= 0.90) {
		return 'lte90';
	} else {
		return 'gt90';
	}

	return ''; // needs to be defined by business
};

/**
 * Calculates the loan repayments
 * Repayments = (Rate/12 x P) / (1- ((1 + Rate/12)^(-n)))
 * P = loan amount
 * n = number of repayments = 360 (frequency * term)
 * @param loanVal
 * @param rate
 * @param frequency
 * @param term
 * @returns {number}
 */
var elv_calculateRepayments = function (loanVal, rate, frequency, term) {

	if (rate) {
		rate = parseFloat(rate);

		// Fix rate, e.g., 4.5% === 0.045
		var rateFixed = rate / 100;

		// Portion: (Rate/12 x P)
		var calc1 = ( rateFixed / frequency) * loanVal;

		// Portion: ((1 + Rate/12)^(-n))
		var calc2 = elv_calculateRepaymentsHelper(rateFixed, frequency, term);

		// Fix any exponential values, toFixed() doesn't parse properly
		var calc1Fixed = elv_correctExponentValue(calc1);
		var calc2Fixed = elv_correctExponentValue(calc2);

		// Complete calculation
		var total = calc1Fixed / ( 1 - calc2Fixed );
	} else {
		total = "n/a";
	}

	return total;
};

/**
 *
 * @param rate
 * @param frequency
 * @param term
 * @returns {number}
 */
var elv_calculateRepaymentsHelper = function (rate, frequency, term) {
	// Portion: (1 + Rate/12)
	var calc1 = 1 + ( rate / frequency );
	// Portion: -n
	var calc2 = ( term * frequency ) * -1;
	// Calculation result: (1 + Rate/12)^(-n)
	var total = Math.pow(calc1, calc2);

	return total;
};

/**
 * Fixed any exponential values i.e., 1.0239746732e-50
 * @param total
 * @returns {Number}
 */
var elv_correctExponentValue = function (total) {
	return parseFloat((total + '').split('e')[0]);
};

/**
 * Format number as dollars
 * @param price
 * @returns {*}
 */
function elv_dollarWrapper(price) {
	var formattedPrice = "n/a";
	if (price && (price != "n/a")) {
		formattedPrice = '$' + parseInt(price).toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
	}
	return formattedPrice
}

/**
 * Format string as raw number
 * @param price
 * @returns {*}
 */
function elv_dollarUnWrapper(price) {
	var unformattedPrice = 0;
	if (price) {
		unformattedPrice = price.replace(/\D+/g, '');
	}
	return unformattedPrice;
}

/**
 * Wrap LVR with spans
 * @param lvr
 * @returns {*}
 */
function elv_lvrWrapper(lvr) {
	var formattedLVR;
	if (lvr) {
		formattedLVR = lvr.replace(/\D+/g, '') + '<span class="rate-percent">%</span>';
	} else {
		formattedLVR = 'n/a';
	}
	return formattedLVR;
}

/**
 * Wrap rate with spans
 * @param rate
 * @returns {*}
 */
function elv_rateWrapper(rate) {
	var formattedRate;
	
	if((rate != undefined) && (rate.search("rate-pa")<0)) {
		var rateToNumber = parseFloat(rate).toFixed(2);

		if ((rate) && !isNaN(rateToNumber)) {
			formattedRate = rateToNumber + '<span class="rate-percent">%<span class="rate-pa">pa </span></span>';
		} else {
			formattedRate = 'n/a';
		}
	}
	return formattedRate;
}

/**
 * Dollar format code (UNUSED)
 * @param c
 * @param d
 * @param t
 * @returns {string}
 */
Number.prototype.formatMoney = function (c, d, t) {
	var n = this, c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "." : d, t = t == undefined ? "," : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
	return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
};

/*var rateArray = [{}];*/
