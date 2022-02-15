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
            <div class="message-channel" :channel="channel"></div>
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
            axios.post("/send", data).then((e) => {
                // console.log("axios send 回來的訊息");
                // console.log(e);
                // this.historyMessages.push(send);
                // console.log(this.historyMessages);
            });
        },
        getMessages() {
            axios
                .post("/get", {
                    // message: newMessage,
                })
                .then((e) => {
                    // console.log("axios get 回來的訊息");
                    // console.log(e);
                    this.historyMessages = e.data;
                });
        },
    },
    mounted() {
        this.getMessages();

        // 創建 Echo 監聽
        Echo.channel("test-event").listen("BroadcastEvent", (e) => {
            // console.log("listen 的 e 資料");
            // console.log(e);

            this.historyMessages = e.message;

            // // scroll to bottom 新增的文字高度沒算進去
            // let messageBox = this.$el.querySelector(".message-box");
            // messageBox.scrollTop = messageBox.scrollHeight;

            // // 有變動的時候取得訊息
            // this.getMessages();

            // // 顯示最後一筆訊息
            // console.log(this.historyMessages.slice(-1)[0].message);
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
