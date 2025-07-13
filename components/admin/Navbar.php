<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav
    class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-white flex flex-wrap items-center justify-between relative md:w-64 z-10 py-4 px-6">
    <div
        class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto">
        <button
            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
            type="button"
            onclick="toggleNavbar('example-collapse-sidebar')">
            <i class="fas fa-bars"></i>
        </button>
        <a class="flex flex-col items-center text-blueGray-600 font-bold text-sm uppercase p-4 px-0">
            <img src="../../src/images/Logo.png" alt="Logo" class="w-24 h-24 mb-2">
            <span>POS PAUD MAWAR HIDAYAH</span>
        </a>
        <ul class="md:hidden items-center flex flex-wrap list-none">
            <li class="inline-block relative">
                <a
                    class="text-blueGray-500 block py-1 px-3"
                    href="#pablo"
                    onclick="openDropdown(event,'notification-dropdown')"><i class="fas fa-bell"></i></a>
                <div
                    class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="notification-dropdown">
                    <a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another action</a><a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something else here</a>
                    <div
                        class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated link</a>
                </div>
            </li>
            <li class="inline-block relative">
                <a
                    class="text-blueGray-500 block"
                    href="#pablo"
                    onclick="openDropdown(event,'user-responsive-dropdown')">
                    <div class="items-center flex">
                        <span
                            class="w-12 h-12 text-sm text-white bg-blueGray-200 inline-flex items-center justify-center rounded-full"><img
                                alt="..."
                                class="w-full rounded-full align-middle border-none shadow-lg"
                                src="../../assets/img/team-1-800x800.jpg" /></span>
                    </div>
                </a>
                <div
                    class="hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
                    id="user-responsive-dropdown">
                    <a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Action</a><a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Another action</a><a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Something else here</a>
                    <div
                        class="h-0 my-2 border border-solid border-blueGray-100"></div>
                    <a
                        href="#pablo"
                        class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-blueGray-700">Seprated link</a>
                </div>
            </li>
        </ul>
        <div
            class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:shadow-none shadow absolute top-0 left-0 right-0 z-40 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded hidden"
            id="example-collapse-sidebar">
            <div
                class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-blueGray-200">
                <div class="flex flex-wrap">
                    <div class="w-6/12">
                        <a
                            class="md:block text-left md:pb-2 text-blueGray-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0">
                            POS PAUD MAWAR HIDAYAH
                        </a>
                    </div>
                    <div class="w-6/12 flex justify-end">
                        <button
                            type="button"
                            class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-transparent rounded border border-solid border-transparent"
                            onclick="toggleNavbar('example-collapse-sidebar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Divider -->
            <hr class="my-4 md:min-w-full" />
            <!-- Heading -->
            <h6
                class="md:min-w-full text-blueGray-500 text-sm uppercase font-bold block pt-1 pb-4 no-underline">
                Menu Pilihan
            </h6>
            <!-- Navigation -->
            <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                <li class="items-center">
                    <a
                        href="<?php echo $currentPage == 'dashboard.php' ? 'javascript:void(0);' : './dashboard.php'; ?>"
                        class="text-sm uppercase py-3 font-bold block <?php echo $currentPage == 'dashboard.php' ? 'text-secondary-500 hover:text-secondary-600' : 'text-blueGray-700 hover:text-blueGray-500'; ?>">
                        <i class="fas fa-tv mr-2 text-sm opacity-75"></i> Dashboard
                    </a>
                </li>

                <li class="items-center">
                    <a
                        href="<?php echo $currentPage == 'daftar_pengguna.php' ? 'javascript:void(0);' : './daftar_pengguna.php'; ?>"
                        class="text-sm uppercase py-3 font-bold block <?php echo $currentPage == 'daftar_pengguna.php' ? 'text-secondary-500 hover:text-secondary-600' : 'text-blueGray-700 hover:text-blueGray-500'; ?>">
                        <i class="fas fa-table mr-2 text-sm <?php echo $currentPage == 'daftar_pengguna.php' ? 'opacity-75' : 'text-blueGray-300'; ?>"></i> Daftar Pengguna
                    </a>
                </li>

                <li class="items-center">
                    <a
                        href="<?php echo $currentPage == 'ranking_tes.php' ? 'javascript:void(0);' : './ranking_tes.php'; ?>"
                        class="text-sm uppercase py-3 font-bold block <?php echo $currentPage == 'ranking_tes.php' ? 'text-secondary-500 hover:text-secondary-600' : 'text-blueGray-700 hover:text-blueGray-500'; ?>">
                        <i class="fas fa-chart-bar mr-2 text-sm <?php echo $currentPage == 'ranking_tes.php' ? 'opacity-75' : 'text-blueGray-300'; ?>"></i> Ranking Tes
                    </a>
                </li>

                <li class="items-center">
                    <a
                        href="<?php echo $currentPage == 'statistik_tes.php' ? 'javascript:void(0);' : './statistik_tes.php'; ?>"
                        class="text-sm uppercase py-3 font-bold block <?php echo $currentPage == 'statistik_tes.php' ? 'text-secondary-500 hover:text-secondary-600' : 'text-blueGray-700 hover:text-blueGray-500'; ?>">
                        <i class="fas fa-chart-pie mr-2 text-sm <?php echo $currentPage == 'statistik_tes.php' ? 'opacity-75' : 'text-blueGray-300'; ?>"></i> Statistik Tes
                    </a>
                </li>

                <li class="items-center">
                    <a
                        href="<?php echo $currentPage == 'pengaturan_akun.php' ? 'javascript:void(0);' : './pengaturan_akun.php'; ?>"
                        class="text-sm uppercase py-3 font-bold block <?php echo $currentPage == 'pengaturan_akun.php' ? 'text-secondary-500 hover:text-secondary-600' : 'text-blueGray-700 hover:text-blueGray-500'; ?>">
                        <i class="fas fa-tools mr-2 text-sm <?php echo $currentPage == 'pengaturan_akun.php' ? 'opacity-75' : 'text-blueGray-300'; ?>"></i> Pengaturan Akun
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>