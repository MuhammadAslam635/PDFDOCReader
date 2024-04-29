<div>
    <div class="grid grid-cols-1">
        <form wire:submit.prevent="readPdf" enctype="multipart/form-data">
            <input type="file" class="w-full border-green-500 px-2" name="file" wire:model="file" />
            <button type="submit" class="py-2 px-3 bg-amber-500">Upload</button>
        </form>
        @if($text)
            <p>{!! nl2br($text)!!}</p>
            @endif
    </div>
</div>
