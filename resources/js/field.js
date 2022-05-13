import IndexField from './components/IndexField'
import DetailField from './components/DetailField'

Nova.booting((app, store) => {
    app.component('index-qrcode-field', IndexField)
    app.component('detail-qrcode-field', DetailField)
})
