<?php
$array = array();
$sql = "SELECT * FROM news WHERE news_status='Active' ORDER BY news_id DESC LIMIT 2";
$result = mysqli_query($con, $sql);
if ($result) {
    while ($obj = mysqli_fetch_object($result)) {
        $array[] = $obj;
    }
} else {
    
}
//debug($array);
?>
<?php if (count($array) > 0): ?>
    <header class="listing-header">
        <h3>Latest News</h3>
    </header>
    <section class="listing-cont">
        <ul>
            <?php foreach ($array AS $news): ?>
                <li class="item post">
                    <div class="row">
                        <div class="col-md-4"> <a href="latest_news_details.php?id=<?php echo $news->news_id; ?>">
                                <img src="<?php echo $config['IMAGE_UPLOAD_URL'] . '/news_image/' . $news->news_image; ?>" alt="" class="img-thumbnail"> </a></div>
                        <div class="col-md-8">
                            <div class="post-title">
                                <h2><a href="latest_news_details.php?id=<?php echo $news->news_id; ?>"><?php echo $news->news_title; ?></a></h2>
                                <span class="meta-data"><i class="fa fa-calendar"></i> on <?php echo date('d-M-Y', strtotime($news->news_date)); ?></span>
                            </div>
                            <p><?php echo html_entity_decode(shorten_string($news->news_details,15)); ?></p>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
<?php endif; ?>