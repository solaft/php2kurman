<?php
abstract class Component
{
    abstract public function Operation();
}
class ConcreteComponent extends Component
{
    public function Operation()
    {
        return 'This is component';
    }
}
abstract class Decorator extends Component
{
    protected
        $_component = null;
    public function __construct(Component $component)
    {
        $this -> _component = $component;
    }
    protected function getComponent()
    {
        return $this -> _component;
    }
    public function Operation()
    {
        return $this -> getComponent() -> Operation();
    }
}
class ConcreteDecoratorA extends Decorator
{
    public function operation(): string
    {
        return "ConcreteDecoratorA(" . parent::operation() . ")";
    }
}
}
class ConcreteDecoratorB extends Decorator
{
    public function operation(): string
    {
        return "ConcreteDecoratorB(" . parent::operation() . ")";
    }
}
