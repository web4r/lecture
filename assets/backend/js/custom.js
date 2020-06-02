Dropzone.options.myAwesomeDropzone = {
    maxFilesize: 8,
    accept: function(file, done) {
        console.log("uploaded");
        done();
    },
    init: function() {
        this.on("addedfile", function() {
            if (this.files[1] != null) {
                this.removeFile(this.files[0]);
            }
        });
    }
};