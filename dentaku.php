<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <div class="header">
      <h1>電卓</h1>
    </div>
  
    <div class="resultzone">
      <p id="result" class="result">0</p>
    </div>
  
    <div class="keyzone">
      <table>
        <tr>
          <td id="ac" class="btn-usual">
            <p>AC</p>
          </td>
          <td id="plusminus" class="btn-usual">
            <p>±</p>
          </td>
          <td id="percent" class="btn-usual">
            <p>%</p>
          </td>
          <td id="dividedzone" class="btn-usual">
            <p id="divided" value="0">÷</p>
          </td>
        </tr>
        <tr>
          <td id="seven" class="btn-number">
            <p>7</p>
          </td>
          <td id="eight" class="btn-number">
            <p>8</p>
          </td>
          <td id="nine" class="btn-number">
            <p>9</p>
          </td>
          <td id="timeszone" class="btn-usual">
            <p id="times" value="0">×</p>
          </td>
        </tr>
        <tr>
          <td id="four" class="btn-number">
            <p>4</p>
          </td>
          <td id="five" class="btn-number">
            <p>5</p>
          </td>
          <td id="six" class="btn-number">
            <p>6</p>
          </td>
          <td id="minuszone" class="btn-usual">
            <p id="minus" value="0">-</p>
          </td>
        </tr>
        <tr>
          <td id="one" class="btn-number">
            <p>1</p>
          </td>
          <td id="two" class="btn-number">
            <p>2</p>
          </td>
          <td id="three" class="btn-number">
            <p>3</p>
          </td>
          <td id="pluszone" class="btn-usual">
            <p id="plus" value="0">+</p>
          </td>
        </tr>
        <tr>
          <td id="zero" class="btn-number" colspan="2">
            <p>0</p>
          </td>
          <td id="dot" class="btn-number">
            <p>.</p>
          </td>
          <td id="equall" class="btn-usual">
            <p>=</p>
          </td>
        </tr>
      </table>
    </div>
<script>
//結果の値
let resultNo = document.getElementById("result");

//数字がゼロの時は上書きする。
function clearZero() {
  if (resultNo.textContent === "0") {
    resultNo.innerHTML = "";
  }
}

//数字キーを打ち込まれたらACをCにする。
function addAC() {
  document.getElementById("ac").innerHTML = "C";
}

//「+」「-」「×」「÷」が押されている場合は一度値をクリアする。
function clearResult() {
  let btnPlusName = document.getElementById("plus").getAttribute("name");
  let btnMinusName = document.getElementById("minus").getAttribute("name");
  let btnTimesName = document.getElementById("times").getAttribute("name");
  let btnDividedName = document.getElementById("divided").getAttribute("name");
  let btnEquallName = document.getElementById("equall").getAttribute("name");
  let btnPercentName = document.getElementById("percent").getAttribute("name");

  if (
    btnPlusName === "1" ||
    btnMinusName === "1" ||
    btnTimesName === "1" ||
    btnDividedName === "1" ||
    btnEquallName === "1" ||
    btnPercentName === "1"
  ) {
    resultNo.innerHTML = "";
    document.getElementById("plus").setAttribute("name", 0);
    document.getElementById("minus").setAttribute("name", 0);
    document.getElementById("times").setAttribute("name", 0);
    document.getElementById("divided").setAttribute("name", 0);
    document.getElementById("equall").setAttribute("name", 0);
    document.getElementById("percent").setAttribute("name", 0);
  }
}

//上の処理をまとめた関数を作る。
function pushNumberKey() {
  addAC();
  clearZero();
  clearResult();
}

