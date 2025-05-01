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