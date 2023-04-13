@extends('layouts.admin.app', ['body_class' => '', 'title' => 'Gallery'])
@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <h1>Gallery</h1>
                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="col-12 col-xl-12 drop-area-container mb-4">
                    <div class="card drop-area">
                        <div class="card-body">
                            <h4>Add New Images</h4>
                            <form action="{{ route('admin.gallery.upload') }}" enctype="multipart/form-data">
                                <div class="dropzone dz-clickable">
                                    <div class="dz-default dz-message"><span>Drop files here to upload</span></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <livewire:admin.gallery.gallery-listing />
            </div>
        </div>
    </div>
@endsection

@push('header')
    <link rel="stylesheet" href="{{ getAdminAsset('css/vendor/dropzone.min.css') }}" />
    <style>
        .listing-card-container img {
            height: 200px;
            width: 100%;
            object-fit: cover;
        }

        .list .card.active {
            box-shadow: 0 0px 7px 0px rgb(255 0 0) !important;
        }

        .chechbox:checked+label {
            box-shadow: 0 0 5px 3px #f00;
        }
    </style>
@endpush

@push('footer')
<script src="{{ getAdminAsset('js/vendor/dropzone.min.js') }}"></script>
<script>
    if (jQuery().dropzone && !jQuery(".dropzone").hasClass("disabled")) {
            jQuery(".dropzone").dropzone({
                url: "{{ route('admin.gallery.upload') }}",
                method: 'POST',
                maxFilesize: 2,
                paramName: "file",
                renameFile: function(file) {
                    var dt = new Date();
                    var time = dt.getTime();
                    return time + file.name;
                },
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
                init: function() {
                    this.on("success", function(file, responseText) {
                        console.log(responseText);
                    });
                },
                sending: function(file, xhr, formData) {
                    formData.append("_token", "{{ csrf_token() }}");
                },
                queuecomplete: function(file) {
                    Livewire.emit('uploadCompleted')
                },
                thumbnailWidth: 160,
                previewTemplate: '<div class="dz-preview dz-file-preview mb-3"><div class="d-flex flex-row "><div class="p-0 w-30 position-relative"><div class="dz-error-mark"><span><i></i></span></div><div class="dz-success-mark"><span><i></i></span></div><div class="preview-container"><img data-dz-thumbnail class="img-thumbnail border-0" /><i class="simple-icon-doc preview-icon" ></i></div></div><div class="pl-3 pt-2 pr-2 pb-1 w-70 dz-details position-relative"><div><span data-dz-name></span></div><div class="text-primary text-extra-small" data-dz-size /><div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div><div class="dz-error-message"><span data-dz-errormessage></span></div></div></div></div>'
            });
        }
</script>
@endpush
