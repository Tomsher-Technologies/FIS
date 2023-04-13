<script src="{{ getAdminAsset('tinymce/tinymce.min.js') }}"></script>
<script>
    tinymceztinymce = tinymce.init({
        selector: "{{ $node }}",
        // plugins: [
        //     'image'
        // ],
        forced_root_block: false,
        // automatic_uploads: false,
        // file_picker_types: 'image',
        // images_file_types: 'jpeg,jpg,jpe,jfi,jif,jfif,png,gif,bmp,webp',
        // images_upload_url: "{{ route('tinyimage') }}",
        // image_class_list: [{
        //     title: 'Class',
        //     value: 'tinyimg'
        // }],
        // file_picker_callback: function(cb, value, meta) {
        //     var input = document.createElement('input');
        //     input.setAttribute('type', 'file');
        //     input.setAttribute('accept', 'image/*');
        //     input.onchange = function() {
        //         var file = this.files[0];

        //         var reader = new FileReader();
        //         reader.readAsDataURL(file);
        //         reader.onload = function() {
        //             var id = 'blobid' + (new Date()).getTime();
        //             var blobCache = tinymce.activeEditor.editorUpload.blobCache;
        //             var base64 = reader.result.split(',')[1];
        //             var blobInfo = blobCache.create(id, file, base64);
        //             blobCache.add(blobInfo);
        //             cb(blobInfo.blobUri(), {
        //                 title: file.name
        //             });
        //         };
        //     };
        //     input.click();
        // },
        setup: function(editor) {
            editor.on('init change', function() {
                editor.save();
            });
            editor.on('change', function(e) {
                @this.set("{{ $dataObj }}", editor.getContent());
            });
            editor.on("keydown", function(e) {
                if ((e.keyCode == 8 || e.keyCode == 46) && tinymce.activeEditor.selection) {
                    var selectedNode = tinymce.activeEditor.selection.getNode();
                    if (selectedNode && selectedNode.nodeName == 'IMG') {
                        var imageSrc = selectedNode.src;
                        var token = "{{ csrf_token() }}"
                        $.ajax({
                            url: "{{ route('tinyimage.delete') }}",
                            type: 'DELETE',
                            dataType: 'json',
                            data: {
                                "image": imageSrc,
                                "_token": token,
                            },
                            success: function(data) {
                                console.log(data);
                            }
                        });
                    }
                }
            });
        }
    });
</script>
