const db = require('../config/conection')

exports.getProducts = async () => {
  return await db.query("select * from products")
}

exports.createProduct = async (data) => {
  const query = await db.query('insert into products set ?', [data])
  if (!query.affectedRows) return "Error When Inserting Product"
  return "Product Successful Created"
}