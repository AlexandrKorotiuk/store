import axios from 'axios';

class ProductService {
  getProductContent() {
    return axios.get('/product');
  }
}

export default new ProductService;