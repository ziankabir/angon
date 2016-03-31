<?php
include '../../../config/config.php';
$banner_title = '';
$banner_status = '';
$banner_image = '';
$banner_updated_by = getSession('admin_id');
$banner_id = '';
if (isset($_GET['id'])) {
    $banner_id = $_GET['id'];
}
$sqlImage = "SELECT banner_image FROM banner WHERE banner_id= $banner_id";
$resultImage = mysqli_query($con, $sqlImage);
if ($resultImage) {
    while ($ImageObj = mysqli_fetch_object($resultImage)) {
        $banner_image = $ImageObj->banner_image;
    }
} else {
    if (DEBUG) {
        $error = "resultImage error: " . mysqli_error($con);
    } else {
        $error = "resultImage query failed.";
    }
}
if (isset($_POST['banner_title'])) {
    extract($_POST);

    $banner_title = validateInput($banner_title);
    $banner_status = validateInput($banner_status);

    // check banner priority and exist
    $sql_check = "SELECT * FROM banner WHERE banner_title='$banner_title' AND banner_id NOT IN (" . $banner_id . ")";
    $result_check = mysqli_query($con, $sql_check);
    $count = mysqli_num_rows($result_check);
    if ($count > 0) {
        $error = "Banner already exists in record";
    } else {
        if ($_FILES["banner_image"]["tmp_name"] != '') {

            $banner_image = basename($_FILES['banner_image']['name']);
            $infoPath = pathinfo($banner_image, PATHINFO_EXTENSION);
            $rename_image = 'PIMG_' . date("YmdHis") . '.' . $infoPath;

            if (!is_dir($config['IMAGE_UPLOAD_PATH'] . '/banner_image/')) {
                mkdir($config['IMAGE_UPLOAD_PATH'] . '/banner_image/', 0777, TRUE);
            }
            $image_target_path = $config['IMAGE_UPLOAD_PATH'] . '/banner_image/' . $rename_image;

            $zebra = new Zebra_Image();
            $zebra->source_path = $_FILES["banner_image"]["tmp_name"];
            $zebra->target_path = $config['IMAGE_UPLOAD_PATH'] . '/banner_image/' . $rename_image;

            if (!$zebra->resize(1100)) {
                zebraImageErrorHandaling($zebra->error);
            }
        }
        $custom_array = '';
        $custom_array .= 'banner_title = "' . $banner_title . '"';
        if ($_FILES["banner_image"]["tmp_name"] != '') {
            $custom_array .= ',banner_image = "' . $rename_image . '"';
        }
        $custom_array .= ',banner_status = "' . $banner_status . '"';
        $custom_array .= ',banner_updated_by = "' . $banner_updated_by . '"';

        $sql = "UPDATE banner SET $custom_array WHERE banner_id = $banner_id";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $success = 'Banner information updated successfully';
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
// getting banner data
$sqlData = "SELECT * FROM banner WHERE banner_id = $banner_id";
$resultData = mysqli_query($con, $sqlData);
if ($resultData) {
    $obj = mysqli_fetch_object($resultData);
    $banner_title = $obj->banner_title;
    $banner_status = $obj->banner_status;
} else {
    
}
?>
<!DOCTYPE html>
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
        <div class="wrapper">
            <?php include basePath('admin/header.php'); ?>

            <aside class="main-sidebar">
                <?php include basePath('admin/site_menu.php'); ?>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Edit Banner</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-laptop"></i>&nbsp;General Settings</li>
                        <li class="active">Edit Banner</li>
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
                                                <form method="POST" id="bannerForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <input type="hidden" id="banner_id" name="banner_id" value="<?php echo $banner_id; ?>" />
                                                        <div class="form-group">
                                                            <label for="banner_title">Banner Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" id="banner_title" name="banner_title" value="<?php echo $banner_title; ?>" required="required" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="banner_image">Banner Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="file" name="banner_image" id="banner_image" />
                                                        </div>
                                                        <div>
                                                            <img src="../../../upload/banner_image/<?php echo $banner_image; ?>" id="show_image" style="height: 100%; width: 100%;" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="banner_status">Banner Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                            <select id="banner_status" name="banner_status" class="form-control" required="required" />
                                                            <option value="0">Select Status</option>
                                                            <option value="Active"
                                                            <?php
                                                            if ($banner_status == 'Active') {
                                                                echo "selected";
                                                            }
                                                            ?>>Active
                                                            </option>
                                                            <option value="Inactive"<?php
                                                            if ($banner_status == 'Inactive') {
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
                                                        <button type="button" id="btnSave" name="btnSave" class="btn btn-primary"><i class="fa fa-edit"></i> Update</button>
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
            $("#bannerActive").addClass("active");
            $("#bannerActive").parent().parent().addClass("treeview active");
            $("#bannerActive").parent().addClass("in");
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
            $("#banner_image").change(function () {
                readURL(this);
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#btnSave").click(function () {

                    var banner_title = $("#banner_title").val();
                    var banner_status = $("#banner_status option:selected").val();
                    var status = 0;
                    if (banner_title == '') {
                        status++;
                        $("#errorShow").show();
                        $("#banner_title").css({
                            "border": "1px solid red"
                        });
                    }
                    if (banner_status == '0') {
                        status++;
                        $("#errorShow").show();
                        $("#banner_status").css({
                            "border": "1px solid red"
                        });
                    }
                    if (status == 0) {
                        $("#errorShow").hide();
                        $("#bannerForm").submit();
                    }
                });
            });
        </script>
    </body>
</html>