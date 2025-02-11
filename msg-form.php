<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="descriptionForm">
        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>
        <button type="submit">Submit</button>
    </form>
    <div id="response"></div>

    <script>
        $(document).ready(function(){
            $('#descriptionForm').submit(function(e){
                e.preventDefault(); // Prevent default form submission
                let data = $(this).serialize();
                // console.log(data);
                
                $.ajax({
                    url: 'submit.php', // Change this to your backend endpoint
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#response').html('<p>' + response + '</p>');
                    },
                    error: function() {
                        $('#response').html('<p style="color:red;">Error submitting the form</p>');
                    }
                });
            });
        });
    </script>
</body>
</html>
