import userSrv from "../Services/userSrv";
import {useState} from "react";
import {useEffect} from "react";
import { useNavigate } from "react-router-dom";
function RegCompo(){
  const [res,setRes] = useState('');
  const [count, setCount] = useState(0);
  const navigate = useNavigate();
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
  useEffect(() => {
    // Update the document title using the browser API
    if (count>0){
        navigate('/');
    }})
    //************************ */
    const [isHover, setIsHover] = useState(false);

    const handleMouseEnter = () => {
      setIsHover(true);
    };
    const handleMouseLeave = () => {
      setIsHover(false);
    };
    const stylebtn = {
        display: "flex",
        color: "white",
        backgroundColor: isHover ? 'lightblue' : 'rgb(0, 191, 255)',
        padding: "10px",
        fontFamily: "Arial",
        cursor: 'pointer'
    };
    //***************************** */
    return(
      <div className="row justify-content-center align-items-center g-2">
          <h1>{res}</h1>
            <div className="col-4">
            <button style={stylebtn} onClick={() => setCount(count + 1)} onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave}>Home</button>
            <br/>
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
            {/* riku added from here */}
            <div className="form-floating mb-3">
              <select name="role">
                <option disabled>register as</option>
                <option value="0">admin</option>
                <option value="1">owner</option>
                <option value="2">student</option>
              </select>
              <label htmlFor="role"></label>
            </div>
            {/* to here */}
            <button type="submit" className="btn btn-outline-primary">Register</button>
        </form></div>
        </div>
        
    )
};
export default RegCompo;