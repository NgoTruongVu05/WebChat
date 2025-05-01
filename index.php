<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
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
        <div class="friend-header">👥 Danh sách bạn bè</div>
        <div id="friendList">
          <div class="friend-item" onclick="startChat('Mai Anh')">
            <img src="https://i.pravatar.cc/30?img=1" alt="Mai Anh"/>
            <span>Mai Anh</span>
          </div>
          <div class="friend-item" onclick="startChat('Bảo Trâm')">
            <img src="https://i.pravatar.cc/30?img=2" alt="Bảo Trâm"/>
            <span>Bảo Trâm</span>
          </div>
          <div class="friend-item" onclick="startChat('Tuấn Kiệt')">
            <img src="https://i.pravatar.cc/30?img=3" alt="Tuấn Kiệt"/>
            <span>Tuấn Kiệt</span>
          </div>
        </div>
      </div>

      <!-- Khu vực chat -->
      <div class="col-md-8 col-lg-9 p-0">
        <div class="chat-container">
          <div class="chat-header" id="chatHeader">
            💬 Dâu & Bơ Chat Online
          </div>
          <div class="chat-messages" id="chatMessages">
            <div class="chat-message bot">Xin chào! Bạn cần hỗ trợ gì hôm nay?</div>
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
  <script>
    function sendMessage() {
      const input = document.getElementById('messageInput');
      const msg = input.value.trim();
      if (msg !== '') {
        const chatBox = document.getElementById('chatMessages');

        const msgDiv = document.createElement('div');
        msgDiv.classList.add('chat-message', 'user');
        msgDiv.textContent = msg;
        chatBox.appendChild(msgDiv);

        const reply = document.createElement('div');
        reply.classList.add('chat-message', 'bot');
        reply.textContent = 'Bot: Bạn vừa nói "' + msg + '"';
        setTimeout(() => {
          chatBox.appendChild(reply);
          chatBox.scrollTop = chatBox.scrollHeight;
        }, 500);

        input.value = '';
        chatBox.scrollTop = chatBox.scrollHeight;
      }
    }

    function startChat(friendName) {
      document.getElementById('chatHeader').textContent = `💬 Đang chat với ${friendName}`;
      const chatBox = document.getElementById('chatMessages');
      chatBox.innerHTML = `<div class="chat-message bot">Chào ${friendName}! Bạn muốn nói gì?</div>`;
    }

    document.getElementById('messageInput').addEventListener('keypress', function (e) {
      if (e.key === 'Enter') {
        sendMessage();
      }
    });
  </script>
</body>
</html>
