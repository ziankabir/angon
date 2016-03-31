<?php
$arrayProject = array();
$sqlProject = "SELECT * FROM project WHERE project_status='Active' ORDER BY project_id DESC LIMIT 3";
$resultproject = mysqli_query($con, $sqlProject);
if ($resultproject) {
    while ($objProject = mysqli_fetch_object($resultproject)) {
        $arrayProject[] = $objProject;
    }
} else {
    
}
//debug($arrayProject);
?>

<header class="listing-header">
    <h3>Angon Project</h3>
</header>
<?php if (count($arrayProject) > 0): ?>
    <div class="featured-blocks clearfix">
    <?php foreach ($arrayProject AS $project): ?>
            <div class="col-md-4 col-sm-4 featured-block">
                <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/project_image/' . $project->project_image; ?>" alt="<?php $project->project_title; ?>" class="img-thumbnail" style="height: 200px;width: 100%;"> <strong><?php echo $project->project_title; ?></strong> </div>
        <?php endforeach; ?>
<?php endif; ?>
</div>
