<?php if(!isset($noticeDisplayed)): ?>
<?php $noticeDisplayed = true; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="alert alert-info alert-dismissible fade show text-center mb-0 rounded-0" role="alert">
    <strong>📢 Important Notice:</strong>
    We are currently upgrading some features. 
    You may experience minor delays. Thank you for your support!
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<?php endif; ?>