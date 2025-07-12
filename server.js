const express = require("express");
const path = require("path");
const nodemailer = require("nodemailer");
const cors = require("cors");

const app = express();
const PORT = process.env.PORT || 3000;

// Middleware
app.use(express.json());
app.use(express.static("public"));
app.use(cors());

// Contact form endpoint
app.post("/api/contact", async (req, res) => {
  try {
    const { name, email, phone, subject, message } = req.body;

    const mailOptions = {
      from: process.env.EMAIL_USER || "your-email@gmail.com",
      to: "myynti@acrengas.com",
      subject: `Uusi viesti: ${subject || "Yhteystiedot"}`,
      html: `
        <h3>Uusi viesti Rengasmarket Lappeenranta -sivustolta</h3>
        <p><strong>Nimi:</strong> ${name}</p>
        <p><strong>Sähköposti:</strong> ${email}</p>
        <p><strong>Puhelin:</strong> ${phone || "Ei annettu"}</p>
        <p><strong>Aihe:</strong> ${subject || "Ei valittu"}</p>
        <p><strong>Viesti:</strong></p>
        <p>${message}</p>
      `,
    };

    await transporter.sendMail(mailOptions);
    res.json({ success: true, message: "Viesti lähetetty onnistuneesti" });
  } catch (error) {
    console.error("Email error:", error);
    res
      .status(500)
      .json({ success: false, message: "Virhe viestin lähettämisessä" });
  }
});

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
