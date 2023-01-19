import userSrv from "../Services/userSrv";
import {useState} from "react";
function RegCompo(){
  const [res,setRes] = useState('');
  const register = (event) => {
    event.preventDefault();
    const formData = new FormData(event.target);
    // formData.append("fakeInput","fakevalue");
    userSrv.register("userReg.php",formData)
    .then(response=>{
      setRes(response.data);
      console.log(response);
    })
    .catch(err=>{
      console.log(err);
    })
  }
    return(
      <div className="row justify-content-center align-items-center g-2">
          <h1>{res}</h1>
            <div className="col-4">
              <form onSubmit={register}>
            <div className="form-floating mb-3">
              <input
                type="text"
                className="form-control" name="fname" placeholder="" required/>
              <label htmlFor="fname">FirstName</label>
            </div>
            <div className="form-floating mb-3">
              <input
                type="text"
                className="form-control" name="lname" placeholder="" required/>
              <label htmlFor="lname">LastName</label>
            </div>
            <div className="form-floating mb-3">
              <input
                type="text"
                className="form-control" name="phone" placeholder="" required/>
              <label htmlFor="fname">Phone Number</label>
            </div>
            <div className="form-floating mb-3">
              <input
                type="date"
                className="form-control" name="dob" placeholder="" required/>
              <label htmlFor="fname">Birthday</label>
            </div>
            <div className="form-floating mb-3">
              <input
                type="text"
                className="form-control" name="schoolid" placeholder="" required/>
              <label htmlFor="fname">School ID</label>
            </div>
            <div className="form-floating mb-3">
              <input
                type="password"
                className="form-control" name="pass" placeholder="" required />
              <label htmlFor="pass">Password</label>
            </div>
            <button type="submit" className="btn btn-outline-primary">Register</button>
        </form></div>
        </div>
        
    )
};
export default RegCompo;