import { Outlet, Link } from "react-router-dom";
function Layout(){
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
    return(
        <>
            {/* <nav style={mystylenav}>
                <ul style={mystyleul}>
                    <li>
                        <Link to="/" style={mystyleli}>Home</Link>
                    </li>
                    <li>
                        <Link to="/about" style={mystyleli}>About US</Link>
                    </li>
                    <li>
                        <Link to="/test" style={mystyleli}>Log in</Link>
                    </li>
                    <li>
                        <Link to="/register" style={mystyleli}>Register</Link>
                    </li>
                </ul>
            </nav> */}

            <Outlet/>
        </>
    )
};
export default Layout;