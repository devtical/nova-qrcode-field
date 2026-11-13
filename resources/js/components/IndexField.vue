<template>
    <span v-if="!field.hidden">
        <div class="qr-item">
            <img v-if="image" :src="image" :alt="field.value" />
        </div>
    </span>
</template>

<script>
import { drawQrCode } from '../qrcode'

export default {
    props: ['resourceName', 'field'],

    data: () => ({
        image: null,
    }),

    async mounted() {
        if (this.field.hidden || !this.field.value) {
            return
        }

        this.image = await drawQrCode(this.field, this.field.indexSize)
    },
}
</script>
