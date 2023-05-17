import { useCartDispatch } from "@/context/CartContext";
import Image from "next/image";
import React from "react";
import style from './index.module.css'

const ProductList = ({products}) => {
  const dispatch = useCartDispatch()

  const handleAddToCart = (product) => {
    dispatch({
      type: 'add',
      payload: product
    })
  }
  return (
    <div className={style['product-list']}>
      {products.map((product, index) => {
        return (
          <div
            key={index}
            className={style['product-list__produc-card']}
          >
            <div className={style['product-list__produc-card__image']}>
              <Image
                src={product.img_product}
                alt={product.name}
                style={{ objectFit: 'contain' }}
                fill
                />
            </div>
            <div className={style['product-list__product-card__desc']}>
              <p>{product.name}</p>
              <button
                onClick={() => handleAddToCart(product)}
              >
                +
              </button>
            </div>
          </div>
        )
      })}
    </div>
  )
}

export default ProductList