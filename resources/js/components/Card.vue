<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3" v-if="display === 'text'">
            <h1 class="text-center text-3xl te text-80 font-light" v-text="time"></h1>
            <p class="text-center font-light" v-text="date"></p>
        </div>
        <div v-else-if="display === 'analogue'">
            <analogue-clock :time="analogTime" :datetime="datetime"></analogue-clock>
        </div>
    </card>
</template>

<script>
    import AnalogueClock from './AnalogueClock'

    export default {
        props: ['card'],
        components: {AnalogueClock},
        data: () => {
            return {
                time: '',
                date: '',
                display: '',
                datetime: '',
                analogTime: '',
            };
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
                this.display = display;
                this.analogTime = this.datetime.format('h:m:s');
            },
            startInterval() {
                setInterval(() => {
                    return this.updateCurrentTime();
                }, 1000);
            }
        }
    }
</script>
