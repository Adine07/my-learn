const express = require('express')
const transactions = express.Router()
const { checkkout } = require('../controllers/transactions')
const { randomOrderNumber } = require('../helpers/utils')

transactions.route('/').post(async (req, res) => {
  const { total_price, paid_amount, products } = req.body
  const data = {
    no_order: randomOrderNumber(), total_price, paid_amount
  }
  res.send(await checkkout(data))
})

module.exports = transactions