<?php

namespace WarpDriven\WpCore;

class WPHomePage
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'add_page'));
    }


    public function add_page()
    {
        $hookname = add_menu_page(
            __('Warp Driven', 'wd-woo-plugin-vs'),
            __('Warp Driven', 'wd-woo-plugin-vs'),
            'manage_options',
            'warp-driven',
            array($this, 'page_html'),
            'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iNjAwLjAwMDAwMHB0IiBoZWlnaHQ9IjYwMC4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDYwMC4wMDAwMDAgNjAwLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgoKPGcgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoMC4wMDAwMDAsNjAwLjAwMDAwMCkgc2NhbGUoMC4xMDAwMDAsLTAuMTAwMDAwKSIKZmlsbD0iIzAwMDAwMCIgc3Ryb2tlPSJub25lIj4KPHBhdGggZD0iTTE0OTUgNDg0MCBsLTI4MCAtMjgwIDEwNTAgMCBjNjUzIDAgMTA5MyAtNCAxMTY1IC0xMSA2MTkgLTU2IDEwNzcKLTM0NSAxMjk5IC04MTkgMTg5IC00MDUgMTkyIC05NTMgNiAtMTM0MiAtMTggLTM4IC0zMCAtNjggLTI3IC02OCAzIDAgNDkgMzAKMTA0IDY2IDMxMSAyMDcgNTE2IDUxNyA1OTkgOTA0IDIwIDkxIDIzIDEzNSAyMyAzMjUgMSAyNDIgLTkgMzE1IC02NSA1MDAKLTE0NiA0NzYgLTUxNiA4MTQgLTEwMzggOTQ2IC0yMzAgNTkgLTIzOSA1OSAtMTQ0OSA1OSBsLTExMDcgMCAtMjgwIC0yODB6Ii8+CjxwYXRoIGQ9Ik04NDAgNDE4NSBsLTI4NSAtMjg1IDEwNzggMCBjNjc0IDAgMTExNCAtNCAxMTc1IC0xMCA3NjUgLTgyIDEyNjMKLTUxOCAxMzg4IC0xMjE1IDIwIC0xMTEgMjUgLTQyOCA4IC01MDAgbC0xMCAtNDAgLTc0IC0xNCBjLTYxIC0xMSAtMjkyIC0xNQotMTIwNSAtMTggbC0xMTMxIC00IC0yODQgLTI4NCAtMjg1IC0yODUgMTA0MCAwIGM2MDMgMCAxMDg4IDQgMTE1NSAxMCAzMjUgMjgKNTk0IDExOCA4MzQgMjc3IDEyOCA4NSAyMTggMTc0IDI5NSAyOTIgMTg0IDI4MCAyNjQgNjA2IDI0MCA5NzMgLTI1IDM5MCAtMTYzCjcwNCAtNDE5IDk1MiAtMjU2IDI0OSAtNTk1IDM5MCAtMTAyNSA0MjYgLTcxIDYgLTU0OSAxMCAtMTE2NSAxMCBsLTEwNDUgMAotMjg1IC0yODV6Ii8+CjxwYXRoIGQ9Ik0zOTQ1IDE2MDkgYy0xNjkgLTgxIC0zOTggLTEzOSAtNjIwIC0xNTggLTczIC03IC01MjYgLTExIC0xMTYwIC0xMQpsLTEwNDAgMCAtMjgwIC0yODAgLTI4MCAtMjgwIDEwOTIgMCBjMTE5NiAwIDEyMDcgMCAxNDM2IDU5IDM5MiAxMDIgNzEzIDMzMQo5MDcgNjQ5IDE4IDI5IDMxIDU0IDI5IDU2IC0yIDIgLTQwIC0xNCAtODQgLTM1eiIvPgo8L2c+Cjwvc3ZnPgo=',
            80
        );

        add_action('load-' . $hookname, array($this, 'submit'));
    }

    public function page_html()
    {
        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <div class="mt-2 bg-white grid grid-cols-1 md:grid-cols-3 gap-2 p-4 rounded shadow">
                <div>
                    <h2><span class="mr-2">1.</span><?php _e('Create an account', 'wd-woo-plugin-vs'); ?></h2>
                    <p><?php _e('', 'wd-woo-plugin-vs'); ?></p>
                    <a class="btn" href="https://www.warp-driven.com"
                       target="_blank"><?php _e('SIGN UP,IT\'S FREE!', 'wd-woo-plugin-vs'); ?></a>
                </div>
                <div>
                    <h2><span class="mr-2">2.</span><?php _e('Enter your API Key', 'wd-woo-plugin-vs'); ?></h2>
                    <p><?php _e('', 'wd-woo-plugin-vs'); ?></p>
                    <a class="btn"
                       href="<?php menu_page_url('warp-driven-setting'); ?>"><?php _e('I HAVE MY API KEY', 'wd-woo-plugin-vs'); ?></a>
                </div>
                <div>
                    <h2><span class="mr-2">3.</span><?php _e('Optimize it', 'wd-woo-plugin-vs'); ?></h2>
                    <p><?php _e('', 'wd-woo-plugin-vs'); ?></p>
                    <a class="btn"
                       href="<?php menu_page_url('warp-driven-optimize'); ?>"><?php _e('GO TO OPTIMIZE', 'wd-woo-plugin-vs'); ?></a>
                </div>
            </div>
            <h2 class="text-center mt-10"><?php _e('Recommend Plugins', 'wd-woo-plugin-vs'); ?></h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-2 mt-4">
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
                <div class="card rounded-md p-4 text-center">
                    <i class="fas fa-wand-magic-sparkles text-4xl"></i>
                    <h4><?php _e('Conversion to webp', 'warp-driven'); ?></h4>
                    <p></p>
                    <a class="btn" href="#">Install</a>
                </div>
            </div>
        </div>
        <?php
    }

    public function submit()
    {

    }
}