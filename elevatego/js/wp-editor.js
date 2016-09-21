function rateWrapper(rate) {
	var formattedRate;
	var rateToNumber = parseFloat(rate).toFixed(2);

	if ((rate) && !isNaN(rateToNumber)) {
		formattedRate = '<span class="rate-whole"><span class="rate-decimal">' + rateToNumber + '<span class="rate-percent">%<span class="rate-pa">pa </span></span></span></span>';
	} else {
		formattedRate = '<span class="rate-whole"><span class="rate-decimal">n/a</span></span>';
	}
	return formattedRate;
}

(function () {
	tinymce.create('tinymce.plugins.Wptuts', {
		init: function (ed, url) {
			ed.addButton('dropcap', {
				title: 'DropCap', cmd: 'dropcap', image: url + '/img/dropcap.jpg'
			});

			ed.addButton('showrecent', {
				title: 'Add disclaimers', cmd: 'showrecent', image: url + '/img/recent.png'
			});

			ed.addButton('anchortag', {
				title: 'Add anchor tag', cmd: 'anchortag', image: url + '/img/anchor-icon.png'
			});

			ed.addButton('Trophy_Multiplier_one', {
				title: 'Trophy Multiplier one', cmd: 'Trophy_Multiplier_one', image: url + '/img/Trophy_Multiplier_one.png'
			});

			ed.addButton('Trophy_Multiplier_two', {
				title: 'Trophy Multiplier two', cmd: 'Trophy_Multiplier_two', image: url + '/img/Trophy_Multiplier_two.png'
			});

			ed.addButton('additional_gift', {
				title: 'Additional gift', cmd: 'additional_gift', image: url + '/img/additional_gift.png'
			});

			ed.addButton('Rewards_with_image', {
				title: 'Rewards with image', cmd: 'Rewards_with_image', image: url + '/img/Rewards_with_image.png'
			});

			ed.addButton('Big_green_Zero', {
				title: 'Big green Zero', cmd: 'Big_green_Zero', image: url + '/img/Big_green_Zero.png'
			});

			ed.addButton('bigzero', {
				title: 'Add a BIG zero', cmd: 'bigzero', image: url + '/img/zero-icon.png'
			});

			ed.addButton('promotile', {
				title: 'Add the Promotion Tile', cmd: 'promotile', image: url + '/img/promotile-icon.png'
			});

			ed.addCommand('dropcap', function () {

				var shortcode_id = prompt("Add your shortcode: "), shortcode_id;

				if (shortcode_id !== null) {

					var return_text = '';
					return_text = '<span class="dropcap"><div class="col-md-6 text-default"><h5>Interest rate</h5><div class="rate-display rate-large">' + shortcode_id + '</div></div></span>';
					ed.execCommand('mceInsertContent', 0, return_text);
				}

			});

			//
			// ed.addCommand('dropcap', function() {
			//   var selected_text = ed.selection.getContent();
			//   var return_text = '';
			//   return_text = '<span class="dropcap"><div class="col-md-6 text-default"><h5>Interest rate</h5><div class="rate-display rate-large"><span class="rate-whole">4<span class="rate-decimal">.05<span class="rate-percent">%<span class="rate-pa">p.a. </span></span></span></span></div></div></span>';
			//   ed.execCommand('mceInsertContent', 0, return_text);
			// });

			ed.addCommand('anchortag', function () {
				var selected_text = ed.selection.getContent();

				var return_text = '';
				var ascii_string ='';
				var concat_string = '_';
				var i = 0;

				for(i ;i < selected_text.length ;i++){


					if( i+1 == selected_text.length){
						ascii_string = ascii_string.concat(selected_text.charCodeAt(i));

					} else {
						ascii_string = ascii_string.concat(selected_text.charCodeAt(i),concat_string);
					}

				}
				
				return_text = '<a href="#footnote-' + ascii_string + '" class="disclaimer-link"><sup>' + selected_text + '</sup></a>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('showrecent', function () {
				var anchor_id = prompt("Disclaimer Anchor Number: "), anchor_id;
				var disclaimer_id = prompt("Disclaimer URL: "), disclaimer_id;
				if (anchor_id !== null && disclaimer_id !== null) {

					shortcode = '<table> <tr> <td>' + anchor_id + '</td> <td>' + disclaimer_id + '</td> </tr> </table>';
					ed.execCommand('mceInsertContent', 0, shortcode);

				}
			});

			ed.addCommand('Trophy_Multiplier_two', function () {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<span class="Trophy_Multiplier_two"><div class="feature-tile bg-white"><div class="tile-body text-center"><span class="rate-display picon picon-0658-cup-place-winner-award-prize-achievement"><!-- fill --></span><span class="rate-display rate-sml text-success">x2</span><p><small>Macquarie Reward points per $1 spent</small></p></div></div></span>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('Trophy_Multiplier_one', function () {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<span class="Trophy_Multiplier_one"><div class="feature-tile bg-white"><div class="tile-body text-center"><span class="rate-display picon picon-0658-cup-place-winner-award-prize-achievement"><!-- fill --></span><span class="rate-display rate-sml text-success">x1<span class="rate-decimal">.25</span></span><p><small>Macquarie Reward points per $1 spent</small></p></div></div></span>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('additional_gift', function () {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<span class="additional_gift"><small><strong>Additional gift</strong></small><div class="rate-display rate-med" id="result-basic-gift"><span class="rate-whole"><span class="rate-decimal"><h4 class="text-success margin-auto">$363</h4></span></span></div><small>saved by the waived documentation fee</small></span>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('Rewards_with_image', function () {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<span class="Rewards_with_image"><div class="feature-tile bg-white"><div class="tile-body text-center"><img src="img/qantas.jpg"><p><small>Qantas Points on eligible purchases</small></p></div></div></span>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('Big_green_Zero', function () {
				var selected_text = ed.selection.getContent();
				var return_text = '';
				return_text = '<span class="Big_green_Zero"><div class="text-center"><div class="rate-display rate-large text-success"><span class="rate-whole"><span class="rate-decimal"><span class="rate-percent">$</span></span>0</span></div><h3>Application fees<br></h3><h3>Account management fees<br></h3><h3>Redraw fees online</h3></div></span>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('bigzero', function () {
				var return_text = '';
				return_text = '<div class="text-center"><div class="rate-display rate-large"><span class="rate-display picon picon-0658-cup-place-winner-award-prize-achievement"><!-- fill --></span></div><h3>Application fees<br></h3><h3>Account management fees<br></h3><h3>Redraw fees online</h3></div>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});

			ed.addCommand('promotile', function () {
				var return_text = '';
				return_text = '<div class="row l-padding-t-1 l-padding-b-1 bg-green feature-tile feature-full text-center"><div class="col-md-3 l-padding-b-1"><h5 class="text-primary">Rates from</h5><div class="rate-display rate-large text-primary">4.05% pa</div></div><div class="col-md-6 l-padding-b-1"><div class="row"><div class="tile-head"><span class="h4">Competition for new home loans only</span></div><div class="tile-body"><h2 class="text-default">Win your Macquarie home loan<br> paid for a year, up to $30,000</h2><div class="tile-link"><a class="btn btn-primary">Learn more</a></div></div></div></div><div class="col-md-3 l-padding-b-1"><h5 class="text-grey">Interest rate</h5><div class="rate-display rate-large text-grey"><span class="rate-whole">4<span class="rate-decimal">.05<span class="rate-percent">%<span class="rate-pa">p.a. </span></span></span></span></div></div></div>';
				ed.execCommand('mceInsertContent', 0, return_text);
			});
		}, // ... Hidden code
	});
	// Register plugin
	tinymce.PluginManager.add('wptuts', tinymce.plugins.Wptuts);
})();



