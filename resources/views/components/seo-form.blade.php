
@php
    $disabled = "";
    if( $isedit == 'true' ){
        $disabled = 'disabled';
    }

@endphp
<div class="card mb-4">
    <div class="card-body">
        <h2>Seo</h2>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Title</label>
            <input class="form-control" type="text" {{ $disabled }} name="seo_title"
                value="{{ $model != '' ? old('seo_title', $model->seo->title) : old('seo_title') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Description</label>
            <input class="form-control" type="text" {{ $disabled }} name="seo_description"
                value="{{ $model != '' ? old('seo_description', $model->seo->description) : old('seo_description') }}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">SEO Keywords</label>
            <p class="mb-1">
                Comma separated keywords
            </p>
            <input class="form-control" type="text" {{ $disabled }} name="seo_keyword"
                value="{{ $model != '' ? old('seo_keyword', $model->seo->keywords) : old('seo_keyword') }}">
        </div>
    </div>
</div>
