<?php
include '../../../config/config.php';
$angon_event_title = '';
$angon_event_short_details = '';
$angon_event_details = '';
$angon_event_date = '';
$angon_event_time = '';
$angon_event_status = '';
$angon_event_image = '';
$angon_event_venue = '';
$angon_event_is_upcoming = '';
$angon_event_created_on = date('Y-m-d H:i:s');
$angon_event_created_by = getSession('admin_id');
if (isset($_POST['angon_event_title'])) {
    extract($_POST);
    $angon_event_title = validateInput($angon_event_title);
    $angon_event_venue = validateInput($angon_event_venue);
    $angon_event_status = validateInput($angon_event_status);
    $angon_event_short_details = validateInput($angon_event_short_details);
    $angon_event_details = validateInput($angon_event_details);
    $angon_event_is_upcoming = validateInput($angon_event_is_upcoming);
    $angon_event_date = validateInput($angon_event_date);

    $dateFormat = date_create($angon_event_date);
    $angon_event_date = date_format($dateFormat, "Y-m-d");

    $timeFormat = mysqli_real_escape_string($con, $angon_event_time);
    $angon_event_time = date("G:i:a", strtotime($timeFormat));
    if ($_FILES["angon_event_image"]["tmp_name"] != '') {

        $angon_event_image = basename($_FILES['angon_event_image']['name']);
        $infoPath = pathinfo($angon_event_image, PATHINFO_EXTENSION);
        $rename_image = 'PIMG_' . date("YmdHis") . '.' . $infoPath;

        if (!is_dir($config['IMAGE_UPLOAD_PATH'] . '/angon_event_image/')) {
            mkdir($config['IMAGE_UPLOAD_PATH'] . '/angon_event_image/', 0777, TRUE);
        }
        $image_target_path = $config['IMAGE_UPLOAD_PATH'] . '/angon_event_image/' . $rename_image;

        $zebra = new Zebra_Image();
        $zebra->source_path = $_FILES["angon_event_image"]["tmp_name"];
        $zebra->target_path = $config['IMAGE_UPLOAD_PATH'] . '/angon_event_image/' . $rename_image;

        if (!$zebra->resize(600)) {
            zebraImageErrorHandaling($zebra->error);
        }
    }
    
    if (!$angon_event_is_upcoming OR $angon_event_is_upcoming != "Yes") {
        $angon_event_is_upcoming = 'No';
    }
    
    $custom_array = '';
    $custom_array .= 'angon_event_title = "' . $angon_event_title . '"';
    $custom_array .= ',angon_event_image = "' . $rename_image . '"';
    $custom_array .= ',angon_event_short_details = "' . $angon_event_short_details . '"';
    $custom_array .= ',angon_event_details = "' . $angon_event_details . '"';
    $custom_array .= ',angon_event_date = "' . $angon_event_date . '"';
    $custom_array .= ',angon_event_time = "' . $angon_event_time . '"';
    $custom_array .= ',angon_event_venue = "' . $angon_event_venue . '"';
    $custom_array .= ',angon_event_is_upcoming = "' . $angon_event_is_upcoming . '"';
    $custom_array .= ',angon_event_status = "' . $angon_event_status . '"';
    $custom_array .= ',angon_event_created_on = "' . $angon_event_created_on . '"';
    $custom_array .= ',angon_event_created_by = "' . $angon_event_created_by . '"';

    $sql = "INSERT INTO angon_event SET $custom_array";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $success = 'Event information saved successfully';
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
                    <h1>Add Event</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-laptop"></i>&nbsp;General Settings</li>
                        <li class="active">Add Event</li>
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
                                                <form method="POST" id="angon_eventForm" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="angon_event_title">Event Title &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="text" class="form-control" id="angon_event_title" name="angon_event_title" value="<?php echo $angon_event_title; ?>" required="required" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_image">Event Image&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input type="file" name="angon_event_image" id="angon_event_image" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_short_details">Event Short Details&nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <textarea id="angon_event_short_details" name="angon_event_short_details" class="form-control" maxlength="200" rows="5"><?php echo $angon_event_short_details; ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="angon_event_details">Event Details</label>
                                                            <textarea id="angon_event_details" name="angon_event_details" rows="3" cols="30" ><?php echo html_entity_decode($angon_event_details, ENT_QUOTES | ENT_IGNORE, "UTF-8"); ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_date">Event Date &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input  id="angon_event_date" name="angon_event_date" value="<?php echo $angon_event_date; ?>" style="width: 100%;"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_time">Event Time &nbsp;&nbsp;<span style="color:red;">*</span></label>
                                                            <input  id="angon_event_time" name="angon_event_time" value="<?php echo $angon_event_time; ?>" style="width: 100%;"/>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_venue">Event Venue</label>
                                                            <textarea id="angon_event_venue" name="angon_event_venue" class="form-control" maxlength="200" rows="5"><?php echo $angon_event_venue; ?></textarea>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_status">Is Upcoming Event</label>
                                                            <select id="angon_event_is_upcoming" name="angon_event_is_upcoming" class="form-control" required="required" />
                                                            <option value="0">Select Status</option>
                                                            <option value="Yes"
                                                            <?php
                                                            if ($angon_event_is_upcoming == 'Yes') {
                                                                echo "selected";
                                                            }
                                                            ?>>Yes
                                                            </option>
                                                            <option value="No"<?php
                                                            if ($angon_event_is_upcoming == 'No') {
                                                                echo "selected";
                                                            }
                                                            ?>>No
                                                            </option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="angon_event_status">Event Status&nbsp;&nbsp;<span style="color:red;">*</label>
                                                            <select id="angon_event_status" name="angon_event_status" class="form-control" required="required" />
                                                            <option value="0">Select Status</option>
                                                            <option value="Active"
                                                            <?php
                                                            if ($angon_event_status == 'Active') {
                                                                echo "selected";
                                                            }
                                                            ?>>Active
                                                            </option>
                                                            <option value="Inactive"<?php
                                                            if ($angon_event_status == 'Inactive') {
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
            $("#eventActive").addClass("active");
            $("#eventActive").parent().parent().addClass("treeview active");
            $("#eventActive").parent().addClass("in");
        </script>
        <?php include basePath('admin/footer_script.php'); ?>
        <script>
            $(document).ready(function () {
                $("#angon_event_details").kendoEditor({
                    tools: [
                        "bold", "italic", "underliangon_event", "strikethrough", "justifyLeft", "justifyCenter", "justifyRight", "justifyFull",
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
                $("#angon_event_date").kendoDatePicker();
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#angon_event_time").kendoTimePicker({
                    format: "hh:mm tt"

                });
            });
        </script>
        <script>
            $(document).ready(function () {
                $("#btnSave").click(function () {

                    var angon_event_title = $("#angon_event_title").val();
                    var angon_event_short_details = $("#angon_event_short_details").val();
                    var angon_event_image = $('input[type="file"]').val();
                    var angon_event_date = $("#angon_event_date").data("kendoDatePicker").value();
                    var angon_event_status = $("#angon_event_status option:selected").val();
                    var status = 0;
                    if (angon_event_title == '') {
                        status++;
                        $("#errorShow").show();
                        $("#angon_event_title").css({
                            "border": "1px solid red"
                        });
                    }
                    if (angon_event_short_details == '') {
                        status++;
                        $("#errorShow").show();
                        $("#angon_event_short_details").css({
                            "border": "1px solid red"
                        });
                    }
                    if (angon_event_date === "" || angon_event_date === null) {
                        status++;
                        $("#errorShow").show();
                        $("#angon_event_date").css({
                            "border": "1px solid red"
                        });
                    }
                    if (angon_event_image == '') {
                        status++;
                        $("#errorShow").show();
                        $("#angon_event_image").css({
                            "border": "1px solid red"
                        });
                    }
                    if (angon_event_status == '0') {
                        status++;
                        $("#errorShow").show();
                        $("#angon_event_status").css({
                            "border": "1px solid red"
                        });
                    }
                    if (status == 0) {
                        $("#errorShow").hide();
                        $("#angon_eventForm").submit();
                    }
                });
            });
        </script>
    </body>
</html>