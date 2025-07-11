const express = require("express");
const path = require("path");

const app = express();
const PORT = process.env.PORT || 3000;

// Serve static files
app.use(express.static("public"));

// Routes
app.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

app.get("/palvelut", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "palvelut.html"));
});

app.get("/yhteystiedot", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "yhteystiedot.html"));
});

app.get("/tietoa-meista", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "tietoa-meista.html"));
});

app.listen(PORT, () => {
  console.log(
    `Rengasmarket Lappeenranta server running on http://localhost:${PORT}`
  );
});
