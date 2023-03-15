<style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .product-image {
      flex-basis: 50%;
      max-width: 500px;
    }

    .product-image img {
      max-width: 100%;
      height: auto;
    }

    .product-details {
      flex-basis: 40%;
      max-width: 400px;
    }

    .product-details h1 {
      font-size: 32px;
      margin-bottom: 20px;
    }

    .product-details p {
      font-size: 16px;
      margin-bottom: 10px;
    }

    .product-details .price {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .product-details .description {
      font-size: 16px;
      line-height: 1.5;
      margin-bottom: 20px;
    }

    .product-actions {
      display: flex;
      align-items: center;
      justify-content: flex-end;
    }

    .product-actions button {
      font-size: 16px;
      font-weight: bold;
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .product-actions button:hover {
      background-color: #0062cc;
    }
  </style>



<div class="container">
    <div class="product">
      <div class="product-image">
        <img src="https://via.placeholder.com/500x500" alt="Product Image">
      </div>
      <div class="product-details">
        <h1>Product Name</h1>
        <p>Brand: <span class="brand">Brand Name</span></p>
        <p>SKU: <span class="sku">SKU12345</span></p>
        <p class="price">$99.99</p>
        <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor mauris sed ex lobortis, nec consectetur dolor rutrum. Fusce consequat enim non libero sagittis euismod.</p>
        <div class="product-actions">
          <button>Add to Cart</button>
        </div>
      </div>
    </div>
  </div>