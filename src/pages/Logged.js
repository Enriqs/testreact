import userSrv from "../Services/userSrv";
import cryptoJs from "crypto-js";
import {useState} from "react";
import {useEffect} from "react";
import { useNavigate } from "react-router-dom";


function Logged(){
    const [res,setRes] = useState('No Result');
    const [count, setCount] = useState(0);
    const navigate = useNavigate();

    const dec = (encData,key) =>{
        const decData = cryptoJs.AES.decrypt(encData,key);
        return decData.toString(cryptoJs.enc.Utf8);
    };
    if(sessionStorage.getItem("user") != null){
        const formData = new FormData();
        formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog"));
        userSrv.register("checkSession.php", formData)
        .then(response=>{
          setRes(response.data);
        })
        .catch(err=>{
          console.log(err);
        })
    }



    const deleteItems=()=> {
        // e.preventDefault();
        sessionStorage.clear();
        // window.location.href = '/test';
      }

    useEffect(() => {
    // Update the document title using the browser API
    if (count>0){
        deleteItems();
        navigate('/test');
    }
    if(sessionStorage.getItem("user") != null){
        const formData = new FormData();
        formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog"));
        userSrv.register("checkSession.php", formData)
        .then(response=>{
          setRes(response.data);
        })
        .catch(err=>{
          console.log(err);
        })
    }else{
        navigate('/test');
    }
    });
        
    return(
        <>

        <h1>Logged</h1>
        <h2>{res}</h2>
        <button onClick={() => setCount(count + 1)}>Log Out</button>
        </>
    )
};
export default Logged;