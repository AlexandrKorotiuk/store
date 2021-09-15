import axios from "axios";
class NewProduct {
    orderBuy(products) {
        console.log(products)
        return axios.post('auth/admin', {
            title: products.title,
            price: products.price,
            description: products.description,
            image: products.image
        });
    }
}
export default new NewProduct