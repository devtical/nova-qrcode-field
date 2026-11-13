import { AwesomeQR } from 'awesome-qr'

export function drawQrCode(field, size, { download = false } = {}) {
  const isLarge = size > 250

  return new AwesomeQR({
    text: field.value,
    size,
    margin: download || isLarge ? field.margin : 1,
    backgroundImage: field.background || null,
    logoImage: field.logo || null,
    logoMargin: download || isLarge ? 10 : 0,
  }).draw()
}

export function downloadFilename(value) {
  const name = String(value || '')
    .replace(/[^a-zA-Z0-9._-]+/g, '_')
    .replace(/^[._]+|_+$/g, '')
    .slice(0, 100)

  return `${name || 'qr_code'}.png`
}
