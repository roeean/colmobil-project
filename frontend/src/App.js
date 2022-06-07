import { useEffect, useState } from "react";
import { Route, Routes, Navigate } from "react-router-dom";

// Pages
import Models from "./Pages/Models/Models";
import ModelDetails from "./Pages/Levels/Levels";

// Components
import Progress from "./Components/Layout/Progress";
import "./App.css";

// Data
import hyundaiContext from "./Context";
import { headers } from "./Config";
import axios from "axios";

function App() {
  const [ready, setReady] = useState(false);
  const [models, setModels] = useState([]);

  useEffect(() => {
    axios
      .get("/wp-json/v1/models", { headers })
      .then((res) => {
        setModels(res.data);
        setReady(true);
      })
      .catch((err) => console.log(err));
  }, []);

  if (!ready) return <Progress />;
  return (
    <hyundaiContext.Provider value={{ models, levels: [] }}>
      <div className="App">
        <Routes>
          <Route path="/models" element={<Models />} />
          <Route path="/models/:id" element={<ModelDetails />} />
          <Route path="/" element={<Navigate to="/models" />} />
          <Route path="404" element={<p>העמוד לא נמצא</p>} />
          <Route path="*" element={<Navigate to="/404" replace />} />
        </Routes>
      </div>
    </hyundaiContext.Provider>
  );
}

export default App;
