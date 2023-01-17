import userSrv from "../Services/userSrv";
import {useState} from "react";
import { useNavigate } from "react-router-dom";
import cryptoJs from "crypto-js";
import {useEffect} from "react";

function Test(){
  const [res,setRes] = useState('');
  const navigate = useNavigate();
  const [count, setCount] = useState(0);

  const enc = (data,key) =>{
    const encData = cryptoJs.AES.encrypt(data,key).toString();
    return encData;
  };
  const dec = (encData,key) =>{
      const decData = cryptoJs.AES.decrypt(encData,key);
      return decData.toString(cryptoJs.enc.Utf8);
  };
  
  const register = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    // formData.append("fakeInput","fakevalue");
    userSrv.register("login.php",formData)
    .then(response=>{
      setRes(response.data);
      console.log(response);
      if (response.data==123){
        sessionStorage.setItem("user", enc(formData.get("id"), "Hotdog"));
        console.log(dec(sessionStorage.getItem("user"), "Hotdog"));
        navigate('/logged');
      }
    })
    .catch(err=>{
      console.log(err);
    })
    
  }
//**********STYLE START *************** */
const [isHover, setIsHover] = useState(false);
const [isHover2, setIsHover2] = useState(false);

    const handleMouseEnter = () => {
      setIsHover(true);
    };
    const handleMouseLeave = () => {
      setIsHover(false);
    };
    const handleMouseEnter2 = () => {
      setIsHover2(true);
    };
    const handleMouseLeave2 = () => {
      setIsHover2(false);
    };
    const stylebtn = {
        display: "flex",
        color: isHover ? 'black' : 'white',
        backgroundColor: isHover ? 'lightblue' : 'green',
        padding: "10px",
        fontFamily: "Arial",
        cursor: 'pointer'
    };
    const stylebtn1 = {
        display: "flex",
        backgroundColor: isHover2 ? 'white' : 'DodgerBlue',
        color: isHover2 ? 'black' : 'white',
        padding: "10px",
        fontFamily: "Arial",
        cursor: 'pointer'
    };
//*************STYLE END**************** */
useEffect(() => {
  if (count==2){
    navigate('/register');
}
  });
    return(
        <>
        <h1>{res}</h1>
        <div className="card mb-3">
    <div className="row g-0 d-flex align-items-center">
      <div className="col-lg-4 d-none d-lg-flex">
        <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
          className="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" />
      </div>
      <div className="col-lg-8">
        <div className="card-body py-5 px-md-5" style={{display:'flex'}}>

        <form onSubmit={register} style ={{display:'flex'}}>  
     
            <div className="form-outline mb-4">
                <label className="form-label">User ID  </label>
                <input className="form-control" placeholder="input id" name="id" type="text" autoFocus/>  
            </div>
   
            <div className="form-outline mb-4">
                <label className="form-label">Password  </label>
                <input className="form-control" placeholder="Password" name="pass" type="password"/> 
            </div>


            <input style={stylebtn1} className="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" onMouseEnter={handleMouseEnter2} onMouseLeave={handleMouseLeave2}/>  

          </form>
          <button style={stylebtn} onClick={() => setCount(2)} onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave}>Register</button>
        </div>
      </div>
    </div>
  </div>
        </>
    )
};
export default Test;