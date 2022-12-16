<div>
    <hr>
    <h3>Seo Section</h3>
    <div class="form-group">
        <label for="exampleInputEmail1">SEO Title</label>
        <input name="" class="form-control" wire:model="seotitle" />
        @error('seotitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Title</label>
        <input name="" class="form-control" wire:model="ogtitle" />
        @error('ogtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Title</label>
        <input name="" class="form-control" wire:model="twtitle" />
        @error('twtitle')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">SEO Description</label>
        <textarea wire:model="seodescription" name="" id="" cols="30" rows="3" class="form-control"></textarea>
        @error('seodescription')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">OG Description</label>
        <textarea wire:model="og_description" name="" id="" cols="30" rows="3" class="form-control"></textarea>
        @error('og_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Twitter Description</label>
        <textarea wire:model="twitter_description" name="" id="" cols="30" rows="3" class="form-control"></textarea>
        @error('twitter_description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>
