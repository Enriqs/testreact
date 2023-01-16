import userSrv from "../Services/userSrv";
import {useState} from "react";
import { useNavigate } from "react-router-dom";

function Test(){
  const [res,setRes] = useState('');
  const navigate = useNavigate();
  
  const register = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    // formData.append("fakeInput","fakevalue");
    userSrv.register("login.php",formData)
    .then(response=>{
      setRes(response.data);
      console.log(response);
      if (response.data==123){
          navigate('/nopage');
      }
    })
    .catch(err=>{
      console.log(err);
    })
    
    
  }
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
        <div className="card-body py-5 px-md-5">

        <form onSubmit={register}>  
     
            <div className="form-outline mb-4">
                <label className="form-label">User ID  </label>
                <input className="form-control" placeholder="input id" name="id" type="text" autoFocus/>  
            </div>
   
            <div className="form-outline mb-4">
                <label className="form-label">Password  </label>
                <input className="form-control" placeholder="Password" name="pass" type="password"/> 
            </div>


            <input className="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" />  

          </form>

        </div>
      </div>
    </div>
  </div>
        </>
    )
};
export default Test;