@extends('layouts.Nav-Bar_Inversionista')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emprende Link - Chat</title>
    <link rel="icon" href="img/logoCuadrado.png" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/chat.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>



    <div class="chat-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Chats</h2>
                <div class="sidebar-actions">
                    <button class="action-button" id="newContactBtn" title="Nuevo contacto">
                       <a href="ListaUsuarios.html"> <i class="fas fa-user-plus"></i></a>
                    </button>
                    <button class="action-button" id="blockedListBtn" title="Contactos bloqueados">
                        <i class="fas fa-ban"></i>
                    </button>
                </div>
            </div>

            <div class="search-container">
                <div class="search-wrapper">
                    <input type="text" class="search-input" id="searchInput" placeholder="Buscar...">
                    <button class="search-type" id="searchTypeBtn" title="Tipo de búsqueda">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="contacts-list" id="contactsList">
                <!-- Se llenará con JavaScript -->
            </div>
        </aside>

        <main class="chat-area">
            <header class="chat-header">
                <div class="chat-header-left">
                    <button class="toggle-sidebar" aria-label="Toggle sidebar" aria-expanded="false">
                        <i class="fas fa-bars"></i>
                    </button>
                    <img src="images/PERFIL-0.png" alt="" class="contact-avatar">
                    <div class="chat-header-info">
                        <h2 class="chat-title">Kevin Targaryen</h2>
                        <p class="chat-subtitle">En línea</p>
                    </div>
                </div>
                <div class="chat-header-actions">
                    <button class="action-button" id="searchChatBtn" title="Buscar en chat">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="action-button" id="clearChatBtn" title="Vaciar chat">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </header>

            <div class="messages-container" id="messagesContainer">
                <!-- Se llenará con JavaScript -->
            </div>

            <div class="typing-indicator">
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
                <div class="typing-dot"></div>
            </div>

            <div class="chat-input-area">
                <div class="attachment-options">
                    <button class="attachment-button" id="fileBtn" title="Adjuntar archivo">
                        <i class="fas fa-paperclip"></i>
                    </button>
                    <button class="attachment-button" id="imageBtn" title="Enviar imagen">
                        <i class="fas fa-image"></i>
                    </button>
                    <button class="attachment-button" id="audioBtn" title="Enviar audio">
                        <i class="fas fa-microphone"></i>
                    </button>
                    <button class="attachment-button" id="emojiBtn" title="Emojis">
                        <i class="fas fa-smile"></i>
                    </button>
                </div>
                <input type="text" class="chat-input" id="messageInput" placeholder="Escribe un mensaje...">
                <button class="attachment-button" id="sendBtn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>

            <div class="emoji-picker" id="emojiPicker">
                <!-- Se inicializará con JavaScript -->
            </div>
        </main>
    </div>

    <!-- Modales -->
    <div class="modal" id="searchModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Buscar en el chat</h3>
                <button class="modal-close">&times;</button>
            </div>
            <input type="text" class="search-input" placeholder="Buscar mensajes...">
            <div class="search-results">
                <!-- Se llenará con JavaScript -->
            </div>
        </div>
    </div>

    <div class="modal" id="customizeModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Personalizar chat</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="customize-options">
                <!-- Se llenará con JavaScript -->
            </div>
        </div>
    </div>

    <div class="modal" id="blockedModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Contactos bloqueados</h3>
                <button class="modal-close">&times;</button>
            </div>
            <div class="blocked-list">
                <!-- Se llenará con JavaScript -->
            </div>
        </div>
    </div>

<script>
    // Estado global de la aplicación
