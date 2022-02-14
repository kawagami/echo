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
    flex-direction: column;
    justify-content: flex-end;
    overflow-y: scroll;
}
</style>

<template>
    <div id="chat">
        <div class="container">
            <div class="message-box">
                <div
                    class="his-mes"
                    v-for="(item, index) in historyMessages"
                    :key="index"
                >
                    {{ item.user }} : {{ item.message }}
                </div>
            </div>
            <input type="text" v-model="message" />
            <button type="button" @click="submit">點我送出</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            message: "",
            historyMessages: [
                {
                    message: "訊息1",
                    user: "會員一",
                },
                {
                    message: "訊息2",
                    user: "會員二",
                },
            ],
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
            let send = {
                message: newMessage,
                user: `會員${newMessage}`,
            };
            this.historyMessages.push(send);
            axios.post("/send", {
                message: newMessage,
            });
        },
    },
    mounted() {
        let that = this;
        // 12. 创建 Echo 监听
        Echo.channel("test-event").listen("BroadcastEvent", (e) => {
            console.log(e);
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
