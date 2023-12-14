<?php
use yii\widgets\Menu;

?>
<!-- Sidebar wrapper start -->
<nav id="sidebar" class="sidebar-wrapper">

    <!-- Sidebar profile starts -->
    <div class="shop-profile">
        <p class="mb-1 fw-bold text-primary">Walmart</p>
        <p class="m-0">Los Angeles, California</p>
    </div>
    <!-- Sidebar profile ends -->

    <!-- Sidebar menu starts -->
    <div class="sidebarMenuScroll">
        <?php
        $menuItems = [
            ['label' => '<i class="bi bi-speedometer"></i><span class="menu-text">Dashboard</span>', 'url' => ['/site/index']],
            ['label' => '<i class="bi bi-person-circle"></i><span class="menu-text">Users</span>', 'url' => ['/user-admin/index']],
            ['label' => '<i class="bi bi-box"></i></i><span class="menu-text">Widgets</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-calendar2"></i><span class="menu-text">Calendar</span>', 'url' => ['#']],
            [
                'label' => '<i class="bi bi-stickies"></i><span class="menu-text">Components</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Accordions', 'url' => ['#']],
                    ['label' => 'Alerts', 'url' => ['#']],
                    ['label' => 'Buttons', 'url' => ['#']],
                    ['label' => 'Badges', 'url' => ['#']],
                    ['label' => 'Carousel', 'url' => ['#']],
                    ['label' => 'List Items', 'url' => ['#']],
                    ['label' => 'Progress Bars', 'url' => ['#']],
                    ['label' => 'Popovers', 'url' => ['#']],
                    ['label' => 'Tooltips', 'url' => ['#']],
                ]
            ],
            [
                'label' => '<i class="bi bi-ui-checks-grid"></i><span class="menu-text">Forms</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Form Inputs', 'url' => ['#']],
                    ['label' => 'Checkbox &amp; Radio', 'url' => ['#']],
                    ['label' => 'File Input', 'url' => ['#']],
                    ['label' => 'Validations', 'url' => ['#']],
                    ['label' => 'Date Time Pickers', 'url' => ['#']],
                    ['label' => 'Form Layouts', 'url' => ['#']]
                ]
            ],
            [
                'label' => '<i class="bi bi-window-sidebar"></i><span class="menu-text">Invoices</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Create Invoice', 'url' => ['#']],
                    ['label' => 'View Invoice', 'url' => ['#']],
                    ['label' => 'Invoice List', 'url' => ['#']]
                ]
            ],
            ['label' => '<i class="bi bi-border-all"></i><span class="menu-text">Tables</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-calendar4"></i><span class="menu-text">Events</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-check-circle"></i><span class="menu-text">Subscribers</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-wallet2"></i><span class="menu-text">Contacts</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-gear"></i><span class="menu-text">Settings</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-person-square"></i><span class="menu-text">Profile</span>', 'url' => ['#']],
            [
                'label' => '<i class="bi bi-code-square"></i><span class="menu-text">Cards</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Cards', 'url' => ['#']],
                    ['label' => 'Advanced Cards', 'url' => ['#']]
                ]
            ],
            [
                'label' => '<i class="bi bi-pie-chart"></i><span class="menu-text">Graphs</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Apex', 'url' => ['#']],
                    ['label' => 'Morris', 'url' => ['#']]
                ]
            ],
            ['label' => '<i class="bi bi-pin-map"></i><span class="menu-text">Maps</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-slash-square"></i><span class="menu-text">Tabs</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-terminal"></i><span class="menu-text">Modals</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-textarea"></i><span class="menu-text">Icons</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-explicit"></i><span class="menu-text">Typography</span>', 'url' => ['#']],
            [
                'label' => '<i class="bi bi-upc-scan"></i><span class="menu-text">Login/Signup</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    ['label' => 'Login', 'url' => ['#']],
                    ['label' => 'Signup', 'url' => ['#']],
                    ['label' => 'Forgot Password', 'url' => ['#']]
                ]
            ],
            ['label' => '<i class="bi bi-exclamation-diamond"></i><span class="menu-text">Page Not Found</span>', 'url' => ['#']],
            ['label' => '<i class="bi bi-exclamation-octagon"></i><span class="menu-text">Maintenance</span>', 'url' => ['#']],
            [
                'label' => '<i class="bi bi-code-square"></i><span class="menu-text">Multi Level</span>',
                'url' => ['#!'],
                'options' => ['class' => 'treeview'],
                'items' => [
                    [
                        'label' => 'Level One <i class="bi bi-chevron-right"></i>',
                        'url' => ['#!'],
                        'items' => [
                            [
                                'label' => 'Level two <i class="bi bi-chevron-right"></i>',
                                'url' => ['#!'],
                                'items' => [
                                    ['label' => '<a href="#!">Level Three</a>', 'url' => ['#!']]
                                ]
                            ],
                        ]
                    ],
                    [
                        'label' => 'Level One', 'url' => ['#!'],
                    ]
                ]
            ],
        ];

        echo Menu::widget([
            'encodeLabels' => false,
            'activateParents' => true,
            'activeCssClass' => 'active current-page',
            'options' => ['class' => 'sidebar-menu'],
            'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}</ul>\n",
            'items' => $menuItems
        ]);
        ?>
    </div>
    <!-- Sidebar menu ends -->

</nav>
<!-- Sidebar wrapper end -->