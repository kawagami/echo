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
</style>

<template>
    <div id="chat">
        <div class="container">
            <div class="message-channel" :channel="channel">
                <select name="" id="">
                    <option
                        v-for="channel in channels"
                        :value="channel.name"
                        :key="channel.id"
                    >
                        {{ channel.name }}
                    </option>
                </select>
            </div>
            <div class="message-box">
                <div
                    class="his-mes"
                    v-for="item in historyMessages"
                    :key="item.id"
                >
                    {{ item.user.name }} : {{ item.message }}
                </div>
            </div>
            <input type="text" @keyup.enter="submit" v-model="message" />
            <button type="button" @click="submit">點我送出</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            channels: [],
            channel: 1,
            message: "",
            historyMessages: [],
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
            axios.post("/message/sendMessage", data).then((e) => {
                // console.log("axios send 回來的訊息");
                // console.log(e);
                // this.historyMessages.push(send);
                // console.log(this.historyMessages);
            });
        },
        getMessages() {
            axios
                .post("/message/getMessages", {
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
                .post("/channel/channels", {
                    //
                })
                .then((e) => {
                    // 取得所有頻道
                    this.channels = e.data;
                });
        },
    },
    mounted() {
        // 取得所有頻道
        this.getChannels();

        // 取得訊息，還沒有分聊天室，目前是取全部訊息的後 20 筆
        this.getMessages();

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
