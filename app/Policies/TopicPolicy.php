<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Topic;

class TopicPolicy
{
    public function update(User $user, Topic $topic)
    {
        return $topic->user_id === $user->id;
    }

    public function delete(User $user, Topic $topic)
    {
        return $topic->user_id === $user->id;
    }
}