const state = {
    contacts: [
        {
            id: 1,
            name: 'Kevin Targaryen',
            avatar: 'images/PERFIL-1.png',
            lastMessage: 'Gracias por la información',
            isOnline: true,
            unreadCount: 2,
            lastSeen: '12:30'
        },
        {
            id: 2,
            name: 'Kevin Alexis',
            avatar: 'images/PERFIL-0.png',
            lastMessage: '¿Podemos agendar una reunión?',
            isOnline: false,
            unreadCount: 0,
            lastSeen: '11:45'
        },
        {
            id: 3,
            name: 'María González',
            avatar: 'LINK/PERFIL-2.png',
            lastMessage: 'El proyecto está listo',
            isOnline: true,
            unreadCount: 5,
            lastSeen: 'Ahora'
        },
        {
            id: 4,
            name: 'Juan Pérez',
            avatar: 'LINK/PERFIL-3.png',
            lastMessage: 'Revisa los documentos',
            isOnline: false,
            unreadCount: 1,
            lastSeen: '10:15'
        },
        {
            id: 5,
            name: 'Ana López',
            avatar: 'LINK/PERFIL-4.png',
            lastMessage: '¿Cuándo es la próxima reunión?',
            isOnline: true,
            unreadCount: 0,
            lastSeen: 'Ahora'
        },
        {
            id: 6,
            name: 'María González',
            avatar: 'LINK/PERFIL-2.png',
            lastMessage: 'El proyecto está listo',
            isOnline: true,
            unreadCount: 5,
            lastSeen: 'Ahora'
        },
        {
            id: 7,
            name: 'Juan Pérez',
            avatar: 'LINK/PERFIL-3.png',
            lastMessage: 'Revisa los documentos',
            isOnline: false,
            unreadCount: 1,
            lastSeen: '10:15'
        },
        {
            id: 8,
            name: 'Ana López',
            avatar: 'LINK/PERFIL-4.png',
            lastMessage: '¿Cuándo es la próxima reunión?',
            isOnline: true,
            unreadCount: 0,
            lastSeen: 'Ahora'
        }
    ],
    messages: {},
    currentChat: null,
    isTyping: false,
    searchTerm: '',
    messageSearchTerm: '',
    emojiPickerVisible: false,
    activeModals: new Set(),
    blockedContacts: new Set(),
    customization: {
        background: null,
        theme: 'light'
    }
};

// // Inicialización de la aplicación
// function initializeChat() {
//     renderContacts();
//     setupEventListeners();
//     loadMockMessages();
//     initializeModals();
// }

// Event Listeners
function setupEventListeners() {
    // Chat input
    const messageInput = document.getElementById('messageInput');
    messageInput.addEventListener('keypress', handleMessageInput);
    messageInput.addEventListener('input', handleTyping);

    // Botones principales
    document.getElementById('sendBtn').addEventListener('click', sendMessage);
    document.getElementById('emojiBtn').addEventListener('click', toggleEmojiPicker);
    document.getElementById('searchInput').addEventListener('input', handleSearch);
    document.querySelector('.toggle-sidebar').addEventListener('click', toggleSidebar);

    // Botones de acción
    document.getElementById('newContactBtn').addEventListener('click', showNewContactModal);
    document.getElementById('blockedListBtn').addEventListener('click', showBlockedModal);
    document.getElementById('searchChatBtn').addEventListener('click', showSearchModal);
    document.getElementById('customizeBtn').addEventListener('click', showCustomizeModal);
    document.getElementById('clearChatBtn').addEventListener('click', confirmClearChat);

    // Archivo y multimedia
    setupFileHandlers();

    // Cerrar modales
    document.querySelectorAll('.modal-close').forEach(button => {
        button.addEventListener('click', () => {
            const modal = button.closest('.modal');
            closeModal(modal.id);
        });
    });

    // Click fuera del emoji picker para cerrarlo
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#emojiPicker') && !e.target.closest('#emojiBtn')) {
            hideEmojiPicker();
        }
    });
}

// Renderizado de contactos
function renderContacts() {
    const contactsList = document.getElementById('contactsList');
    const filteredContacts = state.contacts
        .filter(contact => !state.blockedContacts.has(contact.id))
        .filter(contact =>
            contact.name.toLowerCase().includes(state.searchTerm) ||
            contact.lastMessage.toLowerCase().includes(state.searchTerm)
        );

    contactsList.innerHTML = filteredContacts
        .map(contact => `
            <div class="contact-item ${state.currentChat === contact.id ? 'active' : ''}"
                 onclick="selectContact(${contact.id})">
                <img src="${contact.avatar}" alt="${contact.name}" class="contact-avatar">
                <div class="contact-info">
                    <div class="contact-header">
                        <h3>${contact.name}</h3>
                        <span class="contact-time">${contact.lastSeen}</span>
                    </div>
                    <p class="contact-last-message">${contact.lastMessage}</p>
                </div>
                ${contact.isOnline ? '<span class="online-indicator"></span>' : ''}
                ${contact.unreadCount > 0 ?
                    `<span class="unread-badge">${contact.unreadCount}</span>` : ''}
                <div class="contact-options">
                    <button onclick="blockContact(${contact.id}, event)"
                            class="action-button" title="Bloquear contacto">
                        <i class="fas fa-ban"></i>
                    </button>
                </div>
            </div>
        `).join('');
}

