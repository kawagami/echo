<style scoped>
/* .container {
    width: 100vh;
    height: 100%;
    display: flex;
    flex-wrap: wrap;
} */
.modal-body {
    width: 100%;
    height: 400px;
    display: flex;
    flex-direction: column-reverse;
    justify-content: flex-start;
    overflow-y: scroll;
}

/* .messages-others {
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
} */
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
    <div id="echo">
        <!-- 測試用按鈕 -->
        <button @click="getChannelStatus">取得頻道狀態</button>
        <!--  -->
        <div class="menu-1icon-talk w-h-start">
            <div class="icon3box">
                <a
                    href=""
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop-talk"
                >
                    <img
                        src="../../images/lobby/lobby_icon_hint.png"
                        class="icon-hint"
                    />
                    <img
                        src="../../images/lobby/lobby_icon_talk.png"
                        class="icon-img"
                    />
                </a>
            </div>
        </div>
        <div class="container">
            <div
                class="modal fade"
                id="staticBackdrop-talk"
                data-bs-backdrop="static"
                data-bs-keyboard="false"
                tabindex="-1"
                aria-labelledby="staticBackdropLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog forchat">
                    <div class="modal-content fortalk">
                        <div class="modal-header">
                            <!-- 頻道選擇 -->
                            <select
                                class="form-select"
                                aria-label="Default select example"
                            >
                                <option
                                    v-for="channel in channels"
                                    :value="channel.id"
                                    :key="channel.id"
                                >
                                    {{ channel.name }}
                                </option>
                            </select>
                            <!-- 人數顯示 -->
                            <div class="m-people w-h-start">
                                <img
                                    src="../../images/chat/chat_icon_people.svg"
                                />
                                {{ this.userNumber }}
                            </div>
                            <!-- modal 關閉按鈕 -->
                            <button
                                type="button"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            >
                                <img src="../../images/common_icon_close.png" />
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- 聊天室表情 -->
                            <div id="light" class="phiz_content">
                                <div class="row">
                                    <img
                                        src="../../images/chat/chat_sticker_01.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_02.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_03.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_04.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_05.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_06.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_07.png"
                                        class="col-3"
                                    />
                                    <img
                                        src="../../images/chat/chat_sticker_08.png"
                                        class="col-3"
                                    />
                                </div>
                            </div>
                            <!--  -->
                            <div
                                class="message-for"
                                v-for="message in historyMessages"
                                :key="message.id"
                            >
                                <!-- 自己訊息 -->
                                <div
                                    class="chat-inner italk w-last"
                                    v-if="message.user.id === userId"
                                >
                                    <div class="talk-box w-space-evenly">
                                        <div class="chat-box">
                                            <p>
                                                {{ message.user.name }}
                                            </p>
                                            <p>
                                                {{ message.message }}
                                            </p>
                                            <p>
                                                {{
                                                    dateFormat(
                                                        message.created_at
                                                    )
                                                }}
                                            </p>
                                        </div>
                                        <img
                                            src="../../images/profile/profile_photo_10.png"
                                            class="chat-bigimg"
                                        />
                                    </div>
                                </div>
                                <!-- 他人訊息 -->
                                <div class="chat-inner" v-else>
                                    <div class="talk-box w-space-evenly">
                                        <img
                                            src="../../images/profile/profile_photo_10.png"
                                            class="chat-bigimg"
                                            @click="clickOthersIcon"
                                            :data-username="message.user.name"
                                        />
                                        <div class="chat-box">
                                            <p>
                                                {{ message.user.name }}
                                            </p>
                                            <p>
                                                {{ message.message }}
                                            </p>
                                            <p>
                                                {{
                                                    dateFormat(
                                                        message.created_at
                                                    )
                                                }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--  -->
                        </div>
                        <!-- input 那一列 -->
                        <div class="talkbox-down w-h-space-evenly">
                            <!-- 選擇貼圖的按鈕 -->
                            <a
                                href="javascript:void(0)"
                                onclick="document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"
                                id="fade"
                                class="smile_btn"
                            >
                                <img
                                    src="../../images/chat/chat_icon_sticker_a.png"
                                />
                            </a>
                            <a
                                href="javascript:void(0)"
                                onclick="document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'"
                            >
                                <img
                                    src="../../images/chat/chat_icon_sticker.png"
                                />
                            </a>
                            <!-- 訊息輸入列 -->
                            <input
                                type="text"
                                class="form-control"
                                id="exampleInput"
                                placeholder="請輸聊天內容"
                                @keyup.enter="submit"
                                v-model="message"
                            />
                            <!-- 訊息送出圖示 -->
                            <img
                                src="../../images/chat/chat_icon_send.png"
                                @click="submit"
                            />
                        </div>
                    </div>
                </div>
                <!-- menu icon talk-->
                <div class="menu-1icon-talk w-h-start layerup">
                    <div class="icon3box">
                        <a>
                            <img
                                src="../../images/lobby/lobby_icon_hint.png"
                                class="icon-hint"
                            />
                            <img
                                src="../../images/lobby/lobby_icon_talk.png"
                                class="icon-img"
                            />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            nowChannelName: "",
            channels: [],
            channel: 1,
            message: "",
            historyMessages: [],
            userId: 0,
            userNumber: 0,
            timeToGetChannelStatus: 0,
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
        getChannelStatus() {
            // console.log(moment().format("YYYY/MM/DD HH:mm"));
            // 取得特定頻道的資訊 test-event 可替換成其他頻道名稱
            // "http://dd.dd:6001/apps/4e8ab2c4f7f32951/channels/test-event?auth_key=0e08c64a779309b7afcc17a2d8b9268d"
            axios
                .get(
                    "http://dd.dd:6001/apps/4e8ab2c4f7f32951/status?auth_key=0e08c64a779309b7afcc17a2d8b9268d",
                    {
                        //
                    }
                )
                .then((e) => {
                    // 取得 laravel echo server status
                    console.log(e);
                    // 現在聊天室人數 100 以上就顯示 99+
                    let nowUsersNumber =
                        e.data.subscription_count > 99
                            ? "99+"
                            : e.data.subscription_count;
                    this.userNumber = nowUsersNumber;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
        dateFormat(date) {
            // // 原始 js 處理日期做法
            // const dateTimeString = new Date(date);
            // const year = dateTimeString.getFullYear(); //2016
            // const month = dateTimeString.getMonth() + 1; //6
            // const d = dateTimeString.getDate(); //15
            // const hour = dateTimeString.getHours(); //0-24
            // const minute = dateTimeString.getMinutes(); //0-59
            // const second = dateTimeString.getSeconds(); //0-59
            // const result = `${year}-${month}-${d} ${hour}:${minute}:${second}`;
            // //
            // return result;
            // moment.js 的作法
            //
            return moment(date).format("YYYY/MM/DD HH:mm");
            //
        },
        clickOthersIcon(e) {
            // 點擊他人頭像後 input 欄位變成 @ 該頭像使用者
            console.log(e.target.dataset.username);
            // console.log(e.target.nextElementSibling); // 抓同一層的下一個元素
            const targetName = e.target.dataset.username;
            this.message = `@${targetName} `;
            //
            // return moment(date).format("YYYY/MM/DD HH:mm");
            //
        },
    },
    mounted() {
        // 取得所有頻道
        this.getChannels();

        // 取得訊息，還沒有分聊天室，目前是取全部訊息的後 20 筆
        this.getMessages();

        // 取得會員ID
        this.getUserId();

        // 取得頻道資訊
        this.getChannelStatus();

        // 定時取得頻道資訊 : 目前 10 秒取得一次
        this.timeToGetChannelStatus = setInterval(() => {
            this.getChannelStatus();
        }, 30 * 1000);

        // 創建 Echo 監聽
        Echo.channel("test-event").listen("BroadcastEvent", (e) => {
            // 監聽頻道，改變聊天室的訊息
            console.log(e);
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
