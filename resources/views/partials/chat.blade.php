<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/global.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/chat-module.css')}}"/>
</head>
<body>

<div class="card chat">
    <div class="card-body">
        <div class="card-header chat-header">
            Chat
        </div>
        <div class="message-box">
            @foreach($messages->reverse() as $message)
                <div class="message">
                    <div class="username">
                        <strong>
                            @if (Auth::user())
                                <a target="_blank" href="{{route('home.profile', ['id' => $message->user->id])}}">
                                    {{ $message->user->name }}:
                                </a>
                            @else
                                <a target="_parent" href="{{route('login')}}">
                                    {{ $message->user->name }}:
                                </a>
                            @endif
                        </strong>
                    </div>
                    <div class="user-message">
                        {{ $message->message }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="card-footer chat-send">
        <div class="input-group">
            <input type="text" id="message-input" class="form-control" placeholder="Type your message...">
            <button id="send-button" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send"
                     viewBox="0 0 16 16">
                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                </svg>
            </button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        // Function to send a message and scroll to the bottom
        function sendMessage() {

            @if (!Auth::user())
            return;
            @endif

            const message = $('#message-input').val();
            if (message.trim() === '') return;

            const messageElement = `
                <div class="message sent">
                    <div class="username">
                        <strong>{{Auth::user() ? Auth::user()->name : 'guest'}}:</strong>
                    </div>
                    <div class="user-message">
                        ${message}
                    </div>
                </div>`;
            $('.message-box').append(messageElement);
            $('#message-input').val('');

            // Scroll to the bottom of the message box
            $('.message-box').scrollTop($('.message-box')[0].scrollHeight);

            // Send the message to the server
            $.ajax({
                url: '/partials/chat',
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    message: message
                },
                success: function (data) {
                    console.log(data);
                },
                error: function (error) {
                    console.error(error);
                }
            });
        }

        // Event listener for the send button
        $('#send-button').click(function () {
            sendMessage();
        });

        // Event listener for pressing Enter in the input field
        $('#message-input').keypress(function (event) {
            if (event.which === 13) {
                event.preventDefault();
                sendMessage();
            }
        });
    });
</script>
</body>
</html>
