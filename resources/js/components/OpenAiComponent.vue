<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="chat-container">
                    <div class="chat-header">
                        <h2>Chat with OpenAI</h2>
                    </div>
                    <div class="chat-messages">
                        <div class="message user" v-for="(msg, index) in messages" :key="index"
                            v-show="msg.sender === 'user'">
                            {{ msg.text }}
                        </div>
                        <div class="message ai" v-for="(msg, index) in messages" :key="index"
                            v-show="msg.sender === 'ai'">
                            {{ msg.text }}
                        </div>
                    </div>
                    <div class="chat-input">
                        <input type="text" v-model="newMessage" @keyup.enter="sendMessage" placeholder="Type your message..." required />
                        <button @click="sendMessage" v-if="!isLoading">Send</button>
                        <button type="button" v-else>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Sending...
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import OpenAI from "openai";
export default {
    data() {
        return {
            isLoading: false,
            newMessage: '',
            messages: [],
            open_ai: 'pack',
        };
    },
    methods: {
        async sendMessage() {
            this.isLoading = true;
            if (this.newMessage.trim()) {
                // Add the user's message to the messages array
                this.messages.push({ sender: 'user', text: this.newMessage.trim() });
                // Send the user's message to OpenAI
                try {
                    if (this.open_ai == 'pack') {
                        const openai = new OpenAI({ apiKey: config.OPENAI_API_KEY, dangerouslyAllowBrowser: true });
                        const response = await openai.chat.completions.create({
                            model: "gpt-4o",
                            messages: [
                                // { role: "system", content: "You are a helpful assistant." },
                                {
                                    role: "user",
                                    content: this.newMessage.trim(),
                                },
                            ],
                        });

                        console.log('Pack');
                        console.log(response.choices[0].message.content);
                        // Add the AI's response to the messages array
                        const aiMessage = response.choices[0].message.content;
                        this.messages.push({ sender: 'ai', text: aiMessage });
                    } else {
                        const response = await axios.post('https://api.openai.com/v1/chat/completions', {
                            model: 'gpt-4o', // You can change the model as needed
                            messages: [{ role: 'user', content: this.newMessage.trim() }]
                        }, {
                            headers: {
                                'Authorization': `Bearer ${config.OPENAI_API_KEY}`,
                                'Content-Type': 'application/json'
                            }
                        });

                        console.log('axios');
                        console.log(response.data.choices[0].message.content);
                        // Add the AI's response to the messages array
                        const aiMessage = response.data.choices[0].message.content;
                        this.messages.push({ sender: 'ai', text: aiMessage });
                    }
                } catch (error) {
                    console.error('Error fetching response:', error);
                }
                this.isLoading = false;
                // Clear the input field
                this.newMessage = '';
                this.$nextTick(() => {
                    const chatMessages = document.querySelector('.chat-messages');
                    chatMessages.scrollTop = chatMessages.scrollHeight; // Auto-scroll to bottom
                });
            }
        }
    }
};
</script>
<style scoped>
.chat-container {
    width: 100%;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: white;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
}

.chat-header {
    background-color: #007bff;
    color: white;
    padding: 10px;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.chat-messages {
    height: 300px;
    padding: 10px;
    overflow-y: auto;
    border-bottom: 1px solid #ccc;
}

.message {
    padding: 8px 10px;
    border-radius: 4px;
    margin: 5px 0;
    width: 100%;
}

.user {
    background-color: #d1ecf1;
    align-self: flex-end;
    text-align: right;
}

.ai {
    background-color: #f8d7da;
    align-self: flex-start;
}

.chat-input {
    display: flex;
    padding: 10px;
}

.chat-input input {
    flex: 1;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.chat-input button {
    padding: 10px;
    margin-left: 10px;
    border: none;
    background-color: #007bff;
    color: white;
    border-radius: 4px;
    cursor: pointer;
}

.chat-input button:hover {
    background-color: #0056b3;
}
</style>
