<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chatbot AI - Portal Pembelajaran Sejarah</title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
          integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* Custom Chatbot Styles */
        .chatbot-container {
            max-width: 800px;
            margin: 30px auto;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #f9f9f9;
        }
        
        .chatbot-header {
            background: #3f51b5; /* Warna biru untuk guru */
            color: white;
            padding: 15px 20px;
            display: flex;
            align-items: center;
        }
        
        .chatbot-header h3 {
            margin: 0;
            flex-grow: 1;
        }
        
        .chatbot-header i {
            font-size: 1.5rem;
            margin-right: 10px;
            width: 24px;
            text-align: center;
        }
        
        #chatbox {
            height: 400px;
            padding: 20px;
            overflow-y: auto;
            background: white;
            display: flex;
            flex-direction: column;
        }
        
        .message {
            max-width: 70%;
            margin-bottom: 15px;
            padding: 10px 15px;
            border-radius: 18px;
            line-height: 1.4;
            position: relative;
            animation: fadeIn 0.3s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .user-message {
            align-self: flex-end;
            background: #e3f2fd;
            color: #0d47a1;
            border-bottom-right-radius: 5px;
        }
        
        .bot-message {
            align-self: flex-start;
            background: #f1f1f1;
            color: #333;
            border-bottom-left-radius: 5px;
        }
        
        .message-time {
            display: block;
            font-size: 0.7rem;
            color: #666;
            margin-top: 5px;
            text-align: right;
        }
        
        .chatbot-input-container {
            padding: 15px;
            background: #f5f5f5;
            border-top: 1px solid #ddd;
        }
        
        .chatbot-input-group {
            display: flex;
            gap: 10px;
        }
        
        #message {
            flex: 1;
            border-radius: 20px;
            padding: 10px 15px;
            border: 1px solid #ddd;
            outline: none;
            transition: all 0.3s;
            min-height: 40px;
        }
        
        #message:focus {
            border-color: #3f51b5;
            box-shadow: 0 0 0 2px rgba(63, 81, 181, 0.2);
        }
        
        #chat-form button {
            border-radius: 20px;
            padding: 0 20px;
            background: #3f51b5;
            border: none;
            color: white;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
        }
        
        #chat-form button:hover {
            background: #303f9f;
        }
        
        #chat-form button i {
            font-size: 1rem;
            margin-right: 5px;
        }
        
        .typing-indicator {
            display: inline-block;
            padding: 10px 15px;
            background: #f1f1f1;
            border-radius: 18px;
            margin-bottom: 15px;
            align-self: flex-start;
        }
        
        .typing-indicator span {
            height: 8px;
            width: 8px;
            background: #666;
            border-radius: 50%;
            display: inline-block;
            margin: 0 2px;
            animation: bounce 1.5s infinite ease-in-out;
        }
        
        .typing-indicator span:nth-child(2) {
            animation-delay: 0.2s;
        }
        
        .typing-indicator span:nth-child(3) {
            animation-delay: 0.4s;
        }
        
        @keyframes bounce {
            0%, 60%, 100% { transform: translateY(0); }
            30% { transform: translateY(-5px); }
        }
        
        /* Responsive adjustments */
        @media (max-width: 768px) {
            .chatbot-container {
                margin: 15px;
            }
            
            #chatbox {
                height: 300px;
            }
            
            .message {
                max-width: 85%;
            }
            
            .chatbot-input-group {
                flex-direction: column;
            }
            
            #chat-form button {
                width: 100%;
                padding: 8px;
            }
        }
    </style>
</head>

