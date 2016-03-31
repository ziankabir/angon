<?php
include '../../../config/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include basePath('admin/header_script.php'); ?>
    </head>
    <body class="skin-blue">
        <div class="wrapper">
            <?php include basePath('admin/header.php'); ?>
            <aside class="main-sidebar">
                <?php include basePath('admin/site_menu.php'); ?>
            </aside>
            <div class="content-wrapper">
                <section class="content-header">
                    <h1>Event List</h1>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-newspaper-o"></i>&nbsp;General Settings</li>
                        <li class="active">Event List</li>
                    </ol>
                </section>
                <section class="content">
                    <?php include basePath('admin/message.php'); ?>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box box-primary">
                                <div class="k-grid  k-secondary" data-role="grid">
                                    <div class="k-toolbar k-grid-toolbar">
                                        <a class="k-button k-button-icontext k-grid-add" href="<?php echo baseUrl('admin/view/event/add.php'); ?>">
                                            <span class="k-icon k-add"></span>
                                            Add Event
                                        </a>
                                    </div>
                                </div>
                                <div id="grid"></div>
                                <script id="angon_event_template" type="text/x-kendo-template">
                                    <a class="k-button k-button-icontext k-grid-edit" href="<?php echo baseUrl('admin/view/event/edit.php'); ?>?id=#= angon_event_id#"><span class="k-icon k-edit"></span>Edit</a>
                                    <a class="k-button k-button-icontext k-grid-delete" onclick="javascript:deleteFunction(#= angon_event_id #);" ><span class="k-icon k-delete"></span>Delete</a>
                                </script>
                                <script type="text/javascript">
                                    function deleteFunction(angon_event_id) {
                                        var c = confirm("Are you sure you want to delete this record?");
                                        if (c === true) {
                                            $.ajax({
                                                type: "POST",
                                                dataType: "json",
                                                url: baseUrl + "admin/controller/angon_event/list.php",
                                                data: {angon_event_id: angon_event_id},
                                                success: function (result) {
                                                    if (result === true) {
                                                        $(".k-i-refresh").click();
                                                    }
                                                }
                                            });
                                        }
                                    }
                                </script>
                                <script type="text/x-kendo-template" id="template">
                                    <div class="tabstrip">
                                    <ul>
                                    <li class="k-state-active">
                                    Event Image
                                    </li>
                                    <li>
                                    Short Details
                                    </li>

                                    </ul>
                                    <div>
                                    <div class='general-info'>
                                    # if(angon_event_image !=""){#
                                    <div style="margin-left:10px;"><img src="<?php echo baseUrl("upload/angon_event_image/") ?>#=angon_event_image#" height='100' width='100'</div>
                                    </div>
                                    # } else { #
                                    <div><img src='<?php echo baseUrl("upload/angon_event_image/no_image.jpg") ?>' height='100' width='100'</div>
                                    </div>
                                    # } #
                                    </div>
                                    </div>
                                    <div>
                                    # if(angon_event_short_details != ""){ #
                                    <h5 style="margin-left:10px;">#=angon_event_short_details #</h5>
                                    # }else{#
                                    <h5 style="margin-left:10px;"> No  details available now !!!</h5>
                                    # } #
                                    </div>

                                </script>
                                <script type="text/javascript">
                                    $(document).ready(function () {
                                        var dataSource = new kendo.data.DataSource({
                                            pageSize: 10,
                                            transport: {
                                                read: {
                                                    url: baseUrl + "admin/controller/angon_event/list.php",
                                                    type: "GET"
                                                },
                                                destroy: {
                                                    url: baseUrl + "admin/controller/angon_event/list.php",
                                                    type: "POST"
                                                }
                                            },
                                            autoSync: false,
                                            schema: {
                                                data: "data",
                                                total: "data.length",
                                                model: {
                                                    id: "angon_event_id",
                                                    fields: {
                                                        angon_event_id: {editable: false, nullable: true},
                                                        angon_event_title: {type: "string"},
                                                        angon_event_short_details: {type: "string"},
                                                        angon_event_status: {type: "string"},
                                                        angon_event_date: {type: "string"},
                                                        angon_event_time: {type: "string"},
                                                        angon_event_image: {type: "string"},
                                                        angon_event_created_on: {type: "string"}
                                                    }
                                                }
                                            }
                                        });
                                        $("#grid").kendoGrid({
                                            dataSource: dataSource,
                                            filterable: true,
                                            pageable: {
                                                refresh: true,
                                                input: true,
                                                numeric: false,
                                                pageSizes: true,
                                                pageSizes: [10, 20, 50, 100, 200],
                                            },
                                            sortable: true,
                                            groupable: true,
                                            columns: [
                                                {field: "angon_event_title", title: "Event Title", width: "150px"},
                                                {field: "angon_event_date", title: "Event Date", width: "120px"},
                                                {field: "angon_event_time", title: "Event Time", width: "120px"},
                                                {field: "angon_event_venue", title: "Event Venue", width: "120px"},
                                                {field: "angon_event_status", title: "Status", width: "120px"},
                                                {field: "angon_event_created_on", title: "Created On", width: "130px"},
                                                {
                                                    title: "Action", width: "180px",
                                                    template: kendo.template($("#angon_event_template").html())
                                                }
                                            ],
                                            detailTemplate: kendo.template(jQuery("#template").html()),
                                            detailInit: detailInit,
                                            dataBound: function () {
                                                this.expandRow(this.tbody.find("tr.k-master-row").first());
                                            }
                                        });

                                        function detailInit(e) {
                                            var detailRow = e.detailRow;
                                            detailRow.find(".tabstrip").kendoTabStrip({
                                                animation: {
                                                    open: {effects: "fadeIn"}
                                                }
                                            });
                                        }

                                    });

                                </script>
                                <style scoped>
                                    .k-detail-cell .k-tabstrip .k-content {
                                        padding: 0.2em;
                                    }
                                    .general-info ul
                                    {
                                        list-style:none;
                                        font-style:italic;
                                        margin: 5px;
                                        padding: 0;
                                    }
                                    .general-info ul li
                                    {
                                        margin: 0;
                                        line-height: 1.7em;
                                    }
                                    .general-info label
                                    {
                                        display:inline-block;
                                        width:150px;
                                        padding-right: 10px;
                                        text-align: right;
                                        font-style:normal;
                                        font-weight:bold;
                                    }
                                </style>
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
    </body>
</html>