function clearCurrentChat() {
    if (state.currentChat) {
        const confirmDelete = window.confirm('¿Estás seguro de que quieres borrar este chat?');
        if (confirmDelete) {
            state.messages[state.currentChat] = [];
            renderMessages();
            // Actualizar el último mensaje en la lista de contactos
            const contact = state.contacts.find(c => c.id === state.currentChat);
            if (contact) {
                contact.lastMessage = '';
                renderContacts();
            }
        }
    }
}

// Función para borrar el chat actual
function clearCurrentChat() {
    if (state.currentChat) {
        const confirmDelete = window.confirm('¿Estás seguro de que quieres borrar este chat?');
        if (confirmDelete) {
            state.messages[state.currentChat] = [];
            renderMessages();
            // Actualizar el último mensaje en la lista de contactos
            const contact = state.contacts.find(c => c.id === state.currentChat);
            if (contact) {
                contact.lastMessage = '';
                renderContacts();
            }
        }
    }
}

// Función mejorada para búsqueda de mensajes
function searchMessages(searchTerm) {
    if (!state.currentChat || !searchTerm) return [];

    const messages = state.messages[state.currentChat] || [];
    return messages.filter(message =>
        message.content.toLowerCase().includes(searchTerm.toLowerCase())
    );
}

// Función para mostrar resultados de búsqueda de mensajes
function showSearchResults(results) {
    const searchResults = document.querySelector('#searchModal .search-results');
    searchResults.innerHTML = results.map(message => `
        <div class="search-result-item">
            <div class="message-content">${message.content}</div>
            <div class="message-time">${message.timestamp}</div>
        </div>
    `).join('');
}

// Mejorar el modal de búsqueda
function setupSearchModal() {
    const searchInput = document.querySelector('#searchModal .search-input');
    searchInput.addEventListener('input', (e) => {
        const results = searchMessages(e.target.value);
        showSearchResults(results);
    });
}

// Mejorar el toggle del sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const chatContainer = document.querySelector('.chat-container');

    sidebar.classList.toggle('active');
    chatContainer.classList.toggle('sidebar-active');
}

// Actualizar los event listeners
function setupEventListeners() {
    // Event listeners existentes...

    // Añadir listener para borrar chat
    document.getElementById('clearChatBtn').addEventListener('click', clearCurrentChat);

    // Mejorar el listener del toggle sidebar
    document.querySelector('.toggle-sidebar').addEventListener('click', toggleSidebar);

    // Búsqueda de contactos
    document.getElementById('searchInput').addEventListener('input', handleSearch);

    // Búsqueda de mensajes
    document.getElementById('searchChatBtn').addEventListener('click', () => {
        showModal('searchModal');
        setupSearchModal();
    });

    // Cerrar modales al hacer clic fuera
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('modal')) {
            closeModal(e.target.id);
        }
    });
}

// Añadir estilos dinámicos para el sidebar responsive
// Función mejorada para manejar el toggle del sidebar
function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    const chatArea = document.querySelector('.chat-area');
    const chatContainer = document.querySelector('.chat-container');

    sidebar.classList.toggle('show-sidebar');
    chatArea.classList.toggle('hide-chat');

    // Actualizar aria-expanded para accesibilidad
    const toggleButton = document.querySelector('.toggle-sidebar');
    const isExpanded = sidebar.classList.contains('show-sidebar');
    toggleButton.setAttribute('aria-expanded', isExpanded);
}

