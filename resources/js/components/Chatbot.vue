<template>
  <div>
    <div class="chat-container" v-show="isChatOpen">
      <div class="chat-header" @click="toggleChat">Chat with Amna</div>
      <div class="chat-box">
        <div id="messages">
          <div v-for="(message, index) in messages" :key="index" :class="message.isUser ? 'user-message' : 'assistant-message'">
            {{ message.isUser ? message.text : message.text ? message.text.slice(0, -3) : '' }}
          </div>
        </div>
        <input style="width:90%;" type="text" v-model="userInput" placeholder="Type a message..." @keyup.enter="sendMessage" />
        <div style="height:20px;"></div>
        <button @click="sendMessage" style="width:150px; border-radius: 10px; color: white; background: #3eada5;">Send</button>
      </div>
    </div>
    <button class="chat-toggle-button" @click="toggleChat">{{ isChatOpen ? '-' : '+' }}</button>
  </div>
</template>

<script>
export default {
  data() {
    return {
      isChatOpen: false,
      userInput: '',
      messages: []
    };
  },
  methods: {
    toggleChat() {
      this.isChatOpen = !this.isChatOpen;
    },
    sendMessage() {
      if (this.userInput.trim() === '') return;

      // Display user message
      this.messages.push({ text: 'You: ' + this.userInput, isUser: true });

      fetch('https://pacific-beach-29100-b7b4fab4e338.herokuapp.com/chat', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          message: this.userInput
        })
      })
        .then(response => response.json())
        .then(data => {
          // Display assistant response
          this.messages.push({ text: 'Assistant: ' + data.response, isUser: false });
        })
        .catch(error => {
          console.error('Error:', error);
        });

      // Clear input
      this.userInput = '';
    }
  }
};
</script>

<style scoped>
.chat-container {
  position: fixed;
  bottom: 0;
  right: 10px;
  width: 425px;
  max-width: 100%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border: 1px solid #ccc;
  border-radius: 10px 10px 0 0;
  overflow: hidden;
  background: white;
}

.chat-header {
  background: #3eada5;
  color: white;
  padding: 10px;
  cursor: pointer;
}

.chat-box {
  padding: 10px;
}

#messages {
  height: 300px;
  overflow-y: auto;
  border-bottom: 1px solid #ccc;
  margin-bottom: 10px;
}

.user-message {
  background: #3eada5;
  color: white;
  padding: 10px;
  border-radius: 10px;
  margin-bottom: 10px;
  align-self: flex-end;
}

.assistant-message {
  background: #e1e1e1;
  color: black;
  padding: 10px;
  border-radius: 10px;
  margin-bottom: 10px;
  align-self: flex-start;
}

.chat-toggle-button {
  position: fixed;
  bottom: 10px;
  right: 10px;
  background: #3eada5;
  color: white;
  border: none;
  border-radius: 50%;
  width: 50px;
  height: 50px;
  font-size: 20px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>
