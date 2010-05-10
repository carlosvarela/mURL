<?php echo $this->Form->create(); ?>
<?php echo $this->Form->input("field",array("label" => "Search")); ?>
<?php echo $this->Form->end("Search"); ?>

<?php if(isset($murls)): ?>
<h2>Murls Search Results:</h2>
<table cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?php __("Code"); ?></th>
            <th><?php __("Url"); ?></th>
            <th><?php __("Hits"); ?></th>
            <th><?php __("Date");?></th>
            <th><?php __("Remote");?></th>
            <th><?php __("Referer"); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($murls as $murl):
            $class = null;
            if ($i++ % 2 == 0) {
                $class = ' class="altrow"';
            }
            ?>
        <tr<?php echo $class;?>>
            <td>
                    <?php echo $html->link("http://murl.net/".$murl['Murl']['code'], "/".$murl['Murl']['code']);  ?>
            </td>

            <td>
                    <?php echo substr(urldecode($murl['Murl']['uri']),0,120) ?>
            </td>
            <td>
                    <?php echo $murl['Murl']['hits'] ?>
            </td>
            <td>
                    <?php echo $murl['Murl']['created'] ?><br>
                    <?php if ($murl['Murl']['created'] != $murl['Murl']['modified']) {
                        echo $murl['Murl']['modified'];
                    }
                    ?>
            </td>
            <td>
                    <?php echo  $html->link($murl['Murl']['remote'],"http://api.hostip.info/get_html.php?ip=".$murl['Murl']['remote']."&position=true") ?>
            </td>
            <td>
                    <?php echo $murl['Murl']['referer'] ?>
            </td>
        </tr>
            <?php if ($murl['Murl']['agent']): ?>
        <tr>
            <td>
                        <?
                        if ($murl['Murl']['private']) echo "Private ";
                        if ($murl['Murl']['destruct']) echo "Destruct ";
                        if ($murl['Murl']['protect']) echo "Protect ";
                        ?>
            </td>
            <td colspan='5'>
                <small><?php echo $murl['Murl']['agent'] ?></small>
            </td>
        </tr>
            <? endif; ?>
        <?php endforeach; ?>
    </tbody>
</table>
<? endif; ?>