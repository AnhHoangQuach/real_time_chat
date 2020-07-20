<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js" 
    integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<body>
    <div id="wrapper">
    <h1>Welcome <?php session_start(); echo $_SESSION['username']; ?> to my website</h1>
        <div class="chat_wrapper">
            <div id="chat"></div>
            <form action="POST" id="messageForm">
                <textarea name="message" id="" cols="30" rows="5" class="textarea"></textarea>
            </form>
        </div>
    </div>
    <script>
        setInterval(() => {
            LoadChat();
        }, 1000);
        function LoadChat() {
            $.post('handlers/messages.php?action=getMessages', function(response) {
                var scrollpos = $('#chat').scrollTop();
                var scrollpos = parseInt(scrollpos) + 520;
                var scrollHeight = $('#chat').prop('scrollHeight');
                $('#chat').html(response);

                if(scrollpos < scrollHeight) {
            
                } else {
                    $('#chat').scrollTop($('#chat').prop('scrollHeight'));
                }
            });
        }
        $('.textarea').keyup(function(e) {
            var code = e.keyCode || e.which;
            if(code == 13) {
                $('form').submit();
            }
        });
        $('form').submit(function() {
            var message = $('.textarea').val();
            $.post('handlers/messages.php?action=sendMessage&message=' + message, function(response) {
                if(response == 1) {
                    LoadChat();
                    document.getElementById('messageForm').reset();
                }
            });
            return false;
        });
    </script>
</body>
</html>