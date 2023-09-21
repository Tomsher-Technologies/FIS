<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Site Settings</h1>
            <div class="separator mb-5"></div>
        </div>
    </div>
    <div class="row">
        <div class="col-8 offset-2">
            <div class="card mb-4">
                <div class="card-body">
                    <form wire:submit.prevent="saveDetails">
                        <h2>General setting</h2>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3" wire:model='address.value'></textarea>
                            @error('address.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input class="form-control" type="email" wire:model='email.value'>
                            @error('email.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number <span class="text-info">(To add multiple numbers, enter the number with '/' symbol)</span></label>
                            <input class="form-control" type="text" wire:model='phone.value'>
                            @error('phone.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Working Time</label>
                            <input class="form-control" type="text" wire:model='working_time.value'>
                            @error('working_time.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Header About Content</label>
                            <input class="form-control" type="text" wire:model='about_content.value'>
                            @error('about_content.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Footer Content</label>
                            <input class="form-control" type="text" wire:model='footer_content.value'>
                            @error('footer_content.value')
                                <span class="error">{{ $message }}</span>
                            @enderror
                        </div>
                    

                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <form wire:submit.prevent="saveDetails">
                        <h2>General setting</h2>
                        @foreach ($socialLinks as $key => $link)
                            <div class="form-group">
                                <label for="exampleInputEmail1">{{ $link->text }}</label>
                                <input class="form-control" type="text"
                                    wire:model='socialLinks.{{ $key }}.value'>
                                @error('socialLinks.{{ $link->id }}.value')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary mb-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