//イコールキーの動作を「+」「-」「×」「÷」キーでも使えるように関数化、
function getEquall() {
  let btnPlusName = document.getElementById("plus").getAttribute("name");
  let btnMinusName = document.getElementById("minus").getAttribute("name");
  let btnTimesName = document.getElementById("times").getAttribute("name");
  let btnDividedName = document.getElementById("divided").getAttribute("name");
  let btnEquallName = document.getElementById("equall").getAttribute("name");
  let btnPercentName = document.getElementById("percent").getAttribute("name");

  if (
    btnPlusName === "0" &&
    btnMinusName === "0" &&
    btnTimesName === "0" &&
    btnDividedName === "0" &&
    btnEquallName === "0" &&
    btnPercentName === "0"
  ) {
    let equallResult = resultNo;
    let equallResultNo = equallResult.textContent;
    let equallResultNum = Number(equallResultNo);

    let btnPlusClass = document
      .getElementById("pluszone")
      .getAttribute("class");

    let btnMinusClass = document
      .getElementById("minuszone")
      .getAttribute("class");

    let btnTimesClass = document
      .getElementById("timeszone")
      .getAttribute("class");

    let btnDividedClass = document
      .getElementById("dividedzone")
      .getAttribute("class");

    if (btnPlusClass === "btn-active") {
      let currentResultNo = document
        .getElementById("plus")
        .getAttribute("value");
      let currentResultNum = Number(currentResultNo);
      resultNo.innerHTML = currentResultNum + equallResultNum;
      clearPlus();
    } else if (btnMinusClass === "btn-active") {
      let currentResultNo = document
        .getElementById("minus")
        .getAttribute("value");
      let currentResultNum = Number(currentResultNo);
      resultNo.innerHTML = currentResultNum - equallResultNum;
      clearMinus();
    } else if (btnTimesClass === "btn-active") {
      let currentResultNo = document
        .getElementById("times")
        .getAttribute("value");
      let currentResultNum = Number(currentResultNo);
      resultNo.innerHTML = currentResultNum * equallResultNum;
      clearTimes();
    } else if (btnDividedClass === "btn-active") {
      let currentResultNo = document
        .getElementById("divided")
        .getAttribute("value");
      let currentResultNum = Number(currentResultNo);
      resultNo.innerHTML = currentResultNum / equallResultNum;
      clearDivided();
    }

    document.getElementById("equall").setAttribute("name", 1);
  }
}

