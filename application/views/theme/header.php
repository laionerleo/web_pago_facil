<div class="header d-print-none">

        <div class="header-left">
            <div class="navigation-toggler">
                <a href="#" data-action="navigation-toggler">
                    <i data-feather="menu"></i>
                </a>
            </div>
            <div class="header-logo">
                <a href="<?= base_url() ?>" >
                    <img class="logo" src="<?=  base_url() ?>/application/assets/assets/media/image/logopagofacil.png" alt="logo">
                    <img class="logo-light" src="<?=  base_url() ?>/application/assets/assets/media/image/logo-light.png" alt="light logo">
                </a>
            </div>
        </div>

        <div class="header-body">
            <div class="header-body-left">
                <div class="page-title">
                    <h4></h4>
                </div>
            </div>
            <div class="header-body-right">
                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a href="#" title="Language" class="nav-link" data-toggle="dropdown">
                            <img width="18" src="<?=  base_url() ?>/application/assets/assets/media/image/flags/262-united-kingdom.png"
                                 alt="flag"
                                 class="mr-2 rounded" title="United Kingdom"> EN
                        </a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">
                                <img width="18" src="<?=  base_url() ?>/application/assets/assets/media/image/flags/003-tanzania.png"
                                     class="mr-2 rounded"
                                     alt="flag">
                                Tanzania
                            </a>
                            <a href="#" class="dropdown-item">
                                <img width="18" src="<?=  base_url() ?>/application/assets/assets/media/image/flags/261-china.png"
                                     class="mr-2 rounded"
                                     alt="flag"> China
                            </a>
                            <a href="#" class="dropdown-item">
                                <img width="18" src="<?=  base_url() ?>/application/assets/assets/media/image/flags/013-tunisia.png"
                                     class="mr-2 rounded"
                                     alt="flag">
                                Tunisia
                            </a>
                            <a href="#" class="dropdown-item">
                                <img width="18" src="<?=  base_url() ?>/application/assets/assets/media/image/flags/044-spain.png"
                                     class="mr-2 rounded"
                                     alt="flag"> Spain
                            </a>
                        </div>
                    </li>

                    <!-- begin::header fullscreen -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                            <i class="maximize" data-feather="maximize"></i>
                            <i class="minimize" data-feather="minimize"></i>
                        </a>
                    </li>
                    <!-- end::header fullscreen -->

                    <!-- begin::header search -->
                    <li class="nav-item">
                        <a href="#" class="nav-link" title="Search" data-toggle="dropdown">
                            <i data-feather="search"></i>
                        </a>
                        <div class="dropdown-menu p-2 dropdown-menu-right">
                            <form>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <div class="input-group-prepend">
                                        <button class="btn" type="button">
                                            <i data-feather="search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                    <!-- end::header search -->

                    <!-- begin::apps -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Apps" data-toggle="dropdown">
                            <i data-feather="box"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="bg-dark p-4 text-center d-flex justify-content-between">
                                <h5 class="mb-0">Apps</h5>
                            </div>
                            <div class="p-3">
                                <div class="row row-xs">
                                    <div class="col-6">
                                        <a href="chat.html">
                                            <div class="border-radius-1 text-center mb-3">
                                                <figure class="avatar avatar-lg border-0">
                                                <span class="avatar-title bg-primary text-white rounded-circle">
                                                    <i class="width-30 height-30" data-feather="message-circle"></i>
                                                </span>
                                                </figure>
                                                <div class="mt-2">Chat</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="mail.html">
                                            <div class="border-radius-1 text-center mb-3">
                                                <figure class="avatar avatar-lg border-0">
                                                <span class="avatar-title bg-secondary text-white rounded-circle">
                                                    <i class="width-30 height-30" data-feather="mail"></i>
                                                </span>
                                                </figure>
                                                <div class="mt-2">Mail</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="todo-list.html">
                                            <div class="border-radius-1 text-center">
                                                <figure class="avatar avatar-lg border-0">
                                                <span class="avatar-title bg-info text-white rounded-circle">
                                                    <i class="width-30 height-30" data-feather="check-circle"></i>
                                                </span>
                                                </figure>
                                                <div class="mt-2">Todo List</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="file-manager.html">
                                            <div class="border-radius-1 text-center">
                                                <figure class="avatar avatar-lg border-0">
                                                <span class="avatar-title bg-warning text-white rounded-circle">
                                                    <i class="width-30 height-30" data-feather="file"></i>
                                                </span>
                                                </figure>
                                                <div class="mt-2">File Manager</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- end::apps -->

                    <!-- begin::header messages dropdown -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-link-notify" title="Chats" data-toggle="dropdown">
                            <i data-feather="message-circle"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Chats</h5>
                                <small class="opacity-7">2 unread chats</small>
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li>
                                        <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/man_avatar1.jpg"
                                                         class="rounded-circle" alt="user">
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Herbie Pallatina
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <div class="small text-muted">
                                                    <span class="mr-2">02:30 PM</span>
                                                    <span>Have you madimage</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/women_avatar5.jpg"
                                                         class="rounded-circle" alt="user">
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Andrei Miners
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <div class="small text-muted">
                                                    <span class="mr-2">08:36 PM</span>
                                                    <span>I have a meetinimage</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="text-divider small pb-2 pl-3 pt-3">
                                        <span>Old chats</span>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/man_avatar3.jpg"
                                                         class="rounded-circle" alt="user">
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Kevin added
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <div class="small text-muted">
                                                    <span class="mr-2">11:09 PM</span>
                                                    <span>Have you madimage</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/man_avatar2.jpg"
                                                         class="rounded-circle" alt="user">
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Eugenio Carnelley
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <div class="small text-muted">
                                                    <span class="mr-2">Yesterday</span>
                                                    <span>I have a meetinimage</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                    <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/women_avatar1.jpg"
                                                         class="rounded-circle" alt="user">
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Neely Ferdinand
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <div class="small text-muted">
                                                    <span class="mr-2">Yesterday</span>
                                                    <span>I have a meetinimage</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 text-right border-top">
                                <ul class="list-inline small">
                                    <li class="list-inline-item mb-0">
                                        <a href="#">Mark All Read</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- end::header messages dropdown -->

                    <!-- begin::header notification dropdown -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link nav-link-notify" title="Notifications" data-toggle="dropdown">
                            <i data-feather="bell"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Notifications</h5>
                                <small class="opacity-7">1 unread notifications</small>
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li>
                                        <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span
                                                    class="avatar-title bg-success-bright text-success rounded-circle">
                                                    <i class="ti-user"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    New customer registered
                                                    <i title="Mark as read" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-circle-o font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">20 min ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="text-divider small pb-2 pl-3 pt-3">
                                        <span>Old notifications</span>
                                    </li>
                                    <li>
                                        <a href="#" class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span
                                                    class="avatar-title bg-warning-bright text-warning rounded-circle">
                                                    <i class="ti-package"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    New Order Recieved
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">45 sec ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span class="avatar-title bg-danger-bright text-danger rounded-circle">
                                                    <i class="ti-server"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                    Server Limit Reached!
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">55 sec ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#"
                                           class="list-group-item d-flex align-items-center hide-show-toggler">
                                            <div>
                                                <figure class="avatar mr-2">
                                                <span class="avatar-title bg-info-bright text-info rounded-circle">
                                                    <i class="ti-layers"></i>
                                                </span>
                                                </figure>
                                            </div>
                                            <div class="flex-grow-1">
                                                <p class="mb-0 line-height-20 d-flex align-items-center justify-content-between">
                                                    Apps are ready for update
                                                    <i title="Mark as unread" data-toggle="tooltip"
                                                       class="hide-show-toggler-item fa fa-check font-size-11"></i>
                                                </p>
                                                <span class="text-muted small">Yesterday</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="p-2 text-right border-top">
                                <ul class="list-inline small">
                                    <li class="list-inline-item mb-0">
                                        <a href="#">Mark All Read</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <!-- end::header notification dropdown -->

                    <!-- BEGIN: Cart -->
                    <li class="nav-item">
                        <a href="#" title="Cart" class="nav-link" data-toggle="dropdown">
                            <i data-feather="shopping-bag"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                            <div class="bg-dark p-4 text-center d-flex justify-content-between align-items-center">
                                <h5 class="mb-0">Cart</h5>
                                <small class="opacity-7">3 products</small>
                            </div>
                            <div>
                                <div class="list-group list-group-flush">
                                    <a href="#" class="p-3 list-group-item d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="<?=  base_url() ?>/application/assets/assets/media/image/products/product6.png"
                                                     alt="Canon 4000D 18-55 MM">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Canon 4000D 18-55 MM
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">1 X $1,200</span>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 list-group-item d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="<?=  base_url() ?>/application/assets/assets/media/image/products/product3.png"
                                                     alt="pineapple">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Snopy SN-BT96 Pretty
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">1 X $250</span>
                                        </div>
                                    </a>
                                    <a href="#" class="p-3 list-group-item d-flex">
                                        <div>
                                            <figure class="avatar mr-3">
                                                <img src="<?=  base_url() ?>/application/assets/assets/media/image/products/product7.png"
                                                     class="rounded" alt="pineapple">
                                            </figure>
                                        </div>
                                        <div class="flex-grow-1">
                                            <p class="mb-0 line-height-20 d-flex justify-content-between">
                                                Lenovo Tab E10 TB-X104F 32GB
                                                <i title="Close" data-toggle="tooltip"
                                                   class="hide-show-toggler-item ti-close"></i>
                                            </p>
                                            <span class="text-muted small">2 X $100</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="p-3 border-top text-right">
                                <p class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Sub Total</span>
                                    <span>$1,650</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center mb-2">
                                    <span>Taxes</span>
                                    <span>$15</span>
                                </p>
                                <p class="d-flex justify-content-between align-items-center mb-2 font-weight-bold">
                                    <span>Total</span>
                                    <span>$1,675</span>
                                </p>
                                <button class="btn btn-primary btn-block mt-2">
                                    Order and Payment <i class="ti-arrow-right ml-2"></i>
                                </button>
                            </div>
                        </div>
                    </li>
                    <!-- END: Cart -->

                    <!-- begin::settings -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="Settings" data-sidebar-target="#settings">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                    <!-- end::settings -->

                    <!-- begin::user menu -->
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link" title="User menu" data-sidebar-target="#user-menu">
                            <span class="mr-2 d-sm-inline d-none">Roxana Roussell</span>
                            <figure class="avatar avatar-sm">
                                <img src="<?=  base_url() ?>/application/assets/assets/media/image/user/women_avatar1.jpg" class="rounded-circle"
                                     alt="avatar">
                            </figure>
                        </a>
                    </li>
                    <!-- end::user menu -->

                </ul>

                <!-- begin::mobile header toggler -->
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item header-toggler">
                        <a href="#" class="nav-link">
                            <i data-feather="arrow-down"></i>
                        </a>
                    </li>
                </ul>
                <!-- end::mobile header toggler -->
            </div>
        </div>

    </div>