<?php require_once('_html_header.php') ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col">

            <div class="row mb-3 align-items-center">
                <div class="col">
                    <img src="assets/images/logo.png" alt="Notes logo">
                </div>
                <div class="col text-center">
                    A simple <span class="text-warning">Laravel</span> project!
                </div>
                <div class="col">
                    <div class="d-flex justify-content-end align-items-center">
                        <span class="me-3"><i class="fa-solid fa-user-circle fa-lg text-secondary me-3"></i>[username]</span>
                        <a href="#" class="btn btn-outline-secondary px-3">
                            Logout<i class="fa-solid fa-arrow-right-from-bracket ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <hr>

            <!-- confirm delete -->
            <div class="col card p-5 text-center">
                <span class="display-3 mb-5"><i class="fa-solid fa-triangle-exclamation text-warning opacity-50"></i></span>
                <h4 class="text-info mb-3">[Note Title]</h4>
                <p class="text-secondary">Are you sure you want to delete this note?</p>
                <div class="mt-3">
                    <a href="#" class="btn btn-primary px-5 m-2"><i class="fa-solid fa-xmark me-2"></i>No</a>
                    <a href="#" class="btn btn-danger px-5 m-2"><i class="fa-solid fa-trash me-2"></i>Yes</a>
                </div>
            </div>
            
        </div>
    </div>
</div>

<?php require_once('_html_footer.php') ?>