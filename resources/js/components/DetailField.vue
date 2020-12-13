<template>
    <panel-item :field="field">
        <p slot="value">
            <vue-qr 
                class="qr-item" 
                :text="this.field.text" 
                :size="this.field.detailSize"
                :bgSrc="this.field.background"
                :logoSrc="this.field.logo"
                :margin="0"
            ></vue-qr>
        </p>
    </panel-item>
</template>

<script>
export default {
    props: ['field'],
}
</script>

<style>
.qr-item img{
    border: solid thin #ddd;
    padding: 5px;
}
</style>
