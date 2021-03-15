<style type="text/css">
    .marquee {
        width: 450px;
        margin: 0 auto;
        white-space: nowrap;
        overflow: hidden;
        box-sizing: border-box;
        border: 1px solid #800000;
    }

    .marquee span {
        display: inline-block;
        padding-left: 100%;
        animation: marquee 15s linear infinite;
    }

    .marquee span:hover {
        animation-play-state: paused
    }

    @keyframes marquee {
        0%   { transform: translate(0, 0); }
        100% { transform: translate(-100%, 0); }
    }
</style>
<?php
$json = file_get_contents("https://dbo.infinbank.com:9443/api/v1/nci/NCIRate");
$details=json_decode($json,true);
$counter = 0;
foreach ($details as $detail => $value):?>
    <?php if(is_array($value)):?>
        <div class="marquee"><span>
            <?php
            foreach ($value as $v){
                $buyCourse = substr($v['buyCourse'],0,-2);
                $sellCourse = substr($v['sellCourse'],0,-2);
                $currency = $v['currency'];
                echo "-----" .$currency .": " ." <Покупка> ". $buyCourse ." <Продажа> ". $sellCourse."\n";
            }?>
            </span></div>
    <?php endif;?>
    <?php $counter++;?>
<?php endforeach;?>




