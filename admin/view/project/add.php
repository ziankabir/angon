<?php
include '../../../config/config.php';
$project_id = '';
$project_title = '';
$project_status = '';
$project_image = '';
$project_created_on = date('Y-m-d H:i:s');
$project_created_by = getSession('admin_id');

if (isset($_POST['project_title'])) {
    extract($_POST);

    $project_title = validateInput($project_title);
    $project_status = validateInput($project_status);

    $sql_check = "SELECT * FROM project WHERE project_title = '$project_title'";
    $result_check = mysqli_query($con, $sql_check);
    $count = mysqli_num_rows($result_check);
    if ($count > 0) {
        $error = "Project already exists in record";
    } else {
        if ($_FILES["project_image"]["tmp_name"] != '') {

            $project_image = basename($_FILES['project_image']['name']);
            $infoPath = pathinfo($project_image, PATHINFO_EXTENSION);
            $rename_image = 'PIMG_' . date("YmdHis") . '.' . $infoPath;

            if (!is_dir($config['IMAGE_UPLOAD_PATH'] . '/project_image/')) {
                mkdir($config['IMAGE_UPLOAD_PATH'] . '/project_image/', 0777, TRUE);
            }
            $image_target_path = $config['IMAGE_UPLOAD_PATH'] . '/project_image/' . $rename_image;

            $zebra = new Zebra_Image();
            $zebra->source_path = $_FILES["project_image"]["tmp_name"];
            $zebra->target_path = $config['IMAGE_UPLOAD_PATH'] . '/project_image/' . $rename_image;

            if (!$zebra->resize(600)) {
                zebraImageErrorHandaling($zebra->error);
            }
        }

        $custom_array = '';
        $custom_array .= 'project_title = "' . $project_title . '"';
        $custom_array .= ',project_image = "' . $rename_image . '"';
        $custom_array .= ',project_status = "' . $project_status . '"';
        $custom_array .= ',project_created_on = "' . $project_created_on . '"';
        $custom_array .= ',project_created_by = "' . $project_created_by . '"';

        $sql = "INSERT INTO project SET $custom_array";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $success = 'Project information saved successfully';
            $link = "list.php?success=" . base64_encode($success);
            redirect($link);
        } else {
            if (DEBUG) {
                $error = 'result query failed for ' . mysqli_error($con);
            } else {
                $error = 'Something went wrong';
            }
        }
    }
}
?>

<html>
    <head>
        <?php include basePath('admin/header_script.php'); ?>
        <style>
            .example-modal .modal {
                position: relative;
                top: auto;
                bottom: auto;
                right: auto;
                left: auto;
                display: block;
                z-index: 1;
            }
            .example-modal .modal {
                background: transparent!important;
            }
        </style>
    </head>
    <body class="skin-blue">
        <div class="wrprojectper">
            <?php include basePath('admin/header.php'); ?>

            <aside class="main-sidebar">
                <?php include basePath('admin/site_menu.php'); ?>
            </aside>
            <div class="content-wrprojectper">
                <section class="content-header">
                    <h1>Add Project</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-lprojecttop"></i>&nbsp;General Settings</li>
                        <li class="active">Add Project</li>
                    </ol>
                </section>
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="example-modal">
                                    <div class="modal">
                                        <div class="modal-dialog">
                                            <?php include basePath('admin/message.php'); ?>
                                            <div class="modal-content">
                                                <form method="POST" id="projectForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="project_title">Project Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" id="project_title" name="project_title" value="<?php echo $project_title; ?>" required="required" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="project_image">Project Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="file" name="project_image" id="project_image" />
                                                        </div>
                                                        <div id="showDiv" style="display: none;">
                                                            <img src="../../../upload/default.png" id="show_image" style="height: 30%; width: 50%;" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="project_status">Project Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                            <select id="project_status" name="project_status" class="form-control" required="required" />
                                                            <option value="0">Select Status</option>
                                                            <option value="Active"
                                                            <?php
                                                            if ($project_status == 'Active') {
                                                                echo "selected";
                                                            }
                                                            ?>>Active
                                                            </option>
                                                            <option value="Inactive"<?php
                                                            if ($project_status == 'Inactive') {
                                                                echo "selected";
                                                            }
                                                            ?>>Inactive
                                                            </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <p id="errorShow" style="display: none;background-color: #ea2e49;color: white; padding: 4px 4px 2px 4px;font-size: 12px;position: relative;">
                                                                Please fill up required (*) fields
                                                            </p>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" id="btnSave" name="btnSave" class="btn btn-primary"><i class="fa fa-check-circle"></i> Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include basePath('admin/footer.php'); ?>
        </div>
        <script type="text/javascript">
            $("#projectActive").addClass("active");
            $("#projectActive").parent().parent().addClass("treeview active");
            $("#projectActive").parent().addClass("in");
        </script>
        <?php include basePath('admin/footer_script.php'); ?>
        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#show_image').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#project_image").change(function () {
                $("#showDiv").show();
                readURL(this);
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#btnSave").click(function () {

                    var project_title = $("#project_title").val();
                    var project_image = $('input[type="file"]').val();
                    var project_status = $("#project_status option:selected").val();
                    var status = 0;
                    if (project_title == '') {
                        status++;
                        $("#errorShow").show();
                        $("#project_title").css({
                            "border": "1px solid red"
                        });
                    }
                    if (project_image == '') {
                        status++;
                        $("#errorShow").show();
                        $("#project_image").css({
                            "border": "1px solid red"
                        });
                    }
                    if (project_status == '0') {
                        status++;
                        $("#errorShow").show();
                        $("#project_status").css({
                            "border": "1px solid red"
                        });
                    }
                    if (status == 0) {
                        $("#errorShow").hide();
                        $("#projectForm").submit();
                    }
                });
            });
        </script>
    </body>
</html>