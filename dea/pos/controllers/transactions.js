const db = require('../config/conection')

exports.checkkout = async (data) => {
  const query = await db.query('insert into transactions ?', [data]).catch( err => {
    return err
  })
  return query
}