<body class="host_version">

    <!-- Loader -->
    <div id="preloader">
        <div class="loader-container">
            <div class="progress-br float shadow">
                <div class="progress__item"></div>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="top-navbar">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('index.html') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbars-host"
                    aria-controls="navbars-host" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbars-host">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.dashboard') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.buatmateri') }}">Buat Materi</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.buatujian') }}">Buat Ujian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.daftarujian') }}">Daftar Ujian</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('guru.penilaian') }}">Lihat Nilai</a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('guru.chatbot') }}">Chatbot AI</a></li>
                    </ul>
                    <ul class="navbar-nav">
                        <li><a class="hover-btn-new log orange" href="{{ url('logout.html') }}"><span>Logout</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="chatbot-container">
            <div class="chatbot-header">
                <i class="fas fa-robot"></i>
                <h3>Chatbot Sejarah AI</h3>
            </div>
            
            <div id="chatbox">
                <!-- Initial welcome message -->
                <div class="message bot-message">
                    Halo! Saya adalah asisten AI untuk pembelajaran sejarah. 
                    Saya bisa membantu menjawab pertanyaan seputar materi sejarah. 
                    Apa yang bisa saya bantu?
                    <span class="message-time">Just now</span>
                </div>
            </div>
            
            <div class="chatbot-input-container">
                <form id="chat-form" class="chatbot-input-group">
                    @csrf
                    <input type="text" id="message" class="form-control" placeholder="Ketik pertanyaan Anda..." autocomplete="off">
                    <button type="submit" id="send-button">
                        <i class="fas fa-paper-plane"></i> Kirim
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer text-center">
        <div class="container">
            <p class="footer-company-name">© 2023 Portal Pembelajaran Sejarah. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Scroll to top -->
    <a href="#" id="scroll-to-top" class="dmtop global-radius"><i class="fa fa-angle-up"></i></a>

    <!-- JS Scripts -->
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const chatForm = document.getElementById('chat-form');
            const messageInput = document.getElementById('message');
            const chatbox = document.getElementById('chatbox');
            const sendButton = document.getElementById('send-button');
            let chatHistory = [];
            
            function addMessage(text, isUser) {
                const messageDiv = document.createElement('div');
                messageDiv.className = isUser ? 'message user-message' : 'message bot-message';
                
                const time = new Date();
                const timeString = time.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                
                messageDiv.innerHTML = `
                    ${text}
                    <span class="message-time">${timeString}</span>
                `;
                
                chatbox.appendChild(messageDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
                
                return messageDiv;
            }
            
            function showTypingIndicator() {
                const typingDiv = document.createElement('div');
                typingDiv.className = 'typing-indicator';
                typingDiv.id = 'typing-indicator';
                typingDiv.innerHTML = `
                    <span></span>
                    <span></span>
                    <span></span>
                `;
                chatbox.appendChild(typingDiv);
                chatbox.scrollTop = chatbox.scrollHeight;
                return typingDiv;
            }
            
            function hideTypingIndicator() {
                const typingDiv = document.getElementById('typing-indicator');
                if (typingDiv) {
                    typingDiv.remove();
                }
            }
            
            chatForm.addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const message = messageInput.value.trim();
                if (message === '') return;
                
                addMessage(message, true);
                messageInput.value = '';
                
                showTypingIndicator();
                sendButton.disabled = true;
                
                try {
                    const response = await fetch("{{ route('chatbot.handle') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value,
                            'Accept': 'application/json'
                        },
                        body: JSON.stringify({
                            message: message,
                            history: chatHistory
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (!response.ok) {
                        throw new Error(data.message || 'Terjadi kesalahan');
                    }
                    
                    chatHistory = data.history || [];
                    hideTypingIndicator();
                    
                    if (data.response) {
                        addMessage(data.response, false);
                    } else {
                        addMessage("Maaf, saya tidak mengerti pertanyaan Anda. Bisa diulangi dengan lebih jelas?", false);
                    }
                    
                } catch (error) {
                    console.error('Error:', error);
                    hideTypingIndicator();
                    addMessage("Maaf, sedang ada gangguan teknis. Silakan coba lagi nanti.", false);
                } finally {
                    sendButton.disabled = false;
                    messageInput.focus();
                }
            });
            
            messageInput.focus();
            
            messageInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter' && !e.shiftKey) {
                    e.preventDefault();
                    chatForm.dispatchEvent(new Event('submit'));
                }
            });
        });
    </script>
</body>

</html>