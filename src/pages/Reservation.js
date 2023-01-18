import userSrv from "../Services/userSrv";
import cryptoJs from "crypto-js";
import {useState} from "react";
import {useEffect} from "react";
import { useNavigate } from "react-router-dom";
import { Outlet, Link } from "react-router-dom";
// import Calendar from 'react-calendar'; // calendar
// import './App.css'; // css calendar
function Reservation(){
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
        formData.append("id",dec(sessionStorage.getItem("user"), "Hotdog"));
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
        <h2 style={{textTransform: "capitalize"}}>{res}</h2>
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
                </ul>
        </nav>
        <Outlet/>
        <section>

        </section>
        </>
    )
};
export default Reservation;