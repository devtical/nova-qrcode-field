<template>
    <span>
    	<vue-qr
            class="qr-item"
            :text="this.field.value"
            :size="this.field.indexSize"
            :bgSrc="this.field.background"
            :logoSrc="this.field.logo"
            :margin="0"
        ></vue-qr>
    </span>
</template>

<script>
export default {
    props: [
    	'resourceName',
    	'field'
    ],
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
