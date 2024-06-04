const chatInput = document.querySelector(".chat-input textarea");
const sendChatBtn = document.querySelector(".chat-input span");
const chatbox = document.querySelector(".chatbox");
const chatbot = document.querySelector(".chatbot");
const chatbotToggler = document.querySelector(".chatbot-toggler");
const chatbotCloseBtn = document.querySelector(".close-btn");

let userMessage;

const sanitizeInput = (input) => {
    return input.replace(/[&<>"']/g, (match) => {
        const escape = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        };
        return escape[match];
    });
};

const createChatLi = (message, className) => {
    const chatLi = document.createElement("li");
    chatLi.classList.add("chat", className);
    let chatContent = className === "outgoing" ? `<p>${message}</p>` : `<span class="material-symbols-outlined">smart_toy</span><p>${message}</p>`;
    chatLi.innerHTML = chatContent;
    return chatLi;
};

const autoScroll = () => {
    chatbox.scrollTop = chatbox.scrollHeight;
};

const generateResponse = () => {
    if (userMessage.toLowerCase().includes('hi')) {
        const greetingMessage = "Hello! I can help you search for books. Just type the title or author of the book you're looking for.";
        chatbox.appendChild(createChatLi(greetingMessage, "incoming"));
        autoScroll();
        return;
    }

    if (userMessage.toLowerCase().startsWith('search for')) {
        const bookTitle = userMessage.slice(11).trim(); // Extract book title from the message
        console.log('Searching for book with title:', bookTitle); // Log the extracted book title
        fetch('search_books_for_chatbot.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ 
                title: bookTitle
            })
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text(); // Read response as text
        })
        .then(text => {
            console.log('Response text:', text); // Log the response text for debugging
            if (text.trim() === "") {
                throw new Error("Empty response from server");
            }
            const book = JSON.parse(text); // Try parsing response as JSON
            if (book.error) {
                throw new Error(book.error);
            }
            const bookCoverURL = `bookNavigate.php?id=${book.id}`;
            const responseMessage = `
                Here's the cover image: <a href="${bookCoverURL}" target="_blank">
                <img src="data:image/jpeg;base64,${book.image_data}" alt="${book.image_name}" class="book-cover"></a>`;
            chatbox.appendChild(createChatLi(responseMessage, "incoming"));
            autoScroll();
        })
        .catch(error => {
            console.error('Error:', error.message);
            chatbox.appendChild(createChatLi("Sorry, an error occurred while searching for the book.", "incoming"));
            autoScroll();
        });
    } else {
        chatbox.appendChild(createChatLi("Sorry, I didn't understand that. Please type 'search for [book title]' to find a book.", "incoming"));
        autoScroll();
    }
};

const handleChat = () => {
    userMessage = chatInput.value.trim();
    if (!userMessage) return;

    chatbox.appendChild(createChatLi(userMessage, "outgoing"));
    autoScroll();

    setTimeout(() => {
        chatbox.appendChild(createChatLi("Thinking...", "incoming"));
        autoScroll();
        generateResponse();
    }, 600);
};

// Adjust textarea height based on content
chatInput.addEventListener('input', function() {
    this.style.height = 'auto';
    this.style.height = (this.scrollHeight) + 'px';
});

// Event listeners
sendChatBtn.addEventListener("click", handleChat);
chatbotCloseBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
