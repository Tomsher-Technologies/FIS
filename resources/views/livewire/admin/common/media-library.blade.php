<div x-data="fileUpload()">
    <div class="flex flex-col items-center justify-center h-screen bg-slate-200" x-on:drop="isDroppingFile=false"
        x-on:drop.prevent="handleFileDrop($event)" x-on:dragover.prevent="isDroppingFile=true"
        x-on:dragleave.prevent="isDroppingFile=false">
        <div class="absolute top-0 bottom-0 left-0 right-0 z-30 flex items-center justify-center bg-blue-500 opacity-90"
            x-show="isDropping">
            <span class="text-3xl text-white">Release file to upload!</span>
        </div>
        <label
            class="flex flex-col items-center justify-center w-1/2 bg-white border shadow cursor-pointer h-1/2 rounded-2xl hover:bg-slate-50"
            for="file-upload">
            <h3 class="text-3xl">Click here to select files to upload</h3>
            <em class="italic text-slate-400">(Or drag files to the page)</em>
            <div class="bg-gray-200 h-[2px] w-1/2 mt-3">
                <div class="bg-blue-500 h-[2px]" style="transition: width 1s" :style="`width: ${progress}%;`"
                    x-show="isUploading">
                </div>
            </div>
        </label>
        @if (count($files))
            <ul class="mt-5 list-disc">
                @foreach ($files as $file)
                    <li>
                        {{ $file->getClientOriginalName() }}
                        <button class="text-red-500" @click="removeUpload('{{ $file->getFilename() }}')">X</button>
                    </li>
                @endforeach
            </ul>
        @endif
        <input type="file" id="file-upload" multiple @change="handleFileSelect" class="hidden" />
    </div>
    <script>
        function fileUpload() {
            return {
                isDropping: false,
                isUploading: false,
                progress: 0,
                handleFileSelect(event) {
                    if (event.target.files.length) {
                        this.uploadFiles(event.target.files)
                    }
                },
                handleFileDrop(event) {
                    if (event.dataTransfer.files.length > 0) {
                        this.uploadFiles(event.dataTransfer.files)
                    }
                },
                uploadFiles(files) {
                    const $this = this;
                    this.isUploading = true
                    @this.uploadMultiple('files', files,
                        function(success) {
                            $this.isUploading = false
                            $this.progress = 0
                        },
                        function(error) {
                            console.log('error', error)
                        },
                        function(event) {
                            $this.progress = event.detail.progress
                        }
                    )
                },
                removeUpload(filename) {
                    @this.removeUpload('files', filename)
                },
            }
        }
    </script>
</div>
