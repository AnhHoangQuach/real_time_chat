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
    <h1>Welcome to my website</h1>
        <div class="chat_wrapper">
            <div id="chat"></div>
            <form action="POST">
                <textarea name="message" id="" cols="30" rows="5" class="textarea"></textarea>
            </form>
        </div>
    </div>
    <script>
        $('.textarea').keyup(function(e) {
            if(e.which == 13 || e.keyCode == 13) {
                $('form').submit();
            }
        });
        $('form').submit(function()) {
            alert('form is submmitted using jquery');
            return false;
        }
    </script>
</body>
</html>