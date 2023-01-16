import { useState } from "react";
import { useNavigate } from "react-router-dom";
import jsonSrv from "../Services/jsonSrv";
import Cryptojs from "crypto-js";
function Home({setMsg,msg}){
    const navigate = useNavigate();
    const [sid,setSid] = useState('');
    // sessionStorage.setItem("sid","test session key");
    // localStorage.setItem("sid","a key"); session ID
    // document.cookie = "sid=a key; expires=Thu, 12 Jan 2023 23:59:00 PST; path=/";
    // console.log(document.cookie);
    // console.log(sessionStorage.getItem("sid"));
    const enc = (data,key) =>{
        const encData = Cryptojs.AES.encrypt(data,key).toString();
        return encData;
    };
    const dec = (encData,key) =>{
        const decData = Cryptojs.AES.decrypt(encData,key);
        return decData.toString(Cryptojs.enc.Utf8);
    };
    
    const getSid = () =>{
        jsonSrv.get("test2.php")
        .then(res=>{
            console.log(res);
            setSid(res.data);
            sessionStorage.setItem("sid",enc(res.data.sid,"H01D0g"));
        })
    };
    const sendSid = () =>{
        const formData = new FormData();
        if(sessionStorage.getItem("sid")!= null){
            formData.append("sid",dec(sessionStorage.getItem("sid"),"H01D0g"));
            jsonSrv.send("getSid.php",formData)
            .then(res=>{
                console.log(res);
            })
        }
    }
    return(
        <>
            
            <h1>Session ID: {sid.sid}</h1>
            <input value={msg} onChange={(e)=>setMsg(e.target.value)} />
            <button onClick={()=>navigate("/about")}>Click</button>
            <button onClick={getSid}>Get Session</button>
            <button onClick={sendSid}>Send Session</button>
        </>
    )
};
export default Home;