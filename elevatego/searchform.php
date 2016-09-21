<?php
/**
 * Template for displaying search forms in Twenty Sixteen
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<style>
	.div_start {
		position: relative;
	}
	.speech-instructions{
		border: none;
		background-color: transparent;
		font-size: 1.2em !important;
		font-weight: 600 !important;
		width: 93%;
		color: #BBB;
	}
	.search-results-pane{
		margin-top: 50px;
	}
	.start_button{
	display: inline-block;
	position: absolute;
	right: 15px;
	}
</style>


<script>
	(function(e, p){
		var m = location.href.match(/platform=(win8|win|mac|linux|cros)/);
		e.id = (m && m[1]) ||
			(p.indexOf('Windows NT 6.2') > -1 ? 'win8' : p.indexOf('Windows') > -1 ? 'win' : p.indexOf('Mac') > -1 ? 'mac' : p.indexOf('CrOS') > -1 ? 'cros' : 'linux');
		e.className = e.className.replace(/\bno-js\b/,'js');
	})(document.documentElement, window.navigator.userAgent)
</script>



<div id="results">
	<span class="final" id="final_span" style="display:none"></span>
	<span class="interim" id="interim_span" style="display:none"></span>
</div>

<form role="search" method="get" class="morphsearch-form" id="create" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<input type="search" class="morphsearch-input" id="elevatesearchfield" placeholder="What are you looking for?" value="<?php echo esc_attr(get_search_query()); ?>" name="s" autocomplete="off" /><br/>
		<div id="div_start" class="div_start">
			<input type="text" disabled id="microphone-feedback" value="Click the microphone to start and stop speaking..." class="speech-instructions" />
			<label id="start_button" class="start_button" onclick="elv_startButton(event)"><span alt="Start" id="start_img" class="font-50 picon picon-0611-microphone-mic-voice-recording text-default"><!-- fill --></span></label>
		</div>
	<button type="submit" class="morphsearch-submit picon picon-0033-search-find-zoom"></button>
</form>

<span id="loading_spinner" class="picon picon-0142-rotate-sync" style="display:none"><!-- fill --></span>
<div id="created" class="search-results-pane">
	<div class="browser-landing" id="main">
	</div>
	<!--This is where the search results will be loaded-->
</div>
<span class="morphsearch-close"></span>


	<script src="<?php echo get_template_directory_uri () ?>/gs-assets/chrome.min.js">
	</script>
	<script>



		var final_transcript = '';
		var recognizing = false;
		var ignore_onend;
		var start_timestamp;
		if (!('webkitSpeechRecognition' in window)) {
			elv_upgrade();
		} else {
			var start_button = document.getElementById('start_button');
			start_button.style.display = 'inline';
			var recognition = new webkitSpeechRecognition();
			recognition.continuous = true;
			recognition.interimResults = true;

			recognition.onstart = function() {
				recognizing = true;
				document.getElementById('microphone-feedback').value = 'We are listening...';
				start_img.className = 'font-50 picon picon-0611-microphone-mic-voice-recording text-primary';
			};

			recognition.onerror = function(event) {
				if (event.error == 'no-speech') {
					start_img.className = 'font-50 picon picon-0611-microphone-mic-voice-recording text-danger';
					document.getElementById('microphone-feedback').value = 'Try speaking to us...';
					ignore_onend = true;
				}
				if (event.error == 'audio-capture') {
					start_img.className = 'font-50 picon picon-0611-microphone-mic-voice-recording text-warning';
					document.getElementById('microphone-feedback').value = 'Bummer! Seems like your microphone isnt working...';
					ignore_onend = true;
				}
				if (event.error == 'not-allowed') {
					if (event.timeStamp - start_timestamp < 50) {
						document.getElementById('microphone-feedback').value = 'Aww! Seems like you dont want to talk to us...';
					} else {
						document.getElementById('microphone-feedback').value = 'Aww! Seems like you dont want to talk to us...';
					}
					ignore_onend = true;
				}
			};

			recognition.onend = function() {
				recognizing = false;
				elv_voiceAJAX();
				if (ignore_onend) {
					return;
				}
				start_img.className = 'font-50 picon picon-0611-microphone-mic-voice-recording text-default';
				if (!final_transcript) {
					document.getElementById('microphone-feedback').value = 'We are listening...';
					return;
				}

				if (window.getSelection) {
					window.getSelection().removeAllRanges();
					var range = document.createRange();
					range.selectNode(document.getElementById('final_span'));
					window.getSelection().addRange(range);
				}

			};

			recognition.onresult = function(event) {
				var interim_transcript = '';
				if (typeof(event.results) == 'undefined') {
					recognition.onend = null;
					recognition.stop();
					elv_upgrade();
					return;
				}
				for (var i = event.resultIndex; i < event.results.length; ++i) {
					if (event.results[i].isFinal) {
						final_transcript += event.results[i][0].transcript;
					} else {
						interim_transcript += event.results[i][0].transcript;
					}
				}
				final_transcript = elv_capitalize(final_transcript);
				final_span.innerHTML = elv_linebreak(final_transcript);
				document.getElementById('elevatesearchfield').value = elv_linebreak(final_transcript);


				interim_span.innerHTML = elv_linebreak(interim_transcript);
				if (final_transcript || interim_transcript) {
//					showButtons('inline-block');
				}
			};
		}

		function elv_upgrade() {
			start_button.style.visibility = 'hidden';
			showInfo('info_upgrade');
		}

		var two_line = /\n\n/g;
		var one_line = /\n/g;
		function elv_linebreak(s) {
			return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
		}

		var first_char = /\S/;
		function elv_capitalize(s) {
			return s.replace(first_char, function(m) { return m.toUpperCase(); });
		}


		function elv_startButton(event) {
			if (recognizing) {
				recognition.stop();
				return;
			}
			final_transcript = '';
			recognition.lang = 'en-AU';
			recognition.start();
			ignore_onend = false;
			final_span.innerHTML = '';
			interim_span.innerHTML = '';
			start_img.src = '<?php echo get_template_directory_uri () ?>/gs-assets/mic-slash.gif';
			start_timestamp = event.timeStamp;
		}




	</script>







<script>

	jQuery('#create').submit(function() { // catch the form's submit event



		jQuery('#loading_spinner').show();

		jQuery.ajax({ // create an AJAX call...
			data: jQuery(this).serialize(), // get the form data
			type: jQuery(this).attr('method'), // GET or POST
			url: jQuery(this).attr('action'), // the file to call
			success: function(response) { // on success..
				jQuery('#created').html(response);
				jQuery('#loading_spinner').hide();// update the DIV
			},
			error: function() {
				alert("Something went wrong!");
			}
		});
		return false; // cancel original event to prevent form submitting
	});

	function elv_voiceAJAX() {

		jQuery(document).ready(function() { // catch the form's submit event


			jQuery('#loading_spinner').show();

			jQuery.ajax({ // create an AJAX call...
				data: jQuery('#create').serialize(), // get the form data
				type: jQuery('#create').attr('method'), // GET or POST
				url: jQuery('#create').attr('action'), // the file to call
				success: function(response) { // on success..
					jQuery('#created').html(response);
					jQuery('#loading_spinner').hide();// update the DIV
				},
				error: function() {
					alert("Something went wrong!");
				}
			});
			return false; // cancel original event to prevent form submitting
		});
	}
</script>


