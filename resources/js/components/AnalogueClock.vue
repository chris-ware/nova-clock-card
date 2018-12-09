<template>
    <!-- <div class="clock" :class="{'is-small':size==='small'}" :style="clockStyle"> -->
    <div class="analog-clock" :style="clockStyle">
        <div class="clock-circle"></div>
        <div class="clock-hour" :style="{transform:hourRotate}"></div>
        <div class="clock-minute" :style="{transform:minuteRotate}"></div>
        <div class="clock-second" :style="{transform:secondRotate}"></div>
        <b class="hour" v-for="h in timeList" :key="h">
            <span>
                <i :style="{transform:transform}">{{h}}</i>
            </span>
        </b>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                timeList: [12, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
                transform: "scale(1)",
                hourRotate: "rotatez(0deg)",
                minuteRotate: "rotatez(0deg)",
                secondRotate: "rotatez(0deg)"
            };
        },
        props: ["time", "datetime", "color", "border", "bg", "size"],
        computed: {
            clockStyle() {
                return {
                    color: this.color,
                    border: this.border,
                    background: this.bg
                };
            }
        },
        watch: {
            time() {
                this.show();
            }
        },
        methods: {
            show() {
                let datetime;
                if (this.datetime) {
                    datetime = this.datetime;
                } else {
                    datetime = moment();
                }

                let hourAngle = datetime.hour() * 30 + datetime.minute() * 6 / 360 * 30;
                let minuteAngle = datetime.minute() * 6;
                let secondAngle = datetime.second() * 6;
                this.hourRotate = `rotatez(${hourAngle}deg)`;
                this.minuteRotate = `rotatez(${minuteAngle}deg)`;
                this.secondRotate = `rotatez(${secondAngle}deg)`;
            }
        },
        mounted() {
            let scale = this.$el.clientWidth / 120;
            scale = scale > 3 ? 3 : scale;
            this.transform = `scale(${scale})`;
            this.show();
        },

    };
</script>
