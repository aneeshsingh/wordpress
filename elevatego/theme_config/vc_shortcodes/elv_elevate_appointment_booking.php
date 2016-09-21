<?php

$output = '
	<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/bootstrap-datetimepicker.css">
<div class="container-fluid bg-white l-padding-t-2 l-padding-b-2">
    <div class="container bg-white appt-booking">
        <div class="row">

            <div class="col-md-12">
                <h2>Find a specialist</h2>
                <div class="col-md-12 bg-grey l-padding-t-2">
                    <div class="col-md-7">
                        <h4>Specialist area</h4>
                        <label class="btn btn-default btn-appt" for="homeloans">
                            <input type="radio" class="radio-button" name="specialist-area" id="homeloans" value="homeloans" autocomplete="off"> Home loans
                        </label>
                        <label class="btn btn-default btn-appt active" for="creditcards">
                            <input type="radio" class="radio-button" name="specialist-area" id="creditcards" value="creditcards" autocomplete="off"> Credit cards
                        </label>
                        <label class="btn btn-default btn-appt" for="bankacc">
                            <input type="radio" class="radio-button" name="specialist-area" id="bankacc" value="bankacc" autocomplete="off"> Bank accounts
                        </label>
                        <label class="btn btn-default btn-appt" for="financialadvice">
                            <input type="radio" class="radio-button" name="specialist-area" id="financialadvice" value="financialadvice" autocomplete="off"> Financial advice
                        </label>
                        <label class="btn btn-default btn-appt" for="carloans">
                            <input type="radio" class="radio-button" name="specialist-area" id="carloans" value="carloans" autocomplete="off"> Car loans
                        </label>
                        <label class="btn btn-default btn-appt" for="privatebank">
                            <input type="radio" class="radio-button" name="specialist-area" id="privatebank" value="privatebank" autocomplete="off"> Private bank
                        </label>
                        <label class="btn btn-default btn-appt" for="test">
                            <input type="radio" class="radio-button" name="specialist-area" id="test" value="test" autocomplete="off"> Lorem ipsum dolor
                        </label>
                    </div>
                    <div class="col-md-5">
                        <h4>Appointment type</h4>
                        <div class="radio">
                            <label for="inperson"><input type="radio" name="appointment-type" value="inperson" id="inperson" checked>In-person</label>

                            <label for="phonecall"><input type="radio" name="appointment-type" value="phonecall" id="phonecall" >Phone call</label>

                            <label for="chat"><input type="radio" name="appointment-type" value="chat" id="chat" >Chat</label>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h4>Location</h4>
                        <label class="select-arrow" for="location">
                            <select class="form-control" name="location" id="location">
                                <option value="1 Shelley Street">1 Shelley Street</option>
                                <option value="Martin Place">Martin Place</option>
                                <option value="1 Shelley Street">1 Shelley Street</option>
                                <option value="Martin Place">Martin Place</option>
                                <option value="1 Shelley Street">1 Shelley Street</option>
                            </select>
                        </label>
                    </div>
                    <div class="col-md-12">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="bg-blue-dark dp-today-date">
                                    <h4 class="text-white">Select a date</h4>
                                    <h3 class="text-white">Wed, June 15, 2016</h3>
                                </div>
                                <div id="datetimepicker"></div>
                            </div>
                            <div class="col-md-8">
                                <div class="panel bg-white">
                                    <div class="panel-heading">
                                        Wednesday, 15 June
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <span class="picon picon-0760-weather-sun-summer font-40"><!--fill--></span>
                                        </div>
                                        <div class="col-md-10">
                                            <label class="btn btn-default btn-appt time" for="800am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="800am" value="800am" autocomplete="off"> 8:00am
                                            </label>
                                            <label class="btn btn-default btn-appt time active" for="830am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="830am" value="830am" autocomplete="off" data-toggle="modal" data-target="#SelectedTime"> 8:30am
                                            </label>
                                            <!-- Modal -->
                                            <div class="modal fade" id="SelectedTime" tabindex="-1" role="dialog" aria-labelledby="Request a Call">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span><br /><span class="close-text">Close</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body col-lg-12 bg-grey ">
                                                            <div id="ConfirmBooking" class="text-left padding-lr-60 l-padding-t-2">
                                                                <h2 class="l-padding-t-1">Confirm your booking</h2>
                                                                <form id="requestCallForm" name="requestCallForm" method="POST" action="'.EXPERTISE_AJAX_URL.'">
                                                                    <input type="hidden" id="code_spliter" value="event_creation" name="code_spliter" />
                                                                    <input type="hidden" id="action" value="expertise" name="action" />            
                                                                    <div class="form-group l-padding-b-1 l-padding-t-1">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <div class="l-padding-b-2">
                                                                                    <label class="sr-only" for="full_name">Full name<abbr title="Required">*</abbr></label>
                                                                                    <input name="full_name" id="full_name" type="text" class="form-control" placeholder="Full name" />
                                                                                </div>
                                                                                <div class="l-padding-b-2">
                                                                                    <label class="sr-only" for="email">Email address<abbr title="Required">*</abbr></label>
                                                                                    <input name="email" id="email" type="email" class="form-control" placeholder="Email address" />
                                                                                </div>
                                                                                <div class="l-padding-b-2">
                                                                                    <label class="sr-only" for="phone">Phone number<abbr title="Required">*</abbr></label>
                                                                                    <input name="phone" id="phone" type="text" class="form-control" placeholder="Phone number" />
                                                                                </div>
                                                                                <div class="l-padding-b-2">
                                                                                    <label class="sr-only" for="start_time">Start Date<abbr title="Required">*</abbr></label>
                                                                                    <input name="start_time" id="start_time" type="text" class="form-control" value="2016-07-30T09:00" placeholder="2016-07-30T09:00" />
                                                                                </div>
                                                                                <div class="l-padding-b-2">
                                                                                    <label class="sr-only" for="end_time">End Date<abbr title="Required">*</abbr></label>
                                                                                    <input name="end_time" id="end_time" type="text" class="form-control" value="2016-07-30T17:00" placeholder="2016-07-30T17:00" />
                                                                                </div>                                                                                                                                                                
                                                                                <div class="l-padding-b-2">
                                                                                    <button class="btn btn-primary btn-block" type="submit">Confirm booking</button>
                                                                                </div>
                                                                                <div class="l-padding-b-2">
                                                                                    <button class="btn btn-default btn-block" type="reset">Clear</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <h4>Meeting</h4>
                                                                                 <input name="agent_name" id="agent_name" type="text" class="form-control" value="Jane Doe, Credit Card Specialist" />

                                                                                <h4>Date</h4>
                                                                                 <input name="date_time" id="date_time" type="text" class="form-control" value="12:15pm Wednesday, 25 May 2016" />

                                                                                <h4>Location</h4>
                                                                                <input name="location" id="location" type="text" class="form-control" value="Macquarie Bank, 1 Shelley St NSW 2000" />

                                                                                <p class="l-padding-t-1 l-padding-b-1 text-primary">
                                                                                    <span class="picon picon picon-0023-calendar-month-day-planner-events font-40"></span>
                                                                                    <span> Add to your calendar</span>
                                                                                </p>

                                                                                <p>By continuing with your booking, you agree to our <a class="#"><strong>Terms of Use</strong></a> and <a href="#"><strong>Privacy Policy</strong></a>. </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                            <div id="ConfirmBooking-result" class="text-left padding-lr-60 l-padding-t-2 hide">
                                                                <h2 class="l-padding-t-1">Confirm your booking</h2>
                                                                <p>Congratulations your booking has been confirmed.</p>
                                                                <input type="text" value="" id="appointmentresult" name="appointmentresult" />
                                                            </div>                                                            
                                                            <div id="requestCallThanks" class="text-center l-padding-b-2 hide">
                                                                <h2 class="l-padding-b-1">Great! You\'ve successfully subscribed.</h2>
                                                                <p class="l-padding-b-1"><strong>As a subscriber you can take advantage
                                                                        <br> of special Your.Macquarie content.</strong></p>
                                                                <p>To activate your account please check your
                                                                    <br> email and click the activation link.</p>
                                                            </div>
                                                            <div class=" l-padding-b-2"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <label class="btn btn-default btn-appt time" for="915am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="915am" value="915am" autocomplete="off"> 9:15am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="930am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="930am" value="930am" autocomplete="off"> 9:30am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1200pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1200pm" value="1200pm" autocomplete="off"> 12:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1215pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1215pm" value="1215pm" autocomplete="off"> 12:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="100pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="100pm" value="100pm" autocomplete="off"> 1:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="115pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="115pm" value="115pm" autocomplete="off"> 1:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="230pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="230pm" value="230pm" autocomplete="off"> 2:30pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="245pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="245pm" value="245pm" autocomplete="off"> 2:45pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="300pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="300pm" value="300pm" autocomplete="off"> 3:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="330pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="330pm" value="330pm" autocomplete="off"> 3:30pm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="panel-heading">
                                        Thursday, 16 June
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <span class="picon picon-0760-weather-sun-summer font-40"><!--fill--></span>
                                        </div>
                                        <div class="col-md-10">
                                            <label class="btn btn-default btn-appt time" for="800am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="800am" value="800am" autocomplete="off"> 8:00am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="830am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="830am" value="830am" autocomplete="off"> 8:30am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="915am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="915am" value="915am" autocomplete="off"> 9:15am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="930am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="930am" value="930am" autocomplete="off"> 9:30am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1200pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1200pm" value="1200pm" autocomplete="off"> 12:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1215pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1215pm" value="1215pm" autocomplete="off"> 12:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="100pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="100pm" value="100pm" autocomplete="off"> 1:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="115pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="115pm" value="115pm" autocomplete="off"> 1:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="230pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="230pm" value="230pm" autocomplete="off"> 2:30pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="245pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="245pm" value="245pm" autocomplete="off"> 2:45pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="300pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="300pm" value="300pm" autocomplete="off"> 3:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="330pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="330pm" value="330pm" autocomplete="off"> 3:30pm
                                            </label>
                                        </div>
                                    </div>
                                    <div class="panel-heading">
                                        Friday, 17 June
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-2">
                                            <span class="picon picon-0760-weather-sun-summer font-40"><!--fill--></span>
                                        </div>
                                        <div class="col-md-10">
                                            <label class="btn btn-default btn-appt time" for="800am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="800am" value="800am" autocomplete="off"> 8:00am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="830am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="830am" value="830am" autocomplete="off"> 8:30am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="915am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="915am" value="915am" autocomplete="off"> 9:15am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="930am">
                                                <input type="radio" class="radio-button" name="specialist-area" id="930am" value="930am" autocomplete="off"> 9:30am
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1200pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1200pm" value="1200pm" autocomplete="off"> 12:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="1215pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="1215pm" value="1215pm" autocomplete="off"> 12:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="100pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="100pm" value="100pm" autocomplete="off"> 1:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="115pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="115pm" value="115pm" autocomplete="off"> 1:15pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="230pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="230pm" value="230pm" autocomplete="off"> 2:30pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="245pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="245pm" value="245pm" autocomplete="off"> 2:45pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="300pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="300pm" value="300pm" autocomplete="off"> 3:00pm
                                            </label>
                                            <label class="btn btn-default btn-appt time" for="330pm">
                                                <input type="radio" class="radio-button" name="specialist-area" id="330pm" value="330pm" autocomplete="off"> 3:30pm
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right">
                                    <h4><a href="#">Next 3 days &#62;</a></h4>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>
</div>


<script src="'.get_template_directory_uri().'/js/moment.js"></script>
<script src="'.get_template_directory_uri().'/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript">
    jQuery(function () {
        jQuery(\'#datetimepicker\').datetimepicker({
            inline: true,
            sideBySide: false,
            showTodayButton: true
        });
    });
    
    	jQuery(\'#requestCallForm\').submit(function () {
		jQuery.ajax({ 
			data: jQuery(this).serialize(), 
			type: jQuery(this).attr(\'method\'), 
			url: jQuery(this).attr(\'action\'), 
			success: function (response) { 
				jQuery(\'#ConfirmBooking\').addClass(\'hide\');
				jQuery(\'#appointmentresult\').val(response); 
				jQuery(\'#ConfirmBooking-result\').removeClass(\'hide\');
			}
		});
		return false; // cancel original event to prevent form submitting
	});
</script>
';

print balanceTags($output);
