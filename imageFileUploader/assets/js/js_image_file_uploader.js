/**
 * prototype of uploader
 *
 * @params (JSON) o, {$el}
 */
var _uploader = function(o){

    /**
     * prototype of progress
     */
    var _progressBar = function(option){

        var self = this,
            $el = option.$el,
            $bar = $el.find('.bar');

        // initialize
        var init = function(){
            return self;
        }

        /**
         * toggle progress bar
         *
         * @params (bool) bool(optional)
         */
        self.toggle = function(bool){
            if (bool=='undefined')
                $el.toggle();
            else
                $el.toggle(bool);
            return this;
        }

        /**
         * set value for bar
         *
         * @params (int) percent
         */
        self.setValue = function(percent){
            $bar.css('width', percent+'%');
            return this;
        }

        /**
         * set filename
         *
         * @params (string) filename
         */
        self.setFilename = function(filename){
            $bar.html(filename);
            return this;
        }

        return init();
    }

    var self = this,
        $el = o.$el,
        $fu = $el.find('input:file'),
        uploadUrl = $fu.attr('data-uploadUrl');

    // initialize
    var init = function(){
        if (o.isMultiple)
            $fu.attr('multiple', 'multiple');

        $el.find('.btn-select').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            $el.find('input:file').click();
        });

        self.progress = new _progressBar({$el: $el.find('.progress-box')});

        self.xhr = $fu.fileupload({
            url: uploadUrl,
            dataType: 'json',
            add: function (e, data) {
                self.progress.setFilename(data.files[0].name)
                             .toggle(true);
                data.submit();
            },
            change: function(e, data){
                self.progress.setFilename('');
            },
            done: function (e, data) {
                console.log(data);
                if (data.result.code==200){
                    if (o.afterUpload)
                        o.afterUpload(data.result, self);
                    else
                        alert('上傳完成!');
                }else
                    alert('上傳錯誤，請再試一次!');
            },
            error: function () {

                alert('失敗！您可能沒有權限');  // 20160601 API response string if 403
            },
            progressall: function (e, data) {
                var progress = parseInt(data.loaded / data.total * 100, 10);
                self.progress.setValue(progress);
                if (progress>=100)
                    self.progress.toggle(false);
            }
        });

        return self;
    }

    /**
     * hide uploader
     */
    self.hide = function(){
        $el.hide();
    }

    /**
     * display uploader
     */
    self.show = function(){
        $el.show();
    }

    return init();
}

/**
 * prototype of image uploader
 * @params (object) o, {
        (string) el,
        (bool) isMultiple
        (object) imageBoxMeta: {
            photoFieldName,
            descFieldName(optional),
            delFieldName
        },
        (array) files
    }
 */
var _imageFileUploader = function(o){
    var self = this,
        $el = $(o.el),
        $photoList = $el.find('.photo-list'),
        $delPhotoList = $el.find('.delete-photo-list'),
        deleteURL = $photoList.attr('data-deleteURL'),
        files = o.files;

    self.files = [];
    self.isMultiple = o.isMultiple;

    // initialize
    var init = function(){
        $photoList.on('click', '.btn-remove', function(e){
            e.preventDefault();
            e.stopPropagation();
            onClick_remove(e);
        });

        self.uploader = new _uploader({
            $el: $el.find('.uploader'),
            isMultiple: o.isMultiple,
            afterUpload: function(res, parent){
                if (res.code=='200'){
                    if (!o.isMultiple)
                        parent.hide();

                    addImageBox(res.object);
                    return ;
                }

                alert(res.message);
            }
        });

        if (typeof(files)=='object') {
            var len = files.length,
                i = 0;
            for(; i<len; i++)
                addImageBox(files[i]);
        }

        return self;
    }

    /**
     * delete image box
     * @params (event) e
     */
    var onClick_remove = function(e){
        var $parent = $(e.currentTarget).parent(),
            path = $parent.find('.photoField').val();

        $.ajax({
            url: deleteURL,
            type: 'post',
            data: {path: path},
            dataType: 'json',
            success: function(res, s, xhr){
                if (res.code==200 || res.code==402){
                    $parent.remove();
                    afterRemoveImage(path);
                }else
                    alert(res.message);
            },
            error: function(){
                alert('刪除錯誤 [404]');
            }
        });

    }

    self.validate = function(){
        return (self.files.length==0) ? false : true;
    }

    /**
     * add an image box
     * @param (string) image,
     */
    var addImageBox = function(image){
        if (typeof(image)=='undefined')
            return false;

        var html = '<li>' +
                   '<span class="btn-remove" title="刪除圖片"><i class="fa fa-trash-o"></i></span>' +
                   '<img src="" class="thumbnail" />' +
                   '<input class="photoField" type="hidden" value="' + image.path + '" name="' + o.imageBoxMeta.photoFieldName + '" />' +
                   '</li>';

        (function(obj, $container, el, image){
            var img = new Image(),
                $el = $(el);

            img.onload = function() {
                $el.find('img').attr('src', this.src);
                $photoList.append($el);

                obj.files.push(image);

                if (self.validate() && !self.isMultiple)
                    self.uploader.hide();
            }

            img.src = image.path + '?w=100&v=' + (new Date()).getTime();

        })(self, $photoList, html, image);
    }

    /**
     * after remove image
     * @params (string) path
     * @return (bool) bool
     */
    var afterRemoveImage = function(path){
        if (typeof(path)=='undefined')
            return false;

        var len = self.files.length,
            i = 0,
            list = [];

        for(i; i<len; i++){
            if (self.files[i].path!=path)
                list.push(self.files[i]);
        }
        self.files = list;

        if (!self.validate())
            self.uploader.show();

        return true;
    }

    return init();
}
