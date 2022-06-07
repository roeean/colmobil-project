import React, { useState, useEffect, useContext } from "react";
import { useParams } from "react-router-dom";
import "./Levels.css";

// Components
import NavBottom from "../../Components/Layout/NavBottom";
import Progress from "../../Components/Layout/Progress";
import LevelBox from "../../Components/LevelBox/LevelBox";

// Data
import hyundaiContext from "../../Context";
import { headers } from "../../Config";
import axios from "axios";

function ModelDetails() {
  const [ready, setReady] = useState(false);

  const context = useContext(hyundaiContext);
  const { id } = useParams();

  const [model, setModel] = useState({});
  const [levels, setLevels] = useState([]);
  const [selectedLevel, setSelectedLevel] = useState(0);

  useEffect(() => {
    const filterLevels = context.levels.filter((level) => level.model_id == id);
    if (filterLevels.length !== 0) {
      setLevels(filterLevels);
      setSelectedLevel(filterLevels[0].id);
      setReady(true);
    } else
      axios
        .get("/wp-json/v1/levels", { headers })
        .then((res) => {
          const filtered = res.data.filter((model) => model.model_id == id);
          context.levels = [...context.levels, ...filtered];
          setSelectedLevel(filtered[0].id);
          setLevels(filtered);

          const model = context.models.find((model) => model.id == id);
          setModel(model);

          setReady(true);
        })
        .catch((err) => console.log(err));
  }, []);

  const handleInformation = () => {
    const level = levels.find((level) => level.id == selectedLevel);
    if (!level) return null;

    return (
      <div id="infoBox">
        <div id="imgBox">
          <img src={level?.image} />
        </div>
        <div className="row" style={{ direction: "ltr" }}>
          <span id="sum">₪ סה״כ {parseInt(level.price).toLocaleString()}</span>
          <span id="fee">
            בתוספת אגרת רישוי בסך {parseInt(level.licenseFee).toLocaleString()}{" "}
            ₪ כולל מע״מ
          </span>
        </div>
      </div>
    );
  };

  if (!ready) return <Progress />;
  return (
    <React.Fragment>
      <h1 className="mb-4 font-weight-bold text-center">
        בחרו את רמת הגימור ל- {model.name} החדשה שלכם
      </h1>

      <div className="row gx-5">
        {levels.map((level) => (
          <LevelBox
            key={level.id}
            level={level}
            count={levels.length}
            onSelect={(id) => setSelectedLevel(id)}
            selected={selectedLevel}
          />
        ))}
      </div>

      {handleInformation()}

      <NavBottom />
    </React.Fragment>
  );
}

export default ModelDetails;
