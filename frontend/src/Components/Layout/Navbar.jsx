import React from "react";
import { NavLink } from "react-router-dom";

const Navbar = () => {
  return (
    <React.Fragment>
      <nav className="navbar navbar-light bg-light sticky-top border">
        <div className="container">
          <NavLink to="/" className="navbar-brand">
            אולם התצוגה הדיגיטלי
          </NavLink>
          <div className="brand-logo">
            <img src="https://www.hyundaimotors.co.il/wp-content/themes/hyundai/images/hyundai-logo.svg" />
          </div>
        </div>
      </nav>
    </React.Fragment>
  );
};

export default Navbar;
