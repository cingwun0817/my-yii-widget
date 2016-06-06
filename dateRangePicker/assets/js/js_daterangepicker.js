var _dateRangePicker = function(o) {
	var self = o;

	var init = function() {
		self.$el = $(self.el);
		self.$begin = self.$el.find('.input-begin');
		self.$end = self.$el.find('.input-end');

		var showTime = self.$el.find('.date-range-picker').attr('show-time');
		if ( showTime == 'true' ) {
			showTime = true;
		} else {
			showTime = false;
		}

		var format = 'YYYY/MM/DD';
		if ( showTime )
			format = 'YYYY/MM/DD H:mm';

		var startDate = self.$el.find('.date-range-picker').attr('start-time');
		var endDate = self.$el.find('.date-range-picker').attr('end-time');

		self.$date_picker = self.$el.find('.date-range-picker').daterangepicker({
	        timePicker: showTime,
	        timePicker24Hour: showTime,
	        startDate: startDate,
	        endDate: endDate,
			locale: {
				format: format
			},
			"showDropdowns": true,
			"minDate": "2015/01/01",
		},
		function(start, end, label) {
			self.$begin.val(start.format(format));
			self.$end.val(end.format(format));
		});

		return self;
	}

	return init();
}
