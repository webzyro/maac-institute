<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAAC | Thank You! Page</title>
    <meta name="robots" content="noindex, nofollow">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .thank-you-card {
            max-width: 500px;
            margin: 100px auto;
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .thank-you-card h1 {
            color: #28a745;
        }

        .home-btn {
            background-color: #28a745;
            color: #fff;
        }

        .home-btn:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card text-center thank-you-card p-4">
            <div class="card-body">
                <h1 class="mb-3"><i class="fas fa-check-circle"></i> Thank You,
                    <?= htmlspecialchars($_GET['name'] ?? 'Guest') ?>!
                </h1>
                <p class="mb-4">Your message has been received successfully. We will get back to you soon!</p>
                <a href="/" class="btn home-btn">Home</a>
                <a href="tel:+917321086333" class="btn home-btn">Call Us Now!</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>