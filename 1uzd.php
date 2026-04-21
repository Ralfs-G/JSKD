<h2>1. Uzdevums</h2>
<input id="vards" placeholder="Ievadi vārdu">
<button onclick="sveiciens()">OK</button>
<p id="rez1"></p>

<script>
  function sveiciens() {
    let v = document.getElementById("vards").value.trim();
    if (v === "") {
        document.getElementById("rez1").innerText = "Lūdzu ievadi vārdu!";
        return;
    }
  
    document.getElementById("rez1").innerHTML = "Sveiks, " + v + "!<br>Vārdā ir " + v.length + " burti";
}
