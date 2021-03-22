                <form method="post">
                    <div class="row mb-32pt">
                        <div class="col-lg-4">
                            <div class="page-separator">
                                <div class="page-separator__text">Data Group</div>
                            </div>
                            <p class="card-subtitle text-70 mb-16pt mb-lg-0">
                                You can edit Subject Information to add Subejct.</br><a href="<?=site_url("admin/subject")?>" style="font-weight: bold;">Show Subject Table</a>
                            </p>
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="flex" style="max-width: 100%">
                                <div class="form-group">
                                    <label class="form-label">Subject</label>
                                    <input type="text" class="form-control required" id="name" name="name" placeholder="ex: Biology">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Subject ID</label>
                                    <input type="text" class="form-control required" id="code" name="code" placeholder="Only Number">
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="custom-select">Validate</label>
                                    <div class="custom-controls-stacked" style="padding: 8px 4px;">
                                        <div class="custom-control custom-radio" style="display: inline-block;">
                                            <input id="radioStacked1" name="radio-stacked" type="radio" class="custom-control-input" value="1" checked>
                                            <label for="radioStacked1" class="custom-control-label">Yes</label>
                                        </div>
                                        <div class="custom-control custom-radio" style="display: inline-block; margin-left: 13px;">
                                            <input id="radioStacked2" name="radio-stacked" type="radio" class="custom-control-input" value="0">
                                            <label for="radioStacked2" class="custom-control-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-32pt">
                            <div class="flex" style="max-width: 100%; position: absolute; right: 24px;">
                                <div class="button-list">
                                    <a>
                                        <button class="btn btn-primary create">
                                            <i class="material-icons icon--left">create</i> CREATE
                                        </button>
                                    </a>
                                    <a href="<?=site_url("admin/subject")?>">
                                        <button type="button" class="btn btn-accent">
                                            <i class="material-icons icon--left">keyboard_backspace</i> BACK
                                        </button>
                                    </a>
                                </div>
                            </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- // END Header Layout Content -->

        <script>
            $(document).ready(function() {
                $('.create').click(function() {
                    createProblem(this);
                });
            });

            createProblem = function(el) {
                var btn = $(el);
                var form = $(el).closest('form');
                console.log(form.serializeArray());
                form.validate({
                    errorClass: 'error text-danger',
                    submitHandler: function() {
                        btn.attr('disabled', true);
                        $.ajax({
                            type: 'POST',
                            dataType: 'text',
                            data: {
                                params: form.serializeArray(),
                            },
                            url: '<?=site_url('admin/createsubject')?>',
                            success: function(data)
                            {
                                swal({
                                    title: "",
                                    text: "Created New Subject"
                                }).then(function() {
                                    location.href = "<?=site_url('admin/subject')?>";
                                });
                                btn.attr('disabled', false);
                            }
                        });
                    }
                });
            }
        </script>