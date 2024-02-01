        <!-- ========== Right Sidebar Start ========== -->
        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Right Menu Start -->
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li>
                            <a href="#" class="waves-effect">
                                <i class="bx bx-home-circle"></i>
                                <span key="t-dashboards">
{{--                                    {{ __('messages.dashboard') }}--}}
                                dashboard</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bxs-city"></i>
                                <span key="t-sites">
                                    Corners
                                </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.corners.index') }}" key="t-home">
                                        All Corners
                                    </a></li>
                                <li><a href="{{ route('admin.corners.create') }}" key="t-about">
                                        Add Corner
                                    </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-group"></i>
                                <span key="t-categories">
                                    Staff
                                </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.staff.index') }}" key="t-add-cat">
                                        View All
                                    </a></li>
                                <li><a href="{{ route('admin.staff.create') }}" key="t-view-cats">
                                        Add Staff
                                    </a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-basket"></i>
                                <span key="t-clients">
                                    Store
                                </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.store.index') }}" key="t-add-client">
                                        All Items
                                    </a></li>
                                <li><a href="{{ route('admin.store.create') }}" key="t-view-client">
                                        Add Item
                                    </a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="bx bx-file"></i>
                                <span key="t-clients">
                                    Reports
                                </span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="{{ route('admin.daily-reports.index') }}" key="t-add-client">
                                        <i class="bx bxs-data"></i>
                                        Daily Report
                                    </a></li>
                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="bx bx-group"></i>
                                        Hr
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('admin.hr-reports.index') }}" key="t-add-client">
                                                Attendance Report
                                            </a></li>
                                        <li><a href="{{ route('admin.salary.index') }}" key="t-view-client">
                                                Salary Report
                                            </a></li>
                                    </ul>
                                </li>
                                <li><a href="#" key="t-view-client">
                                        Customer Reviews report
                                    </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- Sidebar -->
            </div>
        </div>
        <!-- Right Sidebar End -->
