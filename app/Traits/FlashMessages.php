<?php


namespace App\Traits;


trait FlashMessages
{
    /**
     * @param string $level
     * @param null $message
     * @return array
     */
    protected static function message($level = 'info', $message = null)
    {
        if (session()->has('messages')) {
            $messages = session()->pull('messages');
        }

        $messages[] = $message = ['level' => $level, 'message' => $message];

        session()->flash('messages', $messages);

        return $message;
    }

    /**
     * @return array|mixed
     */
    protected static function messages()
    {
        return self::hasMessages() ? session()->pull('messages') : [];
    }

    /**
     * @return bool
     */
    protected static function hasMessages()
    {
        return session()->has('messages');
    }

    /**
     * @param $message
     * @return array
     */
    protected static function success($message)
    {
        return self::message('success', $message);
    }

    /**
     * @param $message
     * @return array
     */
    protected static function info($message)
    {
        return self::message('info', $message);
    }

    /**
     * @param $message
     * @return array
     */
    protected static function warning($message)
    {
        return self::message('warning', $message);
    }

    /**
     * @param $message
     * @return array
     */
    protected static function danger($message)
    {
        return self::message('danger', $message);
    }
}
