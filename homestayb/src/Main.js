import ReactDOM from 'react-dom/client';
import {BrowserRouter,Routes,Route} from 'react-router-dom';
import Test from './pages/Test';
// import Home from './pages/Home';
// import About from './pages/About';
import Layout from './pages/Layout';
import Nopage from './pages/Nopage';
import RegCompo from './pages/RegCompo';
import Logged from './pages/Logged';
import { useState } from 'react';
import Reservation from './pages/Reservation';
import Homes from "./pages/Homes";
import AddHome from "./pages/AddHome";
import Products from './pages/Products';
import AddProduct from './pages/AddProduct';
import Update from './pages/Update';


function Main(){
    // const [msg,setMsg] = useState("");
    return(
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Layout/>}>
                    <Route index element={<Test/>}/>
                    {/* <Route path='about' element={<About msg={msg}/>}/> if path == /about then displaying componenet should be <About/> */}
                    <Route path='register' element={<RegCompo/>}/>
                    <Route path='test' element={<Test/>}/>
                    <Route path='logged' element={<Logged/>}/>
                    <Route path='reservation' element={<Reservation/>}/>
                    <Route path='update' element={<Update/>}/>
                    <Route path="addHome" element={<AddHome />} />
                    <Route path="Homes" element={<Homes/>} /> 
                    <Route path="Products" element={<Products/>} /> 
                    <Route path="AddProduct" element={<AddProduct/>} /> 
                    <Route path='nopage' element={<Nopage/>}/>
                    <Route path="updateHome/:id" element={<AddHome />} />

                    <Route path='*' element={<Nopage/>}/>
                </Route>
            </Routes>
        </BrowserRouter>
    )
};
export default Main;