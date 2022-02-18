<style scoped>
.container {
    width: 100vh;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
}
.message-box {
    width: 100%;
    height: 400px;
    display: flex;
    flex-direction: column-reverse;
    justify-content: flex-start;
    overflow-y: scroll;
}

.messages-others {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}
.messages-self {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
}
.message-input {
    width: 100%;
}
</style>

<template>
    <!-- <div id="chat">
        <div class="container">
            <div class="message-channel" :channel="channel">
                <select name="" id="">
                    <option
                        v-for="channel in channels"
                        :value="channel.id"
                        :key="channel.id"
                    >
                        {{ channel.name }}
                    </option>
                </select>
            </div>
            <div class="message-box">
                <div
                    class="message-for"
                    v-for="message in historyMessages"
                    :key="message.id"
                >
                    <div
                        class="messages-self"
                        v-if="message.user.id === userId"
                    >
                        <div class="message-name">
                            {{ message.user.name }}
                        </div>
                        <div class="message-message">
                            {{ message.message }}
                        </div>
                        <div class="message-timestamp">
                            {{ message.created_at }}
                        </div>
                        <br />
                    </div>
                    <div class="messages-others" v-else>
                        <div class="message-name">
                            {{ message.user.name }}
                        </div>
                        <div class="message-message">
                            {{ message.message }}
                        </div>
                        <div class="message-timestamp">
                            {{ message.created_at }}
                        </div>
                        <br />
                    </div>
                </div>
            </div>
            <div class="message-input input-group mb-3">
                <input
                    class="form-control"
                    type="text"
                    @keyup.enter="submit"
                    v-model="message"
                />
                <button type="button" @click="submit">點我送出</button>
            </div>
        </div>
    </div> -->
<div class="ttt"></div>

</template>

<script>
export default {
    data() {
        return {
            channels: [],
            channel: 1,
            message: "",
            historyMessages: [],
            userId: 0,
        };
    },
    methods: {
        submit() {
            const newMessage = this.message;
            this.message = "";
            if (newMessage == "") {
                // 沒輸入不動作
                return;
            }
            this.sendMessage(newMessage);
        },
        sendMessage(newMessage) {
            let data = {
                message: newMessage,
                channel: this.channel,
            };
            axios.post("/message/send-message", data).then((e) => {
                // console.log("axios send 回來的訊息");
                // console.log(e);
                // this.historyMessages.push(send);
                // console.log(this.historyMessages);
            });
        },
        getMessages() {
            axios
                .get(`/message/get-messages`, {
                    // message: newMessage,
                })
                .then((e) => {
                    // console.log("axios get 回來的訊息");
                    // console.log(e);
                    this.historyMessages = e.data;
                });
        },
        getChannels() {
            axios
                .get("/channel/get-channels", {
                    //
                })
                .then((e) => {
                    // 取得所有頻道
                    this.channels = e.data;
                });
        },
        getUserId() {
            axios
                .get("/user/get-id", {
                    //
                })
                .then((e) => {
                    // 取得所有頻道
                    this.userId = e.data;
                });
        },
    },
    mounted() {
        // 取得所有頻道
        this.getChannels();

        // 取得訊息，還沒有分聊天室，目前是取全部訊息的後 20 筆
        this.getMessages();

        // 取得會員ID
        this.getUserId();

        // 創建 Echo 監聽
        Echo.channel("test-event").listen("BroadcastEvent", (e) => {
            // 監聽頻道，改變聊天室的訊息
            this.historyMessages = e.message;
        });
        // Echo.join(`test-event`)
        //     .here((users) => {
        //         //
        //     })
        //     .joining((user) => {
        //         console.log(user.name);
        //     })
        //     .leaving((user) => {
        //         console.log(user.name);
        //     });
    },
};
</script>
