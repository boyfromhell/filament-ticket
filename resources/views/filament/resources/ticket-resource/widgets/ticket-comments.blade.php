<x-filament::widget>
    <x-filament::card>
        <form wire:submit.prevent="submit">
            {{ $this->form }}

            <div class="my-6">
                <button class="filament-button inline-flex items-center justify-center
                py-1 gap-1 font-medium rounded-lg border transition-colors focus:outline-none
                focus:ring-offset-2 focus:ring-2 focus:ring-inset min-h-[2.25rem] px-4 text-sm
                text-white shadow focus:ring-white border-transparent bg-primary-600
                hover:bg-primary-500 focus:bg-primary-700 focus:ring-offset-primary-700
                filament-page-button-action" type="submit">
                    Submit
                </button>
            </div>
        </form>

        @foreach($record->comments as $comment)

        <div class="p-4 bg-gray-200 rounded shadow-md" id="{{ $comment->id}}">


            <div class="">
                <div class="pt-2">
                    <span class="">
                        Created by: {{ $comment->user->username }} at {{ $comment->created_at }}
                    </span>
                </div>
                <div class="flex-grow">
                    <div>

                        {!! Str::markdown($comment->comment_text) !!}

                    </div>
                </div>
            </div>
        </div>

        @endforeach

    </x-filament::card>
</x-filament::widget>