<?php
$arrayME = array();
$sqlME = "SELECT * FROM angon_event WHERE angon_event_is_upcoming='Yes' AND angon_event_status='Active'";
$resultME = mysqli_query($con, $sqlME);
if ($resultME) {
    while ($objME = mysqli_fetch_object($resultME)) {
        $arrayME[] = $objME;
    }
} else {
    
}
?>
<header class="listing-header">
    <h3>More Coming Events</h3>
</header>
<section class="listing-cont">
    <?php if (count($arrayME) > 0): ?>
        <ul>
            <?php foreach ($arrayME AS $ME): ?>
                <li class="item event-item">
                    <div class="event-date"> <span class="date"><?php echo date('d', strtotime($ME->angon_event_date)); ?></span>

                        <span class="month"><?php echo date('M', strtotime($ME->angon_event_date)); ?></span>
                    </div>
                    <div class="event-detail">
                        <h4><a href="event-details.php?id=<?php echo $ME->angon_event_id; ?>"><?php echo $ME->angon_event_title; ?></a></h4>
                        <span class="event-dayntime meta-data"><?php echo date('Y', strtotime($ME->angon_event_date)); ?> | <?php echo date('D', strtotime($ME->angon_event_date)); ?>  | <?php echo $ME->angon_event_time; ?></span> </div>
                    <div>
                        <div><a href="event-details.php?id=<?php echo $ME->angon_event_id; ?>" class="btn btn-default btn-sm">Details</a></div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>