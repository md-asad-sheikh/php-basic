<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message add & show</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

    <div class="container">
        <form id="descriptionForm">
            <div class="mb-3">
                <label for="description" class="form-label">Message details</label>
                <textarea class="form-control" id="description" name="description" required rows="3"></textarea>
            </div>

            <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>

        <div id="response"></div>
    </div>

    <hr>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
    </div>


</body>

</html>


<script>
    $(document).ready(function() {
        $('#descriptionForm').submit(function(e) {
            e.preventDefault(); // Prevent default form submission
            let data = $(this).serialize();
            // console.log(data);

            $.ajax({
                url: 'submit.php', // Change this to your backend endpoint
                type: 'POST',
                data: $(this).serialize(),
                success: function(response) {
                    $("#response").addClass("alert alert-info").attr("role", "alert").html(response);
                },
                error: function() {
                    $("#response").addClass("alert alert-danger").attr("role", "alert").html('Error submitting the form');
                }
            });
        });
    });
</script>