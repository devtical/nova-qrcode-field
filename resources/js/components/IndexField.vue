<template>
    <span>
    	<vue-qr
            class="qr-item"
            :text="this.field.value"
            :size="this.field.indexSize"
            :bgSrc="this.field.background"
            :logoSrc="this.field.logo"
            :margin="this.field.margin"
        ></vue-qr>
    </span>
</template>

<script>
import VueQr from 'vue-qr/src/packages/vue-qr.vue'
export default {
    props: [
    	'resourceName',
    	'field'
    ],
    components: {
        VueQr
    }
}
</script>

<style>
.qr-item{
	margin-top: 5px;
}
.qr-item img{
    border: solid thin #ddd;
    padding: 2px;
}
</style>