//数字キーを定義
document.getElementById("one").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 1);
  document.getElementById("one").classList.remove("btn-number");
  document.getElementById("one").classList.add("btn-active");

  function clearActive() {
    document.getElementById("one").classList.remove("btn-active");
    document.getElementById("one").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("two").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 2);
  document.getElementById("two").classList.remove("btn-number");
  document.getElementById("two").classList.add("btn-active");

  function clearActive() {
    document.getElementById("two").classList.remove("btn-active");
    document.getElementById("two").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("three").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 3);
  document.getElementById("three").classList.remove("btn-number");
  document.getElementById("three").classList.add("btn-active");

  function clearActive() {
    document.getElementById("three").classList.remove("btn-active");
    document.getElementById("three").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("four").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 4);
  document.getElementById("four").classList.remove("btn-number");
  document.getElementById("four").classList.add("btn-active");

  function clearActive() {
    document.getElementById("four").classList.remove("btn-active");
    document.getElementById("four").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("five").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 5);
  document.getElementById("five").classList.remove("btn-number");
  document.getElementById("five").classList.add("btn-active");

  function clearActive() {
    document.getElementById("five").classList.remove("btn-active");
    document.getElementById("five").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("six").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 6);
  document.getElementById("six").classList.remove("btn-number");
  document.getElementById("six").classList.add("btn-active");

  function clearActive() {
    document.getElementById("six").classList.remove("btn-active");
    document.getElementById("six").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("seven").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 7);
  document.getElementById("seven").classList.remove("btn-number");
  document.getElementById("seven").classList.add("btn-active");

  function clearActive() {
    document.getElementById("seven").classList.remove("btn-active");
    document.getElementById("seven").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("eight").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 8);
  document.getElementById("eight").classList.remove("btn-number");
  document.getElementById("eight").classList.add("btn-active");

  function clearActive() {
    document.getElementById("eight").classList.remove("btn-active");
    document.getElementById("eight").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("nine").addEventListener("click", () => {
  pushNumberKey();
  resultNo.insertAdjacentHTML("beforeend", 9);
  document.getElementById("nine").classList.remove("btn-number");
  document.getElementById("nine").classList.add("btn-active");

  function clearActive() {
    document.getElementById("nine").classList.remove("btn-active");
    document.getElementById("nine").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("zero").addEventListener("click", () => {
  clearZero();
  clearResult();
  resultNo.insertAdjacentHTML("beforeend", 0);
  document.getElementById("zero").classList.remove("btn-number");
  document.getElementById("zero").classList.add("btn-active");

  function clearActive() {
    document.getElementById("zero").classList.remove("btn-active");
    document.getElementById("zero").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

document.getElementById("dot").addEventListener("click", () => {
  resultNo.insertAdjacentHTML("beforeend", ".");
  document.getElementById("dot").classList.remove("btn-number");
  document.getElementById("dot").classList.add("btn-active");

  function clearActive() {
    document.getElementById("dot").classList.remove("btn-active");
    document.getElementById("dot").classList.add("btn-number");
  }
  setTimeout(clearActive, 100);
});

function clearPlus() {
  document.getElementById("pluszone").classList.remove("btn-active");
  document.getElementById("pluszone").classList.add("btn-usual");
}

function clearMinus() {
  document.getElementById("minuszone").classList.remove("btn-active");
  document.getElementById("minuszone").classList.add("btn-usual");
}

function clearTimes() {
  document.getElementById("timeszone").classList.remove("btn-active");
  document.getElementById("timeszone").classList.add("btn-usual");
}

function clearDivided() {
  document.getElementById("dividedzone").classList.remove("btn-active");
  document.getElementById("dividedzone").classList.add("btn-usual");
}

//+キーを定義する。
document.getElementById("pluszone").addEventListener("click", () => {
  getEquall();
  let currentResultNo = resultNo;
  document.getElementById("pluszone").classList.remove("btn-usual");
  document.getElementById("pluszone").classList.add("btn-active");
  document
    .getElementById("plus")
    .setAttribute("value", currentResultNo.textContent);
  document.getElementById("plus").setAttribute("name", 1);
  clearMinus();
  clearTimes();
  clearDivided();
});

//-キーを定義する。
document.getElementById("minuszone").addEventListener("click", () => {
  getEquall();
  let currentResultNo = resultNo;
  document.getElementById("minuszone").classList.remove("btn-usual");
  document.getElementById("minuszone").classList.add("btn-active");
  document
    .getElementById("minus")
    .setAttribute("value", currentResultNo.textContent);
  document.getElementById("minus").setAttribute("name", 1);
  clearPlus();
  clearTimes();
  clearDivided();
});

//×キーを定義する。
document.getElementById("timeszone").addEventListener("click", () => {
  getEquall();
  let currentResultNo = resultNo;
  document.getElementById("timeszone").classList.remove("btn-usual");
  document.getElementById("timeszone").classList.add("btn-active");
  document
    .getElementById("times")
    .setAttribute("value", currentResultNo.textContent);
  document.getElementById("times").setAttribute("name", 1);
  clearPlus();
  clearMinus();
  clearDivided();
});

//÷キーを定義する。
document.getElementById("dividedzone").addEventListener("click", () => {
  getEquall();
  let currentResultNo = resultNo;
  document.getElementById("dividedzone").classList.remove("btn-usual");
  document.getElementById("dividedzone").classList.add("btn-active");
  document
    .getElementById("divided")
    .setAttribute("value", currentResultNo.textContent);
  document.getElementById("divided").setAttribute("name", 1);
  clearPlus();
  clearMinus();
  clearTimes();
});

//=キーを定義する。
document.getElementById("equall").addEventListener("click", () => {
  getEquall();

  document.getElementById("equall").classList.remove("btn-usual");
  document.getElementById("equall").classList.add("btn-active");

  function clearActive() {
    document.getElementById("equall").classList.remove("btn-active");
    document.getElementById("equall").classList.add("btn-usual");
  }
  setTimeout(clearActive, 100);
});

//ACキーを定義する。
document.getElementById("ac").addEventListener("click", () => {
  resultNo.innerHTML = 0;
  document.getElementById("ac").innerHTML = "AC";
  document.getElementById("pluszone").classList.remove("btn-active");
  document.getElementById("pluszone").classList.add("btn-usual");
  document.getElementById("minuszone").classList.remove("btn-active");
  document.getElementById("minuszone").classList.add("btn-usual");
  document.getElementById("timeszone").classList.remove("btn-active");
  document.getElementById("timeszone").classList.add("btn-usual");
  document.getElementById("dividedzone").classList.remove("btn-active");
  document.getElementById("dividedzone").classList.add("btn-usual");

  document.getElementById("ac").classList.remove("btn-usual");
  document.getElementById("ac").classList.add("btn-active");

  function clearActive() {
    document.getElementById("ac").classList.remove("btn-active");
    document.getElementById("ac").classList.add("btn-usual");
  }
  setTimeout(clearActive, 100);
});

//%キーを定義する。
document.getElementById("percent").addEventListener("click", () => {
  let equallResult = resultNo;
  let equallResultNo = equallResult.textContent;
  let equallResultNum = Number(equallResultNo);

  let btnPlusClass = document.getElementById("pluszone").getAttribute("class");

  let btnMinusClass = document
    .getElementById("minuszone")
    .getAttribute("class");

  let btnTimesClass = document
    .getElementById("timeszone")
    .getAttribute("class");

  let btnDividedClass = document
    .getElementById("dividedzone")
    .getAttribute("class");

  if (btnPlusClass === "btn-active") {
    let currentResultNo = document.getElementById("plus").getAttribute("value");
    let currentResultNum = Number(currentResultNo);
    resultNo.innerHTML = currentResultNum * (equallResultNum * 0.01);
  } else if (btnMinusClass === "btn-active") {
    let currentResultNo = document
      .getElementById("minus")
      .getAttribute("value");
    let currentResultNum = Number(currentResultNo);
    resultNo.innerHTML = currentResultNum * (equallResultNum * 0.01);
  } else if (btnTimesClass === "btn-active") {
    let currentResultNo = document
      .getElementById("times")
      .getAttribute("value");
    let currentResultNum = Number(currentResultNo);
    resultNo.innerHTML = currentResultNum * (equallResultNum * 0.01);
  } else if (btnDividedClass === "btn-active") {
    let currentResultNo = document
      .getElementById("divided")
      .getAttribute("value");
    let currentResultNum = Number(currentResultNo);
    resultNo.innerHTML = currentResultNum * (equallResultNum * 0.01);
  }

  document.getElementById("percent").setAttribute("name", 1);

  document.getElementById("percent").classList.remove("btn-usual");
  document.getElementById("percent").classList.add("btn-active");

  function clearActive() {
    document.getElementById("percent").classList.remove("btn-active");
    document.getElementById("percent").classList.add("btn-usual");
  }
  setTimeout(clearActive, 100);
});

//±キーを定義する。
document.getElementById("plusminus").addEventListener("click", () => {
  let equallResult = resultNo;
  let equallResultNo = equallResult.textContent;
  let equallResultNum = Number(equallResultNo);
  resultNo.innerHTML = equallResultNum - equallResultNum * 2;
});
</script>

<style>
body{
font-family:sans-serif;
}

.header {
  margin: 10px;
}

h1 {
  font-size: 28px;
  font-weight: bold;
}

.result {
  width: 320px;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
  text-align: right;
  margin: 10px;
  font-size: 50px;
  font-weight: bold;
}

table {
  width: 320px;
  margin: 10px;
  border-collapse: collapse;
  border: 1px solid #333;
}

td {
  width:80px;
  height: 60px;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  border-collapse: collapse;
  border: 1px solid #333;
  padding: 0px;
}

.btn-usual {
  background-color: rgb(218, 214, 214);
}

.btn-active {
  background-color: black;
  color: white;
}
</style>

</body>
</html>