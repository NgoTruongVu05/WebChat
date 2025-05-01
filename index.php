<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dâu & Bơ Chat</title>
    <link rel="stylesheet" href="vender/css/bootstrap.min.css">
    <link rel="stylesheet" href="vender/css/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>

<body>
    <div class="container-fluid h-100">
        <div class="row h-100">
            <!-- Sidebar bạn bè -->
            <div class="col-md-4 col-lg-3 friend-sidebar p-0 d-none d-md-block">
                <div class="friend-header">
                    <span>Danh sách bạn bè</span>
                    <button type="button"><i class="fas fa-user-plus"></i></button>
                </div>
                <div id="friendList">
                    <div class="friend-item" onclick="startChat('Mai Anh')">
                        <img src="" alt="" />
                        <span>Turi</span>
                    </div>
                    <div class="friend-item" onclick="startChat('Bảo Trâm')">
                        <img src="" alt="" />
                        <span>Dâu iu</span>
                    </div>
                    <div class="friend-item" onclick="startChat('Tuấn Kiệt')">
                        <img src="" alt="" />
                        <span>Anh Bơ</span>
                    </div>
                </div>
            </div>

            <!-- Khu vực chat -->
            <div class="col-md-8 col-lg-9 p-0">
                <div class="chat-container">
                    <div class="chat-header d-flex justify-content-between align-items-center px-3" id="chatHeader">
                        <div>💬 Dâu & Bơ Chat Online</div>
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i> Tài khoản
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="taikhoan/trangcanhan.php"><i class="fas fa-user"></i> Trang cá nhân</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="chat-messages" id="chatMessages">
                        <div class="chat-message">
                            <div class="bot">
                                Xin chào! Bạn cần hỗ trợ gì hôm nay
                            </div>
                        </div>
                    </div>
                    <div class="chat-input">
                        <input type="text" id="messageInput" placeholder="Nhập tin nhắn...">
                        <button onclick="sendMessage()">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="vender/js/bootstrap.bundle.min.js"></script>
    <script src="asset/js/chat.js"></script>
</body>

</html>