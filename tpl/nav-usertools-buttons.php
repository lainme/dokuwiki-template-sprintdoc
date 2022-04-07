<?php
    if (!defined('DOKU_INC')) die();

    if ($conf['useacl']): ?>

        <nav id="dokuwiki__usertools" class="nav-usertools-modified <?php echo $navClass?>">
            <h6 class="sr-only" role="heading" aria-level="2"><?php echo $lang['user_tools']; ?></h6>
            <ul>
                <?php
                if (!empty($_SERVER['REMOTE_USER'])) {
                    echo '<li class="user"><span class="sr-only">'.$lang['loggedinas'].' </span>'.userlink().'</li>';
                }?>
                <?php /* dokuwiki user tools */
                echo (new \dokuwiki\Menu\UserMenu())->getListItems('action ');
                ?>

                <?php /* tasks do Plug-In */
                /** @var \helper_plugin_do $doplugin */
                $doplugin = plugin_load('helper','do');
                if ($doplugin !== null && isset($_SERVER['REMOTE_USER'])) {
                    $icon = $doplugin->tpl_getUserTasksIconHTML();
                    if ($icon) {
                        echo '<li class="user-task">' . $icon . '</li>';
                    }
                }
                ?>

            </ul>
        </nav><!-- #dokuwiki__usertools -->
    <?php endif ?>