// Añadir estilos dinámicos para el manejo responsive del sidebar
function addResponsiveStyles() {
    const style = document.createElement('style');
    style.textContent = `
        @media (max-width: 768px) {
            .chat-container {
                position: relative;
                width: 100%;
            }

            .sidebar {
                position: absolute;
                left: -100%;
                width: 100%;
                height: 100%;
                background: white;
                transition: left 0.3s ease;
                z-index: 1000;
            }

            .sidebar.show-sidebar {
                left: 0;
            }

            .chat-area {
                width: 100%;
                transition: opacity 0.3s ease;
            }

            .chat-area.hide-chat {
                opacity: 0;
                pointer-events: none;
            }

            /* Asegurar que el botón de toggle siempre sea visible */
            .toggle-sidebar {
                position: fixed;
                top: 10px;
                left: 10px;
                z-index: 1001;
                background: white;
                border-radius: 50%;
                padding: 8px;
                box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            }
        }

        /* Estilos para pantallas más grandes */
        @media (min-width: 769px) {
            .sidebar {
                position: relative;
                left: 0;
            }

            .toggle-sidebar {
                display: none;
            }
        }
    `;
    document.head.appendChild(style);
}

// Mejorar los event listeners
function setupEventListeners() {
    // Event listener para el toggle sidebar
    const toggleButton = document.querySelector('.toggle-sidebar');
    if (toggleButton) {
        toggleButton.addEventListener('click', toggleSidebar);
    }

    // Event listener para cerrar el sidebar al seleccionar un contacto en modo móvil
    document.querySelectorAll('.contact-item').forEach(contact => {
        contact.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                toggleSidebar();
            }
        });
    });

    // Event listener para manejar cambios en el tamaño de la ventana
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            const sidebar = document.querySelector('.sidebar');
            const chatArea = document.querySelector('.chat-area');
            sidebar.classList.remove('show-sidebar');
            chatArea.classList.remove('hide-chat');
        }
    });
}

// Modificar la función selectContact para manejar el sidebar en móvil
function selectContact(contactId) {
    state.currentChat = contactId;
    const contact = state.contacts.find(c => c.id === contactId);
    if (contact) {
        contact.unreadCount = 0;
    }
    renderContacts();
    renderMessages();
    updateChatHeader(contact);

    // Si estamos en móvil, cerrar el sidebar después de seleccionar un contacto
    if (window.innerWidth <= 768) {
        const sidebar = document.querySelector('.sidebar');
        const chatArea = document.querySelector('.chat-area');
        sidebar.classList.remove('show-sidebar');
        chatArea.classList.remove('hide-chat');
    }
}

// Asegurar que estos estilos y funcionalidades se inicialicen
function initializeChat() {
    addResponsiveStyles();
    setupEventListeners();
    loadMockMessages();
    setupEmojiPicker();
    renderContacts();

    if (state.contacts.length > 0) {
        selectContact(state.contacts[0].id);
    }
}


// Manejo de mensajes
function handleMessageInput(e) {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        sendMessage();
    }
}

function sendMessage() {
    const input = document.getElementById('messageInput');
    const content = input.value.trim();

    if (!content || !state.currentChat) return;

    const newMessage = {
        id: Date.now(),
        content,
        timestamp: new Date().toLocaleTimeString(),
        sent: true,
        status: 'sent',
        type: 'text'
    };

    addMessage(newMessage);
    input.value = '';
    simulateResponse();
}

function addMessage(message) {
    if (!state.messages[state.currentChat]) {
        state.messages[state.currentChat] = [];
    }
    state.messages[state.currentChat].push(message);
    renderMessages();
    updateLastMessage(message);
    scrollToBottom();
}

function renderMessages() {
    if (!state.currentChat) return;

    const container = document.getElementById('messagesContainer');
    const messages = state.messages[state.currentChat] || [];

    container.innerHTML = messages.map(message => `
        <div class="message ${message.sent ? 'sent' : 'received'} animate__animated animate__fadeIn">
            <div class="message-content">
                ${renderMessageContent(message)}
            </div>
            <div class="message-footer">
                <span class="message-time">${message.timestamp}</span>
                ${message.sent ? getStatusIcon(message.status) : ''}
            </div>
        </div>
    `).join('');
}

