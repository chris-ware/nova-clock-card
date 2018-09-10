<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h1 class="text-center text-3xl te text-80 font-light" v-text="time"></h1>
            <p class="text-center font-light" v-text="date"></p>
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
            };
        },

        mounted() {
            this.startInterval();
            this.updateCurrentTime();
        },

        methods: {
            updateCurrentTime() {
                let { locale, timeFormat, dateFormat, timezone } = this.card

                this.datetime = moment().locale(locale).tz(timezone);
                this.time = this.datetime.format(timeFormat);
                this.date = this.datetime.format(dateFormat);
            },
            startInterval() {
                setInterval(() => {
                    return this.updateCurrentTime();
                }, 1000);
            }
        }
    }
</script>
