import React from "react";
import { NavLink } from "react-router-dom";

function NavBottom() {
  return (
    <nav
      className="navbar navbar-light bg-light  sticky-bottom fixed-bottom border"
      style={{ direction: "ltr" }}
    >
      <div className="container">
        <NavLink to="/models/" className="btn">
          <button className="btn d-grid rounded-0 btn-outline-dark">
            חזור
          </button>
        </NavLink>
      </div>
    </nav>
  );
}

export default NavBottom;