function renderMessageContent(message) {
    switch (message.type) {
        case 'text':
            return message.content;
        case 'image':
            return `<img src="${message.content}" alt="Image" class="message-image">`;
        case 'file':
            return `<div class="file-message">
                        <i class="fas fa-file"></i>
                        <span>${message.fileName}</span>
                    </div>`;
        default:
            return message.content;
    }
}

// Manejadores de archivos
function setupFileHandlers() {
    document.getElementById('fileBtn').addEventListener('click', () => handleFileUpload('*'));
    document.getElementById('imageBtn').addEventListener('click', () => handleFileUpload('image/*'));
    document.getElementById('audioBtn').addEventListener('click', () => handleFileUpload('audio/*'));
}

function handleFileUpload(acceptType) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = acceptType;
    input.onchange = (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const message = {
                    id: Date.now(),
                    type: file.type.startsWith('image/') ? 'image' : 'file',
                    content: file.type.startsWith('image/') ? event.target.result : file.name,
                    fileName: file.name,
                    timestamp: new Date().toLocaleTimeString(),
                    sent: true,
                    status: 'sent'
                };
                addMessage(message);
            };
            if (file.type.startsWith('image/')) {
                reader.readAsDataURL(file);
            } else {
                reader.readAsText(file);
            }
        }
    };
    input.click();
}

// Funcionalidades de contactos
function selectContact(contactId) {
    state.currentChat = contactId;
    const contact = state.contacts.find(c => c.id === contactId);
    if (contact) {
        contact.unreadCount = 0;
    }
    renderContacts();
    renderMessages();
    updateChatHeader(contact);
}

function blockContact(contactId, event) {
    event.stopPropagation();
    state.blockedContacts.add(contactId);
    renderContacts();
    renderBlockedList();
}

function unblockContact(contactId) {
    state.blockedContacts.delete(contactId);
    renderContacts();
    renderBlockedList();
}

// Modales
function showModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'flex';
    state.activeModals.add(modalId);
}

function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    modal.style.display = 'none';
    state.activeModals.delete(modalId);
}

function showSearchModal() {
    showModal('searchModal');
    document.querySelector('#searchModal .search-input').focus();
}

function showCustomizeModal() {
    showModal('customizeModal');
    renderCustomizeOptions();
}

function showBlockedModal() {
    showModal('blockedModal');
    renderBlockedList();
}

// Utilidades
function handleTyping() {
    if (!state.isTyping) {
        state.isTyping = true;
        showTypingIndicator();
        setTimeout(() => {
            state.isTyping = false;
            hideTypingIndicator();
        }, 2000);
    }
}

function showTypingIndicator() {
    const indicator = document.querySelector('.typing-indicator');
    indicator.style.display = 'flex';
}

function hideTypingIndicator() {
    const indicator = document.querySelector('.typing-indicator');
    indicator.style.display = 'none';
}

function scrollToBottom() {
    const container = document.getElementById('messagesContainer');
    container.scrollTop = container.scrollHeight;
}

function toggleSidebar() {
    const sidebar = document.querySelector('.sidebar');
    sidebar.classList.toggle('active');
}

function handleSearch(e) {
    state.searchTerm = e.target.value;
    renderContacts();
}

// Inicialización de datos mock
function loadMockMessages() {
    state.messages = {
        1: [
            {
                id: 1,
                content: '¡Hola! ¿Cómo va todo?',
                timestamp: '10:30',
                sent: false,
                status: 'read',
                type: 'text'
            },
            {
                id: 2,
                content: '¡Todo bien! Trabajando en el proyecto.',
                timestamp: '10:31',
                sent: true,
                status: 'read',
                type: 'text'
            }
        ]
    };
    state.currentChat = 1;
    renderMessages();
}

// Emoji picker
function setupEmojiPicker() {
    const commonEmojis = ['😊', '😂', '❤️', '👍', '👋', '🎉', '✨', '🔥', '😅', '🙌', '👏', '💪', '🤝', '👀', '💡', '⭐'];
    const picker = document.getElementById('emojiPicker');
    picker.innerHTML = commonEmojis.map(emoji =>
        `<div class="emoji-item" onclick="insertEmoji('${emoji}')">${emoji}</div>`
    ).join('');
}

function toggleEmojiPicker() {
    const picker = document.getElementById('emojiPicker');
    state.emojiPickerVisible = !state.emojiPickerVisible;
    picker.style.display = state.emojiPickerVisible ? 'grid' : 'none';
}

