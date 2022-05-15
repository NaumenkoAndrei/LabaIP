class Road {
  constructor(image, y) {
    this.x = 0;
    this.y = y;
    this.loaded = false;

    this.image = new Image();

    var obj = this;

    this.image.addEventListener("load", function () { obj.loaded = true; });

    this.image.src = image;
  }

  Update(road) {
    this.y += speed; //При обновлении изображение смещается вниз

    if(this.y > window.innerHeight){ //Если изображение ушло за край холста, то меняем положение
      this.y = road.y - canvas.width + speed; //Новое положение указывается с учётом второго фона
    }
  }
}

class Car {
  constructor(image, x, y, isPlayer) {
    this.x = x;
    this.y = y;
    this.loaded = false;
    this.dead = false;
    this.isPlayer = isPlayer;

    this.image = new Image();

    var obj = this;

    this.image.addEventListener("load", function () { obj.loaded = true; });

    this.image.src = image;
  }

  Update() {
    if(!this.isPlayer) {
      this.y += speed;
    }

    if(this.y > canvas.height + 50) {
      this.dead = true;
    }
  }

  Collide(car) {
    var hit = false;

    if(this.y < car.y + car.image.height * scale && this.y + this.image.height * scale > car.y){ //Если объекты находятся на одной линии по горизонтали
      if(this.x + this.image.width * scale > car.x && this.x < car.x + car.image.width * scale){ //Если объекты находятся на одной линии по вертикали
        hit = true;
      }
    }

    return hit;
  }

  Move(v, d) {
    if(v == "x"){ //Перемещение по оси X
      d *= 2;

      this.x += d; //Смещение

      //Если при смещении объект выходит за края холста, то изменения откатываются
      if(this.x + this.image.width * scale > canvas.width) {
        this.x -= d;
      }

      if(this.x < 0) {
        this.x = 0;
      }
    }
    else{ //Перемещение по оси Y
      this.y += d;

      if(this.y + this.image.height * scale > canvas.height) {
        this.y -= d;
      }

      if(this.y < 0) {
        this.y = 0;
      }
    }
  }
}


const UPDATE_TIME = 1000 / 60;

var timer = null;

var canvas = document.getElementById("canvas"); //Получение холста из DOM
var ctx = canvas.getContext("2d"); //Получение контекста — через него можно работать с холстом

var scale = 0.15; //Размер автомобилей

Resize(); //При загрузке страницы задаётся размер холста

window.addEventListener("resize", Resize); //При изменении размеров окна будут меняться размеры холста

//Запрет на открытие контекстного меню для улучшения игры на мобильных устройствах
canvas.addEventListener("contextmenu", function (e) { e.preventDefault(); return false; });

window.addEventListener("keydown", function (e) { KeyDown(e); }); //Получение нажатий с клавиатуры

var objects = []; //Массив игровых объектов

var roads = [
    new Road("/images/road.jpg", 0),
    new Road("/images/road.jpg", canvas.width)
  ]; //Массив с фонами

var player = new Car("/images/car.png", canvas.width / 2, canvas.height / 2, true); //Объект игрока

var speed = 5;

Start();

function Start() {
  if(!player.dead) {
    timer = setInterval(Update, UPDATE_TIME); //Обновление игры 60 раз в секунду
  }
}

function Stop() {
  clearInterval(timer); //Остановка игры
  timer = null;
}

function Update() { //Обновление игры
  roads[0].Update(roads[1]);
  roads[1].Update(roads[0]);

  if(RandomInteger(0, 10000) > 9700){ //Создание нового автомобиля
    objects.push(new Car("/images/car_rival.png", RandomInteger(30, canvas.width - 50), RandomInteger(250, 400) * -1, false));
  }

  player.Update();

  if(player.dead) {
    alert("Поражение!\nОбновите страницу, чтобы начать заново.");
    Stop();
  }

  var isDead = false;

  for(var i = 0; i < objects.length; i++) {
    objects[i].Update();

    if(objects[i].dead) {
      isDead = true;
    }
  }

  if(isDead) {
    objects.shift();
  }

  var hit = false;

  for(var i = 0; i < objects.length; i++) {
    hit = player.Collide(objects[i]);

    if(hit) {
      alert("Поражение!\nОбновите страницу, чтобы начать заново.");
      Stop();
      player.dead = true;
      break;
    }
  }

  Draw();
}

function Draw(){ //Работа с графикой
  ctx.clearRect(0, 0, canvas.width, canvas.height); //Очистка холста от предыдущего кадра

  for(var i = 0; i < roads.length; i++) {
    ctx.drawImage(
      roads[i].image, //Изображение для отрисовки
      0, //Начальное положение по оси X на изображении
      0, //Начальное положение по оси Y на изображении
      roads[i].image.width, //Ширина изображения
      roads[i].image.height, //Высота изображения
      roads[i].x, //Положение по оси X на холсте
      roads[i].y, //Положение по оси Y на холсте
      canvas.width, //Ширина изображения на холсте
      canvas.width  //Так как ширина и высота фона одинаковые, в качестве высоты указывается ширина
    );
  }

  DrawCar(player);

  for(var i = 0; i < objects.length; i++) {
    DrawCar(objects[i]);
  }
}

function DrawCar(car) {
  ctx.drawImage (
    car.image, //Изображение для отрисовки
    0, //Начальное положение по оси X на изображении
    0, //Начальное положение по оси Y на изображении
    car.image.width, //Ширина изображения
    car.image.height, //Высота изображения
    car.x, //Положение по оси X на холсте
    car.y, //Положение по оси Y на холсте
    car.image.width * scale, //Ширина изображения на холсте, умноженная на масштаб
    car.image.height * scale //Высота изображения на холсте, умноженная на масштаб
  );
}

function KeyDown(e) {
  //Обработка клавиш
  switch(e.keyCode) {
    case 37: //Влево
      player.Move("x", -speed);
      break;

    case 39: //Вправо
      player.Move("x", speed);
      break;

    case 38: //Вверх
      player.Move("y", -speed);
      break;

    case 40: //Вниз
      player.Move("y", speed);
      break;

    case 27: //Esc
      if(timer == null) {
        Start();
      }
      else {
        Stop();
      }
      break;
  }
}

function Resize() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

//Добавление машин с помощью генератора случайных чисел
function RandomInteger(min, max) {
  let rand = min - 0.5 + Math.random() * (max - min + 1);
  return Math.round(rand);
}