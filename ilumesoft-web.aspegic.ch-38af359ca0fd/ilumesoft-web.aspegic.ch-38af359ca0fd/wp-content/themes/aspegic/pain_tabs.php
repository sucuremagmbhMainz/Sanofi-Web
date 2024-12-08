<?php
/**
 * pain_tabs.php
 * Shows tabs with all the pain post types.
 *
 * @package: aspegic.
 * @author: Ashiqur Rahman
 * @link: http://www.choobs.com
 */
?>
<div class="tabs-wrapper">
    <?php
    $pains = get_pains();

    if( !empty( $pains ) ):
        $class = 'active';
        ?>
        <div class="tab-items">
            <ul class="tabs">
                <?php
                foreach( $pains as $pain ):
                    ?>
                    <li id="tab_<?php echo $pain[ 'id' ]; ?>" class="tab tab-<?php echo $pain[ 'id' ]; ?> <?php echo $class; ?>">
                        <a class="tab-link" id="tab_link_<?php echo $pain[ 'id' ]; ?>" href="#tab_content_<?php echo $pain[ 'id' ]; ?>" <?php echo ( ( $class == 'active' ) ? 'style="background-image: url(' . $pain[ 'active_icon' ] . ');"' : 'style="background-image: url(' . $pain[ 'default_icon' ] . ');"' ); ?> data-default-icon="<?php echo $pain[ 'default_icon' ]; ?>" data-active-icon="<?php echo $pain[ 'active_icon' ]; ?>"></a>
                    </li>
                    <?php
                    $class='';
                endforeach;
                ?>
            </ul>
        </div>
        <div class="tab-contents">
            <?php
            $class = 'active';
            foreach( $pains as $pain ):
                ?>
                <div id="tab_content_<?php echo $pain[ 'id' ]; ?>" class="tab-content tab-<?php echo $pain[ 'id' ]; ?> <?php echo $class; ?>">
                    <?php echo wpautop( $pain[ 'body' ] ); ?>
                </div>
                <?php
                $class = '';
            endforeach;
            ?>
        </div>
        <?php
    endif;
    ?>
</div>
