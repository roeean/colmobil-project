import React from "react";
import { NavLink } from "react-router-dom";
import PropTypes from "prop-types";
import "./ModelBox.css";

function ModelBox({ model }) {
  return (
    <div className="col-lg-4 col-md-6 col-sm-12">
      <div className="row">
        <div className="col-6 ">
          <h2 className="fw-bold text-center"> {model.name}</h2>
        </div>
        <div id="price" className="col-6 ">
          <span id="startat"> החל מ- </span>
          <span id="sum">{parseInt(model.price).toLocaleString()} ₪</span>
          <span id="fee">
            בתוספת אגרת רישוי בסך {parseInt(model.licenseFee).toLocaleString()}{" "}
            ₪
          </span>
        </div>
      </div>
      <div className="row">
        <div className="col-6">
          <img src={model.image} className="img-thumbnail border-0" />
        </div>
        <div id="linkBox" className="col-6">
          <NavLink className="btn ps-0" to={`/models/${model.id}`}>
            <button className="btn d-grid mb-2 rounded-0 col-xxl-8 col-12 btn-outline-dark">
              למידע נוסף
            </button>
          </NavLink>
        </div>
      </div>
      <div id="spacing" className="row" style={{ height: "50px" }}></div>
    </div>
  );
}

ModelBox.model = {
  book: PropTypes.object.isRequired,
};

export default ModelBox;
