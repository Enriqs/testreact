import axios from "axios";

export default axios.create({
    baseURL:"http://localhost/React/phpproject/",
    headers:{
        // "Content-type":"application/json"
    }
})