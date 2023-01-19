import userSrv from "../Services/userSrv";
import cryptoJs from "crypto-js";
import {useState} from "react";
import {useEffect} from "react";
import { useNavigate } from "react-router-dom";
import { Outlet, Link } from "react-router-dom";

function Update(){
    const [res,setRes] = useState('No Result');
    const [count, setCount] = useState(0);
    const navigate = useNavigate();

    const dec = (encData,key) =>{
        const decData = cryptoJs.AES.decrypt(encData,key);
        return decData.toString(cryptoJs.enc.Utf8);
    };
    // if(sessionStorage.getItem("user") != null){
    //     const formData = new FormData();
    //     formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog"));
    //     userSrv.register("checkSession.php", formData)
    //     .then(response=>{
    //       setRes(response.data);
    //     })
    //     .catch(err=>{
    //       console.log(err);
    //     })
    // }
    const deleteItems=()=> {
        // e.preventDefault();
        sessionStorage.clear();
        // window.location.href = '/test';
      }

    useEffect(() => {
    // Update the document title using the browser API
    if (count>0){
        deleteItems();
        navigate('/');
    }
    if(sessionStorage.getItem("user") != null){
        const formData = new FormData();
        formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog")); // obtener id 
        userSrv.register("checkSession.php", formData)
        .then(response=>{
            setRes(response.data);
            console.log(res);
        })
        .catch(err=>{
          console.log(err);
        })
    }else{
        navigate('/');
    }
    });
    const register = (event) => {
        event.preventDefault();
        const formData = new FormData(event.target);
        formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog"));
        // formData.append("fakeInput","fakevalue");
        userSrv.register("update.php",formData)
        .then(response=>{
          setRes(response.data);
          console.log(response);
        })
        .catch(err=>{
          console.log(err);
        })
    }
    //************************style */
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
    const mystyleul = {
        display: "flex",
        justifyContent: "space-between",
        color: "white",
        backgroundColor: "DodgerBlue",
        padding: "10px",
        fontFamily: "Arial",
        width: "50%"
    };
    const mystylenav = {
        backgroundColor: "DodgerBlue",
        width: "100%"
    };
    const mystyleli = {
        display: "flex",
        textDecoration: 'none',
        color: "white",
        backgroundColor: "DodgerBlue",
        padding: "10px",
        fontFamily: "Arial",
    };
    //*********************END STYLE************ */
        
    return(
        <>
        <button style={stylebtn} onClick={() => setCount(count + 1)} onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave}>Log Out</button>
        {/* <h2 style={{textTransform: "capitalize"}}>{res}</h2> */}
        <nav style={mystylenav}>
                <ul style={mystyleul}>
                    <li>
                        <Link to="/logged" style={mystyleli}>Home</Link>
                    </li>
                    <li>
                        <Link to="/reservation" style={mystyleli}>Reservation</Link>
                    </li>
                    <li>
                        <Link to="/test" style={mystyleli}>Log in</Link>
                    </li>
                    <li>
                        <Link to="/register" style={mystyleli}>Register</Link>
                    </li>
                    <li>
                        <Link to="/update" style={mystyleli}>Update</Link>
                    </li>
                    <li>
                        <Link to="/StdList" style={mystyleli}>List</Link>
                    </li>
                    <li>
                        <Link to="/Homes" style={mystyleli}>Homes</Link>
                    </li>
                    {/* <li>
                        <Link to="/AddHome" style={mystyleli}>Add Home</Link>
                    </li> */}
                    {/* <li>
                        <Link to="/Products" style={mystyleli}>Products</Link>
                    </li> */}
                    {/* <li>
                        <Link to="/AddProducts" style={mystyleli}>Add Products</Link>
                    </li> */}
                </ul>
        </nav>
        <Outlet/>
        <section>
        <div className="row justify-content-center align-items-center g-2">
          <h1>{res}</h1>
            <div className="col-4">
            {/* <button style={stylebtn} onClick={() => setCount(count + 1)} onMouseEnter={handleMouseEnter} onMouseLeave={handleMouseLeave}>Home</button> */}
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
            <button type="submit" className="btn btn-outline-primary">Register</button>
        </form></div>
        </div>
        </section>
        </>
    )
};
export default Update;









