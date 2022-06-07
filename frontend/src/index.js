import React from "react";
import ReactDOM from "react-dom/client";

import "bootstrap/dist/css/bootstrap.rtl.css";
import "font-awesome/css/font-awesome.css";

import { BrowserRouter } from "react-router-dom";
import Navbar from "./Components/Layout/Navbar";
import App from "./App";

const root = ReactDOM.createRoot(document.getElementById("root"));

root.render(
  <BrowserRouter>
    <Navbar />
    <div className="container mt-4">
      <App />
    </div>
  </BrowserRouter>
);