function insertEmoji(emoji) {
    const input = document.getElementById('messageInput');
    input.value += emoji;
    input.focus();
}

// Funciones auxiliares para el manejo de estados y mensajes
function getStatusIcon(status) {
    switch (status) {
        case 'sent':
            return '<i class="fas fa-check"></i>';
        case 'delivered':
            return '<i class="fas fa-check-double"></i>';
        case 'read':
            return '<i class="fas fa-check-double" style="color: #34b7f1;"></i>';
        default:
            return '';
    }
}

function updateLastMessage(message) {
    const contact = state.contacts.find(c => c.id === state.currentChat);
    if (contact) {
        contact.lastMessage = message.content;
        renderContacts();
    }
}

// Simulación de respuesta automática
function simulateResponse() {
    setTimeout(() => {
        const responses = [
            "¡Gracias por tu mensaje!",
            "Vale, entiendo.",
            "¿Necesitas algo más?",
            "Me parece bien.",
            "¡Perfecto!"
        ];
        const response = {
            id: Date.now(),
            content: responses[Math.floor(Math.random() * responses.length)],
            timestamp: new Date().toLocaleTimeString(),
            sent: false,
            status: 'read',
            type: 'text'
        };
        addMessage(response);
    }, 1000);
}

// Mejorar la función de envío de mensajes
function sendMessage() {
    const input = document.getElementById('messageInput');
    const content = input.value.trim();

    if (!content || !state.currentChat) return;

    const newMessage = {
        id: Date.now(),
        content,
        timestamp: new Date().toLocaleTimeString(),
        sent: true,
        status: 'sent',
        type: 'text'
    };

    if (!state.messages[state.currentChat]) {
        state.messages[state.currentChat] = [];
    }

    addMessage(newMessage);
    input.value = '';
    input.focus();
    simulateResponse();
}

// Mejorar el manejo de archivos
function handleFileUpload(acceptType) {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = acceptType;

    input.onchange = (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                const message = {
                    id: Date.now(),
                    type: file.type.startsWith('image/') ? 'image' : 'file',
                    content: file.type.startsWith('image/') ? event.target.result : file.name,
                    fileName: file.name,
                    timestamp: new Date().toLocaleTimeString(),
                    sent: true,
                    status: 'sent'
                };
                addMessage(message);
            };

            if (file.type.startsWith('image/')) {
                reader.readAsDataURL(file);
            } else {
                reader.readAsText(file);
            }
        }
    };

    input.click();
}

// Mejorar la inicialización
function initializeChat() {
    setupEventListeners();
    loadMockMessages();
    setupEmojiPicker();
    renderContacts();

    // Seleccionar el primer contacto por defecto
    if (state.contacts.length > 0) {
        selectContact(state.contacts[0].id);
    }
}

// Mejorar los event listeners
function setupEventListeners() {
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');

    // Event listener para enviar mensaje
    messageInput?.addEventListener('keypress', (e) => {
        if (e.key === 'Enter' && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    sendBtn?.addEventListener('click', sendMessage);

    // Event listeners para archivos y multimedia
    document.getElementById('fileBtn')?.addEventListener('click', () => handleFileUpload('*'));
    document.getElementById('imageBtn')?.addEventListener('click', () => handleFileUpload('image/*'));
    document.getElementById('audioBtn')?.addEventListener('click', () => handleFileUpload('audio/*'));

    // Event listener para emojis
    document.getElementById('emojiBtn')?.addEventListener('click', toggleEmojiPicker);

    // Event listener para cerrar emoji picker al hacer click fuera
    document.addEventListener('click', (e) => {
        const emojiPicker = document.getElementById('emojiPicker');
        const emojiBtn = document.getElementById('emojiBtn');

        if (!emojiPicker?.contains(e.target) && !emojiBtn?.contains(e.target)) {
            emojiPicker.style.display = 'none';
        }
    });
}

function handleSearch(e) {
    state.searchTerm = e.target.value.toLowerCase();
    renderContacts();
}

// Iniciar la aplicación
document.addEventListener('DOMContentLoaded', initializeChat);
</script>


</body>
</html>

