<template>
    <PanelItem :index="index" :field="field">
        <template #value>
            <vue-qr
                class="qr-item"
                :text="field.value"
                :size="field.detailSize"
                :bgSrc="field.background"
                :logoSrc="field.logo"
                :margin="field.padding"
            ></vue-qr>
        </template>
    </PanelItem>
</template>

<script>
import VueQr from 'vue-qr/src/packages/vue-qr.vue'
export default {
    props: ['index', 'resource', 'resourceName', 'resourceId', 'field'],
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
