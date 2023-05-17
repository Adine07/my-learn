
import React, { createContext, useContext, useReducer } from 'react';

const CartContext = createContext(null);
const CartDispatchContext = createContext(null);

function cartsReducer(state, action) {
  console.log(action);
  switch (action.type) {
    case 'add': {
      return [...state];
    }
    default: {
      throw Error('Unknown action: ' + action.type);
    }
  }
}

const initialState = []

const CartProvider = ({ children }) => {
  const [carts, dispatch] = useReducer(cartsReducer, initialState);

  return (
    <CartContext.Provider value={carts}>
      <CartDispatchContext.Provider value={dispatch}>
        {children}
      </CartDispatchContext.Provider>
    </CartContext.Provider>
  );
};

export default CartProvider;

export function useCart() {
  return useContext(CartContext);
}

export function useCartDispatch() {
  return useContext(CartDispatchContext);
}