<div class="box box-solid bg-green-gradient">
    <div class="box-header with-border">
        <h3 class="box-title">Latest News</h3>
    </div><!-- /.box-header -->
    <div class="box-footer text-black" style="min-height:270px;">
        <ul class="todo-list">
            <? $lnRes = mysql_query('SELECT newsID, addedOn, title, shortDescription  FROM user_latestnews ORDER BY addedOn DESC LIMIT 4'); ?>
            <? if($lnRes && mysql_num_rows($lnRes) > 0): ?>
            <? while($lnRow = mysql_fetch_object($lnRes)): ?>
            <li>
                <a href="/user/view-news.php?id=<?=$lnRow->newsID?>" title="Read <?=stripslashes($lnRow->title)?>">
                <span class="text">
                <?=substr(stripslashes($lnRow->shortDescription), 0, 53)?>
                <small class="label label-info"><i class="fa fa-clock-o"></i> <?=date('d-m-Y', strtotime($lnRow->addedOn))?></small>
                </span>
                </a>
            </li>
            <? endwhile; ?>
            <li>
                <a href="/user/news.php" title="Read <?=stripslashes($lnRow->title)?>">
                <span class="text">Read All News</span>
                </a>
            </li>
            <? else: ?>
            <li style="text-align:right;">
                <span class="text">No News Found!</span>
            </li>
            <? endif; ?>
        </ul>
    </div><!-- /.box-footer -->
</div>

<div class="box box-solid bg-blue-gradient">
    <div class="box-header with-border">
        <h3 class="box-title">Most Read News</h3>
    </div><!-- /.box-header -->
    <div class="box-footer text-black" style="min-height:270px;">
        <ul class="todo-list">
            <? $lnRes = mysql_query('SELECT newsID, addedOn, title, shortDescription  FROM user_latestnews ORDER BY counts ASC LIMIT 4'); ?>
            <? if($lnRes && mysql_num_rows($lnRes) > 0): ?>
            <? while($lnRow = mysql_fetch_object($lnRes)): ?>
            <li>
                <a href="/user/view-news.php?id=<?=$lnRow->newsID?>" title="Read <?=stripslashes($lnRow->title)?>">
                <span class="text">
                <?=substr(stripslashes($lnRow->shortDescription), 0, 53)?>
                <small class="label label-info"><i class="fa fa-clock-o"></i> <?=date('d-m-Y', strtotime($lnRow->addedOn))?></small>
                </span>
                </a>
            </li>
            <? endwhile; ?>
            <li>
                <a href="/user/news.php" title="Read <?=stripslashes($lnRow->title)?>">
                <span class="text">Read All News</span>
                </a>
            </li>
            <? else: ?>
            <li style="text-align:right;">
                <span class="text">No News Found!</span>
            </li>
            <? endif; ?>
        </ul>
    </div><!-- /.box-footer -->
</div>