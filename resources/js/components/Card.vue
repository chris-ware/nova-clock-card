<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3" v-if="display === 'text'">
            <h1 class="text-center text-3xl te text-80 font-light" v-text="time"></h1>
            <p class="text-center font-light" v-text="date"></p>
        </div>
        <div v-else-if="display === 'analog'">
            <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg" width="100px" height="100px">
                <circle cx="50" cy="50" r="50" fill="none" stroke="black" stroke-width="2" />
                <line x1="50" y1="50" :x2="hourPosition.x" :y2="hourPosition.y" stroke="black" stroke-width="4" />
                <line x1="50" y1="50" :x2="minutePosition.x" :y2="minutePosition.y" stroke="black" stroke-width="2" />
            </svg>
        </div>
    </card>
</template>

<script>
    export default {
        props: ['card'],

        data: () => {
            return {
                time: '',
                date: '',
                display: '',
                hour: 0,
                minute: 0,
            };
        },

        computed: {
            hourPosition: function() {
                const hourRad = this.hour * Math.PI / 180;
                return {
                    x: Math.sin(hourRad) * 30 + 50,
                    y: Math.cos(hourRad) * 30 + 50
                }
            },
            minutePosition: function() {
                const minuteRad = this.minute * Math.PI / 180;
                return {
                    x: Math.sin(minuteRad) * 40 + 50,
                    y: Math.cos(minuteRad) * 40 + 50
                }
            }
        },

        mounted() {
            this.startInterval();
            this.updateCurrentTime();
        },

        methods: {
            updateCurrentTime() {
                let { locale, timeFormat, dateFormat, timezone, display } = this.card

                this.datetime = moment().locale(locale).tz(timezone);
                this.time = this.datetime.format(timeFormat);
                this.date = this.datetime.format(dateFormat);
                this.hour = 180 - ((this.datetime.format('h') * 30) + (this.datetime.format('m') / 2));
                this.minute = 180 - this.datetime.format('m') * 6;
                this.display = display;
            },
            startInterval() {
                setInterval(() => {
                    return this.updateCurrentTime();
                }, 1000);
            }
        }
    }
</script>
