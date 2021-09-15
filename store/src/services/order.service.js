import axios from "axios";
class OrderService {
    orderBuy(order) {
        console.log(order)
        return axios.post('auth/order', {
            user_id: order.userId,
            product_id: order.itemId,
            count: order.itemQuantity,
        });
    }
}
export default new OrderService