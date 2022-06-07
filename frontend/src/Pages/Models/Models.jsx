import React, { useContext } from "react";
import ModelBox from "../../Components/ModelBox/ModelBox";
import hyundaiContext from "../../Context";
import "./Models.css";

function Models() {
  const context = useContext(hyundaiContext);
  return (
    <React.Fragment>
      <h1 className="mb-5 font-weight-bold text-center">
        בחרו את היונדאי החדשה שלכם
      </h1>

      <div className="row">
        {context.models.map((model) => (
          <ModelBox key={model.id} model={model} />
        ))}
      </div>
    </React.Fragment>
  );
}

export default Models;
