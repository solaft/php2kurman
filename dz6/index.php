<?php declare(strict_types=1);

namespace Observer;


 $subject = new User('ivan','petrov@mail.ru','5let');
 $observer1 = new FollowedObservers();
 $observer2 = new UnFollowedObservers();
 $observer3 = new All();

 $subject->attach($observer1);
 $subject->attach($observer2);
 $subject->attach($observer3);