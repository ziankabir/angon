<?php
include '../../../config/config.php';
$news_title = '';
$news_short_details = '';
$news_details = '';
$news_date = '';
$news_status = '';
$news_image = '';
$news_created_on = date('Y-m-d H:i:s');
$news_created_by = getSession('admin_id');
if (isset($_POST['news_title'])) {
    extract($_POST);

    $news_title = validateInput($news_title);
    $news_status = validateInput($news_status);
    $news_short_details = validateInput($news_short_details);
    $news_details = validateInput($news_details);
    $news_date = validateInput($news_date);

    $dateFormat = date_create($news_date);
    $news_date = date_format($dateFormat, "Y-m-d");


    if ($_FILES["news_image"]["tmp_name"] != '') {

        $news_image = basename($_FILES['news_image']['name']);
        $infoPath = pathinfo($news_image, PATHINFO_EXTENSION);
        $rename_image = 'PIMG_' . date("YmdHis") . '.' . $infoPath;

        if (!is_dir($config['IMAGE_UPLOAD_PATH'] . '/news_image/')) {
            mkdir($config['IMAGE_UPLOAD_PATH'] . '/news_image/', 0777, TRUE);
        }
        $image_target_path = $config['IMAGE_UPLOAD_PATH'] . '/news_image/' . $rename_image;

        $zebra = new Zebra_Image();
        $zebra->source_path = $_FILES["news_image"]["tmp_name"];
        $zebra->target_path = $config['IMAGE_UPLOAD_PATH'] . '/news_image/' . $rename_image;

        if (!$zebra->resize(600)) {
            zebraImageErrorHandaling($zebra->error);
        }
    }
    $custom_array = '';
    $custom_array .= 'news_title = "' . $news_title . '"';
    $custom_array .= ',news_image = "' . $rename_image . '"';
    $custom_array .= ',news_short_details = "' . $news_short_details . '"';
    $custom_array .= ',news_details = "' . $news_details . '"';
    $custom_array .= ',news_date = "' . $news_date . '"';
    $custom_array .= ',news_status = "' . $news_status . '"';
    $custom_array .= ',news_created_on = "' . $news_created_on . '"';
    $custom_array .= ',news_created_by = "' . $news_created_by . '"';

    $sql = "INSERT INTO news SET $custom_array";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = 'News information saved successfully';
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
                    <h1>Add News</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-laptop"></i>&nbsp;General Settings</li>
                        <li class="active">Add News</li>
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
                                                <form method="POST" id="newsForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="news_title">News Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" id="news_title" name="news_title" value="<?php echo $news_title; ?>" required="required" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="news_image">News Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="file" name="news_image" id="news_image" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="news_short_details">News Short Details&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <textarea id="news_short_details" name="news_short_details" class="form-control" maxlength="200" rows="5"><?php echo $news_short_details; ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="news_details">News Details</label>
                                                            <textarea id="news_details" name="news_details" rows="3" cols="30" ><?php echo html_entity_decode($news_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="news_date">News Date &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input  id="news_date" name="news_date" value="<?php echo $news_date; ?>" style="width: 100%;"/>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="news_status">News Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                            <select id="news_status" name="news_status" class="form-control" required="required" />
                                                            <option value="0">Select Status</option>
                                                            <option value="Active"
                                                            <?php
                                                            if ($news_status == 'Active') {
                                                                echo "selected";
                                                            }
                                                            ?>>Active
                                                            </option>
                                                            <option value="Inactive"<?php
                                                            if ($news_status == 'Inactive') {
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
            $("#newsActive").addClass("active");
            $("#newsActive").parent().parent().addClass("treeview active");
            $("#newsActive").parent().addClass("in");
        </script>
        <?php include basePath('admin/footer_script.php'); ?>
        <script>
            $(document).ready(function () {
                $("#news_details").kendoEditor({
                    tools: [
                        "bold", "italic", "underlinews", "strikethrough", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
                        "insertUnorderedList", "insertOrderedList", "indent", "outdent", "createLink", "unlink", "insertImage",
                        "insertFile", "subscript", "superscript", "createTable", "addRowAbove", "addRowBelow", "addColumnLeft",
                        "addColumnRight", "deleteRow", "deleteColumn", "viewHtml", "formatting", "cleanFormatting",
                        "fontName", "fontSize", "foreColor", "backColor"
                    ]
                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#news_date").kendoDatePicker();
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#btnSave").click(function () {

                    var news_title = $("#news_title").val();
                    var news_short_details = $("#news_short_details").val();
                    var news_image = $('input[type="file"]').val();
                    var news_date = $("#news_date").data("kendoDatePicker").value();
                    var news_status = $("#news_status option:selected").val();
                    var status = 0;
                    if (news_title == '') {
                        status++;
                        $("#errorShow").show();
                        $("#news_title").css({
                            "border": "1px solid red"
                        });
                    }
                    if (news_short_details == '') {
                        status++;
                        $("#errorShow").show();
                        $("#news_short_details").css({
                            "border": "1px solid red"
                        });
                    }
                    if (news_date === "" || news_date === null) {
                        status++;
                        $("#errorShow").show();
                        $("#news_date").css({
                            "border": "1px solid red"
                        });
                    }
                    if (news_image == '') {
                        status++;
                        $("#errorShow").show();
                        $("#news_image").css({
                            "border": "1px solid red"
                        });
                    }
                    if (news_status == '0') {
                        status++;
                        $("#errorShow").show();
                        $("#news_status").css({
                            "border": "1px solid red"
                        });
                    }
                    if (status == 0) {
                        $("#errorShow").hide();
                        $("#newsForm").submit();
                    }
                });
            });
        </script>
    </body>
</html>