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