import ReactDOM from 'react-dom/client';
import {BrowserRouter,Routes,Route} from 'react-router-dom';
import Test from './pages/Test';
import Home from './pages/Home';
// import About from './pages/About';
import Layout from './pages/Layout';
import Nopage from './pages/Nopage';
import RegCompo from './pages/RegCompo';
import Logged from './pages/Logged';
import { useState } from 'react';

function Main(){
    const [msg,setMsg] = useState("");
    return(
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<Layout/>}>
                    <Route index element={<Home setMsg={setMsg} msg={msg}/>}/>
                    {/* <Route path='about' element={<About msg={msg}/>}/> if path == /about then displaying componenet should be <About/> */}
                    <Route path='register' element={<RegCompo/>}/>
                    <Route path='test' element={<Test/>}/>
                    <Route path='logged' element={<Logged/>}/>
                    <Route path='nopage' element={<Nopage/>}/>
                    <Route path='*' element={<Nopage/>}/>
                </Route>
            </Routes>
        </BrowserRouter>
    )
};
export default Main;