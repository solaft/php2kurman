<?php
//1. Создаю класс товара и описываю его свойства
class Jeans
{
public $id;
public $title;
public $description;
//2. описываю метод -  Метод для вывода описания товара
function display(){
echo "<h1>$this->title</h1><p>$this->description</p>";
}
function comment() {echo 'какой-то комментарий из 1 класса'; } //тут пытаюсь сделать наследование
function views() { $this->comment(); }
}
Class Jeanscomment extends Jeans
{
    function comment() {echo 'какой-то комментарий из класса наследника'; }
}
$a = new Jeans();
$b = new Jeanscomment();
$a->id = 1;
$a->title = 'mom jeans';
$a->description = 'стильно модно молодёжно';
$a->display(); 
$a->comment(); //выведет комментарий 1 класса
$b->views(); //вывдет наследника
$b->comment(); //выведет наследника


/* ПУНКТ 5 <?php
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo(); ВЫВЕДЕТ 1 - ПОТОМУ ЧТО ИНКРЕМЕНТ, АНАЛОГИЧНО ДЛЯ ВСЕХ ОСТАЛЬНЫХ
$a2->foo(); ВЫВЕДЕТ 2
$a1->foo(); ВЫВЕДЕТ 3
$a2->foo(); ВЫВЕДЕТ 4 */

/* ПУНКТ 6 
<?PHP

class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}
class B extends A {
}
$a1 = new A();
$b1 = new B();
$a1->foo(); 
$b1->foo(); 
$a1->foo(); 
$b1->foo(); 
здесь наследование класса А, поэтому у нас создается новый метод и поэтому функция работает 
сначала для a1(+1) потом для b1(+1)
и далее оба значения увеличиваются на 1, и в итоге получится 1122

ПУНКТ 7.
Код в пункте 7 выведет тоже самое, что в пункте 6 (1122)
*/