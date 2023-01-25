@foreach (session('flash_notification', collect())->toArray() as $message)
    @if ($message['overlay'])
        @include('flash::modal', [
            'modalClass' => 'flash-modal',
            'title'      => $message['title'],
            'body'       => $message['message']
        ])
    @else
{{--        <div class="row toast position-fixed bottom-0 start-0 my-3 mx-3">--}}
                    <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="toast-header">
                            <strong class="me-auto">Message</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                        <div class="toast-body">
                            {{ $message['message'] }}
                        </div>
                    </div>
{{--        </div>--}}
    @endif
@endforeach

{{ session()->forget('flash_notification') }}
