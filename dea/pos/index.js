const express = require('express')
const app = express()
const port = 3000
const bodyParser = require('body-parser')
const cors = require('cors')
const db = require('./config/conection.js')

const products = require('./routers/products')
const transactions = require('./routers/transactions')

app.use(cors())
app.use(bodyParser.json())

app.get('/', (req, res) => {
  res.send('Hello Mantap!')
})

app.use('/products', products)
app.use('/transactions', transactions)

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})