<!DOCTYPE html>
<!-- Bootstrap CSS (Only include if not already added in your layout) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Modal -->
<div class="modal fade" id="noticeModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4">

            <div class="modal-header bg-primary text-white rounded-top-4">
                <h5 class="modal-title">
                    📢 Important Announcement
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center py-4">
                <h4 class="mb-3">Welcome to Our Website!</h4>
                <p class="text-muted">
                    We are currently upgrading some features to serve you better.
                    Everything is working normally. Thank you for your support!
                </p>
            </div>

            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-primary px-4" data-bs-dismiss="modal">
                    Continue to Site
                </button>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap JS (Only include if not already added) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        var noticeModal = new bootstrap.Modal(document.getElementById('noticeModal'));
        noticeModal.show();
    });
</script>