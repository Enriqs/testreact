import axios from "axios";

export const getProducts = async () => {
  try {
    const res = await axios.get("http://localhost:8081/products/");
    return res.data;
  } catch (err) {
    console.log(err);
    return err;
  }
};

export const getHomes = async () => {
  try {
    const res = await axios.get("http://localhost:8081/homes/");
    return res.data;
  } catch (err) {
    console.log(err);
    return err;
  }
};

export const addProduct = async (product) => {
  try {
    const res = await axios.post("http://localhost:8081/products/", product);
    return res.data;
  } catch (err) {
    console.log(err);
    return { error: err };
  }
};

export const addHome = async (home) => {
  try {
    const res = await axios.post("http://localhost:8081/homes/", home);
    return res.data;
  } catch (err) {
    console.log(err);
    return { error: err };
  }
};

export const updateProduct = async (product, productId) => {
  try {
    const res = await axios.put(
      "http://localhost:8081/products/" + productId,
      product
    );
    return res.data;
  } catch (err) {
    return {
      error: err,
    };
  }
};

export const updateHome = async (home, home_id) => {
  try {
    const res = await axios.put(
      "http://localhost:8081/homes/" + home_id,
      home
    );
    return res.data;
  } catch (err) {
    return {
      error: err,
    };
  }
};

export const deleteProduct = async (home_id, homeThumbnail) => {
  try {
    const res = await axios.delete(
      "http://localhost:8081/products/" + home_id
      );
    return res.data;
  } catch (err) {
    return { error: err };
  }
};

export const deleteHome = async (home_id, homeThumbnail) => {
  try {
    const res = await axios.delete(
      "http://localhost:8081/homes/" + home_id
      );
    return res.data;
  } catch (err) {
    return { error: err };
  }
};


export const getProductById = async (id) => {
  try {
    const res = await axios.get("http://localhost:8081/products/" + id);
    return res.data
  } catch (err) {
    return {error: err.message}
  }
};

export const getHomeById = async (home_id) => {
  try {
    const res = await axios.get("http://localhost:8081/homes/" + home_id);
    return res.data
  } catch (err) {
    return {error: err.message}
  }
};


export const uploadProductThumbnail = async (formData) => {
  try {
    const res = await axios.post(
      "http://localhost:8081/thumbnailUpload/",
      formData
    );
    return res.data
      
  } catch (err) {
    console.log(err);
    return {error: err.message};
  }
};

export const uploadHomeThumbnail = async (formData) => {
  try {
    const res = await axios.post(
      "http://localhost:8081/thumbnailUpload/",
      formData
    );
    return res.data
      
  } catch (err) {
    console.log(err);
    return {error: err.message};
  }
};