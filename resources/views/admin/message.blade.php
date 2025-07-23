<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
    <!-- Pusher JS -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

    <style>
        .conversation-item:hover { background-color: #f8f9fa; }
        #message-body { scroll-behavior: smooth; }
        .login-container { max-width: 400px; margin: 100px auto; }
        .hidden { display: none !important; }
        .avatar { width: 40px; height: 40px; border-radius: 50%; object-fit: cover; }
        #loading-spinner { 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0,0,0,0.1); 
            display: flex; 
            justify-content: center; 
            align-items: center; 
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Loading Spinner - Placed first to ensure it's on top -->
    <div id="loading-spinner" class="hidden">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    <!-- Login Form -->
    <div id="login-container" class="login-container">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <form id="login-form">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" required value="doctor@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" required value="password123">
                    </div>
                    <div class="mb-3">
                        <label for="user-type" class="form-label">I am a</label>
                        <select class="form-select" id="user-type" required>
                            <option value="">Select user type</option>
                            <option value="doctor" selected>Doctor</option>
                            <option value="patient">Patient</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div id="login-error" class="alert alert-danger mt-3 hidden"></div>
            </div>
        </div>
    </div>

    <!-- Chat Interface -->
    <div id="chat-interface" class="container-fluid mt-4 hidden">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Chat Application</h4>
            <div class="d-flex align-items-center gap-3">
                <h2 id="authusername" class="mb-0 fw-bold" style="font-size: 1.5rem; text-decoration: underline;">
                    User Name
                </h2>
                <button id="logout-btn" class="btn btn-sm btn-outline-danger">Logout</button>
            </div>
        </div>
        
        <div class="row">
            <!-- Sidebar: Conversation List -->
            <div class="col-md-4 border-end" id="conversation-list" style="height: 80vh; overflow-y: auto;">
                <div class="text-center text-muted p-3">Please login to view conversations</div>
            </div>

            <!-- Chat Area -->
            <div class="col-md-8 d-flex flex-column" style="height: 80vh;">
                <div class="border-bottom py-2 px-3 bg-light" id="chat-header">
                    <div class="text-center text-muted">Select a conversation</div>
                </div>

                <div class="flex-grow-1 overflow-auto p-3" id="message-body" style="background-color: #f8f9fa;">
                    <div class="text-center text-muted mt-5">No conversation selected</div>
                </div>

               <form id="message-form" class="border-top p-3 d-flex align-items-center">
                    <!-- Remove this line:
                    <input type="file" id="file-input" name="file_url" class="form-control me-2" style="max-width: 200px;" disabled>
                    -->
                    <input type="text" name="message" class="form-control me-2" placeholder="Type your message..." >
                    <button type="submit" class="btn btn-primary" >Send</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Global variables
        let path = "https://main.denterpro.com/api/";
        let authToken = localStorage.getItem('authToken');
        let userId = localStorage.getItem('userId');
        let userType = localStorage.getItem('userType');
        let currentReceiverId = null;
        let currentReceiverType = null;

        // DOM Elements
        const loginContainer = document.getElementById('login-container');
        const chatInterface = document.getElementById('chat-interface');
        const loginForm = document.getElementById('login-form');
        const loginError = document.getElementById('login-error');
        const logoutBtn = document.getElementById('logout-btn');
        const loadingSpinner = document.getElementById('loading-spinner');
        
        const username = document.getElementById('authusername');
        const storedUserName = localStorage.getItem('userName');
        
        username.innerHTML = storedUserName ? storedUserName : '';
        

        // Initialize the application
        document.addEventListener('DOMContentLoaded', function() {
            checkAuthStatus();
            
            // Login form submission
            loginForm.addEventListener('submit', handleLogin);
            
            // Logout button
            logoutBtn.addEventListener('click', handleLogout);
        });

        // Check if user is already authenticated
        function checkAuthStatus() {
            if (authToken && userId && userType) {
                // User is logged in, show chat interface
                loginContainer.classList.add('hidden');
                chatInterface.classList.remove('hidden');
                initializeChat();
            } else {
                // User is not logged in, show login form
                loginContainer.classList.remove('hidden');
                chatInterface.classList.add('hidden');
            }
        }

        // Handle login
      async function handleLogin(e) {
    e.preventDefault();

    const user = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const type = document.getElementById('user-type').value;

    showLoading(true);
    loginError.classList.add('hidden');

    try {
        const response = await fetch(path+'login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ user, password })
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Login failed');
        }

        const data = await response.json();

        // Save token and user info to localStorage
        localStorage.setItem('authToken', data.token);
        localStorage.setItem('userId', data.user.id);
        localStorage.setItem('userType', data.userType);
        localStorage.setItem('userName', data.user.name);
        localStorage.setItem('userEmail', data.user.email);

        // Optionally store user info as a whole object:
        localStorage.setItem('userInfo', JSON.stringify(data.user));

        // Set globals if needed
        authToken = data.token;
        userId = data.user.id;
        userType = data.userType;

        // Switch to chat interface
        loginContainer.classList.add('hidden');
        chatInterface.classList.remove('hidden');
        username.innerHTML = localStorage.getItem('userName');
        initializeChat();

    } catch (error) {
        loginError.textContent = error.message || 'Login failed';
        loginError.classList.remove('hidden');
    } finally {
        showLoading(false);
    }
}


        // Handle logout
        function handleLogout() {
            localStorage.removeItem('authToken');
            localStorage.removeItem('userId');
            localStorage.removeItem('userType');
            authToken = null;
            userId = null;
            userType = null;
            chatInterface.classList.add('hidden');
            loginContainer.classList.remove('hidden');
        }

        // Initialize chat functionality
                // Initialize chat functionality
       function initializeChat() {
    document.getElementById('message-form').addEventListener('submit', handleMessageSend);

    console.log("submit");
    loadConversations();

   
}


function appendMessage(msg, isSender) {
    console.log(msg)
    const msgBody = document.getElementById('message-body');
    const msgClass = isSender ? 'text-end' : 'text-start';
    const bgClass = isSender ? 'bg-primary text-white' : 'bg-light';

    const messageHtml = `
        <div class="mb-2 ${msgClass}">
            <div class="d-inline-block p-2 rounded ${bgClass}">
                ${msg.message}
            </div><br>
            <small class="text-muted">${formatTime(msg.created_at)}</small>
        </div>
    `;
    msgBody.innerHTML += messageHtml;
    msgBody.scrollTop = msgBody.scrollHeight;
}


        // Show/hide loading spinner
        function showLoading(show) {
            if (show) {
                loadingSpinner.classList.remove('hidden');
            } else {
                loadingSpinner.classList.add('hidden');
            }
        }

        // Fetch and display conversation list
  async function loadConversations() {
    showLoading(true);

    try {
        // Print auth token for debugging
        console.log(localStorage.getItem('authToken'));

        // Fetch the conversation list from the backend
        const response = await fetch(path+'conversation-list', {
            headers: {
                'Accept': 'application/json',
                'Authorization': `Bearer ${localStorage.getItem('authToken')}`
            }
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const responseData = await response.json();
        console.log(responseData);

        // Get the actual conversation data from `responseData.data`
        const conversations = responseData.data || [];

        const listEl = document.getElementById('conversation-list');
        listEl.innerHTML = '';

        if (conversations.length > 0) {
            conversations.forEach(convo => {
                const div = document.createElement('div');
                div.className = 'p-2 border-bottom conversation-item';
                div.style.cursor = 'pointer';
                div.innerHTML = `
                    <div class="d-flex align-items-center">
                        <img src="${convo.image || 'https://via.placeholder.com/40'}" alt="User" class="avatar me-2">
                        <div>
                            <strong>${convo.name}</strong><br>
                            <small class="text-muted">${convo.last_message || ''}</small>
                        </div>
                    </div>
                `;
                div.onclick = () => openConversation(convo.id, convo.type, convo.name, convo.image);
                listEl.appendChild(div);
            });
        } else {
            listEl.innerHTML = '<div class="text-center text-muted p-3">No conversations found</div>';
        }

    } catch (error) {
        console.error('Error loading conversations:', error);
        document.getElementById('conversation-list').innerHTML =
            '<div class="text-center text-danger p-3">Error loading conversations</div>';
    } finally {
        showLoading(false);
    }
}


        // Format time for display
        function formatTime(timestamp) {
            const date = new Date(timestamp);
            return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

   async function handleMessageSend(e) {
    e.preventDefault();

    const form = e.target;
    const messageInput = form.elements.message;



    const message = messageInput.value.trim();

    if (!message) {
        alert('Please enter a message');
        return;
    }

    if (!currentReceiverId || !currentReceiverType) {
        alert('No conversation selected');
        return;
    }

    const payload = {
        message,
        receiver_id: currentReceiverId,
        receiver_type: currentReceiverType
    };

    showLoading(true);

    try {
        const response = await fetch(path+'send-message', {
            method: 'POST',
            headers: {
                'Authorization': `Bearer ${authToken}`,
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(payload)
        });

        if (!response.ok) {
            const errorData = await response.json();
            throw new Error(errorData.message || 'Failed to send message');
        }

        const result = await response.json();

        // Add sent message to chat UI
        const msgBody = document.getElementById('message-body');
        msgBody.innerHTML += `
            <div class="mb-2 text-end">
                <div class="d-inline-block p-2 rounded bg-primary text-white">
                    ${message}
                </div><br>
                <small class="text-muted">${formatTime(new Date().toISOString())}</small>
            </div>
        `;
        msgBody.scrollTop = msgBody.scrollHeight;

        form.reset();
    } catch (error) {
        console.error('Error sending message:', error);
        alert('Error: ' + error.message);
    } finally {
        showLoading(false);
    }
}






function openConversation(receiverId, receiverType, name, image) {
    currentReceiverId = receiverId;
    currentReceiverType = receiverType;

    // Set chat header info
    const chatHeader = document.getElementById('chat-header');
    chatHeader.innerHTML = `
        <div class="d-flex align-items-center">
            <img src="${image || 'https://via.placeholder.com/40'}" class="avatar me-2">
            <strong>${name}</strong>
        </div>
    `;

    // Clear chat body and enable form
    const msgBody = document.getElementById('message-body');
    msgBody.innerHTML =  `<div class="text-center text-danger mt-5">Failed load messages</div>`;

    const form = document.getElementById('message-form');
    form.querySelector('input[name="message"]').disabled = false;
    // form.querySelector('input[type="file"]').disabled = false;
    form.querySelector('button').disabled = false;

    // Load chat history
    loadMessages(receiverId, receiverType);
    
    
     const senderId = userId;
     
     const myId = userId; // current logged-in user
    const otherId = receiverId;
    
    const [id1, id2] = [myId, otherId].sort((a, b) => a - b); // Always smallest first
    const channelName = `public-user.${id1}.${id2}`;
    
    
    // const channelName = `public-user.${senderId}.${receiverId}`;
    
    console.log(channelName)

    const pusher = new Pusher('c72b33934ae473ff6448', {
        cluster: 'ap1',
        encrypted: true
    });

    const channel = pusher.subscribe(channelName);

    channel.bind('new-message', function(data) {
         if (data.sender_id == myId) return;
        console.log("Message received: ", data);
        const isSender = data.sender_id == senderId;
        appendMessage(data, isSender);
    });
    
     // Setup Pusher channel
    // const senderId = userId;
    
    // const myId = senderId; // The currently logged in user
    // const otherId = receiverId; // The user you're chatting with
    
    // const channelsToSubscribe = [
    //     `public-user.${myId}.${otherId}`,
    //     `public-user.${otherId}.${myId}`
    // ];
    
    // const pusher = new Pusher('c72b33934ae473ff6448', {
    //     cluster: 'ap1',
    //     encrypted: true
    // });
    
    // channelsToSubscribe.forEach(channelName => {
    //     const channel = pusher.subscribe(channelName);
    
    //     channel.bind('new-message', function(data) {
    //         const isSender = data.sender_id == myId;
    //         appendMessage(data, isSender);
    //     });
    // });

}

async function loadMessages(receiverId, receiverType) {
    try {
        const response = await fetch(path+`get-messages?user_id=${receiverId}&user_type=${receiverType}`, {
            headers: {
                'Authorization': `Bearer ${authToken}`,
                'Accept': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Failed to fetch messages');
        }

        const data = await response.json();
        const messages = data.data || [];

        const msgBody = document.getElementById('message-body');
        msgBody.innerHTML = ''; // Clear existing content

        if (messages.length === 0) {
            msgBody.innerHTML = `<div class="text-center text-muted mt-5">No messages found</div>`;
            return;
        }

        messages.forEach(msg => {
            const isSender = msg.sender_id == userId;
            const msgClass = isSender ? 'text-end' : 'text-start';
            const bgClass = isSender ? 'bg-primary text-white' : 'bg-light';
            const messageHtml = `
                <div class="mb-2 ${msgClass}">
                    <div class="d-inline-block p-2 rounded ${bgClass}">
                        ${msg.message}
                    </div><br>
                    <small class="text-muted">${formatTime(msg.created_at)}</small>
                </div>
            `;
            msgBody.innerHTML += messageHtml;
        });

        // Scroll to bottom
        msgBody.scrollTop = msgBody.scrollHeight;

    } catch (error) {
        console.error('Error loading messages:', error);
        document.getElementById('message-body').innerHTML =
            '<div class="text-center text-danger mt-3">Failed to load messages</div>';
    }
}



    </script>
</body>
</html>