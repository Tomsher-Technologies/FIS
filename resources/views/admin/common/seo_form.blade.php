<div>
    <hr>
    <h3>Seo Section</h3>
    <div class="form-group">
        <label for="exampleInputEmail1">SEO Title</label>
        <input name="seotitle" id="seotitle" class="form-control" />
        @error('seotitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Title</label>
        <input name="ogtitle" id="ogtitle" class="form-control"/>
        @error('ogtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Title</label>
        <input name="twtitle" id="twtitle" class="form-control" />
        @error('twtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">SEO Description</label>
        <textarea  name="seodescription" id="seodescription" cols="30" rows="3" class="form-control"></textarea>
        @error('seodescription')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Description</label>
        <textarea name="og_description" id="og_description" cols="30" rows="3" class="form-control"></textarea>
        @error('og_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Description</label>
        <textarea name="twitter_description" id="twitter_description" cols="30" rows="3"
            class="form-control"></textarea>
        @error('twitter_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Keywords</label>
        <input name="seokeywords" id="seokeywords" class="form-control"/>
        @error('seokeywords')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

</div>
