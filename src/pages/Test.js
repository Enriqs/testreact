import userSrv from "../Services/userSrv";
import {useState} from "react";
import cryptoJs from "crypto-js";
import { useNavigate } from "react-router-dom";
import { Link } from "react-router-dom";

function Test(){
const [res,setRes] = useState('');
const navigate = useNavigate();

const enc = (data,key) =>{
const encData = cryptoJs.AES.encrypt(data,key).toString();
return encData;
};//encode

const login = (event) => {
event.preventDefault();//prevent refreshing and submitting
const formData = new FormData(event.target);//Formdata is the value the people type in form
userSrv.register("login.php",formData)
.then(response=>{//response is data(contents of echo) from login.php
console.log(response.data);

if(response.data == 0 ){
setRes('User not found');
}else if(response.data == 1){
setRes('Username / Password is not correct');
}else{
//login success
sessionStorage.setItem("user", enc(formData.get("id"), "Hotdog"));
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
// display: "flex",
color: isHover ? 'black' : 'white',
backgroundColor: isHover ? 'lightblue' : 'green',
padding: "0px",
fontFamily: "Arial",
cursor: 'pointer',
width:'15vh',
height:'4vh',
marginTop:'3.3vh'
};
const stylebtn1 = {
// display: "flex",
width:'15vh',
height:'4vh',
backgroundColor: isHover2 ? 'white' : 'DodgerBlue',
color: isHover2 ? 'black' : 'white',
padding: "0px",
fontFamily: "Arial",
cursor: 'pointer',
};
//************STYLE END*************** */

const logOut =()=>{
setRes('logout');
sessionStorage.clear();
}
return(
<>
<button onClick={()=>logOut()}>Logout</button>
<h1>{res}</h1>
<div className="card mb-3">
<div className="row g-0 d-flex align-items-center">
<div className="col-lg-4 d-none d-lg-flex">
{/* <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg" alt="Trendy Pants and Shoes"
className="w-100 rounded-t-5 rounded-tr-lg-0 rounded-bl-lg-5" /> */}
</div>
<div className="col-lg-8">
<div className="card-body py-5 px-md-5" style={{display:'flex'}}>

<form onSubmit={(e)=>login(e)} style ={{display:'flex', alignItems:'center'}}>

<div className="form-outline mb-4">
<label className="form-label">User ID </label>
<input className="form-control" placeholder="input id" name="id" type="text" autoFocus/>
</div>

<div className="form-outline mb-4">
<label className="form-label">Password </label>
<input className="form-control" placeholder="Password" name="pass" type="password"/>
</div>
{/* riku added from here */}
<div className="form-floating mb-3">
{/* change name */}
<select name="type">
<option disabled>Choose your usertype</option>
<option value="0">owner</option>
<option value="1">student</option>
<option value="2">admin</option>
</select>
<label htmlFor="role"></label>
</div>
{/* to here */}


<input style={stylebtn1} className="btn btn-lg btn-success btn-block" type="submit" value="login" name="login" onMouseEnter={handleMouseEnter2} onMouseLeave={handleMouseLeave2}/>
</form>
<Link style={stylebtn} className="btn btn-lg btn-success btn-block" onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave} to="/register">register</Link>
</div>
</div>
</div>
</div>
</>
)
};
export default Test;