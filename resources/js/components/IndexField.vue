<template>
    <span v-if="!field.hidden">
        <div ref="qrContainer" class="qr-item"></div>
    </span>
</template>

<script>
import { AwesomeQR } from 'awesome-qr';

export default {
    props: [
        'resourceName',
        'field'
    ],
    mounted() {
        this.generateQRCode();
    },
    methods: {
        async generateQRCode() {
            const qrCode = new AwesomeQR({
                text: this.field.value,
                size: this.field.indexSize,
                margin: this.field.indexSize > 250 ? this.field.margin : 1,
                backgroundImage: this.field.background || null,
                logoImage: this.field.logo || null,
                logoMargin: this.field.indexSize > 250 ? 10 : 0,
            });

            const qrCodeImage = await qrCode.draw();
            this.$refs.qrContainer.innerHTML = `<img src="${qrCodeImage}" alt="${this.field.value}" />`;
        }
    }
}
</script>