import VueQr from 'vue-qr'

Nova.booting((Vue, router) => {
	Vue.component('vue-qr', VueQr);
    Vue.component('index-qrcode', require('./components/IndexField'));
    Vue.component('detail-qrcode', require('./components/DetailField'));
})
