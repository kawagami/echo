<template>
    <form>
        <input type="text" v-model="message" />
        <button type="button" @click="submit">點我送出</button>
    </form>
</template>

<script>
export default {
    data() {
        return {
            message: "",
        };
    },
    methods: {
        submit() {
            axios.post("/send", {
                message: this.message,
            });
        },
    },
    mounted() {
        let that = this;
        // 12. 创建 Echo 监听
        Echo.channel("test-event").listen("BroadcastEvent", (e) => {
            that.names.push(e.name);
        });
    },
};
</script>
