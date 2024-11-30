<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('dist/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item active">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-alert.html') }}">Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-badge.html') }}">Badge</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-breadcrumb.html') }}">Breadcrumb</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-button.html') }}">Button</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-card.html') }}">Card</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-carousel.html') }}">Carousel</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-dropdown.html') }}">Dropdown</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-list-group.html') }}">List Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-modal.html') }}">Modal</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-navs.html') }}">Navs</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-pagination.html') }}">Pagination</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-progress.html') }}">Progress</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-spinner.html') }}">Spinner</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/component-tooltip.html') }}">Tooltip</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Extra Components</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/extra-component-avatar.html') }}">Avatar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/extra-component-sweetalert.html') }}">Sweet Alert</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/extra-component-toastify.html') }}">Toastify</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/extra-component-rating.html') }}">Rating</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/extra-component-divider.html') }}">Divider</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Layouts</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/layout-default.html') }}">Default Layout</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/layout-vertical-1-column.html') }}">1 Column</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/layout-vertical-navbar.html') }}">Vertical with Navbar</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/layout-horizontal.html') }}">Horizontal Menu</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-title">Forms &amp; Tables</li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-input.html') }}">Input</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-input-group.html') }}">Input Group</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-select.html') }}">Select</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-radio.html') }}">Radio</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-checkbox.html') }}">Checkbox</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-element-textarea.html') }}">Textarea</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ asset('dist/form-layout.html') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Form Layout</span>
                    </a>
                </li>
                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pen-fill"></i>
                        <span>Form Editor</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-editor-quill.html') }}">Quill</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-editor-ckeditor.html') }}">CKEditor</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="{{ asset('dist/form-editor-summernote.html') }}">Summernote</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ asset('dist/table.html') }}" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Table</span>
                    </a>
                </li>
                <li class="sidebar-item ">
                    <a href="{{ asset('dist/table-datatable.html') }}" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Datatable</span>
                    </a>
                </li>
                <!-- Tambahkan item sidebar lainnya sesuai kebutuhan -->
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>