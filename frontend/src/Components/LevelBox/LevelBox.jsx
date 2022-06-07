import React from "react";
import { useState } from "react";
import "./LevelBox.css";

function LevelBox({ level, onSelect, selected, count }) {
  const [mouseOver, setMouseOver] = useState(false);

  const handleStyle = () => {
    if (mouseOver || selected == level.id) return "btnOut";
    return "btnOver";
  };

  const handleClass = () => {
    if (count == 2) return "col-12 col-sm-6";
    else if (count == 3) return "col-12 col-sm-4 col-xl-4";
    return "col-12 col-sm-6 col-xl-3";
  };

  return (
    <div
      onClick={() => onSelect(level.id)}
      onMouseOver={() => {
        setMouseOver(true);
      }}
      onMouseLeave={() => {
        setMouseOver(false);
      }}
      className={handleClass()}
    >
      <div className={"p-3 mb-3 border row text-center " + handleStyle()}>
        <span id="name">{level.name}</span>
        <span id="description">{level.description}</span>
      </div>
    </div>
  );
}

export default LevelBox;
