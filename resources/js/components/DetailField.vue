<template>
    <panel-item :field="field">
        <p slot="value">
            <vue-qr
                class="qr-item"
                :text="field.value"
                :size="field.detailSize"
                :bgSrc="field.background"
                :logoSrc="field.logo"
                :margin="0"
            ></vue-qr>
        </p>
    </panel-item>
</template>

<script>
import VueQr from 'vue-qr/src/packages/vue-qr.vue'
export default {
    props: ['field'],
    components: {
        VueQr
    }
}
</script>

<style>
.qr-item img {
    border: solid thin #ddd;
    padding: 5px;
}
</style>
