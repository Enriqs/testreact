import userSrv from "../Services/userSrv";
import cryptoJs from "crypto-js";
import {useState} from "react";
import {useEffect} from "react";
import { useNavigate } from "react-router-dom";
import { Outlet, Link } from "react-router-dom";
import Calendar from 'react-calendar'; // calendar
import './App.css'; // css calendar
function Reservation(){
    const [res,setRes] = useState('No Result');
    const [count, setCount] = useState(0);
    const navigate = useNavigate();
    //const [date, setDate] = useState(new Date()); // Get selected date
    const [date, setDate] = useState(new Date());
    // console.log(date);

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
        // console.log(formData);
        userSrv.register("checkSession.php", formData)
        .then(response=>{
            setRes(response.data);
            // console.log(res);
        })
        .catch(err=>{
          console.log(err);
        })
    }else{
        navigate('/');
    }
    });
    /**********CALENDAR */
    /*****To get today data */
    const today = new Date();
    let day = today.getDate();
    let month = today.getMonth();
    let year = today.getFullYear();
    /************REGISTER DATE *************/
    const registerdate = (event) => {
        event.preventDefault();
        const formData2 = new FormData(event.target);
        // const regdate=date;
        let datea=[date[0].getDate(),(date[0].getMonth()+1),date[0].getFullYear()];
        let dateb=[date[1].getDate(),(date[1].getMonth()+1),date[1].getFullYear()];
        // let currentDate=[datea,dateb];
        // console.log(currentDate);
        formData2.append("datea",datea);
        formData2.append("dateb",dateb);
        formData2.append("uid",dec(sessionStorage.getItem("user"), "Hotdog"));
        // formData2.append("hid",dec(sessionStorage.getItem("user"), "Hotdog"));
        userSrv.register("regcalendar.php",formData2)
         .then(response=>{
           console.log(response);
         })
         .catch(err=>{
           console.log(err);
         })
      }

    /************To get dates to color */

    /************END CALENDAR******** */
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
                        <Link to="/test" style={mystyleli}>Students List </Link>
                    </li>
                    <li>
                        <Link to="/register" style={mystyleli}>Register</Link>
                    </li>
                </ul>
        </nav>
        <Outlet/>
        <section className="row justify-content-center align-items-center g-2">
            {/* CALENDAR START */}
        <div className='app ' style={{width:'20%'}}> 
        <h1 className='text-center'>Available days Calendar</h1>
      <div className='calendar-container'>
        <Calendar
        onChange={setDate}
        value={date}
        selectRange={true}
        // defaultValue={date} 
        minDate={new Date(year, month, day)}  
        />
      </div>
      {date.length > 0 ? (
        <p className='text-center'>
          <span className='bold'>Start:</span>{' '}
          {date[0].toDateString()}
          &nbsp;|&nbsp;
          <span className='bold'>End:</span> {date[1].toDateString()}
        </p>
      ) : (
        <p className='text-center'>
          <span className='bold'>Default selected date:</span>{' '}
          {date.toDateString()}
        </p>
      )}
        </div>
        </section>
        <div>
        <form onSubmit={registerdate}>
        <div className="mb-3" style={{width:'20vh'}}>
              <label className="form-label">House ID</label>
              <input type="text"className="form-control" name="hid" id="" aria-describedby="helpId" placeholder="#" required/>
            </div>
        <button type="submit" className="btn btn-outline-primary" name='arr'>Register Dates</button>
        </form>
        </div>
        </>
    )
};
export default Reservation;