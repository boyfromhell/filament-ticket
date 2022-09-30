<section id="comments">


    <form wire:submit.prevent="create">
        {{ $this->form }}

        <button class="filament-button inline-flex items-center justify-center 
        py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none 
        focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm
         text-white shadow focus:ring-white border-transparent bg-primary-600
          hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700
           filament-page-button-action" 
           type="submit">
            Submit
        </button>
    </form>

    <div class="p-4"></div>
    @foreach($comments as $comment)
    <div class="p-4">
        <livewire:filament-ticket::comment :comment="$comment" :key="$comment->id" />
    </div>
    @endforeach
    </div>
</section>