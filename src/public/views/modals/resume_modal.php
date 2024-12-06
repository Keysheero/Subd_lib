<?php ?>
<link rel="stylesheet" href="/css/modals/resume_modal.css">
<div id="resumeModal" class="resume-modal">
    <div class="resume-modal-content">
        <span class="resumeClose" id="resume-closeModal">&times;</span>
        <h2>Create Your Resume</h2>
        <form id="resumeForm" method="POST">
            <label for="title">Resume Title:</label>
            <input type="text" id="title" name="title" required placeholder="Enter title of your resume">

            <label for="description">Resume Description:</label>
            <textarea id="description" name="description" required placeholder="Enter a brief description of your resume"></textarea>
            <input type="hidden" id="userId" name="user_id" value=<?php echo $_SESSION['user_id']?> >
            <button type="submit" class="cta">Submit Resume</button>
        </form>
    </div>
</div>
<script src="/js/resume_modal.js"></script>