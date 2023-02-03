//Авторизация
//

let auth = document.querySelector(".auth");
auth.addEventListener("submit", func1);

async function func1(e) {
  let inputs = document.querySelectorAll("input");
  let login = document.querySelector('input[name="login"]');
  let password = document.querySelector('input[name="password"]');
  let mes = document.querySelector(".mes");
  e.preventDefault();
  for (let el of inputs) {
    el.classList.remove("error");
  }
  let response = await fetch("vender/signin.php", {
    method: "POST",
    body: new FormData(this),
  });

  let result = await response.json();

  if (result.status === true) {
    document.location.href = "/profile.php";
  } else {
    if (result.type === 1) {
      result.fields.forEach((field) => {
        for (let input of inputs) {
          if (input["name"] == field) {
            input.classList.add("error");
          }
        }
      });
    }

    mes.classList.remove("none");
    mes.textContent = result.message;
  }
}

//Регистрация
//

//let reg = document.querySelector(".reg");

//reg.addEventListener("submit", func2);

//async function func2(e) {
//  let inputs = document.querySelectorAll("input");
//  let login = document.querySelector('input[name="login"]');
//  let password = document.querySelector('input[name="password"]');
//  let mes = document.querySelector(".mes");
//  let full_name = document.querySelector('input[name="full_name"]');
//  let email = document.querySelector('input[name="email"]');
//  let confirm_password = document.querySelector(
//    'input[name="confirm_password"]'
//  );
//  e.preventDefault();
//  for (let el of inputs) {
//    el.classList.remove("error");
//  }
//  let response = await fetch("vender/signup.php", {
//    method: "POST",
//    body: new FormData(this),
//  });

//  let result = await response.json();

//  if (result.status === true) {
//    document.location.href = "/profile.php";
//  } else {
//    if (result.type === 1) {
//      result.fields.forEach((field) => {
//        for (let input of inputs) {
//          if (input["name"] == field) {
//            input.classList.add("error");
//          }
//        }
//      });
//    }

//    mes.classList.remove("none");
//    mes.textContent = result.message;
//  }
//}
