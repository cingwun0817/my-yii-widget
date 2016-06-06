var _ckEditor = function(o) {
	var self = o;

	var init = function() {
		self.$el = $(self.el);
		self.$content = self.$el.find('.textarea-content');

		// var filebrowserUploadUrl = '/admin/uploader/ckeditor?type=file&bucket='+self.$bucket;
		var filebrowserImageUploadUrl = '/admin/uploader/ckeditor?bucket='+self.bucket+'&table='+self.table+'&id='+self.id+'&language='+self.language;

		//set bodyid and ckeditor css
		//var bodyId = self.$el.find('#cms-block option:selected').attr('meta-block'),
		var bundleCss = self.$el.attr('meta-css');
		var bundleFaCss = self.$el.attr('meta-fa-css');
		var bundleBtCss = self.$el.attr('mate-bt-css');

		self.CK = CKEDITOR.replace(self.$content.attr('name'), {
			// filebrowserUploadUrl: filebrowserUploadUrl,
			filebrowserImageUploadUrl: filebrowserImageUploadUrl,
			contentsCss: [bundleCss, bundleFaCss, bundleBtCss],
			allowedContent: true,
			// bodyId: bodyId,
			fullPage: false,
			enterMode: 2,
			// font_names : '',
			bodyClass : 'editor-container',
		});

		CKEDITOR.dtd.$removeEmpty['span'] = false;
		CKEDITOR.dtd.$removeEmpty['i'] = false;
        CKEDITOR.dtd['a']['p'] = true;

		return self;
	}

	return init();
}
