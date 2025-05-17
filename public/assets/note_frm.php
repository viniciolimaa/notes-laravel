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

            <!-- label and cancel -->
            <div class="row">
                <div class="col">
                    <p class="display-6 mb-0">NEW NOTE</p>
                </div>
                <div class="col text-end">
                    <a href="#" class="btn btn-outline-danger">
                        <i class="fa-solid fa-xmark"></i>
                    </a>            
                </div>
            </div>

            <!-- form -->
            <form action="#" method="post">
                <div class="row mt-3">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Note Title</label>
                            <input type="text" class="form-control bg-primary text-white" name="text_title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Note Text</label>
                            <textarea class="form-control bg-primary text-white" name="text_note" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col text-end">
                        <a href="#" class="btn btn-primary px-5"><i class="fa-solid fa-ban me-2"></i>Cancel</a>
                        <button type="submit" class="btn btn-secondary px-5"><i class="fa-regular fa-circle-check me-2"></i>Save</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
</div>

<?php require_once('_html_footer.php') ?>