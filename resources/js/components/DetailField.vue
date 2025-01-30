<template>
    <PanelItem v-if="!field.hidden" :index="index" :field="field">
        <template #value>
            <div ref="qrContainer" class="qr-item"></div>
            <p class="flex items-center text-sm mt-3">
                <a @click="downloadQrCode" dusk="qr-download-link" tabindex="0" class="cursor-pointer text-gray-500 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16" class="inline-block mr-2" role="presentation">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="class mt-1">Download</span>
                </a>
            </p>
        </template>
    </PanelItem>
</template>

<script>
import { AwesomeQR } from 'awesome-qr';

export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
    mounted() {
        this.generateQRCode();
    },
    methods: {
        async generateQRCode() {
            const qrCode = new AwesomeQR({
                text: this.field.value,
                size: this.field.detailSize,
                margin: this.field.detailSize > 250 ? this.field.margin : 1,
                backgroundImage: this.field.background || null,
                logoImage: this.field.logo || null,
                logoMargin: this.field.detailSize > 250 ? 10 : 0,
            });

            const qrCodeImage = await qrCode.draw();
            this.$refs.qrContainer.innerHTML = `<img src="${qrCodeImage}" alt="${this.field.value}" />`;
        },
        async downloadQrCode() {
            const qrCode = new AwesomeQR({
                text: this.field.value,
                size: this.field.detailSize || 400,
                margin: this.field.margin || 0,
                backgroundImage: this.field.background || null,
                logoImage: this.field.logo || null,
            });

            const qrCodeImage = await qrCode.draw();
            const link = document.createElement('a');
            link.href = qrCodeImage;
            link.download = `${this.field.value || 'qr_code'}.png`;
            link.click();
        }
    }
}
</script>