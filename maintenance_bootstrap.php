<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Maintenance</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            height: 100vh;
        }
    </style>
</head>
<body>

<!-- Modal -->
<div class="modal fade show" id="maintenanceModal" tabindex="-1" style="display:block;" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4">

            <div class="modal-header bg-warning text-dark rounded-top-4">
                <h5 class="modal-title">
                    🚧 Site Under Maintenance
                </h5>
            </div>

            <div class="modal-body text-center py-4">
                <h4 class="mb-3">We’ll Be Back Soon!</h4>
                <p class="text-muted">
                    Our website is currently undergoing scheduled maintenance.<br>
                    Thank you for your patience.
                </p>

                <div class="spinner-border text-warning mt-3" role="status"></div>
            </div>

            <div class="modal-footer justify-content-center">
                <small class="text-muted">
                    Please check back later.
                </small>
            </div>

        </div>
    </div>
</div>

</body>
</html>