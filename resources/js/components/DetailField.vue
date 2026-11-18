<template>
    <PanelItem v-if="!field.hidden" :index="index" :field="field">
        <template #value>
            <div class="qr-item">
                <img v-if="image" :src="image" :alt="field.value" />
            </div>
            <p v-if="image" class="flex items-center text-sm mt-3">
                <a @click="downloadQrCode" @keydown.enter="downloadQrCode" dusk="qr-download-link" tabindex="0" class="cursor-pointer text-gray-500 inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="16" height="16" class="inline-block mr-2" role="presentation">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                    </svg>
                    <span class="mt-1">{{ __('Download') }}</span>
                </a>
            </p>
        </template>
    </PanelItem>
</template>

<script>
import { drawQrCode, downloadFilename } from '../qrcode'

export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],

    data: () => ({
        image: null,
    }),

    async mounted() {
        if (this.field.hidden || !this.field.value) {
            return
        }

        this.image = await drawQrCode(this.field, this.field.detailSize)
    },

    methods: {
        async downloadQrCode() {
            const image = await drawQrCode(this.field, this.field.detailSize || 400, { download: true })

            const link = document.createElement('a')
            link.href = image
            link.download = downloadFilename(this.field.value)
            link.click()
        },
    },
}
</script>
