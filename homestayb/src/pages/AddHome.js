import React, { useEffect, useState } from "react";
import { useNavigate, useParams } from "react-router-dom";
import {
  addProduct,
  updateProduct,
  getProductById,
  uploadProductThumbnail,
} from "../features/apiCalls";

const BASE_API_URL = "http://localhost:8080"; //81
const AddHome = () => {
  const { id } = useParams();
  const [defaultValue, setDeafaultValue] = useState({
    name: "",
    introduction: "",
    price: "",
    availableQuantity: "",
  });
  const [selectedImage, setSelectedImage] = useState();
  const [previewUrl, setPreviewUrl] = useState();
  const navigate = useNavigate();

  useEffect(() => {
    const getProduct = async () => {
      const { data } = await getProductById(id);
      console.log(data);
      if (data) setDeafaultValue({ ...data[0] });
    };
    getProduct();
  }, [id]);

  useEffect(() => {
    let url;
    if (selectedImage) {
      url = URL.createObjectURL(selectedImage);
      setPreviewUrl(url);
    }
    return () => {
      URL.revokeObjectURL(url);
    };
  }, [selectedImage]);

  const {
    name,
    introduction,
    price,
    availableQuantity,
    // homeThumbnail,
    // home_id,
  } = defaultValue;
  console.log(name);
  const handleSubmit = async (e) => {
    e.preventDefault();
    console.log(e.target);
    let formData = new FormData(e.target);
    let fileFormData = new FormData();
    let files = e.target[4].files;
    const values = Object.fromEntries(formData.entries());
    const pId = !name
      // ? values.name.toLowerCase().replaceAll(/[\s\t]+/g, "-")
      ? values.name.toLowerCase()
      : name;
    fileFormData.append("name", pId);
    delete values.homeThumbnail;
    try {
      if (!!selectedImage) {
        fileFormData.append("homeThumbnail", files[0]);
        // let { data, error } = await uploadProductThumbnail(fileFormData);
        // if (error) throw new Error(error);
        // values["homeThumbnail"] = data;
      }
      if (pId && !!name) {
        let { data, error } = await updateProduct(values, name);
        if (error) throw new Error(error);
      } else if (pId) {
        let formValues = {
          // name: pId,
          ...values,
          // homeThumbnail: "test-product.jpg",
        };
        let { data, error } = await addProduct(formValues);
        if (error) throw new Error(error);
      }
    } catch (err) {
      console.log(err);
    }
  };
  return (
    <div className="container max-w-5xl py-10">
      <div className="flex space-x-6 mb-10 items-center">
        {/* <button
          onClick={() => navigate(-1)}
          className="h-10 leading-none text-xl"
        >
          {"<"}
        </button> */}
        <button onClick={() => navigate(-1)} type="button" className="btn btn-outline-primary">Back</button>
        <h2 className="text--title">
          {defaultValue.name ? "Update Product" : "Add Product"}
        </h2>
      </div>
      <div className="flex flex-col">
        <form onSubmit={handleSubmit}>
          <div className="mb-4">
            <label>Home Title</label>
            <input
              defaultValue={name || ""}
              name="name"
              placeholder="Enter Home Title..."
              type="text"
            />
          </div>
          <div className="mb-4">
            <label>Home Description</label>
            <textarea
              defaultValue={introduction || ""}
              name="introduction"
              className="resize-none"
              rows={5}
            ></textarea>
          </div>
          <div className="mb-4">
            <label>Home Price</label>
            <input
              defaultValue={price}
              name="price"
              placeholder="Enter Home Price..."
            />
          </div>
          <div className="mb-4">
            <label>Available Quantity</label>
            <input
              defaultValue={availableQuantity}
              name="availableQuantity"
              placeholder="Enter Available Quantity..."
            />
          </div>
          <div className="mb-10">
            <label>Home Thumnail</label>
            <input
              onChange={(e) => {
                setSelectedImage(e.target.files[0]);
              }}
              accept="image/*"
              name="homeThumbnail"
              type={"file"}
            />
            {/* {(homeThumbnail || previewUrl) && (
              <img
                className="h-48"
                alt="thumbnail"
                src={
                  previewUrl
                    ? previewUrl
                    : `${BASE_API_URL}/uploads/${homeThumbnail}`
                }
              />
            )} */}
          </div>
          <div className="flex items-center mb-5">
            <button className="w-full">Submit</button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default AddHome;
