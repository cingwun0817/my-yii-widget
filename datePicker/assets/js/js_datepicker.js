var _datePicker = function(o) {
	var self = o;

	var init = function() {
		self.$el = $(self.el);
		self.$time = self.$el.find('.input-time');

		var showTime = self.$el.find('.date-picker').attr('show-time');
		if ( showTime == 'true' ) {
			showTime = true;
		} else {
			showTime = false;
		}

		var format = 'YYYY/MM/DD';
		if ( showTime )
			format = 'YYYY/MM/DD H:mm';

		var startDate = self.$el.find('.date-picker').attr('start-time');

		self.$date_picker = self.$el.find('.date-picker').daterangepicker({
	        timePicker: showTime,
	        singleDatePicker: true,
	        timePicker24Hour: true,
	        minDate: self.$el.find('.date-picker').attr('minDate'),
	        startDate: startDate,
			locale: {
				format: format
			}
		},
		function(start, end, label) {
			self.$time.val(start.format(format));
		});

		return self;
	}

	return init();
}
