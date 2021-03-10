<?php declare(strict_types=1);

namespace Observer;

use SplObserver;
use SplSubject;

class FollowedObservers implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->state = "подписан") {
            echo "Соискатель: подписан на уведмоления.\n";
        }
    }
}

class UnFollowedObservers implements \SplObserver
{
    public function update(\SplSubject $subject): void
    {
        if ($subject->state = "не подписан") {
            echo "Соискатель: отписался от рассылки.\n";
        }
    }
}

class All implements \SplObserver
{
    public function notify(\SplSubject $subject): void
    {
        if ($subject->state = "новая вакансия") {
            echo "Появиалсь новая вакансия\n";
        }
    }
}