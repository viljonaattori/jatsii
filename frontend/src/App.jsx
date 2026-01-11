import { useEffect, useState } from "react";

function App() {
  const [apiStatus, setApiStatus] = useState("Loading...");

  useEffect(() => {
    fetch("http://localhost:8000")
      .then((res) => res.json())
      .then((data) => {
        setApiStatus(data.message);
      })
      .catch(() => {
        setApiStatus("API connection failed");
      });
  }, []);

  return (
    <div style={{ padding: "2rem" }}>
      <h1>Yatchee Multiplayer</h1>
      <p>Backend says: {apiStatus}</p>
    </div>
  );
}

export default App;
