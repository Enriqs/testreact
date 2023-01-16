import axios from "axios";

export default axios.create({
    baseURL:"http://localhost:8080/final3/backend/",
    headers:{
        // "Content-type":"application/json"
    }
})