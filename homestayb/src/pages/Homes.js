import React, { useEffect, useState } from "react";
import Home from "../components/Home";
import { getProducts } from "../features/apiCalls";
import { Outlet,Link } from "react-router-dom";
import { useNavigate } from "react-router-dom";
import userSrv from "../Services/userSrv";
import cryptoJs from "crypto-js";

const Homes = () => {
  const [homes, setHomes] = useState([]);
  useEffect(() => {
    const fetchHomes = async () => {
      const { data, error } = await getProducts();
      if (error) {
        console.log(error);
      } else {
        setHomes(data);
      }
    };
    fetchHomes();
  }, []);
  // NAVIGATE
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


  // END NAVIGATE
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

  return (
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
    <div className="container py-20 w-full max-w-5xl">
      <div className="flex justify-between items-center mb-10">
        <h2 className="text--title">Homestay List</h2>
        <Link to="/addHome">
          {/* <button>Add Homestay</button> */}
          <button type="button" className="btn btn-outline-primary">Add Homestay</button>
        </Link>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-3 gap-y-6 md:gap-6">
        {homes.length > 0 ? (
          homes.map((home) => {
            return <Home key={home.home_id} {...home} />;
          })
        ) : (
          <p>No Homestay Found.</p>
        )}
      </div>
    </div>
    </>
  );
};

export default Homes;
