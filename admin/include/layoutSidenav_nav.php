<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Trang Chủ
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lý Đơn hàng</div>
                            <a class="nav-link" href="DonDatHang.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-luggage-cart'></i></div>
                                Đơn hàng
                            </a>
                            <!-- thêm mới -->
                            <div class="sb-sidenav-menu-heading">Quản lý sản phẩm</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Loại sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="catadd.php">Thêm loại sản phẩm</a>
                                    <a class="nav-link" href="cat.php">Danh sách loại sản phẩm</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Sản phẩm
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="productadd.php">Thêm sản phẩm</a>
                                    <a class="nav-link" href="productlist.php">Danh sách sản phẩm</a>
                                </nav>
                            </div>
                            
                            <!---->
                            <div class="sb-sidenav-menu-heading">Quản lý tài khoản</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Tài khoản
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Admin
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="account.php">Danh Sách tài khoản</a>
                                            <a class="nav-link" href="register.php">Đăng ký tài khoản</a>
                                            <a class="nav-link" href="password.php">Quên mật khẩu</a>
                                        </nav>
                                    </div>
                                    
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Quản lý Khách hàng</div>
                            <a class="nav-link" href="customers.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-list'></i></i></div>
                                Danh sách khách hàng
                            </a>
                            <a class="nav-link" href="comment.php">
                                <div class="sb-nav-link-icon"><i class='far fa-comment-dots'></i></i></div>
                                Bình luận
                            </a>
                            <a class="nav-link" href="DanhGia.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-star-half-alt'></i></div>
                                Đánh giá sản phẩm
                            </a>
                            <div class="sb-sidenav-menu-heading">Quản lý Nhà cung cấp sản phẩm</div>
                            <a class="nav-link" href="nhasanxuatlist.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Nhà sản xuất
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Staff Camper Store
                    </div>
                </nav>