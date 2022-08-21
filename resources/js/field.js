import IndexField from './components/IndexField'
import DetailField from './components/DetailField'

Nova.booting((app, store) => {
    app.component('index-qrcode', IndexField)
    app.component('detail-qrcode', DetailField)
})
