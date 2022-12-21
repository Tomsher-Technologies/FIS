<div class="col-12 col-xl-12 ">
    <div class="card mb-3">
        <div class="card-body">

            <div class="row">
                @if ($images)
                    @foreach ($images as $key => $image)
                        <div class="col-12 col-lg-2 mb-5">
                            <div class="card flex-column rounded-sm listing-card-container ">
                                <form wire:submit.prevent="saveImage">
                                    <div class="rounded-sm position-relative">
                                        <input class="chechbox d-none" type="checkbox"
                                            wire:model="imageIds.{{ $image->id }}"
                                            id='imageBox.{{ $image->id }}' />
                                        <label for="imageBox.{{ $image->id }}" class="mb-0 rounded-sm">
                                            <img class="rounded-sm" src="{{ URL::to($image->image) }}">
                                        </label>
                                        <input class="form-control" type="hidden"
                                            wire:model="images.{{ $key }}.id" />
                                        <input class="form-control" type="text"
                                            wire:model="images.{{ $key }}.image_alt" />
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="col-6">
                    <p class="mb-0">
                        <b>Note:</b> Click on image to select and the press delete button to delete selected images
                    </p>
                </div>
                <div class="col-6">
                    <button wire:click="save" type="submit" class="btn btn-sm btn-danger float-right">Delete</button>
                </div>
            </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
