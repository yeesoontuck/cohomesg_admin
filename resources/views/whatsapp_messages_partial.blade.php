@foreach ($messages as $message)
    @if ($message->direction == 'inbound')
        <div class="wa-inbound">
            <span class="font-semibold">{{ $user->wa_name }}</span>
            <div class="text-sm text-on-surface dark:text-on-surface-dark overflow-x-scroll">
                @if($message->media_path && str_starts_with($message->mime_type, 'image/'))
                <div class="mt-2">
                    <img src="{{ route('media.show', ['file' => $message->media_path]) }}" alt="Image" class="max-w-xs rounded-radius border border-gray-300" />
                </div>
                @elseif($message->media_path && str_starts_with($message->mime_type, 'audio/'))
                <audio controls>
                    <source src="{{ route('media.show', ['file' => $message->media_path]) }}" type="{{ $message->mime_type }}">
                    Your browser does not support the audio element.
                </audio>
                @else
                    {!! nl2br(e($message->message_content)) !!}
                @endif
            </div>
            <span class="ml-auto text-xs">{{ $message->timestamp->format('d-m-Y g:i a') }}</span>
        </div>
    @else
        <div class="wa-outbound">
            {!! nl2br(e($message->message_content)) !!}

            <span class="ml-auto text-xs">{{ $message->timestamp->format('d-m-Y g:i a') }}</span>
        </div>
    @endif
@endforeach
